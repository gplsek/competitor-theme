
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

<div id="custom">
	<div>
		<div class="title">Customize Content</div>
		<div>
			<ul>
			<strong>Sports:</strong>
			<li>Running</li>
			<li>Cycling</li>
			<li>Triathon</li>
			</ul>
		</div>
	</div>
</div>
