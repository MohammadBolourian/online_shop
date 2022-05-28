<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\TokenController;
use App\Http\Controllers\Home\Blog\BlogController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\Product\CartController;
use App\Http\Controllers\Home\Product\DiscountController;
use App\Http\Controllers\home\product\PaymentController;
use App\Http\Controllers\Home\Product\ProductController;
use Illuminate\Support\Facades\Route;






Route::get('/' , [HomeController::class,'index'])->name('home');
Route::get('/logout',[HomeController::class, 'logout'])->name('logout');




//================>Login & Register


Route::prefix('auth')->namespace('Auth')->middleware('guest')->group(function() {

    Route::post('login',[LoginController::class,'Login'])->name('login');
//    Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@Login']);
    Route::get('login',[LoginController::class,'showLogin'])->name('auth.login');
    Route::get('register',[RegisterController::class,'showRegister'])->name('auth.register');
    Route::post('register',[RegisterController::class,'register']);
    Route::get('token' , [TokenController::class,'showToken'])->name('auth.phone.token');
    Route::post('token' , [TokenController::class,'token']);
});

//=============================================>product
Route::get('products',[ProductController::class,'index'])->name('shop');
Route::get('products/{slug}',[ProductController::class,'show']);



//===========================>route namayesh category
Route::get('category/{category}',[HomeController::class,'category']);

//==================================>route add to sabad kharid
Route::post('cart/add/{product}' , [CartController::class,'addToCart'])->name('cart.add');
Route::get('cart' , [CartController::class,'cart'])->name('show.cart');
Route::patch('cart/quantity/change' , [CartController::class,'quantityChange']);
Route::delete('cart/delete/{cart}' , [CartController::class,'deleteFromCart'])->name('cart.destroy');

//=================================>blog
Route::get('blog',[BlogController::class,'index'])->name('blog');
Route::get('blog/{slug}',[BlogController::class,'show']);


//============================> login required
Route::middleware('auth')->group(function() {
    Route::post('comments' , [HomeController::class,'comment'])->name('send.comment');
    Route::post('payment' , [PaymentController::class,'payment'])->name('cart.payment');
    Route::get('payment/callback' , [PaymentController::class,'callback'])->name('payment.callback');
    //=================================> profile user
    Route::get('show-profile{user}' , [HomeController::class,'showProfile'])->name('showProfile');
    Route::get('show-address{user}' , [HomeController::class,'showAddress'])->name('showAddress');
//    Route::get('show-address{address}' , [HomeController::class,'showAddress'])->name('showAddress');
    Route::put('/update{user}',[HomeController::class,'update'])->name('user.update');
    Route::get('orders',[HomeController::class,'order'])->name('user.order');
    Route::get('orders/{order}',[HomeController::class,'showDetails'])->name('user.order.detail');

    //=========================>address create va update

    Route::put('update-address/{address}',[HomeController::class,'updateAddress'])->name('user.updateAddress');

//    Route::put('/update-address{user}',[HomeController::class,'updateAddress'])->name('updateAddress');
    Route::post('/cities',[HomeController::class,'cities'])->name('cities');
});
Route::post('/discount/check',[DiscountController::class,'check'])->name('cart.discount.check');
Route::delete('/discount/delete',[DiscountController::class,'destroy'])->name('cart.discount.destroy');
