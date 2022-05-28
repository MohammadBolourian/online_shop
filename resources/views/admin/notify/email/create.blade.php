@extends('admin.layout.master')
@section('head-tag')
    <title>اایمیل جدید</title>
    <link rel="stylesheet" href="{{ asset('assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active"> اظلاع رسانی</li>
    <li class="breadcrumb-item "><a href={{route('admin.notify.email.index')}}> ایمیل</a></li>
    <li class="breadcrumb-item active">ایجاد ایمیل جدید</li>
@endsection

@section('content')
    <div class="col-12">
        <h5> ایجاد ایمیل جدید</h5>
        <br>
        <section>
            <form action="{{ route('admin.notify.email.store') }}" method="post">
                @csrf
                <section class="row">

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">عنوان ایمیل</label>
                            <input type="text" name="subject" class="form-control form-control-sm"
                                   value="{{ old('subject') }}">
                        </div>
                        @error('subject')
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
                            <input type="text" name="published_at" id="published_at"
                                   class="form-control form-control-sm d-none">
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
                            <label for="status">وضعیت</label>
                            <select name="status" id="" class="form-control form-control-sm" id="status">
                                <option value="0" @if (old('status') == 0) selected @endif>غیرفعال</option>
                                <option value="1" @if (old('status') == 1) selected @endif>فعال</option>
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

                    <section class="col-12">
                        <div class="form-group">
                            <label for="">متن ایمیل</label>
                            <textarea name="body" id="body"  class="form-control form-control-sm" rows="6">{{ old('body') }}</textarea>
                        </div>
                        @error('body')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </section>




                </section>
        <button class="btn btn-outline-success" type="submit">ثبت</button>
        <a href="{{route('admin.notify.email.index')}}"> <button class="btn btn-outline-danger" type="button">بازگشت</button></a>
            </form>
        </section>

    </div>
    @endsection
@section('script')

    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
    </script>


    <script src="{{ asset('assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at',
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
                }
            })
        });
    </script>

@endsection
