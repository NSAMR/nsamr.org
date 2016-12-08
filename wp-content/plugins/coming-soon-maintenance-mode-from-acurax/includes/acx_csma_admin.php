<script type="text/javascript">
function getCookie(name){
	var cookie = " " + document.cookie;var search = " " + name + "=";
	var setStr = null;
	var offset = 0;
	var end = 0;
	if (cookie.length > 0){
	offset = cookie.indexOf(search);
	if (offset != -1){
	offset += search.length;
	end = cookie.indexOf(";", offset);
	if (end == -1){end = cookie.length;}
	setStr = unescape(cookie.substring(offset, end));
	}}return(setStr);
}
function setCookie (name, value){
	var acx_today = new Date();
	expires_date = new Date(acx_today.getTime() + (60 * 60 * 1000));
	document.cookie = name + "=" + escape(value) + "; expires=" + expires_date.toGMTString() + "; path=/;";
}
var acx_csma_cookie = getCookie("acx_csma_cookie");
if(!acx_csma_cookie)
{
	setCookie("acx_csma_cookie",1);
}
var acx_csma_temp_cookie = getCookie("acx_csma_temp_cookie");
if(!acx_csma_temp_cookie)
{
	setCookie("acx_csma_temp_cookie",1);
}
</script>
<?php
acx_csma_hook_function('acx_csma_hook_bove_if_post');	
global $acx_csmap_qa_id;
$acx_csmap_qa_id = 0;

if(ISSET($_POST['acx_csma_hidden']))
{
	$acx_csma_hidden = $_POST['acx_csma_hidden'];
} 
else
{
	$acx_csma_hidden = "";
}			
if($acx_csma_hidden == 'Y') 
{
	if (!isset($_POST['acx_csma_save_config'])) die("<br><br>".__("Unknown Error Occurred, Try Again... ","coming-soon-maintenance-mode-from-acurax")."<a href=''>".__("Click Here","coming-soon-maintenance-mode-from-acurax")."</a>");
	if (!wp_verify_nonce($_POST['acx_csma_save_config'],'acx_csma_save_config')) die("<br><br>".__("Unknown Error Occurred, Try Again... ","coming-soon-maintenance-mode-from-acurax")."<a href=''>".__("Click Here","coming-soon-maintenance-mode-from-acurax")."</a>");
	if(!current_user_can('manage_options')) die("<br><br>".__("Sorry, You have no permission to do this action...","coming-soon-maintenance-mode-from-acurax")."</a>");
	//Form data sent
	acx_csma_hook_function('acx_csma_hook_mainoptions_inside_if_submit');
	$acx_csma_activation_status =$_POST['acx_csma_activate'];
	update_option('acx_csma_activation_status',$acx_csma_activation_status);
	$acx_csma_meta_title=sanitize_text_field($_POST['acx_csma_meta_title']);
	update_option('acx_csma_meta_title',$acx_csma_meta_title);
	$acx_csma_meta_description=sanitize_text_field($_POST['acx_csma_meta_description']);
	update_option('acx_csma_meta_description',$acx_csma_meta_description);
	$acx_csma_meta_keywords=sanitize_text_field($_POST['acx_csma_meta_keywords']);
	update_option('acx_csma_meta_keywords',$acx_csma_meta_keywords);
	$acx_csma_favicon=$_POST['acx_csma_favicon_field'];
	update_option('acx_csma_favicon',$acx_csma_favicon);
	$acx_csma_date_time=$_POST['acx_csma_date_time'];
	$acx_csma_date_time = explode(" ",$acx_csma_date_time);
	$acx_csma_t1=explode("/",$acx_csma_date_time[0]);
	$acx_csma_t2=explode(":",$acx_csma_date_time[1]);
	$timestamp = mktime($acx_csma_t2[0],$acx_csma_t2[1],0,$acx_csma_t1[1],$acx_csma_t1[2],$acx_csma_t1[0]);//mktime(hour,minute,second,month,day,year);
	update_option('acx_csma_date_time',$timestamp);
	$acx_csma_ga_trakng_code=$_POST['acx_csma_ga_trakng_code'];
	update_option('acx_csma_ga_trakng_code',$acx_csma_ga_trakng_code);
	
	if(ISSET($_POST['acx_csma_ip_list']))
	{
		$acx_csma_ip_list=	$_POST['acx_csma_ip_list'];
	}
	else{
		$acx_csma_ip_list=array();
	}
	if(!is_serialized($acx_csma_ip_list))
	{
		$acx_csma_ip_list = serialize($acx_csma_ip_list); 
	} 	
	
	update_option('acx_csma_ip_list', $acx_csma_ip_list);


	if(ISSET($_POST['acx_csma_restrict_role']))
	{
		$acx_csma_restrict_role = $_POST['acx_csma_restrict_role'];

		if(!is_serialized($acx_csma_restrict_role))
		{
			$acx_csma_restrict_role = serialize($acx_csma_restrict_role); 
		}	
		update_option('acx_csma_restrict_role', $acx_csma_restrict_role);
	}
	else
	{
		$acx_csma_restrict_role = array();
		if(!is_serialized($acx_csma_restrict_role))
		{
			$acx_csma_restrict_role = serialize($acx_csma_restrict_role); 
		}
		update_option('acx_csma_restrict_role', $acx_csma_restrict_role);
	}
	
	//************************************************template 1 ********************************************
$acx_csma_appearence_array=acx_csma_get_db_array_value(); 

	$acx_csma_background_image1=$_POST['acx_csma_background_image1'];
	$acx_csma_background_image1 = acx_csma_text_before_save_hook_fn('acx_csma_background_image1',$acx_csma_background_image1);
	if($acx_csma_background_image1==""){$acx_csma_background_image1=$acx_csma_appearence_array['1']['acx_csma_background_image1'] ;}
	if(ISSET($_POST['acx_csma_logo_choice1']))
	{
	$acx_csma_logo_choice1=$_POST['acx_csma_logo_choice1'];
	$acx_csma_logo_choice1 = acx_csma_text_before_save_hook_fn('acx_csma_logo_choice1',$acx_csma_logo_choice1);
	}
	else{
		if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array['1'])){
			$acx_csma_logo_choice1=$acx_csma_appearence_array['1']['acx_csma_logo_choice'];
		}else{
		$acx_csma_logo_choice1='image';
		}
	}
	$acx_csma_logo1=$_POST['acx_csma_logo1'];
	$acx_csma_logo1 = acx_csma_text_before_save_hook_fn('acx_csma_logo1',$acx_csma_logo1);
	if($acx_csma_logo1==""){$acx_csma_logo1=$acx_csma_appearence_array['1']['acx_csma_logo1'];}
	$acx_csma_logo_text1=$_POST['acx_csma_logo_text1'];
	$acx_csma_logo_text1 = acx_csma_text_before_save_hook_fn('acx_csma_logo_text1',$acx_csma_logo_text1);
	$acx_csma_logo_text_color1=$_POST['acx_csma_logo_text_color1'];
	$acx_csma_logo_text_color1 = acx_csma_text_before_save_hook_fn('acx_csma_logo_text_color1',$acx_csma_logo_text_color1);
	if($acx_csma_logo_text_color1==""){$acx_csma_logo_text_color1=$acx_csma_appearence_array['1']['acx_csma_logo_text_color1'];}
	$acx_csma_title1=$_POST['acx_csma_title1'];
	$acx_csma_title1 = acx_csma_text_before_save_hook_fn('acx_csma_title1',$acx_csma_title1);
	$acx_csma_title_color1=$_POST['acx_csma_title_color1'];
	$acx_csma_title_color1 = acx_csma_text_before_save_hook_fn('acx_csma_title_color1',$acx_csma_title_color1);
	
	if($acx_csma_title_color1==""){$acx_csma_title_color1=$acx_csma_appearence_array['1']['acx_csma_title_color1'];}
	$acx_csma_subtitle_text1=$_POST['acx_csma_subtitle_text1'];
	$acx_csma_subtitle_text1 = acx_csma_text_before_save_hook_fn('acx_csma_subtitle_text1',$acx_csma_subtitle_text1);
	$acx_csma_subtitle_color1=$_POST['acx_csma_subtitle_color1'];
	$acx_csma_subtitle_color1 = acx_csma_text_before_save_hook_fn('acx_csma_subtitle_color1',$acx_csma_subtitle_color1);
	if($acx_csma_subtitle_color1==""){$acx_csma_subtitle_color1=$acx_csma_appearence_array['1']['acx_csma_subtitle_color1'];}
	$acx_csma_custom_html_top_temp1=$_POST['acx_csma_custom_html_top_temp1'];
	$acx_csma_custom_html_top_temp1 = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_top_temp1', $acx_csma_custom_html_top_temp1);
	$acx_csma_custom_html_bottom_temp1=$_POST['acx_csma_custom_html_bottom_temp1'];
	$acx_csma_custom_html_bottom_temp1 = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_bottom_temp1', $acx_csma_custom_html_bottom_temp1);
	$acx_csma_inside_bg_color1=$_POST['acx_csma_inside_bg_color1'];
	$acx_csma_inside_bg_color1 = acx_csma_text_before_save_hook_fn('acx_csma_inside_bg_color1',$acx_csma_inside_bg_color1);
	if($acx_csma_inside_bg_color1==""){$acx_csma_inside_bg_color1=$acx_csma_appearence_array['1']['acx_csma_inside_bg_color1'];}
	$acx_csma_inside_title1=$_POST['acx_csma_inside_title1'];
	$acx_csma_inside_title1 = acx_csma_text_before_save_hook_fn('acx_csma_inside_title1',$acx_csma_inside_title1);
	$acx_csma_custom_html_top_temp1_title = $_POST['acx_csma_custom_html_top_temp1_title'];
	$acx_csma_custom_html_top_temp1_title = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_top_temp1_title', $acx_csma_custom_html_top_temp1_title);
	
	$acx_csma_inside_title_color1=$_POST['acx_csma_inside_title_color1'];
	$acx_csma_inside_title_color1 = acx_csma_text_before_save_hook_fn('acx_csma_inside_title_color1',$acx_csma_inside_title_color1);
	if($acx_csma_inside_title_color1==""){	$acx_csma_inside_title_color1=$acx_csma_appearence_array['1']['acx_csma_inside_title_color1'];}
	$acx_csma_show_timer1=$_POST['acx_csma_show_timer1'];
	$acx_csma_show_timer1 = acx_csma_text_before_save_hook_fn('acx_csma_show_timer1',$acx_csma_show_timer1);
	if($acx_csma_show_timer1==""){	$acx_csma_show_timer1=$acx_csma_appearence_array['1']['acx_csma_show_timer1'];}
	$acx_csma_timer_bg_color1=sanitize_text_field($_POST['acx_csma_timer_bg_color1']);
	$acx_csma_timer_bg_color1 = acx_csma_text_before_save_hook_fn('acx_csma_timer_bg_color1',$acx_csma_timer_bg_color1);
	if($acx_csma_timer_bg_color1==""){	$acx_csma_timer_bg_color1=$acx_csma_appearence_array['1']['acx_csma_timer_bg_color1'];}
	$acx_csma_timer_iptext_color1=sanitize_text_field($_POST['acx_csma_timer_iptext_color1']);
	$acx_csma_timer_iptext_color1 = acx_csma_text_before_save_hook_fn('acx_csma_timer_iptext_color1',$acx_csma_timer_iptext_color1);
	if($acx_csma_timer_iptext_color1==""){$acx_csma_timer_iptext_color1=$acx_csma_appearence_array['1']['acx_csma_timer_iptext_color1'];}
	$acx_csma_timer_input_bg_color1=sanitize_text_field($_POST['acx_csma_timer_input_bg_color1']);
	$acx_csma_timer_input_bg_color1 = acx_csma_text_before_save_hook_fn('acx_csma_timer_input_bg_color1',$acx_csma_timer_input_bg_color1);
	if($acx_csma_timer_input_bg_color1==""){$acx_csma_timer_input_bg_color1=$acx_csma_appearence_array['1']['acx_csma_timer_input_bg_color1'];}
	$acx_csma_timer_head_color1=sanitize_text_field($_POST['acx_csma_timer_head_color1']);
	$acx_csma_timer_head_color1 = acx_csma_text_before_save_hook_fn('acx_csma_timer_head_color1',$acx_csma_timer_head_color1);
	if($acx_csma_timer_head_color1==""){$acx_csma_timer_head_color1=$acx_csma_appearence_array['1']['acx_csma_timer_head_color1'];}
	
	$acx_csma_show_subscription=sanitize_text_field($_POST['acx_csma_show_subscription']);
	
	if($acx_csma_show_subscription==""){	$acx_csma_show_subscription=$acx_csma_appearence_array['1']['acx_csma_show_subscription'];}
		$acx_csma_show_subscription_name=sanitize_text_field($_POST['acx_csma_show_subscription_name']);
	
	if($acx_csma_show_subscription_name==""){	$acx_csma_show_subscription_name=$acx_csma_appearence_array['1']['acx_csma_show_subscription_name'];}
	
	$acx_csma_custom_html_top_sub1=$_POST['acx_csma_custom_html_top_sub1'];
	$acx_csma_custom_html_top_sub1 = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_top_sub1', $acx_csma_custom_html_top_sub1);
	
	$acx_csma_custom_html_bottom_sub1=$_POST['acx_csma_custom_html_bottom_sub1'];
	$acx_csma_custom_html_bottom_sub1 = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_bottom_sub1', $acx_csma_custom_html_bottom_sub1);
	$acx_csma_subscribe_bg_color1=$_POST['acx_csma_subscribe_bg_color1'];
	$acx_csma_subscribe_bg_color1 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_bg_color1',$acx_csma_subscribe_bg_color1);
	if($acx_csma_subscribe_bg_color1==""){$acx_csma_subscribe_bg_color1=$acx_csma_appearence_array['1']['acx_csma_subscribe_bg_color1'];}
	$acx_csma_subscribe_btn_text1=$_POST['acx_csma_subscribe_btn_text1'];
	$acx_csma_subscribe_btn_text1 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_btn_text1',$acx_csma_subscribe_btn_text1);
	if($acx_csma_subscribe_btn_text1==""){$acx_csma_subscribe_btn_text1=$acx_csma_appearence_array['1']['acx_csma_subscribe_btn_text1'];}
	$acx_csma_subscribe_btn_text_color1=$_POST['acx_csma_subscribe_btn_text_color1'];
	$acx_csma_subscribe_btn_text_color1 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_btn_text_color1',$acx_csma_subscribe_btn_text_color1);
	if($acx_csma_subscribe_btn_text_color1==""){$acx_csma_subscribe_btn_text_color1=$acx_csma_appearence_array['1']['acx_csma_subscribe_btn_text_color1'];}
	$acx_csma_subscribe_btn_color1=$_POST['acx_csma_subscribe_btn_color1'];
	$acx_csma_subscribe_btn_color1 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_btn_color1',$acx_csma_subscribe_btn_color1);
	if($acx_csma_subscribe_btn_color1==""){$acx_csma_subscribe_btn_color1=$acx_csma_appearence_array['1']['acx_csma_subscribe_btn_color1'];}
	$acx_csma_subscribe_btn_hover_color1=$_POST['acx_csma_subscribe_btn_hover_color1'];
	$acx_csma_subscribe_btn_hover_color1 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_btn_hover_color1',$acx_csma_subscribe_btn_hover_color1);
	if($acx_csma_subscribe_btn_hover_color1==""){$acx_csma_subscribe_btn_hover_color1=$acx_csma_appearence_array['1']['acx_csma_subscribe_btn_hover_color1'];}
	$acx_csma_subscribe_btn_hover_bgcolor1=$_POST['acx_csma_subscribe_btn_hover_bgcolor1'];
	$acx_csma_subscribe_btn_hover_bgcolor1 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_btn_hover_bgcolor1',$acx_csma_subscribe_btn_hover_bgcolor1);
	if($acx_csma_subscribe_btn_hover_bgcolor1==""){$acx_csma_subscribe_btn_hover_bgcolor1=$acx_csma_appearence_array['1']['acx_csma_subscribe_btn_hover_bgcolor1'];}
	$acx_csma_subscribe_title1=$_POST['acx_csma_subscribe_title1'];
	$acx_csma_subscribe_title1 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_title1',$acx_csma_subscribe_title1);
	$acx_csma_subscribe_title_color1=$_POST['acx_csma_subscribe_title_color1'];
	$acx_csma_subscribe_title_color1 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_title_color1',$acx_csma_subscribe_title_color1);
	if($acx_csma_subscribe_title_color1==""){$acx_csma_subscribe_title_color1=$acx_csma_appearence_array['1']['acx_csma_subscribe_title_color1'];}
	$acx_csma_subscribe_success1=$_POST['acx_csma_subscribe_success1'];
	$acx_csma_subscribe_success1 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_success1',$acx_csma_subscribe_success1);
	if($acx_csma_subscribe_success1==""){$acx_csma_subscribe_success1=$acx_csma_appearence_array['1']['acx_csma_subscribe_success1'];}
	$acx_csma_subscribe_invalid1=$_POST['acx_csma_subscribe_invalid1'];
	$acx_csma_subscribe_invalid1 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_invalid1',$acx_csma_subscribe_invalid1);
	if($acx_csma_subscribe_invalid1==""){$acx_csma_subscribe_invalid1=$acx_csma_appearence_array['1']['acx_csma_subscribe_invalid1'];}
	$acx_csma_footer_bgcolor1=$_POST['acx_csma_footer_bgcolor1'];
	$acx_csma_footer_bgcolor1 = acx_csma_text_before_save_hook_fn('acx_csma_footer_bgcolor1',$acx_csma_footer_bgcolor1);
	if($acx_csma_footer_bgcolor1==""){$acx_csma_footer_bgcolor1=$acx_csma_appearence_array['1']['acx_csma_footer_bgcolor1'];}
	$acx_csma_footer_text1=$_POST['acx_csma_footer_text1'];
	$acx_csma_footer_text1 = acx_csma_text_before_save_hook_fn('acx_csma_footer_text1',$acx_csma_footer_text1);
	$acx_csma_footer_text_color1=$_POST['acx_csma_footer_text_color1'];
	$acx_csma_footer_text_color1 = acx_csma_text_before_save_hook_fn('acx_csma_footer_text_color1',$acx_csma_footer_text_color1);
	if($acx_csma_footer_text_color1==""){$acx_csma_footer_text_color1=$acx_csma_appearence_array['1']['acx_csma_footer_text_color1'];}
	
	$acx_csma_custom_css_temp1=$_POST['acx_csma_custom_css_temp1'];
	$acx_csma_custom_css_temp1 = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_css_temp1', $acx_csma_custom_css_temp1);
	// **************************************template 2**************************************
	$acx_csma_bg_color2 = sanitize_text_field($_POST['acx_csma_bg_color2']);if($acx_csma_bg_color2==""){$acx_csma_bg_color2=$acx_csma_appearence_array['2']['acx_csma_bg_color2'];}

	if(ISSET($_POST['acx_csma_logo_choice2']))
	{
	$acx_csma_logo_choice2=sanitize_text_field($_POST['acx_csma_logo_choice2']);
	}
	else{
		if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array['2'])){
			$acx_csma_logo_choice2=$acx_csma_appearence_array['2']['acx_csma_logo_choice'];
		}else{
		$acx_csma_logo_choice2='image';
		}
	}
	
	$acx_csma_logo2 = $_POST['acx_csma_logo2'];
	$acx_csma_logo2 = acx_csma_text_before_save_hook_fn('acx_csma_logo2',$acx_csma_logo2);
	
	if($acx_csma_logo2==""){$acx_csma_logo2= $acx_csma_appearence_array['2']['acx_csma_logo2'];}
	$acx_csma_logo_text2=$_POST['acx_csma_logo_text2'];
		$acx_csma_logo_text2 = acx_csma_text_before_save_hook_fn('acx_csma_logo_text2',$acx_csma_logo_text2);
	$acx_csma_logo_text_color2=$_POST['acx_csma_logo_text_color2'];
		$acx_csma_logo_text_color2 = acx_csma_text_before_save_hook_fn('acx_csma_logo_text_color2',$acx_csma_logo_text_color2);
	if($acx_csma_logo_text_color2==""){$acx_csma_logo_text_color2=$acx_csma_appearence_array['2']['acx_csma_logo_text_color2'];}
	$acx_csma_title2=$_POST['acx_csma_title2'];
		$acx_csma_title2 = acx_csma_text_before_save_hook_fn('acx_csma_title2',$acx_csma_title2);
	$acx_csma_title_color2=$_POST['acx_csma_title_color2'];
		$acx_csma_title_color2 = acx_csma_text_before_save_hook_fn('acx_csma_title_color2',$acx_csma_title_color2);
	if($acx_csma_title_color2==""){$acx_csma_title_color2=$acx_csma_appearence_array['2']['acx_csma_title_color2'];}
	$acx_csma_subtitle_text2=$_POST['acx_csma_subtitle_text2'];
		$acx_csma_subtitle_text2 = acx_csma_text_before_save_hook_fn('acx_csma_subtitle_text2',$acx_csma_subtitle_text2);
	$acx_csma_subtitle_color2=$_POST['acx_csma_subtitle_color2'];
		$acx_csma_subtitle_color2 = acx_csma_text_before_save_hook_fn('acx_csma_subtitle_color2',$acx_csma_subtitle_color2);
	if($acx_csma_subtitle_color2==""){$acx_csma_subtitle_color2=$acx_csma_appearence_array['2']['acx_csma_subtitle_color2'];}
	$acx_csma_inside_bg_color2=$_POST['acx_csma_inside_bg_color2'];
		$acx_csma_inside_bg_color2 = acx_csma_text_before_save_hook_fn('acx_csma_inside_bg_color2',$acx_csma_inside_bg_color2);
	if($acx_csma_inside_bg_color2==""){$acx_csma_inside_bg_color2=$acx_csma_appearence_array['2']['acx_csma_inside_bg_color2'];}
	$acx_csma_show_timer2=$_POST['acx_csma_show_timer2'];
		$acx_csma_show_timer2 = acx_csma_text_before_save_hook_fn('acx_csma_show_timer2',$acx_csma_show_timer2);
	if($acx_csma_show_timer2==""){	$acx_csma_show_timer2=$acx_csma_appearence_array['2']['acx_csma_show_timer2'];}
$acx_csma_show_subscription2=$_POST['acx_csma_show_subscription2'];
	$acx_csma_show_subscription2 = acx_csma_text_before_save_hook_fn('acx_csma_show_subscription2',$acx_csma_show_subscription2);
if($acx_csma_show_subscription2==""){	$acx_csma_show_subscription2=$acx_csma_appearence_array['2']['acx_csma_show_subscription2'];}
$acx_csma_show_subscription_name2=$_POST['acx_csma_show_subscription_name2'];
	$acx_csma_show_subscription_name2 = acx_csma_text_before_save_hook_fn('acx_csma_show_subscription_name2',$acx_csma_show_subscription_name2);
if($acx_csma_show_subscription_name2==""){	$acx_csma_show_subscription_name2=$acx_csma_appearence_array['2']['acx_csma_show_subscription_name2'];}

$acx_csma_subscribe_btn_text2=$_POST['acx_csma_subscribe_btn_text2'];
$acx_csma_subscribe_btn_text2 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_btn_text2',$acx_csma_subscribe_btn_text2);
if($acx_csma_subscribe_btn_text2==""){$acx_csma_subscribe_btn_text2=$acx_csma_appearence_array['2']['acx_csma_subscribe_btn_text2'];}
	$acx_csma_timer_title2=$_POST['acx_csma_timer_title2'];
		$acx_csma_timer_title2 = acx_csma_text_before_save_hook_fn('acx_csma_timer_title2',$acx_csma_timer_title2);

