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
                        <th>شماره سفارش</th>
                        <th>تاریخ ثبت</th>
                        <th>وضعیت سفارش</th>
                        <th>کد رهگیری پستی</th>
                        <th>اقدامات</th>
                    </tr>

                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ jalaliDate($order->created_at)}}</td>
{{--                            <td>{{ $order->status }}</td>--}}
                            @switch($order->status)
                                @case('paid')
                                    <td class="text-success">پرداخت شده</td>
                                @break
                                @case('unpaid')
                                <td class="text-danger">پرداخت نشده</td>
                                @break
                                @case('canceled')
                                <td class="text-danger">کنسل شده</td>
                                @break
                                @case('posted')
                                <td class="text-primary">ارسال شده</td>
                                @break
                            @endswitch
                            <td>{{ $order->tracking_serial ?? 'هنوز ثبت نشده' }}</td>
                            <td>
                                <a href="{{ route('user.order.detail', $order->id) }}" class="btn btn-sm btn-info">جزئیات سفارش</a>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
                {{ $orders->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
    </body>
@endsection

