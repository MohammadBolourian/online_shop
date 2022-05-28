@extends('home.layout.master')
@section('head-tag')
    <link href="{{asset('assets/css/flickity.min.css')}}" rel="stylesheet"/>

    <title>فروشگاه اینترنتی ممل کالا - صفحه اصلی</title>


@endsection

@section('content')
    <div class="main">
    <div class="row">
        <div class="col-md-8">
            <div class="slider">
                <div class="slides">
                    @foreach($sliders as $slider)
                        <img  class="slider2"  src="{{ asset($slider->image) }}" alt="{{ $slider->name }}"   >
                    @endforeach
                </div>
                <ul class="indicator">
                @foreach($sliders as $slider)
                    <li  class="activ"></li>
                @endforeach
                </ul>
                <a class="left"><i style="font-size: 40px; color: white; " class="las la-chevron-circle-left"></i></a>
                <a class="right"><i style="font-size: 40px; color: white;" class="las la-chevron-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-4 d-flex flex-column">
            <img class="tabligh" src="{{asset('assets/img/1000017518.gif')}}">
            <img class="tabligh" src="{{asset('assets/img/1000017516.jpg')}}">
        </div>
    </div>
{{--//===================================>amazing sale--}}
    <div class="row pish1">

        <div class="col-md-3"> <a href="{{route('shop')}}"><span id="span_btn"> مشاهده همه<i class="las la-angle-left" style="font-size: 16px;
    vertical-align: middle;"></i></span></a> </div>
        <div class="col  text-right " style=" height: 400px; padding-top: 15px">
{{--            <span style="border-bottom: 1px solid red; font-size: 17px; color: white">پیشنهاد شگفت انگیز</span>--}}
{{--            <a href="{{route('shop')}}"><span class="class-all">+ مشاهده همه</span></a>--}}

            <div style="height: 368px" class="carousel   col" data-flickity='{
                            "autoPlay": false,
                            "rightToLeft": true ,
                            "contain": true ,
                            "groupCells": true ,
                            "pageDots": false  }'>

                @foreach($newProducts as $product)
                    <div class="mahsol bg-white mx-2 rounded">
                        <img src="{{ asset($product->image['indexArray']['medium'] ) }}">
                        <p>{{$product->title}}</p>
                        <p>{{ number_format($product->price) }}  تومان</p>
                        <a href="/products/{{$product->slug}}"> <button class="btn btn-outline-info">صفحه محصول</button></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
{{--    =========================================>amazing sale timer--}}
    <div class="row pl-3">
        <div class="col-md-3 amazing_left flex-column">
            <img src="{{asset('assets/img/1000001764.jpg')}}">
            <button class="btn">
                <span><i class="las la-arrow-left"></i></span>
                <a href="/category/1" style=" vertical-align: super;">مشاهده همه شگفت انگیزها</a>
            </button>
        </div>
        <div class="col-md-9 amazing_timer">
            <div class="slider_amazing">
                <ul class="amazing_ul">


                    <div style="height: 345px; width: 100%" class="carousel " data-flickity='{
                            "autoPlay": 1500,
                            "pauseAutoPlayOnHover": false,

                             "draggable": false,
                             "prevNextButtons": false,
                            "wrapAround": true ,
                            "autoPlay": true,
                            "rightToLeft": true ,
                            "contain": false ,
                            "groupCells": false ,
                            "pageDots": false  }'>

                        @foreach($newProducts as $product)
                            <li class="w-100">
                                <a href="/products/{{$product->slug}}" class="d-flex">
                                    <div class="part_akx">
                                        <div class="pish_shegeft_anzgiz">
                                            پیشنهاد شگفت انگیز
                                        </div>
                                        <div class="img-part-akx">
                                            <img src="{{ asset($product->image['indexArray']['large'] ) }}">
                                        </div>
                                    </div>
                                    <div class="part_tozihat">
                                        <div style="height: 280px">
                                            <div class="show_price">
                                                <div class="show_price_off">1,000,000</div>
                                                <div class="real_price">
                                                    <span>{{number_format($product->price)}}</span>
                                                    <span>تومان</span>
                                                    <span class="badge badge-danger">همراه با تخفیف</span>
                                                </div>
                                            </div>

                                            <span class="name_amazing">{{$product->title}}</span>
                                            <div class="mt-4">
                                                <ul>

                            @foreach($product->attributes as $atter)
{{--                                                        <li style="list-style-type: circle"> </li>--}}
                                    <li class="" style="list-style-type: circle">{{$atter->pivot->attribute->name}} : {{$atter->pivot->value->value}}</li>
                                    <br>

                            @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </div>
                </ul>
            </div>
        </div>
    </div>

