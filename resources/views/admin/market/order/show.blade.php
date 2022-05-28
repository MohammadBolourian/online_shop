{{--@dd($order->products['0']['id'])--}}
{{--@dd($order->user->addresses->city_id)--}}
@extends('admin.layout.master')
@section('head-tag')
    <title>مشاهده سفارش</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">  مشاهده سفارش</li>
@endsection

@section('content')
    <div class="col-12">
        <h5>مشاهده سفارش</h5>
        <br>
        <section>
            <div class="form-group">
                <span> آیدی پرداخت :</span>
                <span>{{$order->payments()->get()['0']['id']}}</span>
            </div>
            <div class="form-group">
                <span>شماره پرداخت :</span>
                <span>{{$order->payments()->get()['0']['resnumber']}}</span>
            </div>
            <div class="form-group">
                <span>وضعیت پرداخت :</span>
                <span>{{$order->payments()->get()['0']['status'] ? 'پرداخت شده' : 'پرداخت نشده'}}</span>
            </div>
            <div class="form-group">
                <span>زمان پرداخت :</span>
                <span>{{jalaliDate($order->payments()->get()['0']['created_at'])}}</span>
            </div>
            <div class="form-group">
                <span> نام خریدار :</span>
                <span>{{$order->user->fullname}}</span>
            </div>
            <div class="form-group">
                <span> شماره خریدار :</span>
                <span>{{$order->user->phone}}</span>
            </div>
            <div class="form-group">
                <span> ایدی خریدار :</span>
                <span>{{$order->user->id}}</span>
            </div>
            <div class="form-group">
                <span> کد پستی خریدار :</span>
                <span>{{$order->user->addresses->postal_code}}</span>
            </div>
            <div class="form-group">
                <span> ادرس محل سکونت  خریدار :</span>
                <span>{{$order->user->addresses->address}}</span>
            </div>
            <div class="form-group">
                <span> نام استان:</span>
                <span>{{\App\Models\Test\province::find($order->user->addresses->state)->name}}</span>
            </div>
            <div class="form-group">
                <span> نام شهر:</span>
                <span>{{\App\Models\Test\city::find($order->user->addresses->city_id)->name}}</span>
            </div>
            <table class="table bg-light">
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

        </section>
    </div>

    @endsection
