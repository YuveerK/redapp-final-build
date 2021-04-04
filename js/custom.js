$(document).ready(function(){

$(window).scroll(function(){

  if ($(window).scrollTop() > 450 ) {
    $('.vis-nav').css({"display":"block" , "position":"fixed"});
  } else { $('.vis-nav').fadeOut(); }
});

});