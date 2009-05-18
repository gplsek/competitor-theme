<?php get_header(); ?>

		<div id="mainTabs" class="main_column">
			<?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			} ?>
		<?php if (have_posts()) : ?>
	
			<?php while(have_posts()) : the_post();  $do_not_duplicate = $post->ID;
			$authorID = $post->post_author;?>		

							

				<div class="article">


				    <?php echo get_avatar($authorID,$size = '64'); ?>
					<h1 class="title"><a title="Permanent link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<h2 class="author"><?php the_author_posts_link(); ?></h2>
					<ul class="options">
		                        <?php
								    $count = 1;
									foreach((get_the_category()) as $category) {
									$linkcat = get_category_link($category->cat_ID);
                                    if ($count < 2) {									
										echo '<li><a href="'.$linkcat .'">'.$category->cat_name . '</a></li>'; 
									} 
                                    if ($count == 2){
										echo '<li class="last"><a href="'.$linkcat .'">'.$category->cat_name . '</a></li>'; 
									}
									if ($count==3){
										echo '(...)';
									}
									$count++;
									} 
								?>
								<!--<li><?php the_category('</li><li> ') ?></li>-->
								</ul>
					<ul class="article_info">
						<li class="first red"><?php the_time('d F Y'); ?></li>
		                <li><?php if(function_exists('the_views')) { the_views(); } ?></li>
		                <li><?php comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)'); ?></li>
					</ul>
					<p>
				    <?php the_content('<span class="continue">Continue Reading</span>'); ?> 

				   </p>	</div>
				
<?php wp_link_pages('before=<div class="pagination"><ul><li>Pages:</li>&after=</ul></div>&link_before=<li>&link_after=</li>'); ?>
			
                
<!--/article--><div id="archivebox">
<?php if(function_exists('the_views')) { the_views(); } ?>
<h2><em>Categorized |</em> <?php the_category(', ') ?></h2>
<?php if (function_exists('the_tags')) { ?><div class="singletags"><?php the_tags('Tags : ', ', ', ''); ?></div><?php } ?>  
<br/><strong><?php edit_post_link('>> Edit this article','',''); ?></strong>     
</div><!--/archivebox-->
				

<div id="comment">
    <?php comments_template(); ?>
</div>

		<?php endwhile; ?>
		
		
	
	<?php endif; ?>							

		</div><!--/main column-->

<?php get_sidebar('single'); ?>

<?php get_footer(); ?>