<?php

namespace App\Http\Controllers\home\product;

use App\Http\Controllers\Controller;
use App\Models\Market\Payment;
use Illuminate\Http\Request;
use Cart;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as ShetabitPayment;

class PaymentController extends Controller
{
    public function payment()
    {
        $cart = Cart::instance('cart-mamalkala');
        $cartItems = $cart->all();
        if($cartItems->count()) {
            $price = $cartItems->sum(function($cart) {
                return $cart['discount_percent'] == 0
                    ? $cart['product']->price * $cart['quantity']
                    : ($cart['product']->price - ($cart['product']->price * $cart['discount_percent'])) *  $cart['quantity'];

            });

            $orderItems = $cartItems->mapWithKeys(function($cart) {
                return [$cart['product']->id => [ 'quantity' => $cart['quantity'] , 'price' =>$cart['product']->price] ];
//                return [$cart['product']->id => [ 'quantity' => $cart['quantity']]  ];
            });

            $order = auth()->user()->orders()->create([
                'status' => 'unpaid',
                'price' => $price
            ]);

            $order->products()->attach($orderItems);

             $invoice = (new Invoice)->amount($price);

//            $invoice = (new Invoice)->amount(1000);
            return ShetabitPayment::callbackUrl(route('payment.callback'))->purchase($invoice, function($driver, $transactionId) use ($order, $cart,$invoice) {
                $order->payments()->create([
//                    'resnumber' => $invoice->getUuid(),
                    'resnumber'=>$transactionId,
                ]);
                $cart->flush();
            })->pay()->render();


            // Create new invoice.
//            $invoice = (new Invoice)->amount($price);
            // Purchase and pay the given invoice.
            // You should use return statement to redirect user to the bank page.
//            return shetabitPayment::callbackUrl(route('payment.callback'))->purchase($invoice, function($driver, $transactionId) use($order,$cart) {
//                //echo json_encode($results);
//                $order->payments()->create([
//                    'resnumber'=>$transactionId,
//                ]);
//                $cart->flush();
//            })->pay()->render();
        }
        // alert()->error();
        return back()->with('swal-error', 'مشکلی پیش امده');

    }

    public function callback(Request $request)
    {
        try {
//            $payment = Payment::where('resnumber', $request->clientrefid)->firstOrFail();
            $payment=Payment::where('resnumber',$request->Authority)->firstOrFail();

            // $payment->order->price
            $receipt = ShetabitPayment::amount($payment->order->price)->transactionId($request->Authority)->verify();

            $payment->update([
                'status' => 1
            ]);

            $payment->order()->update([
                'status' => 'paid'
            ]);

            $tracking=ltrim($request->Authority,'0');
          //  alert()->success('پرداخت شما موفق بود');

            return redirect('/products')->with('swal-success', ' پرداخت شما با شماره پیگیری ('.$tracking.') موفقیت انجام شد  ');


        } catch (InvalidPaymentException $exception) {
            /**
             * when payment is not verified, it will throw an exception.
             * We can catch the exception to handle invalid payments.
             * getMessage method, returns a suitable message that can be used in user interface.
             **/
            $tracking=ltrim($request->Authority,'0');
//            alert()->error($exception->getMessage());

             return redirect('/products')->with('swal-error', ' پرداخت شما با شماره پیگیری ('.$tracking.') با مشکل مواجه شد');

        }

//        $payment=Payment::where('resnumber',$request->Authority)->firstOrFail();
////        dd($request->Authority);
//
//        try {
//            $receipt = shetabitPayment::amount($payment->order->price)->transactionId($request->Authority)->verify();
//
////            dd($request->Authority);
//            $payment->update([
//                'status'=>'1'
//            ]);
//            $payment->order()->update([
//                'status'=>'paid'
//            ]);
//
//            $tracking=ltrim($request->Authority,'0');
////            alert()->success('پرداخت شما با شماره پیگیری ('.$tracking.') موفقیت انجام شد')->autoclose(8000);
//            return redirect('/products');
//
//        } catch (InvalidPaymentException $exception) {
//            $tracking=ltrim($request->Authority,'0');
////            alert()->error('پرداخت شما با شماره پیگیری ('.$tracking.') با مشکل مواجه شد')->autoclose(8000);
////            alert()->error($exception->getMessage());
//            return redirect('/products');
//            /**
//            when payment is not verified, it will throw an exception.
//            We can catch the exception to handle invalid payments.
//            getMessage method, returns a suitable message that can be used in user interface.
//             **/
////            echo $exception->getMessage();
//        }

    }
}
