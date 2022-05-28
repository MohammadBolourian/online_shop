<?php

namespace App\Http\Controllers\Home\Product;

use App\Helpers\Cart\Cart;
use App\Http\Controllers\Controller;
use App\Models\Market\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        return view('home.product.cart');
    }

    public function addToCart(Product $product)
    {
        $cart = Cart::instance('cart-mamalkala');
        if( Cart::has($product) ) {
            if(Cart::count($product) < $product->inventory)
                Cart::update($product , 1);
        }else {
            Cart::put(
                [
                    'quantity' => 1,
                ],
                $product
            );
        }

        return redirect('/cart');
    }

    public function quantityChange(Request $request)
    {
        $data = $request->validate([
            'quantity' => 'required',
            'id' => 'required',
            'cart' => 'required'
        ]);

        $cart = Cart::instance($data['cart']);

        if( $cart->has($data['id']) ) {
            $cart->update($data['id'] , [
                'quantity' => $data['quantity']
            ]);

            return response(['status' => 'success']);
        }

        return response(['status' => 'error'] , 404);
    }

    public function deleteFromCart($id)
    {
        Cart::delete($id);

        return back();
    }
}
