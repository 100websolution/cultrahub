<?php 
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Cultrahub
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <!-- Meta -->
        <meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no">
        <?php
		if ( is_singular() && pings_open() ) { ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php
		}
		wp_head();		
		$home_banners 			= get_field( 'home_banners', $post->ID );
		$newsletter_heading_1 	= get_field( 'newsletter_heading_1', $post->ID );
		$newsletter_heading_2 	= get_field( 'newsletter_heading_2', $post->ID );
		?>
		<script type="text/javascript">
        document.createElement("header");
        document.createElement("nav");
        document.createElement("hgroup");
        document.createElement("section");
        document.createElement("article");
        document.createElement("aside");
        document.createElement("footer");
        document.createElement("blockquote");
        document.createElement("figure");
        document.createElement("details");
		/*$(document).ready(function(){
			$('#eemail_txt_Button').val('Launching Soon');
		});*/
    </script>
    </head>
    <body>
        <div class="bodyOverlay"></div>
        <div class="responsive_nav mCustomScrollbar">
            <div class="maintabnav">
                <ul class="clearfix">
                    <li <?php if($post->ID==2543)echo 'class="active"';?>><a href="<?php echo get_permalink(2543);?>">Popular Stores</a></li>
                    <li <?php if($post->ID==2499)echo 'class="active"';?>><a href="<?php echo get_permalink(2499);?>">Trending Now</a></li>
                    <li <?php if($post->ID==2671)echo 'class="active"';?>><a href="<?php echo get_permalink(2671);?>">Exclusive</a></li>
                    <li <?php if($post->ID==2444)echo 'class="active"';?>><a href="<?php echo get_permalink(2444);?>">Customs</a></li>
                    <li <?php if($post->ID==2770)echo 'class="active"';?>><a href="<?php echo get_permalink(2770);?>">Share a Quote</a></li>
                    <li <?php if($post->ID==3894)echo 'class="active"';?>><a href="<?php echo get_permalink(3894);?>">Cultures</a></li>
                </ul>
            </div>
            <?php wp_nav_menu( array( 'menu' => 'footer-menu', 'menu_class'=>'') ); ?>
        </div>
        
		<a class="scrollup" href="javascript:void(0);"><i class="fa fa-chevron-up"></i></a>
		<header class="homeHeader" style="background-image: url(<?php echo get_template_directory_uri();?>/images/bg_home_banner.jpg);">
			<div class="bg_cloud"><img src="<?php echo get_template_directory_uri();?>/images/cloud.png" alt="" /></div>
			<div class="htop">
				<div class="container">
					<div class="fright">
						<div class="fleft ml30">
							<?php wp_nav_menu( array( 'menu' => 'top-header-menu', 'menu_class'=>'borderbar_list') ); ?>
						</div>
						<div class="fleft ml30">
							<div class="lang dropwrap">
								<span class="dropnav"><i class="siteicon icon_globe"></i> <em class="droptext">EN</em></span>
								<ul class="droplist clearfix">
									<li class="selected">EN</li>
									<!--<li>SP</li>-->
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="section homeBanner">
				<div class="container">
					<div class="logo">
						<a href="<?php echo site_url();?>"><img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="" /></a>
					</div>
					<span class="responsive_btn"><span></span></span>
					<?php
					if( !empty($home_banners) ){					
					?>
					<div class="topbannerwrap">
                        <div class="owl-carousel" id="topbannermobile">
                        <?php
                            $k = 1;
                            foreach( $home_banners as $banner ){
                        ?>
                            <div class="item">
                                <div class=topbannerimg"">
                                    <img src="<?php echo $banner['homebanner_image_4']['url'];?>" alt="" />
                                </div>
                            </div>
                        <?php
                            $k++;
                            }
                        ?>
                        </div>
                        <div id="topbanner" class="ls-wp-container" style="width: 100%; height: 462px; margin: 0px auto; overflow: hidden;">
                        <?php
                            $k = 1;
                            foreach( $home_banners as $banner ){
                                $icon = get_field( 'icon', $banner['homebanner_culture']->ID );
                        ?>
                            <div class="ls-layer" style="slidedirection: top; slidedelay: 6000; durationin: 1500; durationout: 1500; easingin: easeInOutQuint; easingout: easeInOutQuint; delayin: ; delayout: 500; ">
                                <?php /*<div class="ls-s1" style="position:absolute; top:0; left:50%; margin-left:205px; slidedirection: top; slideoutdirection: top; durationin: 1000; durationout: 750; easingin: easeInOutQuint; easingout: easeInOutQuint; delayin: 600; delayout: 0; showuntil: 0; font-size:72px; line-height:90px; color:#231f20; font-family:'TahuRegular';"><?php echo $banner['homebanner_title'];?></div>*/?>
                                <div class="ls-s1" style="position:absolute; top:0; left:50%; margin-left:205px; slidedirection: top; slideoutdirection: top; durationin: 1000; durationout: 750; easingin: easeInOutQuint; easingout: easeInOutQuint; delayin: 600; delayout: 0; showuntil: 0; font-size:72px; line-height:90px; color:#231f20; font-family:'TahuRegular';"><img src="<?php echo get_template_directory_uri();?>/images/Launching2018.png" alt="" width="450" /></div>
                                <?php
                                if( $k % 2 != 0 ){
                                ?>
                                <div class="ls-s2" style="position:absolute; top:95px; left:0; z-index:1; slidedirection: left; slideoutdirection: left; durationin: 1500; durationout: 750; easingin: easeInOutQuint; easingout: easeInOutQuint; delayin: 800; delayout: 0; showuntil: 0;">
                                <?php
                                }else{
                                ?>
                                <div class="ls-s2" style="position:absolute; top:95px; left:500px; z-index:1; slidedirection: right; slideoutdirection: right; durationin: 1500; durationout: 750; easingin: easeInOutQuint; easingout: easeInOutQuint; delayin: 800; delayout: 0; showuntil: 0;">
                                <?php
                                }
                                ?>
                                    <img src="<?php echo $banner['homebanner_image_1']['url'];?>" alt="" width="665" />
                                </div>
                                <?php
                                if( $k % 2 != 0 ){
                                ?>
                                <div class="ls-s3" style="position:absolute; top:140px; left:540px; slidedirection: right; slideoutdirection: right;  durationin: 1500; durationout: 750; easingin: easeInOutQuint; easingout: easeInOutQuint; delayin: 1000; delayout: 0; showuntil: 0;">
                                <?php
                                }else{
                                ?>
                                <div class="ls-s3" style="position:absolute; top:140px; left:40px; slidedirection: left; slideoutdirection: left;  durationin: 1500; durationout: 750; easingin: easeInOutQuint; easingout: easeInOutQuint; delayin: 1000; delayout: 0; showuntil: 0;">
                                <?php
                                }
                                ?>
                                    <img src="<?php echo $banner['homebanner_image_2']['url'];?>" alt="" width="585" />
                                </div>
                                <?php
                                if( $k % 2 != 0 ){
                                ?>
                                <div class="ls-s4" style="position:absolute; top:235px; left:100px; slidedirection: bottom; slideoutdirection: bottom; durationin: 3000; durationout: 750; easingin: easeInOutQuint; easingout: easeInBack; delayin: 1000; delayout: 0; showuntil: 0;">
                                <?php
                                }else{
                                ?>
                                <div class="ls-s4" style="position:absolute; top:235px; left:920px; slidedirection: bottom; slideoutdirection: bottom; durationin: 3000; durationout: 750; easingin: easeInOutQuint; easingout: easeInBack; delayin: 1000; delayout: 0; showuntil: 0;">
                                <?php
                                }
                                ?>
                                    <img src="<?php echo $banner['homebanner_image_3']['url'];?>" alt="" width="155" />
                                </div>
                                <?php
                                if( $k % 2 != 0 ){
                                ?>
                                <div class="ls-s5" style="position:absolute; top:300px; left:910px; width:325px; slidedirection: right; slideoutdirection: right; durationin: 3000; durationout: 750; easingin: easeInOutQuint; easingout: easeInBack; delayin: 1000; delayout: 0; showuntil: 0;">
                                <?php
                                }else{
                                ?>
                                <div class="ls-s5" style="position:absolute; top:300px; left:-70px; width:325px; slidedirection: left; slideoutdirection: left; durationin: 3000; durationout: 750; easingin: easeInOutQuint; easingout: easeInBack; delayin: 1000; delayout: 0; showuntil: 0;">
                                <?php
                                }
                                ?>
                                    <div class="culture_text">
                                        <span class="culture_icon"><img src="<?php echo $icon['url'];?>" alt=""></span>
                                        <div class="culture_text_inner">
                                            <h3 class="culture_title"><a href="<?php echo get_permalink($banner['homebanner_culture']->ID);?>"><?php echo $banner['homebanner_culture']->post_title;?></a></h3>
                                            <div class="culture_info">Culture</div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $k++;
                            }
                        ?>
                        </div>
					</div>
					<?php
					}
					?>
					<div class="homeBannerText">
					<?php
					if( !empty($newsletter_heading_1) ){
					?>
						<div class="homeBannerHeading"><?php echo $newsletter_heading_1;?></div>
					<?php
					}
					if( !empty($newsletter_heading_1) ){
					?>
						<div class="ls2"><?php echo $newsletter_heading_2;?></div>
					<?php
					}
					?>
						<div class="homeForm">
							<form method="post" enctype="multipart/form-data" id="signup_partone_form" class="form_validation">
								<input type="email" id="signup_partone_email" name="signup_partone_email" placeholder="Enter your email to get notified..." autocomplete="off" />
								<button type="submit" id="signup_partone" class="">Launching Soon</button>
								<div class="clear"></div>
								<div id="emailmsg" class="align_left f12" style="display: none;"></div>
							</form>
						</div>
						<?php //include( locate_template( 'newsletter-form.php' ) ); ?>
					</div>
				</div>
			</div>
		</header>