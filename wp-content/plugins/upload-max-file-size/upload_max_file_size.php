<?php
/*
  Plugin Name:Upload Max File Size
  Description: increase, upload, limit, up to, 250Mb or more
  Author:Ashutosh Kumar
  Plugin URI: https://www.facebook.com/ashutosh.kr.upadhyay
  Version: 1.0
  License: GPL2
  Text Domain:upload-max-filesize

  Copyright 2013 - 2014 upload-max-filesize(email : looklikeme05@gmail.com)

  Increase Upload Max Filesize is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  Increase Upload Max Filesize is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with  Upload Max File Size; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
// Hook for adding admin menus
add_action('admin_menu', 'mt_add_pages');

// action function for above hook
function mt_add_pages() {
    // Add a new menu under Settings
    add_menu_page(__('upload_max_file_size', 'menu-test'), __('Max File Size', 'menu-test'), 'manage_options', 'upload_max_file_size', 'upload_max_file_size');
}

//plugin dash board page
function upload_max_file_size() {
    echo "<h2>" . __('Increase Upload Maximum File Size', 'menu-test') . "</h2>";

    /**
     * Below are the form 
     * @since 1.0
     */
    ?>
    <form method="post">
        <input type="text" id="color" name="color" placeholder="Enter Numeric value " value="<?php echo get_option('max_file_size'); ?>"/>


        <input type="submit" name="submit" value="submit">
       <br/><br/> <br/>(Example: 262144000 bytes ) or (Example: 262144000 )(Only enter the numeric value in bytes)
		<br/>
		<br/>
			
		1024000 bytes=1MB(calculate the Bytes into Mb Example: 1024000 * n MB= n Bytes)(n= no of value )
		<br/><br/>
		1024000*250MB=262144000 bytes
		<br/><br/>
		(You can Increase Upload file size 250MB or more .So Enter the bytes value how much you want.. )
		<br/><br/><br/>
		Please read the help.txt file .This is very important file so you can find this file from our plugin dir..
		<br/><br/><br/>
		Thank you so much Enjoy!...
		<br/><br/><br/>
	
    </form>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="awesomeworks1@gmail.com">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="Developer fund">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
    <?php
    /**
     * form end 
     * @since 1.0
     */
    //submit form start 
    if (isset($_POST['submit'])) {
        $color = $_POST['color'];
        update_option('max_file_size', $color);
        //redirect on plugin dashboard page
        echo "<script>window.location='" . $_SERVER["REQUEST_URI"] . "'</script>";
    }
}

//filter
add_filter('upload_size_limit', 'ashu_increase_upload');

function ashu_increase_upload($bytes) {
    return get_option('max_file_size');
}
?>