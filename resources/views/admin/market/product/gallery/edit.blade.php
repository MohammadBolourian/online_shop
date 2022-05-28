@extends('admin.layout.master')
@section('head-tag')
    <title> لیست تصاویر</title>
    @endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">{{ $product->title }}</li>
    <li class="breadcrumb-item active"> ویرایش تصاویر</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card bg-dark">
                <div class="card-header">
                    <h3 class="card-title">ویرایش تصاویر</h3>

                    <form class="form-horizontal" action="{{ route('admin.market.product.gallery.update' , ['product' => $product->id, 'gallery' => $gallery->id ]) }}" method="POST">
                        @csrf
                        @method('put')

                        <div class="card-body bg-dark">
                            <div id="images_section">
                                <div class="row image-field">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label>تصویر</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control image_label" name="image" value="{{ old('image' , $gallery->image) }}"
                                                       aria-label="Image" aria-describedby="button-image">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary button-image" type="button">انتخاب</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label>عنوان تصویر</label>
                                            <input type="text" name="alt" class="form-control" value="{{ old('alt' , $gallery->alt) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">ویرایش تصاویر</button>
                            <a href="{{ route('admin.market.product.gallery.index' , ['product' => $product->id]) }}" class="btn btn-danger float-left">لغو</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>

            </div>
            <!-- /.card -->
        </div>
    </div>

    @endsection
@section('script')

    <script>
        // input
        let image;
        $('body').on('click','.button-image' , (event) => {
            event.preventDefault();

            image = $(event.target).closest('.image-field');

            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });

        // set file link
        function fmSetLink($url) {
            image.find('.image_label').first().val($url);
        }
    </script>

@endsection
