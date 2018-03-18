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
								<!-- <ul class="droplist clearfix">
									<li class="selected">EN</li>
									<li>SP</li>
								</ul>-->
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="section homeBanner">
				<div class="container">
					<div class="row">
						<div class="col65">
							<div class="">
								<div class="logo">
									<a href="<?php echo site_url();?>"><img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="" /></a>
								</div>
								<div class="align_right bantext">
									<h2 class="heading right"><em>OUR WEBISTE IS</em> COMING SOON</h2>
									<div class="heading2">2018</div>
									<div class="color_dots">
										<span class="yellow"></span>
										<span class="red"></span>
										<span class="blue"></span>
										<span class="green"></span>
									</div>
									<div class="homeBanImg"><img src="<?php echo get_template_directory_uri();?>/images/banner.png" alt="" /></div>
								</div>
							</div>
						</div>

						<div class="col35 float_right mt30 border_left">
							<div class="signup_form_wrap">
								<h2 class="subheading"><span>Sign Up</span> For Your Next Adventure</h2>								
									<div class="align_center mt10">
										<h4 class="subheading2 small">YOU CAN REGISTER USING YOUR ACCOUNTS FROM</h4>
										<ul class="ul row social_login">
											<li class="col33">
												<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/signup_fb.png" alt="Sign Up with Facebook"></a>
											</li>
											<li class="col33">
												<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/signup_tw.png" alt="Sign Up with Twitter"></a>
											</li>
											<li class="col33">
												<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/signup_ins.png" alt="Sign Up with Instagram"></a>
											</li>
										</ul>
										<div class="or"><span>OR</span></div>
									</div>
								<form method="post" enctype="multipart/form-data" id="signup_form" class="form_validation">
									<div class="border_btm">
										<ul class="ul row">
											<li class="col50">
												<input type="text" class="required" placeholder="What’s your full name?" id="full_name" name="full_name">
											</li>
											<li class="col50">
												<div class="input_checkbox">
													<label>
														<input type="checkbox" id="producer" name="producer" value="Yes"><em></em>
														<span>Are you a producer?</span>
													</label>
												</div>
											</li>
											<li class="col50">
												<input type="text" id="business" name="business" placeholder="What’s your business?">
											</li>
											<li class="col50">
												<input type="text" id="email_address" name="email_address" placeholder="What’s your email address?">
											</li>
										</ul>
									</div>

									<div class="border_btm">
										<h4 class="subheading2 small">Pick the Cultures that represent you better</h4>
										<ul class="ul row pick_badge">										
											<?php
											query_posts('post_type=culture&order=asc&orderby=id');
											if (have_posts()) : while (have_posts()) : the_post();
												$culture_icon = get_field( 'icon', $post->ID );
											?>
												<li id="<?php echo $post->ID;?>" class="col11">
													<label class="label_badge">
														<input id="check_<?php echo $post->ID;?>" type="checkbox">
														<span><img src="<?php echo $culture_icon['sizes']['cultrahub-home-icon'];?>" alt="<?php the_title();?>" /></span>
													</label>
												</li>
											<?php
											endwhile; endif;
											wp_reset_query();
											?>
										</ul>
										<span id="culturemsg"></span>
									</div>
									
									<input type="hidden" value="" name="culture_selected" id="culture_selected" />

									<div class="align_center">
										<ul class="ul row">
											<li class="col50">
												<div class="showPass">
													<input type="password" name="password" id="password" class="required" placeholder="Enter your Password">
													<span class="showPassIcon"></span>
												</div>
											</li>
											<li class="col50">
												<div class="showPass">
													<input type="password" name="confirm_password" id="confirm_password" class="required" placeholder="Confirm Password">
													<span class="showPassIcon"></span>
												</div>
											</li>
											<li class="col100">
												<div class="input_checkbox">
													<label class="f10">
														<input type="checkbox" id="notification" name="notification" value="Yes" checked="checked"><em></em>
														<span>would like to receive occasionally, an email newsletter with trends, news and more.</span>
													</label>
												</div>
											</li>
											<li class="col100">
												<input type="submit" id="signup" value="Let’s Get Started" class="w80">
											</li>
											<li class="col100 align_center">
												<small>By clicking this button, you agree to our <a href="#">Terms of Service</a>.</small>
											</li>
											<li class="align_center" id="message"></li>
									   </ul>
									</div>
								</form>
							</div>
						</div>
					</div>
					<a href="#" data-target="mainContainer" class="scroll_down"></a>
				</div>
			</div>
		</header>