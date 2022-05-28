@extends('admin.layout.master')
@section('head-tag')
    <title> مشاهده نظر</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش فروش</li>
    <li class="breadcrumb-item "><a href={{route('admin.market.comment.index')}}>نظرات </a></li>
    <li class="breadcrumb-item active"> مشاهده نظر</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-8 text-center">
            <textarea rows="7" style="width: 100%; background: wheat" disabled>{{$comment->comment}}</textarea>
            <br>
            <br>
            <div class="mt-5" id="toolbar-container">
                <div class="form-group">
                    <label for="comment">پاسخ:</label>
                    <form action="{{ route('admin.market.comment.store') }}" method="post">
                        @csrf
                            <input type="hidden" name="commentable_id" value="{{ $comment->commentable->id}}" >
                            <input type="hidden" name="commentable_type" value="App\Models\Market\Product">
                            <input type="hidden" name="parent_id" value="{{$comment->id}}">
                    <textarea class="form-control" rows="5"  name="comment" id="comment">
                         {{ old('comment') }}
                    </textarea>
                        @error('comment')
                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
            <br>
            <br>
            <button type="submit" class="btn btn-info mt-5"> پاسخ </button>
            <a href="{{route('admin.market.comment.index')}}"><button type="button" class="btn btn-danger mt-5"> بازگشت </button></a>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-4 img">
            <div class="mt-3"><span class="font-weight-bold">نام :</span>  <span class="text-warning">{{$comment->user->fullname}}</span></div>
            <div class="mt-3"><span class="font-weight-bold">  ایمل:</span>  <span class="text-warning">{{$comment->user->phone}}</span></div>
            <div class="mt-3"><span class="font-weight-bold">تاریخ :</span>  <span class="text-warning">{{jalaliDate($comment->created_at)}}</span></div>
            <div class="mt-3"><span class="font-weight-bold"> موضوع:</span>  <span class="text-warning"> {{$comment->commentable->title}}</span></div>
        </div>

    </div>
    @endsection
