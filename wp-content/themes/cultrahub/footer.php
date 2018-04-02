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
			<div class="color_dots mt15">
				<span class="yellow"></span>
				<span class="red"></span>
				<span class="blue"></span>
				<span class="green"></span>
			</div>
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
</footer>
    <?php wp_footer(); ?>
</body>
</html>
