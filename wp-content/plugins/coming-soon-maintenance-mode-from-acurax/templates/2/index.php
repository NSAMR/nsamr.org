<?php
$acx_csma_template_id = 2;
do_action('acx_csma_above_template_html',$acx_csma_template_id);
$acx_csma_meta_title =get_option('acx_csma_meta_title');
$acx_csma_meta_description=get_option('acx_csma_meta_description');
$acx_csma_meta_keywords=get_option('acx_csma_meta_keywords');
$favicon_attach_id = get_option('acx_csma_favicon');
$acx_csma_favicon = $favicon_attach_id;
if(is_numeric($favicon_attach_id))
{
	$fav_icon_attachment_url = parse_url( wp_get_attachment_url($favicon_attach_id) );
	$acx_csma_favicon    = $fav_icon_attachment_url [ 'scheme' ]  . '://' .rawurlencode( basename( $fav_icon_attachment_url[ 'host' ])). $fav_icon_attachment_url[ 'path' ];
}

$acx_csma_appearence_array_2=acx_csma_get_db_array_value(); 
$acx_csma_start_date_time=get_option('acx_csma_start_date_time');
$acx_csma_date_time=get_option('acx_csma_date_time');	
$acx_csma_timestamp=current_time('timestamp');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if($acx_csma_meta_title!="")
{
?>
<title><?php echo stripslashes($acx_csma_meta_title); ?></title>
<?php
}
if($acx_csma_meta_description!="")
{
?>
<meta name="description" content="<?php echo stripslashes($acx_csma_meta_description); ?>">
<?php
}
if($acx_csma_meta_keywords!="")
{
?>
<meta name="keywords" content="<?php echo stripslashes($acx_csma_meta_keywords); ?>">
<?php
}
?>

<style>
<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_custom_css_temp2']; ?>
</style>

<link href="<?php echo plugins_url('style.css', __FILE__); ?>" rel="stylesheet" type="text/css" />
<link rel="icon" href="<?php echo esc_url($acx_csma_favicon); ?>"  type="image/png">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<?php echo stripslashes(get_option('acx_csma_ga_trakng_code')); 
do_action('acx_csma_bottom_inside_head_tag',$acx_csma_template_id);
?>

</head>
<body style="background:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_bg_color2']; ?>">
<?php 
do_action('acx_csma_top_inside_body_tag',$acx_csma_template_id);
if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array_2[$acx_csma_template_id]))
{
	if($acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_logo_choice']=="text")
	{
		$new_class="text_logo";
	}
	 else
	{
		$new_class="";
	}
}
else
{
	$new_class="";
}
?>
	<div class="wrapper <?php echo $new_class; ?>"> 
		<div class="canvas960"> 
			<div class="inline_block mg_top"> <div class="header">
			<?php if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array_2[$acx_csma_template_id])) {if($acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_logo_choice']=="image" || $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_logo_choice']==""){ 
				$acx_csma_logo2_id = $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_logo2'];
					$logo2_url  = $acx_csma_logo2_id;
					if(is_numeric($acx_csma_logo2_id))
					{
						$logo2_attachment_url = parse_url( wp_get_attachment_url($acx_csma_logo2_id) );
						$logo2_url    = $logo2_attachment_url [ 'scheme' ]  . '://' .rawurlencode( basename( $logo2_attachment_url[ 'host' ])). $logo2_attachment_url[ 'path' ];
					}
			?>
			<div id="csma_master_logo">
				<img src="<?php echo $logo2_url; ?>" alt="Logo">
			</div> <!-- csma_master_logo -->
			<?php } else if($acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_logo_choice']=="text")
			{
				$acx_csma_logo_text2 = $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_logo_text2'];
				$acx_csma_logo_text2 = acx_csma_text_after_save_hook_fn($acx_csma_logo_text2);
		?>
				<div class="logo_text" style="color:<?php  echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_logo_text_color2']; ?>"><?php echo $acx_csma_logo_text2; ?></div><!-- logo_text-->
			<?php }} ?></div><!-- header  -->
			<div class="inline_block yellow" style="background: none repeat scroll 0 0 <?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_inside_bg_color2']; ?>;"> 
				<div class="inline_block form">
