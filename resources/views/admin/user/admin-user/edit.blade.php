@extends('admin.layout.master')
@section('head-tag')
    <title>ویرایش ادمین </title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">ویرایش ادمین </li>
@endsection

@section('content')
    <div class="col-12">
        <h5> ویرایش ادمین </h5>
        <br>
        <section>
            <form action="{{ route('admin.user.admin-user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                {{ method_field('put') }}
                @csrf
                <section class="row">

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for=""> نام</label>
                            <input type="text" name="first_name" class="form-control form-control-sm"
                                   value="{{ old('first_name', $user->first_name) }}">
                        </div>
                        @error('first_name')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                        @enderror
                    </section>
                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for=""> فامیل</label>
                            <input type="text" name="last_name" class="form-control form-control-sm"
                                   value="{{ old('last_name',$user->last_name) }}">
                        </div>
                        @error('last_name')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                        @enderror
                    </section>
                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for=""> موبایل</label>
                            <input type="text" name="phone" class="form-control form-control-sm"
                                   value="{{ old('phone',$user->phone) }}">
                        </div>
                        @error('phone')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                        @enderror
                    </section>

                    <div class="form-group col-6">
                        <label class="w-10" >کد ملی :</label>
                        <input type="text" class="form-control input-profile" name="national_code" id="national_code" value="{{ old('national_code', $user->national_code) }}">
                        <span class="error text-danger"></span>
                    </div>
                    @error('national_code')
                    <span class=" bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                    @enderror

                    <div class="col-6">
                        <label class="w-25" >آپلود عکس پروفایل :</label>
                        <input type="file" id="profile_photo_path" name="profile_photo_path">
                    </div>
                    @error('profile_photo_path')
                    <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                    @enderror

                    <section class="col-12">
                        <div class="form-group">
                            <label for="status">وضعیت</label>
                            <select name="status" class="form-control form-control-sm" id="status">
                                <option value="0" @if (old('status',$user->status) == 0) selected @endif>غیرفعال</option>
                                <option value="1" @if (old('status', $user->status) == 1) selected @endif>فعال</option>
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

                    <section class="col-12">
                        <button class="btn btn-outline-success">ثبت</button>
                        <a href="{{route('admin.user.admin-user.index')}}"> <button class="btn btn-outline-danger" type="button">بازگشت</button></a>
                    </section>
                </section>
            </form>
        </section>

    </div>
@endsection

