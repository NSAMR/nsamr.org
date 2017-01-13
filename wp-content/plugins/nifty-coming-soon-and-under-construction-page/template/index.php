<?php
/**
 * Main Nifty Coming soon and under construction page template 
 * 
 * Index template
 *
 */

 ?>

<!DOCTYPE html <?php language_attributes(); ?>>
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
    <title><?php bloginfo('name'); ?></title>
    
    <link rel="stylesheet" href="<?php echo plugins_url('template/assets/css/style.css',dirname(__FILE__)); ?>">
    <link rel="stylesheet" href="<?php echo plugins_url('template/assets/css/normalize.css',dirname(__FILE__)); ?>">
    <link rel="stylesheet" href="<?php echo plugins_url('template/assets/css/foundation.css',dirname(__FILE__)); ?>">
    <link rel="stylesheet" href="<?php echo plugins_url('template/assets/css/animate.css',dirname(__FILE__)); ?>">
    <link rel="stylesheet" href="<?php echo plugins_url('template/assets/css/icomoon.css',dirname(__FILE__)); ?>">
    
    <script src="<?php echo plugins_url('template/assets/js/vendor/custom.modernizr.js',dirname(__FILE__)); ?>"></script>
     
    <!-- Default WordPress jQuery lib -->
    
    <script src="<?php echo includes_url('js/jquery/jquery.js',dirname(__FILE__)); ?>"></script>

    <?php 
	
	$background_color = ot_get_option( 'background_color' );
	$heading_font = ot_get_option( 'choose_heading_font' );
	$paragraph_font = ot_get_option( 'choose_paragraph_font' );
	$counter_font = ot_get_option( 'choose_counter_font' );
	$button_color = ot_get_option( 'sign_up_button_color' );
	$button_color_hover = ot_get_option( 'sign_up_button_color_hover' );
	
	
	echo "<link href='https://fonts.googleapis.com/css?family=".$heading_font."&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";
	echo "<link href='https://fonts.googleapis.com/css?family=".$paragraph_font."&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";
	echo "<link href='https://fonts.googleapis.com/css?family=".$counter_font."&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";
	echo "<style>";
	echo "body {background:".$background_color." !important;}";
	echo ".button {background:".$button_color." !important;}.button:hover {background:".$button_color_hover." !important;}";
	echo ".nifty-coming-soon-message {font-family:'".$heading_font."' !important;}";
	echo ".timer-item {font-family:'".$counter_font."' !important;}";
	echo "body p, .nifty-inform, .nifty-success, .nifty-error, input {font-family:'".$paragraph_font."' !important;}";
	echo '</style>'

	?>
    
</head>
<body <?php body_class(); ?>>
    <div class="nifty-main-wrapper">
    
    <!-- Page Preloader -->
    <?php
		$preloader = ot_get_option( 'enable_preloader' );
		
		if( 'off' != $preloader ) {
    echo '<div id="preloader"></div>';
} else {
   ;
}


?>


        <div class="nifty-content-wrapper">
  
            <header class="nifty-row ">
                <div class="large-12 columns text-center">
                
                 <!-- Logo and navigation  -->

                    <div class="nifty-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo ot_get_option( 'upload_your_logo' ); ?>" alt="<?php bloginfo('name'); ?>" /></a>
                        
                        
                         <?php
		$navigation = ot_get_option( 'disable_navigation' );
		
		if( 'off' != $navigation ) {
    echo '<div id="slider-navigation">
                            <a data-slide-index="0" href=""><span aria-hidden="true" class="icon-paperplane"></span></a>
                            <a data-slide-index="1" href=""><span aria-hidden="true" class="icon-location"></span></a> 
                            <a data-slide-index="2" href=""><span aria-hidden="true" class="icon-thumbs-up"></span></a> 
                        </div>';
} else {
   ;
}
?>
                        
                        
                  </div>
                  
              </div>
            </header>
			<div class="maintextwrapper">
            <div class="nifty-row">
            <div class="large-10 small-centered columns text-center">
            <div class="nifty-coming-soon-message">
                   <div class="tlt">
                    <ul class="texts" style="display: none">
                      <li><?php echo ot_get_option( 'your_coming_soon_message', true ); ?></li>
                    </ul>
					<p style="font-size: 0.45em"><a href="https://www.facebook.com/events/1140373112716217/">Click <u>here</u> for more information or to register.</a><a href="https://drive.google.com/file/d/0B87PKeE0DjgQaVlQc1dpRDIxdkU/view?usp=sharing"> Click <u>here</u> to download the Conference itinerary.</a></p>
				  </div>
                  </div>
            </div>
            </div>
            
    	<!-- Timer Section -->  
        
        
        <?php
		$nifty_timer = ot_get_option( 'display_count_down_timer' );
		$nifty_days = ot_get_option( 'nifty_days_translate' );
		$nifty_hours = ot_get_option( 'nifty_hours_translate' );
		$nifty_minutes = ot_get_option( 'nifty_minutes_translate' );
		$nifty_seconds = ot_get_option( 'nifty_seconds_translate' );
		
		
		
		if( 'off' != $nifty_timer ) {
    echo '<div class="nifty-row" id="clock"> 
                <div class="large-8 small-centered columns">
                    <div class="large-3 small-3 columns">
                        <div class="timer-item">
                        <div class="timer-top"><span id="days"></span></div>
                        <div class="timer-bottom">'.$nifty_days.'</div>
                    </div>
                    </div>
                    <div class="large-3 small-3 columns">
                        <div class="timer-item">
                        <div class="timer-top"><span id="hours"></span></div>
                        <div class="timer-bottom">'.$nifty_hours.'</div>
                    </div>
                    </div>
                    <div class="large-3 small-3 columns">
                        <div class="timer-item">
                        <div class="timer-top"><span id="minutes"></span></div>
                        <div class="timer-bottom">'.$nifty_minutes.'</div>
                    </div>
                    </div>
                    <div class="large-3 small-3 columns">
                        <div class="timer-item">
                        <div class="timer-top"><span id="seconds"></span></div>
                        <div class="timer-bottom">'.$nifty_seconds.'</div>
                    </div>
                    </div>
                </div>
        </div>  ';
} else {
    ;
}
		
