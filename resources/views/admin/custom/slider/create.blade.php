@extends('admin.layout.master')
@section('head-tag')
    <title>ایجاد اسلاید جدید </title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">ایجاد اسلاید جدید </li>
@endsection

@section('content')


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#"> تنظیمات</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">  اسلایدر</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section>
                <section class="main-body-container-header">
                    <h5>
                         ایجاد اسلاید جدید
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.custom.slider.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.custom.slider.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <section class="row">

                            <section class="col-6 my-2">
                                <div class="form-group">
                                    <label for="name"> عنوان عکس</label>
                                    <input type="text" class="form-control form-control-sm" name="name" id="name"
                                        value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <span class=" bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="image">تصویر</label>
                                    <input type="file" class="form-control form-control-sm" name="image" id="image">
                                </div>
                                @error('image')
                                <span class=" bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 my-3">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

@endsection
