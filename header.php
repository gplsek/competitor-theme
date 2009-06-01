<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<title>
<?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?>
<?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Search Results<?php } ?>
<?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_page() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php wp_title(''); ?><?php } ?>
<?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archive&nbsp;|&nbsp;<?php single_cat_title(); ?><?php } ?>
<?php if ( is_month() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archive&nbsp;|&nbsp;<?php the_time('F'); ?><?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?>
</title>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php  echo get_bloginfo_rss('rss2_url');  ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" type="text/css"  href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />

<!--[if IE 6]>
<script src="<?php bloginfo('template_directory'); ?>/DD_belatedPNG.js"></script>
<script type="text/javascript">
DD_belatedPNG.fix('a, div, img');
</script>
<![endif]--> 
<?php wp_head(); ?>  
	
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/includes/js/facebox/facebox.css" type="text/css" media="print, projection, screen">
<script type="text/javascript">
jQuery.noConflict();
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox();
	   $.facebox.settings.opacity = 0.8; 
	})
	
</script>
   <script src="<?php bloginfo('template_directory'); ?>/includes/js/jquery.hoverIntent.minified.js" type="text/javascript">

</script>
    <script type="text/javascript" charset="utf-8">
jQuery.noConflict();
    jQuery(document).ready(function() {
      
      function addMega(){
        jQuery(this).addClass("hovering");
        }

      function removeMega(){
        jQuery(this).removeClass("hovering");
        }

    var megaConfig = {
         interval: 500,
         sensitivity: 4,
         over: addMega,
         timeout: 500,
         out: removeMega
    };

    jQuery("li.mega").hoverIntent(megaConfig)

      
    });

</script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/jquery.hint.js"></script>

<script type="text/javascript">
jQuery.noConflict();
			jQuery(function(){ 
			    // find all the input elements with title attributes
				jQuery('input[title!=""]').hint();
			});
		</script>

</head>
<body <?php
         if (get_option('compbackground') != "") {
         echo 'style="background-image:url(' . get_option('compbackground') . ')"';
       } 
?>>
<?php
	$template_path = get_bloginfo('template_directory');
	$GLOBALS['defaultgravatar'] = $template_path . '/images/gravatar.jpg';
?>
<div id="top-bar">
<a href="http://www.competitor.com"><p class="comp logo">Competitor.com</p></a>
    <ul>
        <li><a href="http://www.competitor.com">Competitor</a>  &nbsp;|  </li>
        <li><a href="http://www.velonews.com/">Cycling</a> &nbsp;  |  </li>
        <li><a href="http://triathlon.competitor.com/">Triathlon</a>  &nbsp; |  </li>
        <li><a href="http://running.competitor.com">Running</a>  &nbsp; |  </li>
        <li><a href="http://runrocknroll.competitor.com">Rock 'n' Roll Marathons</a></li>
    </ul>
</div>

<div id="container">
<div id="logo">
	<a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a>
</div>
        

	<?php  // get add keywords   
    $cat = get_category_by_path(get_query_var('category_name'),false);
    $category = $cat->cat_ID;
    $cat_name = $cat->category_nicename;
    if (is_home())
    {
    $cat_name = 'home';
    }
    
    $magazine_name = get_mag(get_option('siteurl'));
    //$cat_name = str_replace('&','',$cat_name);
    $kw = $magazine_name.','.$cat_name;
    $_SESSION['kw'] = $kw;


	if ($magazine_name == "runrocknroll")
				{
								echo '<div id="rnrcities">';
								echo "<ul class='event_list'>";
								$links = get_bookmarks('category_name=runrnr&orderby=order&category_orderby=order');
								$count = 0;
								$i=count($links)-1;
								while( $count <= $i){
									$name = $links[$count]->link_name;
									$url = $links[$count]->link_url;
									if ($count == $i) {
										echo '<li class="last"><a href="'.$url.'" target="'.$links[$count]->link_target.'">'.$name.'</a></li>';
									} else {
										echo '<li><a href="'.$url.'" target="'.$links[$count]->link_target.'">'.$name.'</a></li>';
									}
									$count++;
								}  
							echo "</ul>";
					
				}
				else
				{



    ?>
	<div id="banner">
	<script type="text/javascript" language="JavaScript">
    aj_server = 'http://adj43.thruport.com/servlet/ajrotator/'; aj_tagver = '1.0';
    aj_zone = 'inside'; aj_adspot = '619316'; aj_page = '0'; aj_dim ='317217'; aj_ch = ''; aj_ct = ''; aj_kw = '<?= $kw?>';
    aj_pv = true;aj_pv_rnd = '<?= session_id();?>'; aj_click = '';
    </script><script type="text/javascript" language="JavaScript" src="http://img1.cdn.adjuggler.com/banners/ajtg.js"></script>

	<?php }?>
