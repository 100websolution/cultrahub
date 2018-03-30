<?php
/*
Template Name: Exclusive
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
					
					<div class="exclusive_product">
						<ul class="ul row height_div">
							<li class="col25">
								<ul class="ul row">
									<li class="col100">
										<div class="exclusive_block hhalf">
											<div class="exclusive_img">
												<img src="images/exclusive_product1.jpg" alt="">
											</div>
											<a href="#" class="exclusive_link w tr">Men's Shoes</a>
										</div>
									</li>
									<li class="col100">
										<div class="exclusive_block hfull">
											<div class="exclusive_img">
												<img src="images/exclusive_product4.jpg" alt="">
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
												<img src="images/exclusive_product2.jpg" alt="">
											</div>
											<a href="#" class="exclusive_link bl">Forniture</a>
										</div>
									</li>
									<li class="col33">
										<div class="exclusive_block hfull">
											<div class="exclusive_img">
												<img src="images/exclusive_product3.jpg" alt="">
											</div>
											<a href="#" class="exclusive_link tl">Men’s Clothing</a>
										</div>
									</li>
									<li class="col33">
										<div class="exclusive_block hhalf">
											<div class="exclusive_img">
												<img src="images/exclusive_product5.jpg" alt="">
											</div>
											<a href="#" class="exclusive_link tl">Beauty & Accessories</a>
										</div>
									</li>
									<li class="col66">
										<div class="exclusive_block hhalf">
											<div class="exclusive_img">
												<img src="images/exclusive_product6.jpg" alt="">
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
												<img src="images/exclusive_product7.jpg" alt="">
											</div>
											<a href="#" class="exclusive_link w tr">Toys</a>
										</div>
									</li>
									<li class="col25">
										<div class="exclusive_block hhalf">
											<div class="exclusive_img">
												<img src="images/exclusive_product8.jpg" alt="">
											</div>
											<a href="#" class="exclusive_link br">Fragrances</a>
										</div>
									</li>
									<li class="col25">
										<div class="exclusive_block hhalf">
											<div class="exclusive_img">
												<img src="images/exclusive_product9.jpg" alt="">
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
	
	<div class="section">
		<div class="container">
			<div class="innerContainer">
				<div class="">
					<h2 class="heading center">Exclusive Stores</h2>
					<div class="heading_tag">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.</div>
				</div>
			</div>
			
			<div class="sliderblockWrap rev">
				<div class="sliderblock popular_store_block height_div">
					<div class="sliderImg2 popular_store_img hfull">
						<img src="images/exclusive_store1.png" alt="" />
					</div>
					<div class="sliderText2 popular_store_text hfull">
						<div class="table_box">
							<div class="table_cell">
								<div class="store_icon">
									<a href="#"><img src="images/store_logo6.jpg" alt=""></a>
								</div>
								<div class="store_head">
									<h2 class="heading"><a href="#">Gucci</a></h2>
									<div class="store_genre">
										<a href="#"><img src="images/genre_icon4_gray.png" alt="" /> Fashion & Style</a>
									</div>
								</div>
								<div class="store_body">
									<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="sliderblock popular_store_block height_div">
					<div class="sliderImg2 popular_store_img hfull">
						<img src="images/exclusive_store2.png" alt="" />
					</div>
					<div class="sliderText2 popular_store_text hfull">
						<div class="table_box">
							<div class="table_cell">
								<div class="store_icon">
									<a href="#"><img src="images/store_logo7.jpg" alt=""></a>
								</div>
								<div class="store_head">
									<h2 class="heading"><a href="#">Ralph Lauren</a></h2>
									<div class="store_genre">
										<a href="#"><img src="images/genre_icon4_gray.png" alt="" /> Fashion & Style</a>
									</div>
								</div>
								<div class="store_body">
									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
								</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="sliderblock popular_store_block height_div">
					<div class="sliderImg2 popular_store_img hfull">
						<img src="images/exclusive_store3.png" alt="" />
					</div>
					<div class="sliderText2 popular_store_text hfull">
						<div class="table_box">
							<div class="table_cell">
								<div class="store_icon">
									<a href="#"><img src="images/store_logo8.jpg" alt=""></a>
								</div>
								<div class="store_head">
									<h2 class="heading"><a href="#">Romero Britto</a></h2>
									<div class="store_genre">
										<a href="#"><img src="images/genre_icon12_gray.png" alt="" /> Cultra Arts</a>
									</div>
								</div>
								<div class="store_body">
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="section">
		<div class="container">
			<div class="innerContainer">
				<div class="">
					<h2 class="heading center">Exclusive Brands</h2>
					<div class="heading_tag">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>
			
					<div class="">
						<ul class="ul row">
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand1.jpg" alt="" class="logo_original" />
										<img src="images/brand1a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand2.jpg" alt="" class="logo_original" />
										<img src="images/brand2a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand11.jpg" alt="" class="logo_original" />
										<img src="images/brand11a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand16.jpg" alt="" class="logo_original" />
										<img src="images/brand16a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand6.jpg" alt="" class="logo_original" />
										<img src="images/brand6a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand22.jpg" alt="" class="logo_original" />
										<img src="images/brand22a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand12.jpg" alt="" class="logo_original" />
										<img src="images/brand12a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand17.jpg" alt="" class="logo_original" />
										<img src="images/brand17a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand3.jpg" alt="" class="logo_original" />
										<img src="images/brand3a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand8.jpg" alt="" class="logo_original" />
										<img src="images/brand8a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand13.jpg" alt="" class="logo_original" />
										<img src="images/brand13a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand18.jpg" alt="" class="logo_original" />
										<img src="images/brand18a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand20.jpg" alt="" class="logo_original" />
										<img src="images/brand20a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand9.jpg" alt="" class="logo_original" />
										<img src="images/brand9a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand14.jpg" alt="" class="logo_original" />
										<img src="images/brand14a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand19.jpg" alt="" class="logo_original" />
										<img src="images/brand19a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand5.jpg" alt="" class="logo_original" />
										<img src="images/brand5a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand10.jpg" alt="" class="logo_original" />
										<img src="images/brand10a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo">
									<a href="#">
										<img src="images/brand15.jpg" alt="" class="logo_original" />
										<img src="images/brand15a.jpg" alt="" class="logo_hover" />
									</a>
								</div>
							</li>
							<li class="col25">
								<div class="brand_logo more_brand">
									<a href="#">...and More Exclusive Brands for Each Culture</a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			
			<?php
			if(!empty($quote)){
			?>
			<hr class="mt70 mb50">
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