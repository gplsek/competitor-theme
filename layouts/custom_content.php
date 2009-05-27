<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/chili-1.7.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/jquery.easing.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/jquery.dimensions.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/ui.accordion.js"></script>
<script type="text/javascript">
jQuery.noConflict();
	jQuery(function() {
		jQuery('#custom').accordion({ 
		    header: 'div.title', 
		    active: false, 
		    alwaysOpen: false, 
		    //animated: false, 
		    //autoheight: false 
		});

	});
</script>
<?php


//echo "COOKIE ".$_COOKIE['Sport'];

if (isset($_COOKIE['Sport'])) {
$sport_arr = explode("|", $_COOKIE['Sport']);
//print_r($sport_arr);
}
else
{
$sport_arr = array();	
}

$running = get_cat_ID("running");
$cycling = get_cat_ID("cycling");
$triathlon = get_cat_ID("triathlon");
$mountainbike = get_cat_ID("mountainbike");
$northeast = get_cat_ID("northeast");
$southeast = get_cat_ID("southeast");
$midwest = get_cat_ID("midwest");
$southwest = get_cat_ID("southwest");
$rockymnt = get_cat_ID("rocky mountains");
$west = get_cat_ID("west");
$northwest = get_cat_ID("northwest");





?>
<div id="custom">
	<form method="post" action="<?php bloginfo('template_directory'); ?>/setpreferences.php">
	<div>
		<div class="title">Customize Content</div>
		<div>
			<ul>
			<strong>Sports:</strong>
			
			<li><input type="checkbox" name="sport[]" value="<?= $running?>" <?php if (in_array($running,$sport_arr)) echo "checked"?>>Running</li>
			<li><input type="checkbox" name="sport[]" value="<?= $cycling?>" <?php if (in_array($cycling,$sport_arr)) echo "checked"?>>Cycling</li>
			<li><input type="checkbox" name="sport[]" value="<?= $triathlon?>" <?php if (in_array($triathlon,$sport_arr)) echo "checked"?>>Triathon</li>
			<li><input type="checkbox" name="sport[]" value="<?= $mountainbike?>" <?php if (in_array($mountainbike,$sport_arr)) echo "checked"?>>Mountain Biking</li>
			
			</ul>
			<ul>
				<strong>Choose your Region:</strong>
				<li><input type="checkbox" name="sport[]" value="<?= $northeast?>" <?php if (in_array($northeast,$sport_arr)) echo "checked"?>>NorthEast</li>
				<li><input type="checkbox" name="sport[]" value="<?= $southeast?>" <?php if (in_array($southeast,$sport_arr)) echo "checked"?>>SouthEast</li>
				<li><input type="checkbox" name="sport[]" value="<?= $midwest?>" <?php if (in_array($midwest,$sport_arr)) echo "checked"?>>Midwest</li>
				<li><input type="checkbox" name="sport[]" value="<?= $southwest?>" <?php if (in_array($southwest,$sport_arr)) echo "checked"?>>SouthWest</li>
				<li><input type="checkbox" name="sport[]" value="<?= $rockymnt?>" <?php if (in_array($rockymnt,$sport_arr)) echo "checked"?>>Rocky Mountains</li>
				<li><input type="checkbox" name="sport[]" value="<?= $west?>" <?php if (in_array($west,$sport_arr)) echo "checked"?>>West</li>
				<li><input type="checkbox" name="sport[]" value="<?= $northwest?>" <?php if (in_array($northwest,$sport_arr)) echo "checked"?>>NorthWest</li>
			</ul>
				<input type="submit" name="custom_form" value="SUBMIT">
			</form>
			
		</div>
	</div>
</div>
