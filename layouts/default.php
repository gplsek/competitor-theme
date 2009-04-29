<?php
session_start();


if (!function_exists('add_action')) {
	require_once('../../../../wp-config.php');
}

global $user_ID, $wpdb, $post, $current_category;

	include('../includes/version.php');
	
	$order = "&orderby=post_date";
	
	//echo "Here we are set session: ".$_SESSION['cat'];
	
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
			//echo "Here we are session: ".$_SESSION['cat'];
		}
	else if ((!($_SESSION['cat'] == "")) && ($_GET['cat'] == ""))
		{
			$show_category = 'cat='. $_SESSION['cat'] .'&';
			//echo "Here we are session2: ".$_SESSION['cat'];
			
			
		}
		
		
	if (($_GET['cat'] == "") && ($_SESSION['cat'] == ""))
		{
			$show_category = 'cat='.$_GET['all'] .'&';
			//echo "Here we are".$_GET['all'];
		}
		
		
	if (!($_GET['paged'] == ""))
	{
		$paged = "&paged=".$_GET['paged'];
	}
			
	
	query_posts($show_category.'showposts=' . $showposts . $order . $paged .'&order=DESC');
	//echo "TEST: ".$show_category;
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
										echo '<li>(...)</li>';
									}
									$count++;
									} 
								?>
						<!--<li><?php the_category('</li><li> ') ?></li>-->
						</ul>
			<ul class="article_info">
				<li class="first red"><?php the_time('d F Y'); ?></li>
                <li><?php if(function_exists('the_views')) { the_views(); } ?></li>
                <li><?php //comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)'); ?>Comments: (<?= $post->comment_count; ?>)</li>
			</ul>
			<p>
		    	<?php //echo strip_tags(get_the_excerpt(), '<a><strong>'); ?>
			    <?php 
				if (!($post->post_excerpt)){
				//the_advanced_excerpt('length=125');
				the_content();
				}
				else 
				{
					echo $post->post_excerpt;
				} ?>
		   
		   </p>
			
		</div><!--/article-->
		
		
		<?php 
		if (($counter2 == '4') || ($counter2 == '8'))
		{
			echo "<div class='ad468x60'>ADVERTIZEMENT GOES HERE</div>";
		}
		if ( !($counter2 == $showposts) && ($counter == 0) ) { echo '<div class="hl-full"></div>'; ?> <div style="clear:both;"></div> <?php } ?>
	
	<?php endwhile; ?>
	
