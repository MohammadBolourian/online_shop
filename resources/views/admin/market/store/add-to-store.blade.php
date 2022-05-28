@extends('admin.layout.master')
@section('head-tag')
    <title>اضافه کردن به انبار</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش فروش</li>
    <li class="breadcrumb-item "><a href={{route('admin.market.store.index')}}>انبار</a></li>
    <li class="breadcrumb-item active">اضافه کردن به انبار</li>
@endsection

@section('content')
    <div class="col-12">
        <h5>اضافه کردن به انبار</h5>
        <br>
        <form class="form-group row">
          <div class="col-6 mt-5">
              <label>نام تحویل گیرنده:</label>
              <input type="text" class="form-control">
          </div>
          <div class="col-6 mt-5">
              <label>نام تحویل دهنده:</label>
              <input type="text" class="form-control">
          </div>
          <div class="col-6 mt-5">
              <label>تعداد :</label>
              <input type="text" class="form-control">
          </div>
          <div class="col-12 mt-5">
              <label>توضیحات :</label>
              <textarea rows="4" class="form-control"></textarea>
          </div>

        <br>
        <br>
        <div class="mt-5 mr-4">
            <button class="btn btn-outline-success" type="button">افزودن</button>
            <a href="{{route('admin.market.store.index')}}"> <button class="btn btn-outline-danger" type="button">بازگشت</button></a>
        </div>
        </form>

    </div>
    @endsection
