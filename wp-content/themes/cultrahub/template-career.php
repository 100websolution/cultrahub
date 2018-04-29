<?php
/*
Template Name: Career
*/
get_header('culture');

$career_banner_image	= get_field('career_banner_image',$post->ID);
$career_page_heading		= get_field('career_page_heading',$post->ID);
$career_icon				= get_field('career_icon',$post->ID);
$career_page_decription		= get_field('career_page_decription',$post->ID);
//Career posts
$career_page_posts			= get_field('career_page_posts',$post->ID);
//Section 3
$career_page_heading3		= get_field('career_page_heading3',$post->ID);
$career_page_description3	= get_field('career_page_description3',$post->ID);
$career_page_section3_posts	= get_field('career_section3_posts',$post->ID);

//Quote
$quote						= get_field('quote',$post->ID);
?>
<!--MAIN CONTAINER START-->
<div class="mainContainer" id="mainContainer">	
	<div class="section">
		<div class="container">
			<hr class="mb35 mt0">
			<div class="seller_banner help_banner">
				<img src="<?php echo $career_banner_image['url'];?>" alt="" />
			</div>
			<hr class="mt35 mb35">
			<div class="innerContainer">
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
                    
                    <div class="f18 mb50">
                        <h2 class="heading nobrdr"><img src="<?php echo $career_icon['url'];?>" alt="" class="heading_icon_left"><?php echo $career_page_heading;?></h2>
                        <?php echo $career_page_decription;?>
                    </div>
				<?php
				if(!empty($career_page_posts)){
				?>
                    <div>
                        <ul class="ul border_list jobList">
				<?php
						foreach($career_page_posts as $post){
				?>
                            <li>
                                <div class="jobBlock">
                                    <div class="jobLeft">
                                        <h2 class="heading red"><?php echo $post['career_post_title'];?></h2>
                                        <div>Job Number: <?php if($post['career_post_job_number'] != '')echo $post['career_post_job_number'];else echo 'N/A';?></div>
                                        <div>Location: <?php echo $post['career_post_location'];?></div>
										<?php
										if(!empty($post['career_post_apply_now_with'])){
										?>
                                        <div class="align_right">
                                            <div class="f10">APPLY NOW WITH...</div>
                                            <a href="#"><img src="<?php echo $post['career_post_apply_now_with']['url'];?>" alt=""></a>
                                        </div>
										<?php
										}
										?>
                                    </div>
                                    <div class="jobRight">
                                        <h2 class="heading nobrdr"><?php echo $post['career_post_heading'];?></h2>
                                        <?php echo $post['career_post_description'];?>
                                    </div>
                                    <div class="clear"></div>
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
			</div>
		</div>
	</div>
	
	<div class="section">
		<div class="container">
			<hr class="mt0 mb70">		
			<div class="innerContainer">
                <div class="f18">
                    <h2 class="heading nobrdr"><img src="<?php echo get_template_directory_uri();?>/images/icon_opening.png" alt="" class="heading_icon_left"><?php echo $career_page_heading3;?></h2>
					<?php echo $career_page_description3;?>
                </div>
				<?php
				if(!empty($career_page_section3_posts)){
				?>
                <div class="mt30">
                    <ul class="row ul jobList">
				<?php
					foreach($career_page_section3_posts as $po){
				?>
                        <li class="col25">
                            <div class="jobBox">
                                <h2 class="heading nobrdr <?php echo $po['career_section3_color'];?>"><?php echo $po['career_section3_heading'];?></h2>
                                <div>Job Number: <?php if(!empty($po['career_section3_job_number']))echo $po['career_section3_job_number'];else echo 'N/A';?></div>
                                <div>Location: <?php echo $po['career_section3_location'];?></div>
                                <div class="align_right">
                                    <a href="#" class="applyLink">View & Apply</a>
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
			if(!empty($quote)){
			?>
			<div class="innerContainer mt70">
				<div class="quote"><?php echo $quote;?></div>
			</div>
			<?php
			}
			?>
			<hr class="mt50 mb0">
		</div>
	</div>
	
	<?php include( locate_template( 'newsletter-form.php' ) ); ?>
		
</div>
<!--MAIN CONTAINER END-->
<?php
get_footer('other');