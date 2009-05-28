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


if (isset($_COOKIE['Event'])) {
$event_arr = explode("|", $_COOKIE['Event']);
//print_r($sport_arr);
}
else
{
$event_arr = array();	
}

$category = get_cat_ID("sports");
$sport_cats = get_categories('hide_empty=0&child_of='.$category);

$reg_category = get_cat_ID("regions");
$regions_cats = get_categories('hide_empty=0&child_of='.$reg_category);


$event_category = get_cat_ID("events");
$event_cats = get_categories('hide_empty=0&child_of='.$event_category);








?>
<div id="custom">
	<form method="post" action="<?php bloginfo('template_directory'); ?>/setpreferences.php">
	<div>
		<div class="title">Customize Content</div>
        <div>
            <div class="custom-title">
                <h2 class="hl"><span class="plus">+</span>CUSTOMIZE PAGE</h2>
                <h4 class="tags">Interests: <a href="#">Road</a> | <a href="#">Track</a> | <a href="#">Traingin</a></h4>
                <h4 class="tags">Regions: <a href="#">Southeast</a></h4>
            </div>
            <div class="custom-content">
            
            	<p>Misc text up here</p>
                
                <ul class="custom-content-left">
                
                <strong>Sports</strong>
				<div class="custom-content-left-block1">
                <?php
                
				foreach ($sport_cats as $cate) {
					?>
					<li><input type="checkbox" name="sport[]" value="<?= $cate->cat_ID?>" <?php if (in_array($cate->cat_ID,$sport_arr)) echo "checked"?>><?= $cate->cat_name?></li>
					<?
				}
                ?>
                    
                
                </ul>
                <ul class="custom-content-right">
                    
                    <strong>Region</strong>
                    
                    <div class="custom-content-right-block1">
                    
                    	<?php

						foreach ($regions_cats as $cate) {
							?>
							<li><input type="checkbox" name="sport[]" value="<?= $cate->cat_ID?>" <?php if (in_array($cate->cat_ID,$sport_arr)) echo "checked"?>><?= $cate->cat_name?></li>
							<?
						}
		                ?>
                    </div>
                </ul>
                
                <ul class="custom-content-left">
                	
                    <strong>Events</strong>
                
                		<?php

						foreach ($event_cats as $cate) {
							?>
							<li><input type="checkbox" name="event[]" value="<?= $cate->cat_ID?>" <?php if (in_array($cate->cat_ID,$event_arr)) echo "checked"?>><?= $cate->cat_name?></li>
							<?
						}
		                ?>

                </ul>   
                             
                    <input class="submit" type="submit" name="custom_form" value="SAVE">
                </form>
            </div>	
		</div>
	</div>
</div>
