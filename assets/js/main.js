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