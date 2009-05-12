<?php
/*
Template Name: Event Page
*/
?>
<?php get_header(); ?>

		<div id="mainTabs" class="main_column">
			<?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			} ?>
		<?php if (have_posts()) : ?>
			
			
			<h2 class='pageheading'><?php the_title(); ?></h2> 
		
		
        	
            
	
			<?php while (have_posts()) : the_post(); ?>		

				<div class="article">
		
					<div class="entry">
						<?php the_content('<span class="continue">Continue Reading</span>'); ?> 
					</div>
				
				</div><!--/article-->

			<?php endwhile; ?>



		<?php endif; ?>							

			</div><!--/main column-->

	<?php get_sidebar('page'); ?>

	<?php get_footer(); ?>