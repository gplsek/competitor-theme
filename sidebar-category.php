  <div class="right_column">
          



	
	 <div id="sideTabs" class="side_tabs">
                    <ul>
                        <li><a class="active" href="#pop">NEWS</a></li>
                        <li><a href="#comm">COMMENTS</a></li>
                        <li><a href="#feat">FEATURED</a></li>
						<!--<?php if (function_exists('wp_tag_cloud')) { ?><li><a href="#tagcloud">TAG CLOUD</a></li><?php } ?>-->
                    </ul>
                    <p class="feeds">
                        <a href="#">Feeds</a>
                    </p>
                </div><!-- End side tabs -->
	
	
	
	
	
<!--	<div class="fix" style="height:2px;"></div>-->
	
	<!--<div class="navbox">-->
	 <div class="tab_content">
		
		<ul class="list1" id="pop">
            <?php include(TEMPLATEPATH . '/includes/popular.php' ); ?>                    
		</ul>
        
		<ul class="list3" id="comm">
            <?php include(TEMPLATEPATH . '/includes/comments.php' ); ?>                    
		</ul>
        
		<ul class="list4" id="feat">
			<?php 
				$the_query = new WP_Query('category_name=news&showposts=10&orderby=post_date&order=desc');	
				while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
			?>
			
				<li><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
				<label class="date"><?php the_date('M, j'); ?></label><?php the_excerpt(); ?></li>
			
			<?php endwhile; ?>		
		</ul>
        <p class="more">
                        <a href="#">+ More News</a>
                    </p>
		<?php if (function_exists('sswp_tag_cloud')) { ?>
		
			<span class="list1" id="tagcloud">
				<?php wp_tag_cloud('smallest=10&largest=18'); ?>
			</span>
		
		<?php } ?>
	</div><!-- tab-content-->	
	<!--</div>--><!--/navbox-->
	

	
	
	
	
	
	
	 <div class="ad_large">
                    <a href="#">
                        <img src="<?php bloginfo('template_directory'); ?>/images/ad_300.jpg" width="298" height="101" alt="" />
                    </a>
                </div>



<!-- FACEBOOK STUFF -->
<div class="widget">
<div class="fbnarrowcolumn narrowcolumn">

<?php

$fb_user = fbc_facebook_client()->get_loggedin_user();
if(isset($fb_user) && $fb_user!=""){
	$users = WPfbConnect_Logic::get_connected_friends($fb_user);
	echo "<h2>".__('Community friends', 'fbconnect')."</h2>\n";
	echo "<a href='/invite-friends/'>Invite Your Friends</a><br />\n";
	echo "<div class=\"fbconnect_userpics2\">\n";
	foreach($users as $user){
		echo "<div class=\"avatar\"><a style=\"border: 2px solid #d5d6d7;\" onclick=\"location.href='./?fbconnect_action=myhome&fbuserid=".$user["uid"]."';\" href=\"./?fbconnect_action=myhome&fbuserid=".$user["uid"]."\"><fb:profile-pic uid=\"".$user["uid"]."\" size=\"square\" linked=\"false\"></fb:profile-pic></a></div>\n";
	}
	echo "</div>\n";
}else{

}
?> 
</div></div>
<div class="widget">
<div class="fbnarrowcolumn narrowcolumn">
<?php
	$users_count = WPfbConnect_Logic::get_count_users();
	echo "<h2>".__('Community', 'fbconnect')." (".$users_count." ".__('members', 'fbconnect').")</h2>";

	$pos = 0;
	if (isset ($_REQUEST["pos"])){
		$pos= (int)$_REQUEST["pos"];
	}
	
	$viewusers = 50;
	$users = WPfbConnect_Logic::get_lastusers_fbconnect($viewusers,$pos);

		echo "<div class=\"fbconnect_userpics2\">";
		
		foreach($users as $user){
			
			if ($fbuid = fbc_get_fbuid($user->ID)) {
			    echo render_fb_profile_pic($fbuid);
			  } else {
			    echo get_avatar( $user->ID,50 );
			  }
			
			
			
		}
		echo "</div>";

	if ($pos>=$viewusers){
		echo '<a href="'.get_option('siteurl').'/?fbconnect_action=community&pos='.($pos-$viewusers).'">&laquo; '.__('Previous page', 'fbconnect').'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>';
	}
	if (($pos+$viewusers)<$users_count){
		echo '<a href="'.get_option('siteurl').'/?fbconnect_action=community&pos='.($pos+$viewusers).'"> '.__('Next page', 'fbconnect').' &raquo;</a>';
	}

?>



</div>
</div>
<!-- End FB STUFF -->

	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('category') ) : else : ?>		
		
			<!--<div class="widget">
			
				<h2 class="hl">RELATED SITES</h2>
				<ul class="list2">
					<?php sampleHelloWorld(); ?>
				</ul>
			
			</div>--><!--/widget-->
		
		<?php endif; ?>
	



</div><!-- End right column -->