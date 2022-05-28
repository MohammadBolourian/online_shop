@extends('admin.layout.master')
@section('head-tag')
    <title> مشاهده نظر</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش محتوی</li>
    <li class="breadcrumb-item "><a href={{route('admin.content.comment.index')}}>نظرات </a></li>
    <li class="breadcrumb-item active"> مشاهده نظر</li>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-8 text-center">

            <textarea rows="7" style="width: 100%; background: wheat" disabled>
                {{ $comment->body }}
            </textarea>
            <br>
            <br>
            <div class="mt-5" id="toolbar-container">
                @if($comment->parent_id == null)
                    <section>
                        <form action="{{ route('admin.content.comment.answer', $comment->id) }}" method="post">
                            @csrf
                            <section class="row">
                                <section class="col-12">
                                    <div class="form-group">
                                        <label for="">پاسخ ادمین</label>
                                        ‍<textarea class="form-control form-control-sm" name="body" rows="4"></textarea>
                                    </div>
                                </section>
                                <section class="col-12">
                                    <button class="btn btn-primary btn-sm">ثبت</button>
                                </section>
                            </section>
                        </form>
                    </section>
                @endif
            </div>
        </div>
        <div class="col-4 img">
            <div class="mt-3"><span class="font-weight-bold">نام :</span>  <span class="text-warning"> {{ $comment->user->fullName  }}</span></div>
            <div class="mt-3"><span class="font-weight-bold">  ایمیل:</span>  <span class="text-warning">{{ $comment->user->email  }}</span></div>
            <div class="mt-3"><span class="font-weight-bold">تاریخ :</span>  <span class="text-warning">{{$comment->updated_at}} </span></div>
            <div class="mt-3"><span class="font-weight-bold"> موضوع:</span>  <span class="text-warning">{{ $comment->commentable->title }}</span></div>
        </div>
    </div>
    @endsection