<?php
				$acx_csma_show_subscription2=$acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_show_subscription2'];
				$acx_csma_title2 = $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_title2'];
				$acx_csma_title2 = acx_csma_text_after_save_hook_fn($acx_csma_title2);
				$acx_csma_subtitle_text2 = $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_subtitle_text2'];
				$acx_csma_subtitle_text2 = acx_csma_text_after_save_hook_fn($acx_csma_subtitle_text2);
				?>
				
					<h2 style="color:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_subtitle_color2']; ?>"><span class="inline_main_title" style="font-size:72px; color:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_title_color2']; ?>"><strong><?php echo $acx_csma_title2; ?></strong></span><br> <?php echo $acx_csma_subtitle_text2; ?> </h2>
					<?php
				if($acx_csma_show_subscription2 == 1)
				{
					$acx_csma_subscribe_success2 = $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_subscribe_success2'];
					$acx_csma_subscribe_success2 = acx_csma_text_after_save_hook_fn($acx_csma_subscribe_success2);
					$acx_csma_subscribe_invalid2 = $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_subscribe_invalid2'];
					$acx_csma_subscribe_invalid2 = acx_csma_text_after_save_hook_fn($acx_csma_subscribe_invalid2);
					$acx_subs_next_arr=acx_csma_disp_var_to_show("next");
					$acx_next_singular=acx_csma_option_text_after_save_hook_fn($acx_subs_next_arr['singular']);
					$acx_subs_name_arr=acx_csma_disp_var_to_show("Subscription Name Placeholder");
					$acx_s_name_singular=acx_csma_option_text_after_save_hook_fn($acx_subs_name_arr['singular']);
					$acx_subs_email_arr=acx_csma_disp_var_to_show("Subscription Email Placeholder");
					$acx_s_email_singular=acx_csma_option_text_after_save_hook_fn($acx_subs_email_arr['singular']);
					$acx_csma_show_subscription_name2 = $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_show_subscription_name2'];
					?>
					<form name="acx_csma_form" method="post" action="<?php echo esc_url(str_replace( '%7E', '~',$_SERVER['REQUEST_URI'])); ?>">  
					<div id="acx_csma_success"  name="acx_csma_success" style="display:none;" ><?php echo  $acx_csma_subscribe_success2; ?></div>
					<div id="acx_csma_invalid" name="acx_csma_invalid" style="display:none;" ><?php echo $acx_csma_subscribe_invalid2; ?></div>
					<div id="acx_csma_error"  style="display:none;"></div>
					<?php
					if($acx_csma_show_subscription_name2 == 1)
					{
					?>
					<input type="text" id="acx_csma_name_hidden" name="acx_csma_name_hidden" value="" placeholder="<?php echo $acx_s_name_singular; ?>"/>
					<input type="hidden" id="acx_csma_email" name="email" placeholder="<?php echo $acx_s_email_singular; ?>"> 
					<input type="button" value="<?php echo $acx_next_singular; ?>" id="acx_csma_submit" onclick="acx_csma_validate_email();" class="submit" style="color:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_subscribe_btn_color2']; ?>"> 
					<?php }
					else if($acx_csma_show_subscription_name2 == 0){ ?>
					<input type="text" id="acx_csma_email" name="email" placeholder="<?php echo $acx_s_email_singular; ?>" >
					<input type="button" value="<?php echo acx_csma_option_text_after_save_hook_fn($acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_subscribe_btn_text2']); ?>" id="acx_csma_submit" onclick="acx_csma_validate_email();" class="submit" style="color:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_subscribe_btn_color2']; ?>"> 
					<?php					
					}
					?>
					</form>
					<?php
				}
					?>
				</div><!-- form -->
				
				<?php
				$acx_csma_custom_html_above_timer=$acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_custom_html_above_timer'];
				if($acx_csma_custom_html_above_timer != "")
				{?>
					<div id="acx_above_timer_html">
					<?php echo $acx_csma_custom_html_above_timer = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_above_timer);?>
					</div><!-- acx_above_timer_html -->
					
					<?php
				}
				?>
				
				<div class="inline_block timer_holder">

			<?php
			$acx_csma_show_timer2=$acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_show_timer2'];
			$acx_csma_custom_html_top_timer=$acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_custom_html_top_timer'];
			if($acx_csma_show_timer2 == 1)
			{
				$acx_csma_timer_title2 = $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_title2'];
				$acx_csma_timer_title2 = acx_csma_text_after_save_hook_fn($acx_csma_timer_title2);
				$acx_second_arr=acx_csma_disp_var_to_show("second");
				$acx_sec_singular=$acx_second_arr['singular'];
				$acx_sec_plural=$acx_second_arr['plural'];

				$acx_minute_arr=acx_csma_disp_var_to_show("minute");
				$acx_minute_singular=$acx_minute_arr['singular'];
				$acx_minute_plural=$acx_minute_arr['plural'];
				
				$acx_hour_arr=acx_csma_disp_var_to_show("hour");
				$acx_hour_singular=$acx_hour_arr['singular'];
				$acx_hour_plural=$acx_hour_arr['plural'];
				
				$acx_day_arr=acx_csma_disp_var_to_show("day");
				$acx_day_singular=$acx_day_arr['singular'];
				$acx_day_plural=$acx_day_arr['plural'];
				
				$acx_csma_timer_title_color2 = $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_title_color2'];
			?>
				
					<h3 style="color:<?php echo $acx_csma_timer_title_color2; ?>"><?php echo $acx_csma_timer_title2; ?></h3>
					<div class="timer_box days"> 
						<ul>
							<li  id="days" style="color:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_iptext_color2']; ?>">000</li>
							<li id="acx_day_disp" class="day_text" style="color:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_head_color2']; ?>"><?php echo acx_csma_text_after_save_hook_fn($acx_day_singular); ?></li>
						</ul>
					</div><!-- timer_box -->
					<div class="timer_box"> 
						<ul>
							<li id="hours_0" style="background:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_input_bg_color2']; ?>;color:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_iptext_color2']; ?>">0</li>
							<li id="hours_1" style="background:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_input_bg_color2']; ?>;color:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_iptext_color2']; ?>">0</li>
						</ul>
						<p id="acx_hour_disp" style="color:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_head_color2']; ?>"><?php echo acx_csma_text_after_save_hook_fn($acx_hour_singular); ?></p>
					</div><!-- timer_box -->	
					<div class="timer_box"> 
						<ul>
							<li id="minutes_0" style="background:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_input_bg_color2']; ?>;color:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_iptext_color2']; ?>">0</li>
							<li id="minutes_1" style="background:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_input_bg_color2']; ?>;color:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_iptext_color2']; ?>">0</li>
						</ul>
						<p id="acx_min_disp" style="color:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_head_color2']; ?>"><?php echo acx_csma_text_after_save_hook_fn($acx_minute_singular); ?></p>						
					</div><!-- timer_box -->
					<div class="timer_box last_one"> 
						<ul>
							<li id="seconds_0" style="background:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_input_bg_color2']; ?>;color:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_iptext_color2']; ?>">0</li>
							<li id="seconds_1" style="background:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_input_bg_color2']; ?>;color:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_iptext_color2']; ?>">0</li>
						</ul>
						<p id="acx_sec_disp" style="color:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_timer_head_color2']; ?>"><?php echo acx_csma_text_after_save_hook_fn($acx_sec_singular);  ?></p>						
					</div><!-- timer_box -->
					<?php
}
?>
					<div id="acx_csma_content_below_timer">
					<?php
					if($acx_csma_custom_html_top_timer != "")
					{
						echo $acx_csma_custom_html_top_timer = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_top_timer);
					}
					?>
					</div>
				</div><!-- timer_holder -->
				
				<div class="inline_block text_box">
				<?php
				$acx_csma_custom_html_top_temp2 = $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_custom_html_top_temp2'];
				if($acx_csma_custom_html_top_temp2 != "") { ?>
				<div class="acx_csma_content_div acx_csma_top acx_csma_top_2">
				<?php echo $acx_csma_custom_html_top_temp2 = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_top_temp2); ?>
				</div>
				<?php } 
				$acx_csma_desc_title2 = $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_desc_title2'];
				$acx_csma_desc_title2 = acx_csma_text_after_save_hook_fn($acx_csma_desc_title2);
				$acx_csma_desc_subtitle2 = $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_desc_subtitle2'];
				
				$acx_csma_desc_subtitle2 = acx_csma_textarea_after_save_hook_function($acx_csma_desc_subtitle2);
				$acx_csma_desc_content_color2 = $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_desc_content_color2'];
				?>
				
					<h4 style="color:<?php echo $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_desc_text_color2']; ?>"><?php echo $acx_csma_desc_title2; ?></h4> 
					<p style="color:<?php echo $acx_csma_desc_content_color2; ?>;"><?php echo $acx_csma_desc_subtitle2; ?></p>
				</div><!-- inline_block -->
			</div><!-- inline_block -->
			<div class="footer"> 
			<?php
			$acx_csma_fb_link2=$acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_fb_link2'];
			$acx_csma_twitter_link2=$acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_twitter_link2'];
			$acx_csma_linkedin_link2=$acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_linkedin_link2'];
			if($acx_csma_fb_link2 != "" || $acx_csma_twitter_link2 != "" || $acx_csma_linkedin_link2 != "")
			{
				$acx_csma_social_link_title2=$acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_social_link_title2'];
				$acx_csma_social_link_title2 = acx_csma_text_after_save_hook_fn($acx_csma_social_link_title2);
				$acx_csma_social_link_color2 = $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_social_link_color2']; 
			?>
				<ul>
					<p style="color:<?php echo $acx_csma_social_link_color2; ?>;"><?php echo $acx_csma_social_link_title2; ?></p>
				<?php
					if($acx_csma_fb_link2 != "")
					{
				?>
					<li><a class="acx_csma_social_icons csma_fb" href="<?php echo esc_url($acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_fb_link2']); ?>"><img src="<?php echo plugins_url('images/facebook.png', __FILE__); ?>" alt="Logo"></a></li>
				<?php
					}
					if($acx_csma_twitter_link2 != "")
					{
				?>
					<li><a class="acx_csma_social_icons csma_twtr" href="<?php echo esc_url($acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_twitter_link2']); ?>"><img src="<?php echo plugins_url('images/twitter.png', __FILE__); ?>" alt="Logo"></a></li>
				<?php
					}
					if($acx_csma_linkedin_link2 != "")
					{
				?>
					<li><a class="acx_csma_social_icons csma_lnkn" href="<?php echo esc_url($acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_linkedin_link2']); ?>"><img src="<?php echo plugins_url('images/linkedin.png', __FILE__); ?>" alt="Logo"></a></li>
				<?php
					}
				?>
					
				</ul>
				<?php
			}
				?>
			</div><!-- footer -->			
		</div><!-- inline_block -->

		</div><!-- canvas960 -->
	</div><!-- wrapper -->

