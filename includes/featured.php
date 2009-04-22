<?php 
	
	$featuredcat = get_option('woo_featured_category'); // ID of the Featured Category
	
	$the_query = new WP_Query('category_name=' . $featuredcat . '&showposts=5&orderby=post_date&order=desc');
	
	$counter = 0;
			
	while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
?>

	<?php $counter++; ?>
	
	<div class="featured" id="post-<?php the_ID(); ?>"> 
		
		<?php if ( get_post_meta($post->ID, 'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
			
			<div class="featured-img" style="background:url(<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=200&amp;w=350&amp;zc=1&amp;q=95) top left no-repeat;">
				<?php if ($counter == 1) { ?><div id="ribbon"><img src="<?php bloginfo('stylesheet_directory'); ?>/styles/<?php echo "$style_path"; ?>/ribbon.png" alt="Featured"  /></div><?php } ?> <!-- SHOW "FEATURED" RIBBON FOR FIRST POST ONLY -->
			</div>				
			
		<?php } else { ?> <!-- DISPLAY THE DEFAULT IMAGE, IF CUSTOM FIELD HAS NOT BEEN COMPLETED -->
			
			<div class="featured-img" style="background:url(<?php bloginfo('template_directory'); ?>/images/no-img-large.jpg) top left no-repeat;">
				<?php if ($counter == 1) { ?><div id="ribbon"><img src="<?php bloginfo('stylesheet_directory'); ?>/styles/<?php echo "$style_path"; ?>/ribbon.png" alt="Featured"  /></div><?php } ?> <!-- SHOW "FEATURED" RIBBON FOR FIRST POST ONLY -->
			</div>
			
		<?php } ?> 
	
		<h2><?php the_category(', ') ?></h2>
		<h3><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		<p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>
		<p style="margin-bottom:0px !important;"><span class="continue"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>">Continue Reading</a></span></p>
				
	</div><!--/featured-->

<?php endwhile; ?>

<div id="featured-th">

	<ul class="idTabs">

		<?php 
			$the_query = new WP_Query('category_name=' . $featuredcat . '&showposts=5&orderby=post_date&order=desc');
			
			$counter = 0;
					
			while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
		?>
		
		<?php $counter++; ?>

		<?php if ( get_post_meta($post->ID, 'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
			
			<li <?php if ($counter == 5) { ?>class="last"<?php } ?>><a href="#post-<?php the_ID(); ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=57&amp;w=100&amp;zc=1&amp;q=95" alt=""/></a></li>			
			
		<?php } else { ?> <!-- DISPLAY THE DEFAULT IMAGE, IF CUSTOM FIELD HAS NOT BEEN COMPLETED -->
			
			<li <?php if ($counter == 5) { ?>class="last"<?php } ?>><a href="#post-<?php the_ID(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/no-img-thumb.jpg" alt=""/></a></li>
			
		<?php } ?> 		
		
		<?php endwhile; ?>
	
	</ul>

</div><!--/featured-th-->