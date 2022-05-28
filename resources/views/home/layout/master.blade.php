{{--in ghesmat faghat baray login ast--}}

@php  use App\Models\User;auth()->loginUsingId(1);
        $data = ['LoggedUserInfo' => User::where('id', '=', 1)->first()];
        session(['LoggedUserInfo' => $data ]);
@endphp

{{--    dar asl bayad comment shavad--}}
<!DOCTYPE html>
<meta name="csrf-token" content="{{ csrf_token() }}">
<html lang="fa" style="scroll-behavior: smooth;">
<head>
    @include('home.layout.head-tag')
    @yield('head-tag')
</head>

<body dir ="rtl">
    @include('home.layout.header')

    <div id="p2" class="col-12">
        @yield('content')
    </div>
    @include('home.layout.footer')
    @include('home.layout.scripts')
    @yield('script')
    @include('admin.alerts.sweetalert.error')
    @include('admin.alerts.sweetalert.success')
</body>
</html>
