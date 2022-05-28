@extends('admin.layout.master')
@section('head-tag')
    <title> کد نخفیف</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش فروش</li>
    <li class="breadcrumb-item active"> کد تخفیف </li>
@endsection

@section('content')
    <div class="img p-3 mt-2 row">
        <div class="col-5">
            <p class="d-inline"> تعداد</p><span class="d-inline">6</span>
        </div>
        <div class="col-7">
            <div class="float-left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="نام را جستجو کنید">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-success" type="button"> جستجو کن</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="img p-3 row">
        <div class="col">
            <select class="form-select" aria-label="Default select example" style="border-radius: 4px">
                <option selected>کارهای دسته جمعی</option>
                <option value="1">حذف</option>
            </select>
            <button class="btn btn-outline-warning" type="button"> اعمال</button>
            <a  href="{{route('admin.market.discount.create')}}"> <button class="btn btn-outline-success" type="button">ایجاد تخفیف جدید</button></a>
        </div>
        <div class="col ">
            <ul class = "pagination float-left">
                <li class = "page-item"> <a class="page-link" href="#"> << </a> </li>
                <li class = "page-item"> <a class="page-link" href="#"> 1 </a> </li>
                <li class = "page-item"> <a class="page-link" href="#"> 2 </a> </li>
                <li class = "page-item"> <a class="page-link" href="#"> 3 </a> </li>
                <li class = "page-item"> <a class="page-link" href="#"> 4 </a> </li>
                <li class = "page-item"> <a class="page-link" href="#"> >> </a> </li>
            </ul>
        </div>
    </div>
    <br>
    <br>
    <div class="col-12">
        <div class="card-body table-responsive p-0 bg-light">
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th>آی‌دی تخفیف</th>
                    <th>کد تخفیف</th>
                    <th>میزان تخفیف (درصد)</th>
                    <th>مربوط به کاربر</th>
                    <th>مربوط به محصول</th>
                    <th>مربوط به دسته</th>
                    <th>مهلت استفاده</th>
                    <th>اقدامات</th>
                </tr>

                @foreach($discounts as $discount)
                    <tr>
                        <td>{{ $discount->id }}</td>
                        <td>{{ $discount->code }}</td>
                        <td>{{ $discount->percent }}</td>
                        <td>{{ $discount->users->count() ? $discount->users->pluck('fullname')->join(', ') : 'همه کاربران' }}</td>
                        <td>{{ $discount->products->count() ? $discount->products->pluck('title')->join(', ') : 'همه محصولات' }}</td>
                        <td>{{ $discount->categories->count() ?  $discount->categories->pluck('name')->join(', ') : 'همه دسته‌ها' }}</td>
                        <td>{{ jdate($discount->expired_at)->ago() }}</td>
                        <td class="d-flex">
                            {{--                                    // permissions--}}
                            <form action="{{ route('admin.market.discount.destroy' , $discount->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger ml-1 delete">حذف</button>
                            </form>
                            <a href="{{ route('admin.market.discount.edit' , $discount->id) }}" class="btn btn-sm btn-primary ml-1">ویرایش</a>
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
