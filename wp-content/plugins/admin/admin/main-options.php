<?php

/**
 * Initialize the custom theme options based on OptionTree
 */

add_action( 'init', 'nifty_cs_custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
 
function nifty_cs_custom_theme_options() {
  
  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;
    
  /**
   * Get a copy of the saved settings array. 
   */
   
  $saved_settings = get_option( ot_settings_id(), array() );
  
 
 // Google Fonts support

/**
 * Returns an array of system fonts
 * Feel free to edit this, update the font fallbacks, etc.
 */   
 $google_fonts = nifty_cs_get_google_webfonts(); 
  foreach( $google_fonts as $font ) {
    $google_webfonts_array[$font['family']]['label'] = $font['family'];
    $google_webfonts_array[$font['family']]['value'] = $font['family'];
  }  
  
   
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general_settings',
        'title'       => 'General Settings'
      ),
      array(
        'id'          => 'design_and_layout',
        'title'       => 'Design and Layout'
      ),
      array(
        'id'          => 'translation',
        'title'       => 'Translation'
      ),
      array(
        'id'          => 'social_links',
        'title'       => 'Social links'
      ),
      array(
        'id'          => 'documentation',
        'title'       => 'Documentation'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'general_settings',
        'label'       => 'General settings',
        'desc'        => 'Here you can adjust general plugin settings. You can disable or enable coming soon page or its particular sections. You can also add your Google Analytics code if needed.',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'general_settings',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
		
        'operator'    => 'and'
      ),
      array(
        'id'          => 'coming_soon_mode_on___off',
        'label'       => 'Enable coming soon mode',
        'desc'        => 'Enable of disable coming soon mode.',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general_settings',
        'min_max_step'=> '',
		'sidebar'   => 'bla bla',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'display_count_down_timer',
        'label'       => 'Display count down timer',
        'desc'        => 'Here you can enable or disable count down timer on the home page.',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general_settings',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'enable_preloader',
        'label'       => 'Enable Pre-loader',
        'desc'        => 'Enable of disable pre-loader of coming soon page.',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general_settings',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'enable_sign_up_form',
        'label'       => 'Enable Sign-up form',
        'desc'        => 'Enable of disable Sign-up form.',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general_settings',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'enable_contact_details',
        'label'       => 'Enable Contact details',
        'desc'        => 'Enable of disable Contact details on the second tab of the coming soon page.',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general_settings',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'enable_social_links',
        'label'       => 'Enable Social links',
        'desc'        => 'Enable of disable Social links on the third tab of the coming soon page.',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general_settings',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'disable_navigation',
        'label'       => 'Navigation',
        'desc'        => 'Enable of disable navigation buttons that are just bellow the logo section.',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general_settings',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'insert_google_analytics_code',
        'label'       => 'Insert Google Analytics code',
        'desc'        => 'Here you can enter your Google Analytics code that will be added in your coming soon page footer.',
        'std'         => '',
        'type'        => 'javascript',
        'section'     => 'general_settings',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
     
      array(
        'id'          => 'design_and_layout_settings',
        'label'       => 'Design and Layout settings',
        'desc'        => 'Here you can setup your desired text, adjust date and time for the counter and setup the slider images for the background slider. You can also setup the pattern overlay with the opacity control, assign desired Google Fonts and more.',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'design_and_layout',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'upload_your_logo',
        'label'       => 'Upload your logo',
        'desc'        => 'You can upload your logo here, it will be placed at the top of the coming soon page.</br> 
		You should use some png images with 200x90px in size.',
        'std'         => OT_URL .'assets/images/logo.png',
        'type'        => 'upload',
        'section'     => 'design_and_layout',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'your_coming_soon_message',
        'label'       => 'Your coming soon message',
        'desc'        => 'Here you can enter your coming soon message.',
        'std'         => 'Our website is coming very soon',
        'type'        => 'text',
        'section'     => 'design_and_layout',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'enter_second_coming_soon_message',
        'label'       => 'Your second coming soon message',
        'desc'        => 'This second message will be animated over the first message. So, you can have more that one sentence for your message. ;)',
        'std'         => 'Feel free to drop-by any time soon',
        'type'        => 'text',
        'section'     => 'design_and_layout',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'setup_the_count_down_timer',
        'label'       => 'Enter the count down ending date / time',
        'desc'        => 'Here you can specify the date and time of your count down timer expiration. If you leave this field empty, the countdown will not be displayed.',
        'std'         => '',
        'type'        => 'date-time-picker',
        'section'     => 'design_and_layout',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'background_color',
        'label'       => 'Background color',
        'desc'        => 'You can setup the default background color if you do not want to use the background image slider.',
        'std'         => '#9e0039',
        'type'        => 'colorpicker',
        'section'     => 'design_and_layout',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'sign_up_button_color',
        'label'       => 'Button color',
        'desc'        => 'You can setup the desired Sign-up button color.',
        'std'         => '#9e0039',
        'type'        => 'colorpicker',
        'section'     => 'design_and_layout',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'sign_up_button_color_hover',
        'label'       => 'Button hover color',
        'desc'        => 'You can setup the desired Sign-up button hover color.',
        'std'         => '#9e0039',
        'type'        => 'colorpicker',
        'section'     => 'design_and_layout',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'disable_background_image_slider',
        'label'       => 'Background image slider',
        'desc'        => 'Here you can enable or disable background image slider.</br></br>NOTICE:You need to disable background image slider if you want to use only background color option.',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'design_and_layout',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'background_slider_time',
        'label'       => 'Enter background slider rotation time',
        'desc'        => 'Here you can enter desired time per slide. For example, 6000 equals to 6 seconds.',
        'std'         => '6000',
        'type'        => 'text',
        'section'     => 'design_and_layout',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'disable_background_image_slider:not(off)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'upload_slider_images',
        'label'       => 'Upload first background slider images',
        'desc'        => 'Here you can upload your cover images, the best dimensions should be 1920x1080 or any with similar proportions.',
        'std'         => OT_URL .'/assets/slideshow/1.jpg',
        'type'        => 'upload',
        'section'     => 'design_and_layout',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'disable_background_image_slider:not(off)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'upload_slider_images_2',
        'label'       => 'Upload second background slider images',
        'desc'        => 'Here you can upload your cover images, the best dimensions should be 1920x1080 or any with similar proportions.',
        'std'         => OT_URL .'/assets/slideshow/2.jpg',
        'type'        => 'upload',
        'section'     => 'design_and_layout',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'disable_background_image_slider:not(off)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'upload_slider_images_3',
        'label'       => 'Upload third background slider images',
        'desc'        => 'Here you can upload your cover images, the best dimensions should be 1920x1080 or any with similar proportions.',
        'std'         => OT_URL .'/assets/slideshow/3.jpg',
        'type'        => 'upload',

        'section'     => 'design_and_layout',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'disable_background_image_slider:not(off)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'select_pattern_overlay',
        'label'       => 'Select pattern overlay',
        'desc'        => '',
        'std'         => '16.png',
        'type'        => 'radio-image',
        'section'     => 'design_and_layout',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'disable_background_image_slider:not(off)',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => '01.png',
            'label'       => 'Pattern 1',
            'src'         => OT_URL .'/assets/images/patterns/01.png'
          ),
          array(
            'value'       => '02.png',
            'label'       => 'Pattern 2',
            'src'         => OT_URL .'/assets/images/patterns/02.png'
          ),
          array(
            'value'       => '03.png',
            'label'       => 'Pattern 3',
            'src'         => OT_URL .'/assets/images/patterns/03.png'
          ),
          array(
            'value'       => '04.png',
            'label'       => 'Pattern 4',
            'src'         => OT_URL .'/assets/images/patterns/04.png'
          ),
          array(
            'value'       => '05.png',
            'label'       => 'Pattern 5',
            'src'         => OT_URL .'/assets/images/patterns/05.png'
          ),
          array(
            'value'       => '06.png',
            'label'       => 'Pattern 6',
            'src'         => OT_URL .'/assets/images/patterns/06.png'
          ),
          array(
            'value'       => '07.png',
            'label'       => 'Pattern 7',
            'src'         => OT_URL .'/assets/images/patterns/07.png'
          ),
          array(
            'value'       => '08.png',
            'label'       => 'Pattern 8',
            'src'         => OT_URL .'/assets/images/patterns/08.png'
          ),
          array(
            'value'       => '09.png',
            'label'       => 'Pattern 9',
            'src'         => OT_URL .'/assets/images/patterns/09.png'
          ),
          array(
            'value'       => '10.png',
            'label'       => 'Pattern 10',
            'src'         => OT_URL .'/assets/images/patterns/10.png'
          ),
          array(
            'value'       => '11.png',
            'label'       => 'Pattern 11',
            'src'         => OT_URL .'/assets/images/patterns/11.png'
          ),
          array(
            'value'       => '12.png',
            'label'       => 'Pattern 12',
            'src'         => OT_URL .'/assets/images/patterns/12.png'
          ),
          array(
            'value'       => '13.png',
            'label'       => 'Pattern 13',
            'src'         => OT_URL .'/assets/images/patterns/13.png'
          ),
          array(
            'value'       => '14.png',
            'label'       => 'Pattern 14',
            'src'         => OT_URL .'/assets/images/patterns/14.png'
          ),
          array(
            'value'       => '15.png',
            'label'       => 'Pattern 15',
            'src'         => OT_URL .'/assets/images/patterns/15.png'
          ),
          array(
            'value'       => '16.png',
            'label'       => 'Pattern 16',
            'src'         => OT_URL .'/assets/images/patterns/16.png'
          )
        )
      ),
      array(
        'id'          => 'pattern_overlay_opacity',
        'label'       => 'Set the pattern overlay opacity',
        'desc'        => 'Here you can adjust the level of opacity for the overall pattern overlay.',
        'std'         => '0.5',
        'type'        => 'numeric-slider',
        'section'     => 'design_and_layout',
        'min_max_step'=> '0,1,0.1',
        'class'       => '',
        'condition'   => 'disable_background_image_slider:not(off)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'choose_heading_font',
        'label'       => 'Choose heading font',
        'desc'        => 'Here you can assign the main heading font for your coming soon page.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'design_and_layout',
		'choices'     => $google_webfonts_array,
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'choose_counter_font',
        'label'       => 'Choose counter font',
        'desc'        => 'Here you can assign the font for countdown timer.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'design_and_layout',
		'choices'     => $google_webfonts_array,
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'choose_paragraph_font',
        'label'       => 'Choose paragraph font',
        'desc'        => 'Here you can assign main paragraph font for your coming soon page.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'design_and_layout',
		'choices'     => $google_webfonts_array,
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'enter_you_website_or_company_name',
        'label'       => 'Enter you website or company name',
        'desc'        => 'This text will be present at the location tab in the footer section of the coming soon page.',
        'std'         => 'ACME COMPANY',
        'type'        => 'text',
        'section'     => 'design_and_layout',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'enter_your_address',
        'label'       => 'Enter you address',
        'desc'        => 'This text will be present at the location tab in the footer section of the coming soon page.',
        'std'         => '230 New Found lane, 8900 New City',
        'type'        => 'text',
        'section'     => 'design_and_layout',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'enter_your_phone_number',
        'label'       => 'Enter your phone number',
        'desc'        => 'The number will be present at the location tab in the footer section of the coming soon page.',
        'std'         => '+555 53211 777',
        'type'        => 'text',
        'section'     => 'design_and_layout',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'enter_your_email_address',
        'label'       => 'Enter your email address',
        'desc'        => 'This address will be used for receiving notifications from the subscription form on the coming soon page. It will also be displayed on the location tab of the footer section.',
        'std'         => 'someone@example.com',
        'type'        => 'text',
        'section'     => 'design_and_layout',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'translation_settings',
        'label'       => 'Translation settings',
        'desc'        => 'Here you can replace the default coming soon language variables. Just enter your desired text and save changes.',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'translation',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'sign_up_form_intro_text',
        'label'       => 'Sign-up form intro text',
        'desc'        => 'Here you can specify the desired intro text of your sign-up from.',
        'std'         => 'Sign up to find out when we launch',
        'type'        => 'text',
        'section'     => 'translation',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'sign_up_button_text',
        'label'       => 'Sign up button text',
        'desc'        => 'Here you can replace the default Sign up buttons text.',
        'std'         => 'Sign Up',
        'type'        => 'text',
        'section'     => 'translation',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'social_links_intro_text',
        'label'       => 'Social links intro text',
        'desc'        => 'Here you can translate the intro text above the social icons on the last tab of the footer section.',
        'std'         => 'Are you social? We are, find us bellow ;)',
        'type'        => 'text',
        'section'     => 'translation',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'enter_email_text',
        'label'       => 'Enter Email text',
        'desc'        => 'Here you can translate text inside the subscription form.',
        'std'         => 'Enter Email...',
        'type'        => 'text',
        'section'     => 'translation',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'email_confirmation___error',
        'label'       => 'Email confirmation - Error',
        'desc'        => 'Here you can translate the error message from the form submition.',
        'std'         => 'Please, enter valid email address.',
        'type'        => 'text',
        'section'     => 'translation',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'email_confirmation___success',
        'label'       => 'Email confirmation - Success',
        'desc'        => 'Here you can translate the success message from the form submition.',
        'std'         => 'You will be notified, thanks.',
        'type'        => 'text',
        'section'     => 'translation',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'nifty_days_translate',
        'label'       => 'Translate the word "days"',
        'desc'        => 'Here you can translate the language string for "days" label, just bellow the counter.',
        'std'         => 'days',
        'type'        => 'text',
        'section'     => 'translation',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'nifty_hours_translate',
        'label'       => 'Translate the word "hours"',
        'desc'        => 'Here you can translate the language string for "hours" label, just bellow the counter.',
        'std'         => 'hours',
        'type'        => 'text',
        'section'     => 'translation',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'nifty_minutes_translate',
        'label'       => 'Translate the word "minutes"',
        'desc'        => 'Here you can translate the language string for "minutes" label, just bellow the counter.',
        'std'         => 'minutes',
        'type'        => 'text',
        'section'     => 'translation',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'nifty_seconds_translate',
        'label'       => 'Translate the word "seconds"',
        'desc'        => 'Here you can translate the language string for "seconds" label, just bellow the counter.',
        'std'         => 'seconds',
        'type'        => 'text',
        'section'     => 'translation',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'social_settings',
        'label'       => 'Social settings',
        'desc'        => 'In order to link the social icons on the coming soon page with your social network pages or accounts, just enter your social profile URL\'s in the provided fields and save changes.',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'social_links',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'facebook_page_or_profile_url',
        'label'       => 'Facebook page or profile URL',
        'desc'        => 'Enter your full Facebook page or profile URL along with https://',
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'social_links',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'twitter_url',
        'label'       => 'Twitter URL',
        'desc'        => 'Enter your Twitter URL along with https://',
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'social_links',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'linkedin_profile_url',
        'label'       => 'LinkedIn profile URL',
        'desc'        => 'Enter your LinkedIn profile URL along with https://',
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'social_links',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'google___profile_or_page_url',
        'label'       => 'Google + profile or page URL',
        'desc'        => 'Enter your Google+ page or profile URL along with https://',
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'social_links',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'documentation_and_faq',
        'label'       => 'Documentation and FAQ',
        'desc'        => '<h2>NIFTY COMING SOON - Documentation</h2>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'documentation',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    )
  );
  
  
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}

add_filter( 'ot_show_pages', '__return_false' );