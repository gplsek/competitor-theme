<?php		
		$version = get_bloginfo('version');

		
		
			$featuredcat = get_option('comp_featured_category'); // ID of the Featured Category
			$ex_feat = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name='$featuredcat'");	
			
			$showposts = get_option('comp_other_entries'); // Number of other entries to be shown
	
		
		$archives = get_option('comp_archives'); // Name of the archives page
		$GLOBALS['archives_id'] = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$archives'");
		

?>