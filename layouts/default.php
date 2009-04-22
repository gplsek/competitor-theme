<?php

if (!function_exists('add_action')) {
	require_once('../../../../wp-config.php');
}

global $user_ID, $wpdb, $post, $current_category;

	include('../includes/version.php');
	
	$order = "&orderby=post_date";
	
	if (!($_GET['sort'] == ""))
	{
		$order = "&orderby=".$_GET['sort'];
		$_SESSION['sort'] = $_GET['sort'];
		
			if ($_GET['sort'] == 'views')
			{
				$order = "&v_sortby=views";
			}
	}
	else if ((!($_SESSION['sort'] == "")) && ($_GET['sort'] == ""))
	{
		$order = "&orderby=".$_SESSION['sort'];
		
		if ($_SESSION['sort'] == 'views')
		{
			$order = "&v_sortby=views";
		}
	}
	
	
	if (!($_GET['cat'] == ""))
		{
			
			$show_category = 'cat='. $_GET['cat'] .'&';
			$_SESSION['cat'] = $_GET['cat'];
		}
	else if ((!($_SESSION['cat'] == "")) && ($_GET['cat'] == ""))
		{
			$show_category = 'cat='. $_SESSION['cat'] .'&';
			
			
		}
		
		
	if (($_GET['cat'] == "All") || ($_SESSION['cat'] == "All"))
		{
			$show_category = "";
		}
		
		
	if (!($_GET['paged'] == ""))
	{
		$paged = "&paged=".$_GET['paged'];
	}
	//echo $show_category . "sort:". $order;		
	
	query_posts($show_category.'showposts=' . $showposts . $order . $paged .'&order=DESC');
	
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
                <li><?php //comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)'); ?>Comments: (<?= $post->comment_count; ?>)</li>
			</ul>
			<p>
		    	<?php //echo strip_tags(get_the_excerpt(), '<a><strong>'); ?>
			    <?php the_advanced_excerpt('length=125'); ?>
		   
		   </p>
			
		</div><!--/article-->
		
		<?php if ( !($counter2 == $showposts) && ($counter == 0) ) { echo '<div class="hl-full"></div>'; ?> <div style="clear:both;"></div> <?php } ?>
	
	<?php endwhile; ?>
	
