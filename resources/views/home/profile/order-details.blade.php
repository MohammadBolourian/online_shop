@extends('home.layout.master')
@section('head-tag')
    <title> مشاهده ادرس</title>
@endsection
@section('content')
    <body>
    <br>
    <br>
    <div class="row col-md-12">
        <div class="col-md-4 bg-info p-4">
            <div class="text-center">
                @if( (session('LoggedUserInfo'))['LoggedUserInfo']['profile_photo_path'] )
                    <img class="rounded w-25" src="{{ asset( (session('LoggedUserInfo'))['LoggedUserInfo']['profile_photo_path'] ) }}">
                @else
                    <img class="rounded w-25" src="{{asset('assets/img/av1.png')}}">
                @endif
                <div class="text-center">
                    <span class="d-block mt-4">{{session('LoggedUserInfo')['LoggedUserInfo']['fullname']}} </span>
                </div>
                <div>
                    <hr>
                </div>
                @include('home.profile.profile-links')
            </div>
        </div>
        <div class="col-md-8 bg-secondary    p-4">
            <div class="container">
                <table class="table">
                    <tbody>
                    <tr>
                        <th>آی دی محصول</th>
                        <th>عنوان محصول</th>
                        <th>تعداد سفارش</th>
                        <th>هزینه نهایی</th>
                    </tr>

                    @foreach($order->products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>{{ $product->pivot->quantity * $product->pivot->price }}</td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
        </div>
    </div>
    </div>
    </body>
@endsection

