<?php
/*
Plugin Name: Send Email From Admin
Plugin URI:
Description: Easily send a simple custom email with an attachment from the WordPress administration screen. Tools -> Send Email.
Version: 1.0
Author: kojak711
Domain Path: /languages
Text Domain: sefa

Send Email From Admin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Send Email From Admin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Send Email From Admin.  If not, see <http://www.gnu.org/licenses/>.
*/


# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SEFA_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'SEFA_PLUGIN_VER', '0.9.3' );

/**
 * Add our sub menu in the Tools menu
 *
 * @since 0.9.2
 */
function sefa_plugin_add_admin_page() { 	
	// create sefa submenu page	under the Tools menu
	$sefa_page = add_submenu_page( 'tools.php', 'Send Email From Admin', 'Send Email', 'manage_options', 'sefa_email', 'sefa_plugin_main' );
	// load js and css on sefa page only
	add_action( 'load-' . $sefa_page, 'sefa_plugin_scripts' );
}
add_action( 'admin_menu', 'sefa_plugin_add_admin_page' );

/**
 * Load our css and js.
 *
 * @since 0.9.2
 */
function sefa_plugin_scripts() {
	wp_enqueue_style( 'sefa_admin_css', SEFA_PLUGIN_DIR_URL . 'css/sefa.css', '', SEFA_PLUGIN_VER );
	wp_enqueue_script( 'sefa_admin_js', SEFA_PLUGIN_DIR_URL . 'js/sefa.js', array('jquery'), SEFA_PLUGIN_VER);
}

/**
 * Register our text domain.
 *
 * @since 0.9
 */
