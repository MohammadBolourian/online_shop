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
    $('.gallery  > a').children('img:nth(3)').parent().append("<img id='theImg' src='img/20.png'/>");
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
