<?php
/*
Template Name: Sitemap
*/
?>

<?php get_header(); ?>

		<div class="col1">
		
			<div id="archivebox">
				
					<h2><?php the_title(); ?></h2>        
			
			</div><!--/archivebox-->
			
			<div class="arclist fl" style="width:100%">
			
				<h2>Pages</h2>
	
				<ul>
					<?php wp_list_pages('depth=1&sort_column=menu_order&title_li=' ); ?>		
				</ul>				
			
			</div><!--/arclist-->
			
			<div class="fix"></div>

			<div class="arclist fl" style="width:100%">
			
				<h2>Categories</h2>
	
				<ul>
					<?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
				</ul>				
			
			</div><!--/arclist-->
			
			<div class="fix"></div>

			<div class="arclist fl" style="width:100%">

			<?php
		
				$cats = get_categories();
				foreach ($cats as $cat) {
		
				query_posts('cat='.$cat->cat_ID);
	
			?>
			
				<h2><?php echo $cat->cat_name; ?></h2>
	
				<ul>	
						<?php while (have_posts()) : the_post(); ?>
						<li style="font-weight:normal !important;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - Comments (<?php echo $post->comment_count ?>)</li>
						<?php endwhile;  ?>
				</ul>
		
		<?php } ?>					
			
			</div><!--/arclist-->												

		</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>