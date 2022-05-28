<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\AdminUserRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Acl\role;
use App\Models\Test\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:user-manager');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('user_type', 1)->get();
//        dd($admins);
        return view('admin.user.admin-user.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = role::all();
        return view('admin.user.admin-user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserRequest $request  , ImageService $imageService)
    {
        $inputs = $request->all();


        $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'user-images');
        $result = $imageService->fitAndSave($request->file('profile_photo_path'), 200, 250);
        if ($result === false) {
            return redirect()->route('admin.user.admin-user.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
        }

        $inputs['profile_photo_path'] = $result;
        $inputs['user_type'] = 1;

        $x = User::create($inputs);
        $x->roles()->sync(6);
        $customer = Address::create([
            'user_id' => $x->id,
            'city_id' => 1,
            'state' => 1,
        ]);
        return redirect()->route('admin.user.admin-user.index')->with('swal-success', ' مدیر جدید  با موفقیت ثبت شد');
    }


    public function edit(User $user)
    {
        return view('admin.user.admin-user.edit', compact('user'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserRequest $request, User $user , ImageService $imageService)
    {
        $inputs = $request->all();


        if($request->hasFile('profile_photo_path'))
        {
            if(!empty($user->profile_photo_path))
            {
                $imageService->deleteDirectoryAndFiles($user->profile_photo_path);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'user-images');
            $result = $imageService->fitAndSave($request->file('profile_photo_path'), 200, 250);
            if($result === false)
            {
                return redirect()->route('admin.home')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $result;
        }
        $user->update($inputs);
        return redirect()->route('admin.home')->with('swal-success', '  پروفایل  با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $result = $user->forceDelete();
        return redirect()->route('admin.user.admin-user.index')
            ->with('swal-success',' ادمین با موفقیت حذف شد');
    }

    public function status(User $user){

        $user->status = $user->status == 0 ? 1 : 0;
        $result = $user->save();
        if($result){
            if($user->status == 0){
                return response()->json(['status' => true, 'checked' => false]);
            }
            else{
                return response()->json(['status' => true, 'checked' => true]);
            }
        }
        else{
            return response()->json(['status' => false]);
        }

    }
}
