<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\CommentRequest;
use App\Http\Requests\Admin\User\AdminUserRequest;
use App\Http\Requests\Home\AddressRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Content\Comment;
use App\Models\Content\Post;
use App\Models\Custom\IndexPage;
use App\Models\Custom\Slider;
use App\Models\Market\Category;
use App\Models\Market\Order;
use App\Models\Market\Product;
use App\Models\Test\Address;
use App\Models\Test\city;
use App\Models\Test\province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware(['auth']);
//    }




    public function index()
    {

        //faghat baray login shodan bedone sms dar master estefade shode ast


        $sliders = Slider::orderBy('created_at', 'desc')->get();
      $newProducts = Product::orderBy('created_at', 'desc')->paginate(10);
       $elcPro = Category::find(1)->products()->orderBy('created_at','DESC')->paginate(10);
        $blogs = Post::orderBy('created_at', 'desc')->simplePaginate(3);

        $compact = compact('sliders','newProducts','elcPro','blogs');
        return view('welcome',$compact);
    }

    public function cities(Request $request)
    {

        $data['cities'] = city::where("province_id",$request->province_id)->get(["name", "id"]);
        return response()->json($data);
    }

    function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('home');
    }

    public function comment(Request $request)
    {
        $validData = $request->validate([
            'commentable_id' => 'required',
            'commentable_type' => 'required',
            'parent_id' => 'required',
            'comment' => 'required'
        ]);

        auth()->user()->comments()->create($validData);

//        alert()->success('نظر با موفقیت ثبت شد');
        return back()->with('swal-success', 'نظر شما پس از تایید نمایش داده خواهد شد');
    }

    public function category(Category $category )
    {

        return view('home.product.category', compact('category'));
    }

    public function showProfile(User $user)
    {
        if(Gate::allows('edit-user',$user)) {
            return view('home.profile.show-profile', compact('user'));
        }
        abort(404);
    }

    public function showAddress( User $user)
    {
        $provinces = province::all();
        if(Gate::allows('edit-user',$user)) {
            return view('home.profile.show-address', compact('provinces','user'));
        }
        abort(403);
    }

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
                return redirect()->route('home')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $result;
        }
        $user->update($inputs);
        return redirect()->route('home')->with('swal-success', '  پروفایل  با موفقیت ویرایش شد');
    }

    public function updateAddress(AddressRequest $request,Address $address)
    {
        $inputs = $request->all();
        $inputs['user_id'] = auth()->user()->id;
        $address->update($inputs);
        return redirect()->route('home')->with('swal-success', '  پروفایل با موفقیت ویرایش شد');
    }

    public function order()
    {
        $orders = auth()->user()->orders()->latest('created_at')->paginate(12);;
        return view('home.profile.orders' , compact('orders'));
    }
    public function showDetails(Order $order)
    {
        $this->authorize('view' , $order);
        return view('home.profile.order-details' , compact('order'));
    }

}
