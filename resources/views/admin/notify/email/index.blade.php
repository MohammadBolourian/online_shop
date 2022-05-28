@extends('admin.layout.master')
@section('head-tag')
    <title> ایمیل</title>
    @endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">اطلاع رسانی</li>
    <li class="breadcrumb-item active"> ایمیل</li>
@endsection

@section('content')
    <div class="img p-3 mt-2 row">
        <div class="col-5">
            <p class="d-inline">همه ایمیل ها: </p><span class="d-inline">6</span>
        </div>
        <div class="col-7">
            <div class="float-left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="نام را جستجو کنید">
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
             <a  href="{{route('admin.notify.email.create')}}"> <button class="btn btn-outline-success" type="button">ایجاد ایمیل جدید </button></a>
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
                    <th>عنوان اطلاعیه</th>
                    <th>متن ایمیل</th>
                    <th>تاریخ ارسال	</th>
                    <th>وضعیت</th>
                    <th class="text-danger"> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($emails as $key => $email)

                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td>{{ $email->subject }}</td>
                        <td>{{ $email->body }}</td>
                        <td>{{ jalaliDate($email->published_at, 'H:i:s Y-m-d') }}</td>
                        <td>
                            <label>
                                <input id="{{ $email->id }}" onchange="changeStatus({{ $email->id }})" data-url="{{ route('admin.notify.email.status', $email->id) }}" type="checkbox" @if ($email->status === 1)
                                checked
                                    @endif>
                            </label>
                        </td>
                        <td style="font-size: 25px"> <span><a href="{{ route('admin.notify.email-file.index', $email->id) }}"><i class="las la-file"></i></a></span>
                         <span><a href="{{ route('admin.notify.email.edit', $email->id) }}"><i class="las la-edit"></i></a></span>
                            <form class="d-inline" action="{{ route('admin.notify.email.destroy', $email->id) }}" method="post">
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

    <script type="text/javascript">
        function changeStatus(id){
            var element = $("#" + id)
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');

            $.ajax({
                url : url,
                type : "GET",
                success : function(response){
                    if(response.status){
                        if(response.checked){
                            element.prop('checked', true);
                            successToast('ایمیل  با موفقیت فعال شد')
                        }
                        else{
                            element.prop('checked', false);
                            successToast('ایمیل  با موفقیت غیر فعال شد')
                        }
                    }
                    else{
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error : function(){
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            });

            function successToast(message){

                var successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                })
            }

            function errorToast(message){

                var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(errorToastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                })
            }
        }
    </script>


    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])


@endsection
