
@extends('admin.layout.master')
@section('head-tag')
    <title> سفارشات</title>
    @endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش فروش</li>
    <li class="breadcrumb-item active">سفارش ها</li>
@endsection

@section('content')
    <div class="img p-3 mt-2 row">
        <div class="col-5">
            <p class="d-inline">همه سفارشات : </p><span class="d-inline">6</span>
        </div>
        <div class="col-7">
            <form action="" class="float-left">
                <div class="input-group">
                    <input type="hidden" name="type" value="{{ request('type') }}">
                    <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="نام را جستجو کنید">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-success" type="submit"> جستجو کن</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="img p-3 row">
        <div class="col">
            <select class="form-select" aria-label="Default select example" style="border-radius: 4px">
                <option selected>کارهای دسته جمعی</option>
                <option value="1">حذف</option>
            </select>
            <button class="btn btn-outline-warning" type="button"> اعمال</button>
{{--             <a  href="{{route('admin.market.brand.create')}}"> <button class="btn btn-outline-success" type="button">ایجاد برند جدید </button></a>--}}
        </div>
{{--        {{ $orders->appends([ 'search' => request('search') ])->render() }}--}}
        {{ $orders->appends(Request::except('page'))->links('vendor.pagination.custom') }}
    </div>
    <br>
    <br>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-striped table-dark text-white table-hover">
                <thead>
                <tr>
                    <th>کد سفارش</th>
                    <th>نام کاربر</th>
                    <th>هزینه سفارش</th>
                    <th>وضعیت سفارش</th>
                    <th>شماره پیگیری پستی</th>
                    <th>زمان ثبت سفارش</th>
                    <th class="text-success"> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->fullname }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->tracking_serial ?? 'هنوز ثبت نشده' }}</td>
                        <td>{{ jdate($order->created_at)->ago() }}</td>
{{--                        <td class="d-flex">--}}
{{--                            <a href="{{ route('admin.market.order.show' , $order->id) }}" class="btn btn-sm btn-warning  ml-1">مشاهده جزئیات سفارش</a>--}}
{{--                            <a href="{{ route('admin.market.order.edit' , $order->id) }}" class="btn btn-sm btn-primary  ml-1">ویرایش سفارش</a>--}}
{{--                            <form action="{{ route('admin.market.order.destroy' , $order->id) }}" method="POST">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button type="submit" class="btn btn-sm btn-danger delete">حذف</button>--}}
{{--                            </form>--}}
{{--                           --}}
{{--                        </td>--}}
                        <td style="font-size: 25px"> <span><a href="{{ route('admin.market.order.edit', $order->id) }}"><i class="las la-edit"></i></a></span>
                            <span><a href="{{ route('admin.market.order.show', $order->id) }}"><i class="las la-check"></i></a></span>
                            <form class="d-inline" action="{{ route('admin.market.order.destroy', $order->id) }}" method="post">
                                @csrf
                                {{ method_field('delete') }}
                                <button class="btn-danger bg-transparent delete" type="submit"><i class="las la-trash"></i> </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

    @endsection
@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
