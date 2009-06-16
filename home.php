<?php
session_start();
?>
<?php get_header(); ?>

<?php /*<script type="text/javascript">
jQuery.noConflict();

	jQuery(function() {
		jQuery('#rotate > ul').tabs({ fx: {width: 'toggle', opacity: 'toggle', duration: '200' } }).tabs('rotate', 5000).tabs({ ajaxOptions: { async: false } });
	});
</script>*/
?>			



<script type="text/javascript">
jQuery.noConflict();
	jQuery(function() {
		
		//jQuery("#out a").attr('target', '_top');
		jQuery("#out a").click(function() {
						location.href = this.rel;
		                return false;
		              });
		jQuery("#mainTabs").tabs({ fx: { opacity: 'toggle' }});
	});
</script>

<script type="text/javascript">
jQuery.noConflict();
	jQuery(function() {
		jQuery("#contentTabs").tabs({ fx: { opacity: 'toggle' },
			ajaxOptions: { data: { pv: RN } }
		
		 });
	
	});
</script>


<script type="text/javascript">
jQuery.noConflict();
	//jQuery().click(function(event) {
		jQuery(function() {
		jQuery("#BottomFeature").tabs({
			fx: {opacity: 'toggle'},
			ajaxOptions: { data: { pv: RN } }
		});
	//$("#BottomFeature").data('disabled.tabs', []); 
	
	
	});
</script>

<script type="text/javascript">
jQuery.noConflict();
	// $(function() {
	// 	//$("#SiteSettings").accordion({ collapsible: true, active: 1 });
	// });
	</script>

<?
$template_path = get_bloginfo('template_directory');?>
           
            <div id="mainTabs" class="main_column">
			  
                <ul class="third_nav">


                    <li><a href="#meta-rotate">FEATURED STORIES</a></li>
                    <li><a href="<?= $template_path?>/video.php">TOP VIDEOS</a></li>
                    <li id="out">
						<?php $links = get_bookmarks('category_name=Hot');
						if (count($links) != 0)
						{
						?>
                        	<span style="float: left;">HOT:</span>
                        	<ul id="out">
						  	<?php 
								$count = 0;
								$i=count($links)-1;
								while( $count <= $i){
									$name = $links[$count]->link_name;
									$url = $links[$count]->link_url;
									if ($count == $i) {
										echo '<li id="out" class="last"><a id="out" rel="'.$url.'" href="'.$url.'" target="'.$links[$count]->link_target.'">'.$name.'</a></li>';
									} else {
										echo '<li id="out"><a id="out" href="'.$url.'" rel="'.$url.'" target="'.$links[$count]->link_target.'">'.$name.'</a></li>';
									}
									$count++;
								}  
						?>
                        	</ul>
						<?} // end check for empty links?>
                    </li>
                </ul>

			
			<?php /*<div class="marquee main_article" id="rotate"> */ ?>
			<?php /*<div id="rotate">*/ ?>
					<?php
					
					$url = get_option('siteurl');
					if(function_exists('wp_marquee_plugin')){
						?>
						<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/includes/js/marquee-show.js'></script>
						<script type="text/javascript">
						jQuery.noConflict();
						jQuery(document).ready(function() {		

							//Execute the slideShow
							slideShow();

						});
						</script>
						<?
						$m = new Marquee;
						$magazine = $m->get_magazine_name($url);
						//sleep(2);
						echo $m->to_tabs($magazine);
					}
					
					
					

					?>
					
					<?php 


					$page = get_query_var('paged');
					if (!($page == "")){
						$paging = "&paged=".$page;
						}

						$_SESSION['cat'] = "";
						$_SESSION['sort'] = "";
						$_SESSION['all'] = $select_all;


					$categories =  get_categories('hide_empty=0');
					$option = "";
					$select_all = "";

					if (($magazine == 'competitor') || ($magazine == 'hotparks') || ($magazine == 'tworld')) // custom setting for home
					{
					include(TEMPLATEPATH . '/layouts/custom_content.php');

						foreach ($categories as $cate) {

								if(in_array($cate->cat_ID,$sport_arr))
								{
									$option .= '<li><a href="'.$template_path.'/layouts/default.php?cat='.$cate->cat_ID.$paging.'" title="feature">'.$cate->cat_name .' ('.$cate->category_count.')</a></li>';
								$select_all .= $cate->cat_ID.",";

								}

							}

						if ($select_all == "")
						{
							$sport_category = get_cat_ID("sports");
							$sport_cats = get_categories('hide_empty=0&child_of='.$sport_category);
							
							foreach ($sport_cats as $cate) {
								
								$select_all .= $cate->cat_ID . ",";
								
								}
							$select_all = substr($select_all, 0, -1);
						}
					}
					else 
					{
						foreach ($categories as $cate) {
								if (get_option('comp_nav_categories_'.$cate->cat_ID)){
					  				$option .= '<li><a href="'.$template_path.'/layouts/default.php?cat='.$cate->cat_ID.$paging.'" title="feature">'.$cate->cat_name .' ('.$cate->category_count.')</a></li>';
						$select_all .= $cate->cat_ID.",";

						} //end if

					  } // end for each
					} // end else if




					?>
						<a name="top"></a>
				<div id="contentTabs" class="filters">
			  	  <ul id="TopFeature" class="main">
				        <li><a class="first active" href="<?= $template_path?>/layouts/default.php?select_all=<?= $select_all?>&sort=post_date<?= $paging ?>" title="feature">MOST RECENT</a></li>
                        <li><a href="<?= $template_path?>/layouts/default.php?select_all=<?= $select_all?>&sort=views<?= $paging ?>" title="feature">MOST VIEWED</a></li>
                        <li><a href="<?= $template_path?>/layouts/default.php?select_all=<?= $select_all?>&sort=comment_count<?= $paging ?>" title="feature">MOST COMMENTED</a></li>
                    </ul>
			<!--	</div>-->
			<!--	<div id="BottomFeature">-->
				    
					<p>SHOW ONLY:</p>
					<ul id="BottomFeature" class="secondary">


						<li><a href="<?= $template_path?>/layouts/default.php?cat=<?= $select_all?><?= $paging ?>" title="feature">All</a></li>
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