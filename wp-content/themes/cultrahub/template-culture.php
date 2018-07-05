<?php
/*
Template Name: Culture
*/
get_header('culture');

/*//Banner Slider
$banner_sliders	= get_field( 'banner_sliders', $post->ID );
//Heading and details
$heading_details			= get_field( 'heading_details', $post->ID );
$menucategory_field_id 		= $heading_details->ID;
$menucategory_icon			= get_field( 'icon', $menucategory_field_id );
$menucategory_name			= get_field( 'name', $menucategory_field_id );
$sharequoteshortdescription = get_field( 'sharequoteshortdescription', $post->ID );
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
//echo '<pre>'; print_r($feature_aspects_posts); die;*/
?>
<!--MAIN CONTAINER START-->
<div class="mainContainer" id="mainContainer">
<?php
/*if( !empty($banner_sliders) ){
?>	
	<div class="section pb0">
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
}*/
?>
	<?php /*<div class="section shareqtblock">
		<div class="container">
			<div class="innerContainer">
				<div class="">
					<div class="heading_icon"><img src="<?php echo $menucategory_icon['sizes']['menucategory-page-slider-image'];?>" alt="" width="<?php echo $menucategory_icon['sizes']['menucategory-page-slider-image-width'];?>" height="<?php echo $menucategory_icon['sizes']['menucategory-page-slider-image-height'];?>" /></div>
					<h2 class="heading center"><?php echo the_title();?></h2>
					<?php
					if( $sharequoteshortdescription != '' ){
					?>
						<div class="heading_tag">
							<?php //echo apply_filters('the_content',$cpt_content->post_content);?>
							<p><?php echo $sharequoteshortdescription;?></p>
						</div>
					<?php
					}
					?>					
				</div>
				<?php
				if( !empty($get_posts) ){
					$m=1;
				?>
				<div class="sliderblockWrap odd rev">
				<?php
					foreach( $get_posts as $post ){
				?>
					<div class="sliderblock f24 rm <?php if(count($get_posts)==$m)echo 'badge_of_day';?>">
						<div class="sliderImg2 quoteImg">
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
						<div class="sliderText2 ptb50">
							<div class="table_box">
								<div class="table_cell">
									<h2 class="heading2 medium"><?php echo $post['shareaquote_title'];?></h2>
									<h3 class="heading nobrdr rm"><?php echo $post['shareaquotesubheading'];?></h3>
									<div class="">
										<?php echo $post['shareaquote_description'];?>
									</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				<?php
					$m++;
					}
				?>
				</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>*/?>
</div>
<!--MAIN CONTAINER END-->
<?php
get_footer();