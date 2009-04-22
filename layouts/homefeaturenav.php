



<p>SHOW ONLY:</p>
<ul id="BottomFeature" class="secondary">
	
	
	<li><a href="/wp-content/themes/pandemia-news/layouts/default.php?cat=All<?= $paging ?>" title="feature">All</a></li>
	<?php 
	
	$categories =  get_categories('hide_empty=0');
	foreach ($categories as $cate) {
		
		if (get_option('comp_nav_categories_'.$cate->cat_ID)){
	  	$option = '<li><a href="/wp-content/themes/pandemia-news/layouts/default.php?cat='.$cate->cat_ID.$paging.'" title="feature">'.$cate->cat_name .' ('.$cate->category_count.')</a></li>';
		echo $option;
	}
		
	  }
	
	?>

</ul>