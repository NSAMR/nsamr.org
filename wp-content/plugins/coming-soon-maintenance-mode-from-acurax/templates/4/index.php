<?php
$acx_csma_template_id = 4;
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
$acx_csma_appearence_array_4=acx_csma_get_db_array_value(); 
$acx_csma_start_date_time=get_option('acx_csma_start_date_time');
$acx_csma_date_time=get_option('acx_csma_date_time');
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
<?php echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_custom_css_temp4']; ?>
.acx_csma_subs_heading h1 {
  color: <?php echo $acx_csma_subscription_title_color4 = $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_subscription_title_color4'];?>;
}
.acx_csma_subscript_cvr #acx_csma_submit {
  background-color: <?php echo  $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_subscription_btn_bg_color4'];?>;
  color: <?php echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_subscription_btn_color4']; ?>;
}



</style>
<link href="<?php echo plugins_url('style.css', __FILE__); ?>" rel="stylesheet" type="text/css" />
<link rel="icon" href="<?php echo esc_url($acx_csma_favicon); ?>"  type="image/png">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link href="<?php echo plugins_url('images/animate.min.css', __FILE__); ?>" rel="stylesheet" type="text/css" />
<?php echo stripslashes(get_option('acx_csma_ga_trakng_code'));
do_action('acx_csma_bottom_inside_head_tag',$acx_csma_template_id);
 ?>
</head>
<?php
$acx_csma_background_image4_id = $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_background_image4'];
$bg_image4_url  = $acx_csma_background_image4_id;
if(is_numeric($acx_csma_background_image4_id))
{
	$image4_attachment_url = parse_url( wp_get_attachment_url($acx_csma_background_image4_id) );
	$bg_image4_url    = $image4_attachment_url [ 'scheme' ]  . '://' .rawurlencode( basename( $image4_attachment_url[ 'host' ])). $image4_attachment_url[ 'path' ];
} 


