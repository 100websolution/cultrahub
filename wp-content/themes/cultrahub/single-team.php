<?php
get_header( 'culture-other' );
global $post;
$thePostID = $post->ID;
$team_member_email_address 		= get_field('team_member_email_address',$thePostID);
$team_member_designation 		= get_field('team_member_designation',$thePostID);
$team_member_social_media_icon 	= get_field('team_member_social_media_icon',$thePostID);
$team_member_social_media_link 	= get_field('team_member_social_media_link',$thePostID);
$team_member_key_skills 		= get_field('team_member_key_skills',$thePostID);
?>
<!--MAIN CONTAINER START-->
<div class="mainContainer" id="mainContainer">
	<div class="section">
		<div class="container">
			<hr class="mb0 mt0">
        </div>
    </div>
	<div class="section teamSection">
		<div class="container">
			<div class="innerContainer">
			    <div class="teamHead">
			        <h2 class="heading nobrdr"><?php the_title();?></h2>
                    <ul class="borderbar_list fleft">
					<?php
					if(!empty($team_member_designation)){
					?>
                        <li><?php echo $team_member_designation;?></li>
					<?php
					}
					if(!empty($team_member_email_address)){
					?>
                        <li><span class="blueLight"><?php echo $team_member_email_address;?></span></li>
					<?php
					}
					?>
                    </ul>
					<?php
					if(!empty($team_member_social_media_icon)){
					?>
			        <a href="<?php echo $team_member_social_media_link;?>" class="fright">
			            <img src="<?php echo $team_member_social_media_icon['url'];?>" alt="" height="25" class="display-block">
			        </a>
					<?php
					}
					?>
			        <div class="clear"></div>
			    </div>
				<div class="teamImg">
				    <?php the_post_thumbnail( 'full' );?>
				    <div class="color_dots mt30">
                        <span class="green"></span>
                        <span class="yellow"></span>
                        <span class="red"></span>
                        <span class="blue"></span>
                    </div>
				</div>
				<div class="teamText">
                    <div>
                        <h3 class="subheading2">Biography</h3>
                        <?php echo get_post_field('post_content',$thePostID);?>
                    </div>
				    
				    <div class="mt30">
                        <h3 class="subheading2">Key Skills</h3>
                        <?php echo $team_member_key_skills;?>
                    </div>
				    
				    <div class="mt30">
				        <p>Please feel free to connect, I look forward to answering any questions you may have</p>
                        <a href="<?php echo get_permalink(3054);?>" class="goback fright"><img src="<?php echo get_template_directory_uri();?>/images/icon_refresh.png" alt=""> Go Back</a>
                    </div>
				</div>
				<div class="clear"></div>
			</div>
			<hr class="mt70 mb0">
		</div>
	</div>
	
	<?php include( locate_template( 'newsletter-form.php' ) ); ?>
		
</div>
<!--MAIN CONTAINER END-->
<?php
get_footer('other');