<?php
/*
Template Name: Social Login
*/
/*get_header('culture-social');
?>
<body>
	<div class="page404" style="background-image: url(<?php //echo get_template_directory_uri();?>/images/404.jpg);">
		<div class="text404">
			<p>Thank you for signing with us.</p>
			<a href="<?php echo site_url();?>" class="btn">Go Back to Homepage</a>
		</div>
	</div>
</body>
<?php
get_footer();*/
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
        <div class="page404 thanku" style="background-image: url(<?php echo get_template_directory_uri();?>/images/thanku.jpg);">
            <div class="text404">
				<div class="thanku_icon mb25"><img src="<?php echo get_template_directory_uri();?>/images/thanku_icon.png" alt="Thank You"></div>
				<div class="thanku_img"><img src="<?php echo get_template_directory_uri();?>/images/thanku_heading.png" alt="Thank You"></div>
				<div class="color_dots mt30 mb30">
                    <span class="green"></span>
                    <span class="yellow"></span>
                    <span class="red"></span>
                    <span class="blue"></span>
                </div>
                <h1 class="heading404">You Have Successfully Signed Up!</h1>
                <p>Your subscription has been confirmed. You've been<br> added to our list and will hear from us soon.</p>
                <a href="<?php echo site_url();?>" class="btn btnRed">Go Back to Homepage</a>
				<div class="social">
                    <?php echo add_social_links_icons();?>
                </div>
            </div>
        </div>
    </body>
</html>