?>
<body style="background:url('<?php echo $bg_image4_url; ?>')no-repeat fixed center center transparent; background-size:cover; ">
<?php 
do_action('acx_csma_top_inside_body_tag',$acx_csma_template_id);
if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array_4[$acx_csma_template_id]))
{
	if($acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_logo_choice']=="text")
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
		<div class="canvas1000"> 
			<div id="header">
			
			<?php if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array_4[$acx_csma_template_id])){ if($acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_logo_choice']=="image" || $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_logo_choice']==""){ 
			
			$acx_csma_logo4_id = $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_logo4'];
					$logo4_url  = $acx_csma_logo4_id;
					if(is_numeric($acx_csma_logo4_id))
					{
						$logo4_attachment_url = parse_url( wp_get_attachment_url($acx_csma_logo4_id) );
						$logo4_url    = $logo4_attachment_url [ 'scheme' ]  . '://' .rawurlencode( basename( $logo4_attachment_url[ 'host' ])). $logo4_attachment_url[ 'path' ];
					}
					?>
			<img src="<?php echo $logo4_url; ?>" alt="Logo">
			<?php } else if($acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_logo_choice']=="text"){
				$acx_csma_logo_text4 = $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_logo_text4'];
				$acx_csma_logo_text4 = acx_csma_text_after_save_hook_fn($acx_csma_logo_text4);
				?>
				<div class="logo_text" style="color:<?php  echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_logo_text_color4']; ?>"><?php echo $acx_csma_logo_text4; ?></div>
			<?php } } ?>
			</div><!-- header -->	
			<div class="inline_block mg_top" style="background: none repeat scroll 0 0 <?php echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_inside_bg_color4']; ?>"> 
				<h2 style="color:<?php echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_title_color4']; ?>"><?php
				$acx_csma_title4 = $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_title4'];
				$acx_csma_title4 = acx_csma_text_after_save_hook_fn($acx_csma_title4);
				echo $acx_csma_title4; ?></h2>
				
				<?php
				$acx_csma_custom_html_top_temp4 = $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_custom_html_top_temp4'];
				if($acx_csma_custom_html_top_temp4 != "") { ?>
				<div class="acx_csma_content_div acx_csma_top acx_csma_top_4" id="acx_csma_top_1">
				<?php echo $acx_csma_custom_html_top_temp4 = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_top_temp4); ?>
				</div>
				<?php } ?>
				
				<?php if($acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_show_timer4']==1)
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
					<div class="timer_box days"> 
						<p id="acx_week_disp"><?php echo $acx_week_singular; ?></p>
						<ul>
							<li id="weeks_0" style="color:<?php echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_timer_iptext_color4']; ?>"><span style="display:block;" class="animated">0</span></li>
							<li id="weeks_1" style="color:<?php echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_timer_iptext_color4']; ?>"><span style="display:block;" class="animated">0</span></li>
						</ul>
					</div><!-- timer_box -->					
					<div class="timer_box days"> 
						<p id="acx_day_disp"><?php echo acx_csma_text_after_save_hook_fn($acx_day_singular); ?></p>
						<ul>
							<li id="days_0" style="color:<?php echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_timer_iptext_color4']; ?>"><span style="display:block;" class="animated">0</span></li>
							<!-- li id="days_1" style="color:<?php echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_timer_iptext_color4']; ?>">0</li>
							<li id="days_2" style="color:<?php echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_timer_iptext_color4']; ?>">0</li -->
						</ul>
					</div><!-- timer_box -->
					<div class="timer_box"> 
						<p id="acx_hour_disp"><?php echo acx_csma_text_after_save_hook_fn($acx_hour_singular); ?></p>
						<ul>
							<li id="hours_0" style="color:<?php echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_timer_iptext_color4']; ?>"><span style="display:block;" class="animated">0</span></li>
							<li id="hours_1" style="color:<?php echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_timer_iptext_color4']; ?>"><span style="display:block;" class="animated">0</span></li>
						</ul>
					</div><!-- timer_box -->	
					<div class="timer_box days"> 
						<p id="acx_min_disp"><?php echo acx_csma_text_after_save_hook_fn($acx_minute_singular); ?></p>
						<ul>
							<li id="minutes_0" style="color:<?php echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_timer_iptext_color4']; ?>"><span style="display:block;" class="animated">0</span></li>
							<li id="minutes_1" style="color:<?php echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_timer_iptext_color4']; ?>"><span style="display:block;" class="animated">0</span></li>
						</ul>
					</div><!-- timer_box -->
					<div class="timer_box last_one"> 
						<p id="acx_sec_disp"><?php echo acx_csma_text_after_save_hook_fn($acx_sec_singular); ?></p>
						<ul>
							<li id="seconds_0" style="color:<?php echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_timer_iptext_color4']; ?>"><span style="display:block;" class="animated">0</span></li>
							<li id="seconds_1" style="color:<?php echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_timer_iptext_color4']; ?>"><span style="display:block;" class="animated">0</span></li>
						</ul>
					</div><!-- timer_box -->					
				</div><!-- timer_holder -->
				<?php }?>
				<?php if($acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_show_progressbar4']== 1)
				{?>
				<div class="pre_loader" style="border: 1px solid <?php echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_progress_bar_color4']; ?>"> 	
				<div class="pre_loader_inside" id="pre_loader_inside" style="background:<?php echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_progress_bar_bg_color4']; ?>;position:absolute;top: 0; left: 0; width:0%; height:inherit;">
				</div><!-- pre_loader_inside -->
				<div class="pre_loader_text" id="pre_loader_text" style=" z-index:10px;top: 0; left: 0; width: 100%; height: 100%; color: <?php echo $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_progress_bar_text_color4']; ?>; font-weight: bold; text-align: center;position:absolute;">0%</div><!-- pre_loader_text -->
				</div><!-- pre_loader -->
				<?php }?>
				
				<?php
				$acx_csma_custom_html_bottom_temp4 = $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_custom_html_bottom_temp4'];
				if($acx_csma_custom_html_bottom_temp4 != "") { ?>
				<div class="acx_csma_content_div acx_csma_bottom acx_csma_bottom_4" id="acx_csma_top_1">
				<?php echo $acx_csma_custom_html_bottom_temp4 = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_bottom_temp4); ?>
				</div>
				<?php } 
				
				
				$acx_csma_show_subscription4=$acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_show_subscription4'];
				if($acx_csma_show_subscription4 == 1)
				{
					$acx_csma_subscription_title4 = $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_subscription_title4'];
					$acx_csma_subscription_title4 = acx_csma_text_after_save_hook_fn($acx_csma_subscription_title4);
					$acx_subs_next_arr=acx_csma_disp_var_to_show("next");
					$acx_next_singular=$acx_subs_next_arr['singular'];
					$acx_subs_name_arr=acx_csma_disp_var_to_show("Subscription Name Placeholder");
					$acx_s_name_singular=$acx_subs_name_arr['singular'];
					$acx_subs_email_arr=acx_csma_disp_var_to_show("Subscription Email Placeholder");
					$acx_s_email_singular=$acx_subs_email_arr['singular'];
					$acx_csma_subscribe_success4 = $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_subscribe_success4'];
					$acx_csma_subscribe_success4 = acx_csma_text_after_save_hook_fn($acx_csma_subscribe_success4);
					$acx_csma_subscribe_invalid4 = $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_subscribe_invalid4'];
					$acx_csma_subscribe_invalid4 = acx_csma_text_after_save_hook_fn($acx_csma_subscribe_invalid4);
					$acx_csma_show_subscription_name4 = $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_show_subscription_name4'];
				?>
				
				<div class="acx_csma_subscript_cvr">
				<div class="acx_csma_subs_heading"><h1><?php echo $acx_csma_subscription_title4; ?></h1></div>
				<form name="acx_csma_form" method="post" action="<?php echo esc_url(str_replace( '%7E', '~',$_SERVER['REQUEST_URI'])); ?>">  
					<div id="acx_csma_success"  name="acx_csma_success" style="display:none;" ><?php echo  $acx_csma_subscribe_success4; ?></div>
					<div id="acx_csma_invalid" name="acx_csma_invalid" style="display:none;" ><?php echo $acx_csma_subscribe_invalid4; ?></div>
					<div id="acx_csma_error" style="display:none;"></div>
					<?php
					if($acx_csma_show_subscription_name4 == 1)
					{
					?>
					
					<input type="text" id="acx_csma_name_hidden" class="acx_input_class" name="acx_csma_name_hidden" value="" placeholder="<?php echo acx_csma_option_text_after_save_hook_fn($acx_s_name_singular); ?>"/>
					<input type="hidden" id="acx_csma_email" class="acx_input_class" name="email" placeholder="<?php echo acx_csma_option_text_after_save_hook_fn($acx_s_email_singular); ?>" > 
					<div class="clear-spcl"></div>
					<input type="button" value="<?php echo acx_csma_option_text_after_save_hook_fn($acx_next_singular); ?>" id="acx_csma_submit" onclick="acx_csma_validate_email();" class="submit">
					<?php
					}
					else if($acx_csma_show_subscription_name4 == 0){ ?>
				
					<input type="text" id="acx_csma_email" class="acx_input_class" name="email" placeholder="<?php echo acx_csma_option_text_after_save_hook_fn($acx_s_email_singular);  ?>" > 
					<div class="clear-spcl"></div>
					<input type="button" value="<?php echo acx_csma_option_text_after_save_hook_fn($acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_subscription_btn_text4']); ?>" id="acx_csma_submit" onclick="acx_csma_validate_email();" class="submit">
					<?php }?>
					</form>
			</div>
			<?php
				}
				
				$acx_csma_custom_html_subscrpt_below_sub4 = $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_custom_html_subscrpt_below_sub4'];
				if($acx_csma_custom_html_subscrpt_below_sub4 != "") { ?>
				<div class="acx_csma_content_div acx_csma_bottom acx_csma_bottom_4" id="acx_csma_top_1">
				<?php echo $acx_csma_custom_html_subscrpt_below_sub4 = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_subscrpt_below_sub4); ?>
				</div>
				<?php } ?>
				<div class="scmi"> 
				<ul>
					<?php if($acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_fb_link4']!="")
					{
					?>
					<li><a class="acx_csma_social_icons csma_fb" href="<?php echo esc_url($acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_fb_link4']); ?>"><img src="<?php echo plugins_url('images/facebook.png', __FILE__); ?>" alt="Logo"></a></li>
					<?php
					}
					if($acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_twitter_link4']!="")
					{
					?>
					<li><a class="acx_csma_social_icons csma_twtr" href="<?php echo esc_url($acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_twitter_link4']); ?>"><img src="<?php echo plugins_url('images/twitter.png', __FILE__); ?>" alt="Logo"></a></li>
					<?php
					}
					if($acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_linkedin_link4']!="")
					{
					?>
					<li><a class="acx_csma_social_icons csma_lnkn" href="<?php echo esc_url($acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_linkedin_link4']); ?>"><img src="<?php echo plugins_url('images/linkedin.png', __FILE__); ?>" alt="Logo"></a></li>
				<?php
				}?>
				</ul>
				</div><!-- scmi -->				
			</div><!-- inline_block -->
		</div><!-- canvas1000 -->
	</div><!-- wrapper -->

<script>
jQuery(document).ready(function() {
  jQuery(window).keydown(function(event){
    if(event.keyCode == 13) {
<?php
if($acx_csma_show_subscription4 == 1)
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
if($acx_csma_show_subscription4 == 1)
{
	$acx_csma_show_subscription_name4 = $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_show_subscription_name4'];
	$acx_csma_subscription_btn_text4 = $acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_subscription_btn_text4'];
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
	if($acx_csma_show_subscription_name4 == 0)
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
	document.getElementById('acx_csma_submit').value="<?php echo $acx_csma_subscription_btn_text4; ?>";
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
if($acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_show_progressbar4']==1)
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
 if($acx_csma_appearence_array_4[$acx_csma_template_id]['acx_csma_show_timer4']==1)
 {
	 if($acx_csma_timestamp < $acx_csma_date_time)
	{?>
var start_date = <?php echo $acx_csma_start_date_time; ?>;
var end_date =<?php echo $acx_csma_date_time; ?>;
var current = Math.floor(<?php echo current_time('timestamp'); ?>);
updateCounter();
function digit_updater(element,value,maximum_value)
{
	if(value < 10 && value.toString().length == 1 && element != "days")
	{
		value = "0"+value;
	}
	if(value > maximum_value)
	{
	value = maximum_value;
	}
	
	for(var i=0;i < value.toString().length;i++)
	{
		var res_sec = value.toString().charAt(i);
	
		jQuery("#"+element+"_"+i+" span").removeClass(animate_class);
	
		if(jQuery("#"+element+"_"+i+" span").text() != res_sec)
		{
		jQuery("#"+element+"_"+i+" span").hide();
		jQuery("#"+element+"_"+i+" span").addClass(animate_class);
		jQuery("#"+element+"_"+i+" span").show();
		}
		if(value >= maximum_value && i == (value.toString().length-1))
		{
		jQuery("#"+element+"_"+i+" span").text(res_sec).parent().addClass("plus");
		} else
		{
		jQuery("#"+element+"_"+i+" span").text(res_sec);
		jQuery("#"+element+"_"+i+" span").text(res_sec).parent().removeClass("plus");
		}
	}
} //-----------------------------------------------------------------------
function updateCounter()
{
	
	if(current < end_date)
	{
	animate_class = "flipInX";
	current = current+1;
	seconds = (end_date - current);

	weeks=Math.floor(seconds / (60 *60 * 24*7)); 
	if(weeks < 2)
	{
		jQuery('#acx_week_disp').html('<?php echo $acx_week_singular; ?>');
	}
	else
	{
		jQuery('#acx_week_disp').html('<?php echo $acx_week_plural; ?>');
	}
	seconds -= weeks * 60 * 60 * 24* 7; 
	
	days = Math.floor(seconds / (60 * 60 * 24));
	if(days < 2)
	{
		jQuery('#acx_day_disp').html('<?php echo $acx_day_singular; ?>');
	}
	else
	{
		jQuery('#acx_day_disp').html('<?php echo $acx_day_plural; ?>');
	}
	seconds -= days * 60 * 60 * 24; 
	
	hours = Math.floor(seconds / (60 * 60));
	if(hours < 2)
	{
		jQuery('#acx_hour_disp').html('<?php echo $acx_hour_singular; ?>');
	}
	else
	{
		jQuery('#acx_hour_disp').html('<?php echo $acx_hour_plural; ?>');
	}
	seconds -= hours * 60 * 60;
	
	minutes = Math.floor(seconds / 60);
	if(minutes < 2)
	{
		jQuery('#acx_min_disp').html('<?php echo $acx_minute_singular; ?>');
	}
	else
	{
		jQuery('#acx_min_disp').html('<?php echo $acx_minute_plural; ?>');
	}
	seconds -= minutes * 60;
	if(seconds < 2)
	{
		jQuery('#acx_sec_disp').html('<?php echo $acx_sec_singular; ?>');
	}
	else
	{
		jQuery('#acx_sec_disp').html('<?php echo $acx_sec_plural; ?>');
	}
	digit_updater("seconds",seconds,60);
	digit_updater("minutes",minutes,60);
	digit_updater("hours",hours,60);
	digit_updater("days",days,7);
	digit_updater("weeks",weeks,99);

	setTimeout( function(){ 
    updateCounter(); 
		}, 1000 );
	}
  }
	<?php }
	
}?>
</script>
<?php do_action('acx_csma_bottom_inside_body_tag',$acx_csma_template_id);?>
</body>
</html>
