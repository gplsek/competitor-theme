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

if (isset($_COOKIE['Custom'])) {
$sport_arr = explode("|", $_COOKIE['Custom']);
print_r($sport_arr);
}
else
{
$sport_arr = array();	
}




?>
<div id="custom">
	<div>
		<div class="title">Customize Content</div>
		<div>
			<ul>
			<strong>Sports:</strong>
			<form method="post" action="<?php bloginfo('template_directory'); ?>/setpreferences.php">
			<input type="checkbox" name="sport[]" value="14" <?php if (in_array('14',$sport_arr)) echo "checked"?>>Running<br />
			<input type="checkbox" name="sport[]" value="16" <?php if (in_array('16',$sport_arr)) echo "checked"?>>Cycling<br />
			<input type="checkbox" name="sport[]" value="15" <?php if (in_array('15',$sport_arr)) echo "checked"?>>Triathon<br />
			<input type="submit" name="custom_form" value="SUBMIT">
			</form>
			</ul>
		</div>
	</div>
</div>
