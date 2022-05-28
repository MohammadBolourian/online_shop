@extends('admin.layout.master')
@section('head-tag')
    <title> برند ها</title>
    @endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش فروش</li>
    <li class="breadcrumb-item active">برند ها</li>
@endsection

@section('content')
    <div class="img p-3 mt-2 row">
        <div class="col-5">
            <p class="d-inline">همه برندهاا : </p><span class="d-inline">6</span>
        </div>
        <div class="col-7">
            <div class="float-left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="نام برند را جستجو کنید">
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
             <a  href="{{route('admin.market.brand.create')}}"> <button class="btn btn-outline-success" type="button">ایجاد برند جدید </button></a>
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
                    <th class="text-center"><input id="checkAll" type="checkbox"></th>
                    <th colspan="2">نام</th>
                    <th>عکس برند</th>
                    <th class="text-danger"> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center"><input type="checkbox"></td>
                    <td colspan="2">
                        <h6>آرایشی و بهداشتی</h6>
                    </td>
                    <td>
                        <div class="d-flex align-items-center"><img src="{{asset('assets/img/1.jpg')}}" class="img-small "></div>
                    </td>

                    <td style="font-size: 25px"> <span><a href="edit-order.html"><i class="las la-edit"></i></a></span>
                        <span><a href="#"><i class="las la-trash"></i></a> </span>
                    </td>

                </tr>
                </tbody>
            </table>
        </div>
    </div>

    @endsection

@section('script')
    <script>
        $("#checkAll").click(function(){
            $('input:checkbox').prop('checked', this.checked);
        });
    </script>
@endsection