$acx_csma_timer_title_color2=$_POST['acx_csma_timer_title_color2'];
		$acx_csma_timer_title_color2 = acx_csma_text_before_save_hook_fn('acx_csma_timer_title_color2',$acx_csma_timer_title_color2);
	if($acx_csma_timer_title_color2==""){$acx_csma_timer_title_color2=$acx_csma_appearence_array['2']['acx_csma_timer_title_color2'];}
	$acx_csma_subscribe_btn_color2=$_POST['acx_csma_subscribe_btn_color2'];
		$acx_csma_subscribe_btn_color2 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_btn_color2',$acx_csma_subscribe_btn_color2);
	if($acx_csma_subscribe_btn_color2==""){$acx_csma_subscribe_btn_color2=$acx_csma_appearence_array['2']['acx_csma_subscribe_btn_color2'];}
	$acx_csma_subscribe_success2=$_POST['acx_csma_subscribe_success2'];
	
		$acx_csma_subscribe_success2 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_success2',$acx_csma_subscribe_success2);
	if($acx_csma_subscribe_success2==""){$acx_csma_subscribe_success2=$acx_csma_appearence_array['2']['acx_csma_subscribe_success2'];}
	$acx_csma_subscribe_invalid2=$_POST['acx_csma_subscribe_invalid2'];
		$acx_csma_subscribe_invalid2 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_invalid2',$acx_csma_subscribe_invalid2);
	if($acx_csma_subscribe_invalid2==""){$acx_csma_subscribe_invalid2=$acx_csma_appearence_array['2']['acx_csma_subscribe_invalid2'];}
	
	$acx_csma_custom_html_above_timer=$_POST['acx_csma_custom_html_above_timer'];
	$acx_csma_custom_html_above_timer = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_above_timer', $acx_csma_custom_html_above_timer);
	$acx_csma_custom_html_top_timer=$_POST['acx_csma_custom_html_top_timer'];
	$acx_csma_custom_html_top_timer = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_top_timer', $acx_csma_custom_html_top_timer);
	$acx_csma_timer_input_bg_color2=$_POST['acx_csma_timer_input_bg_color2'];
		$acx_csma_timer_input_bg_color2 = acx_csma_text_before_save_hook_fn('acx_csma_timer_input_bg_color2',$acx_csma_timer_input_bg_color2);
	if($acx_csma_timer_input_bg_color2==""){$acx_csma_timer_input_bg_color2=$acx_csma_appearence_array['2']['acx_csma_timer_input_bg_color2'];}
	$acx_csma_timer_iptext_color2=$_POST['acx_csma_timer_iptext_color2'];
	$acx_csma_timer_iptext_color2 = acx_csma_text_before_save_hook_fn('acx_csma_timer_iptext_color2',$acx_csma_timer_iptext_color2);
	if($acx_csma_timer_iptext_color2==""){$acx_csma_timer_iptext_color2=$acx_csma_appearence_array['2']['acx_csma_timer_iptext_color2'];}
	$acx_csma_timer_head_color2=$_POST['acx_csma_timer_head_color2'];
	$acx_csma_timer_head_color2 = acx_csma_text_before_save_hook_fn('acx_csma_timer_head_color2',$acx_csma_timer_head_color2);
	if($acx_csma_timer_head_color2==""){$acx_csma_timer_head_color2=$acx_csma_appearence_array['2']['acx_csma_timer_head_color2'];}
	$acx_csma_custom_html_top_temp2=$_POST['acx_csma_custom_html_top_temp2'];
	$acx_csma_custom_html_top_temp2 = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_top_temp2', $acx_csma_custom_html_top_temp2);
	$acx_csma_desc_title2=$_POST['acx_csma_desc_title2'];
	$acx_csma_desc_title2 = acx_csma_text_before_save_hook_fn('acx_csma_desc_title2',$acx_csma_desc_title2);
	$acx_csma_desc_subtitle2=$_POST['acx_csma_desc_subtitle2'];
	$acx_csma_desc_subtitle2 = acx_csma_textarea_before_save_hook_function('acx_csma_desc_subtitle2', $acx_csma_desc_subtitle2);
	$acx_csma_desc_text_color2=$_POST['acx_csma_desc_text_color2'];
	$acx_csma_desc_text_color2 = acx_csma_text_before_save_hook_fn('acx_csma_desc_text_color2',$acx_csma_desc_text_color2);
	if($acx_csma_desc_text_color2==""){$acx_csma_desc_text_color2=$acx_csma_appearence_array['2']['acx_csma_desc_text_color2'];}
	$acx_csma_desc_content_color2=$_POST['acx_csma_desc_content_color2'];
	$acx_csma_desc_content_color2 = acx_csma_text_before_save_hook_fn('acx_csma_desc_content_color2',$acx_csma_desc_content_color2);
	if($acx_csma_desc_content_color2==""){$acx_csma_desc_content_color2=$acx_csma_appearence_array['2']['acx_csma_desc_content_color2'];}
	$acx_csma_social_link_color2=$_POST['acx_csma_social_link_color2'];
	$acx_csma_social_link_color2 = acx_csma_text_before_save_hook_fn('acx_csma_social_link_color2',$acx_csma_social_link_color2);
	if($acx_csma_social_link_color2==""){$acx_csma_social_link_color2=$acx_csma_appearence_array['2']['acx_csma_social_link_color2'];}
	$acx_csma_social_link_title2 = $_POST['acx_csma_social_link_title2'];
	$acx_csma_social_link_title2 = acx_csma_text_before_save_hook_fn('acx_csma_social_link_title2',$acx_csma_social_link_title2);
	
	$acx_csma_fb_link2=esc_url_raw($_POST['acx_csma_fb_link2']);
	$acx_csma_twitter_link2=esc_url_raw($_POST['acx_csma_twitter_link2']);
	$acx_csma_linkedin_link2=esc_url_raw($_POST['acx_csma_linkedin_link2']);
	$acx_csma_custom_css_temp2=$_POST['acx_csma_custom_css_temp2'];
	$acx_csma_custom_css_temp2 = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_css_temp2', $acx_csma_custom_css_temp2);
	//***********************************template 3*************************
	if(ISSET($_POST['acx_csma_logo_choice3']))
	{
	$acx_csma_logo_choice3=$_POST['acx_csma_logo_choice3'];
	$acx_csma_logo_choice3 = acx_csma_text_before_save_hook_fn('acx_csma_logo_choice3',$acx_csma_logo_choice3);
	}
	else{
		if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array['3'])){
			$acx_csma_logo_choice3=$acx_csma_appearence_array['3']['acx_csma_logo_choice'];
		}else{
		$acx_csma_logo_choice3='image';
		}
	}
	
	$acx_csma_logo3=$_POST['acx_csma_logo3'];
	$acx_csma_logo3 = acx_csma_text_before_save_hook_fn('acx_csma_logo3',$acx_csma_logo3);
	if($acx_csma_logo3==""){$acx_csma_logo3= $acx_csma_appearence_array['3']['acx_csma_logo3'];}
	$acx_csma_logo_text3=$_POST['acx_csma_logo_text3'];
	$acx_csma_logo_text3 = acx_csma_text_before_save_hook_fn('acx_csma_logo_text3',$acx_csma_logo_text3);
	$acx_csma_logo_text_color3=sanitize_text_field($_POST['acx_csma_logo_text_color3']);
	$acx_csma_logo_text_color3 = acx_csma_text_before_save_hook_fn('acx_csma_logo_text_color3',$acx_csma_logo_text_color3);
	if($acx_csma_logo_text_color3==""){$acx_csma_logo_text_color3=$acx_csma_appearence_array['3']['acx_csma_logo_text_color3'];}
	$acx_csma_title3=$_POST['acx_csma_title3'];
	$acx_csma_title3 = acx_csma_text_before_save_hook_fn('acx_csma_title3',$acx_csma_title3);
	$acx_csma_title_color3= $_POST['acx_csma_title_color3'];
	$acx_csma_title_color3 = acx_csma_text_before_save_hook_fn('acx_csma_title_color3',$acx_csma_title_color3);
	if($acx_csma_title_color3==""){$acx_csma_title_color3=$acx_csma_appearence_array['3']['acx_csma_title_color3'];}
	$acx_csma_subtitle_text3= $_POST['acx_csma_subtitle_text3'];
	$acx_csma_subtitle_text3 = acx_csma_text_before_save_hook_fn('acx_csma_subtitle_text3',$acx_csma_subtitle_text3);
	$acx_csma_subtitle_color3= $_POST['acx_csma_subtitle_color3'];
	$acx_csma_subtitle_color3 = acx_csma_text_before_save_hook_fn('acx_csma_subtitle_color3',$acx_csma_subtitle_color3);
	if($acx_csma_subtitle_color3==""){$acx_csma_subtitle_color3=$acx_csma_appearence_array['3']['acx_csma_subtitle_color3'];}
	
	$acx_csma_primary_color3= $_POST['acx_csma_primary_color3'];
	$acx_csma_primary_color3 = acx_csma_text_before_save_hook_fn('acx_csma_primary_color3',$acx_csma_primary_color3);
	if($acx_csma_primary_color3==""){$acx_csma_primary_color3=$acx_csma_appearence_array['3']['acx_csma_primary_color3'];}
	
	$acx_csma_secondary_color3= $_POST['acx_csma_secondary_color3'];
	$acx_csma_secondary_color3 = acx_csma_text_before_save_hook_fn('acx_csma_secondary_color3',$acx_csma_secondary_color3);
	if($acx_csma_secondary_color3==""){$acx_csma_secondary_color3=$acx_csma_appearence_array['3']['acx_csma_secondary_color3'];}
	
	$acx_csma_left_bar_color3= $_POST['acx_csma_left_bar_color3'];
	$acx_csma_left_bar_color3 = acx_csma_text_before_save_hook_fn('acx_csma_left_bar_color3',$acx_csma_left_bar_color3);
	if($acx_csma_left_bar_color3==""){$acx_csma_left_bar_color3=$acx_csma_appearence_array['3']['acx_csma_left_bar_color3'];}
	
	$acx_csma_timer_color3= $_POST['acx_csma_timer_color3'];
	$acx_csma_timer_color3 = acx_csma_text_before_save_hook_fn('acx_csma_timer_color3',$acx_csma_timer_color3);
	if($acx_csma_timer_color3==""){$acx_csma_timer_color3=$acx_csma_appearence_array['3']['acx_csma_timer_color3'];}
	
	$acx_csma_subscribe_title3= $_POST['acx_csma_subscribe_title3'];
	$acx_csma_subscribe_title3 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_title3',$acx_csma_subscribe_title3);
	
	$acx_csma_subscribe_title_color3= $_POST['acx_csma_subscribe_title_color3'];
	$acx_csma_subscribe_title_color3 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_title_color3',$acx_csma_subscribe_title_color3);
	if($acx_csma_subscribe_title_color3==""){$acx_csma_subscribe_title_color3=$acx_csma_appearence_array['3']['acx_csma_subscribe_title_color3'];}
	$acx_csma_show_subscription3=$_POST['acx_csma_show_subscription3'];
	$acx_csma_show_subscription3 = acx_csma_text_before_save_hook_fn('acx_csma_show_subscription3',$acx_csma_show_subscription3);
	if($acx_csma_show_subscription3==""){	$acx_csma_show_subscription3=$acx_csma_appearence_array['3']['acx_csma_show_subscription3'];}
		$acx_csma_show_subscription_name3=sanitize_text_field($_POST['acx_csma_show_subscription_name3']);
	
	if($acx_csma_show_subscription_name3==""){	$acx_csma_show_subscription_name3=$acx_csma_appearence_array['3']['acx_csma_show_subscription_name3'];}
	$acx_csma_show_timer3=$_POST['acx_csma_show_timer3'];
	$acx_csma_show_timer3 = acx_csma_text_before_save_hook_fn('acx_csma_show_timer3',$acx_csma_show_timer3);
	if($acx_csma_show_timer3==""){	$acx_csma_show_timer3=$acx_csma_appearence_array['3']['acx_csma_show_timer3'];}
	$acx_csma_subscribe_btn_text3=$_POST['acx_csma_subscribe_btn_text3'];
	$acx_csma_subscribe_btn_text3 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_btn_text3',$acx_csma_subscribe_btn_text3);
	if($acx_csma_subscribe_btn_text3==""){$acx_csma_subscribe_btn_text3=$acx_csma_appearence_array['3']['acx_csma_subscribe_btn_text3'];}
	$acx_csma_subscribe_btn_text_color3=$_POST['acx_csma_subscribe_btn_text_color3'];
	$acx_csma_subscribe_btn_text_color3 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_btn_text_color3',$acx_csma_subscribe_btn_text_color3);
	if($acx_csma_subscribe_btn_text_color3==""){$acx_csma_subscribe_btn_text_color3=$acx_csma_appearence_array['3']['acx_csma_subscribe_btn_text_color3'];}
	$acx_csma_subscribe_btn_color3=$_POST['acx_csma_subscribe_btn_color3'];
	$acx_csma_subscribe_btn_color3 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_btn_color3',$acx_csma_subscribe_btn_color3);
	if($acx_csma_subscribe_btn_color3==""){$acx_csma_subscribe_btn_color3=$acx_csma_appearence_array['3']['acx_csma_subscribe_btn_color3'];}
	$acx_csma_subscribe_btn_hover_color3=$_POST['acx_csma_subscribe_btn_hover_color3'];
	$acx_csma_subscribe_btn_hover_color3 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_btn_hover_color3',$acx_csma_subscribe_btn_hover_color3);
	if($acx_csma_subscribe_btn_hover_color3==""){$acx_csma_subscribe_btn_hover_color3=$acx_csma_appearence_array['3']['acx_csma_subscribe_btn_hover_color3'];}
	$acx_csma_subscribe_btn_hover_bgcolor3=$_POST['acx_csma_subscribe_btn_hover_bgcolor3'];
	$acx_csma_subscribe_btn_hover_bgcolor3 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_btn_hover_bgcolor3',$acx_csma_subscribe_btn_hover_bgcolor3);
	if($acx_csma_subscribe_btn_hover_bgcolor3==""){$acx_csma_subscribe_btn_hover_bgcolor3=$acx_csma_appearence_array['3']['acx_csma_subscribe_btn_hover_bgcolor3'];}
	$acx_csma_subscribe_success3=$_POST['acx_csma_subscribe_success3'];
	$acx_csma_subscribe_success3 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_success3',$acx_csma_subscribe_success3);
	if($acx_csma_subscribe_success3==""){$acx_csma_subscribe_success3=$acx_csma_appearence_array['3']['acx_csma_subscribe_success3'];}
	$acx_csma_subscribe_invalid3=$_POST['acx_csma_subscribe_invalid3'];
	$acx_csma_subscribe_invalid3 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_invalid3',$acx_csma_subscribe_invalid3);
	if($acx_csma_subscribe_invalid3==""){$acx_csma_subscribe_invalid3=$acx_csma_appearence_array['3']['acx_csma_subscribe_invalid3'];}
	$acx_csma_inside_title3= $_POST['acx_csma_inside_title3'];
	$acx_csma_inside_title3 = acx_csma_text_before_save_hook_fn('acx_csma_inside_title3',$acx_csma_inside_title3);
	$acx_csma_inside_title_color3= $_POST['acx_csma_inside_title_color3'];
	$acx_csma_inside_title_color3 = acx_csma_text_before_save_hook_fn('acx_csma_inside_title_color3',$acx_csma_inside_title_color3);
	if($acx_csma_inside_title_color3==""){$acx_csma_inside_title_color3=$acx_csma_appearence_array['3']['acx_csma_inside_title_color3'];}
	$acx_csma_timer_iptext_color3= $_POST['acx_csma_timer_iptext_color3'];
	$acx_csma_timer_iptext_color3 = acx_csma_text_before_save_hook_fn('acx_csma_timer_iptext_color3',$acx_csma_timer_iptext_color3);
	if($acx_csma_timer_iptext_color3==""){$acx_csma_timer_iptext_color3=$acx_csma_appearence_array['3']['acx_csma_timer_iptext_color3'];}
	$acx_csma_timer_head_color3= $_POST['acx_csma_timer_head_color3'];
	$acx_csma_timer_head_color3 = acx_csma_text_before_save_hook_fn('acx_csma_timer_head_color3',$acx_csma_timer_head_color3);
	if($acx_csma_timer_head_color3==""){$acx_csma_timer_head_color3=$acx_csma_appearence_array['3']['acx_csma_timer_head_color3'];}
	$acx_csma_custom_html_top_temp3=$_POST['acx_csma_custom_html_top_temp3'];
	$acx_csma_custom_html_top_temp3 = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_top_temp3', $acx_csma_custom_html_top_temp3);
	$acx_csma_custom_html_top_timer_temp3=$_POST['acx_csma_custom_html_top_timer_temp3'];
	$acx_csma_custom_html_top_timer_temp3 = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_top_timer_temp3', $acx_csma_custom_html_top_timer_temp3);
	$acx_csma_custom_html_bottom_temp3=$_POST['acx_csma_custom_html_bottom_temp3'];
	$acx_csma_custom_html_bottom_temp3 = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_bottom_temp3', $acx_csma_custom_html_bottom_temp3);
	$acx_csma_desc_title3= $_POST['acx_csma_desc_title3'];
	$acx_csma_desc_title3 = acx_csma_text_before_save_hook_fn('acx_csma_desc_title3',$acx_csma_desc_title3);
	$acx_csma_desc_subtitle3=$_POST['acx_csma_desc_subtitle3'];
	$acx_csma_desc_subtitle3 = acx_csma_textarea_before_save_hook_function('acx_csma_desc_subtitle3', $acx_csma_desc_subtitle3);
	$acx_csma_desc_text_color3= $_POST['acx_csma_desc_text_color3'];
	$acx_csma_desc_text_color3 = acx_csma_text_before_save_hook_fn('acx_csma_desc_text_color3',$acx_csma_desc_text_color3);
	
	if($acx_csma_desc_text_color3==""){$acx_csma_desc_text_color3=$acx_csma_appearence_array['3']['acx_csma_desc_text_color3'];}
	$acx_csma_desc_content_color3= $_POST['acx_csma_desc_content_color3'];
	$acx_csma_desc_content_color3 = acx_csma_text_before_save_hook_fn('acx_csma_desc_content_color3',$acx_csma_desc_content_color3);
	
	if($acx_csma_desc_content_color3==""){$acx_csma_desc_content_color3=$acx_csma_appearence_array['3']['acx_csma_desc_content_color3'];}
	
	$acx_csma_footer_text3= $_POST['acx_csma_footer_text3'];
	$acx_csma_footer_text3 = acx_csma_text_before_save_hook_fn('acx_csma_footer_text3',$acx_csma_footer_text3);
	$acx_csma_footer_color3 = $_POST['acx_csma_footer_color3'];
	$acx_csma_footer_color3 = acx_csma_text_before_save_hook_fn('acx_csma_footer_color3',$acx_csma_footer_color3);
	if($acx_csma_footer_color3==""){$acx_csma_footer_color3=$acx_csma_appearence_array['3']['acx_csma_footer_color3'];}
	$acx_csma_social_link_title3=$_POST['acx_csma_social_link_title3'];
	$acx_csma_social_link_title3 = acx_csma_text_before_save_hook_fn('acx_csma_social_link_title3',$acx_csma_social_link_title3);
	$acx_csma_social_link_title_color3=$_POST['acx_csma_social_link_title_color3'];
	$acx_csma_social_link_title_color3 = acx_csma_text_before_save_hook_fn('acx_csma_social_link_title_color3',$acx_csma_social_link_title_color3);
	if($acx_csma_social_link_title_color3==""){$acx_csma_social_link_title_color3=$acx_csma_appearence_array['3']['acx_csma_social_link_title_color3'];}
	$acx_csma_fb_link3=esc_url_raw($_POST['acx_csma_fb_link3']);
	$acx_csma_twitter_link3=esc_url_raw($_POST['acx_csma_twitter_link3']);
	$acx_csma_linkedin_link3=esc_url_raw($_POST['acx_csma_linkedin_link3']);
	$acx_csma_custom_css_temp3=$_POST['acx_csma_custom_css_temp3'];
	$acx_csma_custom_css_temp3 = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_css_temp3', $acx_csma_custom_css_temp3);
	//********************************template 4***********************************
	$acx_csma_background_image4=$_POST['acx_csma_background_image4'];
	$acx_csma_background_image4 = acx_csma_text_before_save_hook_fn('acx_csma_background_image4',$acx_csma_background_image4);
	if($acx_csma_background_image4==""){$acx_csma_background_image4=$acx_csma_appearence_array['4']['acx_csma_background_image4'];}
	if(ISSET($_POST['acx_csma_logo_choice4']))
	{
	$acx_csma_logo_choice4=$_POST['acx_csma_logo_choice4'];
	$acx_csma_logo_choice4 = acx_csma_text_before_save_hook_fn('acx_csma_logo_choice4',$acx_csma_logo_choice4);
	}
	else{
		if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array['4'])){
			$acx_csma_logo_choice4=$acx_csma_appearence_array['4']['acx_csma_logo_choice'];
		}else{
		$acx_csma_logo_choice4='image';
		}
	}
	$acx_csma_logo4=$_POST['acx_csma_logo4'];
	$acx_csma_logo4 = acx_csma_text_before_save_hook_fn('acx_csma_logo4',$acx_csma_logo4);
	if($acx_csma_logo4==""){$acx_csma_logo4=$acx_csma_appearence_array['4']['acx_csma_logo4'];}
	$acx_csma_logo_text4=$_POST['acx_csma_logo_text4'];
	$acx_csma_logo_text_color4=$_POST['acx_csma_logo_text_color4'];
	$acx_csma_logo_text_color4 = acx_csma_text_before_save_hook_fn('acx_csma_logo_text_color4',$acx_csma_logo_text_color4);
	if($acx_csma_logo_text_color4==""){$acx_csma_logo_text_color4=$acx_csma_appearence_array['4']['acx_csma_logo_text_color4'];}
	$acx_csma_inside_bg_color4=$_POST['acx_csma_inside_bg_color4'];
	$acx_csma_inside_bg_color4 = acx_csma_text_before_save_hook_fn('acx_csma_inside_bg_color4',$acx_csma_inside_bg_color4);
	if($acx_csma_inside_bg_color4==""){$acx_csma_inside_bg_color4=$acx_csma_appearence_array['4']['acx_csma_inside_bg_color4'];}
	$acx_csma_title4=$_POST['acx_csma_title4'];
	$acx_csma_title4 = acx_csma_text_before_save_hook_fn('acx_csma_title4',$acx_csma_title4);
	$acx_csma_custom_html_top_temp4=$_POST['acx_csma_custom_html_top_temp4'];
	$acx_csma_custom_html_top_temp4 = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_top_temp4', $acx_csma_custom_html_top_temp4);
	$acx_csma_title_color4=$_POST['acx_csma_title_color4'];
	$acx_csma_title_color4 = acx_csma_text_before_save_hook_fn('acx_csma_title_color4',$acx_csma_title_color4);
	if($acx_csma_title_color4==""){$acx_csma_title_color4=$acx_csma_appearence_array['4']['acx_csma_title_color4'];}
	$acx_csma_show_timer4=$_POST['acx_csma_show_timer4'];
	$acx_csma_show_timer4 = acx_csma_text_before_save_hook_fn('acx_csma_show_timer4',$acx_csma_show_timer4);
	if($acx_csma_show_timer4==""){	$acx_csma_show_timer4=$acx_csma_appearence_array['4']['acx_csma_show_timer4'];}
	$acx_csma_timer_iptext_color4=$_POST['acx_csma_timer_iptext_color4'];
	$acx_csma_timer_iptext_color4 = acx_csma_text_before_save_hook_fn('acx_csma_timer_iptext_color4',$acx_csma_timer_iptext_color4);
	if($acx_csma_timer_iptext_color4==""){$acx_csma_timer_iptext_color4=$acx_csma_appearence_array['4']['acx_csma_timer_iptext_color4'];;}
	$acx_csma_timer_head_color4=$_POST['acx_csma_timer_head_color4'];
	$acx_csma_timer_head_color4 = acx_csma_text_before_save_hook_fn('acx_csma_timer_head_color4',$acx_csma_timer_head_color4);
	if($acx_csma_timer_head_color4==""){$acx_csma_timer_head_color4=$acx_csma_appearence_array['4']['acx_csma_timer_head_color4'];}
	$acx_csma_show_progressbar4=$_POST['acx_csma_show_progressbar4'];
	$acx_csma_show_progressbar4 = acx_csma_text_before_save_hook_fn('acx_csma_show_progressbar4',$acx_csma_show_progressbar4);
	if($acx_csma_show_progressbar4==""){	$acx_csma_show_progressbar4=$acx_csma_appearence_array['4']['acx_csma_show_progressbar4'];}
	$acx_csma_progress_bar_color4=$_POST['acx_csma_progress_bar_color4'];
	$acx_csma_progress_bar_color4 = acx_csma_text_before_save_hook_fn('acx_csma_progress_bar_color4',$acx_csma_progress_bar_color4);
	if($acx_csma_progress_bar_color4==""){$acx_csma_progress_bar_color4=$acx_csma_appearence_array['4']['acx_csma_progress_bar_color4'];}
	$acx_csma_progress_bar_bg_color4=$_POST['acx_csma_progress_bar_bg_color4'];
	$acx_csma_progress_bar_bg_color4 = acx_csma_text_before_save_hook_fn('acx_csma_progress_bar_bg_color4',$acx_csma_progress_bar_bg_color4);
	if($acx_csma_progress_bar_bg_color4==""){$acx_csma_progress_bar_bg_color4=$acx_csma_appearence_array['4']['acx_csma_progress_bar_bg_color4'];}
	$acx_csma_progress_bar_text_color4=$_POST['acx_csma_progress_bar_text_color4'];
	$acx_csma_progress_bar_text_color4 = acx_csma_text_before_save_hook_fn('acx_csma_progress_bar_text_color4',$acx_csma_progress_bar_text_color4);
	if($acx_csma_progress_bar_text_color4==""){$acx_csma_progress_bar_text_color4=$acx_csma_appearence_array['4']['acx_csma_progress_bar_text_color4'];}
	$acx_csma_custom_html_bottom_temp4=$_POST['acx_csma_custom_html_bottom_temp4'];
	$acx_csma_custom_html_bottom_temp4 = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_bottom_temp4', $acx_csma_custom_html_bottom_temp4);
	$acx_csma_show_subscription4=$_POST['acx_csma_show_subscription4'];
	$acx_csma_show_subscription4 = acx_csma_text_before_save_hook_fn('acx_csma_show_subscription4',$acx_csma_show_subscription4);
	if($acx_csma_show_subscription4==""){	$acx_csma_show_subscription4=$acx_csma_appearence_array['4']['acx_csma_show_subscription4'];}
	$acx_csma_show_subscription_name4=sanitize_text_field($_POST['acx_csma_show_subscription_name4']);
	
	if($acx_csma_show_subscription_name4==""){	$acx_csma_show_subscription_name4=$acx_csma_appearence_array['4']['acx_csma_show_subscription_name4'];}
	$acx_csma_show_timer3=$_POST['acx_csma_show_timer3'];
	$acx_csma_subscription_title4=$_POST['acx_csma_subscription_title4'];
	$acx_csma_subscription_title4 = acx_csma_text_before_save_hook_fn('acx_csma_subscription_title4',$acx_csma_subscription_title4);
	$acx_csma_subscription_title_color4=$_POST['acx_csma_subscription_title_color4'];
	$acx_csma_subscription_title_color4 = acx_csma_text_before_save_hook_fn('acx_csma_subscription_title_color4',$acx_csma_subscription_title_color4);
	if($acx_csma_subscription_title_color4==""){$acx_csma_subscription_title_color4=$acx_csma_appearence_array['4']['acx_csma_subscription_title_color4'];}
	$acx_csma_subscribe_success4=$_POST['acx_csma_subscribe_success4'];
	$acx_csma_subscribe_success4 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_success4',$acx_csma_subscribe_success4);
	if($acx_csma_subscribe_success4==""){$acx_csma_subscribe_success4=$acx_csma_appearence_array['4']['acx_csma_subscribe_success4'];}
	$acx_csma_subscribe_invalid4=$_POST['acx_csma_subscribe_invalid4'];
	$acx_csma_subscribe_invalid4 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_invalid4',$acx_csma_subscribe_invalid4);
	if($acx_csma_subscribe_invalid4==""){$acx_csma_subscribe_invalid4=$acx_csma_appearence_array['4']['acx_csma_subscribe_invalid4'];}
	$acx_csma_custom_html_subscrpt_below_sub4=$_POST['acx_csma_custom_html_subscrpt_below_sub4'];
	$acx_csma_custom_html_subscrpt_below_sub4 = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_subscrpt_below_sub4', $acx_csma_custom_html_subscrpt_below_sub4);
	$acx_csma_subscription_btn_text4=$_POST['acx_csma_subscription_btn_text4'];
	$acx_csma_subscription_btn_text4 = acx_csma_text_before_save_hook_fn('acx_csma_subscription_btn_text4',$acx_csma_subscription_btn_text4);
	$acx_csma_subscription_btn_color4=$_POST['acx_csma_subscription_btn_color4'];
	$acx_csma_subscription_btn_color4 = acx_csma_text_before_save_hook_fn('acx_csma_subscription_btn_color4',$acx_csma_subscription_btn_color4);
	if($acx_csma_subscription_btn_color4==""){$acx_csma_subscription_btn_color4=$acx_csma_appearence_array['4']['acx_csma_subscription_btn_color4'];}
	$acx_csma_subscription_btn_bg_color4=$_POST['acx_csma_subscription_btn_bg_color4'];
	$acx_csma_subscription_btn_bg_color4 = acx_csma_text_before_save_hook_fn('acx_csma_subscription_btn_bg_color4',$acx_csma_subscription_btn_bg_color4);
	if($acx_csma_subscription_btn_bg_color4==""){$acx_csma_subscription_btn_bg_color4=$acx_csma_appearence_array['4']['acx_csma_subscription_btn_bg_color4'];}
	
	$acx_csma_fb_link4=esc_url_raw($_POST['acx_csma_fb_link4']);
	$acx_csma_twitter_link4=esc_url_raw($_POST['acx_csma_twitter_link4']);
	$acx_csma_linkedin_link4=esc_url_raw($_POST['acx_csma_linkedin_link4']);
	$acx_csma_custom_css_temp4=$_POST['acx_csma_custom_css_temp4'];
	$acx_csma_custom_css_temp4 = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_css_temp4', $acx_csma_custom_css_temp4);
	//********************************template5*********************************
	$acx_csma_bgcolor5=$_POST['acx_csma_bgcolor5'];
	$acx_csma_bgcolor5 = acx_csma_text_before_save_hook_fn('acx_csma_bgcolor5',$acx_csma_bgcolor5);if($acx_csma_bgcolor5==""){$acx_csma_bgcolor5=$acx_csma_appearence_array['5']['acx_csma_bgcolor5'];}
	if(ISSET($_POST['acx_csma_logo_choice5']))
	{
	$acx_csma_logo_choice5=$_POST['acx_csma_logo_choice5'];
	$acx_csma_logo_choice5 = acx_csma_text_before_save_hook_fn('acx_csma_logo_choice5',$acx_csma_logo_choice5);
	}
	else{
		if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array['5'])){
			$acx_csma_logo_choice5=$acx_csma_appearence_array['5']['acx_csma_logo_choice'];
		}else{
		$acx_csma_logo_choice5='image';
		}
	}
	$acx_csma_logo5=$_POST['acx_csma_logo5'];
	$acx_csma_logo5 = acx_csma_text_before_save_hook_fn('acx_csma_logo5',$acx_csma_logo5);
	if($acx_csma_logo5==""){$acx_csma_logo5=$acx_csma_appearence_array['5']['acx_csma_logo5'];}
	$acx_csma_logo_text5=$_POST['acx_csma_logo_text5'];
	$acx_csma_logo_text5 = acx_csma_text_before_save_hook_fn('acx_csma_logo_text5',$acx_csma_logo_text5);
	$acx_csma_logo_text_color5=$_POST['acx_csma_logo_text_color5'];
	$acx_csma_logo_text_color5 = acx_csma_text_before_save_hook_fn('acx_csma_logo_text_color5',$acx_csma_logo_text_color5);
	if($acx_csma_logo_text_color5==""){$acx_csma_logo_text_color5=$acx_csma_appearence_array['5']['acx_csma_logo_text_color5'];}
	$acx_csma_inside_bg_color5=$_POST['acx_csma_inside_bg_color5'];
	$acx_csma_inside_bg_color5 = acx_csma_text_before_save_hook_fn('acx_csma_inside_bg_color5',$acx_csma_inside_bg_color5);
	if($acx_csma_inside_bg_color5==""){$acx_csma_inside_bg_color5=$acx_csma_appearence_array['5']['acx_csma_inside_bg_color5'];}
	$acx_csma_title5=$_POST['acx_csma_title5'];
	$acx_csma_title5 = acx_csma_text_before_save_hook_fn('acx_csma_title5',$acx_csma_title5);
	$acx_csma_title_color5=$_POST['acx_csma_title_color5'];
	$acx_csma_title_color5 = acx_csma_text_before_save_hook_fn('acx_csma_title_color5',$acx_csma_title_color5);
	if($acx_csma_title_color5==""){$acx_csma_title_color5=$acx_csma_appearence_array['5']['acx_csma_title_color5'];}
	$acx_csma_custom_html_top_temp5=$_POST['acx_csma_custom_html_top_temp5'];
	$acx_csma_custom_html_top_temp5 = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_top_temp5', $acx_csma_custom_html_top_temp5);
	$acx_csma_show_timer5=$_POST['acx_csma_show_timer5'];
	$acx_csma_show_timer5 = acx_csma_text_before_save_hook_fn('acx_csma_show_timer5',$acx_csma_show_timer5);
	if($acx_csma_show_timer5==""){$acx_csma_show_timer5=$acx_csma_show_timer5['5']['acx_csma_show_timer5'];}
	$acx_csma_timer_iptext_color5=$_POST['acx_csma_timer_iptext_color5'];
	$acx_csma_timer_iptext_color5 = acx_csma_text_before_save_hook_fn('acx_csma_timer_iptext_color5',$acx_csma_timer_iptext_color5);
	if($acx_csma_timer_iptext_color5==""){$acx_csma_timer_iptext_color5=$acx_csma_appearence_array['5']['acx_csma_timer_iptext_color5'];}
	$acx_csma_timer_head_color5=$_POST['acx_csma_timer_head_color5'];
	$acx_csma_timer_head_color5 = acx_csma_text_before_save_hook_fn('acx_csma_timer_head_color5',$acx_csma_timer_head_color5);
	if($acx_csma_timer_head_color5==""){$acx_csma_timer_head_color5=$acx_csma_appearence_array['5']['acx_csma_timer_head_color5'];}
	$acx_csma_show_progressbar5=$_POST['acx_csma_show_progressbar5'];
	$acx_csma_show_progressbar5 = acx_csma_text_before_save_hook_fn('acx_csma_show_progressbar5',$acx_csma_show_progressbar5);
	if($acx_csma_show_progressbar5==""){$acx_csma_show_progressbar5=$acx_csma_appearence_array['5']['acx_csma_show_progressbar5'];}
	$acx_csma_progress_bar_color5=$_POST['acx_csma_progress_bar_color5'];
	$acx_csma_progress_bar_color5 = acx_csma_text_before_save_hook_fn('acx_csma_progress_bar_color5',$acx_csma_progress_bar_color5);
	if($acx_csma_progress_bar_color5==""){$acx_csma_progress_bar_color5=$acx_csma_appearence_array['5']['acx_csma_progress_bar_color5'];}
	$acx_csma_progress_bar_bg_color5=$_POST['acx_csma_progress_bar_bg_color5'];
	$acx_csma_progress_bar_bg_color5 = acx_csma_text_before_save_hook_fn('acx_csma_progress_bar_bg_color5',$acx_csma_progress_bar_bg_color5);
	if($acx_csma_progress_bar_bg_color5==""){$acx_csma_progress_bar_bg_color5=$acx_csma_appearence_array['5']['acx_csma_progress_bar_bg_color5'];}
	$acx_csma_progress_bar_text_color5=$_POST['acx_csma_progress_bar_text_color5'];
	$acx_csma_progress_bar_text_color5 = acx_csma_text_before_save_hook_fn('acx_csma_progress_bar_text_color5',$acx_csma_progress_bar_text_color5);
	if($acx_csma_progress_bar_text_color5==""){$acx_csma_progress_bar_text_color5=$acx_csma_appearence_array['5']['acx_csma_progress_bar_text_color5'];}
	$acx_csma_custom_html_bottom_temp5=$_POST['acx_csma_custom_html_bottom_temp5'];
	$acx_csma_custom_html_bottom_temp5 = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_bottom_temp5', $acx_csma_custom_html_bottom_temp5);
	$acx_csma_subscribe_bg_color5=$_POST['acx_csma_subscribe_bg_color5'];
	$acx_csma_subscribe_bg_color5 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_bg_color5',$acx_csma_subscribe_bg_color5);
	if($acx_csma_subscribe_bg_color5==""){$acx_csma_subscribe_bg_color5=$acx_csma_appearence_array['5']['acx_csma_subscribe_bg_color5'];}
	$acx_csma_launch_title_color5=$_POST['acx_csma_launch_title_color5'];
	$acx_csma_launch_title_color5 = acx_csma_text_before_save_hook_fn('acx_csma_launch_title_color5',$acx_csma_launch_title_color5);
	if($acx_csma_launch_title_color5==""){$acx_csma_launch_title_color5=$acx_csma_appearence_array['5']['acx_csma_launch_title_color5'];}
	$acx_csma_show_subscription5=$_POST['acx_csma_show_subscription5'];
	$acx_csma_show_subscription5 = acx_csma_text_before_save_hook_fn('acx_csma_show_subscription5',$acx_csma_show_subscription5);
	if($acx_csma_show_subscription5==""){	$acx_csma_show_subscription5=$acx_csma_appearence_array['5']['acx_csma_show_subscription5'];}
	$acx_csma_show_subscription_name5=sanitize_text_field($_POST['acx_csma_show_subscription_name5']);
	
	if($acx_csma_show_subscription_name5==""){	$acx_csma_show_subscription_name5=$acx_csma_appearence_array['5']['acx_csma_show_subscription_name5'];}
	$acx_csma_subscribe_btn_text5=$_POST['acx_csma_subscribe_btn_text5'];
	$acx_csma_subscribe_btn_text5 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_btn_text5',$acx_csma_subscribe_btn_text5);
	if($acx_csma_subscribe_btn_text5==""){	$acx_csma_subscribe_btn_text5=$acx_csma_appearence_array['5']['acx_csma_subscribe_btn_text5'];}
	$acx_csma_custom_html_top_sub=$_POST['acx_csma_custom_html_top_sub'];
	$acx_csma_custom_html_top_sub = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_top_sub', $acx_csma_custom_html_top_sub);
	$acx_csma_custom_html_bottom_sub=$_POST['acx_csma_custom_html_bottom_sub'];
	$acx_csma_custom_html_bottom_sub = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_bottom_sub', $acx_csma_custom_html_bottom_sub);
	$acx_csma_subscribe_main_title5=$_POST['acx_csma_subscribe_main_title5'];
	$acx_csma_subscribe_main_title5 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_main_title5',$acx_csma_subscribe_main_title5);
	$acx_csma_subscribe_title5=$_POST['acx_csma_subscribe_title5'];
	$acx_csma_subscribe_title5 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_title5',$acx_csma_subscribe_title5);
	$acx_csma_subscribe_success5=$_POST['acx_csma_subscribe_success5'];
	$acx_csma_subscribe_success5 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_success5',$acx_csma_subscribe_success5);
	if($acx_csma_subscribe_success5==""){$acx_csma_subscribe_success5=$acx_csma_appearence_array['5']['acx_csma_subscribe_success5'];}
	$acx_csma_subscribe_invalid5=$_POST['acx_csma_subscribe_invalid5'];
	$acx_csma_subscribe_invalid5 = acx_csma_text_before_save_hook_fn('acx_csma_subscribe_invalid5',$acx_csma_subscribe_invalid5);
	if($acx_csma_subscribe_invalid5==""){$acx_csma_subscribe_invalid5=$acx_csma_appearence_array['5']['acx_csma_subscribe_invalid5'];}
	$acx_csma_fb_link5=esc_url_raw($_POST['acx_csma_fb_link5']);
	$acx_csma_twitter_link5=esc_url_raw($_POST['acx_csma_twitter_link5']);
	$acx_csma_linkedin_link5=esc_url_raw($_POST['acx_csma_linkedin_link5']);
	$acx_csma_custom_css_temp5=$_POST['acx_csma_custom_css_temp5'];
	$acx_csma_custom_css_temp5 = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_css_temp5', $acx_csma_custom_css_temp5);
	
	$acx_csma_template=$_POST['acx_csma_template'];
	if($acx_csma_template==""){$acx_csma_template=1;}
	update_option('acx_csma_template',$acx_csma_template);
	if($acx_csma_template > 0 && $acx_csma_template < 6)
	{
		update_option('acx_csma_base_template',$acx_csma_template);
	}
	$acx_csma_auto_launch=$_POST['acx_csma_auto_launch'];
	if($acx_csma_auto_launch==""){$acx_csma_auto_launch = 0;}
	update_option('acx_csma_auto_launch',$acx_csma_auto_launch);
	if($acx_csma_template == 0)
	{
		$acx_csma_custom_html_val = $_POST['acx_csma_custom_html_val'];
		$acx_csma_custom_html_val = acx_csma_custom_html_before_save_hook_fn('acx_csma_custom_html_val', $acx_csma_custom_html_val);
		update_option('acx_csma_custom_html_val',$acx_csma_custom_html_val);
	}	
	else if($acx_csma_template==1)
	{
		$acx_csma_appearence_array=acx_csma_get_db_array_value(); 
			if (isset($acx_csma_appearence_array[$acx_csma_template]))
			{
				$acx_csma_appearence_array[$acx_csma_template] = 
										array(
							'acx_csma_background_image1'=>$acx_csma_background_image1,
							'acx_csma_logo_choice'=>$acx_csma_logo_choice1,
							'acx_csma_logo1'=>$acx_csma_logo1,
							'acx_csma_logo_text1' =>$acx_csma_logo_text1,
							'acx_csma_logo_text_color1' =>$acx_csma_logo_text_color1,
							'acx_csma_title1'=>$acx_csma_title1,
							'acx_csma_title_color1'=>$acx_csma_title_color1,
							'acx_csma_subtitle_text1'=>$acx_csma_subtitle_text1,
							'acx_csma_subtitle_color1'=>$acx_csma_subtitle_color1,
							'acx_csma_custom_html_top_temp1'=>$acx_csma_custom_html_top_temp1,
							'acx_csma_inside_bg_color1'=>$acx_csma_inside_bg_color1,
							'acx_csma_inside_title1'=>$acx_csma_inside_title1,
							'acx_csma_custom_html_top_temp1_title'=>$acx_csma_custom_html_top_temp1_title,
							'acx_csma_inside_title_color1'=>$acx_csma_inside_title_color1,
							'acx_csma_custom_html_bottom_temp1'=>$acx_csma_custom_html_bottom_temp1,
							'acx_csma_show_timer1'=>$acx_csma_show_timer1,
							'acx_csma_timer_bg_color1'=>$acx_csma_timer_bg_color1,
							'acx_csma_timer_iptext_color1'=>$acx_csma_timer_iptext_color1,
							'acx_csma_timer_head_color1'=>$acx_csma_timer_head_color1,
							'acx_csma_timer_input_bg_color1'=>$acx_csma_timer_input_bg_color1,
							'acx_csma_show_subscription'=>$acx_csma_show_subscription,
							'acx_csma_show_subscription_name'=>$acx_csma_show_subscription_name,
							'acx_csma_custom_html_top_sub1'=>$acx_csma_custom_html_top_sub1,
							'acx_csma_custom_html_bottom_sub1'=>$acx_csma_custom_html_bottom_sub1,
							'acx_csma_subscribe_bg_color1'=>$acx_csma_subscribe_bg_color1,
							'acx_csma_subscribe_btn_text1'=>$acx_csma_subscribe_btn_text1,
							'acx_csma_subscribe_btn_text_color1'=>$acx_csma_subscribe_btn_text_color1,
							'acx_csma_subscribe_btn_color1'=>$acx_csma_subscribe_btn_color1,
							'acx_csma_subscribe_btn_hover_color1'=>$acx_csma_subscribe_btn_hover_color1,
							'acx_csma_subscribe_btn_hover_bgcolor1'=>$acx_csma_subscribe_btn_hover_bgcolor1,
							'acx_csma_subscribe_title1'=>$acx_csma_subscribe_title1,
							'acx_csma_subscribe_title_color1'=>$acx_csma_subscribe_title_color1,
							'acx_csma_subscribe_success1'=>$acx_csma_subscribe_success1,
							'acx_csma_subscribe_invalid1'=>$acx_csma_subscribe_invalid1,
							'acx_csma_footer_bgcolor1'=>$acx_csma_footer_bgcolor1,
							'acx_csma_footer_text1'=>$acx_csma_footer_text1,
							'acx_csma_footer_text_color1'=>$acx_csma_footer_text_color1,
							'acx_csma_custom_css_temp1'=>$acx_csma_custom_css_temp1
											);
			}
		acx_csma_update_array_value($acx_csma_appearence_array);
	}
	else if($acx_csma_template==2)
	{
		$acx_csma_appearence_array=acx_csma_get_db_array_value(); 
			if (isset($acx_csma_appearence_array[$acx_csma_template]))
			{
				$acx_csma_appearence_array[$acx_csma_template] = 
						array(
							'acx_csma_bg_color2'=>$acx_csma_bg_color2,
							'acx_csma_logo_choice'=>$acx_csma_logo_choice2,
							'acx_csma_logo2'=>$acx_csma_logo2,
							'acx_csma_logo_text2' =>$acx_csma_logo_text2,
							'acx_csma_logo_text_color2' =>$acx_csma_logo_text_color2,
							'acx_csma_title2'=>$acx_csma_title2,
							'acx_csma_title_color2'=>$acx_csma_title_color2,
							'acx_csma_subtitle_text2'=>$acx_csma_subtitle_text2,
							'acx_csma_subtitle_color2'=>$acx_csma_subtitle_color2,
							'acx_csma_inside_bg_color2'=>$acx_csma_inside_bg_color2,
							'acx_csma_custom_html_top_timer'=>$acx_csma_custom_html_top_timer,
							'acx_csma_show_subscription2'=>$acx_csma_show_subscription2,
							'acx_csma_show_subscription_name2'=>$acx_csma_show_subscription_name2,
							'acx_csma_subscribe_btn_text2'=>$acx_csma_subscribe_btn_text2,
							'acx_csma_custom_html_above_timer'=>$acx_csma_custom_html_above_timer,
							'acx_csma_show_timer2'=>$acx_csma_show_timer2,
							'acx_csma_timer_title2'=>$acx_csma_timer_title2,
							'acx_csma_timer_title_color2'=>$acx_csma_timer_title_color2,
							'acx_csma_subscribe_btn_color2'=>$acx_csma_subscribe_btn_color2,
							'acx_csma_subscribe_success2'=>$acx_csma_subscribe_success2,
							'acx_csma_subscribe_invalid2'=>$acx_csma_subscribe_invalid2,
							'acx_csma_timer_input_bg_color2'=>$acx_csma_timer_input_bg_color2,
							'acx_csma_timer_iptext_color2'=>$acx_csma_timer_iptext_color2,
							'acx_csma_timer_head_color2'=>$acx_csma_timer_head_color2,
							'acx_csma_custom_html_top_temp2'=>$acx_csma_custom_html_top_temp2,
							'acx_csma_desc_title2'=>$acx_csma_desc_title2,
							'acx_csma_desc_subtitle2'=>$acx_csma_desc_subtitle2,
							'acx_csma_desc_text_color2'=>$acx_csma_desc_text_color2,
							'acx_csma_desc_content_color2'=>$acx_csma_desc_content_color2,
							'acx_csma_social_link_title2'=>$acx_csma_social_link_title2,
							'acx_csma_social_link_color2'=>$acx_csma_social_link_color2,
							'acx_csma_fb_link2'=>$acx_csma_fb_link2,
							'acx_csma_twitter_link2'=>$acx_csma_twitter_link2,
							'acx_csma_linkedin_link2'=>$acx_csma_linkedin_link2,
							'acx_csma_custom_css_temp2'=>$acx_csma_custom_css_temp2
							);
			}
		acx_csma_update_array_value($acx_csma_appearence_array);
	}
	else if($acx_csma_template==3)
	{
		$acx_csma_appearence_array=acx_csma_get_db_array_value(); 
			if (isset($acx_csma_appearence_array[$acx_csma_template]))
			{
				$acx_csma_appearence_array[$acx_csma_template] = 
						array(
							'acx_csma_logo_choice'=>$acx_csma_logo_choice3,
							'acx_csma_logo3'=>$acx_csma_logo3,
							'acx_csma_logo_text3' =>$acx_csma_logo_text3,
							'acx_csma_logo_text_color3' =>$acx_csma_logo_text_color3,
							'acx_csma_title3'=>$acx_csma_title3,
							'acx_csma_title_color3'=>$acx_csma_title_color3,
							'acx_csma_subtitle_text3'=>$acx_csma_subtitle_text3,
							'acx_csma_subtitle_color3'=>$acx_csma_subtitle_color3,
							'acx_csma_primary_color3'=>$acx_csma_primary_color3,
							'acx_csma_secondary_color3'=>$acx_csma_secondary_color3,
							'acx_csma_left_bar_color3'=>$acx_csma_left_bar_color3,
							'acx_csma_timer_color3'=>$acx_csma_timer_color3,
							'acx_csma_subscribe_title3'=>$acx_csma_subscribe_title3,
							'acx_csma_subscribe_title_color3'=>$acx_csma_subscribe_title_color3,
							'acx_csma_subscribe_btn_text3'=>$acx_csma_subscribe_btn_text3,
							'acx_csma_subscribe_btn_text_color3'=>$acx_csma_subscribe_btn_text_color3,
							'acx_csma_subscribe_btn_color3'=>$acx_csma_subscribe_btn_color3,
							'acx_csma_subscribe_btn_hover_color3'=>$acx_csma_subscribe_btn_hover_color3,
							'acx_csma_subscribe_btn_hover_bgcolor3'=>$acx_csma_subscribe_btn_hover_bgcolor3,
							'acx_csma_subscribe_success3'=>$acx_csma_subscribe_success3,
							'acx_csma_subscribe_invalid3'=>$acx_csma_subscribe_invalid3,
							'acx_csma_inside_title3'=>$acx_csma_inside_title3,
							'acx_csma_show_subscription3'=>$acx_csma_show_subscription3,
							'acx_csma_show_subscription_name3'=>$acx_csma_show_subscription_name3,
							'acx_csma_show_timer3'=>$acx_csma_show_timer3,
							'acx_csma_inside_title_color3'=>$acx_csma_inside_title_color3,
							'acx_csma_timer_iptext_color3'=>$acx_csma_timer_iptext_color3,
							'acx_csma_timer_head_color3'=>$acx_csma_timer_head_color3,
							'acx_csma_custom_html_top_temp3'=>$acx_csma_custom_html_top_temp3,
							'acx_csma_custom_html_bottom_temp3'=>$acx_csma_custom_html_bottom_temp3,
							'acx_csma_custom_html_top_timer_temp3'=>$acx_csma_custom_html_top_timer_temp3,
							'acx_csma_desc_title3'=>$acx_csma_desc_title3,
							'acx_csma_desc_subtitle3'=>$acx_csma_desc_subtitle3,
							'acx_csma_desc_text_color3'=>$acx_csma_desc_text_color3,
							'acx_csma_desc_content_color3'=>$acx_csma_desc_content_color3,
							'acx_csma_footer_text3'=>$acx_csma_footer_text3,
							'acx_csma_footer_color3'=>$acx_csma_footer_color3,
							'acx_csma_social_link_title3'=>$acx_csma_social_link_title3,
							'acx_csma_social_link_title_color3'=>$acx_csma_social_link_title_color3,
							'acx_csma_fb_link3'=>$acx_csma_fb_link3,
							'acx_csma_twitter_link3'=>$acx_csma_twitter_link3,
							'acx_csma_linkedin_link3'=>$acx_csma_linkedin_link3,
							'acx_csma_custom_css_temp3'=>$acx_csma_custom_css_temp3
						);
			}
		acx_csma_update_array_value($acx_csma_appearence_array);
	}
	else if($acx_csma_template==4)
	{
		$acx_csma_appearence_array=acx_csma_get_db_array_value(); 
			if (isset($acx_csma_appearence_array[$acx_csma_template]))
			{
				$acx_csma_appearence_array[$acx_csma_template] = 
						array(
							'acx_csma_background_image4'=>$acx_csma_background_image4,
							'acx_csma_logo_choice'=>$acx_csma_logo_choice4,
							'acx_csma_logo4'=>$acx_csma_logo4,
							'acx_csma_logo_text4' =>$acx_csma_logo_text4,
							'acx_csma_logo_text_color4' =>$acx_csma_logo_text_color4,
							'acx_csma_inside_bg_color4'=>$acx_csma_inside_bg_color4,
							'acx_csma_title4'=>$acx_csma_title4,
							'acx_csma_custom_html_top_temp4'=>$acx_csma_custom_html_top_temp4,
							'acx_csma_title_color4'=>$acx_csma_title_color4,
							'acx_csma_show_timer4'=>$acx_csma_show_timer4,
							'acx_csma_timer_iptext_color4'=>$acx_csma_timer_iptext_color4,
							'acx_csma_timer_head_color4'=>$acx_csma_timer_head_color4,
							'acx_csma_show_progressbar4'=>$acx_csma_show_progressbar4,
							'acx_csma_progress_bar_color4'=>$acx_csma_progress_bar_color4,
							'acx_csma_progress_bar_bg_color4'=>$acx_csma_progress_bar_bg_color4,
							'acx_csma_progress_bar_text_color4'=>$acx_csma_progress_bar_text_color4,
							'acx_csma_custom_html_bottom_temp4'=>$acx_csma_custom_html_bottom_temp4,
							'acx_csma_show_subscription4'=>$acx_csma_show_subscription4,
							'acx_csma_show_subscription_name4'=>$acx_csma_show_subscription_name4,
							'acx_csma_subscription_title4'=>$acx_csma_subscription_title4,
							'acx_csma_subscription_title_color4'=>$acx_csma_subscription_title_color4,
							'acx_csma_subscription_btn_text4'=>$acx_csma_subscription_btn_text4,
							'acx_csma_subscription_btn_color4'=>$acx_csma_subscription_btn_color4,
							'acx_csma_subscription_btn_bg_color4'=>$acx_csma_subscription_btn_bg_color4,
							'acx_csma_subscribe_invalid4'=>$acx_csma_subscribe_invalid4,
							'acx_csma_custom_html_subscrpt_below_sub4'=>$acx_csma_custom_html_subscrpt_below_sub4,
							'acx_csma_subscribe_success4'=>$acx_csma_subscribe_success4,
							'acx_csma_fb_link4'=>$acx_csma_fb_link4,
							'acx_csma_twitter_link4'=>$acx_csma_twitter_link4,
							'acx_csma_linkedin_link4'=>$acx_csma_linkedin_link4,
							'acx_csma_custom_css_temp4'=>$acx_csma_custom_css_temp4
							);
			}
		acx_csma_update_array_value($acx_csma_appearence_array);
	}
	else if($acx_csma_template==5)
	{
		$acx_csma_appearence_array=acx_csma_get_db_array_value(); 
			if (isset($acx_csma_appearence_array[$acx_csma_template]))
			{
				$acx_csma_appearence_array[$acx_csma_template]= 
					array(
							'acx_csma_bgcolor5'=>$acx_csma_bgcolor5,
							'acx_csma_logo_choice'=>$acx_csma_logo_choice5,
							'acx_csma_logo5'=>$acx_csma_logo5,
							'acx_csma_logo_text5' =>$acx_csma_logo_text5,
							'acx_csma_logo_text_color5' =>$acx_csma_logo_text_color5,
							'acx_csma_inside_bg_color5'=>$acx_csma_inside_bg_color5,
							'acx_csma_title5'=>$acx_csma_title5,
							'acx_csma_custom_html_top_temp5'=>$acx_csma_custom_html_top_temp5,
							'acx_csma_title_color5'=>$acx_csma_title_color5,
							'acx_csma_show_timer5'=>$acx_csma_show_timer5,
							'acx_csma_timer_iptext_color5'=>$acx_csma_timer_iptext_color5,
							'acx_csma_timer_head_color5'=>$acx_csma_timer_head_color5,
							'acx_csma_show_progressbar5'=>$acx_csma_show_progressbar5,
							'acx_csma_progress_bar_color5'=>$acx_csma_progress_bar_color5,
							'acx_csma_progress_bar_bg_color5'=>$acx_csma_progress_bar_bg_color5,
							'acx_csma_progress_bar_text_color5'=>$acx_csma_progress_bar_text_color5,
							'acx_csma_custom_html_bottom_temp5'=>$acx_csma_custom_html_bottom_temp5,
							'acx_csma_show_subscription5'=>$acx_csma_show_subscription5,
							'acx_csma_show_subscription_name5'=>$acx_csma_show_subscription_name5,
							'acx_csma_subscribe_btn_text5'=>$acx_csma_subscribe_btn_text5,
							'acx_csma_custom_html_top_sub'=>$acx_csma_custom_html_top_sub,
							'acx_csma_custom_html_bottom_sub'=>$acx_csma_custom_html_bottom_sub,
							'acx_csma_subscribe_bg_color5'=>$acx_csma_subscribe_bg_color5,
							'acx_csma_launch_title_color5'=>$acx_csma_launch_title_color5,
							'acx_csma_subscribe_main_title5' =>$acx_csma_subscribe_main_title5,
							'acx_csma_subscribe_title5'=>$acx_csma_subscribe_title5,
							'acx_csma_subscribe_success5'=>$acx_csma_subscribe_success5,
							'acx_csma_subscribe_invalid5'=>$acx_csma_subscribe_invalid5,
							'acx_csma_fb_link5'=>$acx_csma_fb_link5,
							'acx_csma_twitter_link5'=>$acx_csma_twitter_link5,
							'acx_csma_linkedin_link5'=>$acx_csma_linkedin_link5,
							'acx_csma_custom_css_temp5'=>$acx_csma_custom_css_temp5
						);
			}
		acx_csma_update_array_value($acx_csma_appearence_array);
	}
