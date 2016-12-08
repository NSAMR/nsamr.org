<?php
function acx_csma_service_banners()
{
?>
<div id="acx_ad_banners_csma">
<?php
$acx_csma_service_banners = get_option('acx_csma_service_banners');
if ($acx_csma_service_banners != "no") { ?>
<div id="acx_ad_banners_csma">
<a href="http://wordpress.acurax.com/partner-with-us/?utm_source=csma&utm_campaign=agency_banner" target="_blank" class="acx_ad_csma_1">
<div class="acx_ad_csma_title"><?php _e("Are You an Agency?","coming-soon-maintenance-mode-from-acurax");?></div> <!-- acx_ad_csma_title -->
<div class="acx_ad_csma_desc_partner"  style="padding-top: 0px; height: 32px; font-size: 13px; text-align: center;"><?php _e("Outsourcing Solutions From Acurax Can Add Value to Your Business","coming-soon-maintenance-mode-from-acurax");?></div> <!-- acx_ad_csma_desc -->
</a> <!--  acx_ad_csma_1 -->


<a href="http://wordpress.acurax.com/?utm_source=csma&utm_campaign=sidebar_banner_1" target="_blank" class="acx_ad_csma_1">
<div class="acx_ad_csma_title"><?php _e("Need Help on Wordpress?","coming-soon-maintenance-mode-from-acurax");?></div> <!-- acx_ad_csma_title -->
<div class="acx_ad_csma_desc"><?php _e("Instant Solutions for your wordpress Issues","coming-soon-maintenance-mode-from-acurax");?></div> <!-- acx_ad_csma_desc -->
</a> <!--  acx_ad_csma_1 -->

<a href="http://wordpress.acurax.com/?utm_source=csma&utm_campaign=sidebar_banner_2" target="_blank" class="acx_ad_csma_1">
<div class="acx_ad_csma_title"><?php _e("Unique Design For Better Branding","coming-soon-maintenance-mode-from-acurax");?></div> <!-- acx_ad_csma_title -->
<div class="acx_ad_csma_desc acx_ad_csma_desc2" style="padding-top: 0px; padding-left: 50px; height: 41px; font-size: 13px; text-align: center;"><?php _e("Get Responsive Custom Designed Website For High Conversion","coming-soon-maintenance-mode-from-acurax");?></div> <!-- acx_ad_csma_desc -->
</a> <!--  acx_ad_csma_1 -->

<a href="http://wordpress.acurax.com/?utm_source=csma&utm_campaign=sidebar_banner_3" target="_blank" class="acx_ad_csma_1">
<div class="acx_ad_csma_title"><?php _e("Affordable Website Packages","coming-soon-maintenance-mode-from-acurax");?></div> <!-- acx_ad_csma_title -->
<div class="acx_ad_csma_desc acx_ad_csma_desc3" style="padding-top: 0px; height: 32px; font-size: 13px; text-align: center;"><?php _e("Get Feature Rich Packages For a Custom Designed Website","coming-soon-maintenance-mode-from-acurax");?></div> <!-- acx_ad_csma_desc -->
</a> <!--  acx_ad_csma_1 -->

</div> <!--  acx_ad_banners_csma -->
<?php } else { ?>


<div class="acx_csma_sidebar_widget">
<div class="acx_csma_sidebar_w_title"><?php _e("Partner With Us","coming-soon-maintenance-mode-from-acurax");?></div> <!-- acx_ad_csma_title -->
<div class="acx_csma_sidebar_w_content">
<?php _e("Acurax offers a strong partnership program for agencies which has a strong sales channel. Our team of creative designers and developers will be surely an added value to your services. We can completely take care of the projects or can work with your existing team.","coming-soon-maintenance-mode-from-acurax");?> <a href="http://wordpress.acurax.com/partner-with-us/?utm_source=csma&utm_campaign=agency_text" target="_blank"><?php _e("Get in touch","coming-soon-maintenance-mode-from-acurax");?></a>
</div>
</div> <!-- acx_csma_sidebar_widget -->


<div class="acx_csma_sidebar_widget">
<div class="acx_csma_sidebar_w_title"><?php _e("We Are Always Available","coming-soon-maintenance-mode-from-acurax");?></div> <!-- acx_ad_csma_title -->
<div class="acx_csma_sidebar_w_content">
<?php _e("We know you are in the process of improving your website, and we the team at Acurax is always available for any help or support that you need. ","coming-soon-maintenance-mode-from-acurax");?><a href="http://wordpress.acurax.com/?utm_source=csma&utm_campaign=sidebar_text_1" target="_blank"><?php _e("Get in touch","coming-soon-maintenance-mode-from-acurax");?></a>
</div>
</div> <!-- acx_csma_sidebar_widget -->


<div class="acx_csma_sidebar_widget">
<div class="acx_csma_sidebar_w_title"><?php _e("Do You Know?","coming-soon-maintenance-mode-from-acurax");?></div> <!-- acx_ad_csma_title -->
<div class="acx_csma_sidebar_w_content acx_csma_sidebar_w_content_p_slide">
</div>
</div> <!-- acx_csma_sidebar_widget -->
<script type="text/javascript">
var acx_csma = new Array("<?php _e('A professionally designed website is the most cost effective marketing tool available in the world today...','coming-soon-maintenance-mode-from-acurax'); ?>","<?php _e('Personalizing your website can create a unique one to one experience and convert your visitors into customers.','coming-soon-maintenance-mode-from-acurax'); ?>","<?php _e('70% of searches from mobile devices are followed up with an action within 1 hour.','coming-soon-maintenance-mode-from-acurax'); ?>");

// jQuery(".acx_csma_sidebar_w_content_p_slide p").height('30px');
function acx_csma_t_rotate()
{
acx_csma_text = acx_csma[Math.floor(Math.random()*acx_csma.length)];
jQuery(".acx_csma_sidebar_w_content_p_slide").fadeOut('slow')
jQuery(".acx_csma_sidebar_w_content_p_slide").text(acx_csma_text);
jQuery(".acx_csma_sidebar_w_content_p_slide").fadeIn('fast');
}
jQuery(document).ready(function() {
acx_csma_t_rotate();
 setInterval(function(){ acx_csma_t_rotate(); }, 8000);
});
</script>
<div class="acx_csma_sidebar_widget">
<div class="acx_csma_sidebar_w_title"><?php _e("Grab The Blending Creativity","coming-soon-maintenance-mode-from-acurax");?></div>
<div class="acx_csma_sidebar_w_content"><?php _e("Make your website user friendly and optimized for mobile devices for better user interaction and satisfaction ","coming-soon-maintenance-mode-from-acurax");?><a href="http://wordpress.acurax.com/?utm_source=csma&utm_campaign=sidebar_text_2" target="_blank"><?php _e("Click Here","coming-soon-maintenance-mode-from-acurax");?></a></div>
</div> <!-- acx_csma_sidebar_widget -->
<?php } ?>
<div class="acx_csma_sidebar_widget">
<div class="acx_csma_sidebar_w_title"><?php _e("Rate us on wordpress.org","coming-soon-maintenance-mode-from-acurax");?></div>
<div class="acx_csma_sidebar_w_content" style="text-align:center;font-size:13px;"><b><?php _e("Thank you for being with us... If you like our plugin then please show us some love ","coming-soon-maintenance-mode-from-acurax");?></b></br>
<a href="https://wordpress.org/support/view/plugin-reviews/coming-soon-maintenance-mode-from-acurax" target="_blank" style="text-decoration:none;">
<span id="acx_csma_stars">
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
</span>
<span class="acx_csma_star_button button button-primary"><?php _e("Click Here","coming-soon-maintenance-mode-from-acurax");?></span>
</a>
<p><?php _e("If you are facing any issues, kindly post them at plugins support forum ","coming-soon-maintenance-mode-from-acurax");?><a href="http://wordpress.org/support/plugin/coming-soon-maintenance-mode-from-acurax" target="_blank"><?php _e("here","coming-soon-maintenance-mode-from-acurax");?></a>
</div>
</div> <!-- acx_csma_sidebar_widget -->



</div> <!--  acx_ad_banners_csma -->

<?php
}
 add_action('acx_csma_hook_sidebar_widget','acx_csma_service_banners',100);
  add_action('acx_csma_misc_hook_option_sidebar','acx_csma_service_banners',100);
