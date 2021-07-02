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

  $('a.scroll-to').on('click',function(e) {
    if (this.hash !=="") {
      
      e.preventDefault();
  
      var hash = this.hash;
      var height_navbar = $('nav.navbar-scrolled').outerHeight( true );
      var koordinat=$(hash).offset().top;
      var koordinat2=$(hash).offset().top-=62;
      console.log(koordinat);
      console.log(koordinat-=2);


      $('html, body').animate({
        scrollTop: koordinat2
      }, 800, function() {
        window.location.hash = hash;
      })
  
    }
  });

});

$(document).ready(function () {
  
  var Counter= 1;
  var navlength = $('a.nav-services-home').length;

  setInterval(function(){
    
    
    // $('a.nav-services-home').next().click;
    $('a.ns-'+Counter).click();
    
    Counter+=1;

    if (Counter > navlength) {
      Counter=1;
    }
  }, 5000);
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
