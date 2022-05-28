<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $categories = Category::where('parent' , 0)->latest()->paginate(1);
        return view('admin.market.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.market.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->parent) {
            $request->validate([
                'parent' => 'exists:categories,id'
            ]);
        }

        $request->validate([
            'name' => 'required|min:3'
        ]);

        Category::create([
            'name' => $request->name,
            'parent' => $request->parent ?? 0
        ]);
        return redirect()->route('admin.market.category.index')->with('swal-success', 'دسته بندی جدید شما با موفقیت ثبت شد');
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
    public function edit(Category $category)
    {
        return view('admin.market.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if($request->parent) {
            $request->validate([
                'parent' => 'exists:categories,id'
            ]);
        }

        $request->validate([
            'name' => 'required|min:3'
        ]);

        $category->update([
            'name' => $request->name,
            'parent' => $request->parent
        ]);

        return redirect()->route('admin.market.category.index')->with('swal-success', 'دسته بندی شما با موفقیت ویرایش شد');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.market.category.index')->with('swal-success', 'دسته بندی شما با موفقیت حذف شد');
    }
}
