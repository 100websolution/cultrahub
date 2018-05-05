<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Cultrahub
 * @since Cultrahub 1.0
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
        <div class="page404" style="background-image: url(<?php echo get_template_directory_uri();?>/images/404.jpg);">
            <div class="text404">
                <h1 class="heading404">IT'S ALL EMPTY HERE, MY FRIEND!</h1>
                <p>We’re sorry, the page you have looked for does not exist in our database! Maybe go to our Homepage.</p>
                <a href="<?php echo site_url();?>" class="btn">Go Back to Homepage</a>
            </div>
        </div>
    </body>
</html>