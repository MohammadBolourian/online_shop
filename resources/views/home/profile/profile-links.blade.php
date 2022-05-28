<ul class="p-4">
    <li class="mb-4 bg-warning rounded">
        <i class="icon-profile las la-bell"></i>
        <a href="{{ route('showProfile',  (session('LoggedUserInfo'))['LoggedUserInfo']['id'])}}"> اطلاعات شخصی</a>
    </li>
        <li class="mb-4 bg-light rounded">
            <i class="icon-profile las la-bell"></i>
            <a href="{{ route('showAddress',  (session('LoggedUserInfo'))['LoggedUserInfo']['id'])}}"> آدرس </a>
        </li>
    <li class="mb-4 bg-danger rounded">
        <i class="icon-profile las la-inbox"></i>
        <a href="#"> پیام ها</a>
    </li>
    <li class="mb-4 bg-success rounded">
        <i class="icon-profile las la-umbrella"></i>
        <a href="{{route('user.order')}}">سفارشات</a>
    </li>
    <li class="mb-4 bg-primary rounded">
        <i class="icon-profile las la-info-circle"></i>
        <a href="#">  تماس با پشتیبانی</a>
    </li>
</ul>
