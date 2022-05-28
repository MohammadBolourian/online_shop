@extends('admin.layout.master')
@section('head-tag')
    <title> لیست تصاویر</title>
    @endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">{{ $product->title }}</li>
    <li class="breadcrumb-item active"> ثبت تصاویر</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card bg-dark">
                <div class="card-header">
                    <h3 class="card-title">ثبت تصاویر</h3>

                    <form class="form-horizontal" action="{{ route('admin.market.product.gallery.store' , ['product' => $product->id]) }}" method="POST">
                        @csrf

                        <div class="card-body">
                            <div id="images_section">

                            </div>
                            <button class="btn btn-sm btn-danger" type="button" id="add_product_image">تصویر جدید</button>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">ثبت تصاویر</button>
                            <a href="{{ route('admin.market.product.gallery.index' , ['product' => $product->id]) }}" class="btn btn-danger float-left ">لغو</a>
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
            let createNewPic = ({ id }) => {
                return `
                    <div class="row image-field" id="image-${id}">
                        <div class="col-5">
                            <div class="form-group">
                                 <label>تصویر</label>
                                 <div class="input-group">
                                    <input type="text" class="form-control image_label" name="images[${id}][image]"
                                           aria-label="Image" aria-describedby="button-image">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-success button-image" type="button">انتخاب</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                 <label>عنوان تصویر</label>
                                 <input type="text" name="images[${id}][alt]" class="form-control">
                            </div>

                        </div>
                         <div class="col-2">
                            <label >اقدامات</label>
                            <div>
                                <button type="button" class="btn btn-sm btn-warning" onclick="document.getElementById('image-${id}').remove()">حذف</button>
                            </div>
                        </div>
                    </div>
                `
            }

            $('#add_product_image').click(function() {
                let imagesSection = $('#images_section');
                let id = imagesSection.children().length;

                imagesSection.append(
                    createNewPic({
                        id
                    })
                );

            });
            $('#add_product_image').click();


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
