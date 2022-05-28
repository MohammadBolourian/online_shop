@extends('admin.layout.master')
@section('head-tag')
    <title> پرداخت ها</title>
    @endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش فروش</li>
    <li class="breadcrumb-item active">پرداخت ها</li>
@endsection

@section('content')
    <div class="img p-3 mt-2 row">
        <div class="col-5">
            <p class="d-inline">همه پرداخت ها : </p><span class="d-inline">6</span>
        </div>
        <div class="col-7">
            <div class="float-left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder=" جستجو کنید">
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
{{--             <a  href="{{route('admin.market.brand.create')}}"> <button class="btn btn-outline-success" type="button">ایجاد برند جدید </button></a>--}}
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
                    <th> کد تراکنش</th>
                    <th>  بانک</th>
                    <th> پرداخت کننده</th>
                    <th>وضعیت پرداخت</th>
                    <th> نوع پرداخت</th>
                    <th class="text-danger"> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <h6>1</h6>
                    </td>
                    <td>
                        <h6>156461</h6>
                    </td>
                    <td>
                        <h6>ملت</h6>
                    </td>
                    <td>
                        <h6>علی بابا</h6>
                    </td>
                    <td>
                        <h6>پرداخت شده</h6>
                    </td>
                    <td>
                        <h6>انلاین</h6>
                    </td>
                    <td>
                        <button class="btn btn-success">مشاهده</button>
                        <button class="btn btn-danger">باطل کردن</button>
                        <button class="btn btn-warning">بازگرداندن</button>
                    </td>

                </tr>
                </tbody>
            </table>
        </div>
    </div>

    @endsection

