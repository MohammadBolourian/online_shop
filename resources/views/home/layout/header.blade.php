

<div class="container-fluid row header">
    <div class="col-md-2 header-logo">
      <a href="{{route('home')}}">
          <img src="{{asset('assets/img/mamal.jpg')}}">
      </a>
    </div>
    <div class="col-md-6 row">
        <div class="search-navigation flex-grow-1">
            <div class="input-group mb-3 ">
                <div class="input-group-prepend">
                    <span class="input-group-text myicon"><i class="las la-search" style="font-size:20px; vertical-align: middle;"></i></span>
                </div>
                <input type="text" placeholder="جست و جو کنید ..." class="form-control myinput pr-4">
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-3 icon2">
        @if(Auth::check())
            <i class="lab la-pagelines"></i>
           <a href="{{ route('showProfile',  (session('LoggedUserInfo'))['LoggedUserInfo']['id'])}}">
               <span class="ml-3">مشاهده پروفایل</span>
           </a>
            <i class="las la-user"></i>
            <a href="{{route('logout')}}">
                <span class="ml-3">خروج از سایت</span>
            </a>
            @else
       <a href="{{route('auth.login')}}">
           <span class="ml-3">ورود/ثبت نام</span>
       </a>
        @endif
        <a href="{{route('show.cart')}}">
        <i id="basket" class="las la-shopping-cart">
            <span class="badge  badge-success c-nav-pill">{{\Cart::all()->sum('quantity')}}</span>
        </i>
        </a>
    </div>
</div>

<div class="menu row">
    <div class="col-md-10 submenu">
        <ul class="list-group list-group-horizontal mynavbar">
            <div class="mysubnav">
                <li class="list-group-item underline-reveal subnavbtn">

                    <i id="li_menu" class="las la-bars"></i>دسته بندی ها

                </li>
                <div class="subnav-content rounded-bottom">
                    @include('home.layout.list-categories',['categories'=>\App\Models\Market\Category::where('parent' , 0)->get()])
                </div>
            </div>
            <li class="list-group-item underline-reveal"><a href="{{route('blog')}}">ممل مگ</a></li>
            <li class="list-group-item underline-reveal">سوالی دارید ؟</li>
            <li class="list-group-item underline-reveal"><a href="{{route('shop')}}"> لیست کالا ها</a></li>
            <li class="list-group-item underline-reveal">المان دسته بندی</li>
        </ul>
    </div>
    <div class="col-md-2">
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item underline-from-center">فروش ویژه</li>
        </ul>
    </div>
</div>

