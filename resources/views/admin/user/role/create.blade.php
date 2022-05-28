@extends('admin.layout.master')
@section('head-tag')
    <title> ایجاد نقش </title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">کاربران</li>
    <li class="breadcrumb-item "><a href={{route('admin.user.role.index')}}> نقش ها </a></li>
    <li class="breadcrumb-item active">ایجاد  نقش</li>
@endsection

@section('content')
    <div class="col-12">
        <h5> ایجاد  نقش </h5>
        <br>
        <form action="{{ route('admin.user.role.store') }}" method="POST"  id="form">
            @csrf
            <section class="row">

                <section class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">عنوان - انگلیسی وارد شود</label>
                        <input type="text" class="form-control form-control-sm" name="name" value="{{ old('name') }}">
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
                        <label for="">توضیحات </label>
                        <input type="text" class="form-control form-control-sm" name="description" value="{{ old('description') }}">
                    </div>
                    @error('description')
                    <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                    @enderror
                </section>
                    <h3 class="mt-5">دسترسی ها </h3>
                <div class="row col-12 mt-5 bg-dark p-5">
                    @foreach($permissions as $permission)
                    <div class="col">
                        <label><input type="checkbox" name="permissions[]" value="{{$permission->id}}"  {{(is_array(old('permissions')) && in_array($permission->id, old('permissions'))) ? 'checked' : '' }}> {{$permission->description}}
                        </label>
                    </div>
                        @endforeach
                        @error('permissions')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                </div>

                <section class="col-12 mt-4">
                    <button class="btn btn-outline-success">ثبت</button>
                    <a href="{{route('admin.user.role.index')}}"> <button class="btn btn-outline-danger" type="button">بازگشت</button></a>
                </section>
            </section>


        </form>


    </div>
    @endsection
