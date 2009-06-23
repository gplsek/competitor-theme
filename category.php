<?php get_header(); ?>

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
			ajaxOptions: { data: { pv: RN, kw: '<?php echo $_SESSION['kw'];?>' } } 
			});
	
	});
</script>

<script type="text/javascript">
jQuery.noConflict();
	jQuery().click(function(event) {
		jQuery("#BottomFeature").tabs({fx: {opacity: 'toggle'},
			ajaxOptions: { data: { pv: RN, kw: '<?php echo $_SESSION['kw'];?>' } }
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
	
 <?php
 	//global $user_ID, $wpdb, $post;
	//$cat = get_the_category();
	$cat = get_category_by_path(get_query_var('category_name'),false);
	  $category = $cat->cat_ID;
	  $cat_name = $cat->cat_name;
	
	//children
	
	$children =  get_categories('child_of='.$category);
	
	$page = get_query_var('paged');
	if (!($page == "")){
		$paging = "&paged=".$page;
		}
	
	// foreach ($children as $cate) {
	// 	  	$option = $cate->cat_ID;
	// 		$option .= $cate->cat_name;
	// 		$option .= ' ('.$cate->category_count.')';
	// 		echo $option;
	// 	  }

 ?>  


         
<div class="main_column">
	<?php if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	} ?>
	<h1 class="cat-header"><?= $cat_name?></h1>
	<div id="contentTabs" class="filters">
  	  <ul id="TopFeature" class="main">
	        <li><a class="first active" href="<?= $template_path?>/layouts/default.php?sort=post_date&cat=<?= $category?><?= $paging ?>" title="feature">MOST RECENT</a></li>
            <li><a href="<?= $template_path?>/layouts/default.php?sort=views&cat=<?= $category?><?= $paging ?>" title="feature">MOST VIEWED</a></li>
            <li><a href="<?= $template_path?>/layouts/default.php?sort=comment_count&cat=<?= $category?><?= $paging ?>" title="feature">MOST COMMENTED</a></li>
        </ul>


		<?php if ($children) :?>
		<p>SHOW ONLY:</p>
		<ul id="BottomFeature" class="secondary">
			<li><a href="<?= $template_path?>/layouts/default.php?cat=<?= $category?><?= $paging ?>" title="feature">All</a></li>
		<?php 
		foreach ($children as $cate) {
		  	$option = '<li><a href="'.$template_path.'/layouts/default.php?cat='.$cate->cat_ID.$paging.'" title="feature">'.$cate->cat_name .' ('.$cate->category_count.')</a></li>';
			echo $option;
		  }
		
		?>
		
		</ul>
		<?php endif;?>


	 </div>
	
		<div id="feature">
		</div>
	
	
	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>	
</div>

<?php get_sidebar('category'); ?>

<?php get_footer(); ?>