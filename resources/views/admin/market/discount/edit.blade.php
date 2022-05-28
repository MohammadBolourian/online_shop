@extends('admin.layout.master')
@section('head-tag')
    <title>ویرایش کد نخفیف</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">بخش فروش</li>
    <li class="breadcrumb-item active">ویرایش کد تخفیف</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card bg-dark">
                <div class="card-header">
                    <h3 class="card-title"> ویرایش کد تخفیف</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.market.discount.update' , $discount->id) }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">کد تخفیف</label>
                            <input type="text" name="code" class="form-control" id="inputEmail3" placeholder="کد تخفیف را وارد کنید" value="{{ old('code' , $discount->code) }}">
                        </div>
                        <div class="form-group">
                            <label for="precent" class="col-sm-2 control-label">میزان تخفیف (درصد)</label>
                            <input type="number" name="percent" class="form-control" placeholder="درصد تخفیف را وارد کنید" value="{{ old('percent' , $discount->percent) }}">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">کاربر مربوط به تخفیف (اختیاری)</label>
                            <select class="form-control" name="users[]" id="users" multiple>

                                @foreach(\App\Models\User::all() as $user)
                                    <option value="{{ $user->id }}" {{ in_array($user->id , $discount->users->pluck('id')->toArray() ) ? 'selected' : '' }}>{{ $user->fullname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">محصول مربوطه (اختیاری)</label>
                            <select class="form-control" name="products[]" id="products" multiple>

                                @foreach(\App\Models\Market\Product::all() as $product)
                                    <option value="{{ $product->id }}" {{ in_array($product->id , $discount->products->pluck('id')->toArray() ) ? 'selected' : '' }}>{{ $product->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">دسته‌بندی مربوطه (اختیاری)</label>
                            <select class="form-control" name="categories[]" id="categories" multiple>

                                @foreach(\App\Models\Market\Category::all() as $category)
                                    <option value="{{ $category->id }}" {{ in_array($category->id , $discount->categories->pluck('id')->toArray() ) ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">مهلت استفاده</label>
                            <input type="datetime-local" name="expired_at" class="form-control" id="inputEmail3" placeholder="ملهت استفاده را وارد کنید" value="{{ old('expired_at' , \Carbon\Carbon::parse($discount->expired_at)->format('Y-m-d\TH:i:s')) }}">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ویرایش کد تخفیف</button>
                        <a href="{{ route('admin.market.discount.index') }}" class="btn btn-danger float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        $('#users').select2({
            'placeholder' :  'همه کاربر ها'
        });

        $('#products').select2({
            'placeholder' :  'همه محصولات'
        });

        $('#categories').select2({
            'placeholder' : 'همه دسته ها'
        });
    </script>
@endsection
