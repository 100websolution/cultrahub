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
		<header>
			<div class="htop">
				<div class="container">
					<div class="fright">
						<div class="fleft ml30">
							<ul class="borderbar_list">
								<li><a href="#">About Us</a></li>
								<li><a href="#">Help &amp; Contact</a></li>
							</ul>
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
							<img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="<?php echo get_bloginfo( 'name' );?>" />
						</a>
					</div>
					<div class="hright">
						<div class="social align_right">
							<?php echo add_social_links_icons();?>
						</div>
						<div class="signup_form_wrap">
							<h2 class="subheading"><a href="<?php echo site_url();?>"><span>Sign Up</span> For Your Next Adventure</a></h2>
						</div>
					</div>
				</div>
			</div>
		</header>