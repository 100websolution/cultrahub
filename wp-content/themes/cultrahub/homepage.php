<?php
/*
Template Name: Home
*/
get_header();
?>
<!--MAIN CONTAINER START-->
<div class="mainContainer" id="mainContainer">	
	<div class="section borderSection">
		<div class="container">
			<div class="heading_block">
				<div class="heading2 center"><?php _e('Learn / Sell / Shop', 'cultrahub');?></div>
				<div class="color_dots">
					<span class="yellow"></span>
					<span class="red"></span>
					<span class="blue"></span>
					<span class="green"></span>
				</div>
			</div>
			<div class="innerContainer">
				<ul class="row ul iconList">
					<li class="col33">
						<div class="iconBlock">
							<?php dynamic_sidebar( 'learn-cultures-sidebar' );?>
						</div>
					</li>
					<li class="col33">
						<div class="iconBlock">
							<?php dynamic_sidebar( 'sell-on-our-platform-sidebar' );?>
						</div>
					</li>
					<li class="col33">
						<div class="iconBlock">
							<?php dynamic_sidebar( 'shop-among-cultures-sidebar' );?>
						</div>
					</li>
				</ul>
				
				<div class="border_top seller_section">
					<div class="sliderblockWrap odd rev">
						<div class="sliderblock">
							<?php the_content();?>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
	<div class="section">
		<div class="container">
			<?php dynamic_sidebar( 'cultrahub-cultures-discover' );?>
			<div class="innerContainer">
				<div class="owl-carousel" id="culture_slider">
				<?php
				query_posts('post_type=culture&order=asc&orderby=id');
				if (have_posts()) : while (have_posts()) : the_post();
					$culture_icon = get_field( 'icon', $post->ID );
					//echo '<pre>'; print_r($culture_icon); die;
				?>
					<div class="item">
						<div class="culture_block">
							<div class="culture_img square_block imgEffect">
								<a href="<?php the_permalink();?>">
									<?php the_post_thumbnail( array( 256, 256 ) );?>
								</a>
							</div>
							<div class="culture_text">
								<span class="culture_icon"><img src="<?php echo $culture_icon['sizes']['cultrahub-home-icon'];?>" alt="<?php the_title();?>" width="<?php echo $culture_icon['sizes']['cultrahub-home-icon-width'];?>" height="<?php echo $culture_icon['sizes']['cultrahub-home-icon-height'];?>" /></span>
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
				<?php dynamic_sidebar( 'cultrahub-quote' ); ?>
			</div>
		</div>
	</div>	
	<div class="section">
		<div class="container">
			<div class="sliderblockWrap">
			<?php
			query_posts('post_type=menucategory&order=asc&orderby=id');
			if (have_posts()) : while (have_posts()) : the_post();
				$slider_icon = get_field( 'icon', $post->ID );
				$slider_images = get_field( 'slider_images', $post->ID );
				$details_page_link = get_field( 'details_page_link', $post->ID );				
			?>
				<div class="sliderblock">
					<div class="sliderImg">
						<div class="owl-carousel owl1">
					<?php
					if( !empty($slider_images) ){
						foreach( $slider_images as $image ){
					?>
							<div class="item">
								<div class="sliderImgBox">
									<img src="<?php echo $image['image']['sizes']['cultrahub-menu-category'];?>" alt="" width="<?php echo $image['image']['sizes']['cultrahub-menu-category-width'];?>" height="<?php echo $image['image']['sizes']['cultrahub-menu-category-height'];?>" />
								</div>
							</div>
					<?php
						}
					}
					?>
						</div>
					</div>
					<div class="sliderText">
						<div class="sliderIcon">
							<img src="<?php echo $slider_icon['url'];?>" alt="<?php the_title();?>" />
							<span><?php echo get_field( 'name', $post->ID );?></span>
						</div>
						<h2 class="heading"><?php the_title();?></h2>
						<div class="">
							<?php the_excerpt();?>
						</div>
						<a href="<?php echo $details_page_link;?>" class="btn">Learn More</a>
					</div>
					<div class="clear"></div>
				</div>
			<?php
			endwhile; endif;
			wp_reset_query();
			?>
			</div>
		</div>
	</div>
	
	<div class="section">
		<div class="container">
			<?php dynamic_sidebar( 'cultrahub-genres' );?>
			<div class="innerContainer">
				<div class="owl-carousel" id="genre_slider">
				<?php
				query_posts('post_type=genre&order=asc&orderby=id');
				if (have_posts()) : while (have_posts()) : the_post();
					$icon = get_field( 'icon', $post->ID );					
				?>
					<div class="item">
						<div class="genre_block">
							<a href="#">
								<div class="genre_box">
									<div class="genre_img">
										<?php the_post_thumbnail( array( 258, 400 ) );?>
									</div>
									<div class="genre_icon">
										<img src="<?php echo $icon['url'];?>" alt="<?php echo $icon['title'];?>" />
									</div>
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
		</div>
	</div>
	
	<div class="section">
		<div class="container">
			<hr class="mb70 mt0">
			<div class="innerContainer">
				<div class="sliderblockWrap odd rev">
				<?php
				query_posts('post_type=blog&order=asc&orderby=id');
				if (have_posts()) : while (have_posts()) : the_post();
					$get_details = get_field( 'details', $post->ID );
				?>
					<div class="sliderblock">						
						<?php
						if( count($get_details) > 1 ){
						?>
							<div class="sliderImg2 sliderImgText">
								<div class="owl-carousel owl1">
						<?php
							foreach( $get_details as $gd ){
						?>
									<div class="item">
										<div class="sliderImgBox">
											<img src="<?php echo $gd['image']['sizes']['cultrahub-home-blog'];?>" alt="<?php echo $gd['image']['title'];?>" width="<?php echo $gd['image']['sizes']['cultrahub-home-blog-width'];?>" height="<?php echo $gd['image']['sizes']['cultrahub-home-blog-height'];?>" />
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
						<?php
							}
						?>
								</div>
							</div>
						<?php
						}else{
						?>
							<div class="sliderImg2">
								<div class="sliderImgBox">
									<img src="<?php echo $get_details[0]['image']['sizes']['cultrahub-home-blog'];?>" alt="<?php echo $get_details[0]['image']['title'];?>" width="<?php echo $get_details[0]['image']['sizes']['cultrahub-home-blog-width'];?>" height="<?php echo $get_details[0]['sizes']['cultrahub-home-blog-height'];?>" />
								</div>
							</div>
						<?php
						}
						?>
						<div class="sliderText2">
							<h2 class="heading"><?php the_title();?></h2>
							<div class="">
								<?php the_excerpt();?>								
							</div>
						</div>
						<div class="clear"></div>
					</div>
				<?php
				endwhile; endif;
				wp_reset_query();
				?>
				</div>
			</div>
		</div>
	</div>
	<?php
	$home_blog_lower = get_field( 'home_blog_lower_slider', $post->ID );
	?>
	<div class="section mobSliderWrap">
		<div class="container">
			<div class="innerContainer">
				<div class="sliderblockWrap odd1 rev">
					<div class="sliderblock">
					<?php
					if(!empty($home_blog_lower)){					
					?>
						<div class="sliderImg2 mobSlider">
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
						</div>
					<?php
					}
					?>
						<div class="sliderText2">
							<h2 class="heading"><?php echo get_field( 'home_blog_lower_heading', $post->ID );?></h2>
							<div class="">
								<p><?php echo get_field( 'home_blog_lower_description', $post->ID );?></p>
							</div>
							<div class="btnGroup">
								<a href="#" class="btn btnBlue">Read More</a>
								<a href="#" class="btn">Contact Us</a>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php include( locate_template( 'newsletter-form.php' ) ); ?>
	
	<div class="section policy_section">
		<div class="newsletter_img"><img src="<?php echo get_template_directory_uri();?>/images/bg_newsletter.jpg" alt="" /></div>		
		<div class="border_line">
			<span class="b_yellow"></span>
			<span class="b_red"></span>
			<span class="b_blue"></span>
			<span class="b_green"></span>
		</div>		
		<div class="container">
			<ul class="ul row">
				<li class="col33">
					<div class="policy_block">
						<?php dynamic_sidebar( 'cultrahub-sidebar-footer1' );?>
						<div class="clear"></div>
					</div>
				</li>
				<li class="col33">
					<div class="policy_block">
						<?php dynamic_sidebar( 'cultrahub-sidebar-footer2' );?>
						<div class="clear"></div>
					</div>
				</li>
				<li class="col33">
					<div class="policy_block">
						<?php dynamic_sidebar( 'cultrahub-sidebar-footer3' );?>
						<div class="clear"></div>
					</div>
				</li>
			</ul>
		</div>
	</div>		
</div>
<!--MAIN CONTAINER END-->
<?php
get_footer();