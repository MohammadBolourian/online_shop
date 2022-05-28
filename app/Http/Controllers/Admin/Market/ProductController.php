<?php

namespace App\Http\Controllers\admin\market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\ProductRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Market\Attribute;
use App\Models\Market\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:product-manager');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::query();
        $products = $products->latest()->paginate(20);
        return view('admin.market.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.market.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();


        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.market.product.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }

        $product = auth()->user()->products()->create($inputs);
        $product->categories()->sync($inputs['categories']);

        $this->attachAttributesToProduct($product, $inputs);

        return redirect()->route('admin.market.product.index')->with('swal-success', ' محصول جدید شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return void
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.market.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product , ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            if (!empty($product->image)) {
                $imageService->deleteDirectoryAndFiles($product->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.market.product.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($product->image)) {
                $image = $product->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }

        $product->update($inputs);
        $product->categories()->sync($inputs['categories']);


        $product->attributes()->detach();
        $this->attachAttributesToProduct($product, $inputs);

        return redirect()->route('admin.market.product.index')->with('swal-success', ' محصول جدید شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.market.product.index')
            ->with('swal-success','دسته بندی با موفقیت حذف شد');
    }


    protected function attachAttributesToProduct(Product $product, array $inputs): void
    {
        $attributes = collect($inputs['attributes']);
        $attributes->each(function ($item) use ($product) {
            if (is_null($item['name']) || is_null($item['value'])) return;

            $attr = Attribute::firstOrCreate(
                ['name' => $item['name']]
            );

            $attr_value = $attr->values()->firstOrCreate(
                ['value' => $item['value']]
            );

            $product->attributes()->attach($attr->id, ['value_id' => $attr_value->id]);
        });
    }
}
