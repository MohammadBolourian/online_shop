{{--@dd((session('LoggedUserInfo'))['LoggedUserInfo']['first_name']);--}}
@extends('admin.layout.master')
@section('head-tag')
    <title>داشبورد اصلی</title>
    @endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">ادمین</li>
    @endsection
@section('content')
<div class="row">
    <div class="col img m-2">
        <div class="img-hole" >
            <img  src="{{ asset( (session('LoggedUserInfo'))['LoggedUserInfo']['profile_photo_path'] ) }}">
        </div>
        <h5 class="text-center mt-4"> {{ (session('LoggedUserInfo'))['LoggedUserInfo']['first_name'].' '.(session('LoggedUserInfo'))['LoggedUserInfo']['last_name'] }} عزیز</h5>
        <p class="text-center mt-4 mb-5">خوش آمدید</p>


        <div class="d-flex justify-content-around">
            <div class="text-center">
                <span class="d-block icon-welcome"><i class="las la-envelope text-success"></i></span>
                <span class="d-block">13</span>
                <span class="d-block text-welcome">پیام خوانده نشده</span>
            </div>
            <div class="text-center">
                <span class="d-block icon-welcome"><i class="las la-bell text-warning"></i></span>
                <span class="d-block">7</span>
                <span class="d-block text-welcome">اعلان جدید</span>
            </div>
            <div class="text-center">
                <span class="d-block icon-welcome"><i class="las la-tags text-danger"></i></span>
                <span class="d-block">4</span>
                <span class="d-block text-welcome">سفارش جدید</span>
            </div>


        </div>
    </div>
    <div class="col img m-2 text-center">
        <div class="weather-icon"><i class="las la-cloud-sun"></i></div>
        <div class="display-3">24°</div>
        <h5 class="d-block mt-5"> سبزوار</h5>
    </div>
    <div class="col img m-2 text-center">
        <div class="rooz" id="dayname">!</div>
        <div class="display-1 text-warning" id="datenumber">?</div>
        <div class="mah-sal" id="mah-sal"></div>
        <div class="saat">
            <span id="minutes"></span>
            <span>:</span>
            <span id="hours"></span>

            <span id="ampm"></span>
        </div>

    </div>
</div>
<div class="row">
    <div class="col img m-2 row">
        <div class="col-9 text-center">
            <div class="sell-number">2,453</div>
            <div class="sell-in-month">فروش این ماه</div>
        </div>
        <div class="col-3 lol mb-4">
            <span id="circle"></span>
            <p class="percent-sell">60%</p>
        </div>
    </div>
    <div class="col img m-2 row">
        <div class="col-9 text-center">
            <div class="sell-number">8,550</div>
            <div class="sell-in-month">بازدید این ماه</div>
        </div>
        <div class="col-3 lol mb-4">
            <span id="circle2"></span>
            <p class="percent-sell">85%</p>
        </div>
    </div>

</div>
<div class="row">
    <div class="col img m-2 row">
        <div class="col-9 text-center">
            <div class="sell-number">281</div>
            <div class="sell-in-month">کاربران جدید این ماه</div>
        </div>
        <div class="col-3 lol mb-4">
            <span id="circle3"></span>
            <p class="percent-sell">50%</p>
        </div>
    </div>
    <div class="col img m-2 row">
        <div class="col-9 text-center">
            <div class="sell-number">1,500</div>
            <div class="sell-in-month">محصول جدید اضافه شده این ماه</div>
        </div>
        <div class="col-3 lol mb-4">
            <span id="circle4"></span>
            <p class="percent-sell">92%</p>
        </div>
    </div>

</div>
@endsection
@section('script')
    <script src="{{asset('assets/js/circle-progress.min.js')}}"></script>

    <script>
    $('#circle').circleProgress({
        value: 0.6,
        size: 100,
        // animation: false
        fill: {
            gradient: ["red", "orange"]
        }
    });
    $('#circle2').circleProgress({
        value: 0.85,
        size: 100,
        // animation: false
        fill: {
            gradient: ["yellow", "green"]
        }
    });
    $('#circle3').circleProgress({
        value: 0.5,
        size: 100,
        // animation: false
        fill: {
            gradient: ["lightblue", "darkblue"]
        }
    });
    $('#circle4').circleProgress({
        value: 0.92,
        size: 100,
        // animation: false
        fill: {
            gradient: ["orange", "darkorange"]
        }
    });
</script>

    @endsection
