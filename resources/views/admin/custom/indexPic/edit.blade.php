@extends('admin.layout.master')
@section('head-tag')
    <title>ویرایش </title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">ویرایش </li>
@endsection

@section('content')


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#"> تنظیمات</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش تنظیمات</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section>
                <section class="main-body-container-header">
                    <h5>
                        ویرایش تنظیمات
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.custom.index-pic.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.custom.index-pic.update', $indexPage->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="name"> عنوان عکس</label>
                                    <input type="text" class="form-control form-control-sm" name="name" id="name"
                                        value="{{ old('name', $indexPage->name) }}">
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
