@extends('admin.layout.master')
@section('head-tag')
    <title> ایجاد برند جدید</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش فروش</li>
    <li class="breadcrumb-item "><a href={{route('admin.market.brand.index')}}>برند ها</a></li>
    <li class="breadcrumb-item active">ایجاد برند جدید</li>
@endsection

@section('content')
    <div class="col-12">
        <h5>افزودن برند</h5>
        <br>
        <form class="form-group">
            <label>نام:</label>
            <input name="name" type="text" class="form-control w-50">
            <p class="mt-4 small">در سایت با این نام نشان داده می شود</p>

            <div class="custom-file w-50">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label text-center" for="customFile">Choose file</label>
            </div>

        <br>
        <br>
        <button class="btn btn-outline-success" type="button">افزودن</button>
           <a href="{{route('admin.market.brand.index')}}"> <button class="btn btn-outline-danger" type="button">بازگشت</button></a>
        </form>

    </div>
    @endsection