<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery(window).keydown(function(event){
    if(event.keyCode == 13) {
<?php
if($acx_csma_show_subscription2 == 1)
{
?>
acx_csma_validate_email();
return false;
<?php
}
?>
    }
  });
});
<?php
if($acx_csma_show_subscription2 == 1)
{
	$acx_csma_show_subscription_name2 = $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_show_subscription_name2'];
	$acx_csma_subscribe_btn_text2 = $acx_csma_appearence_array_2[$acx_csma_template_id]['acx_csma_subscribe_btn_text2'];
	$acx_name_val_arr=acx_csma_disp_var_to_show("Subscription Name Error Message");
	$acx_name_val_singular=$acx_name_val_arr['singular'];
	$acx_email_val_arr=acx_csma_disp_var_to_show("Subscription Email Error Message");
	$acx_email_val_singular=$acx_email_val_arr['singular'];
	
	$acx_email_exist_arr=acx_csma_disp_var_to_show("Subscription Email Exists Message");
	$acx_email_singular=$acx_email_exist_arr['singular'];
	$acx_subs_next_arr=acx_csma_disp_var_to_show("next");
	$acx_next_singular=$acx_subs_next_arr['singular'];
	?>
var acx_csma_form_status=1;
function acx_csma_validate_email()
{
	<?php 
	if($acx_csma_show_subscription_name2 == 0)
	{?>
	
	var acx_csma_email = document.getElementById('acx_csma_email').value;
	var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	if (acx_csma_email=='') 
	{
	   alert('<?php echo $acx_email_val_singular; ?>');
		return false;
	}
	else if (!expr.test(acx_csma_email)) 
	{
		document.getElementById('acx_csma_email').value="";
		jQuery("#acx_csma_invalid").show();
		jQuery("#acx_csma_email").hide();
		jQuery("#acx_csma_submit").hide();
		setTimeout(function()
			{ 
				jQuery("#acx_csma_invalid").hide();
				jQuery("#acx_csma_email").show();
				jQuery("#acx_csma_submit").show();				
			}, 3000);
		
		
		return false;
	}
		else 
	{
	var acx_load="<div id='acx_csma_loading'><div class='load_1'></div></div>";
	jQuery('body').append(acx_load);
	
	var timestamp =  Math.floor(<?php echo current_time('timestamp'); ?>);
	var ip="<?php  echo $_SERVER['REMOTE_ADDR']; ?>";
	var acx_csma_ajaxurl ="<?php echo admin_url('admin-ajax.php'); ?>";
	var order = '&email='+acx_csma_email+'&ip='+ip+'&timestamp='+timestamp+'&action=acx_csma_subscribe_email'+'&acx_csma_subscribe_es=<?php echo wp_create_nonce('acx_csma_subscribe_es'); ?>';
		jQuery.post(acx_csma_ajaxurl, order, function(theResponse)
		{
			jQuery("#acx_csma_loading").remove();
			if(theResponse == "success")
			{
				document.getElementById('acx_csma_email').value="";
				jQuery("#acx_csma_success").show();
				jQuery("#acx_csma_email").hide();
				jQuery("#acx_csma_submit").hide();
				setTimeout(function()
				{ 
					jQuery("#acx_csma_success").hide(); 
					jQuery("#acx_csma_email").show();
					jQuery("#acx_csma_submit").show();
				//	acx_csma_form_status=1;
			
				}, 3000);
			}  
			else{
				document.getElementById('acx_csma_email').value="";
				jQuery("#acx_csma_email").hide();
				jQuery("#acx_csma_submit").hide();
				jQuery("#acx_csma_error").show();
				jQuery("#acx_csma_error").html("<?php echo $acx_email_singular; ?>");
				setTimeout(function()
				{ 
					jQuery("#acx_csma_error").html(''); 
					jQuery("#acx_csma_error").hide(); 
					jQuery("#acx_csma_email").show();
					jQuery("#acx_csma_submit").show();
					//acx_csma_form_status=1;
			
				}, 3000);
			
			}  
		});
	}
	<?php	
	}
	else
	{
	?>
	var acx_csma_name_hidden=document.getElementById('acx_csma_name_hidden').value;
	if(acx_csma_form_status== 1)
	{
	if(acx_csma_name_hidden=="")
	{
		alert('<?php echo $acx_name_val_singular; ?>');
		acx_csma_form_status=1;
		return false;
	}
	else{
	document.getElementById('acx_csma_name_hidden').type = 'hidden';
	document.getElementById('acx_csma_email').type = 'email';
	jQuery("#acx_csma_email").show();
	document.getElementById('acx_csma_submit').value="<?php echo $acx_csma_subscribe_btn_text2; ?>";
	acx_csma_form_status=2;
	return false;
	}
	}
	else if(acx_csma_form_status==2)
	{
		var acx_csma_email = document.getElementById('acx_csma_email').value;
	var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	if (acx_csma_email=='') 
	{
	    alert('<?php echo $acx_email_val_singular; ?>');
		return false;
	}
	else if (!expr.test(acx_csma_email)) 
	{
		document.getElementById('acx_csma_email').value="";
		document.getElementById('acx_csma_name_hidden').value="";
		jQuery("#acx_csma_email").hide();
		jQuery("#acx_csma_submit").hide();
		jQuery("#acx_csma_invalid").show();
		setTimeout(function()
			{ 
				jQuery("#acx_csma_invalid").hide(); 
				document.getElementById('acx_csma_name_hidden').type = 'text';
				document.getElementById('acx_csma_submit').value="<?php echo $acx_next_singular; ?>";
				jQuery("#acx_csma_submit").show();
				acx_csma_form_status=1;
		
			}, 3000);
		
		
		return false;
	}
	else 
	{
	var acx_load="<div id='acx_csma_loading'><div class='load_1'></div></div>";
	jQuery('body').append(acx_load);
	
	var timestamp =  Math.floor(<?php echo current_time('timestamp'); ?>);
	var ip="<?php  echo $_SERVER['REMOTE_ADDR']; ?>";
	var acx_csma_ajaxurl ="<?php echo admin_url('admin-ajax.php'); ?>";
	var order = 'name='+acx_csma_name_hidden+'&email='+acx_csma_email+'&ip='+ip+'&timestamp='+timestamp+'&action=acx_csma_subscribe_email'+'&acx_csma_subscribe_es=<?php echo wp_create_nonce('acx_csma_subscribe_es'); ?>';
		jQuery.post(acx_csma_ajaxurl, order, function(theResponse)
		{
			jQuery("#acx_csma_loading").remove();
			if(theResponse == "success")
			{
			document.getElementById('acx_csma_email').value="";
			document.getElementById('acx_csma_name_hidden').value="";
			jQuery("#acx_csma_email").hide();
			jQuery("#acx_csma_submit").hide();
			
			jQuery("#acx_csma_success").show();
			setTimeout(function()
			{ 
				jQuery("#acx_csma_success").hide(); 
				document.getElementById('acx_csma_name_hidden').type = 'text';
				document.getElementById('acx_csma_submit').value="<?php echo $acx_next_singular; ?>";
				jQuery("#acx_csma_submit").show();
				acx_csma_form_status=1;
		
			}, 3000);
			}  
			else{
			document.getElementById('acx_csma_email').value="";
			document.getElementById('acx_csma_name_hidden').value="";
			jQuery("#acx_csma_email").hide();
			jQuery("#acx_csma_submit").hide();
			jQuery("#acx_csma_error").show();
			jQuery("#acx_csma_error").html("<?php echo $acx_email_singular; ?>");
			setTimeout(function()
			{ 
				jQuery("#acx_csma_error").html(''); 
				jQuery("#acx_csma_error").hide(); 
				document.getElementById('acx_csma_name_hidden').type = 'text';
				document.getElementById('acx_csma_submit').value="<?php echo $acx_next_singular; ?>";
				jQuery("#acx_csma_submit").show();
				acx_csma_form_status=1;
		
			}, 3000);
			
			}  
		});
	}
	
	}<?php
	}
	?>
}
<?php
}
if($acx_csma_show_timer2 == 1)
{
	if($acx_csma_timestamp < $acx_csma_date_time)
	{?>	
var start_date = <?php echo $acx_csma_start_date_time; ?>;
var end_date =<?php echo $acx_csma_date_time; ?>;
var current = Math.floor(<?php echo current_time('timestamp'); ?>);

updateCounter();
function updateCounter()
{
	if(current < end_date)
	{
	current = current+1;
	seconds = (end_date - current);
	days = Math.floor(seconds / (60 * 60 * 24)); 
	seconds -= days * 60 * 60 * 24; 
	
	hours = Math.floor(seconds / (60 * 60));
	seconds -= hours * 60 * 60;
	
	minutes = Math.floor(seconds / 60);
	seconds -= minutes * 60;
	
	for(var i=0;i< seconds.toString().length;i++)
	{
		if(seconds < 2)
		{
			jQuery('#acx_sec_disp').html('<?php echo $acx_sec_singular; ?>');
		}
		else
		{
			jQuery('#acx_sec_disp').html('<?php echo $acx_sec_plural; ?>');
		}
		if(seconds < 10 && seconds.toString().length == 1 )
		{
			seconds = "0"+seconds;
		}
		if(seconds > 60)
		{
		seconds = 60;
		}
		var res_sec = seconds.toString().charAt(i);
	   if(seconds.toString().length == 1)
	   {
			a=i+1;
			document.getElementById("seconds_"+a).innerHTML = res_sec;
	   }
	   else if(seconds.toString().length == 2)
	   {
			document.getElementById("seconds_"+i).innerHTML = res_sec;
	   }
	}
	for(var j=0;j< minutes.toString().length;j++)
	{
		if(minutes < 2)
		{
			jQuery('#acx_min_disp').html('<?php echo $acx_minute_singular; ?>');
		}
		else
		{
			jQuery('#acx_min_disp').html('<?php echo $acx_minute_plural; ?>');
		}
		if(minutes < 10 && minutes.toString().length == 1 )
		{
			minutes = "0"+minutes;
		}
		if(minutes > 60)
		{
		minutes = 60;
		}
		var res_min = minutes.toString().charAt(j);
		if(minutes.toString().length == 1)
	   {
			b=j+1;
			document.getElementById("minutes_"+b).innerHTML = res_min;
	   }
	   else if(minutes.toString().length == 2)
	   {
			document.getElementById("minutes_"+j).innerHTML = res_min;
	   }
	}

	for(var k=0;k< hours.toString().length;k++)
	{
		if(hours < 2)
		{
			jQuery('#acx_hour_disp').html('<?php echo $acx_hour_singular; ?>');
		}
		else
		{
			jQuery('#acx_hour_disp').html('<?php echo $acx_hour_plural; ?>');
		}
		if(hours < 10 && hours.toString().length == 1 )
		{
			hours = "0"+hours;
		}
		if(hours > 60)
		{
		hours = 60;
		}
		var res_hour = hours.toString().charAt(k);
		if(hours.toString().length == 1)
	   {
		c=k+1;
		document.getElementById("hours_"+c).innerHTML = res_hour;
	   }
	   else if(hours.toString().length == 2)
	   {
		document.getElementById("hours_"+k).innerHTML = res_hour;
	   }
	}
   document.getElementById("days").innerHTML = days;
   if(days < 2)
	{
		jQuery('#acx_day_disp').html('<?php echo $acx_day_singular; ?>');
	}
	else
	{
		jQuery('#acx_day_disp').html('<?php echo $acx_day_plural; ?>');
	}
	setTimeout(function(){ 
    updateCounter(); 
		}, 1000 );
  }
}
  <?php 
	}
}
  ?>
</script>
<?php do_action('acx_csma_bottom_inside_body_tag',$acx_csma_template_id);?>
</body>
</html>
