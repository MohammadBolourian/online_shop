@extends('admin.layout.master')
@section('head-tag')
    <title>ادمین جدید</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">ایجاد ادمین جدید</li>
@endsection

@section('content')
    <div class="col-12">
        <h5> ایجاد ادمین جدید</h5>
        <br>
        <section>
            <form action="{{ route('admin.user.admin-user.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <section class="row">

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for=""> نام</label>
                            <input type="text" name="first_name" class="form-control form-control-sm"
                                   value="{{ old('first_name') }}">
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
                                   value="{{ old('last_name') }}">
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
                                   value="{{ old('phone') }}">
                        </div>
                        @error('phone')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                        @enderror
                    </section>

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
{{--                    <section class="col-12 col-md-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">انتخاب نقش</label>--}}
{{--                            <select name="role_id" id="" class="form-control form-control-sm">--}}
{{--                                <option value="">دسته را انتخاب کنید</option>--}}
{{--                                @foreach ($roles as $role)--}}
{{--                                    <option value="{{ $role->id }}" @if(old('role_id') == $role->id) selected @endif>{{ $role->name }}</option>--}}
{{--                                @endforeach--}}

{{--                            </select>--}}
{{--                        </div>--}}
{{--                        @error('role_id')--}}
{{--                        <span class=" bg-danger text-white p-1 rounded" role="alert">--}}
{{--                                <strong>--}}
{{--                                    {{ $message }}--}}
{{--                                </strong>--}}
{{--                            </span>--}}
{{--                        @enderror--}}
{{--                    </section>--}}
                    <section class="col-12">
                        <div class="form-group">
                            <label for="status">وضعیت</label>
                            <select name="status" id="" class="form-control form-control-sm" id="status">
                                <option value="0" @if (old('status') == 0) selected @endif>غیرفعال</option>
                                <option value="1" @if (old('status') == 1) selected @endif>فعال</option>
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

