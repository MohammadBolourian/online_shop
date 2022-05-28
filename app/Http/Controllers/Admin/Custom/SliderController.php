<?php

namespace App\Http\Controllers\Admin\Custom;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Custom\SliderRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Custom\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
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
        $sliders = Slider::all();
        return view('admin.custom.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.custom.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();

        $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'sliders-images');
//        $result = $imageService->createIndexAndSave($request->file('image'));
//        $result = $imageService->save($request->file('image'));
        $result = $imageService->fitAndSave($request->file('image'), 900, 450);
        if ($result === false) {
            return redirect()->route('admin.custom.slider.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
        }
        $inputs['image'] = $result;
        $slider = Slider::create($inputs);
        return redirect()->route('admin.custom.slider.index')->with('swal-success', ' اسلایدر جدید شما با موفقیت ثبت شد');

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
    public function edit(Slider $slider)
    {
        return view('admin.custom.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, Slider $slider , ImageService $imageService)
    {
        $inputs = $request->all();

        if($request->hasFile('image'))
        {
            if(!empty($slider->image))
            {
                $imageService->deleteDirectoryAndFiles($slider->image);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'sliders-images');
            $result = $imageService->fitAndSave($request->file('image'), 900, 450);
            if($result === false)
            {
                return redirect()->route('admin.custom.slider.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $slider->update($inputs);
        return redirect()->route('admin.custom.slider.index')->with('swal-success', ' اسلایدر شما با موفقیت ویرایش شد');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $result =$slider ->delete();
        return redirect()->route('admin.custom.slider.index')->with('swal-success', ' اسلایدر شما با موفقیت حذف شد');
    }
}
