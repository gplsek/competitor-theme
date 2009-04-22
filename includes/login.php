<?php
global $user_ID, $wpdb, $post, $current_category;
require("constants.php");
require('../../../../wp-config.php' );

wp_head();
$redir = $_GET['redir'];
?>

<?php sidebarlogin($redir); ?>
