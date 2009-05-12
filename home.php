<?php
session_start();
?>
<?php get_header(); 
$template_path = get_bloginfo('template_directory');?>
            <div class="border"></div>
            <div id="mainTabs" class="main_column">
			  
                <ul class="third_nav">


                    <li><a href="#rotate">FEATURED STORIES</a></li>
                    <li><a href="<?= $template_path?>/video.php">TOP VIDEOS</a></li>
                    <li id="out">
                        <span style="float: left;">HOT:</span>
                        <ul id="out">
                         <?php //wp_list_bookmarks('title_li=&categorize=0&category_name=Hot'); ?>
						  <?php $links = get_bookmarks('category_name=Hot');
							$count = 0;
							$i=count($links)-1;
							while( $count <= $i){
								$name = $links[$count]->link_name;
								$url = $links[$count]->link_url;
								if ($count == $i) {
									echo '<li id="out" class="last"><a id="out" rel="'.$url.'" href="'.$url.'">'.$name.'</a></li>';
								} else {
									echo '<li id="out"><a id="out" href="'.$url.'" rel="'.$url.'">'.$name.'</a></li>';
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
			
			$categories =  get_categories('hide_empty=0');
			$option = "";
			$all = "";
			foreach ($categories as $cate) {

				if (get_option('comp_nav_categories_'.$cate->cat_ID)){
			  	$option .= '<li><a href="'.$template_path.'/layouts/default.php?cat='.$cate->cat_ID.$paging.'" title="feature">'.$cate->cat_name .' ('.$cate->category_count.')</a></li>';
				$all .= $cate->cat_ID.",";

			}

			  }
			
			
			
			
			
			$page = get_query_var('paged');
			if (!($page == "")){
				$paging = "&paged=".$page;
				}
				
				$_SESSION['cat'] = "";
				$_SESSION['sort'] = "";
				$_SESSION['all'] = $all;
				
			?>
			<a name="top"></a>
				<div id="contentTabs" class="filters">
			  	  <ul id="TopFeature" class="main">
				        <li><a class="first active" href="<?= $template_path?>/layouts/default.php?all=<?= $all?>&sort=post_date<?= $paging ?>" title="feature">MOST RECENT</a></li>
                        <li><a href="<?= $template_path?>/layouts/default.php?all=<?= $all?>&sort=views<?= $paging ?>" title="feature">MOST VIEWED</a></li>
                        <li><a href="<?= $template_path?>/layouts/default.php?all=<?= $all?>&sort=comment_count<?= $paging ?>" title="feature">MOST COMMENTED</a></li>
                    </ul>
			<!--	</div>-->
			<!--	<div id="BottomFeature">-->
				
					<p>SHOW ONLY:</p>
					<ul id="BottomFeature" class="secondary">


						<li><a href="<?= $template_path?>/layouts/default.php?cat=<?= $all?><?= $paging ?>" title="feature">All</a></li>
						<?= $option;?>


					</ul>
						
				</div>              

		
			
		
				<div id="feature">
				</div>

            <!--</div>--><!-- End Filters-->				
						
					
			<!-- Aca dentro van los articles pero creo que no -->	
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>		
			<!-- <div class='homewidgets'>
							
							<?php //if (function_exists('dynamic_sidebar') && dynamic_sidebar('homewidgets') ) : else : ?>		



								<?php //endif; ?>
								
								
						</div> -->
			</div><!-- End main column -->

<?php get_sidebar('home'); ?>

<?php get_footer(); ?><?php get_footer(); ?>