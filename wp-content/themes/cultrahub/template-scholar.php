<?php
/*
Template Name: Scholar
*/
get_header('culture');
$banner_image				= get_field( 'sc_page_banner_image', $post->ID );
//Section 1
$sc_page_heading 			= get_field( 'sc_page_heading', $post->ID );
$sc_page_short_description 	= get_field( 'sc_page_short_description', $post->ID );
//Post 1
$sc_page_posts1				= get_field( 'sc_page_posts1', $post->ID );
//Post 2
$sc_page_posts2				= get_field( 'sc_page_posts2', $post->ID );

$quote						= get_field( 'quote', $post->ID );
?>
<!--MAIN CONTAINER START-->
<div class="mainContainer" id="mainContainer">	
	<div class="section">
		<div class="container">
			<hr class="mb35 mt0">
			<div class="seller_banner help_banner">
			    <div class="border_line top">
					<span class="b_green"></span>
					<span class="b_blue"></span>
					<span class="b_red"></span>
					<span class="b_yellow"></span>
				</div>
				<img src="<?php echo $banner_image['url'];?>" alt="" />
				<div class="border_line">
					<span class="b_green"></span>
					<span class="b_blue"></span>
					<span class="b_red"></span>
					<span class="b_yellow"></span>
				</div>
			</div>
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
                <div>
                    <h2 class="heading center"><?php echo $sc_page_heading;?></h2>
                    <div class="heading_tag"><?php echo $sc_page_short_description;?></div>
					<?php
					if( !empty($sc_page_posts1) ){
					?>
                    <div class="innerContainer2">
                        <div class="schlar_icon_wrap">
                            <ul class="ul row">
							<?php
							foreach($sc_page_posts1 as $post1){
							?>
                                <li class="col50">
                                    <div class="schlar_block">
                                        <div class="schlar_icon"><img src="<?php echo $post1['sc_page_post_image1']['url'];?>" alt=""></div>
                                        <div class="schlar_text">
                                            <h3 class="subheading2"><?php echo $post1['sc_page_post_title1'];?></h3>
                                            <p><?php echo $post1['sc_page_post_description1'];?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php
							}
							?>
                            </ul>
                        </div>
                    </div>
					<?php
					}
					?>
                </div>
			</div>
			<hr class="mt70 mb70">
			<?php
			if( !empty($sc_page_posts2) ){
			?>
			<div class="innerContainer2">
                <div class="shopSection odd">
				<?php
				foreach($sc_page_posts2 as $post3){
				?>
                    <div class="shopBlock">
                        <div class="shopImg"><img src="<?php echo $post3['sc_page_post_image2']['url'];?>" alt=""></div>
                        <div class="shopText">
                            <h2 class="heading nobrdr"><?php echo $post3['sc_page_post_title2'];?></h2>
                            <p><?php echo $post3['sc_page_post_description2'];?></p>
                        </div>
                        <div class="clear"></div>
                    </div>
				<?php
				}
				?>                
                </div>
				<?php
				if( !empty($quote) ){
				?>
			    <div class="mt80">
                    <div class="quote noicon"><?php echo $quote;?></div>
                </div>
				<?php
				}
				?>
			</div>			
			<hr class="mt70 mb0">
			<?php
			}
			?>
		</div>
	</div>
	
	<?php include( locate_template( 'newsletter-form.php' ) ); ?>
		
</div>
<!--MAIN CONTAINER END-->
<?php
get_footer('other');