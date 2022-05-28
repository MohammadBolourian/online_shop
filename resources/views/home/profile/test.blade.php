<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<form>
<div>
    <label for="state">استان</label>
    <select id="state" name="state" style="height: 37px;padding-right: 3px">
        <option value="0" selected disabled>استان را انتخاب کنید</option>
        @foreach($provinces as $province)
            <option value="{{$province->id}}">{{$province->name}}</option>
            @endforeach
    </select>
</div>

    <div>
        <label for="city">شهر</label>
        <select id="city" name="city" style="height: 37px;padding-right: 3px">
            <option value="0" selected disabled>شهر را انتخاب کنید</option>
        </select>
    </div>
</form>

<script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#state').on('change', function () {
            var state = this.value;
            $("#city").html('');
            $.ajax({
                url: "{{url('cities')}}",
                type: "POST",
                data: {
                    province_id: state,
                    _token: '{{csrf_token()}}'
                },

                dataType: 'json',
                success: function (result) {
                    $('#city').html('<option value="">شهر را انخاب کنید</option>');
                    $.each(result.cities, function (key, value) {
                        $("#city").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
        });
</script>




