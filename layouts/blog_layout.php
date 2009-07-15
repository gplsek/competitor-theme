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
		//jQuery(function() {
		jQuery("#BottomFeature").tabs({
			fx: {opacity: 'toggle'},
			ajaxOptions: { data: { pv: RN ,kw: '<?php echo $_SESSION['kw'];?>' } }
		});
	//$("#BottomFeature").data('disabled.tabs', []); 


	});
</script>
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

if (($magazine == 'competitor') || ($magazine == '2hotparks') || ($magazine == 'tworld')) // custom setting for home
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
