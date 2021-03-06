<?php
/*
Template Name: Exclusive
*/
get_header('culture');

//Banner Slider
$banner_sliders	= get_field( 'banner_sliders', $post->ID );
//Heading and details
$heading_details				= get_field( 'heading_details', $post->ID );
$menucategory_field_id 			= $heading_details->ID;
$menucategory_icon				= get_field( 'icon', $menucategory_field_id );
$menucategory_name				= get_field( 'name', $menucategory_field_id );
$exclusivepageshortdescription	= get_field( 'exclusivepageshortdescription', $post->ID );
$cpt_content					= get_post( $menucategory_field_id );
$get_posts						= get_field( 'trending_page_posts', $post->ID );
$featured_heading				= get_field( 'heading_trending', $post->ID );
$featured_description			= get_field( 'short_description_trending', $post->ID );
$get_featured_products			= get_field( 'trending_now_featured_products', $post->ID );
$quote							= get_field( 'quote', $post->ID );
//Store
$exclusivestoretitle			= get_field( 'exclusivestoretitle', $post->ID );
$exclusivestoredescription		= get_field( 'exclusivestoredescription', $post->ID );
$exclusive_store				= get_field( 'exclusive_store', $post->ID );
//Brand
$exclusivebrandtitle			= get_field( 'exclusivebrandtitle', $post->ID );
$exclusivebranddescription		= get_field( 'exclusivebranddescription', $post->ID );
$exclusive_brand				= get_field( 'exclusive_brand', $post->ID );
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
	<div class="section mob_pb0">
		<div class="container">
		    <div class="heading_icon"><img src="<?php echo $menucategory_icon['sizes']['menucategory-page-slider-image'];?>" alt="" width="<?php echo $menucategory_icon['sizes']['menucategory-page-slider-image-width'];?>" height="<?php echo $menucategory_icon['sizes']['menucategory-page-slider-image-height'];?>" /></div>
            <h2 class="heading center"><?php echo the_title();?></h2>
            <?php
            if($exclusivepageshortdescription != ''){
            ?>
                <div class="heading_tag">
                    <p><?php echo nl2br($exclusivepageshortdescription);?></p>
                    <?php //echo apply_filters('the_content',$cpt_content->post_content);?>
                </div>
            <?php
            }
            ?>
			<div class="innerContainer">
				<div class="">
					<div class="exclusive_product">
						<ul class="ul row height_div">
							<li class="col25">
								<ul class="ul row">
									<li class="col100">
										<div class="exclusive_block hhalf">
											<div class="exclusive_img">
												<img src="<?php echo get_template_directory_uri();?>/images/exclusive_product1.jpg" alt="">
											</div>
											<a href="#" class="exclusive_link w tr">Men's Shoes</a>
										</div>
									</li>
									<li class="col100">
										<div class="exclusive_block hfull">
											<div class="exclusive_img">
												<img src="<?php echo get_template_directory_uri();?>/images/exclusive_product4.jpg" alt="">
											</div>
											<a href="#" class="exclusive_link w bl">Art</a>
										</div>
									</li>
								</ul>
							</li>
							<li class="col75">
								<ul class="ul row">
									<li class="col66">
										<div class="exclusive_block hfull">
											<div class="exclusive_img">
												<img src="<?php echo get_template_directory_uri();?>/images/exclusive_product2.jpg" alt="">
											</div>
											<a href="#" class="exclusive_link bl">Forniture</a>
										</div>
									</li>
									<li class="col33">
										<div class="exclusive_block hfull">
											<div class="exclusive_img">
												<img src="<?php echo get_template_directory_uri();?>/images/exclusive_product3.jpg" alt="">
											</div>
											<a href="#" class="exclusive_link tl">Men’s Clothing</a>
										</div>
									</li>
									<li class="col33">
										<div class="exclusive_block hhalf">
											<div class="exclusive_img">
												<img src="<?php echo get_template_directory_uri();?>/images/exclusive_product5.jpg" alt="">
											</div>
											<a href="#" class="exclusive_link tl">Beauty & Accessories</a>
										</div>
									</li>
									<li class="col66">
										<div class="exclusive_block hhalf">
											<div class="exclusive_img">
												<img src="<?php echo get_template_directory_uri();?>/images/exclusive_product6.jpg" alt="">
											</div>
											<a href="#" class="exclusive_link br">Handbags & Accessories</a>
										</div>
									</li>
								</ul>
							</li>
							<li class="col100">
								<ul class="ul row">
									<li class="col50">
										<div class="exclusive_block hhalf">
											<div class="exclusive_img">
												<img src="<?php echo get_template_directory_uri();?>/images/exclusive_product7.jpg" alt="">
											</div>
											<a href="#" class="exclusive_link w tr">Toys</a>
										</div>
									</li>
									<li class="col25">
										<div class="exclusive_block hhalf">
											<div class="exclusive_img">
												<img src="<?php echo get_template_directory_uri();?>/images/exclusive_product8.jpg" alt="">
											</div>
											<a href="#" class="exclusive_link br">Fragrances</a>
										</div>
									</li>
									<li class="col25">
										<div class="exclusive_block hhalf">
											<div class="exclusive_img">
												<img src="<?php echo get_template_directory_uri();?>/images/exclusive_product9.jpg" alt="">
											</div>
											<a href="#" class="exclusive_link tr">Watches</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="section mob_pb0">
		<div class="container">
            <h2 class="heading center"><?php echo $exclusivestoretitle;?></h2>
        <?php
        if( !empty($exclusivestoredescription) ){
        ?>
            <div class="heading_tag"><?php echo nl2br($exclusivestoredescription);?></div>
        <?php
        }
        ?>
			<?php
			if( !empty($exclusive_store) ){
			?>
			<div class="sliderblockWrap rev">
			<?php
				foreach( $exclusive_store as $es ){
					$culture_page_grey_icon	= get_field( 'culture_page_grey_icon', $es['exclusive_store_type']->ID );					
			?>
				<div class="sliderblock popular_store_block f24 rm">
					<div class="sliderImg2 popular_store_img">
						<img src="<?php echo $es['exclusive_store_image']['url'];?>" alt="" />
					</div>
					<div class="sliderText2 popular_store_text ptb50">
						<div class="table_box">
							<div class="table_cell">
								<div class="store_icon">
									<img src="<?php echo $es['exlusive_store_logo']['url'];?>" alt="" />
								</div>
								<div class="store_head">
									<h2 class="heading"><?php echo $es['exlusive_store_title'];?></h2>
									<div class="store_genre">
										<img src="<?php echo $culture_page_grey_icon['url'];?>" alt="" /> <?php echo $es['exclusive_store_type']->post_title;?>
									</div>
								</div>
								<div class="store_body">
									<?php echo $es['exclusive_store_description'];?>
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
	
	<div class="section mob_pb0">
		<div class="container">
            <h2 class="heading center"><?php echo $exclusivebrandtitle;?></h2>
        <?php
        if( !empty($exclusivebranddescription) ){
        ?>
            <div class="heading_tag"><?php echo nl2br($exclusivebranddescription);?></div>
        <?php
        }
        ?>
			<div class="innerContainer">
				<div class="">
				<?php
				if( !empty($exclusive_brand) ){
				?>
					<div class="exbrand">
						<ul class="ul row">
				<?php
						foreach( $exclusive_brand as $ex ){
				?>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="<?php echo $ex['exlusive_brand_logo1']['url'];?>" alt="" class="logo_original" />
										<img src="<?php echo $ex['exclusive_brand_logo2']['url'];?>" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
				<?php
						}
				?>
							<li class="col25">
								<div class="brand_logo more_brand">
									<a href="#">...and More Exclusive Brands for Each Culture</a>
								</div>
							</li>
						</ul>
					</div>
				<?php
				}
				?>
				</div>
			</div>
			
			<?php
			/*if(!empty($quote)){
			?>
			<div class="innerContainer mt70">
				<div class="quote">
					<?php echo $quote;?>
				</div>
			</div>
			<?php
			}*/
			?>
			<hr class="mt50 mb0">
		</div>
	</div>
	
	<?php include( locate_template( 'newsletter-form-other.php' ) ); ?>
		
</div>
<!--MAIN CONTAINER END-->
<?php
get_footer();