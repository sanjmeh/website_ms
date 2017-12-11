var menuBtn = document.getElementsByClassName("mobile-menu")[0],
    mobileMenu    = document.getElementById("mobile-menu");

menuBtn.addEventListener("click", function(){
    var display = mobileMenu.style.display;

    if(display == "" || display == "none"){
        mobileMenu.style.display = "block";
        menuBtn.style.background = "#4b7f39";
    }
    else{
        mobileMenu.style.display = "none";
        menuBtn.style.background = "none";
    }
});


var config = {
    mode: 'horizontal',
    auto: true,
    autoControls: true,
    onSlideAfter: function() {
        $('.bx-start').trigger('click');
    }
}

var sliders = new Array();
$('.bxslider').each(function(i, slider) {
    sliders[i] = $(slider).bxSlider(config);
});


function reloadSliders(){
    $.each(sliders, function(i, slider) {
        slider.reloadSlider(config);
    });
}


$(window).on("resize load", function(){
    reloadSliders();
})





$("div.tabs li").click(function(){
    $("div.tabs li").removeClass("current");
    $(this).addClass("current");

    var tabName = $(this).data("tab");

    $(".tab-content").find(".tab").removeClass("current");
    $(".tab-content").find("."+tabName).addClass("current");
    reloadSliders();
});


$(window).scroll(function(){
    var menu = $("div.menu")[0],
        height = menu.offsetHeight/2;

    if($(window).scrollTop() > height){
        menu.style.position = "fixed";
        menu.style.background = "#6aad49";
    }
    else{
        menu.style.position = null;
        menu.style.background = null;
    }
});