{{--    ===================================> tabligh --}}
    <div class="svg row">
        <a class="col">
            <div class="item">
                <div><img src="{{asset('assets/img/fdb293e6.png')}}"></div>
                <div> ضمانت اصل بودن کالا</div>
            </div>
        </a>
        <a class="col">
            <div class="item">
                <div><img src="{{asset('assets/img/a9286d2f.png')}}"></div>
                <div>پشتیبانی 24 ساعته </div>
            </div>
        </a>
        <a class="col">
            <div class="item">
                <div><img src="{{asset('assets/img/71965c7d.png')}}"></div>
                <div> تحویل اکسپرس</div>
            </div>
        </a>
        <a class="col">
            <div class="item">
                <div><img src="{{asset('assets/img/514926b1.png')}}"></div>
                <div> 7 روز ضمانت برگشت کالا</div>
            </div>
        </a>
        <a class="col">
            <div class="item">
                <div><img src="{{asset('assets/img/22414818.png')}}"></div>
                <div> پرداخت در محل</div>
            </div>
        </a>
    </div>
{{--======================================> tabligh 6 pics--}}
        <div class="pic4 row">
            <div class="col">
                <img src="{{asset('assets/img/1.jpg')}}">
            </div>
            <div class="col">
                <img src="{{asset('assets/img/2.jpg')}}">

            </div>
            <div class="col">
                <img src="{{asset('assets/img/3.jpg')}}">
            </div>
            <div class="col">
                <img src="{{asset('assets/img/4.jpg')}}">
            </div>
        </div>
        <div class="row pic4">
            <div class="col">
                <img src="{{asset('assets/img/5.jpg')}}" style="height: 220px">
            </div>
            <div class="col">
                <img src="{{asset('assets/img/6.jpg')}}" style="height: 220px">
            </div>
        </div>
{{--        ===========================================>// part product --}}
        <div class="row" style="margin: 0px !important;">
            <div class="col-3 momentPish p-2" style="background-color: white">
                <p class="small">پیشنهاد لحظه ای برای شما</p>
                <div class="load"></div>



                <div style="height: 345px; width: 100%" class="carousel " data-flickity='{
                            "autoPlay": 1500,
                            "pauseAutoPlayOnHover": false,

                             "draggable": false,
                             "prevNextButtons": false,
                            "wrapAround": true ,
                            "autoPlay": true,
                            "rightToLeft": true ,
                            "contain": false ,
                            "groupCells": false ,
                            "pageDots": false  }'>

                    @foreach($newProducts as $product)
                        <div class="mahsol">
                            <img src="{{ asset($product->image['indexArray']['medium'] ) }}">
                            <p>{{$product->title}}</p>
                            <p>{{ number_format($product->price) }}  تومان</p>
                            <a href="/products/{{$product->slug}}"> <button class="btn btn-outline-info">صفحه محصول</button></a>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="col momentPish text-right bg-white" style=" height: 400px">
                <span style="border-bottom: 1px solid red; font-size: 17px;">جدید ترین کالاها</span>
                <a href="{{route('shop')}}"><span class="class-all">+ مشاهده همه</span></a>

                <div style="height: 368px" class="carousel   col" data-flickity='{
                            "autoPlay": false,
                            "rightToLeft": true ,
                            "contain": true ,
                            "groupCells": true ,
                            "pageDots": false  }'>

                    @foreach($newProducts as $product)
                    <div class="mahsol">
                        <img src="{{ asset($product->image['indexArray']['medium'] ) }}">
                        <p>{{$product->title}}</p>
                        <p>{{ number_format($product->price) }}  تومان</p>
                        <a href="/products/{{$product->slug}}"> <button class="btn btn-outline-info">صفحه محصول</button></a>
                    </div>
                        @endforeach
                </div>
            </div>

        </div>


{{--        ====================================================> part 2 product--}}
        <div class="row" style="margin:20px 0px !important;">
            <div class="col-md-3 momentPish p-2" style="background-color: white">
                <div class="text-center">
                    <p class="news_titr">تازه های خبری</p>
                </div>

                @foreach($blogs as $blog)
                <div>
                    <a href="/blog/{{$blog->slug}}">
                        <div class="news">
                            <img src="{{ asset($blog->image['indexArray'][$blog->image['currentImage']] ) }}" alt="{{$blog->title}}">
                            <p>{{$blog->title}} : {!! $blog->summary !!}</p>
                        </div>
                    </a>
                    <div>
                        <span class="comment">{{ jdate($blog->updated_at)->ago() }}</span>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col momentPish text-right bg-white" style=" height: 400px">
                <span style="border-bottom: 1px solid red; font-size: 17px;">کالای دیجیتال</span>
                <a href="/category/1"><span class="class-all">+ مشاهده همه</span></a>

                <div style="height: 368px" class="carousel   col" data-flickity='{
                            "autoPlay": false,
                            "rightToLeft": true ,
                            "contain": true ,
                            "groupCells": true ,
                            "pageDots": false  }'>



                    @foreach($elcPro as $product)
                        <div class="mahsol">
                            <img src="{{ asset($product->image['indexArray']['medium'] ) }}">
                            <p>{{$product->title}}</p>
                            <p>{{ number_format($product->price) }}  تومان</p>
                            <a href="/products/{{$product->slug}}"> <button class="btn btn-outline-info">صفحه محصول</button></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</div>
@endsection

@section('script')
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/flickity.pkgd.min.js')}}"></script>
@endsection
