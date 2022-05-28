@extends('admin.layout.master')
@section('head-tag')
    <title> تیکت</title>
    @endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش تیکت</li>
    <li class="breadcrumb-item active">تیکت ها</li>
@endsection

@section('content')
    <div class="img p-3 mt-2 row">
        <div class="col-5">
            <p class="d-inline">همه تیکت ها: </p><span class="d-inline">6</span>
        </div>
        <div class="col-7">
            <div class="float-left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="نام را جستجو کنید">
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
                    <th>نویسنده تیکت</th>
                    <th>عنوان تیکت </th>
                    <th> دسته تیکت</th>
                    <th> اولویت تیکت</th>
                    <th> ارجاع شده از</th>
                    <th class="text-danger"> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <h6> محمد </h6>
                    </td>
                    <td>
                        <div class="d-flex align-items-center"><span class="ml-2">خرید</span></div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center"><span class="ml-2">دسته فروش</span></div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center"><span class="ml-2">فوری</span></div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center"><span class="ml-2">-</span></div>
                    </td>
                    <td style="font-size: 25px"> <button type="button" class="btn btn-success"><a href="{{route('admin.ticket.show')}}"><i class="las la-edit"></i> نمایش</a> </button>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>
    </div>

    @endsection