</div>
	
	 <div id="content">
            <div class="nav_bars">
                <ul id="menu" class="main_nav">
					 
					 <?php //wp_list_bookmarks('title_li=&categorize=0&category_name=MainNav'); ?>
					  <?php $links = get_bookmarks('category_name=MainNav&orderby=order&category_orderby=order');
							$count = 0;
							$i=count($links)-1;
							while( $count <= $i){
								$name = $links[$count]->link_name;
								$url = $links[$count]->link_url;
								if ($links[$count]->link_description==""){
									if ($count == $i) {
										echo '<li class="last"><a href="'.$url.'" target="'.$links[$count]->link_target.'">'.$name.'</a></li>';
									} else {
										echo '<li><a href="'.$url.'" target="'.$links[$count]->link_target.'">'.$name.'</a></li>';
									}
								} else {
									if ($count == $i) {
										echo '<li class="mega last"><a href="'.$url.'" target="'.$links[$count]->link_target.'">'.$name.'</a><div>';
									} else {
										echo '<li class="mega"><a href="'.$url.'" target="'.$links[$count]->link_target.'">'.$name.'</a><div>';
									}
									//echo ''. $links[$count]->link_notes .'</div></li>';
								    $recentPosts = new WP_Query();
									$recentPosts->query('page_id='.$links[$count]->link_description);
									 while ($recentPosts->have_posts()) : $recentPosts->the_post(); 
													echo $links[$count]->link_description;
												//	the_content(); /* this pulls in post content in the header and breaks the posts*/
									 									endwhile; 
                                    echo '</div></li>';

								}
								
								$count++;
							}  
						?>
                </ul>
                <ul class="sec_nav">
                
                <?php //wp_list_bookmarks('title_li=&categorize=0&category_name=Sub'); ?>
				 <?php $links = get_bookmarks('category_name=Sub&orderby=order&category_orderby=order');
							$count = 0;
							$i=count($links)-1;
							while( $count <= $i){
								$name = $links[$count]->link_name;
								$url = $links[$count]->link_url;
								if ($count == $i) {
									echo '<li class="last"><a href="'.$url.'" target="'.$links[$count]->link_target.'">'.$name.'</a></li>';
								} else {
									echo '<li><a href="'.$url.'" target="'.$links[$count]->link_target.'">'.$name.'</a></li>';
								}
								$count++;
							}  
						?>
                </ul>


				<form action="<?php bloginfo('url'); ?>/search" id="cse-search-box">
				  <fieldset>
				    <input type="hidden" name="cx" value="<?php echo get_option('comp_google_search');?>" />
				    <input type="hidden" name="cof" value="FORID:10" />
				    <input type="hidden" name="ie" value="UTF-8" />
				    <input type="text" name="q" size="31" value="" title="SEARCH" />
				    <!-- <input type="submit" name="sa" value="Search" /> -->

				 </fieldset>
				</form>

				<script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&lang=en"></script>


	
	   					<div class="signin">
					                    <?php
											if ($user_ID != '') {
												// User is logged in
												global $current_user;
												get_currentuserinfo();
												echo  '<p>Welcome '.$current_user->display_name;

												echo "<a  class=\"cursive\" href='".wp_sidebarlogin_current_url('logout')."'>[".__(' Logout')."]</a>";
												echo '</p>';
											} else {
												?>
								                    <p>
								                        <a href="<?php bloginfo('template_directory'); ?>/includes/login.php?redir=<?= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>" rel="facebox">LOGIN</a>


								                        OR
								                        <a rel="nofollow" href="/wp-signup.php">JOIN </a>

								                    </p>
													<fb:login-button size="medium" background="dark" length="long">
													</fb:login-button>
													
								                  <!--  <p class="small"><a class="fbconnect_login_button" id="RES_ID_fb_login">Login with Facebook >></a></p> -->
					                                
												<?php } ?>
												<br clear="all" />
 							</div><!-- End signin-->
            </div><!-- End navigation bars--><div class="border"></div>

