<?php
session_start();
?>
<?php get_header(); ?>
            <div class="border"></div>
            <div id="mainTabs" class="main_column">
			  
                <ul class="third_nav">


                    <li><a href="#rotate">FEATURED STORIES</a></li>
                    <li><a href="/wp-content/themes/pandemia-news/video.php">TOP VIDEOS</a></li>
                    <li>
                        <span style="float: left;">HOT:</span>
                        <ul>
                         <?php //wp_list_bookmarks('title_li=&categorize=0&category_name=Hot'); ?>
						  <?php $links = get_bookmarks('category_name=Hot');
							$count = 0;
							$i=count($links)-1;
							while( $count <= $i){
								$name = $links[$count]->link_name;
								$url = $links[$count]->link_url;
								if ($count == $i) {
									echo '<li class="last"><a href="'.$url.'">'.$name.'</a></li>';
								} else {
									echo '<li><a href="'.$url.'">'.$name.'</a></li>';
								}
								$count++;
							}  
						?>
                        </ul>
                    </li>
                </ul>

			
			<div class="marquee main_article" id="rotate">
					<?php
					
					$url = get_option('siteurl');
					$m = new Marquee;
					$magazine = $m->get_magazine_name($url);
					//sleep(2);
					echo $m->to_tabs($magazine);
					
					
					

					?>
			</div><!-- End main article -->
		
			<?php
			$page = get_query_var('paged');
			if (!($page == "")){
				$paging = "&paged=".$page;
				}
				
				$_SESSION['cat'] = "";
				$_SESSION['sort'] = "";
			?>
				<div id="contentTabs" class="filters">
			  	  <ul id="TopFeature" class="main">
				        <li><a class="first active" href="/wp-content/themes/pandemia-news/layouts/default.php?sort=post_date<?= $paging ?>" title="feature">MOST RECENT</a></li>
                        <li><a href="/wp-content/themes/pandemia-news/layouts/default.php?sort=views<?= $paging ?>" title="feature">MOST VIEWED</a></li>
                        <li><a href="/wp-content/themes/pandemia-news/layouts/default.php?sort=comment_count<?= $paging ?>" title="feature">MOST COMMENTED</a></li>
                    </ul>
			<!--	</div>-->
			<!--	<div id="BottomFeature">-->
						<?php include(TEMPLATEPATH . '/layouts/homefeaturenav.php'); ?>
				</div>              

		
			
		
				<div id="feature">
				</div>

            <!--</div>--><!-- End Filters-->				
						
					
			<!-- Aca dentro van los articles pero creo que no -->	
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>		
			</div><!-- End main column -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>