?>
<div class="updated"><p><strong><?php _e('Coming Soon/Maintenance From Acurax Settings Saved!.','coming-soon-maintenance-mode-from-acurax'); ?></strong></p></div>
<script type="text/javascript">
 setTimeout(function(){
		jQuery('.updated').fadeOut('slow');
		
		}, 4000);

</script>
<?php
}
else
{
	acx_csma_hook_function('acx_csma_hook_mainoptions_inside_else_submit');
	// Normal page display
	$acx_csma_meta_title =get_option('acx_csma_meta_title');
	if($acx_csma_meta_title =="")
	{
		$acx_csma_meta_title =__("Under Construction","coming-soon-maintenance-mode-from-acurax");
		update_option('acx_csma_meta_title',$acx_csma_meta_title);
	}
	$acx_csma_meta_description=get_option('acx_csma_meta_description');
	if($acx_csma_meta_description =="")
	{
		$acx_csma_meta_description ="";
		update_option('acx_csma_meta_description',$acx_csma_meta_description);
	}
	$acx_csma_meta_keywords=get_option('acx_csma_meta_keywords');
	if($acx_csma_meta_keywords =="")
	{
		$acx_csma_meta_keywords ="";
		update_option('acx_csma_meta_keywords',$acx_csma_meta_keywords);
	}
	
	$acx_csma_favicon=get_option('acx_csma_favicon');
	if($acx_csma_favicon =="")
	{
		$acx_csma_favicon = ACX_CSMA_BASE_LOCATION . 'images/favicon.png';
		update_option('acx_csma_favicon',$acx_csma_favicon);
	}
		$start_timestamp = current_time('timestamp');
		update_option('acx_csma_start_date_time',$start_timestamp);
		$acx_csma_date_time=get_option('acx_csma_date_time');
	if($acx_csma_date_time == "" || $acx_csma_date_time == '0')
	{
		$timestamp1=current_time('timestamp')+(60*60*24*30); // 30 days
		update_option('acx_csma_date_time',$timestamp1);
	}
	 $acx_csma_ga_trakng_code=get_option('acx_csma_ga_trakng_code');
	
	$acx_csma_ip_list=get_option('acx_csma_ip_list');
	if($acx_csma_ip_list=="")
	{
		$acx_csma_ip_list=array();
	}
	else
	{	 
		if(is_serialized($acx_csma_ip_list))
		{
			$acx_csma_ip_list = unserialize($acx_csma_ip_list); 
		}	 
		if(!is_array($acx_csma_ip_list))
		{
			$acx_csma_ip_list = array();
		}
	}
	update_option('acx_csma_ip_list',$acx_csma_ip_list);
	$acx_csma_restrict_role=get_option('acx_csma_restrict_role');
	if($acx_csma_restrict_role=="")
	{
		$acx_csma_restrict_role=array();
		if(!is_serialized($acx_csma_restrict_role ))
		{
			$acx_csma_restrict_role = serialize($acx_csma_restrict_role); 
		} 
		update_option('acx_csma_restrict_role',$acx_csma_restrict_role);
	}
	
	$acx_csma_appearence_array=acx_csma_get_db_array_value();  
	$acx_csma_template = get_option('acx_csma_template');
	if($acx_csma_template=="")
	{
		$acx_csma_template="1";
		update_option('acx_csma_template',$acx_csma_template);
	}
	$acx_csma_activation_status =get_option('acx_csma_activation_status');
	if($acx_csma_activation_status=="")
	{
		$acx_csma_activation_status = "0";
		update_option('acx_csma_activation_status',$acx_csma_activation_status);
	}
	if(get_option('acx_csma_custom_html_val')=="")
	{
		$acx_csma_custom_html_val = "<html><head><title>".__('Page Under Maintenance','coming-soon-maintenance-mode-from-acurax')."</title></head><body>".__('Sorry, This page is under maintenance.','coming-soon-maintenance-mode-from-acurax')."</body></html>";
	$acx_csma_custom_html_val = trim($acx_csma_custom_html_val);
	
	update_option('acx_csma_custom_html_val',$acx_csma_custom_html_val);
	}
	$acx_csma_auto_launch=get_option('acx_csma_auto_launch'); 
	if($acx_csma_auto_launch=="")
	{
		$acx_csma_auto_launch = 0;
		update_option('acx_csma_auto_launch',$acx_csma_auto_launch);
	}
}
	if(ISSET($_POST['acx_csma_Submit']))
	{
		$acx_csmap_open_all_boxes_default = $_POST['acx_csmap_open_all_boxes_default'];
		update_option('acx_csmap_open_all_boxes_default',$acx_csmap_open_all_boxes_default);
	}
	else{
		$acx_csmap_open_all_boxes_default=get_option('acx_csmap_open_all_boxes_default');
		if($acx_csmap_open_all_boxes_default=="")
		{
			$acx_csmap_open_all_boxes_default = "yes";
			update_option('acx_csmap_open_all_boxes_default',$acx_csmap_open_all_boxes_default);
		}
		
	}
