@extends('admin.layout.master')
@section('head-tag')
    <title>نقش ها</title>
    @endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">کاربران</li>
    <li class="breadcrumb-item active">نقش ها </li>
@endsection

@section('content')
    <div class="img p-3 mt-2 row">
        <div class="col-5">
            <p class="d-inline">همه : </p><span class="d-inline">6</span>
        </div>
        <div class="col-7">
            <div class="float-left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="نام جستجو کنید">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-success" type="button"> جستجو کن</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="img p-3 row">
        <div class="col">
            <select class="form-select" aria-label="Default select example" style="border-radius: 4px">
                <option selected>کارهای دسته جمعی</option>
                <option value="1">حذف</option>
            </select>
            <button class="btn btn-outline-warning" type="button"> اعمال</button>
             <a  href="{{route('admin.user.role.create')}}"> <button class="btn btn-outline-success" type="button">ایجاد نقش جدید </button></a>
        </div>
        <div class="col ">
            <ul class = "pagination float-left">
                <li class = "page-item"> <a class="page-link" href="#"> << </a> </li>
                <li class = "page-item"> <a class="page-link" href="#"> 1 </a> </li>
                <li class = "page-item"> <a class="page-link" href="#"> 2 </a> </li>
                <li class = "page-item"> <a class="page-link" href="#"> 3 </a> </li>
                <li class = "page-item"> <a class="page-link" href="#"> 4 </a> </li>
                <li class = "page-item"> <a class="page-link" href="#"> >> </a> </li>
            </ul>
        </div>
    </div>
    <br>
    <br>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-striped table-dark text-white table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th> نام نقش</th>
                    <th>دسترسی ها</th>
                    <th class="text-danger"> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $key => $role)
                <tr>
                    <td>
                        <h6>{{$key + 1 }} </h6>
                    </td>
                    <td>
                        <h6>{{$role->description}}</h6>
                    </td>
                    <td class="d-flex flex-column">
                        @foreach($role->permissions as $permission)
                        <h6> {{$permission->description}}</h6>
                            @endforeach
                    </td>
                    <td style="font-size: 25px"> <span><a href="{{ route('admin.user.role.edit', $role->id) }}"><i class="las la-edit"></i></a></span>
                        <form class="d-inline" action="{{ route('admin.user.role.destroy', $role->id) }}" method="post">
                            @csrf
                            {{ method_field('delete') }}
                            <button class="btn-danger bg-transparent delete" type="submit"><i class="las la-trash"></i> </button>
                        </form>
                    </td>


                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endsection

@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
    @endsection
