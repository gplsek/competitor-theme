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





?>
<div id="custom">
	<div>
		<div class="title">Customize Content</div>
		<div>
			<ul>
			<strong>Sports:</strong>
			<form method="post" action="<?php bloginfo('template_directory'); ?>/setpreferences.php">
			<input type="checkbox" name="sport[]" value="<?= $running?>" <?php if (in_array($running,$sport_arr)) echo "checked"?>>Running<br />
			<input type="checkbox" name="sport[]" value="<?= $cycling?>" <?php if (in_array($cycling,$sport_arr)) echo "checked"?>>Cycling<br />
			<input type="checkbox" name="sport[]" value="<?= $triathlon?>" <?php if (in_array($triathlon,$sport_arr)) echo "checked"?>>Triathon<br />
			<input type="submit" name="custom_form" value="SUBMIT">
			</form>
			</ul>
		</div>
	</div>
</div>
