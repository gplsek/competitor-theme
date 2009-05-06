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
	<link rel="stylesheet" type="text/css"  href="<?php bloginfo('template_directory'); ?>/event.css" media="screen" />

	<!--[if IE 6]>
<script src="<?php bloginfo('template_directory'); ?>/DD_belatedPNG.js"></script>
<script type="text/javascript">
 DD_belatedPNG.fix('a, div, img');
</script>
<![endif]--> 
	 <?php wp_head(); ?>  
	
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/includes/js/facebox/facebox.css" type="text/css" media="print, projection, screen">

	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/ui.core.js"></script>

	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/jquery-ui-personalized-1.6rc6.js"></script>
	 
<script type="text/javascript">
jQuery.noConflict();

	jQuery(function() {
		jQuery('#rotate > ul').tabs({ fx: { opacity: 'toggle' } }).tabs('rotate', 5000);
	});
</script>
			
<script type="text/javascript">
	jQuery(function() {
		jQuery("#sideTabs").tabs({ fx: { opacity: 'toggle' } });
	});
</script>

<script type="text/javascript">
	jQuery(function() {
		jQuery("#mainTabs").tabs({ fx: { opacity: 'toggle' } });
		
	});
</script>

<script type="text/javascript">
	jQuery(function() {
		jQuery("#contentTabs").tabs({ fx: { opacity: 'toggle' } });
	
	});
</script>

<script type="text/javascript">
	jQuery().click(function(event) {
		jQuery("#BottomFeature").tabs({fx: {opacity: 'toggle'}});
	//$("#BottomFeature").data('disabled.tabs', []); 
	
	
	});
</script>

<script type="text/javascript">
	// $(function() {
	// 	//$("#SiteSettings").accordion({ collapsible: true, active: 1 });
	// });
	</script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox();
	   $.facebox.settings.opacity = 0.8; 
	})
	
</script>
					
					
					
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/includes/js/ReMooz.css" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/mootools-trunk.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/ReMooz.js"></script>

<script type="text/javascript">
		/* <![CDATA[ */
		window.addEvent('load', function() {
			ReMooz.assign('.lightbox a', {
				'origin': 'img',
				'shadow': 'onOpenEnd',
				'resizeFactor': 0.5, 
				'cutOut': false, 
				'opacityResize': 0.1, 
				'dragging': false, 
				'centered': false,
				'temporary': true
			});
		});
		/* ]]> */
	</script>

</head>

<body class="news">


    	
<?php
	$template_path = get_bloginfo('template_directory');
	$GLOBALS['defaultgravatar'] = $template_path . '/images/gravatar.jpg';
?>

    <div id="container">
	
	  <div id="top-bar"> <!-- START TOP NAVIGATION BAR -->
	
		  <p class="comp logo">logo</p>
            <p class="comp brand">Competitor</p>
            <!--<p>network site</p>-->
		
		 <ul>
            
                <li><a href="http://www.competitor.com">Competitor</a>  &nbsp;|  </li>
           <li><a href="http://www.velonews.com/">Cycling</a> &nbsp;  |  </li>
                <li><a href="http://triathlon.competitor.com/">Triathlon</a>  &nbsp; |  </li>
           <li><a href="http://running.competitor.com">Running</a>  &nbsp; |  </li>
           <li><a href="http://runrocknroll.competitor.com">Rock 'n' Roll Marathons</a></li>
            
            </ul>
            
        </div><!-- End top-bar -->
		
	  <div id="logo">
        	
            <a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a>
        	
        </div><!-- End logo -->
        
        <div id="banner">
        	
            <?php  // get add keywords

				$cat = get_category_by_path(get_query_var('category_name'),false);
				  $category = $cat->cat_ID;
				  $cat_name = $cat->cat_name;
				  if (is_home())
				 	{
					$cat_name = 'home';
					}

					$parse_url_array 	= parse_url(get_option('siteurl'));
					$subdomain 				= explode('.', $parse_url_array['host']);
					if ($subdomain[0] == "www")
					{
					   $subdomain[0] = "competitor";
					}
					$magazine_name = $subdomain[0];

					$kw = $magazine_name.','.$cat_name;
					$_SESSION['kw'] = $kw;


            ?>
			<script type="text/javascript" language="JavaScript">
			  aj_server = 'http://adj43.thruport.com/servlet/ajrotator/'; aj_tagver = '1.0';
			  aj_zone = 'inside'; aj_adspot = '619316'; aj_page = '0'; aj_dim ='317217'; aj_ch = ''; aj_ct = ''; aj_kw = '<?= $kw?>';
			  aj_pv = true; aj_click = '';
			</script><script type="text/javascript" language="JavaScript" src="http://img1.cdn.adjuggler.com/banners/ajtg.js"></script>
        	
        </div><!-- End banner -->
	
	 <div id="content">
            <div class="nav_bars">
                <ul class="main_nav">
                     <?php //wp_list_bookmarks('title_li=&categorize=0&category_name=MainNav'); ?>
					  <?php $links = get_bookmarks('category_name=MainNav&orderby=order&category_orderby=order');
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
                <ul class="sec_nav">
                
                <?php //wp_list_bookmarks('title_li=&categorize=0&category_name=Sub'); ?>
				 <?php $links = get_bookmarks('category_name=Sub&orderby=order&category_orderby=order');
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
	  <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/"> 
	 	                      <fieldset>
	 	                          <!--<label>SEARCH</label>-->
	 	                          <input type="text" value="SEARCH" onclick="this.value='';" name="s" id="s" />
	 	  					
	 	                      </fieldset>
	 	                  </form>
	
	   					<div class="signin">
					                    <?php
											if ($user_ID != '') {
												// User is logged in
												global $current_user;
												get_currentuserinfo();
												echo  '<p>Welcome '.$current_user->display_name;

												echo "<a href='".wp_sidebarlogin_current_url('logout')."'>".__(' Logout')."</a>";
												echo '</p>';
											} else {
												?>
								                    <p>
								                        <a href="<?php bloginfo('template_directory'); ?>/includes/login.php?redir=<?= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>" rel="facebox">LOGIN</a>


								                        OR
								                        <a href="/wp-signup.php">JOIN </a>

								                    </p>
								                    <p class="small">Login with Facebook >></p> 
					                                <fb:login-button size="small" background="dark" length="short">
					                                    </fb:login-button>
												<?php } ?>
												<br clear="all" />
 							</div><!-- End signin-->
            </div><!-- End navigation bars-->
