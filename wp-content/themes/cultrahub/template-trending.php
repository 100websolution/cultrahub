<?php
/*
Template Name: Trending Now
*/
get_header('culture');

//Banner Slider
$banner_sliders	= get_field( 'banner_sliders', $post->ID );
//Heading and details
$heading_details		= get_field( 'heading_details', $post->ID );
$menucategory_field_id 	= $heading_details->ID;
$menucategory_icon		= get_field( 'icon', $menucategory_field_id );
$menucategory_name		= get_field( 'name', $menucategory_field_id );
$cpt_content			= get_post( $menucategory_field_id );
$get_posts				= get_field( 'trending_page_posts', $post->ID );
$featured_heading		= get_field( 'heading_trending', $post->ID );
$featured_description	= get_field( 'short_description_trending', $post->ID );
$get_featured_products	= get_field( 'trending_now_featured_products', $post->ID );
$quote					= get_field( 'quote', $post->ID );
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
					foreach($get_posts as $val_post){
				?>
					<div class="sliderblock height_div">
						<div class="sliderImg2 doubleImg hfull">
							<div class="img1"><img src="<?php echo $val_post['trending_image_1']['url'];?>" alt="" /></div>
							<div class="img2"><img src="<?php echo $val_post['trending_image_2']['url'];?>" alt="" /></div>
						</div>
						<div class="sliderText2 hfull">
							<div class="table_box">
								<div class="table_cell">
									<h2 class="heading"><?php echo $val_post['trending_post_title'];?></h2>
									<div class="">
										<?php echo $val_post['trending_post_description'];?>
									</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				<?php
					}
				?>				
					<div class="sliderblock height_div f14">
						<div class="sliderImg2 doubleImg hfull">
							<div class="imgFull"><?php the_post_thumbnail('full');?></div>
						</div>
						<div class="sliderText2 hfull">
							<div class="table_box">
								<div class="table_cell">
									<?php echo apply_filters('the_content',$post->post_content);?>
								</div>
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
	</div>
	
	<div class="section">
		<div class="container">
			<div class="innerContainer">
				<div class="">
					<h2 class="heading center"><?php echo $featured_heading;?></h2>
					<div class="heading_tag">
						<?php echo $featured_description;?>
					</div>
					<?php
					if(!empty($get_featured_products)){
					?>
					<div class="isotope_productx">
						<div class="isotop_wrap">
					<?php
						foreach($get_featured_products as $val){
					?>
							<div class="isotope_block isotope">
								<div class="isotope_product">
									<a href="#">
										<img src="<?php echo $val['featured_products_trending']['url'];?>" alt="">
									</a>
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
				</div>
			</div>
			
			<hr class="mt70 mb50">
			<?php
			if(!empty($quote)){
			?>
			<div class="innerContainer">
				<div class="quote">
					<?php echo $quote;?>
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