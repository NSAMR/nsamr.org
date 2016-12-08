<?php
$acx_csma_template_id = 5;
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
$acx_csma_start_date_time=get_option('acx_csma_start_date_time');
$acx_csma_date_time=get_option('acx_csma_date_time');
$acx_csma_appearence_array_5=acx_csma_get_db_array_value(); 
	$acx_csma_timestamp=current_time('timestamp');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
if($acx_csma_meta_title!="")
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
<?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_custom_css_temp5']; ?>
</style>
<link href="<?php echo plugins_url('style.css', __FILE__); ?>" rel="stylesheet" type="text/css" />
<link rel="icon" href="<?php echo esc_url($acx_csma_favicon); ?>"  type="image/png">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<?php echo stripslashes(get_option('acx_csma_ga_trakng_code')); 
do_action('acx_csma_bottom_inside_head_tag',$acx_csma_template_id);
?>
</head>

<body style="background:<?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_bgcolor5']; ?>">
<?php 
do_action('acx_csma_top_inside_body_tag',$acx_csma_template_id);
if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array_5[$acx_csma_template_id]))
{
	if($acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_logo_choice']=="text")
	{
		$new_class="text_logo";
	} else
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
		<div class="canvas1000"> 
			<div id="header"> 
			
				<?php if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array_5[$acx_csma_template_id])){ if($acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_logo_choice']=="image" || $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_logo_choice']==""){ 
				$acx_csma_logo5_id = $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_logo5'];
					$logo5_url  = $acx_csma_logo5_id;
					if(is_numeric($acx_csma_logo5_id))
					{
						$logo5_attachment_url = parse_url( wp_get_attachment_url($acx_csma_logo5_id) );
						$logo5_url    = $logo5_attachment_url [ 'scheme' ]  . '://' .rawurlencode( basename( $logo5_attachment_url[ 'host' ])). $logo5_attachment_url[ 'path' ];
					}
				?>
			<img src="<?php echo $logo5_url; ?>" alt="Logo"> 
			<?php } else if($acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_logo_choice']=="text")
			{
				$acx_csma_logo_text5 = $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_logo_text5'];
				$acx_csma_logo_text5 = acx_csma_text_after_save_hook_fn($acx_csma_logo_text5);
				?>
				<div class="logo_text" style="color:<?php  echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_logo_text_color5']; ?>"><?php echo $acx_csma_logo_text5; ?></div>
				<?php } } ?>
			</div><!-- header -->	
			<div class="inline_block mg_top" style="background:<?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_inside_bg_color5']; ?>"> 
				<h2 style="color:<?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_title_color5']; ?>"><?php 
				$acx_csma_title5 = $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_title5'];
				$acx_csma_title5 = acx_csma_text_after_save_hook_fn($acx_csma_title5);
				echo $acx_csma_title5; ?></h2>
				
				
				<?php
				$acx_csma_custom_html_top_temp5 = $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_custom_html_top_temp5'];
				if($acx_csma_custom_html_top_temp5 != "") { ?>
				<div class="acx_csma_content_div acx_csma_top acx_csma_top_5" id="acx_csma_top_1">
				<?php echo $acx_csma_custom_html_top_temp5 = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_top_temp5);?>
				</div>
				<?php } ?>
				
				<?php if($acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_show_timer5']==1)
				{
					
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
					
					$acx_week_arr=acx_csma_disp_var_to_show("week");
					$acx_week_singular=$acx_week_arr['singular'];
					$acx_week_plural=$acx_week_arr['plural'];
				?>
				<div class="inline_block timer_holder"> 
	<!-- Start: The Countdown -->
		<div class="custom-container">

		<ul id="countdown" class="count_down">
			<li>
			<div class="weeks" id="week" style="color:<?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_timer_iptext_color5']; ?>">00</div>
			<div class="textWeeks" id="names" style="color:<?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_timer_head_color5']; ?>"><?php echo $acx_week_singular; ?></div>
			</li>

			<li>
			<div class="days" id="day" style="color:<?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_timer_iptext_color5']; ?>">00</div>
			<div class="textDays" id="names" style="color:<?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_timer_head_color5']; ?>"><?php echo $acx_day_singular; ?></div>
			</li>

			<li>
			<div class="hours" id="hour" style="color:<?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_timer_iptext_color5']; ?>">00</div>
			<div class="textHours" id="names" style="color:<?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_timer_head_color5']; ?>"><?php echo $acx_hour_singular; ?></div>
			</li>

			<li>
			<div class="minutes" id="minute" style="color:<?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_timer_iptext_color5']; ?>">00</div>
			<div class="textMinutes" id="names" style="color:<?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_timer_head_color5']; ?>"><?php echo $acx_minute_singular; ?></div>
			</li>
			
			<li>
			<div class="seconds" id="second" style="color:<?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_timer_iptext_color5']; ?>">00</div>
			<div class="textSeconds" id="names" style="color:<?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_timer_head_color5']; ?>"><?php echo $acx_sec_singular; ?></div>
			</li>

		</ul> <!-- /#countdown -->

		 </div> <!-- /.custom-container -->
      <!-- End: The Countdown -->	
				</div><!-- timer_holder -->
				<?php
				}
				$acx_csma_show_subscription5 = $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_show_subscription5'];
				$acx_cls = '';
				if($acx_csma_show_subscription5 == 0)
				{
					$acx_cls = 'margin-bottom: 25px; ';
				}
				?>
				<?php  if($acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_show_progressbar5']==1)
				{?>
				<div class="pre_loader" style="<?php echo $acx_cls; ?>border: 1px solid <?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_progress_bar_color5']; ?>;clear:both;"> 	
				<div class="pre_loader_inside" id="pre_loader_inside" style="background:<?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_progress_bar_bg_color5']; ?>;position:absolute;top: 0; left: 0; width:0%; height:inherit;">
				</div><!-- pre_loader_inside -->
				<div class="pre_loader_text" id="pre_loader_text" style=" z-index:10px;top: 0; left: 0; width: 100%; height: 100%; color: <?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_progress_bar_text_color5']; ?>; font-weight: bold; text-align: center;position:absolute;">0%</div><!-- pre_loader_text -->
				</div><!-- pre_loader -->
				<?php }?>
				<?php
				$acx_csma_custom_html_bottom_temp5 = $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_custom_html_bottom_temp5'];
				if($acx_csma_custom_html_bottom_temp5 != "") { ?>
				<div class="acx_csma_content_div acx_csma_bottom acx_csma_bottom_5" id="acx_csma_top_1">
				<?php echo $acx_csma_custom_html_bottom_temp5 = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_bottom_temp5); ?>
				</div>
				<?php } 
				
				if($acx_csma_show_subscription5 == 1)
				{
					$acx_csma_subscribe_main_title5 = $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_subscribe_main_title5'];
					$acx_csma_subscribe_main_title5 = acx_csma_text_after_save_hook_fn($acx_csma_subscribe_main_title5);
					$acx_csma_subscribe_title5 = $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_subscribe_title5'];
					$acx_csma_subscribe_title5 = acx_csma_text_after_save_hook_fn($acx_csma_subscribe_title5);
				?>
				
				<h3 style="color:<?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_launch_title_color5']; ?>;clear:both;"><?php echo $acx_csma_subscribe_main_title5; ?> <br/> <?php echo $acx_csma_subscribe_title5; ?></h3>
				<?php
				}
				?>
				
			</div><!-- inline_block -->
			<div class="footer" style="background:<?php echo $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_subscribe_bg_color5']; ?>"> 
			<?php
			
			$acx_csma_custom_html_top_sub = $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_custom_html_top_sub'];
			$acx_csma_custom_html_bottom_sub = $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_custom_html_bottom_sub'];
			if($acx_csma_custom_html_top_sub != "" || $acx_csma_custom_html_bottom_sub != "" || $acx_csma_show_subscription5 == 1)
			{
				if($acx_csma_custom_html_top_sub != "")
				{
				?>
				<div class="acx_csma_content_div acx_csma_bottom acx_csma_bottom_5" id="acx_csma_top_1">
				<?php echo $acx_csma_custom_html_top_sub = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_top_sub); ?>
				</div>
				<?php
				}
				
				if($acx_csma_show_subscription5 == 1)
				{
					$acx_csma_subscribe_success5 = $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_subscribe_success5'];
					$acx_csma_subscribe_success5 = acx_csma_text_after_save_hook_fn($acx_csma_subscribe_success5);
					$acx_csma_subscribe_invalid5 = $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_subscribe_invalid5'];
					$acx_csma_subscribe_invalid5 = acx_csma_text_after_save_hook_fn($acx_csma_subscribe_invalid5);
					$acx_subs_next_arr=acx_csma_disp_var_to_show("next");
					$acx_next_singular=$acx_subs_next_arr['singular'];
					$acx_subs_name_arr=acx_csma_disp_var_to_show("Subscription Name Placeholder");
					$acx_s_name_singular=$acx_subs_name_arr['singular'];
					$acx_subs_email_arr=acx_csma_disp_var_to_show("Subscription Email Placeholder");
					$acx_s_email_singular=$acx_subs_email_arr['singular'];
					$acx_csma_show_subscription_name5 = $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_show_subscription_name5'];
					?>
					<form name="acx_csma_form" method="post" action="<?php echo esc_url(str_replace( '%7E', '~',$_SERVER['REQUEST_URI'])); ?>">  
					<div id="acx_csma_success"  name="acx_csma_success" style="display:none;" ><?php echo $acx_csma_subscribe_success5; ?></div>
					<div id="acx_csma_invalid" name="acx_csma_invalid" style="display:none;" ><?php echo $acx_csma_subscribe_invalid5; ?></div>
					<div id="acx_csma_error"  style="display:none;"></div>
					<?php
					if($acx_csma_show_subscription_name5 == 1)
					{
					?>
					<input type="text" id="acx_csma_name_hidden" name="acx_csma_name_hidden" value="" placeholder="<?php echo acx_csma_option_text_after_save_hook_fn($acx_s_name_singular); ?>"/>
					<input type="hidden" id="acx_csma_email" name="email" placeholder="<?php echo acx_csma_option_text_after_save_hook_fn($acx_s_email_singular); ?>" > 
					<input type="button" value="<?php echo acx_csma_option_text_after_save_hook_fn($acx_next_singular); ?>" id="acx_csma_submit" onclick="acx_csma_validate_email();" class="submit">
					<?php
					}
					else if($acx_csma_show_subscription_name5 == 0){ ?>
					
					<input type="text" id="acx_csma_email" name="email" placeholder="<?php echo acx_csma_option_text_after_save_hook_fn($acx_s_email_singular); ?>" > 
					<input type="button" value="<?php echo  acx_csma_option_text_after_save_hook_fn($acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_subscribe_btn_text5']); ?>" id="acx_csma_submit" onclick="acx_csma_validate_email();" class="submit">
					<?php
					}
					
					?>
					</form>
					<?php
				}
				
				if($acx_csma_custom_html_bottom_sub != "")
				{
					?>
					<div class="acx_csma_content_div acx_csma_bottom acx_csma_bottom_5" id="acx_csma_top_1">
				<?php echo $acx_csma_custom_html_bottom_sub = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_bottom_sub); ?>
				</div>
				<?php
				}
			}
			?>
				
				<div class="scmi"> 
				<ul>
				<?php if($acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_fb_link5']!="")
					{
					?>
					<li><a class="acx_csma_social_icons csma_fb" href="<?php echo esc_url($acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_fb_link5']); ?>"><img src="<?php echo plugins_url('images/facebook.png', __FILE__); ?>" alt="Logo"></a></li>
					<?php
					}
					if($acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_twitter_link5']!="")
					{
					?>
					<li><a class="acx_csma_social_icons csma_twtr" href="<?php echo esc_url($acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_twitter_link5']); ?>"><img src="<?php echo plugins_url('images/twitter.png', __FILE__); ?>" alt="Logo"></a></li>
					<?php
					}
					if($acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_linkedin_link5']!="")
					{?>
					<li style="margin-right: 0;"><a class="acx_csma_social_icons csma_lnkn" href="<?php echo esc_url($acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_linkedin_link5']); ?>"><img src="<?php echo plugins_url('images/linkedin.png', __FILE__); ?>" alt="Logo"></a></li>
					<?php
					}?>
					
				</ul>
				</div><!-- scmi -->	
			</div><!-- footer -->
		</div><!-- canvas1000 -->
	</div><!-- wrapper -->
	
<script>
jQuery(document).ready(function() {
  jQuery(window).keydown(function(event){
    if(event.keyCode == 13) {
<?php
if($acx_csma_show_subscription5 == 1)
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
if($acx_csma_show_subscription5 == 1)
{
	$acx_csma_show_subscription_name5 = $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_show_subscription_name5'];
	$acx_csma_subscribe_btn_text5 = $acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_subscribe_btn_text5'];
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
	if($acx_csma_show_subscription_name5 == 0)
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
		document.getElementById('acx_csma_submit').value="<?php echo $acx_csma_subscribe_btn_text5; ?>";
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
	}
	<?php
	}
	?>
}
<?php
}
?>
<?php if($acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_show_progressbar5']==1)
{
	if($acx_csma_timestamp < $acx_csma_date_time)
	{?>
	var current_spu = Math.floor(<?php echo current_time('timestamp'); ?>);		
	var startTime=<?php echo $acx_csma_start_date_time; ?>;
	var maxTime =<?php echo $acx_csma_date_time; ?>;
  
	showProgressUpdate();
   function updateProgress(percentage) {
	
    jQuery('#pre_loader_inside').css("width", percentage + "%");
    jQuery('#pre_loader_text').text(percentage + "%");
	}

	function showProgressUpdate() {
	 current_spu = (current_spu+1);
		var perc = Math.round(((current_spu-startTime) / (maxTime-startTime)) * 100);
			
		  if (perc <= 100) {
		 
		   updateProgress(perc);
		   setTimeout(showProgressUpdate, 1000);
		  }
	}
	<?php }

}
if($acx_csma_appearence_array_5[$acx_csma_template_id]['acx_csma_show_timer5']==1)
{
if($acx_csma_timestamp < $acx_csma_date_time)
{	?>
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
	
	weeks=Math.floor(seconds / (60 *60 * 24*7)); 
	if(weeks < 2)
	{
		jQuery('.textWeeks').html('<?php echo $acx_week_singular; ?>');
	}
	else
	{
		jQuery('.textWeeks').html('<?php echo $acx_week_plural; ?>');
	}
	seconds -= weeks * 60 * 60 * 24* 7; 
		
	days = Math.floor(seconds / (60 * 60 * 24)); 
	if(days < 2)
	{
		jQuery('.textDays').html('<?php echo $acx_day_singular; ?>');
	}
	else
	{
		jQuery('.textDays').html('<?php echo $acx_day_plural; ?>');
	}
	seconds -= days * 60 * 60 * 24; 
	
	hours = Math.floor(seconds / (60 * 60));
	if(hours < 2)
	{
		jQuery('.textHours').html('<?php echo $acx_hour_singular; ?>');
	}
	else
	{
		jQuery('.textHours').html('<?php echo $acx_hour_plural; ?>');
	}
	seconds -= hours * 60 * 60;
	
	minutes = Math.floor(seconds / 60);
	if(minutes < 2)
	{
		jQuery('.textMinutes').html('<?php echo $acx_minute_singular; ?>');
	}
	else
	{
		jQuery('.textMinutes').html('<?php echo $acx_minute_plural; ?>');
	}
	seconds -= minutes * 60;
	if(seconds < 2)
	{
		jQuery('.textSeconds').html('<?php echo $acx_sec_singular; ?>');
	}
	else
	{
		jQuery('.textSeconds').html('<?php echo $acx_sec_plural; ?>');
	}
		document.getElementById("second").innerHTML = seconds;
		document.getElementById("minute").innerHTML = minutes;
		document.getElementById("hour").innerHTML = hours;
		document.getElementById("week").innerHTML = weeks;
	    document.getElementById("day").innerHTML = days;
		setTimeout( function(){ 
    updateCounter(); 
		}, 1000 );
	}
}
	<?php }
}?>
</script>
<?php do_action('acx_csma_bottom_inside_body_tag',$acx_csma_template_id); ?>
	</body>
	</html>
