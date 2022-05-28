@extends('admin.layout.master')
@section('head-tag')
    <title>پرسش و پاسخ</title>
    @endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش محتوی</li>
    <li class="breadcrumb-item active">پرسش و پاسخ </li>
@endsection

@section('content')
    <div class="img p-3 mt-2 row">
        <div class="col-5">
            <p class="d-inline">همه پرسش و پاسخ ها : </p><span class="d-inline">6</span>
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
             <a  href="{{route('admin.content.faq.create')}}"> <button class="btn btn-outline-success" type="button">ایجاد سوال جدید </button></a>
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
                    <th>سوال</th>
                    <th>پاسخ</th>
                    <th>وضعیت</th>
                    <th class="text-danger"> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($faqs as $key => $faq)

                    <tr>
                        <th>{{ $key += 1 }}</th>
                        <td>{{ $faq->question }}</td>
                        <td>{{ $faq->answer }}</td>
                        <td>
                            <label>
                                <input id="{{ $faq->id }}" onchange="changeStatus({{ $faq->id }})" data-url="{{ route('admin.content.faq.status', $faq->id) }}" type="checkbox" @if ($faq->status === 1)
                                checked
                                    @endif>
                            </label>
                        </td>
                    <td style="font-size: 25px"> <span><a href="{{ route('admin.content.faq.edit', $faq->id) }}"><i class="las la-edit"></i></a></span>
                        <form class="d-inline" action="{{ route('admin.content.faq.destroy', $faq->id) }}" method="post">
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
                            successToast('  با موفقیت فعال شد')
                        }
                        else{
                            element.prop('checked', false);
                            successToast('   موفقیت غیر فعال شد')
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
