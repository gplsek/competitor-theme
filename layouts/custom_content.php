<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/chili-1.7.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/jquery.easing.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/jquery.dimensions.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/ui.accordion.js"></script>
<?php /*<script type="text/javascript">
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
</script>*/?>
<script type="text/javascript">
jQuery.noConflict();
jQuery(document).ready(function() {

// hides the slickbox as soon as the DOM is ready

 // (a little sooner than page load)
jQuery('#custom').hide();

// toggles the slickbox on clicking the noted link  

  jQuery('#slick-toggle').click(function() {

    jQuery('#custom').toggle(400);

    return false;

  });

});
</script>
<?php


//echo "COOKIE ".$_COOKIE['Sport'];

if (isset($_COOKIE['Sport'])) {
$sport_arr = explode("|", $_COOKIE['Sport']);
}
else
{
$sport_arr = array();	
}


if (isset($_COOKIE['Event'])) {
$event_arr = explode(",", $_COOKIE['Event']);

}
else
{
$event_arr = array();
	
}

if ((isset($_COOKIE['Event'])) || (isset($_COOKIE['Sport'])))
{
	$message = "Customize your homepage by selecting the type of content you prefer and the regions you're most interested in.";
}
else
{
	$message = "Add or remove the topics you prefer to customize your homepage.";
}

$category = get_cat_ID("sports");
$sport_cats = get_categories('hide_empty=0&child_of='.$category);

$reg_category = get_cat_ID("regions");
$regions_cats = get_categories('hide_empty=0&child_of='.$reg_category);


$event_category = get_cat_ID("events");
$event_cats = get_categories('hide_empty=0&child_of='.$event_category);








?>
 
 <div id="slick-toggle" class="title">
			<div class="custom-title">
                <h2 class="hl"><span class="plus">+</span>CUSTOMIZE PAGE</h2>
                <h4 class="tags"><?= $message?></h4>
			</div>
        </div>
<div id="custom">
	
	<div>
		<form method="post" action="<?php bloginfo('template_directory'); ?>/setpreferences.php">
        <!--<div class="title">
			<div class="custom-title">
                <h2 class="hl"><span class="plus">+</span>CUSTOMIZE PAGE</h2>
                <h4 class="tags"><?= $message?></h4>
			</div>
        </div>-->
        <div>
            <div class="custom-content">
            
            	<ul class="custom-content-top">
                
                <p><strong>Sports</strong></p>
                <?php
                
				foreach ($sport_cats as $cate) {
					?>
					<li><input type="checkbox" name="sport[]" value="<?= $cate->cat_ID?>" <?php if (in_array($cate->cat_ID,$sport_arr)) echo "checked"?>><?= $cate->cat_name?></li>
					<?
				}
                ?>
                    
                
                </ul>
                
                <ul class="custom-content-center">
                    
                    <p><strong>Region</strong></p>
                    
                    	<?php

						foreach ($regions_cats as $cate) {
							?>
							<li><input type="checkbox" name="sport[]" value="<?= $cate->cat_ID?>" <?php if (in_array($cate->cat_ID,$sport_arr)) echo "checked"?>><?= $cate->cat_name?></li>
							<?
						}
		                ?>
                </ul>
                
                <ul class="custom-content-bottom">
                	
                    <p><strong>Events</strong></p>
                
                		<?php

						foreach ($event_cats as $cate) {
							?>
							<li><input type="checkbox" name="event[]" value="<?= $cate->cat_ID?>" <?php if (in_array($cate->cat_ID,$event_arr)) echo "checked"?>><?= $cate->cat_name?></li>
							<?
						}
		                ?>

                </ul>   
                             

                    <input class="submit" type="submit" name="custom_form" value="SAVE & CLOSE">

                    <input class="cancel" type="button" onclick="jQuery('#custom').hide();" name="custom_form" value="CANCEL">
                                        
            </div>	
		</div>
		 </form>
	</div>
   
</div>
