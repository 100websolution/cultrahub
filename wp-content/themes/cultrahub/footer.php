<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Cultrahub
 */
?>
<footer>
        <div class="container">
            <div class="logo">
                <a href="<?php echo site_url();?>"><img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt=""></a>
            </div>
            <ul class="fnav">
                <li><a href="#">Learn</a></li>
                <li><a href="#">Buy</a></li>
                <li><a href="#">Sell</a></li>
                <li><a href="#">About Cultrahub</a></li>
                <li><a href="#">Cultrahub Community</a></li>
                <li><a href="#">Help & Contact</a></li>
                <li><a href="#">Cultrahub Language</a></li>
            </ul>
            <div>
                <?php dynamic_sidebar( 'cultrahub-sidebar-footer-address' );?>
            </div>
            <div class="social">
                <?php echo add_social_links_icons();?>
            </div>
            <div class="app_block">
                <a href="#" target="_blank"><img src="<?php echo get_template_directory_uri();?>/images/apple_store.png" alt=""></a>
                <a href="#" target="_blank"><img src="<?php echo get_template_directory_uri();?>/images/google_play.png" alt=""></a>
            </div>
            <div class="copyright">
                <div class="fleft">
                    <ul class="borderbar_list clearfix">
	                    <li>Copyright &copy; <?php echo date( 'Y' );?> <a href="<?php echo site_url();?>">Cultrahub™</a></li>
	                    <li>Designed &amp; Developed by <a href="<?php echo site_url();?>">Cultrahub</a>.</li>
	                </ul>
                </div>
                <div class="float_right">
	                <ul class="borderbar_list clearfix">
	                    <li><a href="#">Privacy</a></li>
	                    <li><a href="#">Terms of Services</a></li>
	                    <li><a href="#">Support Center</a></li>
	                </ul>
	            </div>
	            <div class="clear"></div>
            </div>
        </div>
		<input type="hidden" id="websiteurl" value="<?php echo get_template_directory_uri();?>" />
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
