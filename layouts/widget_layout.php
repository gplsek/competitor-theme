<?php
if (!function_exists('add_action')) {
	require_once('../../../../wp-config.php');
}

global $user_ID, $wpdb, $post, $current_category;

?>
<div id="velonews-content">
	<div id="left-velonews">
		<div class="latest-tech">
			<h3>Latest Tech</h3>
			
			<ul class="list1">
				<?php 
				    $featcat = 'events';
					$the_query = new WP_Query('category_name='.$featcat.'&showposts=5&orderby=post_date&order=desc');	
					// $stick = get_option("sticky_posts");
					// 					print_r($stick);
					// 					query_posts(array(
					// 					'category_name' => $featcat, 
					// 					'posts__in' => $stick,
					// 					'orderby'=>'post_date',
					// 					'order'=>'desc',
					// 					));
					
					
						
					while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
					
							
							
						
				?>

					<li><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
					<label class="date"><?php the_date('M j'); ?></label><?php //the_advanced_excerpt(); ?></li>

				<?php endwhile;?>	
				<li><a href="/category/<?= $featcat;?>/">+ More</a>	</li>
			</ul>
		</div>
		<div class="ad-velonews">
			<h3>Ad</h3>
																													<script type="text/javascript" language="JavaScript">
			  aj_server = 'http://adj43.thruport.com/servlet/ajrotator/'; aj_tagver = '1.0';
			  aj_zone = 'inside'; aj_adspot = '619341'; aj_page = '0'; aj_dim ='317220'; aj_ch = '619342'; aj_ct = ''; aj_kw = '<?php echo $kw;?>';
			  aj_pv = true; aj_click = '';
			</script>
			<script type="text/javascript" language="JavaScript" src="http://img1.cdn.adjuggler.com/banners/ajtg.js"></script>
		</div>
	</div>
	<div id="right-velonews">
		<div class="latest-news">
			<h3>Latest News</h3>
			
			<ul class="list1">
				<?php 
				    $featcat = 'sports';
					$the_query = new WP_Query('category_name='.$featcat.'&showposts=5&orderby=post_date&order=desc');	
					
					// query_posts(array(
					// 					'category_name' => $featcat, 
					// 					'posts__in' => $stick,
					// 					'orderby'=>'post_date',
					// 					'order'=>'desc',
					// 					));
					// 					
					
						
					while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
					
					
				
				?>

					<li><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
					<label class="date"><?php the_date('M j'); ?></label><?php //the_advanced_excerpt(); ?></li>

				<?php endwhile;?>	
				<li><a href="/category/<?= $featcat;?>/">+ More</a>	</li>
			</ul>
		</div>
	</div>
</div>
<div id="velonews-widget">
<?php
if (function_exists('dynamic_sidebar') && dynamic_sidebar('content') ) : else :
	

	
endif; 
?>
</div>