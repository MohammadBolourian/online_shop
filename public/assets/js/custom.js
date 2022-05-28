function next() {
    var a=$(".slider .slides .act");
    $(" .slider .slides .act ").removeClass("act");
    if(a.next().length==0){
        $(".slider .slides img").first().addClass("act");
    }
    else a.next().addClass("act");
    var x =$(" .slider .slides .act ").index();
    $(" .slider .indicator li").removeClass("activ");
    $(" .slider .indicator li").eq(x).addClass("activ");
}

function back() {
    var a=$(".slider .slides .act");
    $(" .slider .slides .act ").removeClass("act");
    if(a.prev().length==0){
        $(".slider .slides img").last().addClass("act");
    }
    else a.prev().addClass("act");
    var x =$(" .slider .slides .act ").index();
    $(" .slider .indicator li").removeClass("activ");
    $(" .slider .indicator li").eq(x).addClass("activ");


}
$( ".right" ).click(function() {
    back();
});
$(".left").click(function() {
    next();
});


function slide(target) {
    $(".indicator li").removeClass("activ").eq(target).addClass("activ");
    $(" .slider .indicator li").eq(target).addClass("activ");
    $(".slider .slides img").removeClass("act");
    $(".slider .slides img").eq(target).addClass("act");

}

$(".indicator li").click(function() {
    var target = $(this).index();
    slide(target);
});


setInterval(function() {
    next();
}, 2500);

// \\========================================>slider end

//==============================> slider amazing
var x =0;
$('#left-right').click(function () {
    if(x<1) {
        var l = $('.amazing_show').css('left');
        l = parseInt(l.replace(/px/, '')) + 315;
        $('.amazing_show').css('left', l + 'px');
        x++;

    }
});

$('#left-flesh').click(function () {
    var l =$('.amazing_show').css('left');
    if(x>0){
        l=parseInt(l.replace(/px/,''))-315;
        $('.amazing_show').css('left',l+'px');
        x--;
    }
});

