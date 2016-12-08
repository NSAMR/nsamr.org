<?php
function acx_csma_hook_function($function_name)
{
	if($function_name!="")
	{
		if(function_exists($function_name))
		{
			$function_name();	
		}
	}
}
function acx_csma_hook_bove_if_post()
{
	do_action('acx_csma_hook_bove_if_post');
}
function acx_csma_hook_sidebar_widget()
{
	do_action('acx_csma_hook_sidebar_widget');
}
function acx_csma_hook_mainoptions_above_title()
{
	do_action('acx_csma_hook_mainoptions_above_title');
}
function acx_csma_hook_mainoptions_inside_if_submit()
{
	do_action('acx_csma_hook_mainoptions_inside_if_submit');
}
function acx_csma_hook_mainoptions_inside_else_submit()
{
	do_action('acx_csma_hook_mainoptions_inside_else_submit');
}
function acx_csma_hook_mainoptions_outside_if_submit()
{
	do_action('acx_csma_hook_mainoptions_outside_if_submit');
}
function acx_csma_hook_mainoptions_add_settings()
{
	do_action('acx_csma_hook_mainoptions_add_settings');
}
function acx_csma_hook_mainoptions_below_general_settings()
{
	do_action('acx_csma_hook_mainoptions_below_general_settings');
}
function acx_csma_hook_mainoptions_below_appearence_settings()
{
	do_action('acx_csma_hook_mainoptions_below_appearence_settings');
}
function acx_csma_hook_mainoptions_below_add_template()
{
	do_action('acx_csma_hook_mainoptions_below_add_template');
}
function acx_csma_hook_mainoptions_below_javascript()
{
	do_action('acx_csma_hook_mainoptions_below_javascript');
}
/* Misc Page */

function acx_csma_misc_hook_option_onpost()
{
	do_action('acx_csma_misc_hook_option_onpost');
}
function acx_csma_misc_hook_option_postelse()
{
	do_action('acx_csma_misc_hook_option_postelse');
}
function acx_csma_misc_hook_option_after_else()
{
	do_action('acx_csma_misc_hook_option_after_else');
}
function acx_csma_misc_hook_option_fields()
{
	do_action('acx_csma_misc_hook_option_fields');
}
function acx_csma_misc_hook_option_above_page_left()
{
	do_action('acx_csma_misc_hook_option_above_page_left');
}
function acx_csma_misc_hook_option_form_head()
{
	do_action('acx_csma_misc_hook_option_form_head');
}
function acx_csma_misc_hook_option_form_footer()
{
	do_action('acx_csma_misc_hook_option_form_footer');
}
function acx_csma_misc_hook_option_sidebar()
{
	do_action('acx_csma_misc_hook_option_sidebar');
}
function acx_csma_misc_hook_option_footer()
{
	do_action('acx_csma_misc_hook_option_footer');
}
?>