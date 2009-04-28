<?php 

$categories =  get_categories('hide_empty=0');
$option = "";
$all = "";
foreach ($categories as $cate) {
	
	if (get_option('comp_nav_categories_'.$cate->cat_ID)){
  	$option .= '<li><a href="/wp-content/themes/pandemia-news/layouts/default.php?cat='.$cate->cat_ID.$paging.'" title="feature">'.$cate->cat_name .' ('.$cate->category_count.')</a></li>';
	$all .= $cate->cat_ID.",";
	
}
	
  }
?>



