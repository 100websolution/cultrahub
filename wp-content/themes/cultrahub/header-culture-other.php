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
            <?php }
			wp_head(); 
		?>
    </head>
    <body>
		<a class="scrollup" href="javascript:void(0);"><i class="fa fa-chevron-up"></i></a>
		<header class="innerHeader">
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
						   
			<div class="hbtm">
				<div class="container">
					<div class="logo">
						<a href="<?php echo site_url();?>">
							<img src="<?php echo get_template_directory_uri();?>/images/logo_inner.png" alt="<?php echo get_bloginfo( 'name' );?>" />
						</a>
						<div class="color_dots">
							<span class="green"></span>
							<span class="yellow"></span>
							<span class="red"></span>
							<span class="blue"></span>
						</div>
					</div>
					<div class="hright">
						<?php //echo '<div class="social align_right">'.add_social_links_icons().'</div>';?>
						<div class="signup_form_wrap">
							<h2 class="subheading"><a href="javascript:void(0);" data-toggle="modal" data-target="#signUpForm">Sign Up Now, It’s Free!</a></h2>
						</div>
						<div class="topmenu">
							<ul class="clearfix">
						        <li>
						            <a href="<?php echo get_permalink(2543);?>"><img src="<?php echo get_template_directory_uri();?>/images/icon_popular_store.png" alt="Popular Stores"/> Popular Stores</a>
						        </li>
						        <li>
						            <a href="<?php echo get_permalink(2499);?>"><img src="<?php echo get_template_directory_uri();?>/images/icon_trending_now.png" alt="Trending Now"/> Trending Now</a>
						        </li>
						        <li>
						            <a href="<?php echo get_permalink(2671);?>"><img src="<?php echo get_template_directory_uri();?>/images/icon_exclusive.png" alt="Exclusive"/> Exclusive</a>
						        </li>
						        <li>
						            <a href="<?php echo get_permalink(2444);?>"><img src="<?php echo get_template_directory_uri();?>/images/icon_custom.png" alt="Customs"/> Customs</a>
						        </li>
						        <li>
						            <a href="<?php echo get_permalink(2770);?>"><img src="<?php echo get_template_directory_uri();?>/images/icon_share_quote.png" alt="Share a Quote"/> Share a Quote</a>
						        </li>
						    </ul>
						</div>
					</div>
				</div>
			</div>
		</header>