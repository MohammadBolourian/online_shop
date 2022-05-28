
@extends('home.layout.master')

@section('content')
    <div class="col-md-9">
        <ul class="breadcrumb">
            <li><a class="breadedit" href="{{route('home')}}">فروشگاه اینترنتی ممل کالا</a></li>
            <li><a class="breadedit" href="{{route('shop')}}">فروشگاه</a></li>
            <li><a class="breadedit" >{{$category->name}}</a></li>

        </ul>
        <p class="option_count">
                <span class="option_meta">
                    <span>نمایش</span>
                    <span>1</span>
                    <span>-</span>
                    <span>11</span>
                    <span>کالا از</span>
                    <span>11</span>
                </span>
        </p>
        <div class="box_shop">
            <div class="custom_order">
                <span><i id="customIcon" class="las la-stream"></i></span>
                <span class="order_sort">مرتب&zwnj;سازی بر اساس :</span>
                <span class="sort sort_selected">پیشفرض</span>
                <span class="sort">پربازدید ترین</span>
                <span class="sort">محبوب ترین</span>
                <span class="sort">جدید ترین</span>
                <span class="sort">گران ترین</span>
                <span class="sort">ارزان ترین</span>
                {{--            <span class="sort_shape"><i class="las la-bars"></i></span>--}}
                {{--            <span class="sort_shape"><i class="las la-th-large"></i></span>--}}
            </div>
        </div>
        <!--                //=====================================> mahsoolat-->
        <div class="mahsolat pb-3 row">


{{--                @foreach( $category->products as $cate)--}}
{{--                    <a href="/products/{{ $cate->slug }}">{{ $cate->title }}</a>--}}
{{--                @endforeach--}}

            @if(!$category->products->count() == 0)
        @foreach($category->products as $product)
                <div class="box_mahsol">
                    <span class="special_offer_end" style="border-bottom: 0px"></span>
                    <div class="color">
                        {{--                <div data-toggle="tooltip" data-placement="left" title=" خاکستری" class="product_color" style="background-color: grey; z-index: 2"></div>--}}
                        {{--                <div data-toggle="tooltip" data-placement="left" title=" مشکی" class="product_color" style="background-color: black; z-index: 2"></div>--}}
                        {{--                <div data-toggle="tooltip" data-placement="left" title="نقره ای" class="product_color" style="background-color: silver; z-index: 2"></div>--}}
                    </div>
                    <div class="img_mahsol">
                        <img src="{{ asset($product->image['indexArray']['medium'] ) }}">
                    </div>
                    <div class="products__item-info">
                        <a href="/products/{{ $product->slug }}">{{ $product->title }}</a>
                    </div>
                    <span class="price">
                        <span class="takhfif"></span>
                        <span class="fi addEdit">{{ number_format($product->price) }}
                            <span>تومان</span>
                        </span>
                        <span class="badge badge-danger"></span>

                         <div class="fi">
                            <span>موجودی :</span>
                        <span class="fi2">{{ $product->inventory }}</span>
                                <form method="POST" action="{{route('cart.add',$product->id)}}" id="add-to-cart-{{ $product->id }}">
                                    @csrf
                                  </form>
                            <button  onclick="document.getElementById('add-to-cart-{{ $product->id }}').submit()" class="btn btn-danger add_to_basket">افزودن به سبد خرید</button>
                        </div>

                    </span>
                    <div class="vote">
                        <span class="star"><i class="las la-star"></i>5.0</span>
                        <span>از</span>
                        <span>2</span>
                        <span>رای</span>
                    </div>
                </div>
            @endforeach
                @else
             <div class="text-center">
                 <h1 class="text-center text-danger"> محصولی برای نمایش نیس</h1>
                 <br>
                 <a href="{{route('shop')}}"><h2>برو به فروشگاه</h2></a>
             </div>
            @endif
        </div>

    </div>

@endsection

