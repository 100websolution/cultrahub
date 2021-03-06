<?php
/*
Template Name: Customs
*/
get_header('culture');

//Banner Slider
$banner_sliders	= get_field( 'banner_sliders', $post->ID );
//Heading and details
$heading_details			= get_field( 'heading_details', $post->ID );
$menucategory_field_id 		= $heading_details->ID;
$menucategory_icon			= get_field( 'icon', $menucategory_field_id );
$menucategory_name			= get_field( 'name', $menucategory_field_id );
$custompageshortdescription	= get_field( 'custompageshortdescription', $post->ID );
$cpt_content				= get_post( $menucategory_field_id );
$get_posts					= get_field( 'page_posts', $post->ID );
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
	<div class="section mob_pb0">
		<div class="container">
            <div class="heading_icon"><img src="<?php echo $menucategory_icon['sizes']['menucategory-page-slider-image'];?>" alt="" width="<?php echo $menucategory_icon['sizes']['menucategory-page-slider-image-width'];?>" height="<?php echo $menucategory_icon['sizes']['menucategory-page-slider-image-height'];?>" /></div>
            <h2 class="heading center"><?php echo the_title();?></h2>
            <?php
            if($custompageshortdescription != ''){
            ?>
                <div class="heading_tag">
                    <p><?php echo nl2br($custompageshortdescription);?></p>
                    <?php //echo apply_filters('the_content',$cpt_content->post_content);?>
                </div>
            <?php
            }
            ?>
			
			<?php
			if( !empty($get_posts) ){
			?>
			<div class="innerContainer">
                <div class="sliderblockWrap rev fullContainerText">
                <?php
                    foreach($get_posts as $val_post){
                ?>
                    <div class="sliderblock height_div f24 rm">
                        <div class="sliderImg2 threeImg hfull">
                            <div class="img1"><img src="<?php echo $val_post['customs_image_1']['url'];?>" alt="" /></div>
                            <div class="img2"><img src="<?php echo $val_post['customs_image_2']['url'];?>" alt="" /></div>
                        </div>
                        <div class="sliderText2 hfull">
                            <div class="table_box">
                                <div class="table_cell">
                                    <h2 class="heading2 medium"><?php echo $val_post['custom_post_title'];?></h2>
                                    <h3 class="heading nobrdr rm"><?php echo $val_post['custom_sub_heading'];?></h3>
                                    <div class="">
                                        <?php echo $val_post['custom_post_description'];?>
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
			<hr class="mt50 mb0">
			<?php
			}
			?>
		</div>
	</div>
	
	<?php include( locate_template( 'newsletter-form-other.php' ) ); ?>
		
</div>
<!--MAIN CONTAINER END-->
<?php
get_footer();