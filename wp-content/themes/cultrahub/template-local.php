<?php
/*
Template Name: Local
*/
get_header('culture');
$quote 				= get_field( 'quote', $post->ID );
$local_banner_image = get_field( 'local_banner_image', $post->ID );
$local_methods 		= get_field( 'local_methods', $post->ID );
$local_posts 		= get_field( 'local_posts', $post->ID );
$miscellaneous1 	= get_field( 'local_miscellaneous_1', $post->ID );
$miscellaneous2 	= get_field( 'local_miscellaneous_2', $post->ID );
//echo '<pre>'; print_r($miscellaneous2); die;
?>
<!--MAIN CONTAINER START-->
<div class="mainContainer" id="mainContainer">
	
	<div class="cultralocal_banner">
		<div class="border_line top">
			<span class="b_green"></span>
			<span class="b_blue"></span>
			<span class="b_red"></span>
			<span class="b_yellow"></span>
		</div>
		<img src="<?php echo $local_banner_image['url'];?>" alt="">
	</div>
	
	<div class="section">
		<div class="container">
			<div class="innerContainer">
				<div class="">
					<?php query_posts('page_id=2623'); ?>
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<?php the_content();?>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
				</div>
			</div>
            <?php
			if( !empty($local_methods) ){
			?>
                <div class="cultraIcon">
                    <ul class="ul row">
			<?php
					foreach($local_methods as $lm){
			?>
                        <li class="col25">
                            <div class="seller_block">
                                <div class="seller_icon"><img src="<?php echo $lm['local_image']['url'];?>" alt=""></div>
                                <div class="seller_text">
                                    <h3 class="subheading2"><?php echo $lm['local_heading'];?></h3>
                                    <div>
                                        <p><?php echo $lm['local_short_description'];?></p>
                                    </div>
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
        
		<?php
		if( !empty($local_posts) ){
		?>
        <div class="sliderblockWrap odd rev cultra_mockup">
		<?php
			foreach($local_posts as $lp){
		?>
            <div class="sliderblock">
                <div class="container height_div">
                    <div class="sliderImg2 hfull">
                        <img src="<?php echo $lp['local_post_image']['url'];?>" alt="" />
                    </div>
                    <div class="sliderText2 hfull">
                        <div class="table_box">
                            <div class="table_cell">
                                <h2 class="heading"><?php echo $lp['local_post_heading'];?></h2>
                                <div class="">
                                    <?php echo $lp['local_post_description'];?>
                                </div>
								<?php
								if( $lp['local_color_dots'] == 'Yes' ){
								?>
                                <div class="color_dots">
                                    <span class="yellow"></span>
                                    <span class="red"></span>
                                    <span class="blue"></span>
                                    <span class="green"></span>
                                </div>
								<?php
								}
								?>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
		<?php
			}
		?>
        </div>
		<?php
		}
		?>
        
        <div class="section">
            <div class="container">
                <div class="innerContainer">
                    <div class="align_center"><img src="<?php echo get_template_directory_uri();?>/images/logo_cultrahub_local_icon.png" alt="" /></div>
                    <h2 class="heading center mt20">Support For The Locals</h2>
                    <div class="heading_tag">The latest way to let your audience know you are here. Interact with them directly and put a personality behind the profile. List your best sellers, this years must have items, and information about what’s happening near you today.</div>
                </div>
                
                <div class="cultra_local_category">
                    <div class="cultra_local_category_img"><img src="<?php echo get_template_directory_uri();?>/images/device_mockup4.png" alt="" /></div>
                    <div class="cultra_cat_wrap">
                        <div class="cultra_cat">
                            <a href="#">
                                <div class="cultra_cat_icon"><img src="<?php echo get_template_directory_uri();?>/images/cultra_icon1.png" alt="" /></div><span>Local</span>
                            </a>
                        </div>
                        <div class="cultra_cat">
                            <a href="#">
                                <div class="cultra_cat_icon"><img src="<?php echo get_template_directory_uri();?>/images/cultra_icon2.png" alt="" /></div><span>Food</span>
                            </a>
                        </div>
                        <div class="cultra_cat">
                            <a href="#">
                                <div class="cultra_cat_icon"><img src="<?php echo get_template_directory_uri();?>/images/cultra_icon3.png" alt="" /></div><span>Living</span>
                            </a>
                        </div>
                        <div class="cultra_cat">
                            <a href="#">
                                <div class="cultra_cat_icon"><img src="<?php echo get_template_directory_uri();?>/images/cultra_icon4.png" alt="" /></div><span>Nightlife</span>
                            </a>
                        </div>
                        <div class="cultra_cat">
                            <a href="#">
                                <div class="cultra_cat_icon"><img src="<?php echo get_template_directory_uri();?>/images/cultra_icon5.png" alt="" /></div><span>Restaurants</span>
                            </a>
                        </div>
                        <div class="cultra_cat">
                            <a href="#">
                                <div class="cultra_cat_icon"><img src="<?php echo get_template_directory_uri();?>/images/cultra_icon6.png" alt="" /></div><span>Fitness</span>
                            </a>
                        </div>
                        <div class="cultra_cat">
                            <a href="#">
                                <div class="cultra_cat_icon"><img src="<?php echo get_template_directory_uri();?>/images/cultra_icon7.png" alt="" /></div><span>Legal Services</span>
                            </a>
                        </div>
                        <div class="cultra_cat">
                            <a href="#">
                                <div class="cultra_cat_icon"><img src="<?php echo get_template_directory_uri();?>/images/cultra_icon8.png" alt="" /></div><span>Shopping</span>
                            </a>
                        </div>
                        <div class="cultra_cat">
                            <a href="#">
                                <div class="cultra_cat_icon"><img src="<?php echo get_template_directory_uri();?>/images/cultra_icon9.png" alt="" /></div><span>Barber Shops</span>
                            </a>
                        </div>
                        <div class="cultra_cat">
                            <a href="#">
                                <div class="cultra_cat_icon"><img src="<?php echo get_template_directory_uri();?>/images/cultra_icon10.png" alt="" /></div><span>Arts & Entertainment</span>
                            </a>
                        </div>
                        <div class="cultra_cat">
                            <a href="#">
                                <div class="cultra_cat_icon"><img src="<?php echo get_template_directory_uri();?>/images/cultra_icon11.png" alt="" /></div><span>Automotive</span>
                            </a>
                        </div>
                        <div class="cultra_cat">
                            <a href="#">
                                <div class="cultra_cat_icon"><img src="<?php echo get_template_directory_uri();?>/images/cultra_icon12.png" alt="" /></div><span>Beauty Salons</span>
                            </a>
                        </div>
                        <div class="cultra_cat">
                            <a href="#">
                                <div class="cultra_cat_icon"><img src="<?php echo get_template_directory_uri();?>/images/cultra_icon13.png" alt="" /></div><span>Day Cares</span>
                            </a>
                        </div>
                        <div class="cultra_cat">
                            <a href="#">
                                <div class="cultra_cat_icon"><img src="<?php echo get_template_directory_uri();?>/images/cultra_icon14.png" alt="" /></div><span>Community Centers</span>
                            </a>
                        </div>
                        <div class="cultra_cat">
                            <a href="#">
                                <div class="cultra_cat_icon"><img src="<?php echo get_template_directory_uri();?>/images/cultra_icon15.png" alt="" /></div><span>Educations</span>
                            </a>
                        </div>
                        <div class="cultra_cat">
                            <a href="#">
                                <div class="cultra_cat_icon"><img src="<?php echo get_template_directory_uri();?>/images/cultra_icon16.png" alt="" /></div><span>Events Planning & Services</span>
                            </a>
                        </div>
                        <div class="cultra_cat">
                            <a href="#">
                                <div class="cultra_cat_icon"><img src="<?php echo get_template_directory_uri();?>/images/cultra_icon17.png" alt="" /></div><span>Health & Medical</span>
                            </a>
                        </div>
                        <div class="cultra_cat">
                            <a href="#">
                                <div class="cultra_cat_icon"><img src="<?php echo get_template_directory_uri();?>/images/cultra_icon18.png" alt="" /></div><span>General Home Services</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section cultra_local_banner" style="background-image: url(<?php echo $miscellaneous1[0]['miscellaneous_image_1']['url'];?>);">
            <div class="container">
                <div class="sliderblockWrap rev">
                    <div class="sliderblock">
                        <div class="sliderImg2">
                            <img src="<?php echo $miscellaneous1[0]['miscellaneous_image_2']['url'];?>" alt="" />
                        </div>                        
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section">
            <div class="container">
                <div class="innerContainer">
                    <div class="sliderblockWrap odd rev">
                        <div class="sliderblock">
                            <div class="sliderImg2">
                                <div class="coastIcons">
                                    <div class="img1"><img src="<?php echo $miscellaneous2[0]['local_midwest']['url'];?>" alt="" /></div>
                                    <div class="img2"><img src="<?php echo $miscellaneous2[0]['local_east']['url'];?>" alt="" /></div>
                                    <div class="img3"><img src="<?php echo $miscellaneous2[0]['local_south']['url'];?>" alt="" /></div>
                                    <div class="img4"><img src="<?php echo $miscellaneous2[0]['local_west']['url'];?>" alt="" /></div>
                                </div>
                            </div>
                            <div class="sliderText2">
                                <div class="table_box">
                                    <div class="table_cell">
                                        <h2 class="heading"><?php echo $miscellaneous2[0]['local_miscellaneous_2_heading'];?></h2>
                                        <div class="">
                                            <?php echo $miscellaneous2[0]['local_miscellaneous_2_description'];?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                
            <?php
			if( !empty($quote) ){
			?>
				<hr class="mt50 mb50">
				<div class="innerContainer">
					<div class="quote"><?php echo $quote;?></div>
				</div>
			<?php
			}
			?>
                <hr class="mt50 mb0">
            </div>
        </div>
        
        <?php include( locate_template( 'newsletter-form-other.php' ) ); ?>
			
	</div>
	<!--MAIN CONTAINER END-->
<?php
get_footer();