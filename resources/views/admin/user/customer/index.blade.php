@extends('admin.layout.master')
@section('head-tag')
    <title>مشتری</title>
    @endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">کاربران</li>
    <li class="breadcrumb-item active">مشنری </li>
@endsection

@section('content')
    <div class="img p-3 mt-2 row">
        <div class="col-5">
            <p class="d-inline">همه مشتری ها: </p><span class="d-inline">6</span>
        </div>
        <div class="col-7">
            <div class="float-left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="نام جستجو کنید">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-success" type="button"> جستجو کن</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="img p-3 row">
        <div class="col">
            <select class="form-select" aria-label="Default select example" style="border-radius: 4px">
                <option selected>کارهای دسته جمعی</option>
                <option value="1">حذف</option>
            </select>
            <button class="btn btn-outline-warning" type="button"> اعمال</button>
             <a  href="{{route('admin.user.customer.create')}}"> <button class="btn btn-outline-success" type="button">ایجاد مشتری جدید </button></a>
        </div>
        <div class="col ">
            <ul class = "pagination float-left">
                <li class = "page-item"> <a class="page-link" href="#"> << </a> </li>
                <li class = "page-item"> <a class="page-link" href="#"> 1 </a> </li>
                <li class = "page-item"> <a class="page-link" href="#"> 2 </a> </li>
                <li class = "page-item"> <a class="page-link" href="#"> 3 </a> </li>
                <li class = "page-item"> <a class="page-link" href="#"> 4 </a> </li>
                <li class = "page-item"> <a class="page-link" href="#"> >> </a> </li>
            </ul>
        </div>
    </div>
    <br>
    <br>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-striped table-dark text-white table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th> نام</th>
                    <th> نام خانوادگی</th>
                    <th> ایمیل</th>
                    <th>شماره موبایل </th>
                    <th>کدملی</th>
                    <th class="text-danger"> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <h6>1</h6>
                    </td>
                    <td>
                        <h6>محمد</h6>
                    </td>
                    <td>
                        <h6>محمدی</h6>
                    </td>
                    <td>
                        <h6>mamad@sad.com</h6>
                    </td>
                    <td>
                        <h6>+98-12365478</h6>
                    </td>
                    <td>
                        <h6>078028</h6>
                    </td>
                    <td>
                        <span>
                            <button class="btn btn-warning">ویرایش</button>
                            <button class="btn btn-danger">حذف</button>
                        </span>
                    </td>

                </tr>
                </tbody>
            </table>
        </div>
    </div>

    @endsection