?>         
  </div>
	<!-- Content Section -->   
        <div class="nifty-content-full">
            <div class="nifty-row"> 
                 
	<!-- Slider Section -->  
		<ul class="bxslider">
        
	<!-- Slide One - Subscribe Here -->
        
     
      <?php
		$nifty_form = ot_get_option( 'enable_sign_up_form' );
		
		if( 'off' != $nifty_form ) {
    echo '<li>
        <section class="large-12 columns"> ';
	echo '<form id="contact" method="post">
          <div class="large-4 small-centered columns">
        <div class="nifty-inform">';
		
	echo ot_get_option( 'sign_up_form_intro_text' ); 
       echo' </div>  <div class="nifty-row collapse">
            <div class="small-8 columns">
              <input type="text" name="email" id="email" autocomplete="off" placeholder="';
			  echo ot_get_option( 'enter_email_text' ); 
			  echo  '">
				</div>
				<div class="small-4 columns">
              <input type="submit" value=" ';
			  echo ot_get_option( 'sign_up_button_text' );
			  echo '" name="submit" class="button prefix">
				</div>
				<div class="nifty-success" style="display:none">';
			  echo ot_get_option( 'email_confirmation___success' ); 
			  echo '</div>
          <div class="nifty-error" style="display:none"> ';
			  echo ot_get_option( 'email_confirmation___error' ); 
			  echo '</div>
          </div>
        </div>  
            </form>
        </section>
        </li> 
	
	';
} else {
    ;
}

?>         
      
   	 <!-- Slide Two - About Us -->

<?php
		$nifty_contact = ot_get_option( 'enable_contact_details' );
		$contact_website = ot_get_option( 'enter_you_website_or_company_name' );
		$contact_address = ot_get_option( 'enter_your_address' );
		$contact_phone = ot_get_option( 'enter_your_phone_number' );
		$contact_email = ot_get_option( 'enter_your_email_address' );
		
		
		if( 'off' != $nifty_contact ) {
    echo '<li>
        <section class="small-12 small-centered columns">      
        <div class="nifty-contact-details">
        	<p><strong>'.$contact_website.'
			</strong></p>
            <p><span aria-hidden="true" class="icon-house"></span>
			'.$contact_address.'</p>
			</div>
          
        </section>
      </li>';
		
			
} else {
   ;
}
?>

  
	<!-- Slide Three - Social links -->
    
      <?php
		$nifty_social = ot_get_option( 'enable_social_links' );
		$social_intro = ot_get_option( 'social_links_intro_text' );
		$social_facebook = ot_get_option( 'facebook_page_or_profile_url' );
		$social_twitter = ot_get_option( 'twitter_url' );
		$social_googleplus = ot_get_option( 'google___profile_or_page_url' );
		$social_linkedin = ot_get_option( 'linkedin_profile_url' );
		
		if( 'off' != $nifty_social ) {
    echo '<li>
        <section class="large-12 columns"> 
		<div class="nifty-row">
        <div class="small-12 small-centered columns">
        <div class="nifty-inform">'.$social_intro.
		'</div>
		<a href="'.$social_facebook.'"><span aria-hidden="true" class="icon-facebook"></span></a>
		<a href="'.$social_twitter.'"><span aria-hidden="true" class="icon-twitter"></span></a>
		<a href="'.$social_googleplus.'"><span aria-hidden="true" class="icon-google-plus"></span></a>
		<a href="'.$social_linkedin.'"><span aria-hidden="true" class="icon-linkedin"></span></a>
		</div>  
            </div>
        </section>
      </li>
		'
		
		;
} else {
   ;
}
?>
    
        
    </ul>  
  </div>
