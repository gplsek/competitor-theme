<?php
/*
Template Name: Search Template
*/
?>
<?php get_header(); ?>

		<div id="mainTabs" class="main_column">
			<?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			} ?>
		<?php if (have_posts()) : ?>
			
			
			<h2 class='pageheading'><?php the_title(); ?></h2> 
		
		
        	
            
	
			<?php while (have_posts()) : the_post(); ?>		

				
		
					<div class="entry">
						<div id="cse-search-results"></div>
						<script type="text/javascript">
						  var googleSearchIframeName = "cse-search-results";
						  var googleSearchFormName = "cse-search-box";
						  var googleSearchFrameWidth = 600;
						  var googleSearchDomain = "www.google.com";
						  var googleSearchPath = "/cse";
						</script>
						<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>

						
					
				
				</div><!--/article-->

			<?php endwhile; ?>



		<?php endif; ?>							

			</div><!--/main column-->

	<?php get_sidebar('home'); ?>

	<?php get_footer(); ?>