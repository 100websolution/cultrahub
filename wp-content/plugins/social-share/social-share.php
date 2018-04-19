<?php
/*
Plugin Name: Social Share
Plugin URI: http://www.techtimes-in.com
Description: Displays Social Share icons below every post
Version: 1.0
Author: Sanjay
*/

function social_share_menu_item(){
  add_submenu_page("options-general.php", "Social Share", "Social Share", "manage_options", "social-share", "social_share_page"); 
}
add_action("admin_menu", "social_share_menu_item");

function social_share_page(){
?>
	<div class="wrap">
		<h1>Social Sharing Options</h1>
		<form method="post" action="options.php">
		<?php
		   settings_fields("social_share_config_section");
		   do_settings_sections("social-share");			
		   submit_button(); 
		?>
		</form>
  </div>
<?php
}

function social_share_settings(){
    add_settings_section("social_share_config_section", "", null, "social-share");
 
    add_settings_field("social-share-facebook", "Do you want to display Facebook link?", "social_share_facebook_checkbox", "social-share", "social_share_config_section");
    add_settings_field("social-share-twitter", "Do you want to display Twitter link?", "social_share_twitter_checkbox", "social-share", "social_share_config_section");
	add_settings_field("social-share-gplus", "Do you want to display Gplus link?", "social_share_gplus_checkbox", "social-share", "social_share_config_section");
	add_settings_field("social-share-youtube", "Do you want to display YouTube link?", "social_share_youtube_checkbox", "social-share", "social_share_config_section");
    add_settings_field("social-share-linkedin", "Do you want to display LinkedIn link?", "social_share_linkedin_checkbox", "social-share", "social_share_config_section");
	add_settings_field("social-share-instagram", "Do you want to display Instagram link?", "social_share_instagram_checkbox", "social-share", "social_share_config_section");
 
    register_setting("social_share_config_section", "social-share-facebook");
    register_setting("social_share_config_section", "social-share-twitter");
	register_setting("social_share_config_section", "social-share-gplus");
	register_setting("social_share_config_section", "social-share-youtube");
    register_setting("social_share_config_section", "social-share-linkedin");
    register_setting("social_share_config_section", "social-share-instagram");
}
 
function social_share_facebook_checkbox(){  
?>
    <input type="checkbox" name="social-share-facebook" value="1" <?php checked(1, get_option('social-share-facebook'), true); ?> /> Yes
<?php
}
function social_share_twitter_checkbox(){  
?>
	<input type="checkbox" name="social-share-twitter" value="1" <?php checked(1, get_option('social-share-twitter'), true); ?> /> Yes
<?php
}
function social_share_gplus_checkbox(){  
?>
	<input type="checkbox" name="social-share-gplus" value="1" <?php checked(1, get_option('social-share-gplus'), true); ?> /> Yes
<?php
}
function social_share_youtube_checkbox(){  
?>
	<input type="checkbox" name="social-share-youtube" value="1" <?php checked(1, get_option('social-share-youtube'), true); ?> /> Yes
<?php
} 
function social_share_linkedin_checkbox(){  
?>
	<input type="checkbox" name="social-share-linkedin" value="1" <?php checked(1, get_option('social-share-linkedin'), true); ?> /> Yes
<?php
}
function social_share_instagram_checkbox(){  
?>
	<input type="checkbox" name="social-share-instagram" value="1" <?php checked(1, get_option('social-share-instagram'), true); ?> /> Yes
<?php
}
add_action("admin_init", "social_share_settings");