</div>       
</div>
</div>    
   
<!-- jQuery Vegas Background Slider --> 
   
<?php
		$nifty_background_slider = ot_get_option( 'disable_background_image_slider' );
		
		if( 'off' != $nifty_background_slider ) {
    $slide_1 = ot_get_option( 'upload_slider_images' );
   $slide_2 = ot_get_option( 'upload_slider_images_2' );
   $slide_3 = ot_get_option( 'upload_slider_images_3' );
   $slider_time = ot_get_option( 'background_slider_time', '6000' );
   
   
    echo "<script>
	jQuery(document).ready(function($) {
	$.vegas('slideshow', {
		
		delay:".$slider_time.",
    backgrounds:[
    { src:'".$slide_1."', fade:1000 },
    { src:'".$slide_2."', fade:1000 },
    { src:'".$slide_3."', fade:1000 }
     ] 
    });
	";
	?>
	
	
	<?php 
	$pattern = ot_get_option( 'select_pattern_overlay' );
   $pattern_opacity = ot_get_option( 'pattern_overlay_opacity' );
   $pattern_lib = '/assets/images/patterns/';
  
	
	echo "$.vegas('overlay', {
		 src:'". OT_URL .$pattern_lib.$pattern."'";
	echo ", opacity:".$pattern_opacity;
	echo "});});";
		
} else {
    ;
}
   
	
?>
</script>

<script>

// Timer Settings  //

jQuery(function($) { 
  $('div#clock').countdown("<?php 
  $timer_state = ot_get_option( 'setup_the_count_down_timer' ); 
  $time_updated = date("Y/m/d", strtotime($timer_state)); 
  echo $time_updated;
  
  ?>", function(event) { 
    var $this = $(this);
    switch(event.type) {
      case "seconds":
      case "minutes":
      case "hours":
      case "days":
      case "weeks":
      case "daysLeft":
        $this.find('span#'+event.type).html(event.value);
		
        break;
      case "finished":
        $this.hide();
        break;
    }
  });
});
</script>

<?php 

 // Email Submit
if ( isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
     
      // Detect & prevent header injections
	  $receiver = $_POST['email'];
	  $mail_subject = 'New subscriber from coming soon page';
	  $mail_text = 'Hello, we have a new subscription to site launch notification. Email address: ';
	  $admin_mail = ot_get_option( 'enter_your_email_address' );
      $test = "/(content-type|bcc:|cc:|to:)/i";
      
	  foreach ( $_POST as $key => $val ) {
        if ( preg_match( $test, $val ) ) {
          exit;
        }
      }
      
	$sanitized_email = sanitize_email($receiver);
	$receiver_sanitized = $sanitized_email; 
	  
      // Send email
       mail(  $admin_mail, $mail_subject, $mail_text .$_POST['email'], "From:" . $_POST['email'] );
      
    }

?>

<!-- Footer js scripts -->

<script src="<?php echo plugins_url('template/assets/js/scripts.js',dirname(__FILE__)); ?>"></script>
<script src="<?php echo plugins_url('template/assets/js/jquery.countdown.js',dirname(__FILE__)); ?>"></script>
<script src="<?php echo plugins_url('template/assets/js/jquery.bxslider.min.js',dirname(__FILE__)); ?>"></script>
<script src="<?php echo plugins_url('template/assets/js/jquery.vegas.min.js',dirname(__FILE__)); ?>"></script>
<script src="<?php echo plugins_url('template/assets/js/jquery.fittext.js',dirname(__FILE__)); ?>"></script>
<script src="<?php echo plugins_url('template/assets/js/jquery.textillate.js',dirname(__FILE__)); ?>"></script>
<script src="<?php echo plugins_url('template/assets/js/jquery.lettering.js',dirname(__FILE__)); ?>"></script>


<!-- Google Analytics Code -->

<?php echo ot_get_option( 'insert_google_analytics_code' ); ?>


</body>
</html>