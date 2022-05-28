@extends('admin.layout.master')
@section('head-tag')
    <title> نظرات</title>
    @endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش محتوی</li>
    <li class="breadcrumb-item active">نظرات</li>
@endsection

@section('content')
    <div class="img p-3 mt-2 row">
        <div class="col-5">
            <p class="d-inline">همه نظرات: </p><span class="d-inline">6</span>
        </div>
        <div class="col-7">
            <div class="float-left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="نام دسته را جستجو کنید">
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
                    <th>نظر</th>
                    <th>پاسخ به</th>
                    <th>کد کاربر</th>
                    <th>نویسنده نظر</th>
                    <th>کد پست</th>
                    <th>پست</th>
                    <th>وضعیت تایید</th>
                    <th>وضعیت کامنت</th>
                    <th class="text-danger"> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($comments as $key => $comment)

                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td>{{ Str::limit($comment->body, 10) }}</td>
                        <td>{{ $comment->parent_id ? Str::limit($comment->parent->body, 10) : '' }}</td>
                        <td>{{ $comment->author_id }}</td>
                        <td>{{ $comment->user->fullName  }}</td>
                        <td>{{ $comment->commentable_id }}</td>
                        <td>{{ $comment->commentable->title }}</td>
                        <td>{{ $comment->approved == 1 ? 'تایید شده ' : 'تایید نشده'}} </td>
                        <td>
                            <label>
                                <input id="{{ $comment->id }}" onchange="changeStatus({{ $comment->id }})" data-url="{{ route('admin.content.comment.status', $comment->id) }}" type="checkbox" @if ($comment->status === 1)
                                checked
                                    @endif>
                            </label>
                        </td>
                        <td class="width-16-rem">
                            <a href="{{ route('admin.content.comment.show', $comment->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> نمایش</a>

                            @if($comment->approved == 1)
                                <a href="{{ route('admin.content.comment.approved', $comment->id)}} "class="btn btn-warning btn-sm" type="submit"><i class="fa fa-clock"></i> عدم تایید</a>
                            @else
                                <a href="{{ route('admin.content.comment.approved', $comment->id)}}" class="btn btn-success btn-sm text-white" type="submit"><i class="fa fa-check"></i>تایید</a>
                            @endif
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
                            successToast('نظر  با موفقیت فعال شد')
                        }
                        else{
                            element.prop('checked', false);
                            successToast('نظر  با موفقیت غیر فعال شد')
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


@endsection
