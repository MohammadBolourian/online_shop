<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Product;
use App\Models\Market\ProductGallery;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Product $product
     * @return void
     */
    public function index(Product $product)
    {
        $images = $product->gallery()->latest()->paginate(30);
        return view('admin.market.product.gallery.index' , compact('product' , 'images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.market.product.gallery.create' , compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Product $product)
    {
        $validated = $request->validate([
            'images.*.image' => 'required',
            'images.*.alt' => 'required|min:3'
        ]);

        collect($validated['images'])->each(function($image) use ($product) {
            $product->gallery()->create($image);
        });

        // alert()->success()
        return redirect(route('admin.market.product.gallery.index' , ['product' => $product->id]))->with('swal-success', '  تصویر گالری شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product , ProductGallery $gallery)
    {
        return view('admin.market.product.gallery.edit', compact('product' , 'gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product , ProductGallery $gallery)
    {
        $validated = $request->validate([
            'image' => 'required',
            'alt' => 'required|min:3'
        ]);

        $gallery->update($validated);

        // alert()->success()
        return redirect(route('admin.market.product.gallery.index' , ['product' => $product->id]))->with('swal-success', '  تصویر گالری شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product , ProductGallery $gallery)
    {
        $gallery->delete();
        // alert()->success()

        return redirect(route('admin.market.product.gallery.index' , ['product' => $product->id]))->with('swal-success', '  تصویر گالری شما با موفقیت حذف شد');
    }
}
