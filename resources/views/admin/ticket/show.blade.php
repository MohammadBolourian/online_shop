@extends('admin.layout.master')
@section('head-tag')
    <title> مشاهده تیکت</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش تیکت</li>
    <li class="breadcrumb-item "><a href={{route('admin.ticket.index')}}>تیکت ها </a></li>
    <li class="breadcrumb-item active"> مشاهده تیکت</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-8 text-center">
            <textarea rows="7" style="width: 100%; background: wheat" disabled>چرا این محصول ما رو نمیفرستید یک ماهه از خرید اون میگذره</textarea>
            <br>
            <br>
            <div class="mt-5" id="toolbar-container">
                <div class="form-group">
                    <label for="comment">پاسخ:</label>
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                </div>
            </div>

            <br>
            <br>
            <button type="button" class="btn btn-info mt-5"> پاسخ </button>
            <a href="{{route('admin.ticket.index')}}"><button type="button" class="btn btn-danger mt-5"> بازگشت </button></a>
         </div>
        <div class="col-4 img">
            <div class="mt-3"><span class="font-weight-bold">نام :</span>  <span class="text-warning">علی محمدی</span></div>
            <div class="mt-3"><span class="font-weight-bold">  ایمل:</span>  <span class="text-warning">ali@mohammadi.com</span></div>
            <div class="mt-3"><span class="font-weight-bold">تاریخ :</span>  <span class="text-warning">فروردین ۳۰, ۱۳۹۸</span></div>
            <div class="mt-3"><span class="font-weight-bold"> موضوع:</span>  <span class="text-warning">خرید محصول به شماره kx-521 </span></div>
        </div>
    </div>
    @endsection
