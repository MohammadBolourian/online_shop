{{--@dd($products->lastPage())--}}
@extends('home.layout.master')

@section('content')
<div class="col-md-9">
    <ul class="breadcrumb">
        <li><a class="breadedit" href="{{route('home')}}">فروشگاه اینترنتی ممل کالا</a></li>
        <li><a class="breadedit" href="{{route('shop')}}">فروشگاه</a></li>
    </ul>
    <p class="option_count">
                <span class="option_meta">
                    <span>نمایش</span>
                    <span>{{(($products->currentPage()-1) * $products->perpage() )+1}}</span>
                    <span>-</span>
                    <span>{{($products->currentPage()==$products->lastPage()) ? $products->total(): $products->currentPage() * $products->count()}}</span>
                    <span>کالا از</span>
                    <span>{{$products->total()}}</span>
                </span>
    </p>
    <div class="box_shop">
        <div class="custom_order">
            <span><i id="customIcon" class="las la-stream"></i></span>
            <span class="order_sort">مرتب&zwnj;سازی بر اساس :</span>
            <a href="{{ route('shop') }}" class="sort {{ isUrl(route('shop')) }} ">جدید ترین</a>
{{--            <a href="{{ route('shop' , ['new' => 1]) }}" class="sort {{ isUrl(route('shop' , ['new' => 1])) }} ">جدید ترین</a>--}}
            <a href="{{ route('shop' , ['old' => 1]) }}" class="sort {{ isUrl(route('shop' , ['old' => 1])) }} ">قدیمی ترین</a>
            <a href="{{ route('shop' , ['high' => 1]) }}" class="sort {{ isUrl(route('shop' , ['high' => 1])) }}">گران ترین</a>
            <a href="{{ route('shop' , ['low' => 1]) }}" class="sort {{ isUrl(route('shop' , ['low' => 1])) }}">ارزان ترین</a>

{{--            <span class="sort_shape"><i class="las la-bars"></i></span>--}}
{{--            <span class="sort_shape"><i class="las la-th-large"></i></span>--}}
        </div>
    </div>
    <!--                //=====================================> mahsoolat-->
    <div class="mahsolat pb-3 row">
        @foreach($products as $product)
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
    </div>
    {{ $products->links('vendor.pagination.custom') }}
</div>

@endsection
