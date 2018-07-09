<?php
/*
Template Name: Language
*/
get_header('culture');
$banner_image								= get_field( 'language_page_banner_image', $post->ID );
$language_page_heading 						= get_field( 'language_page_heading', $post->ID );
$language_page_short_description 			= get_field( 'language_page_short_description', $post->ID );
$language_page_section_1_heading_left_side 	= get_field( 'language_page_section_1_heading_left_side', $post->ID );
$language_page_section_1_heading_right_side = get_field( 'language_page_section_1_heading_right_side', $post->ID );
$language_page_posts 						= get_field( 'language_page_posts', $post->ID );
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
                        <h2 class="heading center"><?php echo $language_page_heading;?></h2>
                        <div class="heading_tag"><?php echo $language_page_short_description;?></div>
                        
                        <div class="seller_fees clanguage">
                            <div class="seller_fees_head">
                                <h2 class="heading2"><?php echo $language_page_section_1_heading_left_side;?></h2>
                            </div>
                            <div class="seller_fees_text">
                                <?php echo $language_page_section_1_heading_right_side;?>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
			</div>
			<hr class="mt70 mb70">
		<?php
		if(!empty($language_page_posts)){
		?>
			<div class="innerContainer">
			    <div class="communityList odd">
			<?php
				foreach($language_page_posts as $post){
			?>
			        <div class="communityBox">
			            <div class="cmntyIcon"><img src="<?php echo $post['language_page_post_image']['url'];?>" alt="" /></div>
			            <div class="cmntyText">
			                <h2 class="heading nobrdr"><?php echo $post['language_page_post_title'];?></h2>
			                <p><?php echo $post['language_page_post_description'];?></p>
			            </div>
			            <div class="clear"></div>
			        </div>
			<?php
				}
			?>
			    </div>
			</div>
			<hr class="mt70 mb0">
		<?php
		}
		?>
		</div>
	</div>
	
	<?php include( locate_template( 'newsletter-form.php' ) ); ?>
		
</div>
<!--MAIN CONTAINER END-->
<?php
get_footer('other');