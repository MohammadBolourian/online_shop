@extends('admin.layout.master')
@section('head-tag')
    <title> نظرات</title>
    @endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش فروش</li>
    <li class="breadcrumb-item active">نظرات</li>
@endsection

@section('content')
    <div class="img p-3 mt-2 row">
        <div class="col-5">
            <p class="d-inline">همه نظرات: </p><span class="d-inline">6</span>
        </div>
        <div class="col-7">
            <form action="" class="float-left">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="نام دسته را جستجو کنید">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-success" type="submit"> جستجو کن</button>
                    </div>
                </div>
            </form>
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

        {{--        {{ $products->links('vendor.pagination.custom') }}   in vase namayesh bedone search hast baadi namayesh vaghti seach dare--}}
{{--        {{ $comments->appends([ 'search' => request('search') ])->render() }}--}}
        {{ $comments->appends(Request::except('page'))->links('vendor.pagination.custom') }}
    </div>
    <br>
    <br>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-striped table-dark text-white table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نام کاربر</th>
                    <th>کد کالا</th>
                    <th>نام کالا</th>
                    <th>متن نظر </th>
                    <th>پاسخ به نظر </th>
                    <th class="text-danger"> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $key => $comment)

                <tr>
                    <td>
                        {{$key + 1}}
                    </td>
                    <td>
                        {{$comment->user->fullname}}
                    </td>
                    <td>
                        {{$comment->commentable->id}}
                    </td>
                    <td>
                        {{$comment->commentable->title}}
                    </td>
                    <td>
                        {{ Str::limit($comment->comment, 70) }}
                    </td>
                    <td>
                       @if( $comment->parent_id==0)
                           <p>نظر اصلی</p>
                           @else
                           <?php
                            $x =\App\Models\Content\Comment::with('answers')->find($comment->parent_id);
                           ?>

                           <p class="text-danger">
                               {{$x->comment}}
                           </p>
                      @endif
                    </td>
                    <td style="font-size: 25px"> <button type="button" class="btn btn-primary"><a href="{{route('admin.market.comment.show', $comment->id)}}"><i class="las la-edit"></i> نمایش</a> </button>
                    @if($comment->approved == 1)
                            <button type="button" class="btn btn-success"><i class="las la-edit"></i> تایید شده</button>
                        @else
                            <form class="d-inline" action="{{ route('admin.market.comment.update' , $comment->id) }}" method="POST">
                                @csrf
                                {{ method_field('put') }}
                                <button type="submit" class="btn btn-warning"><i class="las la-edit"></i> تایید نشده</button>
                            </form>
                       @endif

                        <form class="d-inline" action="{{ route('admin.market.comment.destroy' , $comment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="las la-edit"></i> حذف </button>
                        </form>
                    </td>

                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endsection


