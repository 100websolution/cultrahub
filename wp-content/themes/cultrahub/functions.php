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
		
		add_image_size( 'cultrahub-menu-category', 650, 450, true );
		add_image_size( 'cultrahub-home-blog', 545, 300, true );
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
		'name' => __( 'Cultrahub Genres Home Sidebar', 'cultrahub' ),
		'id' => 'cultrahub-genres',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="heading center">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => __( 'Cultures & Discvover Home Sidebar', 'cultrahub' ),
		'id' => 'cultrahub-cultures-discover',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="heading center">',
		'after_title' => '</h2>',
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
		
		// Add Font awesome.
		wp_enqueue_style( 'cultrahub-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0' );	
		// Add plugins.css.
		wp_enqueue_style( 'cultrahub-plugins', get_template_directory_uri() . '/css/plugins.css', array(), '1.0' );	
		//Bootstrap
		wp_enqueue_style( 'cultrahub-bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css');
		// Theme stylesheet.
		wp_enqueue_style( 'cultrahub-style', get_stylesheet_uri() );	
		// Add plugins.css.
		wp_enqueue_style( 'cultrahub-responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0' );
		// Add development.css.
		wp_enqueue_style( 'cultrahub-development', get_template_directory_uri() . '/css/development.css', array(), '1.0' );
		
		//Scripts
		wp_enqueue_script( 'cultrahub-jquery', get_template_directory_uri() . '/js/lib/jquery-1.12.2.min.js', array(), '1.12.2' );
		wp_enqueue_script( 'cultrahub-plugins', get_template_directory_uri() . '/js/lib/plugins.js', array(), '1.12.1' );
		wp_enqueue_script( 'cultrahub-custom', get_template_directory_uri() . '/js/custom.js', array(), '1.0' );
		wp_enqueue_script( 'cultrahub-bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js' );
		
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

//Cultrahub Signup
add_action( 'wp_ajax_cultrahub_signup', 'cultrahub_signup' );
add_action( 'wp_ajax_nopriv_cultrahub_signup', 'cultrahub_signup' ); // This lines it's because we are using AJAX on the FrontEnd.
function cultrahub_signup(){
	if ( isset( $_POST['post_datas'] ) && ( $_POST['post_datas']['email_address'] != '' ) ) {
		$full_name 			= isset($_POST['post_datas']['full_name'])?$_POST['post_datas']['full_name']:'';
		$producer 			= isset($_POST['post_datas']['producer'])?$_POST['post_datas']['producer']:'';
		$business 			= isset($_POST['post_datas']['business'])?$_POST['post_datas']['business']:'';
		$email_address		= isset($_POST['post_datas']['email_address'])?$_POST['post_datas']['email_address']:'';
		$password			= isset($_POST['post_datas']['email_address'])?$_POST['post_datas']['email_address']:'123456';
		$get_notification 	= isset($_POST['post_datas']['get_notification'])?$_POST['post_datas']['get_notification']:'';
		$culture_selected 	= isset($_POST['post_datas']['culture_selected'])?$_POST['post_datas']['culture_selected']:'';
		$firstname = ''; $lastname = '';
		if( strpos($full_name, ' ') !== false ){
			$exploded_value = explode(' ', $full_name);
			$firstname 	= $exploded_value[0];
			$lastname 	= $exploded_value[1];
		}else{
			$firstname 	= $full_name;
			$lastname 	= $full_name;
		}
		
		$existing_check = email_exist( $email_address );
		if( $existing_check == 0 ){
			$userdata = array(
				'user_login'      =>  strtolower( $firstname ),
				'user_nicename'   =>  $firstname,
				'user_pass'       =>  $password,
				'user_email'      =>  $email_address,
				'display_name'    =>  strtolower( $firstname ),
				'nickname'        =>  $firstname,
				'first_name'      =>  $firstname,
				'last_name'       =>  $lastname,
				'role'            =>  'cultrahub_subscriber'
			);		 
			$inserted_user_id = wp_insert_user( $userdata );
			
			if( $inserted_user_id != '' ){
				$registration_date = date('d/m/Y');
				update_user_meta( $inserted_user_id, 'user_producer', $producer );
				update_user_meta( $inserted_user_id, 'user_business', $business );
				update_user_meta( $inserted_user_id, 'user_notification', $get_notification );
				update_user_meta( $inserted_user_id, 'user_registration_date', $registration_date );
				update_user_meta( $inserted_user_id, 'user_culture_selected', $culture_selected );
				
				autoLoginUser($inserted_user_id);
				
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

    if( !empty($current_posttype) && ($current_posttype == 'menucategory' || $current_posttype == 'genre' || $current_posttype == 'culture' || $current_posttype == 'blog' || $current_posttype == 'hashtag') ){
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
		height:153px;
		width:275px;
		background-size: 275px 153px;
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