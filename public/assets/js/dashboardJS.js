$('#hide-show').click(function(){
    $(".hide-show").toggle(800);
    $("#p1").toggleClass("col-md-2  col-ms-2");
    $("#p2").toggleClass("col-md-10  col-md-11");
});

$(".nav-item").click(function() {
    // ($(this).find("ul").fadeToggle(500));
    // $(this).toggleClass("background");

    $(".zir-menu").removeClass('d-block');
    $(".nav-edit").removeClass('background');
     $(this).find(".zir-menu").addClass('d-block');
     $(this).find(".nav-edit").addClass('background');

});


//////////////////time

var $dOut = $('#mah-sal'),
    $hOut = $('#hours'),
    $mOut = $('#minutes'),
    $ampmOut = $('#ampm');
    $rooz = $('#dayname');
    $rooznumber = $('#datenumber');
var months = [
    'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
];

var days = [
    'یک شنبه', 'دوشنبه', 'سه شنبه', 'چهار شنبه', 'پنج شنبه', 'جمعه', 'شنبه'
];

function update(){
    var date = new Date();

    var ampm = date.getHours() < 12
        ? 'صبح'
        : 'عصر';

    var hours = date.getHours() == 0
        ? 12
        : date.getHours() > 12
            ? date.getHours() - 12
            : date.getHours();

    var minutes = date.getMinutes() < 10
        ? '0' + date.getMinutes()
        : date.getMinutes();

    // var seconds = date.getSeconds() < 10
    //     ? '0' + date.getSeconds()
    //     : date.getSeconds();

    var dayOfWeek = days[date.getDay()];
    var month = months[date.getMonth()];
    var day = date.getDate();
    var year = date.getFullYear();

    var dateString = month + '  '+ year;
    $rooz.text(dayOfWeek);
    $rooznumber.text(day);
    $dOut.text(dateString);
    $hOut.text(hours);
    $mOut.text(minutes);
    // $sOut.text(seconds);
    $ampmOut.text(ampm);
}

update();
window.setInterval(update, 60000);

//=====================> اضافه کردن ویيگی ها<=========================
$('#add-pro-custom').click(function(){
    var str ="<div class=\"form-inline p-4\">\n" +
        "<label class=\"w-40\">نام :</label>\n" +
        "<input type=\"text\" class=\"form-control mr-4 w-60\" placeholder=\" نام ویژگی را وارد کنید \">\n" +
        "</div>\n" +
        "<div class=\"form-inline p-4\">\n" +
        "<label class=\"w-40\">ویژگی :</label>\n" +
        "<textarea rows=\"3\" class=\"form-control mr-4 w-60\" placeholder=\"یک متن وارد کنید برای ویژگی\"></textarea>\n" +
        " </div>\n" +
        " <div class=\"seprator\"></div>";

    $("#add-here").append(str);
});
//===========================> moshkel in ghesmat porside shavad gharar dadan mohtava daron tag p  khata darad dorost shavad
$('#add-pro-link').click(function () {
   if($('#search-pro-link').val() !=""){
       var x =$('#search-pro-link').val();
       var y = "<p class='mx-2'></p>";
       console.log(y);
       $("#add-pro-link-p").append(x);
       $('#search-pro-link').val("");
   }

});

//==========================> add pick and color for tab advance
$("#add-color-pic").click(function () {
    var x ="<div class=\"form-inline p-4\">\n" +
        " <input type=\"color\"  value=\"#ff0000\"><br><br>\n" +
        " <a href=\"#\" class=\"mx-3\"> انتخاب تصویر محصول</a>\n" +
        "  <img style=\"border-radius: 10px\" src=\"../img/Hyundai-Tucson-Full-2017-Automatic-Car-10-Percent-Payment-Certificate-ed7bfe-220x220.jpg\">\n" +
        "</div>";
    $("#add-pick-color").append(x);
});

$("#add-rate-bar-btn").click(function () {
    var str ="<div class=\"form-inline p-4\">\n" +
        "                                 <label class=\"w-40\">نام :</label>\n" +
        "                                 <input type=\"text\" class=\"form-control mr-4 w-60\" placeholder=\" نام ویژگی را وارد کنید \">\n" +
        "                             </div>\n" +
        "                             <div class=\"form-inline p-4\">\n" +
        "                                 <label class=\"w-40\">ویژگی :</label>\n" +
        "                                 <textarea rows=\"3\" class=\"form-control mr-4 w-60\" placeholder=\"یک متن وارد کنید برای ویژگی\"></textarea>\n" +
        "                             </div>\n" +
        "                             <div class=\"seprator\"></div>";
    $("#add-rate-bar").append(str);
});

$("#add-detail-btn").click(function () {
    var z = " <div class=\"form-inline p-4\">\n" +
        "                                 <label class=\"w-40\">نام :</label>\n" +
        "                                 <input type=\"text\" class=\"form-control mr-4 w-60\" placeholder=\" نام ویژگی را وارد کنید \">\n" +
        "                             </div>\n" +
        "                             <div class=\"form-inline p-4\">\n" +
        "                                 <label class=\"w-40\">توضیحات :</label>\n" +
        "                                 <textarea rows=\"3\" class=\"form-control mr-4 w-60\" placeholder=\"توضیحات وارد کنید\"></textarea>\n" +
        "                             </div>";
   $("#add-detail").append(z);
});
$("#add-info-btn").click(function () {
    var z = " <div class=\"form-inline p-4\">\n" +
        "                                 <label class=\"w-40\">نام :</label>\n" +
        "                                 <input type=\"text\" class=\"form-control mr-4 w-60\" placeholder=\" نام ویژگی را وارد کنید \">\n" +
        "                             </div>\n" +
        "                             <div class=\"form-inline p-4\">\n" +
        "                                 <label class=\"w-40\">توضیحات :</label>\n" +
        "                                 <textarea rows=\"3\" class=\"form-control mr-4 w-60\" placeholder=\"توضیحات وارد کنید\"></textarea>\n" +
        "                             </div>";
    $("#add-info").append(z);
});
