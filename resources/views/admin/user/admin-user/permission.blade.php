@extends('admin.layout.master')
@section('head-tag')
    <title> دسترسی</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">ایجاد  دسترسی</li>
@endsection

@section('content')
    <div class="col-12">
        <h5> ایجاد  دسترسی</h5>
        <br>
        <section>
            <form action="{{ route('admin.user.admin-user.permissions.store' ,$user->id) }}" method="post" >
                @csrf
                <section class="row">

                    <section class="col-12 row p-4">
                        <div class="col-6"> نام مدیر : {{$user->first_name}}</div>
                        <div class="col-6">  فامیل :{{$user->last_name}} </div>
                        <div class="col-6">  شماره موبایل :{{$user->phone}} </div>
                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">انتخاب نقش</label>
                            <select name="roles" id="" class="form-control form-control-sm">
                                <option value="">دسته را انتخاب کنید</option>
                                @foreach (\App\Models\Acl\role::all() as $role)
                                    <option value="{{ $role->id }}"  {{ in_array($role->id , $user->roles->pluck('id')->toArray()) ? 'selected' : '' }} >{{ $role->name }} - {{ $role->description }}</option>
                                @endforeach

                            </select>
                        </div>
                        @error('roles')
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

