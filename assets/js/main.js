$(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.navbar').addClass('navbar-scrolled');
      $('.scrollToTop').show();
    } else {
      $('.navbar').removeClass('navbar-scrolled');
      $('.scrollToTop').hide();
    }
});

$(window).on('load', function() {
    AOS.init();
});

$(document).ready(function(){
  $('.scrollToTop').click(function(){
    $('html, body').animate({scrollTop : 0},800);
    return false;
  });
});

// slick slider
// $(document).ready(function () {
//   $(".multiple-items").slick({
//     infinite: true,
//     slidesToShow: 3,
//     slidesToScroll: 1,
//     arrows: true,
//     centerMode: true,
//     centerPadding: "0",
//   });
// });
