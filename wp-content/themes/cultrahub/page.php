<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Nora
 * @since Nora 1.0
 */

//session_start();
get_header();
/*if ( !empty( $SESSION['msg'] ) && $SESSION['msg'] == 'cus_reg_suc' ) {
	echo '<p>Congratulations, your customer’s registration has been successful.</p><p>You can order your meals online straightway – there is no waiting time.</p>';
}*/

$tag_line = get_post_meta($post->ID, "tag_line", true);
$background_color = get_post_meta($post->ID, "page_color_picker", true);
$image = get_field('page_image');
?>
	<div class="main-container <?php if ( is_cart() ) { echo 'yourmals-cart'; } if ( is_checkout() ) { echo 'yourmals-checkout'; } ?>">
	<?php if ( is_page( 'my-account' ) || is_cart() || is_checkout() ) { ?>
			<div class="container">
			<div class="alto_container">
	<?php } ?>
<?php
if(! is_page(30) && ! is_page(168)){	//If not contact us & living with poorest page
	
	get_template_part( 'header', 'meta' ); ?>

		<?php if ( has_post_thumbnail() ) : ?>

			<?php $content_width = 980; ?>

			<div class="entry-image">
				<?php the_post_thumbnail( 'nora-l' ); ?>
			</div>

		<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<!-- Article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

					<div class="entry-content" itemprop="text">
						<?php the_content(); ?>
					</div>
					
					<?php  // If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					wp_link_pages( array( 'before' => '<nav class="pagination">', 'after' => '</nav>' ) ); ?>

				</article>

			<?php endwhile; ?>

		<?php
			//echo '<p>Please browse your email box for further details.</p>';
		?>
		<!--Sidebar-->

	<?php if($image['url'] != ''){ ?>
	<section class="text-center">
             <img src="<?php echo $image['url'];?>" alt="">
        </section>
	<?php } ?>

<?php
}	//If not contact us & living with poorest page
else if(is_page(168)){
?>
	<div class="container">
            <div class="alto_container">
                <section class="e_common_page">
                    <div class="link">
                        <span><a href="">Click Here</a></span> to go back to Admin Desk
                    </div>
                    <h1 class="e_common_page_h1">Living with the poorest of poor</h1>
                </section>
                <?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
		<?php if($image['url'] != ''){ ?>
			<div class="row text-center"><img src="<?php echo $image['url'];?>" alt=""></div>
		<?php } ?>
            </div>
        </div>	
<?php
}
else{
?>
	<section class="headoffc_section">
		<div class="container">
                 	<div class="alto_container">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			<?php if($image['url'] != ''){ ?>
				<div class="row text-center"><img src="<?php echo $image['url'];?>" alt=""></div>
			<?php } ?>
			</div>
		</div>
	</section>        
<?php	
}

if($tag_line != ''){
?>
	<section class="contact_thx" style="background-color:<?php echo $background_color;?>;">
             <p><?php echo $tag_line;?></p>
        </section>
<?php
}
?>
<?php if ( is_page( 'my-account' ) || is_cart() || is_checkout() ) { ?>
			</div>
			</div>
	<?php } ?>
</div>
	<?php //get_sidebar(); ?>

<?php get_footer(); ?>
