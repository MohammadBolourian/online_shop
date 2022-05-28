@extends('admin.layout.master')
@section('head-tag')
    <title> تنظیمات</title>
    @endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش تنظیمات</li>
@endsection

@section('content')
    <div class="img p-3 mt-2 row">
        <div class="col-5">
            <p class="d-inline">همه: </p><span class="d-inline">6</span>
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
            <button class="btn btn-outline-warning" type="button"> اعمال</button>
{{--             <a  href="{{route('admin.market.property.create')}}"> <button class="btn btn-outline-success" type="button">ایجاد فرم جدید </button></a>--}}
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
                    <th>عنوان سایت</th>
                    <th>توضیحات سایت</th>
                    <th>کلمات کلیدی سایت</th>
                    <th>لوگو سایت</th>
                    <th>آیکون سایت</th>
                    <th class="text-danger"> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>1</th>
                    <td>{{ $setting->title }}</td>
                    <td>{{ $setting->description }}</td>
                    <td>{{ $setting->keywords }}</td>
                    <td><img src="{{ asset($setting->logo ) }}" alt="" width="100" height="50"></td>
                    <td><img src="{{ asset($setting->icon ) }}" alt="" width="100" height="50"></td>
                    <td class="width-22-rem">
                        <a href="{{ route('admin.setting.edit', $setting->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    @endsection
