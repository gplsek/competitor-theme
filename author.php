<?php get_header(); ?>

<?php
if(get_query_var('author_name')) :
$curauth = get_userdatabylogin(get_query_var('author_name'));
else :
$curauth = get_userdata(get_query_var('author'));
endif;
?>


<div id="mainTabs" class="main_column">
	<?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			} ?>

<h1><?php echo $curauth->display_name; ?></h1><br />
<?php echo get_avatar($curauth->ID,$size = '100'); ?><p><?php echo $curauth->description; ?></p>
                    
                          

			<!--/archivebox-->
		<br /><h2>Articles posted by <?php echo $curauth->display_name; ?> </h2>	
		<?php if (have_posts()) : ?>
		
		
	
			<?php 
			$counter2 = 0;
			while(have_posts()) : the_post();  $do_not_duplicate = $post->ID;
			$authorID = $post->post_author;
		?>

				<?php $counter2++; ?>

				<div class="article">


				    <?php //echo get_avatar($authorID,$size = '64'); ?>
					<h1><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1><br />
				
					<ul class="article_info">
						<li class="first red"><?php the_time('d F Y'); ?></li>
		                <li><?php if(function_exists('the_views')) { the_views(); } ?></li>
		                <li><?php comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)'); ?></li>
					</ul>
					<p>
				    <?php the_content('<span class="continue">Continue Reading</span>'); ?> 

				   </p>

				</div><!--/article-->

				<?php if ( !($counter2 == $showposts) && ($counter == 0) ) { echo '<div class="hl-full"></div>'; ?> <div style="clear:both;"></div> <?php } ?>

			<?php endwhile; ?>
		
		
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } 
			
			endif; ?>	
				
			</div><!-- End main column -->	

<?php get_sidebar('home'); ?>

<?php get_footer(); ?>	
