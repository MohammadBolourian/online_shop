@extends('admin.layout.master')
@section('head-tag')
    <title>دسته بندی</title>
    @endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش فروش</li>
    <li class="breadcrumb-item active">دسته بندی</li>
@endsection

@section('content')
    <div class="img p-3 mt-2 row">
        <div class="col-5">
            <p class="d-inline">همه دسته ها : </p><span class="d-inline">6</span>
        </div>
        <div class="col-7">
            <div class="float-left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="نام دسته را جستجو کنید">
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
             <a  href="{{route('admin.market.category.create')}}"> <button class="btn btn-outline-success" type="button">ایجاد دسته جدید </button></a>
        </div>
        <div class="col ">
            {{ $categories->links('vendor.pagination.custom') }}
        </div>
    </div>
    <br>
    <br>
    <div class="col-12">
        <div class="table-responsive">
            @include('admin.market.category.categories-group' , ['categories' => $categories])
        </div>
    </div>

    @endsection


