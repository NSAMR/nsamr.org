<?php
	$acx_csma_version=get_option('acx_csma_version');
	if($acx_csma_version == '' && get_option('acx_csma_start_date_time') != "")
	{
		add_action('admin_head','acx_csma_migration');
	}
	function acx_csma_migration()
	{
		$acx_csma_start_timestamp_from = get_option('acx_csma_start_date_time');
		$acx_csma_cur_date_time_from=get_option('acx_csma_date_time');
		$acx_csma_wp_time= current_time('timestamp');
		$acx_csma_server_time=time();
		$diff=$acx_csma_wp_time-$acx_csma_server_time;
		$acx_csma_start_timestamp = $acx_csma_start_timestamp_from + ($diff);
		$acx_csma_date_time = $acx_csma_cur_date_time_from + ($diff);
		update_option('acx_csma_start_date_time',$acx_csma_start_timestamp);
		update_option('acx_csma_date_time',$acx_csma_date_time);
		update_option('acx_csma_version','1.1');
	}

$acx_csma_version=get_option('acx_csma_version');
if(($acx_csma_version > 0 && $acx_csma_version < ACX_CSMA_CURRENT_VERSION))
{
	if (function_exists('acx_csma_base_encode_fix')) {
		add_action('admin_head','acx_csma_update_content');
	}
}
function acx_csma_update_content()
{
	$acx_csma_appearence_array=get_option('acx_csma_appearence_array');
	if($acx_csma_appearence_array != "")
	{
			if(is_serialized($acx_csma_appearence_array))
			{ 
				$acx_csma_appearence_array = unserialize($acx_csma_appearence_array); 
			}
	}
	if(is_array($acx_csma_appearence_array))
	{
		if(array_key_exists('1',$acx_csma_appearence_array) && array_key_exists('acx_csma_inside_title1',$acx_csma_appearence_array['1']))
		{
			$acx_csma_inside_title1 = $acx_csma_appearence_array['1']['acx_csma_inside_title1'];
			if(strcmp($acx_csma_inside_title1,"Estimate Time Before Lunching") === 0 )
				{
					$acx_csma_appearence_array['1']['acx_csma_inside_title1'] = __("Estimate Time Before Launching","coming-soon-maintenance-mode-from-acurax");
					update_option('acx_csma_appearence_array',$acx_csma_appearence_array);
				}
		}
		if(array_key_exists('1',$acx_csma_appearence_array) && array_key_exists('acx_csma_custom_html_top_temp1',$acx_csma_appearence_array['1']))
		{
			$acx_csma_custom_html_top_temp1 = $acx_csma_appearence_array['1']['acx_csma_custom_html_top_temp1'];
			
			
					$acx_html_fix_content1 = acx_csma_base_encode_fix($acx_csma_custom_html_top_temp1);
					$acx_csma_appearence_array['1']['acx_csma_custom_html_top_temp1'] = $acx_html_fix_content1;
					update_option('acx_csma_appearence_array',$acx_csma_appearence_array);
		}
		if(array_key_exists('1',$acx_csma_appearence_array) && array_key_exists('acx_csma_custom_html_bottom_temp1',$acx_csma_appearence_array['1']))
		{
			$acx_csma_custom_html_bottom_temp1 = $acx_csma_appearence_array['1']['acx_csma_custom_html_bottom_temp1'];
		
			$acx_html_fix_content2 =acx_csma_base_encode_fix($acx_csma_custom_html_bottom_temp1);
			$acx_csma_appearence_array['1']['acx_csma_custom_html_bottom_temp1'] = $acx_html_fix_content2;
			update_option('acx_csma_appearence_array',$acx_csma_appearence_array);
			
		}
		if(array_key_exists('2',$acx_csma_appearence_array) && array_key_exists('acx_csma_desc_subtitle2',$acx_csma_appearence_array['2']))
		{
			$acx_csma_desc_subtitle2 = $acx_csma_appearence_array['2']['acx_csma_desc_subtitle2'];
		
			$acx_html_fix_content3 = acx_csma_base_encode_fix($acx_csma_desc_subtitle2);
			$acx_csma_appearence_array['2']['acx_csma_desc_subtitle2'] = $acx_html_fix_content3;
			update_option('acx_csma_appearence_array',$acx_csma_appearence_array);
		
		}
		if(array_key_exists('2',$acx_csma_appearence_array) && array_key_exists('acx_csma_custom_html_top_temp2',$acx_csma_appearence_array['2']))
		{
			$acx_csma_custom_html_top_temp2 = $acx_csma_appearence_array['2']['acx_csma_custom_html_top_temp2'];
			$acx_html_fix_content4 = acx_csma_base_encode_fix($acx_csma_custom_html_top_temp2);
			$acx_csma_appearence_array['2']['acx_csma_custom_html_top_temp2'] = $acx_html_fix_content4;
			update_option('acx_csma_appearence_array',$acx_csma_appearence_array);
		}
		if(array_key_exists('3',$acx_csma_appearence_array) && array_key_exists('acx_csma_custom_html_top_temp3',$acx_csma_appearence_array['3']))
		{
			$acx_csma_custom_html_top_temp3 = $acx_csma_appearence_array['3']['acx_csma_custom_html_top_temp3'];
			$acx_html_fix_content5 = acx_csma_base_encode_fix($acx_csma_custom_html_top_temp3);
			$acx_csma_appearence_array['3']['acx_csma_custom_html_top_temp3'] = $acx_html_fix_content5;
			update_option('acx_csma_appearence_array',$acx_csma_appearence_array);
		
		}
		if(array_key_exists('3',$acx_csma_appearence_array) && array_key_exists('acx_csma_desc_subtitle3',$acx_csma_appearence_array['3']))
		{
			$acx_csma_desc_subtitle3 = $acx_csma_appearence_array['3']['acx_csma_desc_subtitle3'];
			$acx_html_fix_content6 = acx_csma_base_encode_fix($acx_csma_desc_subtitle3);
			$acx_csma_appearence_array['3']['acx_csma_desc_subtitle3'] = $acx_html_fix_content6;
			update_option('acx_csma_appearence_array',$acx_csma_appearence_array);
			
		}
		if(array_key_exists('4',$acx_csma_appearence_array) && array_key_exists('acx_csma_custom_html_top_temp4',$acx_csma_appearence_array['4']))
		{
			$acx_csma_custom_html_top_temp4 = $acx_csma_appearence_array['4']['acx_csma_custom_html_top_temp4'];
				$acx_html_fix_content7 =  acx_csma_base_encode_fix($acx_csma_custom_html_top_temp4);
				$acx_csma_appearence_array['4']['acx_csma_custom_html_top_temp4'] = $acx_html_fix_content7;
				update_option('acx_csma_appearence_array',$acx_csma_appearence_array);
		}
		if(array_key_exists('4',$acx_csma_appearence_array) && array_key_exists('acx_csma_custom_html_bottom_temp4',$acx_csma_appearence_array['4']))
		{
			$acx_csma_custom_html_bottom_temp4 = $acx_csma_appearence_array['4']['acx_csma_custom_html_bottom_temp4'];		
				$acx_html_fix_content8 = acx_csma_base_encode_fix($acx_csma_custom_html_bottom_temp4);
				$acx_csma_appearence_array['4']['acx_csma_custom_html_bottom_temp4'] = $acx_html_fix_content8;
				update_option('acx_csma_appearence_array',$acx_csma_appearence_array);
			
		}
		if(array_key_exists('5',$acx_csma_appearence_array) && array_key_exists('acx_csma_custom_html_top_temp5',$acx_csma_appearence_array['5']))
		{
			$acx_csma_custom_html_top_temp5 = $acx_csma_appearence_array['5']['acx_csma_custom_html_top_temp5'];	
				$acx_html_fix_content9 = acx_csma_base_encode_fix($acx_csma_custom_html_top_temp5);
				$acx_csma_appearence_array['5']['acx_csma_custom_html_top_temp5'] = $acx_html_fix_content9;
				update_option('acx_csma_appearence_array',$acx_csma_appearence_array);
			
		}
		if(array_key_exists('5',$acx_csma_appearence_array) && array_key_exists('acx_csma_custom_html_bottom_temp5',$acx_csma_appearence_array['5']))
		{
			$acx_csma_custom_html_bottom_temp5 = $acx_csma_appearence_array['5']['acx_csma_custom_html_bottom_temp5'];

				$acx_html_fix_content10 = acx_csma_base_encode_fix($acx_csma_custom_html_bottom_temp5);
			$acx_csma_appearence_array['5']['acx_csma_custom_html_bottom_temp5'] = $acx_html_fix_content10;
			update_option('acx_csma_appearence_array',$acx_csma_appearence_array);
		}
		if(array_key_exists('5',$acx_csma_appearence_array) && !array_key_exists('acx_csma_subscribe_main_title5',$acx_csma_appearence_array['5']))
		{
			$acx_csma_appearence_array['5']['acx_csma_subscribe_main_title5'] = __("Want to know when we launch?","coming-soon-maintenance-mode-from-acurax");
			update_option('acx_csma_appearence_array',$acx_csma_appearence_array);
		}
	} 
	$acx_csma_custom_html_val = get_option('acx_csma_custom_html_val');	
	$acx_html_fix_content11 = acx_csma_base_encode_fix($acx_csma_custom_html_val);
	update_option('acx_csma_custom_html_val',$acx_html_fix_content11);
	update_option('acx_csma_version',ACX_CSMA_CURRENT_VERSION);
}
?>