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
                    <span class="d-block mt-4">{{$user->fullname}} </span>
                </div>
                <div>
                    <hr>
                </div>
               @include('home.profile.profile-links')
            </div>
        </div>
        <div class="col-md-8 bg-secondary    p-4">
            <div class="container">
                <div class="edit-profile">
                    <h6>بروزرسانی پروفایل</h6>
                    <div class="seprator"></div>
                    <h6 class="mb-4">اطلاعات ادرس</h6>
{{--                    <form action="{{ route('user.updateAddress',$user->addresses->id) }}" method="post" enctype="multipart/form-data" id="form">--}}
{{--                        @csrf--}}
{{--                        {{ method_field('put') }}--}}
{{--                        <button type="submit" class="btn btn-outline-success">ثبت تغییرات</button>--}}
{{--                    </form>--}}
                    <form action="{{ route('user.updateAddress',$user->addresses->id) }}" method="post" >
                        @csrf
                        {{ method_field('put') }}
                        <div class="form-group">
                        <label for="state" class="w-10">استان</label>
                            <select class="form-control input-profile" id="state" name="state" style="height: 37px;padding-right: 3px">
                                <option value="0" selected disabled>استان را انتخاب کنید</option>


                                @foreach($provinces as $province)
{{--                                  @php--}}
{{--                                      $selected = '';--}}
{{--                                      if($province->id == $user->addresses->state)--}}
{{--                                      {--}}
{{--                                      $selected = 'selected="selected"';--}}
{{--                                      }--}}
{{--                                  @endphp--}}
{{--                                    <option value="{{$province->id}}"  {{$selected}}>{{$province->name}}</option>--}}
                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                @endforeach
                            </select>
                            <span class="error text-danger"></span>
                        </div>
                        @error('state')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                        @enderror
                        <div class="form-group">
                            <label for="city_id" class="w-10">شهر</label>
                            <select class="form-control input-profile" id="city_id" name="city_id" style="height: 37px;padding-right: 3px">
                                <option value="0" selected disabled>شهر را انتخاب کنید</option>
                            </select>
                            <span class="error text-danger"></span>
                        </div>
                        @error('city_id')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                        @enderror

                        <div class="form-group">
                            <label class="w-10" >کد پستی :</label>
                            <input type="text" class="form-control input-profile" name="postal_code" id="postal_code" value="{{ old('postal_code', $user->addresses->postal_code) }}">
                            <span class="error text-danger"></span>
                        </div>
                        @error('postal_code')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                        @enderror

                        <div class="form-group">
                            <label class="w-10" >آدرس کامل  :</label>
                            <input type="text" class="form-control input-profile" name="address" id="address" value="{{ old('address', $user->addresses->address) }}">
                            <span class="error text-danger"></span>
                        </div>
                        @error('address')
                        <span class=" bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                        @enderror

                        <br>
                        <br>
                        <div>
                            <hr>
                        </div>
                        <br>
                        <div class="float-left ml-5">
                            <button type="submit" class="btn btn-outline-success">ثبت تغییرات</button>

                            <a href="{{ route('home') }}" ><button type="button" class="btn btn-outline-danger">لغو</button></a>
                        </div>

                        <br>
                        <br>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </body>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#state').on('change', function () {
                var state = this.value;
                $("#city_id").html('');
                $.ajax({
                    url: "{{url('cities')}}",
                    type: "POST",
                    data: {
                        province_id: state,
                        _token: '{{csrf_token()}}'
                    },

                    dataType: 'json',
                    success: function (result) {
                        $('#city_id').html('<option value="">شهر را انتخاب کنید</option>');
                        $.each(result.cities, function (key, value) {
                            $("#city_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    @endsection
