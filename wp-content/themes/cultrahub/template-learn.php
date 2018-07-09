<?php
/*
Template Name: Learn
*/
get_header('culture');
$banner_image				= get_field( 'learn_banner_image', $post->ID );

//Section 1
$learn_page_heading 		= get_field( 'learn_page_heading', $post->ID );
$learn_page_decription 		= get_field( 'learn_page_decription', $post->ID );
$learn_page_section_1		= get_field( 'learn_page_section_1', $post->ID );
//Section 2
$learn_page_posts			= get_field( 'learn_page_posts', $post->ID );
//Section 3
$learn_section_3_heading	= get_field( 'learn_section_3_heading', $post->ID );
$learn_section_3_description= get_field( 'learn_section_3_description', $post->ID );
$learn_page_section3_posts	= get_field( 'learn_page_section3_posts', $post->ID );
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
                        <h2 class="heading center"><?php echo $learn_page_heading;?></h2>
                        <div class="heading_tag"><?php echo $learn_page_decription;?></div>
					<?php
					if(!empty($learn_page_section_1)){
					?>
                        <div class="seller_tool_wrap withdot w75 mlrauto">
                            <ul class="row ul">
							<?php
							foreach($learn_page_section_1 as $post1){
							?>
                                <li class="col33">
                                    <div class="seller_block <?php if($post1['learn_page_section1_heading']!='')echo $post1['learn_page_section1_color'];?>">
                                        <div class="seller_icon"><img src="<?php echo $post1['learn_page_section1_image']['url'];?>" alt=""></div>
                                        <div class="seller_text">
                                            <h3 class="subheading2"><?php echo $post1['learn_page_section1_heading'];?></h3>
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
			if(!empty($learn_page_posts)){
			?>
                <div class="learnList">
                    <ul class="ul row">
					<?php
					foreach($learn_page_posts as $post2){
					?>
                        <li class="col50">
                            <div class="learnBox">
                                <div class="learnImg">
                                    <img src="<?php echo $post2['learn_post_image']['url'];?>" alt="">
                                </div>
                                <div class="learnText">
                                    <h3 class="heading nobrdr"><?php echo $post2['learn_post_title'];?></h3>
                                    <p><?php echo $post2['learn_post_description'];?></p>
                                </div>
                                <div class="clear"></div>
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
                
			    <div class="mt100">
                    <h2 class="heading center"><?php echo $learn_section_3_heading;?></h2>
                    <div class="heading_tag"><?php echo $learn_section_3_description;?></div>
				<?php
				if(!empty($learn_page_section3_posts)){
				?>
                    <div class="seller_tool_wrap w75 mlrauto">
                        <ul class="row ul">
						<?php
						foreach($learn_page_section3_posts as $post3){
						?>
                            <li class="col33">
                                <div class="seller_block">
                                    <div class="seller_icon"><img src="<?php echo $post3['learn_post_section3_image']['url'];?>" alt=""></div>
                                    <div class="seller_text">
                                        <h3 class="subheading2"><?php echo $post3['learn_post_section3_title'];?></h3>
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
			<hr class="mt70 mb0">
		
		</div>
	</div>
	
	<?php include( locate_template( 'newsletter-form.php' ) ); ?>
		
</div>
<!--MAIN CONTAINER END-->
<?php
get_footer('other');