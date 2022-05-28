@extends('admin.layout.master')
@section('head-tag')
    <title> محصولات</title>
    @endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش فروش</li>
    <li class="breadcrumb-item active"> محصولات</li>
@endsection

@section('content')
    <div class="img p-3 mt-2 row">
        <div class="col-5">
            <p class="d-inline">همه محصولات : </p><span class="d-inline">6</span>
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
             <a  href="{{route('admin.market.product.create')}}"> <button class="btn btn-outline-success" type="button">ایجاد محصول جدید </button></a>
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
                    <th>آیدی محصول</th>
                    <th>نام محصول</th>
                    <th> قیمت</th>
                    <th>تصویر محصول</th>
                    <th>تعداد موجودی</th>

                    {{--{--                                <th>تعداد نظرات</th>--}}
                    <th>اسلاگ</th>
                    <th>تعداد بازدید</th>
                    <th class="text-success"> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $key=> $product)
                    <tr>
                        <td>{{ $key +1 }}</td>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ number_format($product->price) }}</td>
                        <td>
{{--                            <img src="{{ asset($postCategory->image['indexArray']['small']) }}" alt="" width="100" height="50">--}}
                            <img src="{{ asset($product->image['indexArray']['small'] ) }}" alt="" width="100" height="50">
                        </td>
                        <td>{{ $product->inventory }}</td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ $product->view_count }}</td>
                        <td class="d-flex">
                                <form action="{{ route('admin.market.product.destroy' , $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger ml-1 delete">حذف</button>
                                </form>
                                <a href="{{ route('admin.market.product.edit' , $product->id) }}" class="btn btn-sm btn-primary ml-1">ویرایش</a>
                            <a href="{{ route('admin.market.product.gallery.index' , $product->id ) }}" class="btn btn-sm btn-warning ml-1">گالری تصاویر</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endsection
@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
