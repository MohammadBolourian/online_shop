@php
    use App\Models\User;auth()->loginUsingId(1);
           $data = ['LoggedUserInfo' => User::where('id', '=', 1)->first()];
           session(['LoggedUserInfo' => $data ]);
@endphp
<div class="c-header">
    <div id="hide-show" class="button mr-1"><span><i class="las la-bars"></i></span></div>
    <ul class="nav c-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">داشبورد</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">تنضیمات</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">کاربر</a>
        </li>
    </ul>
    <div class="button2"><span><i class="lar la-sun"></i></span></div>
    <ul class="c-nav">
        <li class="dropdown">
            <div class="button3"><span><i class="las la-bell"></i></span>
                <span class="badge badge-pill badge-danger c-nav-pill">5</span>
            </div>
        </li>
        <li class="dropdown">
            <div class="button3"><span><i class="las la-stream"></i></span>
                <span class="badge badge-pill badge-warning c-nav-pill">7</span>
            </div>
        </li>
        <li class="dropdown">
            <div class="button3"><span><i class="las la-envelope"></i></span>
                <span class="badge badge-pill badge-primary c-nav-pill">13</span>
            </div>
        </li>
        <li class="dropdown">
            <div class="button4"><span>{{ (session('LoggedUserInfo'))['LoggedUserInfo']['first_name'].' '.(session('LoggedUserInfo'))['LoggedUserInfo']['last_name'] }}</span>

            </div>
        </li>
        <li class="dropdown">
            <div class="button3"><img src="{{ asset( (session('LoggedUserInfo'))['LoggedUserInfo']['profile_photo_path'] ) }}" class="img-small rounded-circle">
            </div>
        </li>
        <li class="dropdown">
            <div class="button5"><span><i class="las la-th-list"></i></span>
            </div>
        </li>
    </ul>
    <div class="col-md-12 subheader">
        <div class="row justify-content-between">
            <div class="col-md-9">
                <ol class="breadcrumb mt-2">
                    <li class="breadcrumb-item">خانه</li>
                    <li class="breadcrumb-item "><a href={{route('admin.home')}}>داشبورد</a></li>
{{--                    <li class="breadcrumb-item active">ادمین</li>--}}
                    @yield('breadcrumb')
                </ol>
            </div>

            <div class="col-md-3">
                <ul class="c-nav">
                    <li class="dropdown">
                        <div class="button3"><span><i class="las la-comment-dots"></i></span>
                        </div>
                    </li>
                    <li class="dropdown">
                        <div class="button4"><span><i class="las la-project-diagram"></i> داشبورد </span>
                        </div>
                    </li>
                    <li class="dropdown">
                        <div class="button4"><span><i class="las la-cog"></i> تنظیمات </span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
