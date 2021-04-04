
window.onload = function () {
    Particles.init({
    selector: '.background', 
    connectParticles: true, 
    // color: ['#add8e6'],
    color: ['#800080', '#ffa500', 'F1F6F9'],
    minDistance: 90, 
    maxParticles: 20,
    sizeVariations: 8,
    
});
};

// Get the canvas element form the page
// var canvas = document.getElementById("canvas");
 
// /* Rresize the canvas to occupy the full page, 
//    by getting the widow width and height and setting it to canvas*/
 
// canvas.width  = window.innerWidth;
// canvas.height = window.innerHeight;

$(document).ready(function() {
  $('.reg-box').children().attr('true', 'true');
  $('.login-box').children().attr('disabled', 'disabled');
  $('.btn').click(function() {
     if(!$('.login-box').is(':visible'))
     {
        $('.reg-box').children().attr('enabled', 'enabled');
        $('.reg-box').slideDown("slow");
        $('#regBtn').attr("onClick", "");
        $('#name-focus').focus();
    }});
  $('#sign_in').click(function() {
     if (!$('.login-box').is(':visible')) {
                // show the login form
                if ($('.reg-box').is(':visible')) {
                    // get rid of the registration fields
                    $('.reg-box').slideUp("slow");
                }
                $('.reg-box').children().attr('disabled', 'disabled');
                $('#sign_in').text('Sign up');
                $('#regBtn').text('Sign in');
                $('.login-box').children().attr('enabled', 'enabled');
                $('.login-box').slideDown("slow");
                $('#regBtn').attr("onClick", "");
                $('#regBtn').attr("name", "login");
                $('#regBtn').attr("form", "loginform");
                $('#email-focus').focus();
            } else {
                // show the registration forms
                $('.login-box').children().attr('disabled', 'disabled');
                $('.login-box').slideUp("slow");
                $('.reg-box').children().attr('enabled', 'enabled');
                $('#sign_in').text('Sign in');
                $('#regBtn').text('Sign up');
                $('.reg-box').slideDown("slow");
                $('#regBtn').attr("onClick", "");
                $('#regBtn').attr("name", "register");
                $('#regBtn').attr("form", "registerform");
                $('#name-focus').focus();
            }
            // deselect the link
            this.blur();
        });
});