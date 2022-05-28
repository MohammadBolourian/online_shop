<?php

namespace App\Http\Controllers\Admin\Custom;

use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\Custom\IndexPage;
use Database\Seeders\IndexPageSeeder;
use Illuminate\Http\Request;

class IndexPicController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:setting-manager');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pics = IndexPage::first();
        if($pics === null){
            $default = new IndexPageSeeder();
            $default->run();
            $pics = IndexPage::first();
        }
        $pics = IndexPage::all();
        return view('admin.custom.indexPic.index', compact('pics'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(IndexPage $indexPage)
    {
        return view('admin.custom.indexPic.edit', compact('indexPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IndexPage $indexPage , ImageService $imageService)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => '|image|mimes:png,jpg,jpeg,gif'
        ]);
        $inputs = $request->all();
        if($request->hasFile('image'))
        {
            if(!empty($indexPage->image))
            {
                $imageService->deleteDirectoryAndFiles($indexPage->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'index-pics');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if($result === false)
            {
                return redirect()->route('admin.custom.index-pic.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        else{
            if(isset($inputs['currentImage']) && !empty($indexPage->image))
            {
                $image = $indexPage->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $indexPage->update($inputs);
        return redirect()->route('admin.custom.index-pic.index')->with('swal-success', ' تصاویر شما با موفقیت ویرایش شد');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