/********************************************************** MISC PAGE ************************************************************/

/********************************************** MISC Page*********************************************/
function acx_csma_misc_nonce_check()
{
	if (!isset($_POST['acx_csma_misc_nonce'])) die("<br><br>".__('Unknown Error Occurred, Try Again... ','coming-soon-maintenance-mode-from-acurax')."<a href=''>Click Here</a>");
	if (!wp_verify_nonce($_POST['acx_csma_misc_nonce'],'acx_csma_misc_nonce')) die("<br><br>".__('Unknown Error Occurred, Try Again... ','coming-soon-maintenance-mode-from-acurax')."<a href=''>Click Here</a>");
	if(!current_user_can('manage_options')) die("<br><br>".__('Sorry, You have no permission to do this action...','coming-soon-maintenance-mode-from-acurax')."</a>");
} add_action('acx_csma_misc_hook_option_onpost','acx_csma_misc_nonce_check',1);


function acx_csma_misc_nonce_field()
{
	echo "<input name='acx_csma_misc_nonce' type='hidden' value='".wp_create_nonce('acx_csma_misc_nonce')."' />";
	echo "<input name='acx_csma_misc_hidden' type='hidden' value='Y' />";
} add_action('acx_csma_misc_hook_option_fields','acx_csma_misc_nonce_field',10);

