<?php get_header(); ?>
 <?php
 	//global $user_ID, $wpdb, $post;
	//$cat = get_the_category();
	$cat = get_category_by_path(get_query_var('category_name'),false);
	  $category = $cat->cat_ID;
	  $cat_name = $cat->cat_name;
	
	//children
	
	$children =  get_categories('child_of='.$category);
	
	// foreach ($children as $cate) {
	// 	  	$option = $cate->cat_ID;
	// 		$option .= $cate->cat_name;
	// 		$option .= ' ('.$cate->category_count.')';
	// 		echo $option;
	// 	  }

 ?>  


         
<div class="main_column">
	<h2><?= $cat_name?></h2>
	<div id="contentTabs" class="filters">
  	  <ul id="TopFeature" class="main">
	        <li><a class="first active" href="/wp-content/themes/pandemia-news/layouts/default.php?sort=post_date&cat=<?= $category?>" title="feature">MOST RECENT</a></li>
            <li><a href="/wp-content/themes/pandemia-news/layouts/default.php?sort=views&cat=<?= $category?>" title="feature">MOST VIEWED</a></li>
            <li><a href="/wp-content/themes/pandemia-news/layouts/default.php?sort=comment_count&cat=<?= $category?>" title="feature">MOST COMMENTED</a></li>
        </ul>


		<?php if ($children) :?>
		<p>SHOW ONLY:</p>
		<ul id="BottomFeature" class="secondary">
			<li><a href="/wp-content/themes/pandemia-news/layouts/default.php?cat=<?= $category?>" title="feature">All</a></li>
		<?php 
		foreach ($children as $cate) {
		  	$option = '<li><a href="/wp-content/themes/pandemia-news/layouts/default.php?cat='.$cate->cat_ID.'" title="feature">'.$cate->cat_name .' ('.$cate->category_count.')</a></li>';
			echo $option;
		  }
		
		?>
		
		</ul>
		<?php endif;?>


	 </div>
	
		<div id="feature">
		</div>
	
	
	
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>