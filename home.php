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





<?
$_SESSION['cat'] = "";
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
						<?php
						$m = new Marquee;
						$magazine = $m->get_magazine_name($url);
						//sleep(2);
						echo $m->to_tabs($magazine);
					}
					
					//echo get_mag(get_option('siteurl'));
					if ((get_mag(get_option('siteurl')) == "hotparks"))  //change to velonews when we go live
					{
						include_once(TEMPLATEPATH . '/layouts/widget_layout.php');
					}
					else
					{
						include_once(TEMPLATEPATH . '/layouts/blog_layout.php');
					}

					?>
					
					
					
					
					
			</div><!-- End main column -->

<?php get_sidebar('home'); ?>

<?php get_footer(); ?><?php get_footer(); ?>