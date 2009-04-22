<?php
$ad_page = get_bloginfo('wpurl').'/'.get_option('woo_ad_page') . '/';

$numbers = range(1, 4);
$counter = 0;

$img_url = array();
$dest_url = array();

shuffle($numbers);

foreach ($numbers as $number) {
	
	$counter++;
	
	$img_url[$counter] = get_option('woo_ad_image_'.$number);
	$dest_url[$counter] = get_option('woo_ad_url_'.$number);
	
}
?> 