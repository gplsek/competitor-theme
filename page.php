<?php get_header(); ?>

		<div id="mainTabs" class="main_column">

		<?php if (have_posts()) : ?>
		
		
        	
            
	
			<?php while (have_posts()) : the_post(); ?>		

				<div class="article">
		
					<div class="entry">
						<?php the_content('<span class="continue">Continue Reading</span>'); ?> 
					</div>
				
				</div><!--/article-->

			<?php endwhile; ?>



		<?php endif; ?>							

			</div><!--/main column-->

	<?php get_sidebar(); ?>

	<?php get_footer(); ?>