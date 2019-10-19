$(document).ready(function(){
  //Header animation
  
      function animateHeader() {
          var scrollTop = $(window).scrollTop();
          if (scrollTop > 50) {
              $('header').addClass('header-active py-1').removeClass(' py-0');
          } else {
              $('header').removeClass('header-active py-1').addClass('py-0');
          }
      }
        //animation 
        function animation() {

          var windowHeight = $(window).height();
          var scrollDown = $(window).scrollTop();
  
          $('.animation').each(function () {
              var position = $(this).offset().top;
  
              if (position < scrollDown + windowHeight - 50) {
                  var animacija = $(this).attr('data-animation');
                  var delay = $(this).attr('data-delay');
                  $(this).css('animation-delay', delay);
                  $(this).addClass(animacija);
                  
              }
          });
      }
  
      animateHeader();
      animation();
  
      $(window).scroll(function () {
          animateHeader();
          animation();
      });

      
       // ease scroll

    $(document).on('click', 'a[href^="#"]', function (event) {
      event.preventDefault();

      $('html, body').animate({
          scrollTop: $($.attr(this, 'href')).offset().top
      }, 800);
  });
  
  
//hamburger button
$('.hamburger').click(function(e){
    e.preventDefault();
    $(this).toggleClass('is-active');
  });


  //submenu show
  $('.fa-caret-down').click(function(e){
      e.preventDefault();
      $(this).parent().next('.submenu').slideToggle();
      $(this).toggleClass('fa-caret-down fa-caret-up');
  })


  //about-counter
  $('.counter').counterUp({
    delay: 10,
    time: 800
});



//unitegallery slider

/*jQuery("#gallery").unitegallery({
    tiles_type: "justified"
});*/

})

