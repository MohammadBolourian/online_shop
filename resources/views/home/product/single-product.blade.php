@extends('home.layout.master')
@section('head-tag')
    <link href="{{asset('assets/sweetalert/sweetalert2.css')}}" rel="stylesheet"/>
    @endsection




@include('admin.alerts.sweetalert.success')
<script >
    $('#sendComment').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        let parent_id = button.data('id');

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('input[name="parent_id"]').val(parent_id)
    })
</script>

@section('content')
@auth
    <div class="modal fade" id="sendComment">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ارسال نظر</h5>
                    <button type="button" class="close mr-auto ml-0" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('send.comment') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="commentable_id" value="{{ $data->id }}" >
                        <input type="hidden" name="commentable_type" value="{{ get_class($data) }}">
                        <input type="hidden" name="parent_id" value="0">

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">پیام دیدگاه:</label>
                            <textarea name="comment" class="form-control" id="message-text"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
                        <button type="submit" class="btn btn-primary">ارسال نظر</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endauth



<div class="row m-2 bg-light">
    <div class="col-md">
        <div class="timer_product_offer">
            <span class="float-right mt-3">پیشنهاد شگفت انگیز</span>
            <span class="float-left mt-3">2:22:12:05</span>
        </div>
        <div class="row">
            <div class="col-md-1">
                             <span class="d-inline-flex flex-column">
                                     <a href="#" data-toggle="tooltip" data-placement="left" title="" style="color: black;" data-original-title="اضافه کردن به علاقه مندی ها">
                                         <i class="icon_product lar la-heart"></i>
                                     </a>
                                  <a href="#" data-toggle="tooltip" data-placement="left" title="" style="color: black;" data-original-title="اشتراک گذاری">
                                          <i class="icon_product las la-share-alt"></i>
                                     </a>
                                  <a href="#" data-toggle="tooltip" data-placement="left" title="" style="color: black;" data-original-title="مقایسه">
                                         <i class="icon_product las la-sync"></i>
                                     </a>
                        </span>
            </div>
            <div class="col-md-11">
                <div class="img-zoom-container">
                    <img id="myimage" src="{{ asset($data->image['indexArray']['large'] ) }}" width="300" height="240" >
                </div>
            </div>
            <div class="gallery">
            @foreach($images as $image)
                    <a href="{{asset($image->image)}}" data-lightbox="mygallery"><img src="{{asset($image->image)}}" alt="{{$image->alt}}"> </a>
                @endforeach
            </div>
        </div>



    </div>
    <div class="col-md">
        <div id="myresult" class="img-zoom-result " style="background-image:{{ asset($data->image['indexArray']['large'] ) }}; background-size: 1327.43px 1200px;"></div>
        <div class="p-3">
            <h5>{{$data->title}}</h5>
            <div class="mt-3 small">
                <span>برند :</span> <p class="tozih-p">لورم </p>
                <span>شناسه محصول :</span> <p class="tozih-p">BKP-9291 </p>
                <span>دسته :</span> <p class="tozih-p">
                    @foreach($data->categories as $cate)
                        <a class="text-info" href="/category/{{$cate->id}}">{{$cate->name}}  </a>/
                    @endforeach
                </p>
            </div>
            <h6 class="font-weight-bold mt-4">انتخاب رنگ </h6>

            <div class="box">
                <label>
                    <input type="radio" name="like" checked="">
                    <span class="yes">مشکی</span>
                </label>
            </div>
        </div>

    </div>
    <div class="col-md p-5">
        <div class="product_price">
            <div class="granty">
                <i class="las la-clipboard-check"></i>
                <p>گارانتی اصالت و سلامت فیزیکی</p>
            </div>
            <div class="granty">
                <i class="las la-shipping-fast"></i>
                <p> آماده ارسال</p>
            </div>
            <div class="granty d-none">
                <i class="las la-times"></i>
                <p> ناموجود</p>
            </div>

            <div class="off_price">
                450,000
            </div>
            <div class="sell_price text-center">
                <span>{{ number_format($data->price) }}</span>
                <span>تومان</span>
                <span class="off_percent">22%</span>
            </div>
            <div class="mojodi">
                <i class="las la-store-alt"></i>
                <span>{{ $data->inventory }}</span>
                <span>در انبار</span>
            </div>

            <div class="quantity">
                <div style="position: absolute">
                    <span id="plus">+</span>
                    <input id="tedad_mahsol" type="number" name="quantity" min="1" max="{{ $data->inventory }}" value="1">
                    <span id="minus" style="position: relative; left: 30px">-</span>
                </div>
            </div>
            <div id="add_to_basket">
                <form method="POST" action="{{route('cart.add',$data->id)}}" id="add-to-cart">
                    @csrf
                </form>
                <span onclick="document.getElementById('add-to-cart').submit()">افزودن به سبد خرید</span>
            </div>
        </div>
    </div>
{{--        //======================================> naghd o barrasi--}}
    <div class="naghd_o_barrasi col-md-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#home"><i class="las la-pen"></i> نقد و بررسی</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1"><i class="las la-file-alt"></i> مشخصات </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#menu2"><i class="las la-comment"></i> دیدگاه ها</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="home" class="container tab-pane"><br>
                <h3 class="title_naghd-o-barrasi">نقد و بررسی اجمالی</h3>
                <span>{{$data->title}}</span>
                <div class="row col-md-12">

                    <div class="col-md-4">
                        <img id="img_tabbar" src="{{asset('assets/images/pen-paper.png')}}">
                    </div>
                    <div class="col-md-8 text-center mb-5">

                        <p id="tozihat_mahsol">
                            {!! substr("$data->description", 0, 10); !!}

                            <span id="dots">...</span>
                            <span id="more" style="display: none">
                             {!! substr("$data->description", 10, 10000); !!}

                                    </span>
                        </p>
                        <span onclick="myFunction()" id="myBtn">ادامه مطلب</span>
                    </div>
                </div>

            </div>
            <div id="menu1" class="container tab-pane fade"><br>

                <h3 class="title_naghd-o-barrasi">مشخصات</h3>
                <span>{{$data->title}}</span>
                <b class="moshakhast">
                    <i class="las la-caret-left"></i>
                    <span>اطلاعات کلی</span>
                </b>
                <ul class="zirShakhe_moshakhasat">
                    @foreach($data->attributes as $atter)
                    <li>
                        <span class="span_right">{{$atter->pivot->attribute->name}}</span>
                        <span class="span_left">&zwnj;{{$atter->pivot->value->value}}</span>
                    </li>
                    @endforeach
                </ul>

            </div>
            <div id="menu2" class="container tab-pane fade active show"><br>
                <h3 class="title_naghd-o-barrasi">امتیاز کاربران به:</h3>
                <span>{{$data->title}}</span><span> (8 نفر )</span>
                <div class="row mt-5 mb-3">
                    <div class="col-md font-12 text-center">
                        <div class="row mb-3 mt-3">
                            <div class="col-4">ارزش خرید به نسبت قیمت</div>
                            <div class="col-6">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                        40%
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">معمولی</div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <div class="col-4">کیفیت ساخت</div>
                            <div class="col-6">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                        80%
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">خوب</div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <div class="col-4">تنوع رنگ</div>
                            <div class="col-6">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                        100%
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">عالی</div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <div class="col-4">ارزش خرید</div>
                            <div class="col-6">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:10%">
                                        10%
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">بد</div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <div class="col-4">محبوبت برند</div>
                            <div class="col-6">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                        70%
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">خوب</div>
                        </div>
                    </div>
                    <div class="col-md">
                        <h5 class="font-weight-bold mr-4 mb-4">شما هم می&zwnj;توانید در مورد این کالا نظر بدهید.</h5>
                        <p class="mr-4">برای ثبت نظر، لازم است ابتدا وارد حساب کاربری خود شوید. اگر این محصول را قبلا از ممل کالا خریده باشید، نظر شما به عنوان مالک محصول ثبت خواهد شد.</p>
                        @auth
                        <div class="mt-5 mx-auto">
                            <span id="btn_nazarat" data-toggle="modal" data-target="#sendComment">
                                <svg><rect></rect></svg>افزودن نظر جدید
                            </span>
                        </div>
                        @endauth
                        @guest
                            <div class="alert alert-warning">برای ثبت نظر لطفا وارد سایت شوید.</div>
                        @endguest
                    </div>
                </div>
                <div class="show_nazarat">
                    @foreach($data->comments()->where('approved' , 1)->where('parent_id' , 0)->orderBy('created_at', 'desc')->get() as $comment )
                    <div class="box_nazarat">
                        <h5 class="mb-4">{{ $comment->comment }}</h5>
                        <span class="by"> توسط {{ $comment->user->fullname }} در تاریخ {{ jdate($comment->created_at)->ago() }}</span>
                        <div class="row mt-5">


                            @foreach($comment->child as $childComment)
                                <div class=" mt-3 col-12">
                                    <div class="card-header d-flex justify-content-between">
                                        <div>
                                            <span>{{ $childComment->user->fullname }}</span>
                                            <span class="text-muted">{{ jdate($childComment->created_at)->ago() }}</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        {{ $childComment->comment }}
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
@section('script')
<script type="text/javascript">
    function imageZoom(imgID, resultID) {
        var img, lens, result, cx, cy;
        img = document.getElementById(imgID);
        result = document.getElementById(resultID);
        /*create lens:*/
        lens = document.createElement("DIV");
        lens.setAttribute("class", "img-zoom-lens");
        /*insert lens:*/
        img.parentElement.insertBefore(lens, img);
        /*calculate the ratio between result DIV and lens:*/
        cx = result.offsetWidth / lens.offsetWidth;
        cy = result.offsetHeight / lens.offsetHeight;
        /*set background properties for the result DIV:*/
        result.style.backgroundImage = "url('" + img.src + "')";
        result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
        /*execute a function when someone moves the cursor over the image, or the lens:*/
        lens.addEventListener("mousemove", moveLens);
        img.addEventListener("mousemove", moveLens);
        /*and also for touch screens:*/
        lens.addEventListener("touchmove", moveLens);
        img.addEventListener("touchmove", moveLens);
        function moveLens(e) {
            var pos, x, y;
            /*prevent any other actions that may occur when moving over the image:*/
            e.preventDefault();
            /*get the cursor's x and y positions:*/
            pos = getCursorPos(e);
            /*calculate the position of the lens:*/
            x = pos.x - (lens.offsetWidth / 2);
            y = pos.y - (lens.offsetHeight / 2);
            /*prevent the lens from being positioned outside the image:*/
            if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
            if (x < 0) {x = 0;}
            if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
            if (y < 0) {y = 0;}
            /*set the position of the lens:*/
            lens.style.left = x + "px";
            lens.style.top = y + "px";
            /*display what the lens "sees":*/
            result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
        }
        function getCursorPos(e) {
            var a, x = 0, y = 0;
            e = e || window.event;
            /*get the x and y positions of the image:*/
            a = img.getBoundingClientRect();
            /*calculate the cursor's x and y coordinates, relative to the image:*/
            x = e.pageX - a.left;
            y = e.pageY - a.top;
            /*consider any page scrolling:*/
            x = x - window.pageXOffset;
            y = y - window.pageYOffset;
            return {x : x, y : y};
        }
    }

    imageZoom("myimage", "myresult");
    $( ".img-zoom-container" ).mouseover(function() {
        $( "#myresult" ).css( "visibility", "visible" );
        $(".img-zoom-lens").css("border","2.5px solid rgb(239, 86, 97)");
    });
    $( ".img-zoom-container" ).mouseout(function() {
        $( "#myresult" ).css( "visibility", "hidden" );
        $(".img-zoom-lens").css("border","none");
    });
    //===================> end zoom tooltip is here

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();

    });

    //============================> gallery

    var count = $(".gallery > a > img").length;
    if(count>3){
        $('.gallery  > a').children('img:nth(3)').css("position", "absolute");
        // $('.gallery  > a').children('img:nth(3)').parent().append("<img id='theImg' src='img/20.png'/>");
    }
    if(count>5) {
        var i;
        for (i = 4; i <= count; i++) {
            $('.gallery  > a').children('img:nth(' + i + ')').css("display", "none");
        }
    }
    //======================>> add to basket tedad mahsol
    var x;
    $("#plus").click(function() {
        x =$("#tedad_mahsol").val();
        x++;
        $('#tedad_mahsol').val(x);

    });

    $("#minus").click(function() {
        x =$("#tedad_mahsol").val();
        if(x>1) {
            x--;
            $('#tedad_mahsol').val(x);
        }
    });



    //=====================> entekhab rang va taviz akx
    $('.yes').on({
        'click': function(){
            $('#myimage').attr('src','img/Sports-Bag-Verona-L-C110188ba57-600x600.jpg');
            $('#myresult').css('backgroundImage','url(img/Sports-Bag-Verona-L-C110188ba57-600x600.jpg)');
        }
    });

    $('.no').on({
        'click': function(){
            $('#myimage').attr('src','img/23.jpg');
            $('#myresult').css('backgroundImage','url(img/23.jpg)');
        }
    });

    //=================================> see more in naghd o barrasi mahsol
    function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "ادامه مطلب";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "بستن";
            moreText.style.display = "inline";
        }
    }
    //============================> ssticky menu
    $(window).scroll(function(){var $heightScrolled = $(window).scrollTop();
        var $defaultHeight = 550;
        if($heightScrolled < $defaultHeight){
            $('.nav').removeClass("sticky");
        }
        else{
            $('.nav').addClass("sticky");
        }
    });
</script>
@endsection
