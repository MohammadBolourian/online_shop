@extends('admin.layout.master')
@section('head-tag')
    <title> تنظیمات</title>
    @endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش اسلایدر</li>
@endsection

@section('content')
    <div class="img p-3 mt-2 row">
        <div class="col-5">
            <p class="d-inline">همه: </p><span class="d-inline">6</span>
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
            <button class="btn btn-outline-warning" type="button"> اعمال</button>
             <a  href="{{route('admin.custom.slider.create')}}"> <button class="btn btn-outline-success" type="button">ایجاد اسلاید جدید </button></a>
        </div>
    </div>
    <br>
    <br>
{{--        @dd($links[0]['link'])--}}

    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-striped table-dark text-white table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>عنوان </th>
                    <th>تصویر </th>
                    <th class="text-danger"> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sliders as $key => $slider)
                <tr>
                    <th>{{$key + 1}}</th>
                    <td>{{ $slider->name }}</td>

                    <td>
                        <img src="{{ asset($slider->image) }}" alt="" width="100" height="70">
                    </td>

                    <td style="font-size: 25px"> <span><a href="{{ route('admin.custom.slider.edit', $slider->id) }}"><i class="las la-edit"></i></a></span>
                        <form class="d-inline" action="{{ route('admin.custom.slider.destroy', $slider->id) }}" method="post">
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
