<?php
/*
Template Name: Popular Stores
*/
get_header('culture');

//Banner Slider
$banner_sliders	= get_field( 'banner_sliders', $post->ID );
//Heading and details
$heading_details			= get_field( 'heading_details', $post->ID );
$menucategory_field_id 		= $heading_details->ID;
$menucategory_icon			= get_field( 'icon', $menucategory_field_id );
$menucategory_name			= get_field( 'name', $menucategory_field_id );
$popularpageshortdescription= get_field( 'popularpageshortdescription', $post->ID );
$cpt_content				= get_post( $menucategory_field_id );
$get_posts					= get_field( 'popular_page_posts', $post->ID );
$quote						= get_field( 'quote', $post->ID );
?>
<!--MAIN CONTAINER START-->
<div class="mainContainer" id="mainContainer">
<?php
if( !empty($banner_sliders) ){
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
}
?>
	
	<div class="section">
		<div class="container">
			<div class="innerContainer">
				<div class="">
					<div class="heading_icon"><img src="<?php echo $menucategory_icon['sizes']['menucategory-page-slider-image'];?>" alt="" width="<?php echo $menucategory_icon['sizes']['menucategory-page-slider-image-width'];?>" height="<?php echo $menucategory_icon['sizes']['menucategory-page-slider-image-height'];?>" /></div>
					<h2 class="heading center"><?php echo the_title();?></h2>
					<?php
					if($popularpageshortdescription != ''){
					?>
						<div class="heading_tag">
							<p><?php echo $popularpageshortdescription;?></p>
							<?php //echo strip_tags(apply_filters('the_content',$cpt_content->post_content));?>
						</div>
					<?php
					}
					?>
				</div>
			</div>
			
			<?php
			if(!empty($get_posts)){
			?>
			<div class="sliderblockWrap rev">
			<?php
				foreach($get_posts as $val){
					$grey_icon = ''; $icon = '';
					if(!empty($val['category_popular'])){
						$grey_icon			  = get_field( 'culture_page_grey_icon', $val['category_popular']->ID );
					}
					if(!empty($val['culture_popular'])){
						$icon			  	  = get_field( 'icon', $val['culture_popular']->ID );
					}
			?>
				<div class="sliderblock popular_store_block height_div">
					<div class="sliderImg2 popular_store_img hfull">
						<img src="<?php echo $val['popular_image']['url'];?>" alt="" />
					</div>
					<div class="sliderText2 popular_store_text hfull">
						<div class="table_box">
							<div class="table_cell">
								<div class="store_icon">
									<a href="#"><img src="<?php echo $val['store_logo']['url'];?>" alt=""></a>
								</div>
								<div class="store_head">
									<h2 class="heading"><a href="#"><?php echo $val['popular_post_title'];?></a></h2>
								<?php
								if(!empty($val['category_popular'])){
								?>
									<div class="store_genre">
										<a href="#"><img src="<?php echo $grey_icon['url'];?>" alt="" /> <?php echo $val['category_popular']->post_title;?> Department</a>
									</div>
								<?php
								}
								?>
								</div>
								<div class="store_body">
									<?php echo $val['popular_post_description'];?>
								</div>
								<?php
								if(!empty($val['category_popular'])){
								?>
								<div class="store_culture">
									<div class="store_culture_icon"><img src="<?php echo $icon['url'];?>" alt="" /></div>
									<div class="store_culture_text"><strong><?php echo $val['culture_popular']->post_title;?></strong><span>Colombia</span></div>
								</div>
								<?php
								}
								?>
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
			<?php
			if(!empty($quote)){
			?>
			<div class="innerContainer mt70">
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