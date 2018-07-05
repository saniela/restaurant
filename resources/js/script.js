$(document).ready(function(){
  $("#top_a").attr('href', window.location.pathname +'#header');
  // Add smooth scrolling to class .scroll
  $('.scroll').on('click', function() {
    //a[href*='#']:not([href='#'])
    var hash = this.hash;
     $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000, function(){
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });

  });
  //form validation
  $("#order_form").on('submit',function(){
    var reg = /^([a-zA-Z0-9\.\_\-])+\@([a-zA-Z0-9\.\_\-])+\.([a-zA-Z]){2,3}$/;
    if($("input[name='name']").val() == '' || $("input[name='address']").val() == '' || $("input[name='phone']").val() == ''){
      $('#validation_p').text('Sva polja osim email-a su obavezna');
      $('#validation_p').css('color','red');
      return false;
    }
    if(!$("input[name='email']").val().match(reg)){
      $('#validation_p').text('Email adresa nije validna');
      $('#validation_p').css('color','red');
      return false;
    }
  });


  //scroll to top
  $(window).on('scroll',function(){
     if($(this).scrollTop() >= 50){
      $('#top').css('display','block');

    }else {
      $('#top').css('display','none');
    }
  });





});
