@extends('admin.layout.master')
@section('head-tag')
    <title>ویرایش  پست </title>
    <link rel="stylesheet" href="{{ asset('assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش محتوی</li>
    <li class="breadcrumb-item "><a href={{route('admin.content.post.index')}}> پست ها</a></li>
    <li class="breadcrumb-item active">ویرایش پست  </li>
@endsection

@section('content')
    <div class="col-12">
        <h5>ویرایش پست </h5>
        <br>
        <section>
            <form action="{{ route('admin.content.post.update', $post->id) }}" method="POST" enctype="multipart/form-data" id="form">
                @csrf
                {{ method_field('put') }}
                <section class="row">

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">عنوان پست</label>
                            <input type="text" class="form-control form-control-sm" name="title" value="{{ old('title', $post->title) }}">
                        </div>
                        @error('title')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">انتخاب دسته</label>
                            <select name="category_id" id="" class="form-control form-control-sm">
                                <option value="">دسته را انتخاب کنید</option>
                                @foreach ($postCategories as $postCategory)
                                    <option value="{{ $postCategory->id }}" @if(old('category_id', $post->category_id) == $postCategory->id) selected @endif>{{ $postCategory->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        @error('category_id')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">تصویر </label>
                            <input type="file" name="image" class="form-control form-control-sm">
                        </div>
                        @error('image')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="status">وضعیت</label>
                            <select name="status" id="" class="form-control form-control-sm" id="status">
                                <option value="0" @if (old('status', $post->status) == 0) selected @endif>غیرفعال</option>
                                <option value="1" @if (old('status', $post->status) == 1) selected @endif>فعال</option>
                            </select>
                        </div>
                        @error('status')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </section>


                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="commentable">امکان درج کامنت</label>
                            <select name="commentable" id="" class="form-control form-control-sm" id="commentable">
                                <option value="0" @if (old('commentable', $post->commentable) == 0) selected @endif>غیرفعال</option>
                                <option value="1" @if (old('commentable', $post->commentable) == 1) selected @endif>فعال</option>
                            </select>
                        </div>
                        @error('commentable')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </section>



                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">تاریخ انتشار</label>
                            <input type="text" id="published_at" name="published_at" class="form-control form-control-sm d-none">
                            <input type="text" id="published_at_view" class="form-control form-control-sm">
                        </div>
                        @error('published_at')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </section>

                    <section class="col-12">
                        <div class="form-group">
                            <label for="tags">تگ ها</label>
                            <input type="hidden" class="form-control form-control-sm"  name="tags" id="tags" value="{{ old('tags', $post->tags) }}">
                            <select class="select2 form-control form-control-sm" id="select_tags" multiple>

                            </select>
                        </div>
                        @error('tags')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </section>

                    <section class="col-12">
                        <div class="form-group">
                            <label for="">خلاصه پست</label>
                            <textarea name="summary" id="summary"  class="form-control form-control-sm" rows="6">{{ old('summary', $post->summary) }}</textarea>
                        </div>
                        @error('summary')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </section>

                    <section class="col-12">
                        <div class="form-group">
                            <label for="">متن پست</label>
                            <textarea name="body" id="body"  class="form-control form-control-sm" rows="6">{{ old('body', $post->body) }}</textarea>
                        </div>
                        @error('body')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
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
        </section>

    </div>
    @endsection
@section('script')

    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
        CKEDITOR.replace('summary');
    </script>
    <script>
        $(document).ready(function () {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at'
            })
        });
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
