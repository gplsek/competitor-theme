<?php
/*
Template Name: Wide
*/
?>
	
<?php get_header(); ?>

		<div id="mainTabs" class="main_column full">
			


		<?php if (have_posts()) : ?>
		
	
			<?php while (have_posts()) : the_post(); ?>
                <?php edit_post_link('>> Edit this article','',''); ?>			

				<div class="article main_wide_column">
                	<h1 class="page-header"><?php the_title(); ?></h1> 
						<?php the_content('<span class="continue">Continue Reading</span>'); ?> 
					
				</div>
			<?php endwhile; ?>
	
		<?php endif; ?>	
								

</div><!--/main column-->



<?php get_footer(); ?>