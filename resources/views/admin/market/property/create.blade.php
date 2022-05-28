@extends('admin.layout.master')
@section('head-tag')
    <title> ایجاد فرم کالا</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش فروش</li>
    <li class="breadcrumb-item "><a href={{route('admin.market.property.index')}}>فرم کالا </a></li>
    <li class="breadcrumb-item active">ایجاد فرم کالا</li>
@endsection

@section('content')
    <div class="col-12">
        <h5>افزودن فرم کالا</h5>
        <br>
        <form class="form-group">
            <label>نام فرم:</label>
            <input type="text" class="form-control w-50">
            <br>
            <br>
            <label> فرم والد:</label>
            <br>
        <select class="form-select w-50" aria-label="Default select example" style="border-radius: 4px">
            <option selected>دسته بندی مادر</option>
            <option value="1">کالای دیجیتال</option>
            <option value="2">موسیقی </option>
        </select>
        <p class="mt-4 small">با انتخاب یک سرپرست (والد) می‌توانید سلسله‌مراتب بسازید. برای نمونه، «موسیقی» می‌تواند به عنوان سرپرست «موسیقی سنتی» باشد.</p>
        <br>
        <br>
        <button class="btn btn-outline-success" type="button">افزودن</button>
           <a href="{{route('admin.market.property.index')}}"> <button class="btn btn-outline-danger" type="button">بازگشت</button></a>
        </form>

    </div>
    @endsection
