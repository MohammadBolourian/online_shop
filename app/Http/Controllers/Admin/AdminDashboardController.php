<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class AdminDashboardController extends Controller
{



    public function index(){

        $data = ['LoggedUserInfo' => User::where('id', '=', 1)->first()];
        session(['LoggedUserInfo' => $data ]);
//        dd($data['LoggedUserInfo']);
       return view('admin.index');
    }

    public function seeProfile(User $user){
        $data = ['LoggedUserInfo' => User::where('id', '=', 1)->first()];
        session(['LoggedUserInfo' => $data ]);
//        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        if(Gate::allows('edit-user',$user)) {
            return view('admin.user.admin-user.see_profile', compact('user'));
        }
        abort(403);
    }

    function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('home');
    }
}
