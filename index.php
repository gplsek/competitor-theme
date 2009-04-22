<?php get_header(); ?>

		<div class="col1">

			<?php include(TEMPLATEPATH . '/includes/featured.php'); ?>

			<?php
				
				$showvideo = get_option('woo_show_video');

				if($showvideo){ include(TEMPLATEPATH . '/includes/video.php'); }
				
			?>

			<?php
				
				$layout = get_option('woo_layout');

				include('layouts/'.$layout);
				
			?>

		</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>