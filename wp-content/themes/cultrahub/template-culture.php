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
    
	<div class="section pb0">
		<div class="container">
			<hr class="mb35 mt0">
			<div class="full_banner">
				<div class="owl-carousel padding_banner">
					<div class="item">
						<div class="banner_block">
                            <a><img src="<?php echo get_template_directory_uri();?>/images/culture_banner1.jpg" alt="" width="" /></a>
						</div>
					</div>
					<div class="item">
						<div class="banner_block">
                            <a><img src="<?php echo get_template_directory_uri();?>/images/culture_banner2.jpg" alt="" width="" /></a>
						</div>
					</div>
					<div class="item">
						<div class="banner_block">
                            <a><img src="<?php echo get_template_directory_uri();?>/images/culture_banner3.jpg" alt="" width="" /></a>
						</div>
					</div>
				</div>
			</div>
			<hr class="mt35 mb0">
		</div>
	</div>
	
	<div class="section mob_pb0">
		<div class="container">
			<div class="innerContainer">
				<div class="">
                    <div class="heading_icon"><img src="<?php echo get_template_directory_uri();?>/images/icon_culture.png" alt="" width="" height="" /></div>
                    <h2 class="heading center">Explore Different Cultures</h2>
                    <div class="heading_tag">
                        <p>Explore diversity by checking out our huge range of cultures and sub-cultures. Learn about different customs and people, shop for traditional and unique products, and engage with communities and thought leaders on matters effecting the world.</p>
                    </div>
				</div>
				
				<div class="smallContainer">
                    <div class="culture_list">
                        <ul class="clearfix">
                            <?php
                            query_posts('post_type=culture&order=asc&orderby=id');
                            if (have_posts()) : while (have_posts()) : the_post();
                            $culture_icon = get_field( 'icon', $post->ID );					
                            ?>
                            <li>
                                <div class="allCultureBox">
                                    <a href="<?php the_permalink();?>">
                                        <div class="culture_box">
                                            <img src="<?php echo $culture_icon['sizes']['cultrahub-home-icon'];?>" alt="<?php the_title();?>">
                                        </div>
                                        <div class="allCultureText"><?php the_title();?></div>
                                    </a>
                                </div>
                            </li>
                            <?php
                            endwhile; endif;
                            wp_reset_query();
                            ?>
                        </ul>
                    </div>
				</div>
			</div>
            <hr class="mt60 mb0">
		</div>
	</div>
  
    <div class="section">
        <div class="container">
            <div class="innerContainer">
                <div class="sliderblockWrap rev odd">
                    <div class="sliderblock contact_form_block">
                        <div class="sliderText2">
                            <h2 class="heading nobrdr">WE HAVE MORE CULTURES TO COME!</h2>
                            <div class="color_dots mb25">
                                <span class="yellow"></span>
                                <span class="red"></span>
                                <span class="blue"></span>
                                <span class="green"></span>
                            </div>
                            <div class="cultrahub_helpandcontract f36">Don’t See Yours, Then Tell Us Who We Are Missing!</div>
                        </div>
                        <div class="sliderImg2">
                            <div class="contact_form1">
                                <form method="post" enctype="multipart/form-data" id="getintouch_form" class="form_validation">
                                    <ul class="ul row">
                                        <li class="col50">
                                            <label>Your Name</label>
                                            <input type="text" class="required" name="fname" id="fname" placeholder="Write your name...">
                                        </li>
                                        <li class="col50">
                                            <label>Your Email Address</label>
                                            <input type="text" class="required" name="email_id" id="email_id" placeholder="Write your email address...">
                                        </li>
                                        <li class="col100">
                                            <label>Your Feedback</label>
                                            <textarea class="required" name="ymessage" id="ymessage" onkeyup="check_message_length(this.form);" autocomplete="off" placeholder="Please, leave us your message..."></textarea>
                                            <div class="align_right">
                                                <small><span id="message_count">0</span>/500 Characters</small>
                                            </div>
                                        </li>
                                        <li class="col100 align_center">
                                            <input type="submit" name="submit" value="SUBMIT" id="get_in_touch" class="btnRed w80">
                                            <div>
                                                <small>You can also email us at <a href="#">info@cultrahub.com</a>.</small>
                                            </div>
                                            <div class="align_center" id="getintouch_msg"></div>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section policy_section nopolicy">
        <div class="newsletter_img"><img src="<?php echo get_template_directory_uri();?>/images/bg_newsletter.png" alt=""></div>
    </div>
   
    <?php //include( locate_template( 'newsletter-form-other.php' ) ); ?>
</div>
<!--MAIN CONTAINER END-->
<?php
get_footer();