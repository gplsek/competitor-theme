<?php get_header(); ?>

		<div id="mainTabs" class="main_column">

			

			    	<h1><em>Search Results |</em> "<?php printf(__('\'%s\''), $s) ?>"</h1>       

			
			
		<?php if (have_posts()) : ?>
		
		
	
			<?php 
			$counter2 = 0;
			while(have_posts()) : the_post();  $do_not_duplicate = $post->ID;
			$authorID = $post->post_author;
		?>

				<?php $counter2++; ?>

				<div class="article">


				    <?php echo get_avatar($authorID,$size = '64'); ?>
					<h1><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<h2 class="author"><?php the_author_posts_link(); ?></h2>
					<ul class="options">
		                        <li><?php the_category('</li><li> ') ?></li></ul>
					<ul class="article_info">
						<li class="first red"><?php the_time('d F Y'); ?></li>
		                <li><?php if(function_exists('the_views')) { the_views(); } ?></li>
		                <li><?php comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)'); ?></li>
					</ul>
					<p>
				    <?php the_excerpt(); ?> 

				   </p>

				</div><!--/article-->

				<?php if ( !($counter2 == $showposts) && ($counter == 0) ) { echo '<div class="hl-full"></div>'; ?> <div style="clear:both;"></div> <?php } ?>

			<?php endwhile; ?>
		
		
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } 
			
			endif; ?>	
				
			</div><!-- End main column -->	

<?php get_sidebar(); ?>

<?php get_footer(); ?>	
