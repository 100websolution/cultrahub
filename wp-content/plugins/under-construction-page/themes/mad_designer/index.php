<?php
/*
 * UnderConstructionPage
 * Mad Designer theme
 * (c) WebFactory Ltd, 2015 - 2018
 */


// this is an include only WP file
if (!defined('ABSPATH')) {
  die;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <!-- Meta -->
        <meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no">
        <meta name="description" content="[description]" />
        <meta name="generator" content="[generator]">
        <title>[title]</title>
        <?php
			if ( is_singular() && pings_open() ) { ?>
            <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
            <?php }
			wp_head(); 
		?>
    </head>
    <body>
        <div class="page404 under_construction" style="background-image: url(<?php echo get_template_directory_uri();?>/images/under_construction.jpg);">
            <div class="text404">
                <h1 class="heading404">[heading1]</h1>
                <div class="skillBarWrap">
                    <div class="skillBar" skill-percentage="31%" skill-color="#0090a2"><span class="skillBarW">31%</span></div>
                </div>
                <!--<div class="progress progress-striped">
                    <div class="progress-bar" role="progressbar" data-transitiongoal="20"></div>
                </div>-->
                <div class="color_dots mt30 mb30">
                    <span class="green"></span>
                    <span class="yellow"></span>
                    <span class="red"></span>
                    <span class="blue"></span>
                </div>
                <p>[content]</p>
                <div class="social align_right">
                    [social-icons]
                </div>
            </div>
        </div>
    </body>
</html>


<!--<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="[description]" />
    <meta name="generator" content="[generator]">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,900">
    [head]
  </head>

  <body>
    <div id="hero-image">
      <img src="[theme-url]mad-designer.png" alt="Mad Designer at work" title="Mad Designer at work">
    </div>
    <div class="container">

      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <h1>[heading1]</h1>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-offset-2 col-lg-8">
          <p class="content">[content]</p>
        </div>
      </div>

      <div class="row" id="social">
        <div class="col-xs-12 col-md-12 col-lg-12">
          [social-icons]
        </div>
      </div>

    </div>
    [footer]
  </body>
</html>-->