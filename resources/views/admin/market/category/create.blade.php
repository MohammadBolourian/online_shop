@extends('admin.layout.master')
@section('head-tag')
    <title>دسته بندی</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش فروش</li>
    <li class="breadcrumb-item "><a href={{route('admin.market.category.index')}}>دسته بندی</a></li>
    <li class="breadcrumb-item active">ایجاد دسته بندی</li>
@endsection

@section('content')
    <div class="col-12">
        <h5>افزودن دسته بندی</h5>
        <br>
        <form class="form-horizontal" action="{{ route('admin.market.category.store') }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">دسته مرتبط</label>
                    <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="نام دسته را وارد کنید">
                </div>
                @if(request('parent'))
                    @php
                        $parent = \App\Models\Market\Category::find(request('parent'))
                    @endphp
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">نام دسته</label>
                        <input type="text" class="form-control" id="inputEmail3" disabled value="{{ $parent->name }}">
                        <input type="hidden" name="parent" value="{{ $parent->id }}">
                    </div>
                @endif
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">ثبت دسته</button>
                <a  href="{{ route('admin.market.category.index') }}" class="btn btn-danger float-left">لغو</a>
            </div>
            <!-- /.card-footer -->
        </form>

    </div>
    @endsection
