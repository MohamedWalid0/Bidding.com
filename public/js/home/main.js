// swipper slider
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});
// end swipper slider

// wow animations
new WOW().init();
// end wow animations




$(document).ready(function () {

    // loading spinner
    $("#loading").fadeOut( 1000 , function(){

        $("body").css("overflow" , "auto") ;
        $("#loading").css("position" , "unset") ;
        $(".sk-folding-cube").css("display" , "none");

    })
    // end loading spinner

    // fixed navbar

    let scroll_start = 0;
    let startchange = $('.mainNav');
    let offset = startchange.offset();
    if (startchange.length){
        $(document).scroll(function() {
            scroll_start = $(document).scrollTop();
            if(scroll_start > offset.top) {
                $(".mainNav").css('background-color', 'white');
                $(".mainNav").css('box-shadow', '1px 1px 15px #888888');
            } else {
                $('.mainNav').css('background-color', 'transparent');

            }
        });
    }
    // end fixed navbar

});





// go to top button
if($(window).scrollTop() < 100){
  $('.goToTop').hide();
}

$(window).scroll(function(){

  if ($(this).scrollTop() > 100) {
    $('.goToTop').show(500).fadeIn();
  }

  else {
    $('.goToTop').fadeOut().hide(500);
  }

});

$(".goToTop").click(function () {
  $("html, body").animate({scrollTop: 0}, 1000);
})
// end go to top button





