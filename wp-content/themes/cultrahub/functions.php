<?php
/* ----------------------------------------------------------------
 TABLE OF CONTENTS
 
	 1. LOCALIZATION
	 2. CONTENT WIDTH
	 3. THEME SETUP
	4. INIT
	 5. REGISTER SIDEBAR
	 6. ENQUEUE SCRIPTS
	 7. EXCLUDE FROM SEARCH
	 8. COMMENTS
	 9. MORE LINK
	 10. IS BLOG
	11. POST FORMAT: GALLERY
	12. CONTACT FORM
	13. NEXT/PREV POST NAV
   
-----------------------------------------------------------------*/


/* ----------------------------------------------------------------
   1. LOCALIZATION
-----------------------------------------------------------------*/

function cultrahub_localization() {
	load_theme_textdomain( 'cultrahub', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'cultrahub_localization' );


/* ----------------------------------------------------------------
   2. CONTENT WIDTH
-----------------------------------------------------------------*/
$GLOBALS['content_width'] = 1280;

function cultrahub_content_width() {

	$content_width = $GLOBALS['content_width'];

	/**
	 * Filter Nora content width of the theme.
	 *
	 * @since Nora 1.0
	 *
	 * @param $content_width integer
	 */
	$GLOBALS['content_width'] = apply_filters( 'cultrahub_content_width', $content_width );
}
add_action( 'template_redirect', 'cultrahub_content_width', 0 );

/* ----------------------------------------------------------------
   3. THEME SETUP
-----------------------------------------------------------------*/

if ( ! function_exists( 'cultrahub_theme_setup' ) ) {
	function cultrahub_theme_setup() {
        
    	/* Register WP3+ menus */
 		register_nav_menu( 'header-menu', __( 'Header Menu', 'nora' ) );
        register_nav_menu( 'footer-menu', __( 'Footer Menu', 'nora' ) );
   	
    	/* Configure WP 2.9+ thumbnails */
    	add_theme_support( 'post-thumbnails' );
		
		//add_image_size( 'cultrahub-menu-category', 650, 450, true );
		//add_image_size( 'cultrahub-home-blog', 545, 300, true );
		add_image_size( 'cultrahub-cultures', 256, 256, true );
		add_image_size( 'cultrahub-home-icon', 474, 492, true );	//Home and culture details page Icon
		add_image_size( 'cultrahub-culture-slider', 900, 400, true );
		add_image_size( 'cultrahub-culture-banner', 900, 400, true );	//Culture details page banner section image
		add_image_size( 'cultrahub-culture-street', 545, 337, true );
		add_image_size( 'cultrahub-culture-genre', 353, 253, true );
		add_image_size( 'cultrahub-culture-product-image', 258, 258, true );
		add_image_size( 'cultrahub-culture-inner-fyrbcoast', 248, 248, true );
		add_image_size( 'cultrahub-culture-inner-mcatilands', 248, 248, true );
		add_image_size( 'cultrahub-culture-inner-christianity', 248, 248, true );
		add_image_size( 'cultrahub-culture-inner-school', 248, 248, true );
		add_image_size( 'cultrahub-culture-inner-islamic', 248, 248, true );
    	add_image_size('client-logo', 100, 100, true);
		add_image_size( 'menucategory-page-slider-image', 1044, 400, true );
		        
        add_theme_support( 
            'post-formats', 
            array(
                'gallery',
                'link',
                'quote',
                'video',
                'audio'
            ) 
        );     

		add_post_type_support( 'page', 'excerpt' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );

        /*
		 * Enable support for custom logo.
		 *
		 *  @since Nora 1.0
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => '',
			'width'       => '',
			'flex-width'  => false,
			'flex-height' => false,
		) );
        //make woocommerce support
        add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
    }
}
add_action( 'after_setup_theme', 'cultrahub_theme_setup' );


//Adding custom class to custom logo
add_filter( 'get_custom_logo', 'cultrahub_change_logo_class' );
function cultrahub_change_logo_class( $html ) {
    //$html = str_replace( 'custom-logo', 'your-custom-class', $html );
    $html = str_replace( 'custom-logo-link', 'navbar-brand logo', $html );
    return $html;
}

/* ----------------------------------------------------------------
  4. INIT
-----------------------------------------------------------------*/
/* Includes */
require_once get_template_directory() . '/includes/init.php';

require get_template_directory() . '/includes/cultrahub-function.php';

/**
 * Load Class Custom Switch
 */
require get_template_directory() . '/includes/class/class-custom-switch.php';

/**
 * customizer options.
*/
require get_template_directory() . '/includes/customizer.php';


/* ----------------------------------------------------------------
   5. REGISTER SIDEBAR
-----------------------------------------------------------------*/
if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar(array(
		'name' => __( 'Learn Cultures Home Sidebar', 'cultrahub' ),
		'id' => 'learn-cultures-sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		//'before_title' => '<h4 class="widget-title">',
		//'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => __( 'Sell On Our Platform Home Sidebar', 'cultrahub' ),
		'id' => 'sell-on-our-platform-sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		//'before_title' => '<h2>',
		//'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => __( 'Shop Among Cultures Home Sidebar', 'cultrahub' ),
		'id' => 'shop-among-cultures-sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		//'before_title' => '<h2>',
		//'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => __( 'Cultrahub Quote Home Sidebar', 'cultrahub' ),
		'id' => 'cultrahub-quote',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		//'before_title' => '<h2>',
		//'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => __( 'Footer Sidebar1', 'cultrahub' ),
		'id' => 'cultrahub-sidebar-footer1',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		//'before_title' => '<h2>',
		//'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => __( 'Footer Sidebar2', 'cultrahub' ),
		'id' => 'cultrahub-sidebar-footer2',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		//'before_title' => '<h2>',
		//'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => __( 'Footer Sidebar3', 'cultrahub' ),
		'id' => 'cultrahub-sidebar-footer3',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		//'before_title' => '<h2>',
		//'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => __( 'Footer Address Sidebar', 'cultrahub' ),
		'id' => 'cultrahub-sidebar-footer-address',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		//'before_title' => '<h2>',
		//'after_title' => '</h2>',
	));
}

/* ----------------------------------------------------------------
   6. ENQUEUE SCRIPTS
-----------------------------------------------------------------*/
if ( !function_exists( 'cultrahub_enqueue_scripts' ) ) {
	function cultrahub_enqueue_scripts() {
		// get theme version
		$my_theme = wp_get_theme()->get('Version');
		
		// Add Font awesome
		//wp_enqueue_style( 'cultrahub-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0' );	
		// Add plugins.css
		wp_enqueue_style( 'cultrahub-plugins', get_template_directory_uri() . '/css/plugins.css', array(), '1.0' );	
		// Add layerslider
		wp_enqueue_style( 'cultrahub-layerslider', get_template_directory_uri() . '/css/layerslider.css', array(), '1.0' );	
		//Bootstrap
		//wp_enqueue_style( 'cultrahub-bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css');
		// Theme stylesheet
		wp_enqueue_style( 'cultrahub-style', get_stylesheet_uri() );	
		// Add responsive.css
		wp_enqueue_style( 'cultrahub-responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0' );
		// Add development.css
		wp_enqueue_style( 'cultrahub-development', get_template_directory_uri() . '/css/development.css', array(), '1.0' );
		
		//Scripts
		wp_enqueue_script( 'cultrahub-jquery', get_template_directory_uri() . '/js/lib/jquery-1.12.2.min.js', array(), '1.12.2' );
		wp_enqueue_script( 'cultrahub-plugins', get_template_directory_uri() . '/js/lib/plugins.js', array(), '1.12.1' );
		wp_enqueue_script( 'cultrahub-layerslider', get_template_directory_uri() . '/js/lib/layerslider.kreaturamedia.jquery.js', array(), '1.0' );
		wp_enqueue_script( 'cultrahub-jquerytransit', get_template_directory_uri() . '/js/lib/jquerytransit.js', array(), '1.0' );
		wp_enqueue_script( 'cultrahub-jquerytransit', get_template_directory_uri() . '/js/lib/layerslider.transitions.js', array(), '1.0' );
		wp_enqueue_script( 'cultrahub-layerslider-transitions', get_template_directory_uri() . '/js/custom.js', array(), '1.0' );
		//wp_enqueue_script( 'cultrahub-bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js' );
		
		/*for validation purpose*/
		wp_enqueue_script( 'cultrahub-validation', get_template_directory_uri() . '/js/validation/jquery.validate.js' );
		/*for validation purpose*/
		
		//Ajax
		wp_enqueue_script( 'cultrahub-ajax', get_template_directory_uri() . '/js/cultrahub-ajax.js', array(), '1.0', TRUE );
		wp_localize_script( 'cultrahub-ajax', 'cultrahub_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    }
}
add_action( 'wp_enqueue_scripts', 'cultrahub_enqueue_scripts' );

//Enqueue scripts in admin
/*function ch_enqueue_admin_scripts($hook) {
	wp_enqueue_style( 'ch-datatables-css', 'https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css' );
	wp_enqueue_script( 'ch-datatables-js', 'https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js' );
	wp_enqueue_script( 'cultrahhub-admin-ajax', get_template_directory_uri() . '/js/custom-admin.js', array(), '1.0', true );
	wp_localize_script( 'cultrahub-admin-ajax', 'cultrahub_admin_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'admin_enqueue_scripts', 'ym_enqueue_admin_scripts' );*/

//Allow Tinymce editor to allow html elements without attributes
function override_mce_options( $initArray ) {
  $opts = '*[*]';
  $initArray['valid_elements'] = $opts;
  $initArray['extended_valid_elements'] = $opts;
  return $initArray;
}
add_filter( 'tiny_mce_before_init', 'override_mce_options' ); 


//header already sent error fix
function fix_object_output_buffer() {
	ob_start();
}
add_action( 'init', 'fix_object_output_buffer' );

//Add staff user role
$cultrahub_subscriber = add_role( 'cultrahub_subscriber', __( 'Cultrahub Subscriber' ),
			array(
				'read' => true, // true allows this capability
				'edit_posts' => true, // Allows user to edit their own posts
				'edit_pages' => true, // Allows user to edit pages
				'edit_others_posts' => true, // Allows user to edit others posts not just their own
				'create_posts' => true, // Allows user to create new posts
				'manage_categories' => true, // Allows user to manage post categories
				'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
				'edit_themes' => false, // false denies this capability. User can�t edit your theme
				'install_plugins' => false, // User cant add new plugins
				'update_plugin' => false, // User can�t update any plugins
				'update_core' => false // user cant perform core updates
			)
		);

//Cultrahub Signup PART ONE
add_action( 'wp_ajax_cultrahub_signup_partone', 'cultrahub_signup_partone' );
add_action( 'wp_ajax_nopriv_cultrahub_signup_partone', 'cultrahub_signup_partone' );
function cultrahub_signup_partone(){
	if ( isset( $_POST['submission'] ) && ( $_POST['submission'] != '' ) ) {
		$signup_partone_email	= isset($_POST['submission'])?$_POST['submission']:'';
		$existing_check 		= email_exist( $signup_partone_email );
		
		if( $existing_check == 0 ){
			echo 'success';
		}else{
			echo 'already exist';
		}
	}
	else {
		echo 'error';
	}
	exit();
}

//Cultrahub Signup
add_action( 'wp_ajax_cultrahub_signup', 'cultrahub_signup' );
add_action( 'wp_ajax_nopriv_cultrahub_signup', 'cultrahub_signup' ); // This lines it's because we are using AJAX on the FrontEnd.
function cultrahub_signup(){
	if ( isset( $_POST['post_datas'] ) && ( $_POST['post_datas']['email_address'] != '' ) ) {
		$firstname 			= isset($_POST['post_datas']['firstname'])?$_POST['post_datas']['firstname']:'';
		$lastname 			= isset($_POST['post_datas']['lastname'])?$_POST['post_datas']['lastname']:'';
		$username 			= isset($_POST['post_datas']['username'])?$_POST['post_datas']['username']:'';
		//$month				= isset($_POST['post_datas']['month'])?$_POST['post_datas']['month']:'';
		//$day				= isset($_POST['post_datas']['day'])?$_POST['post_datas']['day']:'';
		//$year				= isset($_POST['post_datas']['year'])?$_POST['post_datas']['year']:'';
		$email_address		= isset($_POST['post_datas']['email_address'])?$_POST['post_datas']['email_address']:'';
		$gender				= isset($_POST['post_datas']['gender'])?$_POST['post_datas']['gender']:'';
		$business 			= isset($_POST['post_datas']['business'])?$_POST['post_datas']['business']:'';		
		$password			= isset($_POST['post_datas']['email_address'])?$_POST['post_datas']['email_address']:'123456';
		$culture_selected 	= isset($_POST['post_datas']['culture_selected'])?$_POST['post_datas']['culture_selected']:'';
		$get_notification 	= isset($_POST['post_datas']['get_notification'])?$_POST['post_datas']['get_notification']:'';
		
		$existing_check 	= email_exist( $email_address );
		$existing_username 	= usernameexists( $username );
		if( $existing_check == 0 && $existing_username == 0 ){
			$userdata = array(
				'user_login'      =>  strtolower( $username ),
				'user_nicename'   =>  $username,
				'user_pass'       =>  $password,
				'user_email'      =>  $email_address,
				'display_name'    =>  strtolower( $username ),
				'nickname'        =>  $username,
				'first_name'      =>  $firstname,
				'last_name'       =>  $lastname,
				'role'            =>  'cultrahub_subscriber'
			);			
			$inserted_user_id = wp_insert_user( $userdata );			
			if( $inserted_user_id != '' ){
				$registration_date = date('d/m/Y');
				if( strlen($day) == 1 ){
					$day = '0'.$day;
				}
				$all_selected_cultures = array(); $cul = '';
				if( $culture_selected != '' ){
					if( substr_count($culture_selected, ',') > 0 ){
						$all_selected_cultures = explode(',',$culture_selected);
					}else{
						$all_selected_cultures = $culture_selected;
					}
					$cul = serialize($all_selected_cultures);
				}
				update_user_meta( $inserted_user_id, 'first_name', $firstname );
				update_user_meta( $inserted_user_id, 'last_name', $lastname );
				//update_user_meta( $inserted_user_id, 'month', $month );
				//update_user_meta( $inserted_user_id, 'day', $day );
				//update_user_meta( $inserted_user_id, 'year', $year );
				//update_user_meta( $inserted_user_id, 'birthdate', $year.$month.$day );
				update_user_meta( $inserted_user_id, 'gender', $gender );
				update_user_meta( $inserted_user_id, 'user_business', $business );
				update_user_meta( $inserted_user_id, 'user_notification', $get_notification );
				update_user_meta( $inserted_user_id, 'user_registration_date', $registration_date );
				update_user_meta( $inserted_user_id, 'user_culture_selected', $cul );
				
				$welcome_template = '<html>
					<head>
						<title>Cultrahub</title>
					</head>
					<body style="margin: 0;padding: 0;">
						<div style="text-align: center;">
							<table width="800" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;font-family: Arial, Helvetica, sans-serif;background: url('.get_template_directory_uri().'/template_images/bg-welcome-emktg.jpg) no-repeat top center;">
								<tr>
									<td style="padding: 0 0 20px;">
										<table width="600" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
											<tr>
												<td style="padding: 10px 0;font-size: 10px;line-height: 15px; color: #58595b;">
													<p style="padding: 0;margin: 0;float: left;">Welcome to Cultrahub!</p>
													<p style="padding: 0;margin: 0;float: right;"><a href="'.get_permalink( 3811 ).'?id='.base64_encode($inserted_user_id).'" style="text-decoration: none;color: #1755ca;">View in your browser</a></p>
												</td>
											</tr>
											<tr>
												<td style="text-align: center;">
													<a href="'.site_url().'" style="text-decoration: none;color: #1755ca;">
														<img src="'.get_template_directory_uri().'/images/logo.png" alt="" width="290" />
													</a>
												</td>
											</tr>
											<tr>
												<td style="text-align: center;padding: 45px 0 0;">
													<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
														<tr>
															<td align="center" style="padding:0;">
																<a href="'.get_permalink( 2543 ).'" style="text-decoration: none;color: #414042;font-size: 13px;line-height:26px;">
																	<img src="'.get_template_directory_uri().'/template_images/icon_popular_store.png" alt="" height="27" style="display: inline-block;vertical-align: middle;margin:0 5px 0 0 ;" /> Popular Stores
																</a>
															</td>
															<td align="center" style="padding:0;">
																<a href="'.get_permalink( 2499 ).'" style="text-decoration: none;color: #414042;font-size: 13px;line-height:26px;">
																	<img src="'.get_template_directory_uri().'/template_images/icon_trending_now.png" alt="" height="27" style="display: inline-block;vertical-align: middle;margin:0 5px 0 0 ;" /> Trending Now
																</a>
															</td>
															<td align="center" style="padding:0;">
																<a href="'.get_permalink( 2671 ).'" style="text-decoration: none;color: #414042;font-size: 13px;line-height:26px;">
																	<img src="'.get_template_directory_uri().'/template_images/icon_exclusive.png" alt="" height="27" style="display: inline-block;vertical-align: middle;margin:0 5px 0 0 ;" /> Exclusive
																</a>
															</td>
															<td align="center" style="padding:0;">
																<a href="'.get_permalink( 2444 ).'" style="text-decoration: none;color: #414042;font-size: 13px;line-height:26px;">
																	<img src="'.get_template_directory_uri().'/template_images/icon_custom.png" alt="" height="27" style="display: inline-block;vertical-align: middle;margin:0 5px 0 0 ;" /> Customs
																</a>
															</td>
															<td align="center" style="padding:0;">
																<a href="'.get_permalink( 2770 ).'" style="text-decoration: none;color: #414042;font-size: 13px;line-height:26px;">
																	<img src="'.get_template_directory_uri().'/template_images/icon_share_quote.png" alt="" height="27" style="display: inline-block;vertical-align: middle;margin:0 5px 0 0 ;" /> Share a Quote
																</a>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								
								<tr>
									<td>
										<table width="600" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;color: #414042;text-align: center;">
											<tr>
												<td style="padding: 45px 0 0;font-size: 12px;line-height: 18px;">
													<p style="margin:0;padding: 0 0 2px;font-size: 16px;line-height: 20px;">GREAT TO HAVE YOU ON BOARD!</p>
													<p style="margin:0 0 20px;padding: 0 0 20px;font-size: 36px;line-height: 36px;font-weight: bold;border-bottom: 1px solid #d1d3d4;">Welcome To Cultrahub</p>
													<p style="margin:0;padding: 0 0 25px;">Hi <span>'.$firstname.' '.$lastname.'</span>, Welcome to Cultrahub! We have everything you could possibly need for you to learn, shop and sell online. From the latest videos by your favourite cultural scholars, to the newest trending<br> accessories, fashion garments and electronics. If its Cultural based, we have it here!</p>
													<p style="margin:0 -100px;padding: 0 0 35px;"><img src="'.get_template_directory_uri().'/template_images/laptop_banner.png" alt="" width="100%" style="display: block;margin:0;" /></p>
													
													<p style="margin:0;padding: 0 0 15px;"><img src="'.get_template_directory_uri().'/template_images/learn-sell-shop.png" alt="" width="400" style="display: block;margin:0 auto;" /></p>
													<p style="margin:0;padding: 0 0 30px;">The best place to start exploring our platform is from the "About us" page.  Here you\'ll find more details on our great team, and the wonderful work we aim to achieve. If you need any help, just let us know, <br>we\'ll be happy to assist!</p>
													<p style="margin:0;padding: 0;"><a href="'.get_permalink( 3054 ).'" style="text-decoration: none;color: #fff;line-height:30px;font-weight: bold;background: #ec4034;display: inline-block;padding: 0 30px;">Take a Look Around</a></p>
												</td>
											</tr>
											
											<tr>
												<td style="padding: 30px 0 0;font-size: 12px;line-height: 18px;">
													<p style="margin:0;padding: 0 0 40px;font-size: 24px;line-height: 34px;font-weight: bold;">Here is our Top 4 Services to Quench Your <br>Cultural Thirst. Enjoy!</p>
													
													<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
														<tr>
															<td style="padding: 0 0 35px;font-size: 12px;line-height: 18px;">
																<p style="padding: 30px 0;margin: 0 20px 0 0;float: left;width: 150px;border-right: 5px solid #e6e7e9;text-align: center;"><img src="'.get_template_directory_uri().'/template_images/icon_learn.png" alt="" height="90" /></p>
																<p style="padding: 6px 0 3px;margin: 0;font-size: 21px;line-height: 26px;font-weight: bold;text-align: left;">LEARN CULTURES</p>
																<p style="padding: 0 0 3px;margin: 0;font-size: 16px;line-height: 26px;text-align: left;">Ready to Learn Something New?</p>
																<p style="padding: 0 0 5px;margin: 0;text-align: left;">We have carefully curated our cultural content to bring you the very best articles, news, and video clips from top cultural leaders, businessmen, and producers in your community. </p>
																<p style="padding: 0;margin: 0;font-size: 10px; line-height: 20px;text-align: left;"><a href="'.get_permalink( 3075 ).'" style="text-decoration: none;color: #1755ca;">Learn More</a></p>
															</td>
														</tr>
														<tr>
															<td style="padding: 0 0 35px;font-size: 12px;line-height: 18px;">
																<p style="padding: 33px 0;margin: 0 0 0 20px;float: right;width: 150px;border-left: 5px solid #e6e7e9;text-align: center;"><img src="'.get_template_directory_uri().'/template_images/icon_sell.png" alt="" height="84" /></p>
																<p style="padding: 6px 0 3px;margin: 0;font-size: 21px; line-height: 26px;font-weight: bold;text-align: right;">SELL ON OUR PLATFORM</p>
																<p style="padding: 0 0 3px;margin: 0;font-size: 16px;line-height: 26px;text-align: right;">Who Said Starting A Business Would Be Hard?</p>
																<p style="padding: 0 0 5px;margin: 0;text-align: right;">Diversify your revenue streams by joining a global platform and reaching millions of new customers. Cultrahub provides you with everything you need to become a success!</p>
																<p style="padding: 0;margin: 0;font-size: 10px;line-height: 20px;text-align: right;"><a href="'.get_permalink( 2362 ).'" style="text-decoration: none;color: #1755ca;">Learn More</a></p>
															</td>
														</tr>
														<tr>
															<td style="padding: 0 0 35px;font-size: 12px;line-height: 18px;">
																<p style="padding: 30px 0;margin: 0 20px 0 0;float: left;text-align: center;width: 150px;border-right: 5px solid #e6e7e9;text-align: center;"><img src="'.get_template_directory_uri().'/template_images/icon_shop.png" alt="" height="90" /></p>
																<p style="padding: 6px 0 3px;margin: 0;font-size: 21px; line-height: 26px;font-weight: bold;text-align: left;">SHOP AMONG CULTURES</p>
																<p style="padding: 0 0 3px;margin: 0;font-size: 16px; line-height: 26px;text-align: left;">Find What You Need at A Price You Can\'t Resist.</p>
																<p style="padding: 0 0 5px;margin: 0;font-size: 12px; line-height: 18px;text-align: left;">Celebrate diversity with a selection of the hottest swag, and authentic handcrafted cultural products you won\'t find anywhere else! Get your hands on the latest and most unique set of products specially grouped by culture.</p>
																<p style="padding: 0;margin: 0;font-size: 10px; line-height: 20px;text-align: left;"><a href="'.get_permalink( 3062 ).'" style="text-decoration: none;color: #1755ca;">Learn More</a></p>
															</td>
														</tr>
														<tr>
															<td style="padding: 0;font-size: 12px;line-height: 18px;">
																<p style="padding: 40px 0;margin: 0 0 0 20px;float: right;text-align: center;width: 150px;border-left: 5px solid #e6e7e9;text-align: center;"><img src="'.get_template_directory_uri().'/template_images/icon_social.png" alt="" height="70" /></p>
																<p style="padding: 6px 0 3px;margin: 0;font-size: 21px; line-height: 26px;font-weight: bold;text-align: right;">SOCIAL-COMMERCE</p>
																<p style="padding: 0 0 3px;margin: 0;font-size: 16px;line-height: 26px;text-align: right;">Socialise & Make New Friends</p>
																<p style="padding: 0 0 5px;margin: 0;text-align: right;">Create & share quotes, reviews and viral Memes with sellers, cultural groups and friends. Or, why not become the next social media influencer by building a network of groups and followers interested in your say.</p>
																<p style="padding: 0;margin: 0;font-size: 10px;line-height: 20px;text-align: right;"><a href="'.site_url().'" style="text-decoration: none;color: #1755ca;">Learn More</a></p>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											
											<tr>
												<td style="padding: 40px 0 0;font-size: 12px;line-height: 18px;">
													<p style="margin:0;padding: 0 0 12px;font-size: 24px;line-height: 34px;font-weight: bold;">What Happens Now?</p>
													<p style="margin:0;padding: 0;">We will be going live very soon! In the meantime, keep an eye on your inbox, we\'ll keep you updated on our progress. If you would like to share your thoughts, comments or recommendations for our site, please get in touch <a href="'.site_url().'#share_thought" style="text-decoration: none;color: #1755ca;">here</a> our team will be delighted to hear from you.</p>
												</td>
											</tr>
											
											<tr>
												<td style="padding: 45px 0 0;">
													<p style="margin:0;padding: 0 0 3px;font-size: 20px;line-height: 22px;">The World\'s First Online Marketplace</p>
													<p style="margin:0;padding: 0 0 18px;font-size: 24px;line-height: 30px;">Focused On Culture, Community And Commerce!</p>
													
													<table width="450" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
														<tr>
															<td align="center" style="padding: 0 0 15px;">
																<a href="'.site_url().'/culture/african-american/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_african_american.png" alt="African American Culture" height="75" /></a>
															</td>
															<td align="center" style="padding: 0 0 15px;">
																<a href="'.site_url().'/culture/african/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_african.png" alt="African Culture" height="75" /></a>
															</td>
															<td align="center" style="padding: 0 0 15px;">
																<a href="'.site_url().'/culture/american/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_american.png" alt="American Culture" height="75" /></a>
															</td>
															<td align="center" style="padding: 0 0 15px;">
																<a href="'.site_url().'/culture/asian/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_asian.png" alt="Asian Culture" height="75" /></a>
															</td>
															<td align="center" style="padding: 0 0 15px;">
																<a href="'.site_url().'/culture/business/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_business.png" alt="Business Culture" height="75" /></a>
															</td>
														</tr>
														<tr>
															<td align="center" style="padding: 0 0 15px;">
																<a href="'.site_url().'/culture/canadian/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_canadian.png" alt="Canadian Culture" height="75" /></a>
															</td>
															<td align="center" style="padding: 0 0 15px;">
																<a href="'.site_url().'/culture/christianity/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_christianity.png" alt="Christianity Culture" height="75" /></a>
															</td>
															<td align="center" style="padding: 0 0 15px;">
																<a href="'.site_url().'/culture/great-britain/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_great_britain.png" alt="Great Britain Culture" height="75" /></a>
															</td>
															<td align="center" style="padding: 0 0 15px;">
																<a href="'.site_url().'/culture/hip-hop/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_hiphop.png" alt="Hip-Hop Culture" height="75" /></a>
															</td>
															<td align="center" style="padding: 0 0 15px;">
																<a href="'.site_url().'/culture/indian/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_indian.png" alt="Indian Culture" height="75" /></a>
															</td>
														</tr>
														<tr>
															<td align="center" style="padding: 0 0 15px;">
																<a href="'.site_url().'/culture/islamic/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_islamic.png" alt="Islamic Culture" height="75" /></a>
															</td>
															<td align="center" style="padding: 0 0 15px;">
																<a href="'.site_url().'/culture/island/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_island.png" alt="Island Culture" height="75" /></a>
															</td>
															<td align="center" style="padding: 0 0 15px;">
																<a href="'.site_url().'/culture/judaism/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_judaism.png" alt="Judaism Culture" height="75" /></a>
															</td>
															<td align="center" style="padding: 0 0 15px;">
																<a href="'.site_url().'/culture/latin/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_latin.png" alt="Latin Culture" height="75" /></a>
															</td>
															<td align="center" style="padding: 0 0 15px;">
																<a href="'.site_url().'/culture/mexican/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_mexican.png" alt="Mexican Culture" height="75" /></a>
															</td>
														</tr>
														<tr>
															<td align="center">
																<a href="'.site_url().'/culture/middle-eastern/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_middie_eastern.png" alt="Middie Eastern Culture" height="75" /></a>
															</td>
															<td align="center">
																<a href="'.site_url().'/culture/pop/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_pop.png" alt="Pop Culture" height="75" /></a>
															</td>
															<td align="center">
																<a href="'.site_url().'/culture/pride/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_pride.png" alt="Pride Culture" height="75" /></a>
															</td>
															<td align="center">
																<a href="'.site_url().'/culture/school/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_school.png" alt="School Culture" height="75" /></a>
															</td>
															<td align="center">
																<a href="'.site_url().'/culture/street/" style="text-decoration: none;display: inline-block;"><img src="'.get_template_directory_uri().'/template_images/badge_street.png" alt="Street Culture" height="75" /></a>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								
								<tr>
									<td>
										<table width="600" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;color: #414042;text-align: center;">
											<tr>
												<td style="padding: 30px 0;">
													<p style="margin:0;padding: 0 0 28px;"><img src="'.get_template_directory_uri().'/template_images/color_dots.png" alt="" height="6" /></p>
													<p style="margin:0;padding: 0 0 30px;font-size: 24px;line-height: 30px;font-weight: bold;">Our Social Media Channels</p>
													<p style="margin:0;padding: 0;">
														<a href="http://www.facebook.com" target="_blank" style="display: inline-block;vertical-align: top;margin-right: 5px;"><img src="'.get_template_directory_uri().'/template_images/social_facebook.png" alt="Facebook" height="25" /></a>
														<a href="http://www.twitter.com" target="_blank" style="display: inline-block;vertical-align: top;margin-right: 5px;"><img src="'.get_template_directory_uri().'/template_images/social_twitter.png" alt="Twitter" height="25" /></a>
														<a href="http://www.instagram.com" target="_blank" style="display: inline-block;vertical-align: top;margin-right: 5px;"><img src="'.get_template_directory_uri().'/template_images/social_instagram.png" alt="Instagram" height="25" /></a>
														<a href="http://www.youtube.com" target="_blank" style="display: inline-block;vertical-align: top;margin-right: 5px;"><img src="'.get_template_directory_uri().'/template_images/social_ytube.png" alt="You Tube" height="25" /></a>
														<a href="http://www.linkedin.com" target="_blank" style="display: inline-block;vertical-align: top;"><img src="'.get_template_directory_uri().'/template_images/social_linkedin.png" alt="Linkedin" height="25" /></a>
													</p>
												</td>
											</tr>
											
											<tr>
												<td style="padding: 0 0 45px;">
													<p style="margin:0;padding: 0 0 6px;font-size: 10px;line-height: 16px;">You are reciving this email because you subscribed at <a href="'.site_url().'" style="color: inherit;text-decoration: none;">www.cultrahub.com</a>, To opt-out of receiving<br> future email, you may do so here.</p>
													<p style="margin:0;padding: 0 0 6px;font-size: 10px;line-height: 16px;color: #1755ca;">350 Massachusetts Avenue, 3rd Floor, Indianapolis, IN - 46204.</p>
													<p style="margin:0;padding: 0;font-size: 10px;line-height: 16px;">This email was sent from a notification-only address that cannot accept incoming emails.<br>Please do not reply to this message. If you have any questions or concerns, please contact us at <a href="mailto:support@cultrahub.com" style="text-decoration: none;color: #1755ca;">support@cultrahub.com</a></p>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</div>
					</body>
				</html>';
				
				/*$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				$logo_url = site_url() . '/cultrahub/wp-content/themes/cultrahub/images/logo.png';
				
				$message  = 'First Name: '.$firstname.'<br />';
				$message .= 'Last Name: '.$lastname.'<br />';
				$message .= 'Username: '.$username.'<br />';
				$message .= 'Birthdate: '.$day.'/'.$month.'/'.$year.'<br />';
				$message .= 'E-mail Address: '.$email_address.'<br />';				
				$message = 'Business: '.$business.'<br />';*/
				
				$headers = 'Content-Type: text/html; charset=UTF-8';
				$headers .= 'From: Cultrahub <support@cultrahub.com>';
				//get_option('admin_email')
				wp_mail( $email_address, 'Sign Up, For The Culture!', $welcome_template, $headers );
				
				//autoLoginUser($inserted_user_id);
				
				echo 'success';
			}else{
				echo 'error';
			}
		}else{
			echo 'already exist';
		}
	}
	else {
		echo 'error';
	}
	exit();
}
function email_exist( $email ){
	if( $user = get_user_by( 'email', $email ) ){
		return $user->ID;
	}else{
		return 0;
	}
}
function usernameexists( $username ){
	if( $user = get_user_by( 'login', $username ) ){
		return $user->ID;
	}else{
		return 0;
	}
}

/* Chnage of default From name and email */
function new_mail_from($old) {
	return 'support@cultrahub.com';
}
function new_mail_from_name($old) {
	return 'Cultrahub';
}
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');
/* Chnage of default From name and email */

//Cultrahub checking username
add_action( 'wp_ajax_checking_username', 'checking_username' );
add_action( 'wp_ajax_nopriv_checking_username', 'checking_username' ); // This lines it's because we are using AJAX on the FrontEnd.
function checking_username(){
	if ( isset( $_POST['postdata'] ) && ( $_POST['postdata'] != '' ) ) {
		$username 			= isset($_POST['postdata'])?$_POST['postdata']:'';
		$existing_username 	= usernameexists( $username );
		if( $existing_username == 0 ){
			echo 'success';
		}else{
			echo 'already exist';
		}
	}
	else {
		echo 'error';
	}
	exit();
}

function autoLoginUser($user_id){
	$user = get_user_by( 'id', $user_id );
	if( $user ) {
		wp_set_current_user( $user_id, $user->user_login );
		wp_set_auth_cookie( $user_id );
		do_action( 'wp_login', $user->user_login, $user);
	}
}

if(is_user_logged_in()){
	$customer_data = get_userdata( get_current_user_id() );
	if( $customer_data->roles[0] == 'cultrahub_subscriber' ){
		$firstname      	= get_user_meta( get_current_user_id(), 'first_name', true );
		$surname        	= get_user_meta( get_current_user_id(), 'last_name', true );
		$full_name      	= $firstname.' '.$surname;
		$producer			= get_user_meta( get_current_user_id(), 'user_producer', true );
		$business			= get_user_meta( get_current_user_id(), 'user_business', true );
		$notification		= get_user_meta( get_current_user_id(), 'user_notification', true );
		$registration_date	= get_user_meta( get_current_user_id(), 'user_registration_date', true );
		$culture_selected	= get_user_meta( get_current_user_id(), 'user_culture_selected', true );

		//echo 'Full name==>'.$full_name.'==Is producer==>'.$producer.'==business==>'.$business.'==notification==>'.$notification.'==registration_date==>'.$registration_date.'==culture_selected==>'.$culture_selected;
		
	}   	
}

//Cultrahub Selected cultures
/*add_action( 'wp_ajax_cultrahub_selected_cultures', 'cultrahub_selected_cultures' );
add_action( 'wp_ajax_nopriv_cultrahub_selected_cultures', 'cultrahub_selected_cultures' );
function cultrahub_selected_cultures(){
	if ( isset( $_POST['post_datas'] ) ) {
		if( $_POST['post_datas'] != '' ){
			if( count($_POST['post_datas']) > 5 ){
				$culture_ids = array_slice($_POST['post_datas'], 0, 5, true);
			}else{
				$culture_ids = $_POST['post_datas'];
			}
			
			$get_datas = get_posts( array(
										'include'   => $culture_ids,
										'post_type' => 'culture',
										'orderby'   => 'post__in',
									) );
			foreach( $get_datas as $key => $val ){
				$cultureicon = get_field( 'icon', $val->ID );
?>
			<li id="cul_<?php echo $val->ID;?>"><a href="#"><img src="<?php echo $cultureicon['sizes']['cultrahub-home-icon'];?>" alt="<?php the_title();?>" /></a></li>
<?php
			}
			
			if( count($get_datas) < 5 ){
				for( $k=count($get_datas); $k<5; $k++){
?>
					<li><a href="#"><img src="<?php echo get_template_directory_uri();?>/images/badge_blank.png" alt=""></a></li>
<?php
				}
			}
			
			
		}	//if there is culture exist
		else{
			echo 'error';
		}	//if there is NO culture exist
	}
	else {
		echo 'error';
	}
	exit();
}*/

//Cultrahub Signup
/*add_action( 'wp_ajax_cultrahub_signup', 'cultrahub_signup' );
add_action( 'wp_ajax_nopriv_cultrahub_signup', 'cultrahub_signup' ); // This lines it's because we are using AJAX on the FrontEnd.
function cultrahub_signup(){
	if ( isset( $_POST['post_datas'] ) && ( $_POST['post_datas']['email_address'] != '' ) ) {
		$full_name 			= isset($_POST['post_datas']['full_name'])?$_POST['post_datas']['full_name']:'';
		$producer 			= isset($_POST['post_datas']['producer'])?$_POST['post_datas']['producer']:'';
		$business 			= isset($_POST['post_datas']['business'])?$_POST['post_datas']['business']:'';
		$email_address		= isset($_POST['post_datas']['email_address'])?$_POST['post_datas']['email_address']:'';
		$get_notification 	= isset($_POST['post_datas']['get_notification'])?$_POST['post_datas']['get_notification']:'';
		
		$post = array(
					'post_title' 	=> wp_strip_all_tags( $full_name ),					
					'post_status'	=> 'publish',
					'post_type' 	=> 'ch_registeredusers'  //Post type
				);
		$insert_id = wp_insert_post($post);
		if( $insert_id != '' ){
			update_post_meta( $insert_id, 'full_name', $full_name );
			update_post_meta( $insert_id, 'producer', $producer );
			update_post_meta( $insert_id, 'business', $business );
			update_post_meta( $insert_id, 'email_address', $email_address );
			update_post_meta( $insert_id, 'notification', $get_notification );
			echo 'success';
		}else{
			echo 'error';
		}
	}
	else {
		echo 'error';
	}
	exit();
}*/

//For Menu Category management//
function menu_categories(){
	$labels = array(
				'name'				=> _x( 'Menu Categories', 'post type general name' ),
				'singular_name'		=> _x( 'Menu Categories', 'post type singular name' ),
				'add_new' 			=> _x( 'Add New', 'menu_categories' ),
				'add_new_item' 		=> __( 'Add New Menu Category' ),
				'edit_item' 		=> __( 'Edit Menu Category' ),
				'new_item' 			=> __( 'New Menu Category' ),
				'all_items' 		=> __( 'All Menu Categories' ),
				'view_item' 		=> __( 'View Menu Categories' ),
				'search_items' 		=> __( 'Search' ),
				'not_found' 		=> __( 'No record found' ),
				'not_found_in_trash'=> __( 'No record found in the trash' ),
				'parent_item_colon' => '',
				'menu_name' 		=> 'Menu Categories'
			);
	$args = array(
				'labels'			=> $labels,
				'description'		=> '',
				'public'			=> true,
				'menu_icon'			=> 'dashicons-clipboard',
				'menu_position'		=> 17,
				'supports'			=> array('title','editor'),
				/*'has_archive' 	=> true,
				'capability_type' 	=> 'post',
				'capabilities' 		=> array(
				    					'create_posts' => false,	//add new false
				  						),
										'map_meta_cap' => true,		//edit, view, delete allow*/
			);
	register_post_type( 'menucategory', $args );
}
add_action( 'init', 'menu_categories' );

//For Genres
function ch_genres(){
	$labels = array(
				'name'				=> _x( 'Genres', 'post type general name' ),
				'singular_name'		=> _x( 'Genres', 'post type singular name' ),
				'add_new' 			=> _x( 'Add New', 'feedback' ),
				'add_new_item' 		=> __( 'Add New Genre' ),
				'edit_item' 		=> __( 'Edit Genre' ),
				'new_item' 			=> __( 'New Genre' ),
				'all_items' 		=> __( 'All Genres' ),
				'view_item' 		=> __( 'View Genre' ),
				'search_items' 		=> __( 'Search' ),
				'not_found' 		=> __( 'No record found' ),
				'not_found_in_trash'=> __( 'No record found in the trash' ),
				'parent_item_colon' => '',
				'menu_name' 		=> 'Genres'
			);
	$args = array(
				'labels'			=> $labels,
				'description'		=> '',
				'public'			=> true,
				'menu_icon'			=> 'dashicons-feedback',
				'menu_position'		=> 15,
				'supports'			=> array('title','thumbnail'),
				'has_archive' 		=> false,
			);
	register_post_type( 'genre', $args );
}
add_action( 'init', 'ch_genres' );

//For Home Blogs management//
function home_blogs(){
	$labels = array(
				'name'				=> _x( 'Home Blogs', 'post type general name' ),
				'singular_name'		=> _x( 'Home Blogs', 'post type singular name' ),
				'add_new' 			=> _x( 'Add New', 'homeblogs' ),
				'add_new_item' 		=> __( 'Add New' ),
				'edit_item' 		=> __( 'Edit Blog' ),
				'new_item' 			=> __( 'New Blog' ),
				'all_items' 		=> __( 'All Blogs' ),
				'view_item' 		=> __( 'View Blogs' ),
				'search_items' 		=> __( 'Search' ),
				'not_found' 		=> __( 'No record found' ),
				'not_found_in_trash'=> __( 'No record found in the trash' ),
				'parent_item_colon' => '',
				'menu_name' 		=> 'Home Blogs'
			);
	$args = array(
				'labels'			=> $labels,
				'description'		=> '',
				'public'			=> true,
				'menu_icon'			=> 'dashicons-welcome-write-blog',
				'menu_position'		=> 15,
				'supports'			=> array('title','editor') ,
				/*'has_archive' 		=> true,
				'capability_type' 	=> 'post',
				'capabilities' 		=> array(
				    					'create_posts' => false,	//add new false
				  						),
										'map_meta_cap' => true,		//edit, view, delete allow*/
			);
	register_post_type( 'blog', $args );
}
add_action( 'init', 'home_blogs' );

/*
//For Home Page Signup management//
function registered_users(){
	$labels = array(
				'name'				=> _x( 'Registered Users', 'post type general name' ),
				'singular_name'		=> _x( 'Registered Users', 'post type singular name' ),
				'add_new' 			=> _x( 'Add New', 'registeredusers' ),
				'add_new_item' 		=> __( 'Add New User' ),
				'edit_item' 		=> __( 'Edit User' ),
				'new_item' 			=> __( 'New User' ),
				'all_items' 		=> __( 'All Users' ),
				'view_item' 		=> __( 'View User' ),
				'search_items' 		=> __( 'Search' ),
				'not_found' 		=> __( 'No record found' ),
				'not_found_in_trash'=> __( 'No record found in the trash' ),
				'parent_item_colon' => '',
				'menu_name' 		=> 'Registered Users'
			);
	$args = array(
				'labels'			=> $labels,
				'description'		=> '',
				'public'			=> true,
				'menu_icon'			=> 'dashicons-groups',
				'menu_position'		=> 15,
				'supports'			=> array(''),
				'has_archive' 		=> false,
			);
	register_post_type( 'ch_registeredusers', $args );
}
add_action( 'init', 'registered_users' );

//Add column to feedback page in admin panel
add_filter( 'manage_ch_registeredusers_posts_columns', 'set_custom_edit_columns' );
function set_custom_edit_columns( $columns ) {
  	unset( $columns['title'] );
  	unset( $columns['date'] );
  	$columns['full_name'] 		= __( 'Full Name', 'Cultrahub' );
  	$columns['email_address'] 	= __( 'Email Address', 'Cultrahub' );
  	$columns['producer'] 		= __( 'Producer', 'Cultrahub' );  	
  	$columns['business'] 		= __( 'Business', 'Cultrahub' );
  	$columns['notification']	= __( 'Notification', 'Cultrahub' );
  	$columns['date'] 			= __( 'Date', 'date' );
  	return $columns;
}

add_action( 'manage_ch_registeredusers_posts_custom_column' , 'custom_column', 10, 2 );
function custom_column( $column, $post_id ) {
  switch ( $column ) {

    case 'full_name' :
      	echo get_field( 'full_name' );
      	break;
		
	case 'email_address' :
    	echo get_field( 'email_address' );
      	break;
	
	case 'producer' :
      	if( get_field( 'producer' ) != '' )echo get_field( 'producer' ); else echo 'No';
      	break;

    case 'business' :
      	echo get_field( 'business' );
      	break;

   case 'notification' :
      	if( get_field( 'notification' ) != '' )echo get_field( 'notification' ); else echo 'No';
      	break;
  }
}
*/

//For Cultures management//
function ch_cultures(){
	$labels = array(
				'name'				=> _x( 'Cultures', 'post type general name' ),
				'singular_name'		=> _x( 'Cultures', 'post type singular name' ),
				'add_new' 			=> _x( 'Add New', 'cultures' ),
				'add_new_item' 		=> __( 'Add New Culture' ),
				'edit_item' 		=> __( 'Edit Culture' ),
				'new_item' 			=> __( 'New Culture' ),
				'all_items' 		=> __( 'All Cultures' ),
				'view_item' 		=> __( 'View Culture' ),
				'search_items' 		=> __( 'Search' ),
				'not_found' 		=> __( 'No record found' ),
				'not_found_in_trash'=> __( 'No record found in the trash' ),
				'parent_item_colon' => '',
				'menu_name' 		=> 'Cultures'
			);
	$args = array(
				'labels'			=> $labels,
				'description'		=> '',
				'public'			=> true,
				'menu_icon'			=> 'dashicons-megaphone',
				'menu_position'		=> 15,
				'supports'			=> array('title','thumbnail'),
				'has_archive' 		=> false,
			);
	register_post_type( 'culture', $args );
}
add_action( 'init', 'ch_cultures' );

//For Cultures management//
function ch_culture_products(){
	$labels = array(
				'name'				=> _x( 'Products', 'post type general name' ),
				'singular_name'		=> _x( 'Products', 'post type singular name' ),
				'add_new' 			=> _x( 'Add New', 'products' ),
				'add_new_item' 		=> __( 'Add New Product' ),
				'edit_item' 		=> __( 'Edit Product' ),
				'new_item' 			=> __( 'New Product' ),
				'all_items' 		=> __( 'All Products' ),
				'view_item' 		=> __( 'View Product' ),
				'search_items' 		=> __( 'Search' ),
				'not_found' 		=> __( 'No record found' ),
				'not_found_in_trash'=> __( 'No record found in the trash' ),
				'parent_item_colon' => '',
				'menu_name' 		=> 'Products'
			);
	$args = array(
				'labels'			=> $labels,
				'description'		=> '',
				'public'			=> true,
				'menu_icon'			=> 'dashicons-tickets-alt',
				'menu_position'		=> 15,
				'supports'			=> array('title','thumbnail'),
				'has_archive' 		=> false,
			);
	register_post_type( 'product', $args );
}
add_action( 'init', 'ch_culture_products' );

//For HashTag management//
function ch_hashtag(){
	$labels = array(
				'name'				=> _x( 'Hash Tags', 'post type general name' ),
				'singular_name'		=> _x( 'Hash Tags', 'post type singular name' ),
				'add_new' 			=> _x( 'Add New', 'hashtag' ),
				'add_new_item' 		=> __( 'Add New Hash Tag' ),
				'edit_item' 		=> __( 'Edit Hash Tag' ),
				'new_item' 			=> __( 'New Hash Tag' ),
				'all_items' 		=> __( 'All Hash Tags' ),
				'view_item' 		=> __( 'View Hash Tag' ),
				'search_items' 		=> __( 'Search' ),
				'not_found' 		=> __( 'No record found' ),
				'not_found_in_trash'=> __( 'No record found in the trash' ),
				'parent_item_colon' => '',
				'menu_name' 		=> 'Hash Tags'
			);
	$args = array(
				'labels'			=> $labels,
				'description'		=> '',
				'public'			=> true,
				'menu_icon'			=> 'dashicons-tickets-alt',
				'menu_position'		=> 15,
				'supports'			=> array('title'),
				'has_archive' 		=> false,
			);
	register_post_type( 'hashtag', $args );
}
add_action( 'init', 'ch_hashtag' );

//For Team management//
function ch_team(){
	$labels = array(
				'name'				=> _x( 'Team', 'post type general name' ),
				'singular_name'		=> _x( 'Team', 'post type singular name' ),
				'add_new' 			=> _x( 'Add New', 'team' ),
				'add_new_item' 		=> __( 'Add New' ),
				'edit_item' 		=> __( 'Edit' ),
				'new_item' 			=> __( 'New' ),
				'all_items' 		=> __( 'All' ),
				'view_item' 		=> __( 'View' ),
				'search_items' 		=> __( 'Search' ),
				'not_found' 		=> __( 'No record found' ),
				'not_found_in_trash'=> __( 'No record found in the trash' ),
				'parent_item_colon' => '',
				'menu_name' 		=> 'Team Members'
			);
	$args = array(
				'labels'			=> $labels,
				'description'		=> '',
				'public'			=> true,
				'menu_icon'			=> 'dashicons-tickets-alt',
				'menu_position'		=> 15,
				'supports'			=> array('title','thumbnail','editor'),
				'has_archive' 		=> false,
			);
	register_post_type( 'team', $args );
}
add_action( 'init', 'ch_team' );

//Cultrahub get in touch
add_action( 'wp_ajax_cultrahub_getintouch', 'cultrahub_getintouch' );
add_action( 'wp_ajax_nopriv_cultrahub_getintouch', 'cultrahub_getintouch' );
function cultrahub_getintouch(){
	if ( isset( $_POST['post_datas'] ) && ( $_POST['post_datas']['email_id'] != '' ) ) {
		$fname 			= isset($_POST['post_datas']['fname'])?$_POST['post_datas']['fname']:'';
		$lname 			= isset($_POST['post_datas']['lname'])?$_POST['post_datas']['lname']:'';
		$email_id 		= isset($_POST['post_datas']['email_id'])?$_POST['post_datas']['email_id']:'';
		$phone_number	= isset($_POST['post_datas']['phone_number'])?$_POST['post_datas']['phone_number']:'';
		$businessname 	= isset($_POST['post_datas']['businessname'])?$_POST['post_datas']['businessname']:'';
		$topics 		= isset($_POST['post_datas']['topics'])?$_POST['post_datas']['topics']:'';
		$ymessage 		= isset($_POST['post_datas']['ymessage'])?$_POST['post_datas']['ymessage']:'';
		
		$post = array(
					'post_title' 	=> wp_strip_all_tags( $fname ),					
					'post_status'	=> 'publish',
					'post_type' 	=> 'getintouch'  //Post type
				);
		$insert_id = wp_insert_post($post);
		if( $insert_id != '' ){
			update_post_meta( $insert_id, 'fname', $fname );
			update_post_meta( $insert_id, 'lname', $lname );
			update_post_meta( $insert_id, 'email_id', $email_id );
			update_post_meta( $insert_id, 'phone_number', $phone_number );
			update_post_meta( $insert_id, 'getintouch_businessname', $businessname );
			update_post_meta( $insert_id, 'topics', $topics );
			update_post_meta( $insert_id, 'ymessage', $ymessage );		
			
			$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			$logo_url = site_url() . '/cultrahub/wp-content/themes/cultrahub/images/logo.png';
			
			$message  = 'First Name: '.$fname.'<br />';
			$message .= 'Last Name: '.$lname.'<br />';
			$message .= 'Email Address: '.$email_id.'<br />';
			$message .= 'Phone Number: '.$phone_number.'<br />';
			$message .= 'Business Name: '.$businessname.'<br />';
			$message .= 'Topics: '.$topics.'<br />';
			$message .= 'Message: '.$ymessage.'<br />';
			
			$headers = 'Content-Type: text/html; charset=UTF-8';
			$headers .= 'From: Cultrahub < '. $email_id .' >';
			//get_option('admin_email')
			wp_mail( '100websolution@gmail.com', 'Get In Touch', $message, $headers );
			
			echo 'success';
			
		}else{
			echo 'error';
		}
	}
	else {
		echo 'error';
	}
	exit();
}
//For Help & contact page get in touch management
function ch_getintouch(){
	$labels = array(
				'name'				=> _x( 'Get In Touch', 'post type general name' ),
				'singular_name'		=> _x( 'Get In Touch', 'post type singular name' ),
				'add_new' 			=> _x( 'Add New', 'getintouch' ),
				'add_new_item' 		=> __( 'Add New' ),
				'edit_item' 		=> __( 'Edit' ),
				'new_item' 			=> __( 'New' ),
				'all_items' 		=> __( 'All' ),
				'view_item' 		=> __( 'View' ),
				'search_items' 		=> __( 'Search' ),
				'not_found' 		=> __( 'No record found' ),
				'not_found_in_trash'=> __( 'No record found in the trash' ),
				'parent_item_colon' => '',
				'menu_name' 		=> 'Get In Touch'
			);
	$args = array(
				'labels'			=> $labels,
				'description'		=> '',
				'public'			=> true,
				'menu_icon'			=> 'dashicons-groups',
				'menu_position'		=> 15,
				'supports'			=> array(''),
				'has_archive' 		=> true,
				'capability_type' 	=> 'post',
				'capabilities' 		=> array(
				    					'create_posts' => false,	//add new false
				  						),
										'map_meta_cap' => true,		//edit, view, delete allow
			);
	register_post_type( 'getintouch', $args );
}
add_action( 'init', 'ch_getintouch' );

//Add column to get in touch page in admin panel
add_filter( 'manage_getintouch_posts_columns', 'set_custom_edit_columns_getintouch' );
function set_custom_edit_columns_getintouch( $columns ) {
  	unset( $columns['title'] );
  	unset( $columns['date'] );
  	$columns['fname'] 					= __( 'First Name', 'Cultrahub' );
  	$columns['lname'] 					= __( 'Last Name', 'Cultrahub' );
  	$columns['email_id'] 				= __( 'Email Address', 'Cultrahub' );
  	$columns['phone_number'] 			= __( 'Phone Number', 'Cultrahub' );  	
  	$columns['getintouch_businessname'] = __( 'Business Name', 'Cultrahub' );
  	$columns['topics']					= __( 'Topic', 'Cultrahub' );
  	$columns['date'] 					= __( 'Date', 'date' );
  	return $columns;
}

add_action( 'manage_getintouch_posts_custom_column' , 'custom_column_getintouch', 10, 2 );
function custom_column_getintouch( $column, $post_id ) {
  switch ( $column ) {

    case 'fname' :
      	echo get_field( 'fname' );
      	break;
		
	case 'lname' :
      	echo get_field( 'lname' );
      	break;
		
	case 'email_id' :
    	echo get_field( 'email_id' );
      	break;
	
	case 'phone_number' :
      	if( get_field( 'phone_number' ) != '' )echo get_field( 'phone_number' ); else echo '';
      	break;

    case 'getintouch_businessname' :
      	echo get_field( 'getintouch_businessname' );
      	break;

	case 'topics' :
      	if( get_field( 'topics' ) != '' )echo get_field( 'topics' ); else echo '';
      	break;
		
	case 'ymessage' :
      	if( get_field( 'ymessage' ) != '' )echo get_field( 'ymessage' ); else echo '';
      	break;
  }
}

//Cultrahub Share thoughts
add_action( 'wp_ajax_cultrahub_sharethoughts', 'cultrahub_sharethoughts' );
add_action( 'wp_ajax_nopriv_cultrahub_sharethoughts', 'cultrahub_sharethoughts' );
function cultrahub_sharethoughts(){
	if ( isset( $_POST['post_datas'] ) && ( $_POST['post_datas']['email_sharethought'] != '' ) ) {
		$firstname_sharethought = isset($_POST['post_datas']['firstname_sharethought'])?$_POST['post_datas']['firstname_sharethought']:'';
		$lastname_sharethought 	= isset($_POST['post_datas']['lastname_sharethought'])?$_POST['post_datas']['lastname_sharethought']:'';
		$email_sharethought 	= isset($_POST['post_datas']['email_sharethought'])?$_POST['post_datas']['email_sharethought']:'';
		$feedback_sharethought	= isset($_POST['post_datas']['feedback_sharethought'])?$_POST['post_datas']['feedback_sharethought']:'';
		$mood_sharethought 		= isset($_POST['post_datas']['mood_sharethought'])?$_POST['post_datas']['mood_sharethought']:'';
		
		$post = array(
					'post_title' 	=> wp_strip_all_tags( $firstname_sharethought ),
					'post_status'	=> 'publish',
					'post_type' 	=> 'sharethoughts'  //Post type
				);
		$insert_id = wp_insert_post($post);
		if( $insert_id != '' ){
			update_post_meta( $insert_id, 'firstname_sharethought', $firstname_sharethought );
			update_post_meta( $insert_id, 'lastname_sharethought', $lastname_sharethought );
			update_post_meta( $insert_id, 'email_sharethought', $email_sharethought );
			update_post_meta( $insert_id, 'feedback_sharethought', $feedback_sharethought );
			update_post_meta( $insert_id, 'mood_sharethought', $mood_sharethought );
			
			$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			$logo_url = site_url() . '/cultrahub/wp-content/themes/cultrahub/images/logo.png';
			
			$message1  = 'First Name: '.$firstname_sharethought.'<br />';
			$message1 .= 'Last Name: '.$lastname_sharethought.'<br />';
			$message1 .= 'Email Address: '.$email_sharethought.'<br />';
			$message1 .= 'Feedback: '.$feedback_sharethought.'<br />';
			$message1 .= 'Mood: '.$mood_sharethought.'<br />';
			
			$headers1 = 'Content-Type: text/html; charset=UTF-8';
			$headers1 .= 'From: Cultrahub < '. $_POST['post_datas']['email_sharethought'] .' >';
			wp_mail( '100websolution@gmail.com', 'Share Your Thoughts', $message1, $headers1 );
			
			echo 'success';
			
		}else{
			echo 'error';
		}
	}
	else {
		echo 'error';
	}
	exit();
}

//For Share Your Thoughts management
function ch_sharethoughts(){
	$labels = array(
				'name'				=> _x( 'Share Your Thoughts', 'post type general name' ),
				'singular_name'		=> _x( 'Share Your Thoughts', 'post type singular name' ),
				'add_new' 			=> _x( 'Add New', 'Thought' ),
				'add_new_item' 		=> __( 'Add New' ),
				'edit_item' 		=> __( 'Edit' ),
				'new_item' 			=> __( 'New' ),
				'all_items' 		=> __( 'All' ),
				'view_item' 		=> __( 'View' ),
				'search_items' 		=> __( 'Search' ),
				'not_found' 		=> __( 'No record found' ),
				'not_found_in_trash'=> __( 'No record found in the trash' ),
				'parent_item_colon' => '',
				'menu_name' 		=> 'Share Thoughts'
			);
	$args = array(
				'labels'			=> $labels,
				'description'		=> '',
				'public'			=> true,
				'menu_icon'			=> 'dashicons-awards',
				'menu_position'		=> 15,
				'supports'			=> array(''),
				'has_archive' 		=> true,
				'capability_type' 	=> 'post',
				'capabilities' 		=> array(
				    					'create_posts' => false,	//add new false
				  						),
										'map_meta_cap' => true,		//edit, view, delete allow
			);
	register_post_type( 'sharethoughts', $args );
}
add_action( 'init', 'ch_sharethoughts' );

//Add column to Share Your Thought page in admin panel
add_filter( 'manage_sharethoughts_posts_columns', 'set_custom_edit_columns_sharethoughts' );
function set_custom_edit_columns_sharethoughts( $columns ) {
  	unset( $columns['title'] );
  	unset( $columns['date'] );
  	$columns['firstname_sharethought'] 	= __( 'First Name', 'Cultrahub' );
  	$columns['lastname_sharethought'] 	= __( 'Last Name', 'Cultrahub' );
  	$columns['email_sharethought'] 		= __( 'Email Address', 'Cultrahub' );
  	$columns['feedback_sharethought'] 	= __( 'Feedback', 'Cultrahub' );  	
  	$columns['mood_sharethought'] 		= __( 'Mood', 'Cultrahub' );
  	$columns['date'] 					= __( 'Date', 'date' );
  	return $columns;
}

add_action( 'manage_sharethoughts_posts_custom_column' , 'custom_column_sharethoughts', 10, 2 );
function custom_column_sharethoughts( $column, $post_id ) {
  switch ( $column ) {

    case 'firstname_sharethought' :
      	echo get_field( 'firstname_sharethought' );
      	break;
		
	case 'lastname_sharethought' :
      	echo get_field( 'lastname_sharethought' );
      	break;
		
	case 'email_sharethought' :
    	echo get_field( 'email_sharethought' );
      	break;
	
	case 'phone_number' :
      	if( get_field( 'phone_number' ) != '' )echo get_field( 'phone_number' ); else echo '';
      	break;

    case 'feedback_sharethought' :
      	echo get_field( 'feedback_sharethought' );
      	break;

	case 'mood_sharethought' :
      	echo get_field( 'mood_sharethought' );
      	break;
  }
}
add_filter( 'post_row_actions', 'remove_row_actions', 10, 1 );
function remove_row_actions( $actions ){
    if( get_post_type() === 'getintouch' || get_post_type() === 'genre' || get_post_type() === 'menucategory' || get_post_type() === 'blog' || get_post_type() === 'product' || get_post_type() === 'hashtag' || get_post_type() === 'sharethoughts' )
        unset( $actions['view'] );
    return $actions;
	/*$actions['edit'] 
	$actions['inline hide-if-no-js'] 
	$actions['trash'] 
	$actions['view'] */
}

// Encrypt and Decrypt Function
function crypt_decrypt( $string, $action ) {
    $secret_key = '0123456789DefGHIjAbcklmonPwCultraHub';
    $secret_iv = '78h6215t';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
}

function multi_in_array($value, $array){
    foreach ($array AS $item){
        if (!is_array($item)){
            if ($item == $value){
                return true;
            }
            continue;
        }
        if (in_array($value, $item)){
            return true;
        }
        else if (multi_in_array($value, $item)){
            return true;
        }
    }
    return false;
}

function disallow_posts_with_same_title($messages) {
    global $post;
    global $wpdb ;
    $title = $post->post_title;
    $post_id = $post->ID;
    $current_posttype = get_post_type( $post_id );

    if( !empty($current_posttype) && ($current_posttype == 'menucategory' || $current_posttype == 'genre' || $current_posttype == 'culture' || $current_posttype == 'blog' || $current_posttype == 'hashtag' || $current_posttype == 'getintouch') ){
    	$wtitlequery = "SELECT post_title FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = '{$current_posttype}' AND post_title = '{$title}' AND ID != {$post_id} ";
	    $wresults = $wpdb->get_results( $wtitlequery) ;

	    if ( $wresults ) {
	        $error_message = 'This title is already used. Please choose another';
	        add_settings_error('post_has_links', '', $error_message, 'error');
	        settings_errors( 'post_has_links' );
	        $post->post_status = 'draft';
	        wp_update_post($post);
	    }
    }
    return $messages;
}
add_action('post_updated_messages', 'disallow_posts_with_same_title');

//Login logo url
function ch_login_url() {  return site_url(); }
add_filter( 'login_headerurl', 'ch_login_url' );
 
//Login logo title text
function ch_wp_login_title() { return 'Cultrahub'; }
add_filter('login_headertitle', 'ch_wp_login_title');

//Change admin login screen logo
function ch_login_logo() { ?>
    <style type="text/css">
	#login{padding: 2% 0 0 !important;}
    #login h1 a, .login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
		height:207px;
		width:316px;
		background-size: 316px 207px;
		background-repeat: no-repeat;
    	padding-bottom: 20px;
    }
    #loginform .newsociallogins {display: none;}
	#loginform h3 {display: none;}
    </style>
<?php
}
add_action( 'login_enqueue_scripts', 'ch_login_logo' );

//Remove admin bar from frontend
add_filter('show_admin_bar', '__return_false');

//Remove [...] from excerpts
function new_excerpt( $more ){
	return '';
}
add_filter( 'excerpt_more', 'new_excerpt' );

function add_social_links_icons( ){
	$html = '';
    if(get_option("social-share-facebook") == 1){
        $html = $html . "<a target='_blank' class='fb' href='http://www.facebook.com'><i class='fa fa-facebook'></i></a>";
    }
    if(get_option("social-share-twitter") == 1){
		$html = $html . "<a target='_blank' class='tw' href='http://www.twitter.com'><i class='fa fa-twitter'></i></a>";
    }
    if(get_option("social-share-instagram") == 1){
		$html = $html . "<a target='_blank' class='ins' href='http://www.instagram.com'><i class='fa fa-instagram'></i></a>";
    }
    if(get_option("social-share-gplus") == 1){
		$html = $html . "<a target='_blank' class='gplus' href='http://plus.google.com'><i class='fa fa-google-plus'></i></a>";
    }
    if(get_option("social-share-youtube") == 1){
		$html = $html . "<a href='http://www.youtube.com' target='_blank' class='yt'><i class='fa fa-youtube'></i></a>";
    }
	if(get_option("social-share-linkedin") == 1){
		$html = $html . "<a href='http://www.linkedin.com' target='_blank' class='in'><i class='fa fa-linkedin'></i></a>";
    }
    return $html;
}
add_filter("init", "add_social_links_icons");




//Convert youtube watch url to embeded code
function youtubeEmbedFromUrl($youtube_url, $width, $height, $iframe_id){
	$vid_id = extractUTubeVidId($youtube_url);
	return generateYoutubeEmbedCode($vid_id, $width, $height, $iframe_id);
}
function extractUTubeVidId($url){
	/*
	* type1: http://www.youtube.com/watch?v=H1ImndT0fC8
	* type2: http://www.youtube.com/watch?v=4nrxbHyJp9k&feature=related
	* type3: http://youtu.be/H1ImndT0fC8
	*/
	$vid_id = "";
	$flag = false;
	if(isset($url) && !empty($url)){
		/*case1 and 2*/
		$parts = explode("?", $url);
		if(isset($parts) && !empty($parts) && is_array($parts) && count($parts)>1){
			$params = explode("&", $parts[1]);
			if(isset($params) && !empty($params) && is_array($params)){
				foreach($params as $param){
					$kv = explode("=", $param);
					if(isset($kv) && !empty($kv) && is_array($kv) && count($kv)>1){
						if($kv[0]=='v'){
							$vid_id = $kv[1];
							$flag = true;
							break;
						}
					}
				}
			}
		}		
		/*case 3*/
		if(!$flag){
			$needle = "youtu.be/";
			$pos = null;
			$pos = strpos($url, $needle);
			if ($pos !== false) {
				$start = $pos + strlen($needle);
				$vid_id = substr($url, $start, 11);
				$flag = true;
			}
		}
	}
	return $vid_id;
}

function generateYoutubeEmbedCode($vid_id, $width, $height, $iframe_id){
	$w = $width;
	$h = $height;
	$id = $iframe_id;
	$embedded_code = '<iframe id="clip_'.$id.'" width="'.$w.'" height="'.$h.'" src="http://www.youtube.com/embed/'.$vid_id.'?enablejsapi=1&rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>';
	return $embedded_code;
}

add_action( 'pre_user_query', 'wphsau_pre_user_query' );
function wphsau_pre_user_query( $user_search ) {
    global $wpdb;
    $super_admins = get_super_admins();
    $super_admin_list = "'" . implode( "','", $super_admins ) . "'";
    $user_search->query_where = str_replace('WHERE 1=1', "WHERE 1=1 AND {$wpdb->users}.user_login NOT IN ({$super_admin_list})", $user_search->query_where);
}
function wdm_user_role_dropdown($all_roles) {
    global $pagenow;
    //if( $pagenow == 'user-edit.php' ) {
        // if current user is editor AND current page is edit user page
        unset($all_roles['administrator']);
        unset($all_roles['editor']);
        unset($all_roles['super admin']);
        unset($all_roles['contributor']);
        unset($all_roles['author']);
    //}
	
	unset($all_roles['view'] );
	
    return $all_roles;
}
add_action('editable_roles','wdm_user_role_dropdown');

/*add_action('admin_menu' , 'add_to_cpt_menu'); 

function add_to_cpt_menu() {
    add_submenu_page('view.php?post_type=sharethoughts', 'Custom Post Type Admin', 'Custom Settings', 'view_posts', basename(__FILE__), 'cpt_menu_function');
}*/

/********* Export to csv ***********/
add_action('admin_footer', 'export_users');
function export_users(){
    $screen = get_current_screen();
    if ( $screen->id != "users" )   // Only add to users.php page
        return;
    ?>
    <script type="text/javascript">
    jQuery(document).ready( function($){
		$('.tablenav.top .clear, .tablenav.bottom .clear').before('<input type="hidden" id="mytheme_export_csv" name="mytheme_export_csv" value="1" /><input class="button button-primary user_export_button" style="margin-top:3px;" type="submit" value="<?php esc_attr_e('Export All as CSV', 'mytheme');?>" />');
        });
    </script>
<?php
}
add_action('admin_init', 'export_csv'); //you can use admin_init as well
function export_csv() {
	if (!empty($_GET['mytheme_export_csv']) && !empty($_GET['users']) && ($_GET['action'] == '-1')) {		
        if (current_user_can('manage_options')) {
            header("Content-type: application/force-download");
            header('Content-Disposition: inline; filename="users'.date('YmdHis').'.csv"');

            // WP_User_Query arguments
            $args = array (
						'include' => $_GET['users'],
						'order'   => 'ASC',
						'orderby' => 'display_name',
						'fields'  => 'all',
					);            
            $users = get_users( $args );
			//echo '<pre>'; print_r($users); die;
            
			//for first row:
			echo '"First Name","Last Name","User Name","E-mail Address","Gender","What is Your Business?","Registration Date"' . "\r\n";
            foreach ( $users as $user ) {
                $meta = get_user_meta($user->ID);
				//echo '<pre>'; print_r($meta); die;
                $role = $user->roles;
                $email = $user->user_email;
				
                $first_name 		= ( isset($meta['first_name'][0]) && $meta['first_name'][0] != '' ) ? $meta['first_name'][0] : '' ;
                $last_name  		= ( isset($meta['last_name'][0]) && $meta['last_name'][0] != '' ) ? $meta['last_name'][0] : '' ;
                $user_name  		= ( isset($meta['nickname'][0]) && $meta['nickname'][0] != '' ) ? $meta['nickname'][0] : '' ;
                //$birthdate  		= $meta['day'][0].'-'.$meta['month'][0].'-'.$meta['year'][0];
                $gender  			= ( isset($meta['gender'][0]) && $meta['gender'][0] != '' ) ? $meta['gender'][0] : '' ;
                $business  			= ( isset($meta['user_business'][0]) && $meta['user_business'][0] != '' ) ? $meta['user_business'][0] : '' ;
				$registration_date  = ( isset($meta['user_registration_date'][0]) && $meta['user_registration_date'][0] != '' ) ? str_replace('/','-',$meta['user_registration_date'][0]) : '' ;
				
                //echo '"'.$first_name.'","'.$last_name.'","'.$user_name.'","'.$birthdate.'","'.$email.'","'.$gender.'","'.$business.'","'.$registration_date.'"' . "\r\n";
				echo '"'.$first_name.'","'.$last_name.'","'.$user_name.'","'.$email.'","'.$gender.'","'.$business.'","'.$registration_date.'"' . "\r\n";
            }
            exit();
        }
    }
}