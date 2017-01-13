jQuery(document).ready(function($){
 $('.tlt').textillate({
  // the default selector to use when detecting multiple texts to animate
  selector: '.texts',

  // enable looping
  loop: true,

  // sets the minimum display time for each text before it is replaced
  minDisplayTime: 2500,


  // set whether or not to automatically start animating
  autoStart: true,

  // custom set of 'out' effects
  outEffects: [ 'bounceOut' ],

  // in animation settings
  in: {
    // set the effect name
    effect: 'fadeIn',

    // set the delay factor applied to each consecutive character
    delayScale: 1.5,

    // set the delay between each character
    delay: 50,

    // set to true to animate all the characters at the same time
    sync: false,

    // randomize the character sequence 
    // (note that shuffle doesn't make sense with sync = true)
    shuffle: true
  },

  // out animation settings.
  out: {
    effect: 'bounceOut',
    delayScale: 1.5,
    delay: 150,
    sync: false,
    shuffle: true,
  }
});

jQuery('.bxslider').bxSlider({
	  pagerCustom: '#slider-navigation',
	  controls: false, 
	});

}); 

// Preloader //

jQuery(document).ready(function($) {  
$(window).load(function(){
	$('#preloader').fadeOut('fast',function(){$(this).remove();});
});

// Email Form Settings //

$("#contact").submit(function(e){
      e.preventDefault();
      var email = $("#email").val();
      var dataString = '&email=' + email;
      function isValidEmail(emailAddress) {
        var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
        return pattern.test(emailAddress);
      };
     
      if (isValidEmail(email)){
        $.ajax({
        type: "POST",
        url: "index.php",
        data: dataString,
        success: function(){
          $('.nifty-success').fadeIn(1000);
		  $('.nifty-success').delay(3000).fadeOut(1000);
        }
        });
      } else{
        $('.nifty-error').fadeIn(1000);
		$('.nifty-error').delay(3000).fadeOut(1000);
      }
     
      return false;
    });

});