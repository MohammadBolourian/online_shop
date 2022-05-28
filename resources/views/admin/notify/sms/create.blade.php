@extends('admin.layout.master')
@section('head-tag')
    <title>پیامک جدید</title>
    <link rel="stylesheet" href="{{ asset('assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active"> اظلاع رسانی</li>
    <li class="breadcrumb-item "><a href={{route('admin.notify.sms.index')}}> پیامک</a></li>
    <li class="breadcrumb-item active">ایجاد پیامک جدید</li>
@endsection

@section('content')
    <div class="col-12">
        <h5> ایجاد پیامک جدید</h5>
        <br>
        <section>
            <form action="{{ route('admin.notify.sms.store') }}" method="post">
                @csrf
                <section class="row">

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">عنوان پیامک</label>
                            <input type="text" name="title" class="form-control form-control-sm"
                                   value="{{ old('title') }}">
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
                            <label for="">متن پیامک</label>
                            <textarea name="body" id="body" class="form-control form-control-sm"
                                      rows="6">{{ old('body') }}</textarea>
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
                        <button class="btn btn-outline-success">ثبت</button>
                        <a href="{{route('admin.notify.sms.index')}}"> <button class="btn btn-outline-danger" type="button">بازگشت</button></a>
                    </section>
                </section>
            </form>
        </section>

    </div>
    @endsection

@section('script')

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
