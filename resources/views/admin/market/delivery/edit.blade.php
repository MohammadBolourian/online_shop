@extends('admin.layout.master')
@section('head-tag')
    <title> ایجاد روش های ارسال جدید</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش فروش</li>
    <li class="breadcrumb-item "><a href={{route('admin.market.delivery.index')}}> روش های ارسال</a></li>
    <li class="breadcrumb-item active">  ایجاد روش های ارسال جدید</li>
@endsection

@section('content')
    <div class="col-12">
        <h5> ایجاد روش های ارسال جدید</h5>
        <br>
        <form action="{{ route('admin.market.delivery.update' , $delivery->id) }}" method="post" id="form">
            {{ method_field('put') }}
            @csrf
            <section class="row">
                <section class="col-12 col-md-6 my-2">
                    <div class="form-group">
                        <label for="name">نام </label>
                        <input type="text" class="form-control form-control-sm" name="name" id="name" value="{{ old('name', $delivery->name) }}">
                    </div>
                    @error('name')
                    <span class="bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                    @enderror
                </section>
                <section class="col-12 col-md-6 my-2">
                    <div class="form-group">
                        <label for="amount">هزینه ارسال </label>
                        <input type="text" class="form-control form-control-sm" name="amount" id="amount" value="{{ old('amount', $delivery->amount) }}">
                    </div>
                    @error('amount')
                    <span class="bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                    @enderror
                </section>
                <section class="col-12 col-md-6 my-2">
                    <div class="form-group">
                        <label for="delivery_time"> مقدار زمانی ارسال </label>
                        <input type="text" class="form-control form-control-sm" name="delivery_time" id="delivery_time" value="{{ old('delivery_time' , $delivery->delivery_time) }}">
                    </div>
                    @error('delivery_time')
                    <span class="bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                    @enderror
                </section>
                <section class="col-12 col-md-6 my-2">
                    <div class="form-group">
                        <label for="delivery_time_unit">واحد مقدار زمانی ارسال </label>
                        <input type="text" class="form-control form-control-sm" name="delivery_time_unit" id="delivery_time_unit" value="{{ old('delivery_time_unit',$delivery->delivery_time_unit) }}">
                    </div>
                    @error('delivery_time_unit')
                    <span class="bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                    @enderror
                </section>
                <section class="col-12 col-md-6 my-2">
                    <div class="form-group">
                        <label for="status">وضعیت</label>
                        <select name="status" class="form-control form-control-sm" id="status">
                            <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                            <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
                        </select>
                    </div>
                    @error('status')
                    <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                    @enderror
                </section>

            </section>
            <section class="col">
                <button class="btn btn-outline-success" type="submit">ویرایش</button>
                <a href="{{route('admin.market.delivery.index')}}"> <button class="btn btn-outline-danger" type="button">بازگشت</button></a>
            </section>
        </form>

    </div>
    @endsection
