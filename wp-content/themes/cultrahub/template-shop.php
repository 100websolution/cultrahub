<?php
/*
Template Name: Shop
*/
get_header('culture');
$banner_image	= get_field( 'shop_banner', $post->ID );

//Section 1
$section_1_heading 		= get_field( 'shop_section1_heading', $post->ID );
$section_1_description 	= get_field( 'shop_section1_description', $post->ID );
$shop_section_1			= get_field( 'shop_section1_steps', $post->ID );
//Section 2
$section_2_posts		= get_field( 'section_2_posts', $post->ID );
//Section 3
$section_3_posts		= get_field( 'section_3_posts', $post->ID );
?>
<!--MAIN CONTAINER START-->
<div class="mainContainer" id="mainContainer">	
	<div class="section">
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
                        <h2 class="heading center"><?php echo $section_1_heading;?></h2>
                        <div class="heading_tag"><?php echo $section_1_description;?></div>
						<?php
						if(!empty($shop_section_1)){
						?>
                        <div class="seller_howitwork">
                            <ul class="row ul">
							<?php
							foreach($shop_section_1 as $section1){
							?>
                                <li class="col33">
                                    <div class="seller_block <?php echo $section1['shop_section1_color'];?>">
									<?php
									if(!empty($section1['shop_section1_image'])){
									?>
                                        <span class="steps"><img src="<?php echo $section1['shop_section1_image']['url'];?>" alt=""><em><?php echo $section1['shop_section1_step_title'];?></em></span>
									<?php
									}
									?>
                                        <div class="seller_icon"><img src="<?php echo $section1['shop_section1_icon']['url'];?>" alt=""></div>
                                        <div class="seller_text">
                                            <h3 class="subheading2"><?php echo $section1['shop_section1_title'];?></h3>
                                        </div>
                                    </div>
                                </li>
							<?php
							}
							?>
                            </ul>
                        </div>
						<?php
						}
						?>
                    </div>
                    
                </div>
			</div>
			<hr class="mt70 mb70">
			
			<div class="innerContainer">
			<?php
			if(!empty($section_2_posts)){
			?>
                <div class="shopSection">
			<?php
				foreach($section_2_posts as $post){
			?>
                    <div class="shopBlock">
                        <div class="shopImg"><img src="<?php echo $post['shop_section2_image']['url'];?>" alt=""></div>
                        <div class="shopText">
                            <h2 class="heading nobrdr"><?php echo $post['shop_section2_heading'];?></h2>
                            <p><?php echo $post['shop_section2_description'];?></p>
                        </div>
                        <div class="clear"></div>
                    </div>
            <?php
				}
			?>
                </div>
            <?php
			}
			if(!empty($section_3_posts)){
			?>    
			    <div class="seller_tool_wrap mt100">
                    <ul class="row ul">
			<?php
					foreach($section_3_posts as $post3){
			?>
                        <li class="col25">
                            <div class="seller_block">
                                <div class="seller_icon"><img src="<?php echo $post3['shop_section3_image']['url'];?>" alt=""></div>
                                <div class="seller_text">
                                    <h3 class="subheading2"><?php echo $post3['shop_section3_heading'];?></h3>
                                </div>
                            </div>
                        </li>
            <?php
					}
			?>
                    </ul>
                </div>
			<?php
				}
			?>
			</div>
			
			<hr class="mt70 mb0">
		</div>
	</div>
	
	<?php include( locate_template( 'newsletter-form.php' ) ); ?>
		
</div>
<!--MAIN CONTAINER END-->
<?php
get_footer('other');