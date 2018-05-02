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
	<div class="border_line">
		<span class="b_yellow"></span>
		<span class="b_red"></span>
		<span class="b_blue"></span>
		<span class="b_green"></span>
	</div>
	
	<div class="container">
		<div class="logo">
			<a href="<?php echo site_url();?>"><img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt=""></a>
		</div>
		<?php wp_nav_menu( array( 'menu' => 'footer-menu', 'menu_class'=>'fnav') ); ?>
		<div class="social">
			<?php echo add_social_links_icons();?>
		</div>
		<div class="app_block">
			<a href="#" target="_blank"><img src="<?php echo get_template_directory_uri();?>/images/apple_store.png" alt=""></a>
            <a href="#" target="_blank"><img src="<?php echo get_template_directory_uri();?>/images/google_play.png" alt=""></a>
		</div>
		<div class="copyright">
			<div class="align_center">
				<ul class="borderbar_list clearfix">
					<li>Copyright &copy; <?php echo date( 'Y' );?> <a href="<?php echo site_url();?>">Cultrahub™</a></li>
                    <li>Designed &amp; Developed by <a href="<?php echo site_url();?>">Cultrahub</a>.</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<input type="hidden" id="websiteurl" value="<?php echo get_template_directory_uri();?>" />
</footer>

<?php include( locate_template( 'signup-form.php' ) ); ?>

    <?php wp_footer(); ?>
</body>
</html>
