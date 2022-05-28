<div id="p1" class="col-md-2">
    <ul class="nav flex-column right-side">
        <li class="nav-item">
            <a class="nav-link nav-edit" href="#"><i class="icon-right las la-tachometer-alt"></i>
                <span class="hide-show">داشبورد
                            <span class="badge badge-info mr-4">NEW</span>
                        </span>

            </a>
            <ul class="zir-menu">
                <li>
                    <a class="nav-link" href="{{route("admin.home")}}"><i class="sub-icon-right ml-1 las la-home"></i> <span class="hide-show">خانه</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('admin.see-profile',  (session('LoggedUserInfo'))['LoggedUserInfo']['id'])}}"><i class="sub-icon-right ml-1 las la-address-card"></i><span class="hide-show">مشاهده پروفایل</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{route("admin.logout")}}"><i class="sub-icon-right ml-1 las la-sign-out-alt"></i> <span class="hide-show">خروج</span></a>
                </li>
            </ul>
        </li>
       @can('product-manager')
            <li class="nav-item">
                <a class="nav-link nav-edit" href="#"><i class="icon-right ml-1 las la-palette"></i> <span class="hide-show">ویترین فروشگاه</span></a>
                <ul class="zir-menu">
                    <li>
                        <a class="nav-link" href="{{route('admin.market.category.index')}}"><i class="sub-icon-right ml-1 las la-shopping-cart"></i><span class="hide-show"> دسته بندی محصولات</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.market.property.index')}}"><i class="sub-icon-right ml-1 las la-cart-plus"></i> <span class="hide-show"> فرم کالا</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route("admin.market.brand.index")}}"><i class="sub-icon-right ml-1 las la-cart-plus"></i> <span class="hide-show"> برند</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route("admin.market.product.index")}}"><i class="sub-icon-right ml-1 las la-cart-plus"></i> <span class="hide-show">کالا ها </span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route("admin.market.store.index")}}"><i class="sub-icon-right ml-1 las la-cart-plus"></i> <span class="hide-show">انبار </span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route("admin.market.comment.index")}}"><i class="sub-icon-right ml-1 las la-cart-plus"></i> <span class="hide-show"> نظرات</span></a>
                    </li>
                </ul>
            </li>
           @endcan
     @can('blog-manager')
            <li class="nav-item">
                <a class="nav-link nav-edit" href="#"><i class="icon-right ml-1 las la-palette"></i> <span class="hide-show"> محتوی</span></a>
                <ul class="zir-menu">
                    <li>
                        <a class="nav-link" href="{{route("admin.content.category.index")}}"><i class="sub-icon-right ml-1 las la-shopping-cart"></i><span class="hide-show"> دسته بندی ها</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route("admin.content.post.index")}}"><i class="sub-icon-right ml-1 las la-cart-plus"></i> <span class="hide-show"> پست ها </span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route("admin.content.comment.index")}}"><i class="sub-icon-right ml-1 las la-cart-plus"></i> <span class="hide-show"> نظرات</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route("admin.content.menu.index")}}"><i class="sub-icon-right ml-1 las la-cart-plus"></i> <span class="hide-show"> منو </span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route("admin.content.faq.index")}}"><i class="sub-icon-right ml-1 las la-cart-plus"></i> <span class="hide-show">سوالات متداول </span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route("admin.content.page.index")}}"><i class="sub-icon-right ml-1 las la-cart-plus"></i> <span class="hide-show"> پیج ساز</span></a>
                    </li>
                </ul>
            </li>
        @endcan
        @can('shop-manager')
        <li class="nav-item">
            <a class="nav-link nav-edit" href="#"><i class="icon-right ml-1 las la-pencil-alt"></i>  <span class="hide-show">سفارشات</span></a>
            <ul class="zir-menu">
                <li>
                    <a class="nav-link" href="{{ route('admin.market.order.index' , ['type' => 'paid']) }}"><i class="sub-icon-right ml-1 las la-book-open"></i><span class="hide-show">مشاهده سفارشات پرداخت شده</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('admin.market.order.index' , ['type' => 'unpaid']) }}"><i class="sub-icon-right ml-1 las la-book-open"></i><span class="hide-show"> سفارشات پرداخت نشده</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('admin.market.order.index'  , ['type' => 'preparation']) }}"><i class="sub-icon-right ml-1 las la-cart-plus"></i> <span class="hide-show"> در حال پردازش</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('admin.market.order.index' , ['type' => 'posted']) }}"><i class="sub-icon-right ml-1 las la-cart-plus"></i> <span class="hide-show"> ارسال شده </span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('admin.market.order.index' , ['type' => 'received']) }}"><i class="sub-icon-right ml-1 las la-cart-plus"></i> <span class="hide-show">دریافت شده </span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('admin.market.order.index' , ['type' => 'canceled']) }}"><i class="sub-icon-right ml-1 las la-cart-plus"></i> <span class="hide-show">کنسل شده </span></a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-edit" href="#"><i class="icon-right ml-1 las la-pencil-alt"></i>  <span class="hide-show">پرداخت ها</span></a>
            <ul class="zir-menu">
                <li>
                    <a class="nav-link" href="{{route("admin.market.payment.index")}}"><i class="sub-icon-right ml-1 las la-book-open"></i><span class="hide-show">مشاهده تمامی پرداخت ها</span></a>
                </li>
                <li>
                    <a class="nav-link" href=""><i class="sub-icon-right ml-1 las la-pen"></i> <span class="hide-show">پرداخت آنلاین</span></a>
                </li>
                <li>
                    <a class="nav-link" href=""><i class="sub-icon-right ml-1 las la-cart-plus"></i> <span class="hide-show"> پرداخت آفلاین</span></a>
                </li>
                <li>
                    <a class="nav-link" href=""><i class="sub-icon-right ml-1 las la-cart-plus"></i> <span class="hide-show"> پرداخت در محل</span></a>
                </li>
            </ul>
        </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link nav-edit" href="#"><i class="icon-right ml-1 lab la-codiepie"></i><span class="hide-show"> اطلاع رسانی</span></a>
            <ul class="zir-menu">
                <li>
                    <a class="nav-link" href="{{route("admin.notify.email.index")}}"><i class="sub-icon-right ml-1 las la-comment"></i><span class="hide-show">ایمیل</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{route("admin.notify.sms.index")}}"><i class="sub-icon-right ml-1 las la-envelope"></i> <span class="hide-show">پیامک</span></a>
                </li>
            </ul>
        </li>
        @can('shop-manager')
        <li class="nav-item">
            <a class="nav-link nav-edit" href="{{route("admin.market.discount.index")}}"><i class="icon-right ml-1 las la-flushed"></i><span class="hide-show">تخفیف ها </span></a>

        </li>
        <li class="nav-item">
            <a class="nav-link nav-edit" href="{{route("admin.market.delivery.index")}}"><i class="icon-right ml-1 las la-flushed"></i><span class="hide-show"> روش های ارسال </span></a>
        </li>
        @endcan
        @can('setting-manager')
        <li class="nav-item">
            <a class="nav-link nav-edit" href="{{route("admin.setting.index")}}"><i class="icon-right ml-1 las la-flushed"></i><span class="hide-show">تنظیمات</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link nav-edit" href="#"><i class="icon-right ml-1 las la-icons"></i><span class="hide-show"> نمایش</span></a>
            <ul class="zir-menu">
                <li>
                    <a class="nav-link" href="{{route("admin.custom.index-pic.index")}}"><i class="sub-icon-right ml-1 las la-image"></i><span class="hide-show">سفارشی سازی پس زمینه</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{route("admin.custom.link.index")}}"><i class="sub-icon-right ml-1 lab la-instagram"></i> <span class="hide-show">لینک های اجتماعی و نماد</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{route("admin.custom.slider.index")}}"><i class="sub-icon-right ml-1 las la-images"></i> <span class="hide-show">اسلایدر و تبلیغات</span></a>
                </li>
            </ul>
        </li>
        @endcan
        @can('user-manager')
        <li class="nav-item">
            <a class="nav-link nav-edit" href="#"><i class="icon-right ml-1 las la-user-tie"></i>  <span class="hide-show"> کاربران</span></a>
            <ul class="zir-menu">
                <li>
                    <a class="nav-link" href="{{route('admin.user.admin-user.index')}}"><i class="sub-icon-right ml-1 las la-users"></i><span class="hide-show"> کاربران ادمین</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('admin.user.customer.index')}}"><i class="sub-icon-right ml-1 las la-user-plus"></i> <span class="hide-show">مشتریان </span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('admin.user.role.index')}}"><i class="sub-icon-right ml-1 las la-user-plus"></i> <span class="hide-show">سطوح دسترسی </span></a>
                </li>
            </ul>
        </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link nav-edit" href="#"><i class="icon-right ml-1 las la-user-tie"></i>  <span class="hide-show"> تیکت ها</span></a>
            <ul class="zir-menu">
                <li>
                    <a class="nav-link" href="{{route('admin.ticket.newTickets')}}"><i class="sub-icon-right ml-1 las la-users"></i><span class="hide-show"> تیکت جدید</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('admin.ticket.openTickets')}}"><i class="sub-icon-right ml-1 las la-user-plus"></i> <span class="hide-show">تیکت باز </span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('admin.ticket.closeTickets')}}"><i class="sub-icon-right ml-1 las la-user-plus"></i> <span class="hide-show"> تیکت بسته </span></a>
                </li>
            </ul>
        </li>

    </ul>
</div>


