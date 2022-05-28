@extends('admin.layout.master')
@section('head-tag')
    <title> ایجاد کاربر جدید</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">کاربران</li>
    <li class="breadcrumb-item "><a href={{route('admin.user.customer.index')}}> مشتری </a></li>
    <li class="breadcrumb-item active">ایجاد مشتری جدید</li>
@endsection

@section('content')
    <div class="col-12">
        <h5>افزودن مشتری </h5>
        <br>
        <form class="form-group row">
         <div class="col-6">
                <label>نام :</label>
                <input type="text" class="form-control w-50 mt-4 mb-4">
            </div>
            <div class="col-6">
                <label>نام خانوادگی :</label>
                <input type="text" class="form-control w-50 mt-4 mb-4">
            </div>
            <div class="col-6">
                <label>شماره موبایل :</label>
                <input type="text" class="form-control w-50 mt-4 mb-4">
            </div>
            <div class="col-6">
                <label>ایمیل :</label>
                <input type="text" class="form-control w-50 mt-4 mb-4">
            </div>
            <div class="col-6">
                <label>کدملی :</label>
                <input type="text" class="form-control w-50 mt-4 mb-4">
            </div>
            <div class="col-6">
                <label>کلمه عبور :</label>
                <input type="text" class="form-control w-50 mt-4 mb-4">
            </div>
            <div class="col-6">
                <label>تکرار کلمه عبور :</label>
                <input type="text" class="form-control w-50 mt-4 mb-4">
            </div>
           <div class="col-6">
               <label>  وضعیت کاربر:</label>
               <br>
               <select class="form-select w-50 mt-4 mb-4" aria-label="Default select example" style="border-radius: 4px">
                   <option value="1" selected> غیر فعال</option>
                   <option value="2">فعال </option>
               </select>
           </div>
            <div class="col-6">
                <label>  اپلود عکس :</label>
                <br>
                <div class="custom-file w-50 mt-4 mb-4">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label text-center" for="customFile">Choose file</label>
                </div>
            </div>
            <br>
      <div class="mt-5 mr-4 col-12">
          <button class="btn btn-outline-success" type="button">افزودن</button>
          <a href="{{route('admin.user.customer.index')}}"> <button class="btn btn-outline-danger" type="button">بازگشت</button></a>
      </div>
        </form>

    </div>
    @endsection
