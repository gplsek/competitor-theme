<?php get_header(); ?>

		<div id="mainTabs" class="main_column">
			<?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			} ?>
		<?php if (have_posts()) : ?>
		
		
        	
            
	
			<?php while (have_posts()) : the_post(); ?>	
            <?php edit_post_link('>> Edit this article','',''); ?>	

				<div class="article">
				
					<div class="entry">
						<h1 class="page-header"><?php the_title(); ?></h1> 
						<?php the_content('<span class="continue">Continue Reading</span>'); ?> 
					</div>
				
				</div><!--/article-->

			<?php endwhile; ?>



		<?php endif; ?>							

			</div><!--/main column-->

	<?php get_sidebar('page'); ?>

	<?php get_footer(); ?>