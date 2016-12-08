<?php
function acx_csma_base_encode_fix($acx_content_to_fix)
{
	if($acx_content_to_fix != "")
	{
		if ( base64_encode(base64_decode($acx_content_to_fix, true)) === $acx_content_to_fix)
		{
			$acx_content_to_fix = base64_decode($acx_content_to_fix) ;
		}
	}
	return $acx_content_to_fix;	
}
?>