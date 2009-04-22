	<div id="video-frame">
	
		<div class="video-right">
		
		<h2>RECENT VIDEOS</h2>
		<p>Click below to view videos...</p>
		
		<?php $videocat = get_option('woo_video_category'); // ID of the Video Category ?>
		
		<?php query_posts('showposts=6&category_name=' . $videocat); ?>
	
		<?php if (have_posts()) : ?>
		
			<ul class="idTabs">
	
			<?php while (have_posts()) : the_post(); ?>	
		
				<li><a href="#video-<?php the_ID(); ?>"><?php the_title(); ?></a></li>
			
			<?php endwhile; ?>
			
			</ul>	
		
		<?php endif; ?>
	
		</div><!--/video-right -->

	<?php if (have_posts()) : ?>
	
		<div class="video-left">

		<?php while (have_posts()) : the_post(); ?>	
	
			<div id="video-<?php the_ID(); ?>">
				<?php the_content('Read the rest of this entry &raquo;'); ?>
			</div>
		
		<?php endwhile; ?>
		
		</div><!--/video-left -->
	
	<?php endif; ?>
	
	</div><!--/video-frame -->