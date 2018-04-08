<?php
/*
Template Name: Be a Seller
*/
get_header('culture');
$featured_image 		= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
$banner_heading 		= get_field( 'banner_heading', $post->ID );
$banner_short_heading 	= get_field( 'banner_short_heading', $post->ID );

//Section 1
$section_1_heading 		= get_field( 'beaseller_heading_1', $post->ID );
$section_1_description 	= get_field( 'beaseller_short_description_1', $post->ID );
$beaseller_description_1= get_field( 'beaseller_description_1', $post->ID );

//Section 2
$beaseller_description_2= get_field( 'beaseller_description_2', $post->ID );

//Section 3
$section_3_heading 		= get_field( 'beaseller_heading_3', $post->ID );
$beasellerheading_1 	= get_field( 'beasellerheading_1', $post->ID );
$beasellerheading_2 	= get_field( 'beasellerheading_2', $post->ID );
$section_3_description 	= get_field( 'beaseller_short_description_3', $post->ID );
$beaseller_description_3= get_field( 'beaseller_description_3', $post->ID );

//Section 4
$section_4_heading 		= get_field( 'beaseller_heading_4', $post->ID );
$section_4_description 	= get_field( 'beaseller_short_description_4', $post->ID );
$beaseller_description_4= get_field( 'beaseller_description_4', $post->ID );

?>
<!--MAIN CONTAINER START-->
<div class="mainContainer" id="mainContainer">	
	<div class="section">
		<div class="container">
			<hr class="mb35 mt0">
			<div class="seller_banner">
				<div class="border_line top">
					<span class="b_green"></span>
					<span class="b_blue"></span>
					<span class="b_red"></span>
					<span class="b_yellow"></span>
				</div>
				<img src="<?php echo $featured_image[0];?>" width="<?php echo $featured_image[1];?>" />
				<div class="seller_banner_text">
					<h2 class="heading2"><?php echo $banner_heading;?></h2>
					<p><?php echo $banner_short_heading;?></p>
				</div>
				<div class="border_line">
					<span class="b_green"></span>
					<span class="b_blue"></span>
					<span class="b_red"></span>
					<span class="b_yellow"></span>
				</div>
			</div>
			
			<?php
			if( !empty($section_1_heading) ){
			?>
			<hr class="mt35 mb35">
			<div class="">
				<div class="heading_block">
					<div class="heading2 center small"><img src="<?php echo get_template_directory_uri();?>/images/learn_sell_shop.png" alt=""></div>
					<div class="color_dots">
						<span class="yellow"></span>
						<span class="red"></span>
						<span class="blue"></span>
						<span class="green"></span>
					</div>
				</div>
				<div class="">
                    <div class="innerContainer">
                        <h2 class="heading center"><?php echo $section_1_heading;?></h2>
                        <div class="heading_tag"><?php echo $section_1_description;?></div>
                    </div>
				<?php
				if( !empty($beaseller_description_1) ){
				?>
					<div class="seller_howitwork">
						<ul class="row ul">
				<?php
					foreach( $beaseller_description_1 as $key_1 => $val_1 ){
				?>
							<li class="col25">
								<div class="seller_block">
								<?php if( !empty($val_1['image_section_1']) ){ ?>
									<span class="steps"><img src="<?php echo $val_1['image_section_1']['url'];?>" width="<?php echo $val_1['image_section_1']['width'];?>" alt="" /><em><?php echo $val_1['step_title_1'];?></em></span>
								<?php } ?>
									<div class="seller_icon"><img src="<?php echo $val_1['icon_section_1']['url'];?>" width="<?php echo $val_1['icon_section_1']['width'];?>" alt="" /></div>
									<div class="seller_text">
										<h3 class="subheading2"><?php echo $val_1['title_section_1'];?></h3>
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
			<?php
			}
			?>
			</div>
		</div>
	</div>
	
	<?php
	if( !empty($beaseller_description_2) ){
	?>
	<div class="section">
		<div class="container">
			<div class="innerContainer">
				<div class="sliderblockWrap rev">
				<?php
				foreach($beaseller_description_2 as $key_2 => $val2){
				?>
					<div class="sliderblock">
						<div class="sliderImg2 sliderImgText">
							<img src="<?php echo $val2['beaseller_image_2']['sizes']['medium_large'];?>" width="<?php echo $val2['beaseller_image_2']['sizes']['medium_large-width'];?>" alt="" />
						</div>
						<div class="sliderText2">
							<h2 class="heading"><?php echo $val2['beaseller_heading_2'];?></h2>
							<div class="">
								<?php echo $val2['beaseller_description_2'];?>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				<?php
				}
				?>
				</div>
			</div>
		</div>
	</div>
	<?php
	}
	?>
	
	<?php
	if(!empty($section_3_heading)){
	?>
	<div class="section">
		<div class="container">
			<hr class="mb35 mt0">
			<div class="innerContainer">
				<div class="seller_fees">
					<div class="seller_fees_head">
						<h2 class="heading2"><?php echo $section_3_heading;?></h2>
						<?php
						if( !empty($beasellerheading_1) ){
						?>						
						<div><strong><?php echo $beasellerheading_1;?></strong></div>
						<?php
						}
						if( !empty($beasellerheading_2) ){
						?>
						<div><p><?php echo $beasellerheading_2;?></p></div>
						<?php
						}
						?>
					</div>
					<div class="seller_fees_text">
						<h2 class="heading nobrdr"><?php echo $section_3_description;?></h2>
					<?php
					if(!empty($beaseller_description_3)){
					?>
						<ul class="bullet">
					<?php
						foreach($beaseller_description_3 as $key_3 => $val_3){
					?>
							<li><?php echo $val_3['title_3'];?></li>
					<?php
						}
					?>
						</ul>
					<?php
					}
					?>
					</div>
					<div class="clear"></div>
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
				<?php echo (!empty($section_4_heading))? '<h2 class="heading center">'.$section_4_heading.'</h2>':'';?>
				<?php echo (!empty($section_4_description))? '<div class="heading_tag">'.$section_4_description.'</div>':'';?>
				<div class="seller_tool_wrap">
				<?php
				if(!empty($beaseller_description_4)){
				?>
					<ul class="row ul">
				<?php
					foreach($beaseller_description_4 as $key_4 => $val_4){
				?>
						<li class="col25">
							<div class="seller_block">
								<div class="seller_icon"><img src="<?php echo $val_4['icon_4']['url'];?>" alt="" /></div>
								<div class="seller_text">
									<h3 class="subheading2"><?php echo $val_4['title_4'];?></h3>
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
			</div>
			<hr class="mb0 mt70">
		</div>
	</div>
	
	<?php include( locate_template( 'newsletter-form.php' ) ); ?>
		
</div>
<!--MAIN CONTAINER END -->
<?php
get_footer();