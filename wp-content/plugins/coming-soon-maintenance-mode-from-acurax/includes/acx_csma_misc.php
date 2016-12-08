<?php
acx_csma_hook_function('acx_csma_misc_hook_option_above_ifpost');
if(ISSET($_POST['acx_csma_misc_hidden']))
{
	$acx_csma_misc_hidden = $_POST['acx_csma_misc_hidden'];
} 
else
{
	$acx_csma_misc_hidden = "";
}
if($acx_csma_misc_hidden == 'Y') 
{
	acx_csma_hook_function('acx_csma_misc_hook_option_onpost');
} else
{
	acx_csma_hook_function('acx_csma_misc_hook_option_postelse');
}
acx_csma_hook_function('acx_csma_misc_hook_option_after_else');
acx_csma_hook_function('acx_csma_misc_hook_option_form_head');
acx_csma_hook_function('acx_csma_misc_hook_option_fields');
acx_csma_hook_function('acx_csma_misc_hook_option_form_footer');
acx_csma_hook_function('acx_csma_misc_hook_option_sidebar');
?>



























