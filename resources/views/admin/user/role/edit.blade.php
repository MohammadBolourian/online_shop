@extends('admin.layout.master')
@section('head-tag')
    <title> ویرایش نقش </title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">کاربران</li>
    <li class="breadcrumb-item "><a href={{route('admin.user.role.index')}}> نقش ها </a></li>
    <li class="breadcrumb-item active">ویرایش  نقش</li>
@endsection

@section('content')
    <div class="col-12">
        <h5> ویرایش  نقش </h5>
        <br>
        <form action="{{ route('admin.user.role.update', $role->id) }}" method="POST"  id="form">
            {{ method_field('put') }}
            @csrf

            <section class="row">

                <section class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">عنوان - انگلیسی وارد شود</label>
                        <input type="text" class="form-control form-control-sm" name="name" value="{{ old('name',$role->name) }}">
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
                        <input type="text" class="form-control form-control-sm" name="description" value="{{ old('description',$role->description) }}">
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
                    @php  $x = 0 @endphp
                        @foreach($permissions as $permission)
                            @if((is_array(old('permissions')) && in_array($permission->id , old('permissions'))))   @php  $x = 1 @endphp
                                @endif
                    @endforeach
                    @foreach($permissions as $permission)
                        @if($x==1)
                            <div class="col">
                                <label><input type="checkbox" name="permissions[]" value="{{$permission->id}}"
                                                {{(is_array(old('permissions')) && in_array($permission->id , old('permissions')))
                                                  ?  ' checked' :
                                                    '' }}
                                    > {{$permission->description}}
                                </label>
                            </div>
                            @else
                            <div class="col">
                                <label><input type="checkbox" name="permissions[]" value="{{$permission->id}}"
                                        {{in_array($permission->id , $role->permissions->pluck('id')->toArray()) ? 'checked' : ''
                                           }}
                                    > {{$permission->description}}
                                </label>
                            </div>
                        @endif
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
