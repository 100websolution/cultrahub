<?php
/*
Template Name: Home
*/
get_header();
$about_cultrahub 			= get_field( 'about_cultrahub', $post->ID );
$cultrahub_blocks 			= get_field( 'cultrahub_blocks', $post->ID );
$culture_postheading		= get_field( 'culture_postheading', $post->ID );
$cultrahub_genres_heading	= get_field( 'cultrahub_genres_heading', $post->ID );
$cultrahub_genres_decription= get_field( 'cultrahub_genres_decription', $post->ID );
?>
<!--MAIN CONTAINER START-->
<div class="mainContainer" id="mainContainer">	
	<div class="section borderSection">
		<div class="container">
			<div class="innerContainer">
				<div class="heading_block">
					<div class="heading2 center"><img src="<?php echo get_template_directory_uri();?>/images/learn_sell_shop.png" alt=""></div>
					<div class="color_dots">
						<span class="yellow"></span>
						<span class="red"></span>
						<span class="blue"></span>
						<span class="green"></span>
					</div>
					<?php
					if( !empty($about_cultrahub) ){
					?>
					<div class="heading_tag mt20"><?php echo nl2br($about_cultrahub);?></div>
					<?php
					}
					?>
				</div>
				<?php
				if( !empty($cultrahub_blocks) ){
				?>
				<ul class="row ul iconList homeIcon">
				<?php
					foreach( $cultrahub_blocks as $cb ){
				?>
					<li class="col33">
						<div class="iconBlock">
                            <a href="#">
                                <div class="iconImg scroll_effect" data-effect="fadeInUp" data-delay="300"><img src="<?php echo $cb['block_image']['url'];?>" alt=""></div>
                                <div class="iconText">
                                    <h3 class="subheading2"><?php echo $cb['block_title'];?></h3>
                                </div>
                            </a>
						</div>
					</li>
				<?php
					}
				?>
				</ul>
				<?php
				}
				?>
			</div>
		</div>
	</div>
	
	<div class="section">
		<div class="container">
			<div class="innerContainer">
				<h2 class="heading center"><?php echo $culture_postheading;?></h2>
				<div class="owl-carousel" id="culture_slider">
				<?php
				query_posts('post_type=culture&order=asc&orderby=id');
				if (have_posts()) : while (have_posts()) : the_post();
					$culture_icon = get_field( 'icon', $post->ID );					
				?>
					<div class="item">
						<div class="culture_block">
							<div class="culture_img square_block imgEffect">
								<a href="<?php the_permalink();?>">
									<?php the_post_thumbnail( array( 256, 256 ) );?>
								</a>								
							</div>
							<div class="culture_text">
								<a href="<?php the_permalink();?>" class="culture_icon">
									<img src="<?php echo $culture_icon['sizes']['cultrahub-home-icon'];?>" alt="<?php the_title();?>" width="<?php echo $culture_icon['sizes']['cultrahub-home-icon-width'];?>" height="<?php echo $culture_icon['sizes']['cultrahub-home-icon-height'];?>" />
								</a>
								<div class="culture_text_inner">
									<h3 class="culture_title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
									<?php if( get_field( 'followers', $post->ID ) != '' ){ ?>
									<div class="culture_info">Culture <span><em><?php echo get_field( 'followers', $post->ID );?></em> Followers</span></div>
									<?php } ?>									
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
				<?php
				endwhile; endif;
				wp_reset_query();
				?>
				</div>
			</div>
		</div>
	</div>
	
	<div class="section maintab">
		<div class="container">
            <div class="innerContainer">
                <div class="allCulture">
                    <div class="owl-carousel" id="allCulture">
                    <?php
                    query_posts('post_type=culture&order=asc&orderby=id');
                    if (have_posts()) : while (have_posts()) : the_post();
                        $culture_icon = get_field( 'icon', $post->ID );					
                    ?>
                        <div class="item">
                            <div class="allCultureBox">
								<a href="<?php the_permalink();?>">
                                    <div class="culture_box">
									    <img src="<?php echo $culture_icon['sizes']['cultrahub-home-icon'];?>" alt="<?php the_title();?>">
                                    </div>
                                    <div class="allCultureText"><?php the_title();?> Culture</div>
								</a>
							</div>
                        </div>
                    <?php
                    endwhile; endif;
                    wp_reset_query();
                    ?>
                        <div class="item">
                            <div class="allCultureBox">
								<a href="#">
                                    <div class="culture_box">
									    <img src="<?php echo get_template_directory_uri();?>/images/badge_canadian.png" alt="Canadian">
                                    </div>
                                    <div class="allCultureText">Canadian Culture</div>
								</a>
							</div>
                        </div>
                        <div class="item">
                            <div class="allCultureBox">
								<a href="#">
                                    <div class="culture_box">
									    <img src="<?php echo get_template_directory_uri();?>/images/badge_indian.png" alt="Indian">
                                    </div>
                                    <div class="allCultureText">Indian Culture</div>
								</a>
							</div>
                        </div>
                        <div class="item">
                            <div class="allCultureBox">
								<a href="#">
                                    <div class="culture_box">
									    <img src="<?php echo get_template_directory_uri();?>/images/badge_judaism.png" alt="Judaism">
                                    </div>
                                    <div class="allCultureText">Judaism Culture</div>
								</a>
							</div>
                        </div>
                        <div class="item">
                            <div class="allCultureBox">
								<a href="#">
                                    <div class="culture_box">
									    <img src="<?php echo get_template_directory_uri();?>/images/badge_middie_eastern.png" alt="Middle Eastern">
                                    </div>
                                    <div class="allCultureText">Middle Eastern Culture</div>
								</a>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mb70 mt70">
			<div class="innerContainer">
				<div class="owl-carousel maintabslider">
				<?php
				query_posts('post_type=menucategory&order=asc&orderby=id');
				if (have_posts()) : while (have_posts()) : the_post();
					$menucategory_short_title 	= get_field( 'menucategory_short_title', $post->ID );
					$slider_icon 				= get_field( 'icon', $post->ID );
					$slider_images 				= get_field( 'slider_images', $post->ID );
					$details_page_link 			= get_field( 'details_page_link', $post->ID );				
				?>
					<div class="item">
						<div class="sliderblockWrap odd">
							<div class="sliderblock">
							<?php
							if( !empty($slider_images) ){
								foreach( $slider_images as $image ){
							?>
								<div class="sliderImg scroll_effect" data-effect="fadeInLeft" data-delay="300">
									<img src="<?php echo $image['image']['url'];?>" alt="" />
								</div>
							<?php
								}
							}
							?>
								<div class="sliderText scroll_effect" data-effect="fadeInRight" data-delay="300">
									<div class="sliderIcon">
										<img src="<?php echo $slider_icon['url'];?>" alt="<?php the_title();?>" />
									</div>
									<h2 class="heading"><?php the_title();?>,</h2>
									<?php
									if( !empty($menucategory_short_title) ){
									?>
									<h2 class="subheading2"><?php echo $menucategory_short_title;?></h2>
									<?php
									}
									?>
									<div class="">
										<?php the_excerpt();?>
									</div>
									<a href="<?php echo get_permalink($details_page_link);?>" class="btn">Learn More</a>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
				<?php
				endwhile; endif;
				wp_reset_query();
				?>
				</div>
			</div>
		</div>
	</div>
	
	<div class="section">
		<div class="container">
			<h2 class="heading center"><?php echo $cultrahub_genres_heading;?></h2>
			<div class="heading_tag"><?php echo $cultrahub_genres_decription;?></div>
			<div class="innerContainer">
				<div class="owl-carousel" id="genre_slider">
				<?php
				query_posts('post_type=genre&order=asc&orderby=id');
				if (have_posts()) : while (have_posts()) : the_post();
					$icon 			= get_field( 'icon', $post->ID );					
					$genre_color	= get_field( 'genre_color', $post->ID );					
				?>
					<div class="item">
						<div class="genre_block <?php echo $genre_color;?>">
							<a href="#">
								<div class="genre_box">
									<div class="genre_img"><?php the_post_thumbnail( array( 258, 400 ) );?></div>
									<div class="genre_icon"><img src="<?php echo $icon['url'];?>" alt="<?php echo $icon['title'];?>" /></div>
								</div>
								<h2 class="subheading2"><?php the_title();?></h2>
							</a>
						</div>
					</div>
				<?php
				endwhile; endif;
				wp_reset_query();
				?>
				</div>
			</div>
			<hr class="mb0 mt70" style="border-color: #8d8f92;">
		</div>
	</div>
	
	<div class="section seller_section">
		<div class="container">
		    <div class="innerContainer">
                <div class="sliderblockWrap odd rev">
                    <div class="sliderblock">
                        <?php
                        if ( have_posts() ) while ( have_posts() ) : the_post();
                            the_content();
                        endwhile;
                        wp_reset_query();
                        ?>
                        <div class="clear"></div>
                    </div>
                </div>
		    </div>
        </div>
    </div>
	
	<div class="section">
		<div class="container">
			<div class="innerContainer">
				<div class="sliderblockWrap rev smallImg">
				<?php
				$n=1;
				query_posts('post_type=blog&order=asc&orderby=id');
				if (have_posts()) : while (have_posts()) : the_post();
					$get_details 		= get_field( 'details', $post->ID );
					$blog_short_heading = get_field( 'blog_short_heading', $post->ID );
				?>
					<div class="sliderblock">
				<?php
					if( count($get_details) > 1 ){
				?>
						<div class="sliderImg2 sliderImgText scroll_effect" data-effect="fadeInRight" data-delay="300">
							<div class="owl-carousel <?php if($n==1)echo 'owl1';else echo 'owl1_noarrow';?>">
				<?php
							foreach( $get_details as $gd ){
				?>
								<div class="item">
									<div class="sliderImgBoxWrap">
										<div class="sliderImgBox">
											<img src="<?php echo $gd['image']['sizes']['cultrahub-home-blog'];?>" alt="<?php echo $gd['image']['title'];?>" />
										</div>
				<?php
									if( $gd['name'] != '' || $gd['designation'] != '' ){
				?>
										<div class="sliderTextBox">
				<?php
										if( $gd['name'] != '' ){
				?>
											<h2 class="subheading"><?php echo $gd['name'];?></h2>
				<?php
										}
										if( $gd['designation'] != '' ){
				?>
											<span><?php echo $gd['designation'];?></span>
				<?php
										}
				?>
										</div>
				<?php
									}
				?>
									</div>
								</div>
				<?php
							}
				?>
							</div>
						</div>
				<?php
					}
					else{
				?>
						<div class="sliderImg2 scroll_effect" data-effect="fadeInLeft" data-delay="300">
							<div class="sliderImgBox">
								<img src="<?php echo $get_details[0]['image']['sizes']['cultrahub-home-blog'];?>" alt="<?php echo $get_details[0]['image']['title'];?>" />
							</div>
						</div>
				<?php
					}
				?>
						<div class="sliderText2 scroll_effect" data-effect="fadeInLeft" data-delay="300">
							<h2 class="heading"><?php the_title();?></h2>
							<h3 class="subheading2"><?php echo $blog_short_heading;?></h3>
							<div class="">
								<?php the_content();?>
							</div>
                            <a href="#" class="btn">Learn More</a>
						</div>
						<div class="clear"></div>
					</div>
				<?php
				$n++;
				endwhile; endif;
				wp_reset_query();
				?>
				</div>
			</div>
		</div>
	</div>
	<?php
	$home_blog_lower 		= get_field( 'home_blog_lower_slider', $post->ID );
	$home_blog_lower_logo 	= get_field( 'home_blog_lower_logo', $post->ID );
	?>
	<div class="section mobSliderWrap">
		<div class="container">
			<div class="innerContainer">
				<div class="sliderblockWrap rev">
					<div class="sliderblock height_div">
						<div class="sliderImg2 mobSlider hfull scroll_effect" data-effect="fadeInLeft" data-delay="300">
						<?php
						if( !empty($home_blog_lower_logo) ){
						?>
							<div class="logo_cultralocal">
								<a href="<?php echo get_permalink(2623);?>"><img src="<?php echo $home_blog_lower_logo['url'];?>" alt=""></a>
							</div>
						<?php
						}
						if(!empty($home_blog_lower)){
						?>
							<div class="owl-carousel owl1">
							<?php
								foreach($home_blog_lower as $hbl){
							?>
								<div class="item">
									<div class="sliderImgBox">
										<img src="<?php echo $hbl['home_blog_lower_images']['url'];?>" alt="" />
									</div>
								</div>
							<?php
								}
							?>
							</div>
						<?php
						}
						?>
							<div class="color_dots align_center">
								<span class="yellow"></span>
								<span class="red"></span>
								<span class="blue"></span>
								<span class="green"></span>
							</div>
						</div>
						<div class="sliderText2 hfull scroll_effect" data-effect="fadeInRight" data-delay="300">
							<div class="table_box">
								<div class="table_cell">
									<h2 class="heading"><?php echo get_field( 'home_blog_lower_heading', $post->ID );?></h2>
									<div class="">
										<p><?php echo get_field( 'home_blog_lower_description', $post->ID );?></p>
									</div>
									<div class="btnGroup">
										<a href="<?php echo get_permalink(2623);?>" class="btn btnBlue">Read More</a>
										<a href="<?php echo get_permalink(2584);?>" class="btn">Contact Us</a>
										<a href="mailto:info@cultrahub.com" class="btn mail"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	$share_yor_thought_icon 			= get_field( 'share_yor_thought_icon', $post->ID );
	$share_yor_thought_title 			= get_field( 'share_yor_thought_title', $post->ID );
	$share_yor_thought_description 		= get_field( 'share_yor_thought_description', $post->ID );
	$share_yor_thought_short_description= get_field( 'share_yor_thought_short_description', $post->ID );
	?>
	<div class="section review_form">
		<div class="container">
			<div class="innerContainer">
				<div class="sliderblockWrap odd rev">
					<div class="sliderblock">
						<div class="sliderText2 scroll_effect" data-effect="fadeInLeft" data-delay="300">
							<div class="table_box">
								<div class="table_cell">
									<h2 class="heading">
										<img src="<?php echo $share_yor_thought_icon['url'];?>" alt="" />
										<?php echo $share_yor_thought_title;?>
									</h2>
									<div class="">
										<?php echo $share_yor_thought_description;?>
									</div>
								</div>
							</div>
						</div>
						<div class="sliderImg2 scroll_effect" data-effect="fadeInRight" data-delay="300">
							<?php //echo do_shortcode( '[contact-form-7 id="2904" title="Share Your Thoughts"]' );?>
							<form method="post" id="sharethought_form" class="form_validation">
								<ul class="ul row">
									<li class="col50">
										<label>First Name</label>
										<input type="text" class="required" placeholder="Write your first name" id="firstname_sharethought" name="firstname_sharethought">
									</li>
									<li class="col50">
										<label>Last Name</label>
										<input type="text" class="required" placeholder="Write your last name" id="lastname_sharethought" name="lastname_sharethought">
									</li>
									<li class="col100">
										<label>Email Address</label>
										<input type="email" placeholder="Write your email address" id="email_sharethought" name="email_sharethought">
									</li>
									<li class="col100">
										<label>Feedback</label>
										<textarea placeholder="Your feedback about the site" class="required" id="feedback_sharethought" name="feedback_sharethought"></textarea>
									</li>
									<li class="col100">
										<label>Mood</label>
										<div class="mood_list">
											<label>
												<input type="radio" class="md" name="review_sharethought" value="Love it!">
												<span><img src="<?php echo get_template_directory_uri();?>/images/mood5.png" alt="">Love it!</span>
											</label>
											<label>
												<input type="radio" class="md" name="review_sharethought" value="Awesome!">
												<span><img src="<?php echo get_template_directory_uri();?>/images/mood4.png" alt="">Awesome!</span>
											</label>
											<label>
												<input type="radio" class="md" name="review_sharethought" value="Like it!">
												<span><img src="<?php echo get_template_directory_uri();?>/images/mood3.png" alt="">Like it!</span>
											</label>
											<label>
												<input type="radio" class="md" name="review_sharethought" value="Don’t Like it!">
												<span><img src="<?php echo get_template_directory_uri();?>/images/mood2.png" alt="">Don’t Like it!</span>
											</label>
											<label>
												<input type="radio" class="md" name="review_sharethought" value="Boring!">
												<span><img src="<?php echo get_template_directory_uri();?>/images/mood1.png" alt="">Boring!</span>
											</label>
										</div>
										<input type="hidden" value="" name="mood_selected" id="mood_selected" class="selectmood" />
										<div id="sharethought_mood" style="color:#ff0000; display:none;"></div>
									</li>
									<li class="col100 align_center">
										<input type="submit" id="submit_sharethought" value="SUBMIT FEEDBACK" class="btnRed w80">
										<div class="">
											<small>You can also email us at <a href="mailto:info@cultrahub.com">info@cultrahub.com</a>.</small>
										</div>
									</li>
									<li class="align_center" id="sharethought_message"></li>
								</ul>
							</form>
						</div>
						<div class="clear"></div>
                        <div class="border_top align_center">
                            <small><?php echo $share_yor_thought_short_description;?><br>Please <a href="#" class="blueLight">Click Here</a> for full terms and conditions</small>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
</div>
<!--MAIN CONTAINER END-->
<script>
$(document).ready(function(){
	$('.wpcf7-list-item').each(function(){
		var mood = $(this).text();
		if( mood == 'Love it!' ){
			$('#mood_0').prepend('<img src="<?php echo get_template_directory_uri();?>/images/mood5.png" alt="Love it!">');			
		}
		else if( mood == 'Awesome!' ){
			$('#mood_1').prepend('<img src="<?php echo get_template_directory_uri();?>/images/mood4.png" alt="Awesome!">');
		}
		else if( mood == 'Like it!' ){
			$('#mood_2').prepend('<img src="<?php echo get_template_directory_uri();?>/images/mood3.png" alt="Like it!">');
		}
		else if( mood == 'Don’t Like it!' ){
			$('#mood_3').prepend('<img src="<?php echo get_template_directory_uri();?>/images/mood2.png" alt="Don’t Like it!">');
		}
		else if( mood == 'Boring!' ){
			$('#mood_4').prepend('<img src="<?php echo get_template_directory_uri();?>/images/mood1.png" alt="Boring!">');
		}
	});
});
</script>
<?php
get_footer();