@extends('home.layout.master')
@section('head-tag')
    <title>صفحه مقالات - {{$data->title}} </title>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet"/>
@endsection
@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-9 bg-gray ml-3 p-4">
                    <h3>{{$data->title}}</h3>
                    <div class="col d-flex mt-5 border-bottom">
                        <img class="rounded-circle" style="width: 50px; height: 50px; margin-top: -20px" src="{{asset($data->authorName->profile_photo_path)}}">
                        <p class="mr-4"> {{$data->authorName->fullname}}</p>
                        <i class="las la-clock mr-4" style="font-size: 21px; margin-left: 15px;"></i>
                        <p>{{ jalaliDate($data->updated_at) }}</p>
                    </div>
                    <div class="text-center mt-5 p-5">
                        <img class="rounded" style="width: 80%" src="{{ asset($data->image['indexArray']['large']) }}">
                        <p class="mt-4">
                           {!! $data->body !!}
                        </p>
                        <br>
                    <div class="d-flex">
                        <h6>بر چسب ها :</h6>
                        <?php  $word_array = explode( ',', $data->tags ); ?>
                        @foreach($word_array as $w)
                            <span class="bg-info mr-3"><a href="#{{$w}}">{{$w}} </a></span>
                        @endforeach
                    </div>
                    </div>
                </div>
                <div class="col bg-gray mr-3" style="height: fit-content">
                    <div class="text-center border-bottom mt-5">
                        <p>اخرین نوشته ها</p>
                    </div>
                    @foreach($blogs as $blog)
                        <div class="mt-2 " style="border-bottom:1px solid gray">
                            <a href="/blog/{{$blog->slug}}">
                                <div class="news">
                                    <img src="{{ asset($blog->image['indexArray'][$blog->image['currentImage']] ) }}" alt="{{$blog->title}}">
                                    <p class="mx-0 ">{{$blog->title}} :</p>
                                    <p class="m-0">{!! $blog->summary !!}</p>
                                </div>
                            </a>
                            <div class="d-inline text-center font-size-12">

                                <p> <i class="las la-clock mt-2 mr-4" style="font-size: 21px; vertical-align: text-bottom;"></i>{{ jalaliDate($data->updated_at) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
@endsection
