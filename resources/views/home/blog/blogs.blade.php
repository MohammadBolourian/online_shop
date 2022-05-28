@extends('home.layout.master')
@section('head-tag')
    <title>فروشگاه اینترنتی ممل کالا - صفحه مقالات</title>
    <style>
        .slide-news .card:hover {
            margin-top: -5px;
            margin-bottom: 5px;
        }
        .slide-news .card {
            transition: all 0.5s;
        }
    </style>
@endsection
@section('content')
   <div class="row col-12 p-5">
       @foreach($blogs as $blog)
       <div class="col-3 slide-news">
          <a href="/blog/{{$blog->slug}}">
              <div class="card text-white" >
                  <img class="card-img-top" style="height: 300px" src="{{ asset($blog->image['indexArray'][$blog->image['currentImage']] ) }}">
                  <div class="card-body bg-dark">
                      <p class="card-text  text-center"> {{$blog->title}}</p>
                      <div class="row d-flex">
                          <div class="col d-flex">
                              <img class="rounded-circle" style="width: 60px; height: 60px; margin-top: -20px" src="{{asset($blog->authorName->profile_photo_path)}}">
                              <p> {{$blog->authorName->fullname}}</p>
                          </div>
                          <div class="col d-flex">
                              <i class="las la-clock" style="font-size: 21px; margin-left: 15px;"></i>
                              <p>{{ jdate($blog->updated_at)->ago() }}</p>
                          </div>
                      </div>
                  </div>
              </div>
          </a>
       </div>
           @endforeach
   </div>
@endsection
