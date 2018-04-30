<?php
/*
Template Name: About
*/
get_header('culture');
$banner_image					= get_field( 'aboutus_banner_image', $post->ID );

//Section 1
$aboutus_page_heading 			= get_field( 'aboutus_page_heading', $post->ID );
$aboutus_page_decription 		= get_field( 'aboutus_page_decription', $post->ID );
$aboutus_page_section_1			= get_field( 'aboutus_page_section_1', $post->ID );
//Section 2
$aboutus_section_2_heading		= get_field( 'aboutus_section_2_heading', $post->ID );
$aboutus_section_2_description	= get_field( 'aboutus_section_2_description', $post->ID );
//Section 3
$aboutus_page_section_3_heading	= get_field( 'aboutus_page_section_3_heading', $post->ID );
$aboutus_page_section_3_description	= get_field( 'aboutus_page_section_3_description', $post->ID );
$aboutus_page_section_3_image	= get_field( 'aboutus_page_section_3_image', $post->ID );
//Section 4
$aboutus_page_section_4_heading	= get_field( 'aboutus_page_section_4_heading', $post->ID );
//Section 5
$aboutus_page_section_5_description	= get_field( 'aboutus_page_section_5_description', $post->ID );
$aboutus_page_section_5_image	= get_field( 'aboutus_page_section_5_image', $post->ID );
$quote							= get_field( 'quote', $post->ID );
?>
<!--MAIN CONTAINER START-->
<div class="mainContainer" id="mainContainer">
	<div class="section">
		<div class="container">
			<hr class="mb35 mt0">
			<div class="seller_banner help_banner">
				<img src="<?php echo get_template_directory_uri();?>/images/about_banner.jpg" alt="" />
			</div>
			<hr class="mt35 mb35">
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
                <div class="heading center"><?php echo $aboutus_page_heading;?></div>
                <div class="connectingBlock">
				<?php
				if(!empty($aboutus_page_section_1)){
				?>
                    <div class="connectingRight">
                        <ul class="ul row">
				<?php
						foreach($aboutus_page_section_1 as $post1){
				?>
                            <li class="col50">
                                <div class="aboutIconBox">
                                    <div class="aiIcon">
                                        <img src="<?php echo $post1['aboutus_page_section1_image']['url'];?>" alt="">
                                    </div>
                                    <div class="subheading2"><?php echo $post1['aboutus_page_section1_heading'];?></div>
                                    <div class="aiText">
                                        <p><?php echo $post1['aboutus_page_section1_description'];?></p>
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
                    <div class="connectingLeft">
                        <?php echo $aboutus_page_decription;?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            
            <div class="innerContainer mt80">
                <div class="heading center"><?php echo $aboutus_section_2_heading;?></div>
                <div class="heading_tag"><?php echo $aboutus_section_2_description;?></div>
				<div class="teamList">
                    <ul class="ul row">
					<?php
					query_posts('post_type=team&order=asc&orderby=menu_order');
					if (have_posts()) : while (have_posts()) : the_post();
						$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						$designation 	= get_field( 'team_member_designation', $post->ID );					
					?>
                        <li class="col33">
                            <div class="teamBox">
                                <div class="teamImg">
                                    <a href="<?php the_permalink();?>"><img src="<?php echo $featured_image[0];?>" alt=""></a>
                                </div>
                                <div class="teamTeaxt">
                                    <h2 class="subheading2"><?php the_title();?></h2>
                                    <div><?php echo $designation;?></div>
                                    <div class="color_dots mt10">
                                        <span class="green"></span>
                                        <span class="yellow"></span>
                                        <span class="red"></span>
                                        <span class="blue"></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php
					endwhile; endif;
					wp_reset_query();
					?>
                    </ul>
                </div>
            </div>
            
            <div class="abtSection mt80">
                <div class="abtImg"><img src="<?php echo $aboutus_page_section_3_image['url'];?>" alt="" /></div>
                <div class="abtText">
                    <h2 class="heading"><?php echo $aboutus_page_section_3_heading;?></h2>
                    <?php echo $aboutus_page_section_3_description;?>
                </div>
                <div class="clear"></div>
            </div>
            
			<div class="innerContainer mt80">
				<div class="heading center"><?php echo $aboutus_page_section_4_heading;?></div>
                <div class="coreFour">
                    <div class="coreFourImg">
                        <img src="<?php echo get_template_directory_uri();?>/images/coreFourArrow.png" alt="">
                        <img src="<?php echo get_template_directory_uri();?>/images/coreFour.png" alt="">
                    </div>
					<ul class="ul row">
                        <li class="col50">
                            <div class="aboutIconBox">
                                <div class="aiIcon">
                                    <img src="<?php echo get_template_directory_uri();?>/images/icon_learn.png" alt="">
                                </div>
                                <div class="subheading">Learn Cultures</div>
                                <div class="aiText">
                                    <p>Our world is full of cultures.<br>Experience first-hand what this diversity has to offer</p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </li>
                        <li class="col50">
                            <div class="aboutIconBox">
                                <div class="aiIcon">
                                    <img src="<?php echo get_template_directory_uri();?>/images/icon_24_7_security.png" alt="">
                                </div>
                                <div class="subheading">Secure Transactions</div>
                                <div class="aiText">
                                    <p>Collect, send, and receive payments with confidence. keeping you safe from bad transactions</p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </li>
                        <li class="col50">
                            <div class="aboutIconBox">
                                <div class="aiIcon">
                                    <img src="<?php echo get_template_directory_uri();?>/images/icon_sell.png" alt="">
                                </div>
                                <div class="subheading">Sell On Our Platform</div>
                                <div class="aiText">
                                    <p>Narrow down your audience with our unique targeted seller options and insights</p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </li>
                        <li class="col50">
                            <div class="aboutIconBox">
                                <div class="aiIcon">
                                    <img src="<?php echo get_template_directory_uri();?>/images/icon_card.png" alt="">
                                </div>
                                <div class="subheading">Shop Among Cultures</div>
                                <div class="aiText">
                                    <p>Explore new, old or custom design products specifically from your favourite cultures</p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </li>
                    </ul>
                </div>
			</div>
			
            <div class="abtSection odd mt80">
                <div class="abtImg"><img src="<?php echo $aboutus_page_section_5_image['url'];?>" alt="" /></div>
                <?php echo $aboutus_page_section_5_description;?>
            </div>
			
			<div class="innerContainer mt80">
				<div class="quote"><?php echo $quote;?></div>
			</div>
			<hr class="mt50 mb0">
		</div>
	</div>
	
	<?php include( locate_template( 'newsletter-form.php' ) ); ?>
		
</div>
<!--MAIN CONTAINER END-->
<?php
get_footer('other');