function sefa_plugin_load_textdomain() {
	load_plugin_textdomain( 'sefa', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action('plugins_loaded', 'sefa_plugin_load_textdomain');

/**
 * Our main function to display and process our form
 * 
 * @since 0.9
 */
function sefa_plugin_main() {
	// get site info to construct 'FROM' for email
	$from_name = wp_specialchars_decode( get_option('blogname'), ENT_QUOTES );
	$from_email = get_bloginfo('admin_email');

	// initialize
	$send_mail_message = false;

	if ( !empty( $_POST ) && check_admin_referer( 'sefa_send_email', 'sefa-form-nonce' ) ) {
		// handle attachment
		$attachment_path = '';
		if ( $_FILES ) {
			if ( !function_exists( 'wp_handle_upload' ) ) {
				require_once( ABSPATH . 'wp-admin/includes/file.php' );
			}
			$uploaded_file = $_FILES['attachment'];
			$upload_overrides = array( 'test_form' => false );
			$attachment = wp_handle_upload( $uploaded_file, $upload_overrides );
		    if ( $attachment && !isset( $attachment['error'] ) ) {
			    // file was successfully uploaded
			    $attachment_path = $attachment['file'];
			} else {
			    // echo $attachment['error'];
			}
		}

		// get the posted form values
		$sefa_recipient_emails = isset( $_POST['sefa_recipient_emails'] ) ? trim($_POST['sefa_recipient_emails']) : '';
		$sefa_subject = isset( $_POST['sefa_subject'] ) ? stripslashes(trim($_POST['sefa_subject'])) : '';
		$sefa_body = isset( $_POST['sefa_body'] ) ? stripslashes(nl2br($_POST['sefa_body']))  : '';
		$sefa_group_email = isset( $_POST['sefa_group_email'] ) ? trim($_POST['sefa_group_email']) : 'no';
		$recipients = explode( ',',$sefa_recipient_emails );

		// initialize some vars
		$errors = array();
		$valid_email = true;
		
		// simple form validation
    	if ( empty( $sefa_recipient_emails ) ) {
    		$errors[] = __( "Please enter an email recipient in the To: field.", 'sefa' );
    	} else {
			// Loop through each email and validate it
			foreach( $recipients as $recipient ) {
			    if ( !filter_var( trim($recipient), FILTER_VALIDATE_EMAIL ) ) {
			        $valid_email = false;
			        break;
			    }
			}
			// create appropriate error msg
			if ( !$valid_email ) {
				$errors[] = _n( "The To: email address appears to be invalid.", "One of the To: email addresses appears to be invalid.", count($recipients), 'sefa' );
			} 
	    }
	    if ( empty($sefa_subject) ) $errors[] = __( "Please enter a Subject.", 'sefa' );
	    //if ( empty($sefa_body) ) $errors[] = __( "Please enter a Message.", 'sefa' );

	    // send the email if no errors were found
	    if ( empty($errors) ) {
			
			$sefa_body = '<div style="text-align: center;"><table width="800" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;font-family: Arial, Helvetica, sans-serif;background: url(http://cultrahub.com/wp-content/uploads/2018/06/bg-initiator-emktg1-1.jpg) no-repeat top center;"><tr><td><table width="600" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;"><tr><td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;"><tr><td valign="top" style="padding:0; float: left;"><a href="http://cultrahub.com" style="text-decoration: none;color: #1755ca;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/logo.png" alt="" width="166" /></a></td><td valign="top" style="padding: 10px 0 0;font-size: 10px;line-height: 15px;"><p style="padding: 0;margin: 0;text-align: right;"><a href="http://cultrahub.com/invitation/" style="text-decoration: none;color: #1755ca;">View in your browser</a></p></td></tr></table></td></tr><tr><td style="text-align: center;padding: 305px 0 20px;border-bottom: 1px solid #d1d3d4;"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;"><tr><td align="center" style="padding:0;"><a href="http://cultrahub.com/popular-stores/" style="text-decoration: none;color: #414042;font-size: 13px;line-height:26px;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/icon_popular_store.png" alt="" height="27" style="display: inline-block;vertical-align: middle;margin:0 5px 0 0 ;" /> Popular Stores</a></td><td align="center" style="padding:0;"><a href="http://cultrahub.com/trending-now/" style="text-decoration: none;color: #414042;font-size: 13px;line-height:26px;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/icon_trending_now.png" alt="" height="27" style="display: inline-block;vertical-align: middle;margin:0 5px 0 0 ;" /> Trending Now</a></td><td align="center" style="padding:0;"><a href="http://cultrahub.com/exclusive/" style="text-decoration: none;color: #414042;font-size: 13px;line-height:26px;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/icon_exclusive.png" alt="" height="27" style="display: inline-block;vertical-align: middle;margin:0 5px 0 0 ;" /> Exclusive</a></td><td align="center" style="padding:0;"><a href="http://cultrahub.com/customs/" style="text-decoration: none;color: #414042;font-size: 13px;line-height:26px;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/icon_custom.png" alt="" height="27" style="display: inline-block;vertical-align: middle;margin:0 5px 0 0 ;" /> Customs</a></td><td align="center" style="padding:0;"><a href="http://cultrahub.com/share-quote/" style="text-decoration: none;color: #414042;font-size: 13px;line-height:26px;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/icon_share_quote.png" alt="" height="27" style="display: inline-block;vertical-align: middle;margin:0 5px 0 0 ;" /> Share a Quote</a></td></tr></table></td></tr></table></td></tr><tr><td><table width="600" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;color: #414042;text-align: center;"><tr><td style="padding: 12px 0 0;font-size: 15px;line-height: 21px;"><p style="margin:0;padding: 0 0 55px;">The  worlds first online social-ecommerce platform dedicated to culture, community, and commerce. We are <strong>Launching Soon</strong>, and we\'d love <strong>YOU</strong> to be a part of it!</p><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;text-align: center;font-size: 12px;line-height: 18px;"><tr><td valign="top" style="padding: 0;width: 33.33%;"><p style="padding: 0 0 20px;margin: 0;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/icon_learn.png" alt="" height="75" /></p><p style="padding: 0 6px 6px;margin: 0;font-size: 16px;line-height: 26px;font-weight: bold;">Learn Cultures</p><p style="padding: 0 17px 4px;margin: 0;">Trending videos and articles from your favourite cultural influencers.</p><p style="padding: 0;margin: 0;font-size: 10px; line-height: 20px;"><a href="http://cultrahub.com/learn/" style="text-decoration: none;color: #1755ca;">Learn More</a></p></td><td valign="top" style="padding: 0;width: 33.33%;"> <p style="padding: 0 0 23px;margin: 0;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/icon_sell.png" alt="" height="72"/></p><p style="padding: 0 6px 6px;margin: 0;font-size: 16px;line-height: 26px;font-weight: bold;">Sell On Our Platform</p><p style="padding: 0 17px 4px;margin: 0;">List and sell your products with ease using custom insights and tools.</p><p style="padding: 0;margin: 0;font-size: 10px; line-height: 20px;"><a href="http://cultrahub.com/be-a-seller/" style="text-decoration: none;color: #1755ca;">Learn More</a></p></td><td valign="top" style="padding: 0;width: 33.33%;"> <p style="padding: 0 0 20px;margin: 0;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/icon_shop.png" alt="" height="75"/></p><p style="padding: 0 6px 6px;margin: 0;font-size: 16px;line-height: 26px;font-weight: bold;">Shop Among Cultures</p><p style="padding: 0 17px 4px;margin: 0;">Browse local producers, find unique cultural products and custom apparels.</p><p style="padding: 0;margin: 0;font-size: 10px; line-height: 20px;"><a href="http://cultrahub.com/shop/" style="text-decoration: none;color: #1755ca;">Learn More</a></p></td></tr></table> </td></tr><tr> <td style="padding: 42px 0 0;"> <p style="padding: 0;margin:0;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/middle_banner.jpg" alt=""/></p></td></tr><tr> <td style="padding: 52px 0 0;font-size: 12px;line-height: 18px;text-align: left;"> <p style="padding: 0;margin:0;float: left;width: 280px;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/pic1.png" alt=""/></p><p style="padding: 30px 0 0;margin:0;font-size: 21px;line-height: 28px;">Cross Cultural <br>Communication and Commerce</p><p style="padding: 15px 0 0;margin:0;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/color_dots.png" alt="" height="6"/></p><p style="padding: 18px 0 0;margin:0;">Our platform is specially designed to facilitate and encourage cross cultural communication and commerce. <br>A platform where its users can learn, sell and shop based on cultural content, popular stores, and genres whilst engaging with local communities.</p></td></tr><tr> <td style="padding: 15px 0 0;"> <p style="margin:0;padding: 0 0 26px;font-size: 24px;line-height:34px;font-weight: bold;">Explore Different Cultures, Learn from Cultural, Scholars, Discover New Trends!</p><div style="margin: 0 -10px;"> <p style="padding: 0 10px;margin:0;width: 25%;float: left;-webkit-box-sizing: border-box;box-sizing: border-box;"> <a href="http://cultrahub.com/culture/american/" style="display: block;text-decoration: none;"> <img src="http://cultrahub.com/wp-content/uploads/2018/06/culture1.jpg" alt=""/> <img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_american.png" alt="" height="65" style="margin: -32px 0 -5px;"/> <span style="display: block;font-size: 14px;line-height: 26px;color: #414042;">American Cult.</span> </a> </p><p style="padding: 0 10px;margin:0;width: 25%;float: left;-webkit-box-sizing: border-box;box-sizing: border-box;"> <a href="http://cultrahub.com/culture/asian/" style="display: block;text-decoration: none;"> <img src="http://cultrahub.com/wp-content/uploads/2018/06/culture2.jpg" alt=""/> <img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_asian.png" alt="" height="65" style="margin: -32px 0 -5px;"/> <span style="display: block;font-size: 14px;line-height: 26px;color: #414042;">Asian Cult.</span> </a> </p><p style="padding: 0 10px;margin:0;width: 25%;float: left;-webkit-box-sizing: border-box;box-sizing: border-box;"> <a href="http://cultrahub.com/culture/mexican/" style="display: block;text-decoration: none;"> <img src="http://cultrahub.com/wp-content/uploads/2018/06/culture3.jpg" alt=""/> <img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_mexican.png" alt="" height="65" style="margin: -32px 0 -5px;"/> <span style="display: block;font-size: 14px;line-height: 26px;color: #414042;">Mexican Cult.</span> </a> </p><p style="padding: 0 10px;margin:0;width: 25%;float: left;-webkit-box-sizing: border-box;box-sizing: border-box;"> <a href="http://cultrahub.com/culture/islamic/" style="display: block;text-decoration: none;"> <img src="http://cultrahub.com/wp-content/uploads/2018/06/culture4.jpg" alt=""/> <img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_islamic.png" alt="" height="65" style="margin: -32px 0 -5px;"/> <span style="display: block;font-size: 14px;line-height: 26px;color: #414042;">Islamic Cult.</span> </a> </p></div><p style="margin:0;padding: 28px 0 0;clear: both;"><a href="http://cultrahub.com" style="text-decoration: none;color: #fff;font-size: 12px;line-height:30px;font-weight: bold;background: #00a850;display: inline-block;padding: 0 20px;-webkit-border-radius: 4px;border-radius: 4px;">Explore More Cultures</a></p></td></tr><tr> <td style="padding: 52px 0 0;font-size: 12px;line-height: 18px;text-align: right;"> <p style="padding: 0;margin:0;float: right;width: 280px;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/pic2.png" alt=""/></p><p style="padding: 50px 0 0;margin:0;font-size: 21px;line-height: 28px;">The Best Cultural Spots & Events You Wouldn\'t Want to Miss</p><p style="padding: 15px 0 0;margin:0;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/color_dots.png" alt="" height="6"/></p><p style="padding: 18px 0 0;margin:0;">Get notified of the best cultural spots and the wildest<br>shows in town. Find and review local businesses, events, products and services in your local. Get involved and<br>make a difference.</p></td></tr><tr> <td style="padding: 10px 0 35px;"> <div style="margin: 0 -10px;"> <p style="padding: 0 10px;margin:0;width: 25%;float: left;-webkit-box-sizing: border-box;box-sizing: border-box;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/product1.jpg" alt=""/></p><p style="padding: 0 10px;margin:0;width: 25%;float: left;-webkit-box-sizing: border-box;box-sizing: border-box;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/product2.jpg" alt=""/></p><p style="padding: 0 10px;margin:0;width: 25%;float: left;-webkit-box-sizing: border-box;box-sizing: border-box;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/product3.jpg" alt=""/></p><p style="padding: 0 10px;margin:0;width: 25%;float: left;-webkit-box-sizing: border-box;box-sizing: border-box;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/product4.jpg" alt=""/></p></div></td></tr><tr> <td style="padding: 35px 0 0;border-top: 1px solid #d1d3d4;font-size: 12px;line-height: 18px;"> <div style="width: 320px;float: left;"> <p style="padding: 0;margin: 0;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/share_thoughts.png" alt=""></p><p style="padding: 15px 8px 0;margin: 0;"><strong>Join the Cultural revolution!</strong> We\'re giving away $100 worth of Cultrahub vouchers to 50 lucky contestants that can help us make Cultrahub one of the best e-commerce for our users.</p><p style="padding: 22px 8px 0;margin: 0;">Enter your thoughts, comments and suggestions by clicking the link below.</p><p style="margin:0;padding: 22px 0 0;"><a href="http://cultrahub.com/#share_thought" style="text-decoration: none;color: #fff;font-size: 12px;line-height:30px;font-weight: bold;background: #3a4893;display: inline-block;padding: 0 45px;-webkit-border-radius: 4px;border-radius: 4px;">Your Feedback</a></p></div><div style="width: 250px;float: right;margin: 0;height: 306px;overflow: hidden;"> <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: -6px auto;"> <tr> <td align="center" style="padding: 5px 0;border-right: 2px solid #fbfbfb;border-bottom: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/african-american/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_african_american.png" alt="African American Culture" height="52"/></a> </td><td align="center" style="padding: 5px 0;border-right: 2px solid #fbfbfb;border-bottom: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/african/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_african.png" alt="African Culture" height="52"/></a> </td><td align="center" style="padding: 5px 0;border-right: 2px solid #fbfbfb;border-bottom: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/american/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_american.png" alt="American Culture" height="52"/></a> </td><td align="center" style="padding: 5px 0;border-bottom: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/asian/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_asian.png" alt="Asian Culture" height="52"/></a> </td></tr><tr> <td align="center" style="padding: 5px 0;border-right: 2px solid #fbfbfb;border-bottom: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/business/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_business.png" alt="Business Culture" height="52"/></a> </td><td align="center" style="padding: 5px 0;border-right: 2px solid #fbfbfb;border-bottom: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/canadian/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_canadian.png" alt="Canadian Culture" height="52"/></a> </td><td align="center" style="padding: 5px 0;border-right: 2px solid #fbfbfb;border-bottom: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/christianity/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_christianity.png" alt="Christianity Culture" height="52"/></a> </td><td align="center" style="padding: 5px 0;border-bottom: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/great-britain/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_great_britain.png" alt="Great Britain Culture" height="52"/></a> </td></tr><tr> <td align="center" style="padding: 5px 0;border-right: 2px solid #fbfbfb;border-bottom: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/hip-hop/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_hiphop.png" alt="Hip-Hop Culture" height="52"/></a> </td><td align="center" style="padding: 5px 0;border-right: 2px solid #fbfbfb;border-bottom: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/indian/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_indian.png" alt="Indian Culture" height="52"/></a> </td><td align="center" style="padding: 5px 0;border-right: 2px solid #fbfbfb;border-bottom: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/islamic/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_islamic.png" alt="Islamic Culture" height="52"/></a> </td><td align="center" style="padding: 5px 0;border-bottom: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/island/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_island.png" alt="Island Culture" height="52"/></a> </td></tr><tr> <td align="center" style="padding: 5px 0;border-right: 2px solid #fbfbfb;border-bottom: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/judaism/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_judaism.png" alt="Judaism Culture" height="52"/></a> </td><td align="center" style="padding: 5px 0;border-right: 2px solid #fbfbfb;border-bottom: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/latin/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_latin.png" alt="Latin Culture" height="52"/></a> </td><td align="center" style="padding: 5px 0;border-right: 2px solid #fbfbfb;border-bottom: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/mexican/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_mexican.png" alt="Mexican Culture" height="52"/></a> </td><td align="center" style="padding: 5px 0;border-bottom: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/middle-eastern/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_middie_eastern.png" alt="Middie Eastern Culture" height="52"/></a> </td></tr><tr> <td align="center" style="padding: 5px 0;border-right: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/pop/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_pop.png" alt="Pop Culture" height="52"/></a> </td><td align="center" style="padding: 5px 0;border-right: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/pride/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_pride.png" alt="Pride Culture" height="52"/></a> </td><td align="center" style="padding: 5px 0;border-right: 2px solid #fbfbfb;"> <a href="http://cultrahub.com/culture/school/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_school.png" alt="School Culture" height="52"/></a> </td><td align="center" style="padding: 5px 0;"> <a href="http://cultrahub.com/culture/street/" style="text-decoration: none;display: inline-block;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/badge_street.png" alt="Street Culture" height="52"/></a> </td></tr></table> </div></td></tr></table> </td></tr><tr> <td style="padding: 40px 0 0;background: url(http://cultrahub.com/wp-content/uploads/2018/06/bg-initiator-emktg2.jpg) no-repeat bottom center;"> <table width="600" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;color: #414042;text-align: center;"> <tr> <td style="padding: 40px 0 30px;border-top: 1px solid #d1d3d4;"> <p style="margin:0;padding: 0 0 28px;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/color_dots.png" alt="" height="6"/></p><p style="margin:0;padding: 0 0 30px;font-size: 24px;line-height: 30px;font-weight: bold;">Our Social Media Channels</p><p style="margin:0;padding: 0;"> <a href="http://www.facebook.com" target="_blank" style="display: inline-block;vertical-align: top;margin-right: 5px;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/social_facebook.png" alt="Facebook" height="25"/></a> <a href="http://www.twitter.com" target="_blank" style="display: inline-block;vertical-align: top;margin-right: 5px;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/social_twitter.png" alt="Twitter" height="25"/></a> <a href="http://www.instagram.com" target="_blank" style="display: inline-block;vertical-align: top;margin-right: 5px;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/social_instagram.png" alt="Instagram" height="25"/></a> <a href="http://www.youtube.com" target="_blank" style="display: inline-block;vertical-align: top;margin-right: 5px;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/social_ytube.png" alt="You Tube" height="25"/></a> <a href="http://www.linkedin.com" target="_blank" style="display: inline-block;vertical-align: top;"><img src="http://cultrahub.com/wp-content/uploads/2018/06/social_linkedin.png" alt="Linkedin" height="25"/></a> </p></td></tr><tr> <td style="padding: 0 0 45px;"> <p style="margin:0;padding: 0 0 6px;font-size: 10px;line-height: 16px;">You are reciving this email because you subscribed at <a href="" style="color: inherit;text-decoration: none;">www.cultrahub.com</a>, To opt-out of receiving<br>future email, you may do so here.</p><p style="margin:0;padding: 0 0 6px;font-size: 10px;line-height: 16px;color: #1755ca;">350 Massachusetts Avenue, 3rd Floor, Indianapolis, IN - 46204.</p><p style="margin:0;padding: 0;font-size: 10px;line-height: 16px;">This email was sent from a notification-only address that cannot accept incoming emails.<br>Please do not reply to this message. If you have any questions or concerns, please contact us at <a href="mailto:support@cultrahub.com" style="text-decoration: none;color: #1755ca;">support@cultrahub.com</a></p></td></tr></table> </td></tr></table></div>';
			
	    	$headers[] = "Content-Type: text/html; charset=\"" . get_option('blog_charset') . "\"\n";
	    	$headers[] = 'From: ' . $from_name . ' <' . $from_email . ">\r\n";
	    	$attachments = $attachment_path;

	    	if ( $sefa_group_email === 'yes' ) {
	    		if ( wp_mail( $sefa_recipient_emails, $sefa_subject, $sefa_body, $headers, $attachments ) ) {
					$send_mail_message = '<div class="updated">' . __( 'Your email has been successfully sent!', 'sefa' ) . '</div>'; 
				} else {
					$send_mail_message = '<div class="error">' . __( 'There was an error sending the email.', 'sefa' ) . '</div>';
				}
		    } else {
		    	foreach( $recipients as $recipient ) {
		    		if ( wp_mail( $recipient, $sefa_subject, $sefa_body, $headers, $attachments ) ) {
						$send_mail_message .= '<div class="updated">' . __( 'Your email has been successfully sent to ', 'sefa' ) . esc_html($recipient) . '!</div>'; 
					} else {
						$send_mail_message .= '<div class="error">' . __( 'There was an error sending the email to ', 'sefa' ) . esc_html($recipient) . '</div>';
					}
		    	}
		    }

		    // delete the uploaded file (attachment) from the server
		    if ( $attachment_path ) {
		    	unlink($attachment_path);
		    }
	    }
	}	
	?>
	<div class="wrap" id="sefa-wrapper">
		<h1><?php _e( 'Send Email From Admin', 'sefa' ); ?></h1>
		<?php 
        if ( !empty($errors) ) {
            echo '<div class="error"><ul>';
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul></div>\n";
        }
        if ( $send_mail_message ) {
        	echo $send_mail_message;
        }
        ?>
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
				<div id="post-body-content">
					<form method="POST" id="sefa-form" enctype="multipart/form-data">
						<?php wp_nonce_field( 'sefa_send_email', 'sefa-form-nonce' ); ?>
						<table cellpadding="0" border="0" class="form-table">
							<tr>
								<th scope=”row”>From:</th>
								<td><input type="text" disabled value="<?php echo "$from_name &lt;$from_email&gt;"; ?>" required><div class="note"><?php _e( 'These can be changed in Settings->General.', 'sefa' ); ?></div></td>
							</tr>
							<tr>
								<th scope=”row”><label for="sefa-recipient-emails">To:</label></th>
								<td><input type="email" multiple id="sefa-recipient-emails" name="sefa_recipient_emails" value="<?php echo esc_attr( sefa_plugin_issetor($sefa_recipient_emails) ); ?>" required><div class="note"><?php _e( 'To send to multiple recipients, enter each email address separated by a comma or choose from the user list below.', 'sefa' ); ?></div>
								<select id="sefa-user-list">
									<option value="">-- <?php _e( 'user list', 'sefa' ); ?> --</option>
									<?php 
									$users = get_users( 'orderby=user_email' );
								    foreach ( $users as $user ) {
								    	if ( $user->first_name && $user->last_name ) {
								    		$user_fullname = ' (' . $user->first_name . ' ' . $user->last_name . ')';
								    	} else {
								    		$user_fullname = '';
								    	}
								    	echo '<option value="' . esc_html( $user->user_email ) . '">' . esc_html( $user->user_email ) . esc_html( $user_fullname) . '</option>';
								    };
									?>						
								</select>
								</td>
							</tr>
							<tr>
								<th scope=”row”></th>
								<td>
									<div class="sefa-radio-wrap">
									    <input type="radio" class="radio" name="sefa_group_email" value="no" id="no"<?php if ( isset($sefa_group_email) && $sefa_group_email === 'no' ) echo ' checked'; ?> required>
									    <label for="no"><?php _e( 'Send each recipient an individual email', 'sefa' ); ?></label>
									</div>
								    &nbsp;&nbsp;
								    <div class="sefa-radio-wrap">
								    <input type="radio" class="radio" name="sefa_group_email" value="yes" id="yes"<?php if ( isset($sefa_group_email) && $sefa_group_email === 'yes' ) echo ' checked'; ?> required>
								    <label for="yes"><?php _e( 'Send a group email to all recipients', 'sefa' ); ?></label>
									</div>
								</td>
							</tr>
							<tr>
								<th scope=”row”><label for="sefa-subject">Subject:</label></th>
								<td><input type="text" id="sefa-subject" name="sefa_subject" value="<?php echo esc_attr( sefa_plugin_issetor($sefa_subject) );?>" required></td>
							</tr>
							<!--<tr>
								<th scope=”row”><label for="sefa_body">Message:</label></th>
								<td align="left">
									<?php 
									$settings = array( "editor_height" => "200" );
									wp_editor( sefa_plugin_issetor($sefa_body), "sefa_body", $settings ); 
									?>
								</td>
							</tr>
							<tr>
								<th scope=”row”><label for="attachment">Attachment:</label></th>
								<td><input type="file" id="attachment" name="attachment"></td>
							</tr>-->
							<tr>
								<td colspan="2" align="right">
									<input type="submit" value="<?php _e( 'Send Email', 'sefa' ); ?>" name="submit" class="button button-primary">
								</td>
							</tr>				
						</table>
					</form>
				</div>
				<div id="postbox-container-1" class="postbox-container">
					<div class="postbox">
						<h3><span>Like this plugin?</span></h3>
						<div class="inside">
							<ul>
								<li><a href="https://wordpress.org/support/view/plugin-reviews/send-email-from-admin?filter=5" target="_blank">Rate it on WordPress.org</a></li>
								<li><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=8HHLL6WRX9Z68" target="_blank">Donate to the developer</a></li>
							</ul>
						</div> <!-- .inside -->
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
<?php
}

/**
 * Helper function for form values
 *
 * @since 0.9
 *
 * @param string $var Var name to test isset
 *
 * @return string $var value if isset or ''
 */
function sefa_plugin_issetor(&$var) {
    return isset($var) ? $var : '';
}