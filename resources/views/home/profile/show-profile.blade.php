@extends('home.layout.master')
@section('head-tag')
    <title> مشاهده پروفایل</title>
@endsection
@section('content')
    <body>
    <br>
    <br>
    <div class="row col-md-12">
        <div class="col-md-4 bg-info p-4">
            <div class="text-center">
                @if( (session('LoggedUserInfo'))['LoggedUserInfo']['profile_photo_path'] )
                <img class="rounded w-25" src="{{ asset( (session('LoggedUserInfo'))['LoggedUserInfo']['profile_photo_path'] ) }}">
                @else
                    <img class="rounded w-25" src="{{asset('assets/img/av1.png')}}">
                @endif
                <div class="text-center">
                    <span class="d-block mt-4"> {{$user->fullname}}</span>
                </div>
                <div>
                    <hr>
                </div>
                    @include('home.profile.profile-links')
            </div>
        </div>
        <div class="col-md-8 bg-secondary p-4">
            <div class="container">
                <div class="edit-profile">
                    <h6>بروزرسانی پروفایل</h6>
                    <div class="seprator"></div>
                    <h6 class="mb-4">اطلاعات شخصی</h6>
                    <form action="{{ route('user.update',$user->id) }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        {{ method_field('put') }}
                        <div class="form-group">
                            <label class="w-10" >نام :</label>
                            <input type="text" class="form-control input-profile" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}">
                            <span class="error text-danger"></span>
                        </div>
                        @error('first_name')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                        @enderror
                        <div class="form-group">
                            <label class="w-10" >فامیل :</label>
                            <input type="text" class="form-control input-profile" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}">
                            <span class="error text-danger"></span>
                        </div>
                        @error('last_name')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                        @enderror

                        <div class="form-group">
                            <label class="w-10" >ایمیل :</label>
                            <input type="email" class="form-control input-profile" name="email" id="email" value="{{ old('email', $user->email) }}">
                            <span class="error text-danger"></span>
                        </div>
                        @error('email')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                        @enderror

                        <div class="form-group">
                            <label class="w-10" >شماره همراه :</label>
                            <input type="text" class="form-control input-profile" name="phone" id="phone" value="{{ old('phone', $user->phone) }}">
                            <span class="error text-danger"></span>
                        </div>
                        @error('phone')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                        @enderror



                        <div>
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
                        <br>
                        <br>
                        <div>
                            <hr>
                        </div>
                        <br>
                        <div class="float-left ml-5">
                            <button type="submit" class="btn btn-outline-success">ثبت تغییرات</button>

                            <a href="{{ route('home') }}" ><button type="button" class="btn btn-outline-danger">لغو</button></a>
                        </div>

                        <br>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
