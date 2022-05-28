<?php

namespace App\Http\Controllers\admin\market;

use App\Http\Controllers\Controller;
use App\Models\Market\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:shop-manager');
    }

    public function index()
    {
        $orders = Order::query();

        if($search = \request('search')) {
            $orders->where('id' , $search)->orWhere('tracking_serial' , $search);
        }
        $orders = $orders->where('status' , request('type'))->latest()->paginate(30);
//        $orders = $orders->latest()->paginate(30); for all without type
        return view('admin.market.order.index' , compact('orders'));

    }
    public function show(Order $order)
    {
//        $payments = $order->payments()->get();
        return view('admin.market.order.show' , compact('order'));
    }

    public function edit(Order $order)
    {
        return view('admin.market.order.edit' , compact('order'));
    }


    public function update(Request $request, Order $order)
    {
        $data = $this->validate($request , [
            'status' => ['required' , Rule::in(['unpaid' , 'paid' , 'preparation' , 'posted' , 'received' , 'canceled'])],
            'tracking_serial' => 'required'
        ]);

        $order->update($data);
        // alert
        return redirect(route('admin.market.order.index') . "?type=$order->status")->with('swal-success', ' با موفقیت ویرایش شد');
    }

    public function destroy(Order $order)
    {

        $result = $order->delete();
        return back()->with('swal-success', ' با موفقیت حذف شد');
    }
}