acx_csma_hook_function('acx_csma_hook_mainoptions_outside_if_submit');
?>
<div class="wrap">
<div style='background: white none repeat scroll 0% 0%; height: 100%; margin-top: 5px; border-radius: 15px; min-height: 450px; box-sizing: border-box; margin-left: auto; margin-right: auto; width: 98%; padding: 1%;display: table;'>
<?php acx_csma_hook_function('acx_csma_hook_mainoptions_above_title'); ?>
<?php echo "<h2 class='acx_csma_page_h2'>" . __( 'Acurax Coming Soon / Maintenance Options','coming-soon-maintenance-mode-from-acurax' ) . "</h2>"; ?>
	<form name="acx_csma_form" id="acx_csma_form"  method="post" action="<?php echo esc_url(str_replace( '%7E', '~',$_SERVER['REQUEST_URI'])); ?>"><hr/>
		<table>
		<tr>
		<td><input type="hidden" name="acx_csma_hidden" value="Y"/></td>
		</tr> 
		<tr>
		<td><a id="acx_csma_tab_1" class="acx_csma_tab" onclick="javascript:acx_csma_show_div(1);"><?php _e('General Settings','coming-soon-maintenance-mode-from-acurax'); ?></a></td>
	 	<td><a id="acx_csma_tab_2" class="acx_csma_tab" onclick="javascript:acx_csma_show_div(2);"><?php _e('Appearance Settings','coming-soon-maintenance-mode-from-acurax'); ?></a></td>
		<?php acx_csma_hook_function('acx_csma_hook_mainoptions_add_settings'); ?>
		</tr>
		</table><hr/>
		<div id="acx_csma_tab_block_1" class="acx_csma_tab_block acx_csma_general" style="margin-left:20px;">
			<table>
			<tr>
<?php $acx_csma_activation_status=get_option('acx_csma_activation_status'); 
?>
			<td><?php _e('Status:', 'coming-soon-maintenance-mode-from-acurax'); ?></td>
			<td><input type="radio" id="acx_csma_activate" name="acx_csma_activate"  value="1" <?php if($acx_csma_activation_status=="1"){echo "checked='checked'";}?> />&nbsp;<?php _e('Activate', 'coming-soon-maintenance-mode-from-acurax'); ?>&nbsp;&nbsp;&nbsp;<input type="radio" id="acx_csma_activate" name="acx_csma_activate"  value="0"<?php if($acx_csma_activation_status =="0"){echo "checked='checked'";}?>/>&nbsp;<?php _e('Deactivate', 'coming-soon-maintenance-mode-from-acurax'); ?></td></tr>
			<tr><td><p><?php _e("Page Meta Title: ","coming-soon-maintenance-mode-from-acurax" ); ?></p></td>
			<td><input type="text" name="acx_csma_meta_title" value="<?php echo stripslashes(esc_attr(get_option('acx_csma_meta_title'))); ?>" size="20"/></td>
			</tr>
			<tr><td><p><?php _e("Page Meta Description: ","coming-soon-maintenance-mode-from-acurax" ); ?></p></td>
			<td><input type="text" name="acx_csma_meta_description" value="<?php echo stripslashes(esc_attr(get_option('acx_csma_meta_description'))); ?>" size="20"/></td></tr>
			<tr><td><p><?php _e("Page Meta Keywords: ","coming-soon-maintenance-mode-from-acurax" ); ?></p></td>
			<td><input type="text" name="acx_csma_meta_keywords" value="<?php echo stripslashes(esc_attr(get_option('acx_csma_meta_keywords'))); ?>" size="20"/></td></tr>
			<tr><td><?php _e("Upload Favicon: ","coming-soon-maintenance-mode-from-acurax" ); ?></td>
			<td>
			<?php 
			$favicon_attach_id = get_option('acx_csma_favicon');
			$url = $favicon_attach_id;
			if(is_numeric($favicon_attach_id))
			{
				$fav_icon_attachment_url = parse_url( wp_get_attachment_url($favicon_attach_id) );
				$url    = $fav_icon_attachment_url [ 'scheme' ]  . '://' .rawurlencode( basename( $fav_icon_attachment_url[ 'host' ])). $fav_icon_attachment_url[ 'path' ];
			}
			?>
			<img id="acx_csma_favicon" src="<?php  echo $url; ?>" style="width:20px;height:auto;">
			<input type="hidden" id="acx_csma_favicon_field" name="acx_csma_favicon_field" value="<?php echo $favicon_attach_id; ?>" size="20">
				
			<a id="acx_csma_favicon_button" class="button"><?php _e("Pick a Favicon","coming-soon-maintenance-mode-from-acurax" ); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
			<span><?php _e("Recommended size 16 X 16  ","coming-soon-maintenance-mode-from-acurax" ); ?> </span>
			</td>
			</tr>
			<tr><td><?php _e("Expected Date and Time to end Maintenance mode: ","coming-soon-maintenance-mode-from-acurax" ); $format = "Y/m/d H:i"; ?></td>
			<td>
			<?php 
				$timestamp1=get_option('acx_csma_date_time');
			?>
			<input type="text" value="<?php  print date_i18n($format, $timestamp1); ?>" id="datetimepicker" name="acx_csma_date_time"/>&nbsp;&nbsp; <?php _e("Current Wordpress Time:","coming-soon-maintenance-mode-from-acurax" );?>
			<?php  print date_i18n($format, current_time('timestamp')); ?><br><br></td></tr>
			<tr>
			<td><?php _e("Would you like to end the maintenance mode automatically on the above specified time?: " ,"coming-soon-maintenance-mode-from-acurax" ); ?></td>
			<?php $acx_csma_auto_launch=get_option('acx_csma_auto_launch'); 
			?>
			<td><input type="radio" id="acx_csma_auto_launch" name="acx_csma_auto_launch"  value="1" <?php if($acx_csma_auto_launch=="1"){echo "checked='checked'";}?> />&nbsp;<?php _e('YES', 'coming-soon-maintenance-mode-from-acurax'); ?>&nbsp;&nbsp;&nbsp;<input type="radio" id="acx_csma_auto_launch" name="acx_csma_auto_launch"  value="0"<?php if($acx_csma_auto_launch =="0"){echo "checked='checked'";}?>/>&nbsp;<?php _e('NO', 'coming-soon-maintenance-mode-from-acurax'); ?></td></tr>
			<tr>
			<td><?php _e("Google Analytics Tracking Code: " ); ?></td>
			<td><textarea id="acx_csma_ga_trakng_code" name="acx_csma_ga_trakng_code" placeholder="<?php _e("Google Analytics Tracking Code Here","coming-soon-maintenance-mode-from-acurax");?>"><?php echo stripslashes($acx_csma_ga_trakng_code); ?></textarea></td>
			</tr>
			</table>
			<hr />
			<table>
				<tr><td><b><?php echo "<h4>" . __( 'Access Settings', 'coming-soon-maintenance-mode-from-acurax' ) . "</h4>"; ?></b></td></tr>
				<tr><td><?php _e("Do not show maintenance page for the following IPs:","coming-soon-maintenance-mode-from-acurax"); ?></td></tr>
				<tr>
				<td><p><?php $acx_csma_ip_list=get_option('acx_csma_ip_list');if(is_serialized($acx_csma_ip_list)){$acx_csma_ip_list=unserialize($acx_csma_ip_list);}?>
				<select name="acx_csma_ip_list[]" id="acx_csma_ip_list1" multiple>
				<?php foreach($acx_csma_ip_list as $key =>$value)
				{?>
				<option selected><?php echo $value; ?></option><?php }?>
				</select><br/><br/>
				<?php $acx_csma_real_ip = acx_csma_getrealip(); ?>
				<input type="text" name="acx_csma_txt_ip" id="acx_csma_txt_ip" value="<?php echo $acx_csma_real_ip; ?>"/>
				<input type="button" name="acx_csma_add_list" id="acx_csma_add_list"  class="button" value="<?php _e("Add","coming-soon-maintenance-mode-from-acurax"); ?>" onclick="acx_csma_addNewItem(acx_csma_ip_list1,acx_csma_txt_ip);"/>
				<input  type="button" name="acx_csma_del_list" id="acx_csma_del_list"  class="button" value="<?php _e("Delete","coming-soon-maintenance-mode-from-acurax"); ?>" onClick="acx_csma_removeItem(acx_csma_ip_list1);"/></p>
				</td></tr>
			</table>
	
			<table>
				<tr><td><?php _e("Do not show maintenance page for the following Roles:","coming-soon-maintenance-mode-from-acurax"); ?></td></tr>
<?php 
				$acx_csma_restrict_role=get_option('acx_csma_restrict_role');
				if($acx_csma_restrict_role =="")
				{
					$acx_csma_restrict_role=array();	
				}
				if(is_serialized($acx_csma_restrict_role))
				{
					$acx_csma_restrict_role = unserialize($acx_csma_restrict_role); 
				}
				// get all roles
				global $wp_roles;
				$roles = $wp_roles->get_names();
				foreach($roles as $role) 
				{ 
					if($role!="Administrator")
					{?>
						<tr><td><input type="checkbox" name="acx_csma_restrict_role[]" size="20" value="<?php echo $role; ?>"<?php if(is_array($acx_csma_restrict_role) && in_array($role,$acx_csma_restrict_role)){echo "checked='checked'"; }?>/><?php echo $role; ?></td><tr>
<?php   			}
				}?>
			</table>
			<?php acx_csma_hook_function('acx_csma_hook_mainoptions_below_general_settings'); ?>
		</div><!--acx_csma_tab_block_1-->
		<?php
		global $acx_csma_template_array;
	
	?>
	<div id="acx_csma_tab_block_2" class="acx_csma_tab_block acx_csma_appearence" style="display:none;">
		<h3><?php _e("Choose Your Template","coming-soon-maintenance-mode-from-acurax"); ?></h3>
	<div id="main">
	<?php $acx_csma_template = get_option('acx_csma_template'); 
	$acx_csma_base_template = get_option('acx_csma_base_template');
	foreach($acx_csma_template_array as $key => $value)
	{
		$acx_csma_max_val=$value['id'];
	}
	if($acx_csma_max_val < 6)
	{
		$acx_csma_template = $acx_csma_base_template;
	}
	?>
	<?php
	foreach($acx_csma_template_array as $key => $value)
	{
		if($key !== 0)
		{ 
		
			?>
			<div id="img_holder">
			<label for="<?php echo $value['index']; ?>">
			<img src="<?php echo $value['thumb'].'images/template'.$value['id'].'.png'; ?>"></label><br /><input type="radio" name="acx_csma_template" id="<?php echo $value['index']; ?>" value="<?php echo $value['id']; ?>" <?php if ($acx_csma_template==$value['id']) {echo "checked=checked";} ?> onclick="acx_csma_rdbtn_show_div(<?php echo $value['id']; ?>);"/><?php echo $value['name']." &nbsp;&nbsp;&nbsp;"; ?><a href="<?php echo esc_url($value['path']."?acx_csma_preview=".$value['id']); ?>" target="_blank"><?php _e("Preview","coming-soon-maintenance-mode-from-acurax"); ?></a>
			</div>
			<?php
		}
	}
	foreach($acx_csma_template_array as $key => $value)
	{
		if($key === 0)
		{
			?>
			<div id="img_holder">
			<label for="<?php echo $value['index']; ?>">
			<img src="<?php echo $value['thumb'].'images/template'.$value['id'].'.png'; ?>"></label><br /><input type="radio" name="acx_csma_template" id="<?php echo $value['index']; ?>" value="<?php echo $value['id']; ?>" <?php if ($acx_csma_template==$value['id']) {echo "checked=checked";}?> onclick="acx_csma_rdbtn_show_div(<?php echo $value['id']; ?>);"/><?php echo $value['name']." &nbsp;&nbsp;&nbsp;"; ?><a href="<?php echo esc_url($value['path']."?acx_csma_preview=".$value['id']); ?>" target="_blank"><?php _e("Preview","coming-soon-maintenance-mode-from-acurax"); ?></a>
			</div>
			<?php
		}
	}
	?>
		
	<?php acx_csma_hook_function('acx_csma_hook_mainoptions_below_add_template'); ?>
</div> <!-- main -->



		<?php
		$acx_csma_appearence_array=acx_csma_get_db_array_value(); 
