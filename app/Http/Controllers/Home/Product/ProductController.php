<?php

namespace App\Http\Controllers\Home\Product;

use App\Http\Controllers\Controller;
use App\Models\Market\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query();
        if (\request('old')) {
            $products= $products->oldest()->paginate(12);
        }
//        elseif (\request('new')) {
//            $products= $products->latest()->paginate(12);
//        }
        elseif (\request('high')) {
            $products= $products->orderBy('price', 'desc')->paginate(12);
        }
        elseif (\request('low')) {
            $products= $products->orderBy('price', 'asc')->paginate(12);
        }
        else $products= $products->latest()->paginate(12);

        return view('home.product.products', compact('products'));
    }


    public function show($slug)
    {

        $data = Product::where("slug",$slug)->first();
        $images = $data->gallery()->latest()->get();
        return view('home.product.single-product',compact('data','images'));
    }
}
