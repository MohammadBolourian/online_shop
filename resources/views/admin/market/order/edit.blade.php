@extends('admin.layout.master')
@section('head-tag')
    <title>ویرایش سفارش</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">  ویرایش سفارش</li>
@endsection

@section('content')
    <div class="col-12">
        <h5>ویرایش سفارش</h5>
        <br>
        <section>
            <form class="form-horizontal" action="{{ route('admin.market.order.update', $order->id) }}" method="POST">
                @csrf
                {{ method_field('put') }}

                <div class="card-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">شماره سفارش</label>
                        <input type="text" class="form-control" id="inputEmail3" value="{{ $order->id }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">هزینه سفارش</label>
                        <input type="number" class="form-control" id="inputEmail3"  value="{{ $order->price }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">وضعیت سفارش</label>
                        <select name="status" class="form-control">
                            <option value="unpaid" {{ old('status' , $order->status) == 'unpaid' ? 'selected' : '' }}>پرداخت نشده</option>
                            <option value="paid" {{ old('status' , $order->status) == 'paid' ? 'selected' : '' }}>پرداخت شده</option>
                            <option value="preparation" {{ old('status' , $order->status) == 'preparation' ? 'selected' : '' }}>در حال پردازش</option>
                            <option value="posted" {{ old('status' , $order->status) == 'posted' ? 'selected' : '' }}>ارسال شد</option>
                            <option value="received" {{ old('status' , $order->status) == 'received' ? 'selected' : '' }}>دریافت شد</option>
                            <option value="canceled" {{ old('status' , $order->status) == 'canceled' ? 'selected' : '' }}>کنسل شده</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">کد پیگیری</label>
                        <input type="text" name="tracking_serial" class="form-control" id="inputPassword3" placeholder="کد پیگیری را وارد کنید" value="{{ old('tracking_serial', $order->tracking_serial )}}">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">ویرایش سفارش</button>
                    <a href="{{ route('admin.market.order.index') . "?type=$order->status" }}" class="btn btn-danger float-left">لغو</a>
                </div>
                <!-- /.card-footer -->
            </form>

        </section>
    </div>

    @endsection
