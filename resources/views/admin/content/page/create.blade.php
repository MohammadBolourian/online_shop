@extends('admin.layout.master')
@section('head-tag')
    <title>اضافه کردن پیج جدید </title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش محتوی</li>
    <li class="breadcrumb-item "><a href={{route('admin.content.page.index')}}> چیج ساز</a></li>
    <li class="breadcrumb-item active">ایجاد پیج </li>
@endsection

@section('content')
    <div class="col-12">
        <h5>افزودن  پیج جدید</h5>
        <br>
        <form action="{{ route('admin.content.page.store') }}" method="post" id="form">
            @csrf
            <section class="row">

                <section class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">عنوان </label>
                        <input type="text" name="title"  value="{{ old('title') }}" class="form-control form-control-sm">
                    </div>
                    @error('title')
                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                    @enderror
                </section>


                <section class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="tags">تگ ها</label>
                        <input type="hidden" class="form-control form-control-sm"  name="tags" id="tags" value="{{ old('tags') }}">
                        <select class="select2 form-control form-control-sm" id="select_tags" multiple>

                        </select>
                    </div>
                    @error('tags')
                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                    @enderror
                </section>

                <section class="col-12">
                    <div class="form-group">
                        <label for="status">وضعیت</label>
                        <select name="status"  class="form-control form-control-sm" id="status">
                            <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                            <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
                        </select>
                    </div>
                    @error('status')
                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                    @enderror
                </section>

                <section class="col-12">
                    <div class="form-group">
                        <label for="">محتوی</label>
                        <textarea name="body" id="body"  class="form-control form-control-sm" rows="6">{{ old('body') }}</textarea>
                    </div>
                    @error('body')
                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                    @enderror
                </section>

                <section class="col-12">
                    <button class="btn btn-primary btn-sm">ثبت</button>
                </section>
            </section>
        </form>
    </div>
    @endsection
@section('script')

    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
    </script>

    <script>
        $(document).ready(function () {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if(tags_input.val() !== null && tags_input.val().length > 0)
            {
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder : 'لطفا تگ های خود را وارد نمایید',
                tags: true,
                data: default_data
            });
            select_tags.children('option').attr('selected', true).trigger('change');


            $('#form').submit(function ( event ){
                if(select_tags.val() !== null && select_tags.val().length > 0){
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            })
        })
    </script>

@endsection
