<?php
/*
Template Name: Share Quote
*/
get_header('culture');

//Banner Slider
$banner_sliders	= get_field( 'banner_sliders', $post->ID );
//Heading and details
$heading_details			= get_field( 'heading_details', $post->ID );
$menucategory_field_id 		= $heading_details->ID;
$menucategory_icon			= get_field( 'icon', $menucategory_field_id );
$menucategory_name			= get_field( 'name', $menucategory_field_id );
$cpt_content				= get_post( $menucategory_field_id );
$squote						= get_field( 'quote', $post->ID );
//posts
$get_posts					= get_field( 'shareaquote_posts', $post->ID );
//Feature Aspects
$feature_aspects_title		= get_field( 'shareaquote_feature_aspects_title', $post->ID );
$feature_aspects_description= get_field( 'shareaquote_feature_aspects_description', $post->ID );
$feature_aspects_image		= get_field( 'shareaquote_feature_aspects_image', $post->ID );
$feature_aspects_posts		= get_field( 'shareaquote_feature_aspects_posts', $post->ID );
//Quotes
$shareaquote_quote_heading	= get_field( 'shareaquote_quote_heading', $post->ID );
$shareaquote_quotes			= get_field( 'shareaquote_quotes', $post->ID );
//echo '<pre>'; print_r($feature_aspects_posts); die;
?>
<!--MAIN CONTAINER START-->
<div class="mainContainer" id="mainContainer">
<?php
if( !empty($banner_sliders) ){
?>	
	<div class="section">
		<div class="container">
			<hr class="mb35 mt0">
			<div class="full_banner">
				<div class="owl-carousel padding_banner">
				<?php
				foreach( $banner_sliders as $val_bs ){					
				?>
					<div class="item">
						<div class="banner_block">
							<a><img src="<?php echo $val_bs['image_slider']['sizes']['menucategory-page-slider-image'];?>" alt="<?php echo $val_bs['image_slider']['title'];?>" width="<?php echo $val_bs['image_slider']['sizes']['menucategory-page-slider-image-width'];?>" /></a>
						</div>
					</div>
				<?php
				}
				?>
				</div>
			</div>
			<hr class="mt35 mb0">
		</div>
	</div>
<?php
}
?>
	<div class="section">
		<div class="container">
			<div class="innerContainer">
				<div class="">
					<div class="heading_icon"><img src="<?php echo $menucategory_icon['sizes']['cultrahub-menu-category'];?>" alt="" width="<?php echo $menucategory_icon['sizes']['cultrahub-menu-category-width'];?>" height="<?php echo $menucategory_icon['sizes']['cultrahub-menu-category-height'];?>" /></div>
					<h2 class="heading center"><?php echo $menucategory_name;?></h2>
					<div class="heading_tag"><?php echo apply_filters('the_content',$cpt_content->post_content);?></div>
				</div>
				<?php
				if( !empty($get_posts) ){
				?>
				<div class="sliderblockWrap odd rev">
				<?php
					foreach( $get_posts as $post ){
				?>
					<div class="sliderblock height_div badge_of_day">
						<div class="sliderImg2 quoteImg hfull">
							<div class="img1">
								<img src="<?php echo $post['shareaquote_image1']['url'];?>" alt="" />
							<?php
								if(!empty($post['shareaquote_badge'])){
							?>
								<span class="badge_of_day_icon"><img src="<?php echo $post['shareaquote_badge']['url'];?>" alt=""></span>
							<?php
								}
							?>
							</div>
							<div class="img2"><img src="<?php echo $post['shareaquote_image2']['url'];?>" alt="" /></div>
						</div>
						<div class="sliderText2 hfull">
							<div class="table_box">
								<div class="table_cell">
									<h2 class="heading"><?php echo $post['shareaquote_title'];?></h2>
									<div class="">
										<?php echo $post['shareaquote_description'];?>
									</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
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
	</div>
	
	<div class="section">
		<div class="container">
			<div class="innerContainer">
				<div class="">
					<h2 class="heading center"><?php echo $feature_aspects_title;?></h2>
					<?php
					if(!empty($feature_aspects_description)){
					?>
					<div class="heading_tag"><?php echo $feature_aspects_description;?></div>
					<?php
					}
					?>
				</div>
			</div>
			
			<div class="feature_aspect_wrap">
				<div class="feature_aspect_img"><img src="<?php echo $feature_aspects_image['url'];?>" alt="" /></div>
				<?php
				if( !empty($feature_aspects_posts) ){
				?>
				<ul class="ul row feature_aspect_list">
				<?php
					foreach( $feature_aspects_posts as $f_post ){
				?>
					<li class="col35">
						<div class="feature_aspect_box">
							<div class="feature_aspect_icon"><img src="<?php echo $f_post['feature_aspects_icon']['url'];?>" alt="" /></div>
							<div class="feature_aspect_text">
								<h2 class="subheading2"><?php echo $f_post['feature_aspects_title'];?></h2>
								<?php
								if( !empty($f_post['feature_aspects_description']) ){
								?>
								<div><?php echo $f_post['feature_aspects_description'];?></div>
								<?php
								}
								?>
							</div>
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
			
			<div class="innerContainer mt70">
				<div class="quote_list">
					<div class="heading"><?php echo $shareaquote_quote_heading;?></div>
					<?php
					if( !empty($shareaquote_quotes) ){
					?>
					<ul class="ul row">
					<?php
					foreach( $shareaquote_quotes as $quote ){
					?>
						<li class="col33">
							<div class="quote_block">
								<h2 class="subheading2"><?php echo $quote['quotes_title'];?></h2>
								<?php
								if( !empty($quote['quotes_description']) ){
								?>
								<div>
									<p><?php echo $quote['quotes_description'];?></p>
								</div>
								<?php
								}
								?>
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
			<?php
			if(!empty($squote)){
			?>
			<hr class="mt70 mb50">
			<div class="innerContainer">
				<div class="quote">
					<?php echo $squote;?>
				</div>
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