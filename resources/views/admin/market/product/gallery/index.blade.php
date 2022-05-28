@extends('admin.layout.master')
@section('head-tag')
    <title> لیست تصاویر</title>
    @endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">{{ $product->title }}</li>
    <li class="breadcrumb-item active"> لیست تصاویر</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card bg-dark">
                <div class="card-header">
                    <h3 class="card-title">تصاویر</h3>

                    <div class="card-tools d-flex">
                        <div class="btn-group-sm mr-1">
                            <a href="{{ route('admin.market.product.gallery.create' , ['product' => $product->id]) }}" class="btn btn-info">ثبت تصویر جدید</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        @foreach($images as $image)
                            <div class="col-sm-2">
                                <a href="{{ url($image->image) }}">
                                    <img src="{{ url($image->image) }}" class="img-fluid mb-2" alt="{{ ($image->alt) }}">
                                </a>
{{--                                <form action="{{ route('admin.market.product.gallery.destroy' , ['product' => $product->id , 'gallery' => $image->id]) }}" id="image-{{ $image->id }}" method="post">--}}
{{--                                    @method('delete')--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
                                <form action="{{ route('admin.market.product.gallery.destroy' ,  ['product' => $product->id , 'gallery' => $image->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger ml-1 delete">حذف</button>
                                </form>
                                <a href="{{ route('admin.market.product.gallery.edit' , ['product' => $product->id , 'gallery' => $image->id]) }}" class="btn btn-sm btn-primary">ویرایش</a>
{{--                                <a href="#" class="btn btn-sm btn-danger delete" onclick="document.getElementById('image-{{ $image->id }}').submit()">حذف</a>--}}
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.card-body -->
{{--                <div class="card-footer">--}}
{{--                    {{ $images->render() }}--}}
{{--                </div>--}}
            </div>
            <!-- /.card -->
        </div>
    </div>

    @endsection
@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
