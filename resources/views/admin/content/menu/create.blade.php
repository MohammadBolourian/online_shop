@extends('admin.layout.master')
@section('head-tag')
    <title>اضافه کردن منو جدید </title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش محتوی</li>
    <li class="breadcrumb-item "><a href={{route('admin.content.menu.index')}}> منو</a></li>
    <li class="breadcrumb-item active">ایجاد منو </li>
@endsection

@section('content')
    <div class="col-12">
        <h5>افزودن  منو جدید</h5>
        <br>
        <section>
            <form action="{{ route('admin.content.menu.store') }}" method="post">
                @csrf
                <section class="row">

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">عنوان منو</label>
                            <input type="text" name="name" class="form-control form-control-sm" value="{{ old('name') }}">
                        </div>
                        @error('name')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">منو والد</label>
                            <select name="parent_id" id="" class="form-control form-control-sm">
                                <option value="">منوی اصلی</option>
                                @foreach ($menus as $menu)

                                    <option value="{{ $menu->id }}"  @if(old('parent_id') == $menu->id) selected @endif>{{ $menu->name }}</option>

                                @endforeach

                            </select>
                        </div>
                        @error('parent_id')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">آدرس URL</label>
                            <input type="text" name="url" value="{{ old('url') }}" class="form-control form-control-sm">
                        </div>
                        @error('url')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="status">وضعیت</label>
                            <select name="status" id="" class="form-control form-control-sm" id="status">
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


                    <section class="col-12">
                        <button class="btn btn-primary btn-sm">ثبت</button>
           <a href="{{route('admin.content.menu.index')}}"> <button class="btn btn-outline-danger" type="button">بازگشت</button></a>
                    </section>
                </section>
            </form>
        </section>
    </div>
    @endsection