function acx_csma_misc_option_form_start()
{
	echo "<form name='acurax_csma_misc_form' id='acurax_csma_misc_form'  method='post' action='".str_replace( '%7E', '~',$_SERVER['REQUEST_URI'])."'>";
} add_action('acx_csma_misc_hook_option_form_head','acx_csma_misc_option_form_start',100);


function acx_csma_misc_option_form_end()
{
	echo "</form>";
}  add_action('acx_csma_misc_hook_option_form_footer','acx_csma_misc_option_form_end',100);

function acx_csma_misc_option_div_start()
{
	echo "<div id=\"acx_csma_option_page_holder\"> \n";
	acx_csma_hook_function('acx_csma_misc_hook_option_above_page_left');
	echo "<div class=\"acx_csma_option_page_left\"> \n";
} add_action('acx_csma_misc_hook_option_form_head','acx_csma_misc_option_div_start',30);

function acx_csma_misc_option_sidebar_start()
{
	echo "</div> <!-- acx_csma_option_page_left --> \n";
	echo "<div class=\"acx_csma_option_page_right\"> \n";
	echo "<div id=\"acx_csma_sidebar\"> \n";
}  add_action('acx_csma_misc_hook_option_sidebar','acx_csma_misc_option_sidebar_start',10);


function acx_csma_misc_option_sidebar_end()
{
	echo "</div> <!-- acx_csma_sidebar --> \n";
	echo "</div> <!-- acx_csma_option_page_right --> \n";
	acx_csma_hook_function('acx_csma_misc_hook_option_footer');
	echo "</div> <!-- acx_csma_option_page_holder --> \n";
} add_action('acx_csma_misc_hook_option_sidebar','acx_csma_misc_option_sidebar_end',500);

function acx_csma_misc_print_option_page_title()
{
		$acx_string = __("Misc Settings","coming-soon-maintenance-mode-from-acurax");
 echo print_acx_csma_option_heading($acx_string);
} add_action('acx_csma_misc_hook_option_form_head','acx_csma_misc_print_option_page_title',50);

function display_acx_csma_misc_saved_success()
{ ?>
<div class="updated"><p><strong><?php _e('Misc Settings Saved!.','coming-soon-maintenance-mode-from-acurax' ); ?></strong></p></div>
<script type="text/javascript">
		 setTimeout(function(){
				jQuery('.updated').fadeOut('slow');
				
				}, 4000);

		</script>

<?php
}   add_action('acx_csma_misc_hook_option_onpost','display_acx_csma_misc_saved_success',5000);


/********************************************************** MISC PAGE ************************************************************/
?>