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




// loading spinner
$(document).ready(function () {

  $("#loading").fadeOut( 1000 , function(){

    $("body").css("overflow" , "auto") ;
    $("#loading").css("position" , "unset") ;
    $(".sk-folding-cube").css("display" , "none");

  })

});
// end loading spinner





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