?>
		<div id="acx_csma_template_1" style="display:none;" class="acx_csma_template_option_holder">
			<div id="acx_csma_1_p_q_and_a_h_main_holder">
				<!-- ################################ QUESTION AND ANSWER SET STARTS HERE #########################################-->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Background Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
						<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							<label><?php _e("Background Image:","coming-soon-maintenance-mode-from-acurax"); ?></label>
							<div class="acx_qa_field">
							<?php 
				$acx_csma_background_image1_id = $acx_csma_appearence_array['1']['acx_csma_background_image1'];
				$bg_image1_url  = $acx_csma_background_image1_id;
				if(is_numeric($acx_csma_background_image1_id))
				{
					$image1_attachment_url = parse_url( wp_get_attachment_url($acx_csma_background_image1_id) );
					$bg_image1_url    = $image1_attachment_url [ 'scheme' ]  . '://' .rawurlencode( basename( $image1_attachment_url[ 'host' ])). $image1_attachment_url[ 'path' ];
				} 
				?>
							
								<img id="custom_uploader_template_1_img_field_preview" src="<?php echo $bg_image1_url; ?>" style="width:100px;height:auto;">
								<input type="hidden" id="custom_uploader_template_1_img_field" name="acx_csma_background_image1" value="<?php echo $acx_csma_background_image1_id; ?>" size="20">
								<br>
								<a id="acx_upload_button_img1" class="button"><?php _e("Choose Image","coming-soon-maintenance-mode-from-acurax"); ?></a>
								<a id="acx_upload_button_reset_img1" onclick="acx_csma_restore_default('custom_uploader_template_1_img_field_preview','<?php echo ACX_CSMA_BASE_LOCATION . 'templates/1/images/body_bg.jpg'; ?>','custom_uploader_template_1_img_field');" class="button"><?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?></a>
							</div> <!-- acx_qa_field --> 
						</div> <!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a -->
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE ############################################# -->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################ -->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Logo Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
						<div class="acx_csma_logo_main" >
						<table cellspacing="10">
						<tr><td>
						
						<input type="radio" name="acx_csma_logo_choice1" class="acx_csma_logo"  id="acx_csma_logo_image1" value="image"  onclick="acx_csma_rdbtn_show_logo('image','1');" <?php if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array['1'])){if($acx_csma_appearence_array['1']['acx_csma_logo_choice'] == 'image' || $acx_csma_appearence_array['1']['acx_csma_logo_choice']==''){echo "checked='checked'";}} else{ echo "checked='checked'";} ?>/><p><?php _e("Logo Image","coming-soon-maintenance-mode-from-acurax"); ?></p></td><td>
						<input type="radio" name="acx_csma_logo_choice1" class="acx_csma_logo"  id="acx_csma_logo_text1" value="text" onclick="acx_csma_rdbtn_show_logo('text','1');" <?php if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array['1'])){if($acx_csma_appearence_array['1']['acx_csma_logo_choice'] == 'text'){echo "checked='checked'";}}?>/><p><?php _e("Logo Text","coming-soon-maintenance-mode-from-acurax"); ?></p></td></tr>
						</table>
						</div><!--acx_csma_logo_main -->
						<div id="acx_show_logo_image_1" class="acx_csma_logo_block acx_csma_logo_block_1">
						<?php 
					$acx_csma_logo1_id = $acx_csma_appearence_array['1']['acx_csma_logo1'];
					$logo1_url  = $acx_csma_logo1_id;
					if(is_numeric($acx_csma_logo1_id))
					{
						$logo1_attachment_url = parse_url( wp_get_attachment_url($acx_csma_logo1_id) );
						$logo1_url    = $logo1_attachment_url [ 'scheme' ]  . '://' .rawurlencode( basename( $logo1_attachment_url[ 'host' ])). $logo1_attachment_url[ 'path' ];
					} 
			
						?>
							<label>
							<?php _e("Logo Image:","coming-soon-maintenance-mode-from-acurax"); ?> <span id="acx_csma_span">(<?php _e("Recommended size 231x67","coming-soon-maintenance-mode-from-acurax"); ?>)</span>
							</label>
							<div class="acx_qa_field">
								<img id="custom_uploader_template_1_logo_field_preview" src="<?php echo $logo1_url; ?>" style="width:100px;height:auto;">
								<input type="hidden" id="custom_uploader_template_1_logo_field" name="acx_csma_logo1" value="<?php echo $acx_csma_logo1_id; ?>" size="20"><br><a id="acx_upload_button_logo1" class="button"><?php _e("Pick a Logo","coming-soon-maintenance-mode-from-acurax"); ?></a>
								<a id="acx_upload_button_reset_logo1" onclick="acx_csma_restore_default('custom_uploader_template_1_logo_field_preview','<?php echo ACX_CSMA_BASE_LOCATION . 'templates/1/images/logo.png'; ?>','custom_uploader_template_1_logo_field');" class="button"><?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?></a>
							</div> <!-- acx_qa_field --> 
						</div> <!-- acx_show_logo_image-->
							<div id="acx_show_logo_text_1"  class="acx_csma_logo_block acx_csma_logo_block_1">
							<label>
							<?php _e("Logo Text:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php  if(is_array($acx_csma_appearence_array['1']) && array_key_exists('acx_csma_logo_text1',$acx_csma_appearence_array['1'])){$acx_csma_logo_text1=$acx_csma_appearence_array['1']['acx_csma_logo_text1'];
							if($acx_csma_logo_text1 == "")
							{
								$acx_csma_logo_text1=get_bloginfo('name');
							}}else{
								$acx_csma_logo_text1=get_bloginfo('name');
							}?>
							<input type="text" name="acx_csma_logo_text1" placeholder="<?php _e("Logo Text Here","coming-soon-maintenance-mode-from-acurax"); ?>" value="<?php echo $acx_csma_logo_text1 = acx_csma_option_text_after_save_hook_fn($acx_csma_logo_text1); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Logo Text Color:","coming-soon-maintenance-mode-from-acurax"); ?> <a onclick="acx_csma_restore_default('','#ffffff','acx_csma_logo_text_color1');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<?php  if(is_array($acx_csma_appearence_array['1']) && array_key_exists('acx_csma_logo_text_color1',$acx_csma_appearence_array['1'])){$acx_csma_logo_text_color1=$acx_csma_appearence_array['1']['acx_csma_logo_text_color1'];
							if($acx_csma_logo_text_color1 == "")
							{
								$acx_csma_logo_text_color1="#ffffff";
							}}else{$acx_csma_logo_text_color1="#ffffff";;}?>
							<input type="text" name="acx_csma_logo_text_color1" id="acx_csma_logo_text_color1" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_logo_text_color1; ?>" size="20" />
							<div style="position: absolute;" id="acx_csma_logo_text_color1_div"></div>
							</div> <!-- acx_qa_field --> 
							</div> <!--acx_show_logo_text -->
						</div> <!-- acx_csmap_q_and_a_inside -->
					</div> <!-- acx_csmap_q_and_a -->
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE ############################################# -->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################ -->
					<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Configure Heading Under Logo ","coming-soon-maintenance-mode-from-acurax"); ?></span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							<label>
							<?php _e("Title Text: ","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_title1 = $acx_csma_appearence_array['1']['acx_csma_title1']; ?>
							<input type="text" name="acx_csma_title1" id="acx_csma_title1" value="<?php echo $acx_csma_title1 = acx_csma_option_text_after_save_hook_fn($acx_csma_title1); ?>" size="20"/>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Title Color: ","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffffff','acx_csma_title_color1');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_title_color1" id="acx_csma_title_color1" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['1']['acx_csma_title_color1']; ?>" size="20" />
							<div style="position: absolute;" id="acx_csma_title_color1_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Subtitle Text:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php  $acx_csma_subtitle_text1 = $acx_csma_appearence_array['1']['acx_csma_subtitle_text1']; ?>
							<input type="text" name="acx_csma_subtitle_text1" id="acx_csma_subtitle_text1" value="<?php echo $acx_csma_subtitle_text1 = acx_csma_option_text_after_save_hook_fn($acx_csma_subtitle_text1); ?>" size="20"/>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Subtitle Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#fffaa9','acx_csma_subtitle_color1');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
								<input type="text" name="acx_csma_subtitle_color1" id="acx_csma_subtitle_color1" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['1']['acx_csma_subtitle_color1']; ?>" size="20"/>
								<div style="position: absolute;" id="acx_csma_subtitle_color1_div"></div>
							</div> <!-- acx_qa_field --> 
						</div> <!-- acx_csmap_q_and_a_inside -->
					</div> <!-- acx_csmap_q_and_a -->
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE ############################################# -->

			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################ -->
					<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Countdown Timer Heading & Custom HTML Settings ","coming-soon-maintenance-mode-from-acurax"); ?></span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
					<div class="acx_csmap_q_and_a_inside">
					
							<label>
							<?php _e("Custom HTML Block Above Countdown Timer","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_html_top_temp1 = $acx_csma_appearence_array['1']['acx_csma_custom_html_top_temp1']; ?>
							<textarea id="acx_csma_custom_html_top_temp1" name="acx_csma_custom_html_top_temp1" placeholder="<?php _e("HTML Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo $temp_html1 = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_top_temp1); ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
							<label>
							<?php _e("Background Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ff7800','acx_csma_inside_bg_color1');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_inside_bg_color1" id="acx_csma_inside_bg_color1" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['1']['acx_csma_inside_bg_color1']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_inside_bg_color1_div"></div>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Title:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_inside_title1 = $acx_csma_appearence_array['1']['acx_csma_inside_title1']; ?>
							<input type="text" name="acx_csma_inside_title1" value="<?php echo $acx_csma_inside_title1 = acx_csma_option_text_after_save_hook_fn($acx_csma_inside_title1); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Custom HTML Block below the tittle","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_html_top_temp1_title = $acx_csma_appearence_array['1']['acx_csma_custom_html_top_temp1_title']; ?>
							<textarea id="acx_csma_custom_html_top_temp1_title" name="acx_csma_custom_html_top_temp1_title" placeholder="<?php _e("HTML Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php  echo $acx_csma_custom_html_top_temp1_title = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_top_temp1_title); ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
							<label>
							<?php _e("Title Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffffff','acx_csma_inside_title_color1');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_inside_title_color1" id="acx_csma_inside_title_color1" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['1']['acx_csma_inside_title_color1']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_inside_title_color1_div"></div>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Custom HTML Block Below Countdown Timer","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_html_bottom_temp1 =$acx_csma_appearence_array['1']['acx_csma_custom_html_bottom_temp1']; ?>
							<textarea id="acx_csma_custom_html_bottom_temp1" name="acx_csma_custom_html_bottom_temp1" placeholder="<?php _e("HTML Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo $acx_csma_custom_html_bottom_temp1 = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_bottom_temp1); ?></textarea>
							
							</div><!-- acx_qa_field -->
						</div> <!-- acx_csmap_q_and_a_inside -->
					</div> <!-- acx_csmap_q_and_a -->
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE ############################################# -->

			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################ -->
					<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Countdown Timer Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
						<label>
						<?php _e("Would you like to show Timer?","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<select name="acx_csma_show_timer1">
						<option value="1" <?php if ($acx_csma_appearence_array['1']['acx_csma_show_timer1'] == "1") { echo 'selected="selected"'; } ?>><?php _e("Yes ","coming-soon-maintenance-mode-from-acurax"); ?></option>
						<option value="0" <?php if ($acx_csma_appearence_array['1']['acx_csma_show_timer1'] == "0") { echo 'selected="selected"'; } ?>><?php _e("No","coming-soon-maintenance-mode-from-acurax"); ?></option>
						</select>	
						</div>
							<label>
							<?php _e("Background Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffffff','acx_csma_timer_bg_color1');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_timer_bg_color1" id="acx_csma_timer_bg_color1" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['1']['acx_csma_timer_bg_color1']; ?>" size="20"/></td>
							<td><div style="position: absolute;" id="acx_csma_timer_bg_color1_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Input text Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffffff','acx_csma_timer_iptext_color1');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_timer_iptext_color1" id="acx_csma_timer_iptext_color1" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['1']['acx_csma_timer_iptext_color1']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_timer_iptext_color1_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Input BackgroundColor:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#0b1c2c','acx_csma_timer_input_bg_color1');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_timer_input_bg_color1" id="acx_csma_timer_input_bg_color1"  onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['1']['acx_csma_timer_input_bg_color1']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_timer_input_bg_color1_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Heading Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ff7800','acx_csma_timer_head_color1');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_timer_head_color1" id="acx_csma_timer_head_color1"  onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['1']['acx_csma_timer_head_color1']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_timer_head_color1_div"></div>
							</div> <!-- acx_qa_field --> 
						</div> <!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE ############################################# -->

			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################ -->
					<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Subscription Form Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							
						<label>
						<?php _e("Would you like to show Subscription form?","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<select name="acx_csma_show_subscription">
						<option value="1" <?php if ($acx_csma_appearence_array['1']['acx_csma_show_subscription'] == "1") { echo 'selected="selected"'; } ?>><?php _e("Yes ","coming-soon-maintenance-mode-from-acurax"); ?></option>
						<option value="0" <?php if ($acx_csma_appearence_array['1']['acx_csma_show_subscription'] == "0") { echo 'selected="selected"'; } ?>><?php _e("No","coming-soon-maintenance-mode-from-acurax"); ?></option>
						</select>	
						</div>
						<label>
						<?php _e("Would you like to show name field in Subscription form?","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<select name="acx_csma_show_subscription_name">
						<option value="1" <?php if ($acx_csma_appearence_array['1']['acx_csma_show_subscription_name'] == "1") { echo 'selected="selected"'; } ?>><?php _e("Yes","coming-soon-maintenance-mode-from-acurax"); ?> </option>
						<option value="0" <?php if ($acx_csma_appearence_array['1']['acx_csma_show_subscription_name'] == "0") { echo 'selected="selected"'; } ?>><?php _e("No","coming-soon-maintenance-mode-from-acurax"); ?></option>
						</select>	
						</div>
							<label>
							<?php _e("Custom HTML Block Above Subscription form","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_html_top_sub1 = $acx_csma_appearence_array['1']['acx_csma_custom_html_top_sub1']; ?>
							<textarea id="acx_csma_custom_html_top_sub1" name="acx_csma_custom_html_top_sub1" placeholder="<?php _e("HTML Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo $acx_csma_custom_html_top_sub1  = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_top_sub1); ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
							
							<label>
							<?php _e("Custom HTML Block Below Subscription form","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_html_bottom_sub1 = $acx_csma_appearence_array['1']['acx_csma_custom_html_bottom_sub1']; ?>
							<textarea id="acx_csma_custom_html_bottom_sub1" name="acx_csma_custom_html_bottom_sub1" placeholder="<?php _e("HTML Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo $acx_csma_custom_html_bottom_sub1  = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_bottom_sub1); ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
<!-- **********************************************************************-->
							
							
							
							
							
							<label>
							<?php _e("Background Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#0b1c2c','acx_csma_subscribe_bg_color1');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_subscribe_bg_color1"  id="acx_csma_subscribe_bg_color1" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['1']['acx_csma_subscribe_bg_color1']; ?>"  size="20"/>
							<div style="position: absolute;" id="acx_csma_subscribe_bg_color1_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Button Text","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_subscribe_btn_text1 = $acx_csma_appearence_array['1']['acx_csma_subscribe_btn_text1']; ?>
							<input type="text" name="acx_csma_subscribe_btn_text1"  value="<?php echo $acx_csma_subscribe_btn_text1 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscribe_btn_text1); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							
							<label>
							<?php _e("Button Text Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffffff','acx_csma_subscribe_btn_text_color1');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_subscribe_btn_text_color1"  id="acx_csma_subscribe_btn_text_color1" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['1']['acx_csma_subscribe_btn_text_color1']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_subscribe_btn_text_color1_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Button Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ff7800','acx_csma_subscribe_btn_color1');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_subscribe_btn_color1"  id="acx_csma_subscribe_btn_color1" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['1']['acx_csma_subscribe_btn_color1']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_subscribe_btn_color1_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Button  Hover Text Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#0b1c2c','acx_csma_subscribe_btn_hover_color1');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_subscribe_btn_hover_color1"  id="acx_csma_subscribe_btn_hover_color1" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['1']['acx_csma_subscribe_btn_hover_color1']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_subscribe_btn_hover_color1_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Button  Hover Background  Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ff881e','acx_csma_subscribe_btn_hover_bgcolor1');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_subscribe_btn_hover_bgcolor1"  id="acx_csma_subscribe_btn_hover_bgcolor1" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['1']['acx_csma_subscribe_btn_hover_bgcolor1']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_subscribe_btn_hover_bgcolor1_div"></div>
							</div> <!-- acx_qa_field --> 						
							<label>
							<?php _e("Subscribe Title:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_subscribe_title1 = $acx_csma_appearence_array['1']['acx_csma_subscribe_title1']; ?>
							<input type="text" name="acx_csma_subscribe_title1"  value="<?php echo $acx_csma_subscribe_title1 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscribe_title1); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Subscribe Title Color:","coming-soon-maintenance-mode-from-acurax");?><a onclick="acx_csma_restore_default('','#ff7800','acx_csma_subscribe_title_color1');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_subscribe_title_color1"  id="acx_csma_subscribe_title_color1" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['1']['acx_csma_subscribe_title_color1']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_subscribe_title_color1_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Subscribe Success Message:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_subscribe_success1 = $acx_csma_appearence_array['1']['acx_csma_subscribe_success1']; ?>
							<input type="text" name="acx_csma_subscribe_success1"  value="<?php echo $acx_csma_subscribe_success1 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscribe_success1); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Subscribe Invalid Message:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_subscribe_invalid1 = $acx_csma_appearence_array['1']['acx_csma_subscribe_invalid1']; ?>
							<input type="text" name="acx_csma_subscribe_invalid1"  value="<?php echo $acx_csma_subscribe_invalid1 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscribe_invalid1); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							
						</div> <!-- acx_csmap_q_and_a_inside -->
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE ############################################# -->

			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################ -->
					<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Footer Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
						
							<label>
							<?php _e("Footer Background:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ff7800','acx_csma_footer_bgcolor1');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_footer_bgcolor1"  id="acx_csma_footer_bgcolor1" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['1']['acx_csma_footer_bgcolor1']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_footer_bgcolor1_div"></div></div> <!-- acx_qa_field -->
							<label>
							<?php _e("Footer Text:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php  $acx_csma_footer_text1 = $acx_csma_appearence_array['1']['acx_csma_footer_text1']; ?>
							<input type="text" name="acx_csma_footer_text1" value="<?php echo $acx_csma_footer_text1 = acx_csma_option_text_after_save_hook_fn($acx_csma_footer_text1); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Footer Text Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffffff','acx_csma_footer_text_color1');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_footer_text_color1"  id="acx_csma_footer_text_color1" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['1']['acx_csma_footer_text_color1']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_footer_text_color1_div"></div></div> <!-- acx_qa_field -->
						</div> <!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE ############################################-->
			
			<!--################################ QUESTION AND ANSWER SET STARTS HERE ############################################ -->
					<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Custom css Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
						
							<label>
							<?php _e("Custom css","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_css_temp1 = $acx_csma_appearence_array['1']['acx_csma_custom_css_temp1']; ?>
							<textarea id="acx_csma_custom_css_temp1" name="acx_csma_custom_css_temp1" placeholder="<?php _e("CSS Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo stripslashes($acx_csma_custom_css_temp1); ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
						</div> <!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE ############################################-->
			</div> <!-- acx_csma_1_p_q_and_a_h_main_holder -->
			
			
			
			
			
			
			
			
			
		</div><!--acx_csma_template_1-->		

		<div id="acx_csma_template_2" style="display:none;" class="acx_csma_template_option_holder">
			<div id="acx_csma_2_p_q_and_a_h_main_holder">
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################-->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Background Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							<label><?php _e("Background Color:","coming-soon-maintenance-mode-from-acurax"); ?>
							<a onclick="acx_csma_restore_default('','#e4e4e4','acx_csma_bg_color2');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_bg_color2"  id="acx_csma_bg_color2" value="<?php echo $acx_csma_appearence_array['2']['acx_csma_bg_color2']; ?>" onblur="acx_csma_validate(this.value);" size="20"/>
							<div style="position: absolute;" id="acx_csma_bg_color2_div"></div>
							</div> <!-- acx_qa_field --> 
						</div> <!-- acx_csmap_q_and_a_inside -->
					</div> <!-- acx_csmap_q_and_a -->
				 </div> <!-- acx_csmap_q_and_a_h -->

			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE ############################################ -->

			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ########################################### -->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Logo Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
						<div class="acx_csma_logo_main">
						<table cellspacing="10">
						<tr><td>
						<input type="radio" name="acx_csma_logo_choice2" class="acx_csma_logo" id="acx_csma_logo_image2" value="image" onclick="acx_csma_rdbtn_show_logo('image','2');" <?php if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array['2'])){if($acx_csma_appearence_array['2']['acx_csma_logo_choice'] == 'image' || $acx_csma_appearence_array['2']['acx_csma_logo_choice']==''){echo "checked='checked'";}}else{ echo "checked='checked'";} ?>/><?php _e("Logo Image","coming-soon-maintenance-mode-from-acurax"); ?></td><td>
						<input type="radio" name="acx_csma_logo_choice2" class="acx_csma_logo" id="acx_csma_logo_text2" value="text"  onclick="acx_csma_rdbtn_show_logo('text','2');" <?php if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array['2'])){if($acx_csma_appearence_array['2']['acx_csma_logo_choice'] == 'text'){echo "checked='checked'";}}?>/><?php _e("Logo Text","coming-soon-maintenance-mode-from-acurax"); ?></td></tr></table>
						</div><!--acx_csma_logo_main -->
						<div id="acx_show_logo_image_2"  class="acx_csma_logo_block acx_csma_logo_block_2"  style="display:none;">
							<label>
							<?php _e("Logo:","coming-soon-maintenance-mode-from-acurax"); ?><span id="acx_csma_span">(<?php _e("Recommended size 99x27,Image must be png and transparent","coming-soon-maintenance-mode-from-acurax"); ?>)</span>
							</label>
							<div class="acx_qa_field">
							<?php 
					$acx_csma_logo2_id = $acx_csma_appearence_array['2']['acx_csma_logo2'];
					$logo2_url  = $acx_csma_logo2_id;
					if(is_numeric($acx_csma_logo2_id))
					{
						$logo2_attachment_url = parse_url( wp_get_attachment_url($acx_csma_logo2_id) );
						$logo2_url    = $logo2_attachment_url [ 'scheme' ]  . '://' .rawurlencode( basename( $logo2_attachment_url[ 'host' ])). $logo2_attachment_url[ 'path' ];
					} 
				
						?>
							<img id="custom_uploader_template_2_logo_field_preview" src="<?php echo $logo2_url; ?>" style="width:100px;height:auto;">
							<input type="hidden" id="custom_uploader_template_2_logo_field" name="acx_csma_logo2" value="<?php echo $acx_csma_logo2_id; ?>" size="20">
							<br>
							<a id="acx_upload_button_logo2" class="button">Pick a <?php _e("Logo","coming-soon-maintenance-mode-from-acurax"); ?></a>
							<a id="acx_upload_button_logo2" onclick="acx_csma_restore_default('custom_uploader_template_2_logo_field_preview','<?php echo ACX_CSMA_BASE_LOCATION . 'templates/2/images/logo.png'; ?>','custom_uploader_template_2_logo_field');" class="button"><?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?></a>
							</div> <!-- acx_qa_field --> 
						</div><!--acx_show_logo_image-->
							<div id="acx_show_logo_text_2"  class="acx_csma_logo_block acx_csma_logo_block_2"  style="display:none;">
							<label>
							<?php _e("Logo Text:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php  if(array_key_exists('acx_csma_logo_text2',$acx_csma_appearence_array['2'])){$acx_csma_logo_text2=$acx_csma_appearence_array['2']['acx_csma_logo_text2'];
							if($acx_csma_logo_text2 == "")
							{
								$acx_csma_logo_text2=get_bloginfo('name');
							}}else{
								$acx_csma_logo_text2=get_bloginfo('name');
							}?>
							<input type="text" name="acx_csma_logo_text2" placeholder="<?php _e("Logo Text Here","coming-soon-maintenance-mode-from-acurax"); ?>" value="<?php echo $acx_csma_logo_text2 = acx_csma_option_text_after_save_hook_fn($acx_csma_logo_text2); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Logo Text Color:","coming-soon-maintenance-mode-from-acurax"); ?> <a onclick="acx_csma_restore_default('','#ffffff','acx_csma_logo_text_color2');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
						<div class="acx_qa_field">
							<?php  if(array_key_exists('acx_csma_logo_text_color2',$acx_csma_appearence_array['2'])){$acx_csma_logo_text_color2=$acx_csma_appearence_array['2']['acx_csma_logo_text_color2'];
							if($acx_csma_logo_text_color2 == "")
							{
								$acx_csma_logo_text_color2="#ffffff";
							}}$acx_csma_logo_text_color2="#ffffff"; ?>
							<input type="text" name="acx_csma_logo_text_color2" id="acx_csma_logo_text_color2" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_logo_text_color2; ?>" size="20" />
							<div style="position: absolute;" id="acx_csma_logo_text_color2_div"></div>
							</div> <!-- acx_qa_field --> 
							</div> <!-- acx_show_logo_text -->
							
						</div> <!-- acx_csmap_q_and_a_inside -->
					</div> <!-- acx_csmap_q_and_a -->
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->

			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################-->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Heading and Subheading Settings","coming-soon-maintenance-mode-from-acurax"); ?></span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							<label>
							<?php _e("Title Text : ","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_title2 = $acx_csma_appearence_array['2']['acx_csma_title2']; ?>
							<input type="text" name="acx_csma_title2" id="acx_csma_title2" value="<?php echo $acx_csma_title2 = acx_csma_option_text_after_save_hook_fn($acx_csma_title2); ?>" size="20"/>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Title Color:","coming-soon-maintenance-mode-from-acurax"); ?> 
							<a onclick="acx_csma_restore_default('','#000000','acx_csma_title_color2');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
				
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_title_color2" id="acx_csma_title_color2" value="<?php echo $acx_csma_appearence_array['2']['acx_csma_title_color2']; ?>" onblur="acx_csma_validate(this.value);" size="20"/>
							<div style="position: absolute;" id="acx_csma_title_color2_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Subtitle Text:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_subtitle_text2 = $acx_csma_appearence_array['2']['acx_csma_subtitle_text2']; ?>
							<input type="text" name="acx_csma_subtitle_text2" id="acx_csma_subtitle_text2" value="<?php echo $acx_csma_subtitle_text2 = acx_csma_option_text_after_save_hook_fn($acx_csma_subtitle_text2); ?>"  size="20"/>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Subtitle Color:","coming-soon-maintenance-mode-from-acurax"); ?>
							<a onclick="acx_csma_restore_default('','#000000','acx_csma_subtitle_color2');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_subtitle_color2" id="acx_csma_subtitle_color2" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['2']['acx_csma_subtitle_color2']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_subtitle_color2_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Background Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffd800','acx_csma_inside_bg_color2');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_inside_bg_color2" id="acx_csma_inside_bg_color2" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['2']['acx_csma_inside_bg_color2']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_inside_bg_color2_div"></div>
							</div> <!-- acx_qa_field -->
						</div> <!-- acx_csmap_q_and_a_inside -->
					</div> <!-- acx_csmap_q_and_a -->
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE ############################################-->
	
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################-->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Countdown Timer, Subscription Form & Custom HTML Settings","coming-soon-maintenance-mode-from-acurax"); ?> </span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
						<label>
						<?php _e("Would you like to show Timer?","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<select name="acx_csma_show_timer2">
						<option value="1" <?php if ($acx_csma_appearence_array['2']['acx_csma_show_timer2'] == "1") { echo 'selected="selected"'; } ?>><?php _e("Yes","coming-soon-maintenance-mode-from-acurax"); ?> </option>
						<option value="0" <?php if ($acx_csma_appearence_array['2']['acx_csma_show_timer2'] == "0") { echo 'selected="selected"'; } ?>><?php _e("No","coming-soon-maintenance-mode-from-acurax"); ?></option>
						</select>	
						</div>
						<label>
							<?php _e("Custom HTML Block above Timer","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_html_above_timer =$acx_csma_appearence_array['2']['acx_csma_custom_html_above_timer']; ?>
							<textarea id="acx_csma_custom_html_above_timer" name="acx_csma_custom_html_above_timer" placeholder="<?php _e("HTML Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo $acx_csma_custom_html_above_timer  = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_above_timer); ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
						<label>
							<?php _e("Custom HTML Block below Timer","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_html_top_timer =$acx_csma_appearence_array['2']['acx_csma_custom_html_top_timer']; ?>
							<textarea id="acx_csma_custom_html_top_timer" name="acx_csma_custom_html_top_timer" placeholder="<?php _e("HTML Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo $acx_csma_custom_html_top_timer   = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_top_timer); ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
							<label>
							<?php _e("Timer Block Title","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_timer_title2 = $acx_csma_appearence_array['2']['acx_csma_timer_title2']; ?>
							<input type="text" name="acx_csma_timer_title2" value="<?php echo $acx_csma_timer_title2 = acx_csma_option_text_after_save_hook_fn($acx_csma_timer_title2); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Timer Title Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#00000','acx_csma_timer_title_color2');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_timer_title_color2" id="acx_csma_timer_title_color2" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['2']['acx_csma_timer_title_color2']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_timer_title_color2_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
						<?php _e("Would you like to show Subscription form?","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<select name="acx_csma_show_subscription2">
						<option value="1" <?php if ($acx_csma_appearence_array['2']['acx_csma_show_subscription2'] == "1") { echo 'selected="selected"'; } ?>><?php _e("Yes","coming-soon-maintenance-mode-from-acurax"); ?> </option>
						<option value="0" <?php if ($acx_csma_appearence_array['2']['acx_csma_show_subscription2'] == "0") { echo 'selected="selected"'; } ?>><?php _e("No","coming-soon-maintenance-mode-from-acurax"); ?></option>
						</select>	
						</div>
						<label>
						<?php _e("Would you like to show name field in Subscription form?","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<select name="acx_csma_show_subscription_name2">
						<option value="1" <?php if ($acx_csma_appearence_array['2']['acx_csma_show_subscription_name2'] == "1") { echo 'selected="selected"'; } ?>><?php _e("Yes","coming-soon-maintenance-mode-from-acurax"); ?> </option>
						<option value="0" <?php if ($acx_csma_appearence_array['2']['acx_csma_show_subscription_name2'] == "0") { echo 'selected="selected"'; } ?>><?php _e("No","coming-soon-maintenance-mode-from-acurax"); ?></option>
						</select>	
						</div>
						<label>
						<?php _e("Subscribe Button Text","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<?php $acx_csma_subscribe_btn_text2 = $acx_csma_appearence_array['2']['acx_csma_subscribe_btn_text2']; ?>
						<input type="text" name="acx_csma_subscribe_btn_text2"  value="<?php echo $acx_csma_subscribe_btn_text2 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscribe_btn_text2); ?>" size="20"/>
						</div> <!-- acx_qa_field -->
						<label><?php _e("Subscribe Button TextColor:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffd800','acx_csma_subscribe_btn_color2');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_subscribe_btn_color2"  id="acx_csma_subscribe_btn_color2" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['2']['acx_csma_subscribe_btn_color2']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_subscribe_btn_color2_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Subscribe Success Message:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_subscribe_success2 = $acx_csma_appearence_array['2']['acx_csma_subscribe_success2']; ?>
							<input type="text" name="acx_csma_subscribe_success2"  value="<?php echo $acx_csma_subscribe_success2 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscribe_success2); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Subscribe Invalid Message:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_subscribe_invalid2 = $acx_csma_appearence_array['2']['acx_csma_subscribe_invalid2'] ;?>
							<input type="text" name="acx_csma_subscribe_invalid2"  value="<?php echo $acx_csma_subscribe_invalid2 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscribe_invalid2); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							
							<label>
							<?php _e("Timer Input BackgroundColor:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffffff','acx_csma_timer_input_bg_color2');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_timer_input_bg_color2" id="acx_csma_timer_input_bg_color2" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['2']['acx_csma_timer_input_bg_color2']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_timer_input_bg_color2_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Input TextColor:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#000000','acx_csma_timer_iptext_color2');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_timer_iptext_color2"  id="acx_csma_timer_iptext_color2" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['2']['acx_csma_timer_iptext_color2']; ?>"  size="20"/>
							<div style="position: absolute;" id="acx_csma_timer_iptext_color2_div"></div>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Heading Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#000000','acx_csma_timer_head_color2');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_timer_head_color2" id="acx_csma_timer_head_color2" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['2']['acx_csma_timer_head_color2']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_timer_head_color2_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Custom HTML Block Above Description Block","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_html_top_temp2 =$acx_csma_appearence_array['2']['acx_csma_custom_html_top_temp2']; ?>
							<textarea id="acx_csma_custom_html_top_temp2" name="acx_csma_custom_html_top_temp2" placeholder="<?php _e("HTML Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo $acx_csma_custom_html_top_temp2  = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_top_temp2); ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
							<label>
							<?php _e("Description Title:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_desc_title2 = $acx_csma_appearence_array['2']['acx_csma_desc_title2']; ?>
							<input type="text" name="acx_csma_desc_title2"  id="acx_csma_desc_title2" value="<?php echo $acx_csma_desc_title2 = acx_csma_option_text_after_save_hook_fn($acx_csma_desc_title2); ?>" size="20"/>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Description Content:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_desc_subtitle2 = $acx_csma_appearence_array['2']['acx_csma_desc_subtitle2'];?>
							<textarea name="acx_csma_desc_subtitle2"  id="acx_csma_desc_subtitle2"><?php echo $acx_csma_desc_subtitle2 = acx_csma_textarea_after_save_hook_function($acx_csma_desc_subtitle2); ?> </textarea>
							</div> <!-- acx_qa_field -->
							<div class="f_w"></div>
							<label>
							<?php _e("Description Heading Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#000000','acx_csma_desc_text_color2');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_desc_text_color2"  id="acx_csma_desc_text_color2" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['2']['acx_csma_desc_text_color2']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_desc_text_color2_div"></div>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Description TextColor:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#000000','acx_csma_desc_content_color2');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_desc_content_color2"  id="acx_csma_desc_content_color2" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['2']['acx_csma_desc_content_color2']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_desc_content_color2_div"></div>
							</div> <!-- acx_qa_field -->
							</div> <!-- acx_csmap_q_and_a_inside -->
					</div> <!-- acx_csmap_q_and_a -->
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE ############################################-->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ########################################### -->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Social Media Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							<label>
							<?php _e("Social Media Text:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_social_link_title2 = $acx_csma_appearence_array['2']['acx_csma_social_link_title2']; ?>
							<input type="text" name="acx_csma_social_link_title2" value="<?php echo $acx_csma_social_link_title2  = acx_csma_option_text_after_save_hook_fn($acx_csma_social_link_title2 ); ?>" size="20"/>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Social Media TextColor:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffffff','acx_csma_social_link_color2');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_social_link_color2"  id="acx_csma_social_link_color2" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['2']['acx_csma_social_link_color2']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_social_link_color2_div"></div>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Facebook Link","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_fb_link2"  id="acx_csma_fb_link2" value="<?php echo esc_url($acx_csma_appearence_array['2']['acx_csma_fb_link2']); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Twitter Link","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_twitter_link2"  id="acx_csma_twitter_link2" value="<?php echo esc_url($acx_csma_appearence_array['2']['acx_csma_twitter_link2']); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("LinkedIn Link","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_linkedin_link2"  id="acx_csma_linkedin_link2" value="<?php echo esc_url($acx_csma_appearence_array['2']['acx_csma_linkedin_link2']); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
						</div> <!-- acx_csmap_q_and_a_inside -->
					</div> <!-- acx_csmap_q_and_a -->
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
			<!--################################ QUESTION AND ANSWER SET STARTS HERE ############################################ -->
					<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Custom css Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
						
							<label>
							<?php _e("Custom css","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_css_temp2 = $acx_csma_appearence_array['2']['acx_csma_custom_css_temp2']; ?>
							<textarea id="acx_csma_custom_css_temp2" name="acx_csma_custom_css_temp2" placeholder="<?php _e("CSS Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo stripslashes($acx_csma_custom_css_temp2); ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
						</div> <!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE ############################################-->

			</div> <!-- acx_csma_2_p_q_and_a_h_main_holder -->	
		</div><!--acx_csma_template_2-->

		<div id="acx_csma_template_3" style="display:none;" class="acx_csma_template_option_holder">
			<div id="acx_csma_3_p_q_and_a_h_main_holder">
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################-->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Logo Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
						<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
							<div class="acx_csmap_q_and_a_inside">
							<div class="acx_csma_logo_main">
							<table cellspacing="10">
						<tr><td>
						<input type="radio" name="acx_csma_logo_choice3" class="acx_csma_logo" id="acx_csma_logo_image3" value="image" onclick="acx_csma_rdbtn_show_logo('image','3');" <?php if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array['3'])){if($acx_csma_appearence_array['3']['acx_csma_logo_choice'] == 'image' || $acx_csma_appearence_array['3']['acx_csma_logo_choice']==''){echo "checked='checked'";}}else{ echo "checked='checked'";} ?>/><?php _e("Logo Image","coming-soon-maintenance-mode-from-acurax"); ?></td><td>
						<input type="radio" name="acx_csma_logo_choice3" class="acx_csma_logo" id="acx_csma_logo_text3" value="text"  onclick="acx_csma_rdbtn_show_logo('text','3');" <?php if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array['3'])){ if($acx_csma_appearence_array['3']['acx_csma_logo_choice'] == 'text'){echo "checked='checked'";}}?>/><?php _e("Logo Text","coming-soon-maintenance-mode-from-acurax"); ?></td></tr></table>
						</div><!--acx_csma_logo_main -->
						<div id="acx_show_logo_image_3"  class="acx_csma_logo_block acx_csma_logo_block_3"  style="display:none;">
							<label>
							<?php _e("Logo:","coming-soon-maintenance-mode-from-acurax"); ?><span id="acx_csma_span">(<?php _e("Recommended size 161x38","coming-soon-maintenance-mode-from-acurax"); ?>)</span>
							</label>
							<div class="acx_qa_field">
							<?php 
					$acx_csma_logo3_id = $acx_csma_appearence_array['3']['acx_csma_logo3'];
					$logo3_url  = $acx_csma_logo3_id;
					if(is_numeric($acx_csma_logo3_id))
					{
						$logo3_attachment_url = parse_url( wp_get_attachment_url($acx_csma_logo3_id) );
						$logo3_url    = $logo3_attachment_url [ 'scheme' ]  . '://' .rawurlencode( basename( $logo3_attachment_url[ 'host' ])). $logo3_attachment_url[ 'path' ];
					} 
				
						?>
							
							<img id="custom_uploader_template_3_logo_field_preview" src="<?php echo $logo3_url; ?>" style="width:100px;height:auto;">
							<input type="hidden" id="custom_uploader_template_3_logo_field" name="acx_csma_logo3" value="<?php echo $acx_csma_logo3_id; ?>" size="20"><br><a id="acx_upload_button_logo3" class="button"><?php _e("Pick a Logo","coming-soon-maintenance-mode-from-acurax"); ?></a>
							<a id="acx_upload_button_reset_img1" onclick="acx_csma_restore_default('custom_uploader_template_3_logo_field_preview','<?php echo ACX_CSMA_BASE_LOCATION . 'templates/3/images/logo.png'; ?>','custom_uploader_template_3_logo_field');" class="button"><?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?></a>

							</div> <!-- acx_qa_field --> 
							</div><!--acx_show_logo_image -->
							<div id="acx_show_logo_text_3"  class="acx_csma_logo_block acx_csma_logo_block_3"  style="display:none;">
							<label>
							<?php _e("Logo Text:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php if(array_key_exists('acx_csma_logo_text3',$acx_csma_appearence_array['3'])){ $acx_csma_logo_text3=$acx_csma_appearence_array['3']['acx_csma_logo_text3'];
							if($acx_csma_logo_text3 == "")
							{
								$acx_csma_logo_text3=get_bloginfo('name');
							}}else{
								$acx_csma_logo_text3=get_bloginfo('name');
							}?>
							<input type="text" name="acx_csma_logo_text3" placeholder="<?php _e("Logo Text Here","coming-soon-maintenance-mode-from-acurax"); ?>" value="<?php echo $acx_csma_logo_text3 = acx_csma_option_text_after_save_hook_fn($acx_csma_logo_text3); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Logo Text Color:","coming-soon-maintenance-mode-from-acurax"); ?> <a onclick="acx_csma_restore_default('','#ffffff','acx_csma_logo_text_color3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<?php  if(array_key_exists('acx_csma_logo_text_color3',$acx_csma_appearence_array['3'])){$acx_csma_logo_text_color3=$acx_csma_appearence_array['3']['acx_csma_logo_text_color3'];
							if($acx_csma_logo_text_color3 == "")
							{
								$acx_csma_logo_text_color3="#ffffff";
							}
							}else{
								$acx_csma_logo_text_color3="#ffffff";
							}?>
							<input type="text" name="acx_csma_logo_text_color3" id="acx_csma_logo_text_color3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_logo_text_color3; ?>" size="20" />
							<div style="position: absolute;" id="acx_csma_logo_text_color3_div"></div>
							</div> <!-- acx_qa_field --> 
						</div><!--acx_show_logo_text -->
						</div> <!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
			
			
			
			
			
			
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################-->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Background Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							<label>
							<?php _e("Primary Background Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffffff','acx_csma_primary_color3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_primary_color3" id="acx_csma_primary_color3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['3']['acx_csma_primary_color3']; ?>" size="20" />
							<div style="position: absolute;" id="acx_csma_primary_color3_div"></div>
							</div> <!-- acx_qa_field -->  
							<label>
							<?php _e("Secondary Background Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#fe7e01','acx_csma_secondary_color3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_secondary_color3" id="acx_csma_secondary_color3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['3']['acx_csma_secondary_color3']; ?>" size="20" />
							<div style="position: absolute;" id="acx_csma_secondary_color3_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Left Side-bar Background Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#000000','acx_csma_left_bar_color3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_left_bar_color3" id="acx_csma_left_bar_color3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['3']['acx_csma_left_bar_color3']; ?>" size="20" />
							<div style="position: absolute;" id="acx_csma_left_bar_color3_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Timer Background Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffffff','acx_csma_timer_color3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_timer_color3" id="acx_csma_timer_color3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['3']['acx_csma_timer_color3']; ?>" size="20" />
							<div style="position: absolute;" id="acx_csma_timer_color3_div"></div>
							</div> <!-- acx_qa_field --> 
					
						</div> <!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
			
			
			
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################-->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Heading and Subheading Settings - Left Side","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							<label>
							<?php _e("Title:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_title3 = $acx_csma_appearence_array['3']['acx_csma_title3'];?>
							<input type="text" name="acx_csma_title3" value="<?php echo $acx_csma_title3 = acx_csma_option_text_after_save_hook_fn($acx_csma_title3); ?>" size="20"/>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Title Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffffff','acx_csma_title_color3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_title_color3" id="acx_csma_title_color3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['3']['acx_csma_title_color3']; ?>" size="20" />
							<div style="position: absolute;" id="acx_csma_title_color3_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Sub Title:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_subtitle_text3 = $acx_csma_appearence_array['3']['acx_csma_subtitle_text3']; ?>
							<input type="text" name="acx_csma_subtitle_text3" value="<?php echo $acx_csma_subtitle_text3 = acx_csma_option_text_after_save_hook_fn($acx_csma_subtitle_text3); ?>" size="20"/>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("SubTitle Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffffff','acx_csma_subtitle_color3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_subtitle_color3" id="acx_csma_subtitle_color3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['3']['acx_csma_subtitle_color3']; ?>" size="20" />
							<div style="position: absolute;" id="acx_csma_subtitle_color3_div"></div>
							</div> <!-- acx_qa_field --> 
						</div> <!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################-->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Subscription Form Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
						<label>
						<?php _e("Would you like to show Subscription form?","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<select name="acx_csma_show_subscription3">
						<option value="1" <?php if ($acx_csma_appearence_array['3']['acx_csma_show_subscription3'] == "1") { echo 'selected="selected"'; } ?>><?php _e("Yes ","coming-soon-maintenance-mode-from-acurax"); ?></option>
						<option value="0" <?php if ($acx_csma_appearence_array['3']['acx_csma_show_subscription3'] == "0") { echo 'selected="selected"'; } ?>><?php _e("No","coming-soon-maintenance-mode-from-acurax"); ?></option>
						</select>	
						</div>
						<label>
						<?php _e("Would you like to show name field in Subscription form?","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<select name="acx_csma_show_subscription_name3">
						<option value="1" <?php if ($acx_csma_appearence_array['3']['acx_csma_show_subscription_name3'] == "1") { echo 'selected="selected"'; } ?>><?php _e("Yes ","coming-soon-maintenance-mode-from-acurax"); ?></option>
						<option value="0" <?php if ($acx_csma_appearence_array['3']['acx_csma_show_subscription_name3'] == "0") { echo 'selected="selected"'; } ?>><?php _e("No","coming-soon-maintenance-mode-from-acurax"); ?></option>
						</select>	
						</div>
							<label>
							<?php _e("Title:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_subscribe_title3 = $acx_csma_appearence_array['3']['acx_csma_subscribe_title3'];?>
							<input type="text" name="acx_csma_subscribe_title3" value="<?php echo $acx_csma_subscribe_title3 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscribe_title3); ?>"  size="20"/>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Title Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#fe7e01','acx_csma_subscribe_title_color3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_subscribe_title_color3"  id="acx_csma_subscribe_title_color3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['3']['acx_csma_subscribe_title_color3']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_subscribe_title_color3_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Button Text","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_subscribe_btn_text3 = $acx_csma_appearence_array['3']['acx_csma_subscribe_btn_text3']; ?>
							<input type="text" name="acx_csma_subscribe_btn_text3"  value="<?php echo $acx_csma_subscribe_btn_text3 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscribe_btn_text3); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Button Text Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffffff','acx_csma_subscribe_btn_text_color3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_subscribe_btn_text_color3"  id="acx_csma_subscribe_btn_text_color3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['3']['acx_csma_subscribe_btn_text_color3']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_subscribe_btn_text_color3_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Button Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#fe7e01','acx_csma_subscribe_btn_color3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_subscribe_btn_color3"  id="acx_csma_subscribe_btn_color3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['3']['acx_csma_subscribe_btn_color3']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_subscribe_btn_color3_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Button  Hover Text Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#0b1c2c','acx_csma_subscribe_btn_hover_color3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_subscribe_btn_hover_color3"  id="acx_csma_subscribe_btn_hover_color3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['3']['acx_csma_subscribe_btn_hover_color3']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_subscribe_btn_hover_color3_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Button  Hover Background  Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#fe6001','acx_csma_subscribe_btn_hover_bgcolor3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_subscribe_btn_hover_bgcolor3"  id="acx_csma_subscribe_btn_hover_bgcolor3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['3']['acx_csma_subscribe_btn_hover_bgcolor3']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_subscribe_btn_hover_bgcolor3_div"></div>
							</div> <!-- acx_qa_field --> 	
							<label>
							<?php _e("Subscribe Success Message:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_subscribe_success3 = $acx_csma_appearence_array['3']['acx_csma_subscribe_success3']; ?>
							<input type="text" name="acx_csma_subscribe_success3"  value="<?php echo $acx_csma_subscribe_success3 =acx_csma_option_text_after_save_hook_fn($acx_csma_subscribe_success3); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Subscribe Invalid Message:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_subscribe_invalid3 = $acx_csma_appearence_array['3']['acx_csma_subscribe_invalid3']; ?>
							<input type="text" name="acx_csma_subscribe_invalid3"  value="<?php echo $acx_csma_subscribe_invalid3 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscribe_invalid3); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
						</div> <!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################-->
					<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Heading Settings - Right Side","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							<label>
							<?php _e("Title:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php  $acx_csma_inside_title3 = $acx_csma_appearence_array['3']['acx_csma_inside_title3']; ?>
							<input type="text" name="acx_csma_inside_title3" value="<?php echo acx_csma_option_text_after_save_hook_fn($acx_csma_appearence_array['3']['acx_csma_inside_title3']); ?>"  size="20"/>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Title Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffffff','acx_csma_inside_title_color3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_inside_title_color3" id="acx_csma_inside_title_color3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['3']['acx_csma_inside_title_color3']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_inside_title_color3_div"></div>
							</div> <!-- acx_qa_field --> 
						</div> <!-- acx_csmap_q_and_a_inside -->
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################-->
					<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Right Side Content & Custom HTML Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
						
						<label>
						<?php _e("Would you like to show Timer?","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<select name="acx_csma_show_timer3">
						<option value="1" <?php if ($acx_csma_appearence_array['3']['acx_csma_show_timer3'] == "1") { echo 'selected="selected"'; } ?>><?php _e("Yes ","coming-soon-maintenance-mode-from-acurax"); ?></option>
						<option value="0" <?php if ($acx_csma_appearence_array['3']['acx_csma_show_timer3'] == "0") { echo 'selected="selected"'; } ?>><?php _e("No","coming-soon-maintenance-mode-from-acurax"); ?></option>
						</select>	
						</div>
						
						<label>
							<?php _e("Custom HTML Block Above Timer","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_html_top_timer_temp3 = $acx_csma_appearence_array['3']['acx_csma_custom_html_top_timer_temp3']; ?>
							<textarea id="acx_csma_custom_html_top_timer_temp3" name="acx_csma_custom_html_top_timer_temp3" placeholder="<?php _e("HTML Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo $acx_csma_custom_html_top_timer_temp3 = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_top_timer_temp3); ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
							
							<label>
							<?php _e("Custom HTML Block Below Description","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_html_bottom_temp3 =$acx_csma_appearence_array['3']['acx_csma_custom_html_bottom_temp3']; ?>
							<textarea id="acx_csma_custom_html_bottom_temp3" name="acx_csma_custom_html_bottom_temp3" placeholder="<?php _e("HTML Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo $acx_csma_custom_html_bottom_temp3 = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_bottom_temp3); ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
							
							<label>
							<?php _e("Input Text Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#000000','acx_csma_timer_iptext_color3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_timer_iptext_color3"  id="acx_csma_timer_iptext_color3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['3']['acx_csma_timer_iptext_color3']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_timer_iptext_color3_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Heading Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#000000','acx_csma_timer_head_color3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_timer_head_color3" id="acx_csma_timer_head_color3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['3']['acx_csma_timer_head_color3']; ?>"  size="20"/>
							<div style="position: absolute;" id="acx_csma_timer_head_color3_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Custom HTML Block Above Description Block","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_html_top_temp3 =$acx_csma_appearence_array['3']['acx_csma_custom_html_top_temp3']; ?>
							<textarea id="acx_csma_custom_html_top_temp3" name="acx_csma_custom_html_top_temp3" placeholder="<?php _e("HTML Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo $acx_csma_custom_html_top_temp3 = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_top_temp3); ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
							<label>
							<?php _e("Description Title:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_desc_title3 = $acx_csma_appearence_array['3']['acx_csma_desc_title3']; ?>
							<input type="text" name="acx_csma_desc_title3" value="<?php echo $acx_csma_desc_title3 = acx_csma_option_text_after_save_hook_fn($acx_csma_desc_title3); ?>" size="20"/>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Description Sub Title:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_desc_subtitle3 = $acx_csma_appearence_array['3']['acx_csma_desc_subtitle3']; ?>
							<textarea  name="acx_csma_desc_subtitle3" id="acx_csma_desc_subtitle3" ><?php echo $acx_csma_desc_subtitle3 = acx_csma_textarea_after_save_hook_function($acx_csma_desc_subtitle3); ?></textarea>
							</div> <!-- acx_qa_field --> 
							<div class="f_w"></div>
							<label>
							<?php _e("Description Heading Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#000000','acx_csma_desc_text_color3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_desc_text_color3"  id="acx_csma_desc_text_color3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['3']['acx_csma_desc_text_color3']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_desc_text_color3_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Description Text Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#000000','acx_csma_desc_content_color3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_desc_content_color3"  id="acx_csma_desc_content_color3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['3']['acx_csma_desc_content_color3']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_desc_content_color3_div"></div>
							</div> <!-- acx_qa_field --> 
						</div> <!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ###########################################-->
					<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Footer Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							<label>
							<?php _e("Footer Text:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_footer_text3 = $acx_csma_appearence_array['3']['acx_csma_footer_text3']; ?>
							<input type="text" name="acx_csma_footer_text3" value="<?php echo $acx_csma_footer_text3 = acx_csma_option_text_after_save_hook_fn($acx_csma_footer_text3); ?>" size="20"/>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Footer Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#000000','acx_csma_footer_color3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_footer_color3"  id="acx_csma_footer_color3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['3']['acx_csma_footer_color3']; ?>"  size="20"/>
							<div style="position: absolute;" id="acx_csma_footer_color3_div"></div>
							</div> <!-- acx_qa_field --> 
							
							
						</div> <!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE ############################################ -->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ########################################### -->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Social Media Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							<label>
							<?php _e("Social Media Text:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_social_link_title3 = $acx_csma_appearence_array['3']['acx_csma_social_link_title3']; ?>
							<input type="text" name="acx_csma_social_link_title3" value="<?php echo $acx_csma_social_link_title3  = acx_csma_option_text_after_save_hook_fn($acx_csma_social_link_title3 ); ?>" size="20"/>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Social Media Text Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#000000','acx_csma_social_link_title_color3');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_social_link_title_color3"  id="acx_csma_social_link_title_color3" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['3']['acx_csma_social_link_title_color3']; ?>"  size="20"/>
							<div style="position: absolute;" id="acx_csma_social_link_title_color3_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Facebook Link:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_fb_link3"  id="acx_csma_fb_link3" value="<?php echo esc_url($acx_csma_appearence_array['3']['acx_csma_fb_link3']); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Twitter Link:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_twitter_link3"  id="acx_csma_twitter_link3" value="<?php echo esc_url($acx_csma_appearence_array['3']['acx_csma_twitter_link3']); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("LinkedIn Link:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_linkedin_link3"  id="acx_csma_linkedin_link3" value="<?php echo esc_url($acx_csma_appearence_array['3']['acx_csma_linkedin_link3']); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
						</div> <!-- acx_csmap_q_and_a_inside -->
					</div> <!-- acx_csmap_q_and_a -->
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
			<!--################################ QUESTION AND ANSWER SET STARTS HERE ############################################ -->
					<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Custom css Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
						
							<label>
							<?php _e("Custom css","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_css_temp3 = $acx_csma_appearence_array['3']['acx_csma_custom_css_temp3']; ?>
							<textarea id="acx_csma_custom_css_temp3" name="acx_csma_custom_css_temp3" placeholder="<?php _e("CSS Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo stripslashes($acx_csma_custom_css_temp3); ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
						</div> <!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE ############################################-->

			</div> <!-- acx_csma_3_p_q_and_a_h_main_holder -->
		</div><!--acx_csma_template_3-->			
						
		<div id="acx_csma_template_4" style="display:none;" class="acx_csma_template_option_holder">
			<div id="acx_csma_4_p_q_and_a_h_main_holder">
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ###########################################-->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Background Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							<label>
							<?php _e("Background Image:","coming-soon-maintenance-mode-from-acurax"); ?>	
							</label>
							<div class="acx_qa_field">
							<?php 
					$acx_csma_bg4_id = $acx_csma_appearence_array['4']['acx_csma_background_image4'];
					$bg4_url  = $acx_csma_bg4_id;
					if(is_numeric($acx_csma_bg4_id))
					{
						$bg4_attachment_url = parse_url( wp_get_attachment_url($acx_csma_bg4_id) );
						$bg4_url    = $bg4_attachment_url [ 'scheme' ]  . '://' .rawurlencode( basename( $bg4_attachment_url[ 'host' ])). $bg4_attachment_url[ 'path' ];
					} 
				
						?>
							<img id="custom_uploader_template_4_img_field_preview" src="<?php echo $bg4_url; ?>" style="width:100px;height:auto;">
							<input type="hidden" id="custom_uploader_template_4_img_field" name="acx_csma_background_image4" value="<?php echo $acx_csma_bg4_id; ?>" size="20">
							<br>
							<a id="acx_upload_button_img4" class="button"><?php _e("Choose Image","coming-soon-maintenance-mode-from-acurax"); ?></a>
							<a id="acx_upload_button_reset_img1" onclick="acx_csma_restore_default('custom_uploader_template_4_img_field_preview','<?php  echo ACX_CSMA_BASE_LOCATION . 'templates/4/images/body_bg.jpg'; ?>','custom_uploader_template_4_img_field');" class="button"><?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?></a>
							</div> <!-- acx_qa_field --> 
						</div> <!-- acx_csmap_q_and_a_inside -->
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE ############################################ -->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ########################################### -->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Logo Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
						<div class="acx_csma_logo_main">
						<table cellspacing="10">
						<tr><td>
						<input type="radio" name="acx_csma_logo_choice4" class="acx_csma_logo" id="acx_csma_logo_image4" value="image" onclick="acx_csma_rdbtn_show_logo('image','4');" <?php  if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array['4'])){if($acx_csma_appearence_array['4']['acx_csma_logo_choice'] == 'image' || $acx_csma_appearence_array['4']['acx_csma_logo_choice']==''){echo "checked='checked'";}}else{ echo "checked='checked'";} ?>/><?php _e("Logo Image","coming-soon-maintenance-mode-from-acurax"); ?></td><td>
						<input type="radio" name="acx_csma_logo_choice4" class="acx_csma_logo" id="acx_csma_logo_text4" value="text"  onclick="acx_csma_rdbtn_show_logo('text','4');" <?php if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array['4'])){if($acx_csma_appearence_array['4']['acx_csma_logo_choice'] == 'text'){echo "checked='checked'";}}?>/><?php _e("Logo Text","coming-soon-maintenance-mode-from-acurax"); ?></td></tr></table>
						</div><!--acx_csma_logo_main -->
						<div id="acx_show_logo_image_4" class="acx_csma_logo_block acx_csma_logo_block_4"  style="display:none;">
							<label>
							<?php _e("Logo:","coming-soon-maintenance-mode-from-acurax"); ?><span id="acx_csma_span">(<?php _e("Recommended size 326x138","coming-soon-maintenance-mode-from-acurax"); ?>)</span>
							</label>
							<div class="acx_qa_field">
							<?php 
					$acx_csma_logo4_id = $acx_csma_appearence_array['4']['acx_csma_logo4'];
					$logo4_url  = $acx_csma_logo4_id;
					if(is_numeric($acx_csma_logo4_id))
					{
						$logo4_attachment_url = parse_url( wp_get_attachment_url($acx_csma_logo4_id) );
						$logo4_url    = $logo4_attachment_url [ 'scheme' ]  . '://' .rawurlencode( basename( $logo4_attachment_url[ 'host' ])). $logo4_attachment_url[ 'path' ];
					} 
				
						?>
							
							<img id="custom_uploader_template_4_logo_field_preview" src="<?php echo $logo4_url; ?>" style="width:100px;height:auto;">
							<input type="hidden" id="custom_uploader_template_4_logo_field" name="acx_csma_logo4" value="<?php echo $acx_csma_logo4_id; ?>" size="20">
							<br>
							<a id="acx_upload_button_logo4" class="button"><?php _e("Pick a Logo","coming-soon-maintenance-mode-from-acurax"); ?></a>
							<a id="acx_upload_button_reset_img1" onclick="acx_csma_restore_default('custom_uploader_template_4_logo_field_preview','<?php echo ACX_CSMA_BASE_LOCATION . 'templates/4/images/logo.png'; ?>','custom_uploader_template_4_logo_field');" class="button"><?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?></a>
							</div> <!-- acx_qa_field --> 
							</div><!--acx_show_logo_image-->
							<div id="acx_show_logo_text_4" class="acx_csma_logo_block acx_csma_logo_block_4"  style="display:none;">
							<label>
							<?php _e("Logo Text:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php if(array_key_exists('acx_csma_logo_text4',$acx_csma_appearence_array['4'])){ $acx_csma_logo_text4=$acx_csma_appearence_array['4']['acx_csma_logo_text4'];
							if($acx_csma_logo_text4 == "")
							{
								$acx_csma_logo_text4=get_bloginfo('name');
							}}
							else{
								$acx_csma_logo_text4=get_bloginfo('name');
							}?>
							<input type="text" name="acx_csma_logo_text4" placeholder="<?php _e("Logo Text Here","coming-soon-maintenance-mode-from-acurax"); ?>" value="<?php echo $acx_csma_logo_text4 = acx_csma_option_text_after_save_hook_fn($acx_csma_logo_text4); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Logo Text Color:","coming-soon-maintenance-mode-from-acurax"); ?> <a onclick="acx_csma_restore_default('','#ffffff','acx_csma_logo_text_color4');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<?php if(array_key_exists('acx_csma_logo_text_color4',$acx_csma_appearence_array['4'])){ $acx_csma_logo_text_color4=$acx_csma_appearence_array['4']['acx_csma_logo_text_color4'];
							if($acx_csma_logo_text_color4 == "")
							{
								$acx_csma_logo_text_color4="#ffffff";
							}}else{
								$acx_csma_logo_text_color4="#ffffff";
							}?>
							<input type="text" name="acx_csma_logo_text_color4" id="acx_csma_logo_text_color4" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_logo_text_color4; ?>" size="20" />
							<div style="position: absolute;" id="acx_csma_logo_text_color4_div"></div>
							</div> <!-- acx_qa_field --> 
							</div><!--acx_show_logo_text-->
						</div> <!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a -->
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE ############################################ -->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ########################################### -->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Main Heading & Custom HTML Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							<label>
							<?php _e("Background Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ebebeb','acx_csma_inside_bg_color4');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_inside_bg_color4" id="acx_csma_inside_bg_color4" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['4']['acx_csma_inside_bg_color4']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_inside_bg_color4_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Title Text:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_title4 = $acx_csma_appearence_array['4']['acx_csma_title4']; ?>
							<input type="text" name="acx_csma_title4" value="<?php echo $acx_csma_title4 = acx_csma_option_text_after_save_hook_fn($acx_csma_title4); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Custom HTML Block Above Countdown Timer","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_html_top_temp4 =$acx_csma_appearence_array['4']['acx_csma_custom_html_top_temp4']; ?>
							<textarea id="acx_csma_custom_html_top_temp4" name="acx_csma_custom_html_top_temp4" placeholder="<?php _e("HTML Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo $acx_csma_custom_html_top_temp4 = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_top_temp4);  ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
							<label>
							<?php _e("Title Text color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#717171','acx_csma_title_color4');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_title_color4" id="acx_csma_title_color4" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['4']['acx_csma_title_color4']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_title_color4_div"></div>
							</div> <!-- acx_qa_field -->
						</div> <!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################-->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Countdown Timer, Progress Bar & Custom HTML Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
						<label>
						<?php _e("Would you like to show Timer?","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<select name="acx_csma_show_timer4">
						<option value="1" <?php if ($acx_csma_appearence_array['4']['acx_csma_show_timer4'] == "1") { echo 'selected="selected"'; } ?>><?php _e("Yes ","coming-soon-maintenance-mode-from-acurax"); ?></option>
						<option value="0" <?php if ($acx_csma_appearence_array['4']['acx_csma_show_timer4'] == "0") { echo 'selected="selected"'; } ?>><?php _e("No","coming-soon-maintenance-mode-from-acurax"); ?></option>
						</select>	
						</div>
							<label>
							<?php _e("Input Text Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#717171','acx_csma_timer_iptext_color4');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_timer_iptext_color4"  id="acx_csma_timer_iptext_color4" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['4']['acx_csma_timer_iptext_color4']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_timer_iptext_color4_div"></div>
							</div> <!-- acx_qa_field -->
							
							<label>
							<?php _e("Heading Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#717171','acx_csma_timer_head_color4');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_timer_head_color4" id="acx_csma_timer_head_color4" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['4']['acx_csma_timer_head_color4']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_timer_head_color4_div"></div>	
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Would you like to show Progress Bar?","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<select name="acx_csma_show_progressbar4">
							<option value="1" <?php if ($acx_csma_appearence_array['4']['acx_csma_show_progressbar4'] == "1") { echo 'selected="selected"'; } ?>><?php _e("Yes ","coming-soon-maintenance-mode-from-acurax"); ?></option>
							<option value="0" <?php if ($acx_csma_appearence_array['4']['acx_csma_show_progressbar4'] == "0") { echo 'selected="selected"'; } ?>><?php _e("No","coming-soon-maintenance-mode-from-acurax"); ?></option>
							</select>	
							</div>
							<label>
							<?php _e("Progress Bar Border Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#717171','acx_csma_progress_bar_color4');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_progress_bar_color4" id="acx_csma_progress_bar_color4" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['4']['acx_csma_progress_bar_color4']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_progress_bar_color4_div"></div>	
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Progress Bar BackgroundColor:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#000000','acx_csma_progress_bar_bg_color4');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_progress_bar_bg_color4" id="acx_csma_progress_bar_bg_color4" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['4']['acx_csma_progress_bar_bg_color4']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_progress_bar_bg_color4_div"></div>	
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Progress Bar TextColor:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffffff','acx_csma_progress_bar_text_color4');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_progress_bar_text_color4" id="acx_csma_progress_bar_text_color4" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['4']['acx_csma_progress_bar_text_color4']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_progress_bar_text_color4_div"></div>	
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Custom HTML Block Below Countdown Timer","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_html_bottom_temp4 =$acx_csma_appearence_array['4']['acx_csma_custom_html_bottom_temp4']; ?>
							<textarea id="acx_csma_custom_html_bottom_temp4" name="acx_csma_custom_html_bottom_temp4" placeholder="<?php _e("HTML Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo $acx_csma_custom_html_bottom_temp4 = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_bottom_temp4);  ?></textarea>
							</div><!-- acx_qa_field -->
						</div> <!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################-->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Subscription Form & Custom HTML Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
						<label>
						<?php _e("Would you like to show Subscription Form?","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<select name="acx_csma_show_subscription4">
						<option value="1" <?php if ($acx_csma_appearence_array['4']['acx_csma_show_subscription4'] == "1") { echo 'selected="selected"'; } ?>><?php _e("Yes ","coming-soon-maintenance-mode-from-acurax"); ?></option>
						<option value="0" <?php if ($acx_csma_appearence_array['4']['acx_csma_show_subscription4'] == "0") { echo 'selected="selected"'; } ?>><?php _e("No","coming-soon-maintenance-mode-from-acurax"); ?></option>
						</select>	
						</div>
						<label>
						<?php _e("Would you like to show name field in Subscription form?","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<select name="acx_csma_show_subscription_name4">
						<option value="1" <?php if ($acx_csma_appearence_array['4']['acx_csma_show_subscription_name4'] == "1") { echo 'selected="selected"'; } ?>><?php _e("Yes ","coming-soon-maintenance-mode-from-acurax"); ?></option>
						<option value="0" <?php if ($acx_csma_appearence_array['4']['acx_csma_show_subscription_name4'] == "0") { echo 'selected="selected"'; } ?>><?php _e("No","coming-soon-maintenance-mode-from-acurax"); ?></option>
						</select>	
						</div>
						<label>
						<?php _e("Subscription Title Text:","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<?php $acx_csma_subscription_title4 = $acx_csma_appearence_array['4']['acx_csma_subscription_title4']; ?>
						<input type="text" name="acx_csma_subscription_title4" value="<?php echo $acx_csma_subscription_title4 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscription_title4); ?>" size="20"/>
						</div> <!-- acx_qa_field -->
						<label>
						<?php _e("Subscription Title TextColor:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#666666','acx_csma_subscription_title_color4');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
						</label>
						<div class="acx_qa_field">
						<input type="text" name="acx_csma_subscription_title_color4"  id="acx_csma_subscription_title_color4" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['4']['acx_csma_subscription_title_color4']; ?>" size="20"/>
						<div style="position: absolute;" id="acx_csma_subscription_title_color4_div"></div>
						</div> <!-- acx_qa_field -->
						<label>
						<?php _e("Subscription Button Text:","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<?php $acx_csma_subscription_btn_text4 = $acx_csma_appearence_array['4']['acx_csma_subscription_btn_text4']; ?>
						<input type="text" name="acx_csma_subscription_btn_text4" value="<?php echo $acx_csma_subscription_btn_text4 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscription_btn_text4); ?>" size="20"/>
						</div> <!-- acx_qa_field -->
						<label>
						<?php _e("Subscription Button Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffffff','acx_csma_subscription_btn_color4');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
						</label>
						<div class="acx_qa_field">
						<input type="text" name="acx_csma_subscription_btn_color4"  id="acx_csma_subscription_btn_color4" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['4']['acx_csma_subscription_btn_color4']; ?>" size="20"/>
						<div style="position: absolute;" id="acx_csma_subscription_btn_color4_div"></div>
						</div> <!-- acx_qa_field -->
						<label>
						<?php _e("Subscription Button BackgroundColor:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#333333','acx_csma_subscription_btn_bg_color4');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
						</label>
						<div class="acx_qa_field">
						<input type="text" name="acx_csma_subscription_btn_bg_color4"  id="acx_csma_subscription_btn_bg_color4" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['4']['acx_csma_subscription_btn_bg_color4']; ?>" size="20"/>
						<div style="position: absolute;" id="acx_csma_subscription_btn_bg_color4_div"></div>
						</div> <!-- acx_qa_field -->
						<label>
						<?php _e("Subscribe Success Message:","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<?php $acx_csma_subscribe_success4 = $acx_csma_appearence_array['4']['acx_csma_subscribe_success4']; ?>
						<input type="text" name="acx_csma_subscribe_success4"  value="<?php echo $acx_csma_subscribe_success4 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscribe_success4); ?>" size="20"/>
						</div> <!-- acx_qa_field -->
						<label>
						<?php _e("Subscribe Invalid Message:","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<?php $acx_csma_subscribe_invalid4 = $acx_csma_appearence_array['4']['acx_csma_subscribe_invalid4'];?>
						<input type="text" name="acx_csma_subscribe_invalid4"  value="<?php echo $acx_csma_subscribe_invalid4 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscribe_invalid4); ?>" size="20"/>
						</div> <!-- acx_qa_field -->	
						<label>
						<?php _e("Custom HTML Block Below Subscription form","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<?php $acx_csma_custom_html_subscrpt_below_sub4 = $acx_csma_appearence_array['4']['acx_csma_custom_html_subscrpt_below_sub4']; ?>
						<textarea id="acx_csma_custom_html_subscrpt_below_sub4" name="acx_csma_custom_html_subscrpt_below_sub4" placeholder="<?php _e("HTML Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo $acx_csma_custom_html_subscrpt_below_sub4  = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_subscrpt_below_sub4); ?></textarea>
						</div><!-- acx_qa_field -->
						<div class="f_w"></div>
				</div> <!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ########################################### -->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Social Media Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							<label>
							<?php _e("Facebook Link","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_fb_link4"  id="acx_csma_fb_link4" value="<?php echo esc_url($acx_csma_appearence_array['4']['acx_csma_fb_link4']); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Twitter Link","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_twitter_link4"  id="acx_csma_twitter_link4" value="<?php echo esc_url($acx_csma_appearence_array['4']['acx_csma_twitter_link4']); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("LinkedIn Link","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_linkedin_link4"  id="acx_csma_linkedin_link4" value="<?php echo esc_url($acx_csma_appearence_array['4']['acx_csma_linkedin_link4']); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
						</div> <!-- acx_csmap_q_and_a_inside -->
					</div> <!-- acx_csmap_q_and_a -->
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
			
			<!--################################ QUESTION AND ANSWER SET STARTS HERE ############################################ -->
					<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Custom css Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
						
							<label>
							<?php _e("Custom css","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_css_temp4 = $acx_csma_appearence_array['4']['acx_csma_custom_css_temp4']; ?>
							<textarea id="acx_csma_custom_css_temp4" name="acx_csma_custom_css_temp4" placeholder="<?php _e("CSS Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo stripslashes($acx_csma_custom_css_temp4); ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
						</div> <!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE ############################################-->
			</div> <!-- acx_csma_4_p_q_and_a_h_main_holder -->
		</div><!--acx_csma_template_4-->
					
		<div id="acx_csma_template_5" style="display:none;" class="acx_csma_template_option_holder">
			<div id="acx_csma_5_p_q_and_a_h_main_holder">
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################-->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Background Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							<label>
							<?php _e("Background Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#e9eaec','acx_csma_bgcolor5');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_bgcolor5" id="acx_csma_bgcolor5" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['5']['acx_csma_bgcolor5']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_bgcolor5_div"></div>
							</div> <!-- acx_qa_field --> 
						</div><!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a -->
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################-->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Logo Settings ","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
						<div class="acx_csma_logo_main">
						<table cellspacing="10">
						<tr><td>
						<input type="radio" name="acx_csma_logo_choice5" class="acx_csma_logo" id="acx_csma_logo_image5" value="image" onclick="acx_csma_rdbtn_show_logo('image','5');" <?php if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array['5'])){if($acx_csma_appearence_array['5']['acx_csma_logo_choice'] == 'image' || $acx_csma_appearence_array['5']['acx_csma_logo_choice']==''){echo "checked='checked'";}}else{ echo "checked='checked'";} ?>/><?php _e("Logo Image","coming-soon-maintenance-mode-from-acurax"); ?></td><td>
						<input type="radio" name="acx_csma_logo_choice5" class="acx_csma_logo" id="acx_csma_logo_text5" value="text"  onclick="acx_csma_rdbtn_show_logo('text','5');" <?php if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array['5'])){if($acx_csma_appearence_array['5']['acx_csma_logo_choice'] == 'text'){echo "checked='checked'";}}?>/><?php _e("Logo Text","coming-soon-maintenance-mode-from-acurax"); ?></td></tr></table>
						</div><!--acx_csma_logo_main -->
						<div id="acx_show_logo_image_5"  class="acx_csma_logo_block acx_csma_logo_block_5" style="display:none;">
							<label>
							<?php _e("Logo:","coming-soon-maintenance-mode-from-acurax"); ?> <span id="acx_csma_span">(<?php _e("Recommended size 315x94","coming-soon-maintenance-mode-from-acurax"); ?>)</span>
							</label>
							<div class="acx_qa_field">
							<?php 
					$acx_csma_logo5_id = $acx_csma_appearence_array['5']['acx_csma_logo5'];
					$logo5_url  = $acx_csma_logo5_id;
					if(is_numeric($acx_csma_logo5_id))
					{
						$logo5_attachment_url = parse_url( wp_get_attachment_url($acx_csma_logo5_id) );
						$logo5_url    = $logo5_attachment_url [ 'scheme' ]  . '://' .rawurlencode( basename( $logo5_attachment_url[ 'host' ])). $logo5_attachment_url[ 'path' ];
					} 
				
					?>
							<img id="custom_uploader_template_5_logo_field_preview" src="<?php echo $logo5_url; ?>" style="width:100px;height:auto;">
							<input type="hidden" id="custom_uploader_template_5_logo_field" name="acx_csma_logo5" value="<?php echo $acx_csma_logo5_id ; ?>" size="20">
							<br>
							<a id="acx_upload_button_logo5" class="button">Pick a <?php _e("Logo","coming-soon-maintenance-mode-from-acurax"); ?></a>
							<a id="acx_upload_button_reset_img1" onclick="acx_csma_restore_default('custom_uploader_template_5_logo_field_preview','<?php echo ACX_CSMA_BASE_LOCATION . 'templates/5/images/logo.png'; ?>','custom_uploader_template_5_logo_field');" class="button"><?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?></a>
							</div> <!-- acx_qa_field -->
							</div> <!-- acx_show_logo_image -->
							<div id="acx_show_logo_text_5"  class="acx_csma_logo_block acx_csma_logo_block_5" style="display:none;">
							<label>
							<?php _e("Logo Text:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php  if(array_key_exists('acx_csma_logo_text5',$acx_csma_appearence_array['5'])){$acx_csma_logo_text5=$acx_csma_appearence_array['5']['acx_csma_logo_text5'];
							if($acx_csma_logo_text5 == "")
							{
								$acx_csma_logo_text5=get_bloginfo('name');
							}}else{
								$acx_csma_logo_text5=get_bloginfo('name');
							}?>
							<input type="text" name="acx_csma_logo_text5" placeholder="<?php _e("Logo Text Here","coming-soon-maintenance-mode-from-acurax"); ?>" value="<?php echo $acx_csma_logo_text5 = acx_csma_option_text_after_save_hook_fn($acx_csma_logo_text5); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Logo Text Color: ","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#000000','acx_csma_logo_text_color5');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<?php  if(array_key_exists('acx_csma_logo_text_color5',$acx_csma_appearence_array['5'])){$acx_csma_logo_text_color5=$acx_csma_appearence_array['5']['acx_csma_logo_text_color5'];
							if($acx_csma_logo_text_color5 == "")
							{
								$acx_csma_logo_text_color5="#000000";
							}}$acx_csma_logo_text_color5="#000000"; ?>
							<input type="text" name="acx_csma_logo_text_color5" id="acx_csma_logo_text_color5" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_logo_text_color5; ?>" size="20" />
							<div style="position: absolute;" id="acx_csma_logo_text_color5_div"></div>
							</div> <!-- acx_qa_field --> 
							</div> <!-- acx_show_logo_text -->
						</div><!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################-->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Inner Block Background Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							<label>
							<?php _e("Background Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#f5f5f5','acx_csma_inside_bg_color5');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_inside_bg_color5" id="acx_csma_inside_bg_color5" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['5']['acx_csma_inside_bg_color5']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_inside_bg_color5_div"></div>
							</div> <!-- acx_qa_field --> 
						</div><!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a -->
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################-->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Main Heading Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							<label>
							<?php _e("Title Text:	","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php  $acx_csma_title5 = $acx_csma_appearence_array['5']['acx_csma_title5'];?>
							<input type="text" name="acx_csma_title5" value="<?php echo $acx_csma_title5 = acx_csma_option_text_after_save_hook_fn($acx_csma_title5); ?>" size="20"/>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Custom HTML Block Above Countdown Timer","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_html_top_temp5 =$acx_csma_appearence_array['5']['acx_csma_custom_html_top_temp5']; ?>
							<textarea id="acx_csma_custom_html_top_temp5" name="acx_csma_custom_html_top_temp5" placeholder="<?php _e("HTML Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo $acx_csma_custom_html_top_temp5 = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_top_temp5); ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
							<label>
							<?php _e("Title Text Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#4b4b4b','acx_csma_title_color5');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_title_color5" id="acx_csma_title_color5" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['5']['acx_csma_title_color5']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_title_color5_div"></div>
							</div> <!-- acx_qa_field --> 
						</div><!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################-->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Countdown, Progress bar & Custom HTML Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							<label>
							<?php _e("Would you like to show Timer?","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<select name="acx_csma_show_timer5">
							<option value="1" <?php if ($acx_csma_appearence_array['5']['acx_csma_show_timer5'] == "1") { echo 'selected="selected"'; } ?>><?php _e("Yes ","coming-soon-maintenance-mode-from-acurax"); ?></option>
							<option value="0" <?php if ($acx_csma_appearence_array['5']['acx_csma_show_timer5'] == "0") { echo 'selected="selected"'; } ?>><?php _e("No","coming-soon-maintenance-mode-from-acurax"); ?></option>
							</select>	
							</div>
							<label>
							<?php _e("Input Text Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#000000','acx_csma_timer_iptext_color5');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_timer_iptext_color5"  id="acx_csma_timer_iptext_color5" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['5']['acx_csma_timer_iptext_color5']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_timer_iptext_color5_div"></div>	
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Heading Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#000000','acx_csma_timer_head_color5');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_timer_head_color5" id="acx_csma_timer_head_color5" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['5']['acx_csma_timer_head_color5']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_timer_head_color5_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Would you like to show Progress Bar ?","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<select name="acx_csma_show_progressbar5">
							<option value="1" <?php if ($acx_csma_appearence_array['5']['acx_csma_show_progressbar5'] == "1") { echo 'selected="selected"'; } ?>><?php _e("Yes","coming-soon-maintenance-mode-from-acurax"); ?> </option>
							<option value="0" <?php if ($acx_csma_appearence_array['5']['acx_csma_show_progressbar5'] == "0") { echo 'selected="selected"'; } ?>><?php _e("No","coming-soon-maintenance-mode-from-acurax"); ?></option>
							</select>
							</div>
							<label>
							<?php _e("Progress Bar BorderColor:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#717171','acx_csma_progress_bar_color5');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_progress_bar_color5" id="acx_csma_progress_bar_color5" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['5']['acx_csma_progress_bar_color5']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_progress_bar_color5_div"></div>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Progress Bar BackgroundColor:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#000000','acx_csma_progress_bar_bg_color5');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_progress_bar_bg_color5" id="acx_csma_progress_bar_bg_color5" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['5']['acx_csma_progress_bar_bg_color5']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_progress_bar_bg_color5_div"></div>	
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Progress Bar TextColor:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#ffffff','acx_csma_progress_bar_text_color5');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_progress_bar_text_color5" id="acx_csma_progress_bar_text_color5" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['5']['acx_csma_progress_bar_text_color5']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_progress_bar_text_color5_div"></div>	
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Custom HTML Block Below Countdown Timer","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_html_bottom_temp5 =$acx_csma_appearence_array['5']['acx_csma_custom_html_bottom_temp5']; ?>
							<textarea id="acx_csma_custom_html_bottom_temp5" name="acx_csma_custom_html_bottom_temp5" placeholder="<?php _e("HTML Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo $acx_csma_custom_html_bottom_temp5 = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_bottom_temp5); ?></textarea>
							</div><!-- acx_qa_field -->
						</div><!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ############################################-->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Subscription Form Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
						<label>
						<?php _e("Would you like to show Subscription form?","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<select name="acx_csma_show_subscription5">
						<option value="1" <?php if ($acx_csma_appearence_array['5']['acx_csma_show_subscription5'] == "1") { echo 'selected="selected"'; } ?>><?php _e("Yes ","coming-soon-maintenance-mode-from-acurax"); ?></option>
						<option value="0" <?php if ($acx_csma_appearence_array['5']['acx_csma_show_subscription5'] == "0") { echo 'selected="selected"'; } ?>><?php _e("No","coming-soon-maintenance-mode-from-acurax"); ?></option>
						</select>
						</div>
						<label>
						<?php _e("Would you like to show name field in Subscription form?","coming-soon-maintenance-mode-from-acurax"); ?>
						</label>
						<div class="acx_qa_field">
						<select name="acx_csma_show_subscription_name5">
						<option value="1" <?php if ($acx_csma_appearence_array['5']['acx_csma_show_subscription_name5'] == "1") { echo 'selected="selected"'; } ?>><?php _e("Yes ","coming-soon-maintenance-mode-from-acurax"); ?></option>
						<option value="0" <?php if ($acx_csma_appearence_array['5']['acx_csma_show_subscription_name5'] == "0") { echo 'selected="selected"'; } ?>><?php _e("No","coming-soon-maintenance-mode-from-acurax"); ?></option>
						</select>	
						</div>
						<label>
							<?php _e("Custom HTML Block Above Subscription form","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_html_top_sub = $acx_csma_appearence_array['5']['acx_csma_custom_html_top_sub']; ?>
							<textarea id="acx_csma_custom_html_top_sub" name="acx_csma_custom_html_top_sub" placeholder="<?php _e("HTML Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo $acx_csma_custom_html_top_sub = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_top_sub); ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
							
							<label>
							<?php _e("Custom HTML Block Below Subscription form","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_html_bottom_sub =$acx_csma_appearence_array['5']['acx_csma_custom_html_bottom_sub']; ?>
							<textarea id="acx_csma_custom_html_bottom_sub" name="acx_csma_custom_html_bottom_sub" placeholder="<?php _e("HTML Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo $acx_csma_custom_html_bottom_sub = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_bottom_sub); ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
							<label>
							<?php _e("Background Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#2f2f2f','acx_csma_subscribe_bg_color5');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_subscribe_bg_color5"  id="acx_csma_subscribe_bg_color5" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['5']['acx_csma_subscribe_bg_color5']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_subscribe_bg_color5_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Launch Title:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_subscribe_main_title5 = $acx_csma_appearence_array['5']['acx_csma_subscribe_main_title5']; ?>
							<input type="text" name="acx_csma_subscribe_main_title5" value="<?php echo $acx_csma_subscribe_main_title5 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscribe_main_title5); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Launch Title Text Color:","coming-soon-maintenance-mode-from-acurax"); ?><a onclick="acx_csma_restore_default('','#4b4b4b','acx_csma_launch_title_color5');" class="acx_csmap_button_reset">[<?php _e("Reset To Default","coming-soon-maintenance-mode-from-acurax"); ?>]</a>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_launch_title_color5"  id="acx_csma_launch_title_color5" onblur="acx_csma_validate(this.value);" value="<?php echo $acx_csma_appearence_array['5']['acx_csma_launch_title_color5']; ?>" size="20"/>
							<div style="position: absolute;" id="acx_csma_launch_title_color5_div"></div>
							</div> <!-- acx_qa_field --> 
							<label>
							<?php _e("Title:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_subscribe_title5 = $acx_csma_appearence_array['5']['acx_csma_subscribe_title5'];?>
							<input type="text" name="acx_csma_subscribe_title5" value="<?php echo $acx_csma_subscribe_title5 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscribe_title5); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Subscribe Button Text:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_subscribe_btn_text5 = $acx_csma_appearence_array['5']['acx_csma_subscribe_btn_text5']; ?>
							<input type="text" name="acx_csma_subscribe_btn_text5"  value="<?php echo $acx_csma_subscribe_btn_text5 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscribe_btn_text5); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Subscribe Success Message:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_subscribe_success5 = $acx_csma_appearence_array['5']['acx_csma_subscribe_success5']; ?>
							<input type="text" name="acx_csma_subscribe_success5"  value="<?php echo $acx_csma_subscribe_success5 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscribe_success5); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Subscribe Invalid Message:","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_subscribe_invalid5 = $acx_csma_appearence_array['5']['acx_csma_subscribe_invalid5'];?>
							<input type="text" name="acx_csma_subscribe_invalid5"  value="<?php echo $acx_csma_subscribe_invalid5 = acx_csma_option_text_after_save_hook_fn($acx_csma_subscribe_invalid5); ?>" size="20"/>
							</div> <!-- acx_qa_field -->					
						</div><!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
			<!-- ################################ QUESTION AND ANSWER SET STARTS HERE ########################################### -->
				<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>
				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Social Media Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
							<label>
							<?php _e("Facebook Link","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_fb_link5"  id="acx_csma_fb_link5" value="<?php echo esc_url($acx_csma_appearence_array['5']['acx_csma_fb_link5']); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("Twitter Link","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_twitter_link5"  id="acx_csma_twitter_link5" value="<?php echo esc_url($acx_csma_appearence_array['5']['acx_csma_twitter_link5']); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
							<label>
							<?php _e("LinkedIn Link","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<input type="text" name="acx_csma_linkedin_link5"  id="acx_csma_linkedin_link5" value="<?php echo esc_url($acx_csma_appearence_array['5']['acx_csma_linkedin_link5']); ?>" size="20"/>
							</div> <!-- acx_qa_field -->
						</div> <!-- acx_csmap_q_and_a_inside -->
					</div> <!-- acx_csmap_q_and_a -->
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE #############################################-->
<!--################################ QUESTION AND ANSWER SET STARTS HERE ############################################ -->
					<?php $acx_csmap_qa_id = $acx_csmap_qa_id+1; ?>

				<div id="acx_csmap_q_and_a_h" class="acx_csmap_q_and_a_h_common acx_csmap_q_and_a_h_<?php echo $acx_csmap_qa_id; ?>">
					<span class="acx_csma_q" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);">
					<?php _e("Custom css Settings","coming-soon-maintenance-mode-from-acurax"); ?>
					</span>
					<span class="acx_csma_toggle acx_csma_toggle_<?php echo $acx_csmap_qa_id; ?> plus" onclick="acx_csmap_easy_qa_toggle(<?php echo $acx_csmap_qa_id; ?>);"></span>
					<div id="acx_csmap_q_and_a" class="acx_csmap_q_and_a_common acx_csmap_q_and_a_<?php echo $acx_csmap_qa_id; ?>" style="display:none;">
						<div class="acx_csmap_q_and_a_inside">
						
							<label>
							<?php _e("Custom css","coming-soon-maintenance-mode-from-acurax"); ?>
							</label>
							<div class="acx_qa_field">
							<?php $acx_csma_custom_css_temp5 = $acx_csma_appearence_array['5']['acx_csma_custom_css_temp5']; ?>
							<textarea id="acx_csma_custom_css_temp5" name="acx_csma_custom_css_temp5" placeholder="<?php _e("CSS Code Here","coming-soon-maintenance-mode-from-acurax"); ?>"><?php echo stripslashes($acx_csma_custom_css_temp5); ?></textarea>
							</div><!-- acx_qa_field -->
							<div class="f_w"></div>
						</div> <!-- acx_csmap_q_and_a_inside --> 
					</div> <!-- acx_csmap_q_and_a --> 
				</div> <!-- acx_csmap_q_and_a_h -->
			<!-- ################################# QUESTION AND ANSWER SET ENDS HERE ############################################-->
			</div> <!-- acx_csma_5_p_q_and_a_h_main_holder -->
		</div><!--acx_csma_template_5-->
		<?php acx_csma_hook_function('acx_csma_hook_mainoptions_below_appearence_settings'); ?>
		<div id="acx_csma_template_0" style="display:none;" class="acx_csma_template_option_holder">
		<table>
		<tr><td>
		<label>
		<?php _e("Custom HTML content","coming-soon-maintenance-mode-from-acurax"); ?>
		</label></td>
		<td><?php $acx_csma_custom_html_val = get_option('acx_csma_custom_html_val'); ?>
		<textarea id="acx_csma_custom_html" name="acx_csma_custom_html_val" style="max-width: 80%; width: 500px; height: 180px;"><?php echo $acx_csma_custom_html_val = acx_csma_custom_html_after_save_hook_fn($acx_csma_custom_html_val); ?></textarea>
		</td>
		</tr>
		</table>
		</div><!-- acx_csma_template_0-->
	</div><!--acx_csma_tab_block_2-->
	<table>
	<tr><td colspan="3"><p><a onclick="acx_csma_save_settings('acx_csma_ip_list1');" name="Submit"  id="Submit" class="button button-primary" style="margin-left:20px;"><?php _e('Save Settings','coming-soon-maintenance-mode-from-acurax'); ?></a></p>
		<input name="acx_csma_save_config" type="hidden" value="<?php echo wp_create_nonce('acx_csma_save_config'); ?>" />
	</td></tr>
	</table>
</form>

<div id="acx_csma_sidebar">
<?php acx_csma_hook_function('acx_csma_hook_sidebar_widget'); ?>
</div> <!-- acx_csma_sidebar -->



</div> </div><!-- class wrap-->
<?php 
$acx_csma_template = get_option('acx_csma_template');
if($acx_csma_template == "") { $acx_csma_template = "1"; }
$acx_csma_base_template=get_option('acx_csma_base_template');
if(is_array($acx_csma_template_array) && !array_key_exists($acx_csma_template,$acx_csma_template_array) && $acx_csma_base_template !== "")
{
	$acx_csma_template= $acx_csma_base_template;
}
if($acx_csma_template != "")
{

	?>
	<script type="text/javascript">
	jQuery(document).ready(function() 
	{
		acx_csma_rdbtn_show_div('<?php echo $acx_csma_template; ?>');
		var radiobtn;
		<?php if($acx_csma_template == 0)
		{?>
			radiobtn = document.getElementById('acx_csma_custom_template');
		<?php }
		else{ ?>
			radiobtn = document.getElementById('acx_csma_template<?php echo $acx_csma_template; ?>');
		<?php }?>
		
		radiobtn.checked = true;
	});
	</script>
<?php
}?>
<script type="text/javascript">
//upload images and logos
jQuery(document).ready(function() 
{
	acx_csma_upload_images_template_loader("acx_csma_favicon_button","<?php _e("Choose Favicon","coming-soon-maintenance-mode-from-acurax");?>","<?php _e("Choose Image","coming-soon-maintenance-mode-from-acurax");?>","acx_csma_favicon_field","acx_csma_favicon");
	
	acx_csma_upload_images_template_loader("acx_upload_button_img1","<?php _e("Choose Background","coming-soon-maintenance-mode-from-acurax");?>","<?php _e("Choose Image","coming-soon-maintenance-mode-from-acurax");?>","custom_uploader_template_1_img_field","custom_uploader_template_1_img_field_preview");
	
	acx_csma_upload_images_template_loader("acx_upload_button_logo1","<?php _e("Choose Logo","coming-soon-maintenance-mode-from-acurax");?>","<?php _e("Choose Image","coming-soon-maintenance-mode-from-acurax");?>","custom_uploader_template_1_logo_field","custom_uploader_template_1_logo_field_preview");

	acx_csma_upload_images_template_loader("acx_upload_button_logo2","<?php _e("Choose Logo","coming-soon-maintenance-mode-from-acurax");?>","<?php _e("Choose Image","coming-soon-maintenance-mode-from-acurax");?>","custom_uploader_template_2_logo_field","custom_uploader_template_2_logo_field_preview");

	acx_csma_upload_images_template_loader("acx_upload_button_logo3","<?php _e("Choose Logo","coming-soon-maintenance-mode-from-acurax");?>","<?php _e("Choose Image","coming-soon-maintenance-mode-from-acurax");?>","custom_uploader_template_3_logo_field","custom_uploader_template_3_logo_field_preview");

	acx_csma_upload_images_template_loader("acx_upload_button_img4","<?php _e("Choose Background","coming-soon-maintenance-mode-from-acurax");?>","<?php _e("Choose Image","coming-soon-maintenance-mode-from-acurax");?>","custom_uploader_template_4_img_field","custom_uploader_template_4_img_field_preview");
	acx_csma_upload_images_template_loader("acx_upload_button_logo4","<?php _e("Choose Logo","coming-soon-maintenance-mode-from-acurax");?>","<?php _e("Choose Image","coming-soon-maintenance-mode-from-acurax");?>","custom_uploader_template_4_logo_field","custom_uploader_template_4_logo_field_preview");

	acx_csma_upload_images_template_loader("acx_upload_button_logo5","<?php _e("Choose Logo","coming-soon-maintenance-mode-from-acurax");?>","<?php _e("Choose Image","coming-soon-maintenance-mode-from-acurax");?>","custom_uploader_template_5_logo_field","custom_uploader_template_5_logo_field_preview");
});
//show logo div
function acx_csma_rdbtn_show_logo(value,id)
{
 	jQuery('.acx_csma_logo_block_'+id).removeClass('acx_csma_logo_active');
	jQuery('.acx_csma_logo_block_'+id).fadeOut();
	
	jQuery('#acx_show_logo_'+value+'_'+id).addClass('acx_csma_logo_active');
	jQuery('#acx_show_logo_'+value+'_'+id).fadeIn();
}

//form submit
function acx_csma_save_settings(acx_csma_selectbox_id)
{
	selectAll(acx_csma_selectbox_id,true);
	jQuery('#acx_csma_form').submit();
}
//validation of colors
function acx_csma_validate(acx_csma_validate_color)
{
	var acx_csma_validate_format = /^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/;
	if(acx_csma_validate_format.test(acx_csma_validate_color) == true)
	{
	return true;
	}
	else
	{
	alert("<?php _e("You have entered an invalid color!","coming-soon-maintenance-mode-from-acurax");?>"); 
	return false;
	}
}

// script for tab 
function acx_csma_show_div(tab)  
{
	setCookie("acx_csma_cookie",tab);
	jQuery(".acx_csma_tab").removeClass("acx_csma_tab_active");
	jQuery(".acx_csma_tab_block").fadeOut();

	jQuery("#acx_csma_tab_"+tab).addClass("acx_csma_tab_active");
	jQuery("#acx_csma_tab_block_"+tab).fadeIn();
}
	
//add items to list box
function acx_csma_addNewItem(listBox,txtvalue) 
{
	var acx_csma_textbox_value = jQuery('#acx_csma_txt_ip').val();
	   
	var ipformat = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;  //ipv4 format
	var ipv6_format = /^(([0-9a-fA-F]{1,4}:){7,7}[0-9a-fA-F]{1,4}|([0-9a-fA-F]{1,4}:){1,7}:|([0-9a-fA-F]{1,4}:){1,6}:[0-9a-fA-F]{1,4}|([0-9a-fA-F]{1,4}:){1,5}(:[0-9a-fA-F]{1,4}){1,2}|([0-9a-fA-F]{1,4}:){1,4}(:[0-9a-fA-F]{1,4}){1,3}|([0-9a-fA-F]{1,4}:){1,3}(:[0-9a-fA-F]{1,4}){1,4}|([0-9a-fA-F]{1,4}:){1,2}(:[0-9a-fA-F]{1,4}){1,5}|[0-9a-fA-F]{1,4}:((:[0-9a-fA-F]{1,4}){1,6})|:((:[0-9a-fA-F]{1,4}){1,7}|:)|fe80:(:[0-9a-fA-F]{0,4}){0,4}%[0-9a-zA-Z]{1,}|::(ffff(:0{1,4}){0,1}:){0,1}((25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])\.){3,3}(25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])|([0-9a-fA-F]{1,4}:){1,4}:((25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])\.){3,3}(25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9]))$/; //ipv6 format
	if(acx_csma_textbox_value.match(ipformat) || acx_csma_textbox_value.match(ipv6_format))
	{
		for(var x=0;x<listBox.options.length;x++)
		{
			if(listBox.options[x].value==acx_csma_textbox_value || listBox.options[x].text==acx_csma_textbox_value)
				{
					alert("<?php _e("IP is already Added!","coming-soon-maintenance-mode-from-acurax");?>"); 
					return false;  
				}
		}
		jQuery('#acx_csma_ip_list1').append('<option selected value='+acx_csma_textbox_value+'>'+acx_csma_textbox_value+'</option>');
	}
	else
	{
		alert("<?php _e("You have entered an invalid IP address!","coming-soon-maintenance-mode-from-acurax");?>"); 
		return false;  
	}
}
// remove items from listbox
function selectAll(selectBox,selectAll) { 
    // have we been passed an ID 
    if (typeof selectBox == "string") { 
        selectBox = document.getElementById(selectBox);
    } 
    // is the select box a multiple select box? 
    if (selectBox.type == "select-multiple") { 
        for (var i = 0; i < selectBox.options.length; i++) { 
             selectBox.options[i].selected = selectAll; 
        } 
    }
}
function acx_csma_removeItem(acx_csma_selectbox) 
{
	var i;
	for(i=acx_csma_selectbox.options.length-1;i>=0;i--)
	{
		if(acx_csma_selectbox.options[i].selected)
		acx_csma_selectbox.remove(i);
	}
	selectAll(acx_csma_selectbox,true);
}

// add date picker
jQuery('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
minDate:"<?php $format = "Y/m/d"; echo date_i18n($format, (current_time('timestamp'))); ?>",
defaultTime: "<?php $format = "H:i"; echo date_i18n($format, current_time('timestamp')); ?>",
defaultDate: "<?php $format = "Y/m/d"; echo date_i18n($format, (current_time('timestamp'))); ?>",
allowBlank: false,
});
// show template div
function acx_csma_rdbtn_show_div(temp)
{
	setCookie("acx_csma_temp_cookie",temp);
	jQuery('.acx_csma_template_option_holder').removeClass('acx_csma_temp_active');
	jQuery('.acx_csma_template_option_holder').fadeOut();

	jQuery('#acx_csma_template_'+temp).addClass('acx_csma_temp_active');
	jQuery('#acx_csma_template_'+temp).fadeIn(); 
	
}
function acx_csmap_easy_qa_toggle(id)
{	var acx_csma_toggle_common = ".acx_csma_toggle";
	var acx_csma_toggle_id = ".acx_csma_toggle_"+id;
	var acx_csmap_q_and_a_common = ".acx_csmap_q_and_a_common";
	var acx_csmap_q_and_a_id = ".acx_csmap_q_and_a_"+id;
	//-----------------------------------------------------------
	if(jQuery(acx_csma_toggle_id).hasClass('minus'))
	{
		jQuery(acx_csma_toggle_id).removeClass('minus');
		jQuery(acx_csmap_q_and_a_id).removeClass('acx_open');
		jQuery(acx_csma_toggle_id).addClass('plus');
	} 
	else if(jQuery(acx_csma_toggle_id).hasClass('plus'))
	{
		jQuery(acx_csma_toggle_id).addClass('minus');
		jQuery(acx_csma_toggle_id).removeClass('plus');
		jQuery(acx_csmap_q_and_a_id).addClass('acx_open');
	}
} 
function acx_csma_restore_default(img_id,default_value,text_id,set_bg)
{

	if(set_bg!="")
	{
	var text_id_j="#"+text_id;
	jQuery(text_id_j).css('background',default_value);
	}
	if(img_id!="")
	{
	var acx_csma_bg_img_id=document.getElementById(img_id);
	acx_csma_bg_img_id.src = default_value; 
	}
	document.getElementById(text_id).value = default_value;
} 
jQuery(document).ready(function() 
{
	var acx_csma_cookie = getCookie("acx_csma_cookie");		
	acx_csma_show_div(acx_csma_cookie);
	var acx_csma_temp_cookie = getCookie("acx_csma_temp_cookie");
	acx_csma_rdbtn_show_div(acx_csma_temp_cookie);
	<?php 
	foreach($acx_csma_appearence_array as $key =>$value)
		{ 
		if(array_key_exists('acx_csma_logo_choice',$acx_csma_appearence_array[$key]))
		{
			$acx_csma_logo_choice = $value['acx_csma_logo_choice'];
			if($acx_csma_logo_choice == "")
			{
				$acx_csma_logo_choice = "image";
			}
		}
		else
		{
			$acx_csma_logo_choice = "image"; 
		}		?>
			acx_csma_rdbtn_show_logo('<?php echo $acx_csma_logo_choice; ?>','<?php echo $key; ?>');
<?php 	}	?>
});
function acx_csmap_easy_qa_expandall()
{<?php for ($i = 1; $i <= $acx_csmap_qa_id; $i++) { ?>
acx_csmap_easy_qa_toggle(<?php echo $i; ?>);
<?php } ?>
}

<?php if($acx_csmap_open_all_boxes_default == "yes")
{ ?>
acx_csmap_easy_qa_expandall();
<?php } ?>

</script>
<?php acx_csma_hook_function('acx_csma_hook_mainoptions_below_javascript'); ?>