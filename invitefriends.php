<?php
/*
Template Name: Facebook
*/
?>
	
<?php get_header(); ?>

		<div id="mainTabs" class="main_column">
			
<div style="margin-left:20px;width:95%;">

	<h2 class="widgettitle"><?php _e('Invite your friends', 'fbconnect') ?></h2>
	  <fb:serverfbml style="width: 100%;">
	    <script type="text/fbml">
	      <fb:fbml>
	          <fb:request-form
	                    action="<?php echo get_option('siteurl'); ?>"
	                    method="GET"
	                    invite="true"
	                    type="<?php echo get_option('blogname');?>"
	                    content="<?php echo get_option('blogname')." : ".get_option('blogdescription'); ?>
	                 <fb:req-choice url='<?php echo get_option('siteurl'); ?>'
	                       label='<?php _e('Become a Member!', 'fbconnect') ?>' />">
	 
	                    <fb:multi-friend-selector
	                    showborder="false"
	                    actiontext="<?php _e('Select the friends you want to invite.', 'fbconnect') ?>">
	        </fb:request-form>
	      </fb:fbml>
	 
	    </script>
	  </fb:serverfbml>

 </div>

</div><!--/main column-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>



