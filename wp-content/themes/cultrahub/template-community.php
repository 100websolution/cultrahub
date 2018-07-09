<?php
/*
Template Name: Community
*/
get_header('culture');
$banner_image					= get_field( 'community_page_banner', $post->ID );
$community_page_heading 		= get_field( 'community_page_heading', $post->ID );
$community_page_description 	= get_field( 'community_page_description', $post->ID );
$community_page_image 			= get_field( 'community_page_image', $post->ID );
$community_page_description_2 	= get_field( 'community_page_description_2', $post->ID );
$community_page_posts 			= get_field( 'community_page_posts', $post->ID );
?>
<!--MAIN CONTAINER START-->
<div class="mainContainer" id="mainContainer">	
	<div class="section mob_pb0">
		<div class="container">
			<hr class="mb35 mt0">
			<div class="seller_banner help_banner">
				<div class="border_line top">
					<span class="b_green"></span>
					<span class="b_blue"></span>
					<span class="b_red"></span>
					<span class="b_yellow"></span>
				</div>
				<img src="<?php echo $banner_image['url'];?>" alt="" />
                <div class="border_line">
					<span class="b_green"></span>
					<span class="b_blue"></span>
					<span class="b_red"></span>
					<span class="b_yellow"></span>
				</div>
			</div>
			<hr class="mt35 mb35">
			<div class="innerContainer">
                <div class="">
                    <div class="heading_block">
                        <div class="heading2 center small"><img src="<?php echo get_template_directory_uri();?>/images/learn_sell_shop.png" alt=""></div>
                        <div class="color_dots">
                            <span class="yellow"></span>
                            <span class="red"></span>
                            <span class="blue"></span>
                            <span class="green"></span>
                        </div>
                    </div>
                    
                    <div>
                        <h2 class="heading center"><?php echo $community_page_heading;?></h2>
                        <div class="heading_tag"><?php echo $community_page_description;?></div>
                        
                        <div class="row communityBlock f18">
                            <div class="col50">
                                <div class="communityImg"><img src="<?php echo $community_page_image['url'];?>" alt=""></div>
                            </div>
                            <div class="col50">
                                <div class="communityText">
                                    <?php echo $community_page_description_2;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
			<hr class="mt70 mb70">
			<?php
			if(!empty($community_page_posts)){
			?>
			<div class="innerContainer">
			    <div class="communityList">
			<?php
				foreach($community_page_posts as $post2){
			?>
			        <div class="communityBox">
			            <div class="cmntyIcon"><img src="<?php echo $post2['community_post_image']['url'];?>" alt="" /></div>
			            <div class="cmntyText">
			                <h2 class="heading nobrdr"><?php echo $post2['community_post_heading'];?></h2>
			                <p><?php echo $post2['community_post_description'];?></p>
			            </div>
			            <div class="clear"></div>
			        </div>
			<?php
				}
			?>
			    </div>
			</div>
		<?php
			}
		?>
			<hr class="mt70 mb0">
		</div>
	</div>
	
	<?php include( locate_template( 'newsletter-form.php' ) ); ?>
		
</div>
<!--MAIN CONTAINER END-->
<?php
get_footer('other');