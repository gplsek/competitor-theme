<?php
/*
Template Name: Archives Page
*/
?>

<?php get_header(); ?>

		<div class="col1">
		
			<div id="archivebox">
				
					<h2><?php the_title(); ?></h2>        
			
			</div><!--/archivebox-->
			
			<div class="arclist fl">
			
				<h2>CATEGORIES</h2>
	
				<ul>
					<?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
				</ul>				
			
			</div><!--/arclist-->
			
			<div class="arclist fr">
			
				<h2>ARCHIVES</h2>
	
				<ul>
					<?php wp_get_archives('type=monthly&show_post_count=1') ?>	
				</ul>				
			
			</div><!--/arclist-->
			
			<div class="fix"></div>
			
			<?php if (function_exists('wp_tag_cloud')) { ?>
			
				<div id="archivebox">
					
						<h2 style="margin-bottom:10px;">POPULAR TAGS</h2>

						<ul class="list1">
							<?php wp_tag_cloud('smallest=10&largest=18'); ?>
						</ul>						        
				
				</div><!--/archivebox-->
			
			<?php } ?>															

		</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>