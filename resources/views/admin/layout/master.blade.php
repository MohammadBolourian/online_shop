
<!DOCTYPE html>
<meta name="csrf-token" content="{{ csrf_token() }}">
<html lang="en">
<head>
    @include('admin.layout.head-tag')
    @yield('head-tag')
</head>
<body dir ="rtl">
    @include('admin.layout.header')
<div class="row container-fluid">
    @include('admin.layout.sidebar')
    <div id="p2" class="col-md-10" style="margin-top: 126px">
        @yield('content')
    </div>
</div>
    @include('admin.layout.scripts')
    @yield('script')

    <section class="toast-wrapper flex-row-reverse">
        @include('admin.alerts.toast.success')
        @include('admin.alerts.toast.error')
    </section>

    @include('admin.alerts.sweetalert.error')
    @include('admin.alerts.sweetalert.success')
</body>
</html>
