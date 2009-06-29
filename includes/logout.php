<?php
global $user_ID, $wpdb, $post, $current_category;
require("constants.php");
require('../../../../wp-config.php' );
wp_logout();
wp_redirect("/");
?>


