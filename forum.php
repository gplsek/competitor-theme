<?php
/*
Template Name: Forum
*/
?>
	
<?php get_header(); ?>

		<div id="mainTabs" class="main_column full">
			


		<?php if (have_posts()) : ?>
		
	
			<?php while (have_posts()) : the_post(); ?>		

				<div class="article main_wide_column">
						<?php the_content('<span class="continue">Continue Reading</span>'); ?> 
					
				</div>
			<?php endwhile; ?>
	
		<?php endif; ?>	
								

</div><!--/main column-->



<?php get_footer(); ?>