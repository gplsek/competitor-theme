<?php
if (!function_exists('add_action')) {
	require_once('../../../../wp-config.php');
}

global $user_ID, $wpdb, $post, $current_category;

?>
<div id="velonews-content">
	<div id="left-velonews">
		<div class="latest-tech">
			<h3>Latest Tech</h3>
		</div>
		<div class="ad-velonews">
			<h3>Ad</h3>
		</div>
	</div>
	<div id="right-velonews">
		<div class="latest-news">
			<h3>Latest News</h3>
		</div>
	</div>
</div>
<div id="velonews-widget">
<?php
if (function_exists('dynamic_sidebar') && dynamic_sidebar('content') ) : else :
	

	
endif; 
?>
</div>