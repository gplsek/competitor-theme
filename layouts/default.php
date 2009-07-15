<?php
session_start();

if (!function_exists('add_action')) {
	require_once('../../../../wp-config.php');
}

global $user_ID, $wpdb, $post, $current_category;

	include('../includes/version.php');
	
	$pv = $_GET['pv'];
	$kw = $_GET['kw'];
	$url = get_option('siteurl');
	
	$magazine = get_mag($url);
	
	
	$order = "&orderby=post_date";
	$showposts = get_option('comp_other_entries');
	
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
			$show_category = 'cat='.$_GET['select_all'] .'&';
			//echo "Here we are".$_GET['all'];
		}
		
		
	if (!($_GET['paged'] == ""))
	{
		$paged = "&paged=".$_GET['paged'];
		//echo $paged;
	}
			
	
	query_posts($show_category.$order . $paged .'&order=DESC');
	//echo "TEST: ".$show_category.'showposts=' . $showposts . $order . $paged .'&order=DESC';
	$counter2 = 0;
			
	echo '<span id="top" name="top"></span>';
	while(have_posts()) : the_post();  $do_not_duplicate = $post->ID;
	$authorID = $post->post_author;
?>
	
		<?php $counter2++; ?>
				
		<div class="article">
	
			

                         <?php

								if (($magazine == 'competitor') || ($magazine == 'hotparks') || ($magazine == 'tworld') || ($magazine == 'runrocknroll')) // custom setting for home
								{
									echo '<ul class="options">';
									echo '<li class="last"><a href="http://'.get_mag($post->guid).'.competitor.com"> Competitor '.ucfirst  (get_mag($post->guid)). '</a></li>';
									
									?>
									</ul>
									<?php echo get_avatar($authorID,$size = '45'); ?>
									<h1 class="title">
						           <a title="Permanent Link to <?php the_title(); ?>" href="<?php 	echo $post->guid; ?>" rel="bookmark"><?php the_title(); ?></a>
						
							</h1>
							<h2 class="author">
								<?
								$authordata = get_userdata( $post->post_author );
								
								?>
							<a href="http://<?= get_mag($post->guid);?>.competitor.com/author/<?= $authordata->user_login;?>"><?= $authordata->display_name;?></a><?php
							
							//the_author_posts_link(); ?></h2>
							<ul class="article_info">
								<li class="first"><?php the_time('F d Y'); ?></li>
							</ul>
							<p>
							    <?php 
								if (!($post->post_excerpt)){
								
											the_content('');
											?>
											<a class="more-link" href="<?= $post->guid;?>">&raquo; Read Full Story</a>
											<?	
										}
								else 
										{
											//	echo $post->post_excerpt;
											the_excerpt();
											?>
											<a class="more-link" href="<?php the_permalink() ?>">&raquo; Read Full Story</a>
											<?
										} ?>

						   </p>
									
								<?	
									 
							} // end competitor and runrnr landing page
								else
								{
								    echo '<ul class="options">';
									$count = 1;
									$catarray = get_the_category();
									$limite = count($catarray);
									foreach(($catarray) as $category) {
									$linkcat = get_category_link($category->cat_ID);
                                    if (($count < 3) AND ($count < $limite) AND ($limite > 1)) {									
										echo '<li><a href="'.$linkcat .'">'.$category->cat_name . '</a></li>'; 
									} 
                                    if (($count == 3) OR ($limite == 1)){
										echo '<li class="last"><a href="'.$linkcat .'">'.$category->cat_name . '</a></li>'; 
									}
									if ($count==4){
										echo '<li>(&hellip;)</li>';
									}
									$count++;
									}
								 
								?>
						
						</ul>
			
		    <?php echo get_avatar($authorID,$size = '45'); ?>
			<h1 class="title">
            	
						<a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>

            </h1>
			<h2 class="author"><?php the_author_posts_link(); ?></h2>
			<ul class="article_info">
				<li class="first"><?php the_time('F d Y'); ?></li>
                <li><?php if(function_exists('the_views')) { the_views(); } ?></li>
                <li>Comments: (<?= $post->comment_count; ?>)</li>
			</ul>
			<p>
			    <?php 
				if (!($post->post_excerpt)){
						the_content('&raquo; Read Full Story');
					}
				else 
				{
					//	echo $post->post_excerpt;
					the_excerpt();
					?>
					<a class="more-link" href="<?php the_permalink() ?>">&raquo; Read Full Story</a>
					<?
				} ?>
		      
		   </p>
			<? } // end regular magazine ?>
		</div><!--/article-->
		
		
		<?php 
		if (($counter2 == 4) && (get_option('comp_content_ads') == 0)) 
		{ // start add % 4 == 0
			//echo $counter2;
		?>
		
		<div id="inlinead">
			<iframe width="468" height="60" noresize scrolling=No frameborder=0 marginheight=0 marginwidth=0 src="http://adj43.thruport.com/servlet/ajrotator/619348/0/vh?z=inside&dim=317216&kw=<?= $kw?>&pv=<?= $pv;?>"></iframe>
			</div>
		
	
		
	<!--	</div>-->
		<?php 
		}else if (($counter2 == 8) && (get_option('comp_content_ads2') == 0))
		{ //echo $counter2; //% 8 == 0
			?>
		<div id="inlinead"><iframe width="468" height="60" noresize scrolling=No frameborder=0 marginheight=0 marginwidth=0 src="http://adj43.thruport.com/servlet/ajrotator/625256/0/vh?z=inside&dim=317216&kw=<?= $kw?>&pv=<?= $pv;?>"></iframe>
			</div>
			<?php //end add
			
		}
		/*
		if ( !($counter2 == $showposts) && ($counter == 0) ) { echo '<div class="hl-full"></div>'; ?> <div style="clear:both;"></div> <?php } 
		*/
		?>
	
	<?php endwhile; ?>
	
