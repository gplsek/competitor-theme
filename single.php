<?php get_header(); ?>

		<div id="mainTabs" class="main_column">

		<?php if (have_posts()) : ?>
	
			<?php while(have_posts()) : the_post();  $do_not_duplicate = $post->ID;
			$authorID = $post->post_author;?>		

							

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
				    <?php the_content('<span class="continue">Continue Reading</span>'); ?> 

				   </p>

				</div><!--/article-->
				
				<div id="archivebox">
					<?php if(function_exists('the_views')) { the_views(); } ?>
						<h2><em>Categorized |</em> <?php the_category(', ') ?></h2>
						<?php if (function_exists('the_tags')) { ?><div class="singletags"><?php the_tags('Tags | ', ', ', ''); ?></div><?php } ?>        
						
				
				</div><!--/archivebox-->
				
				
				<div id="comment">
					<?php comments_template(); ?>
				</div>

		<?php endwhile; ?>
		
		
	
	<?php endif; ?>							

		</div><!--/main column-->

<?php get_sidebar('single'); ?>

<?php get_footer(); ?>