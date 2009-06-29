<?php
if (!function_exists('add_action')) {
	require_once('../../../../wp-config.php');
}

global $user_ID, $wpdb, $post, $current_category;



if (function_exists('dynamic_sidebar') && dynamic_sidebar('content') ) : else :
	

	
endif; 


?>
