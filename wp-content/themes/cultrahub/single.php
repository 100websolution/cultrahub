<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Nora
 * @since Nora 1.0
 */
get_header();

get_template_part( 'header', 'meta' ); ?>

	<div class="wrap clearfix">

		<main id="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
				global $post; ?>
				<!-- Article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

					<?php
						$format = get_post_format();
						get_template_part( 'content', $format );
					?>

				</article>

				<hr>

				<!-- Author -->
				<section class="author-bio clearfix" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
					<?php echo get_avatar( get_the_author_meta( 'email' ), '90', get_the_author() ); ?>
					<h1 class="author-name" itemprop="name">
						<?php the_author_posts_link(); ?>
					</h1>
					<p class="author-description" itemprop="description">
						<?php the_author_meta( 'description' ); ?>
					</p>
				</section>

				<hr>

				<!-- Comments -->
				<?php comments_template(); ?>

			<?php endwhile; ?>

			<?php else : ?>

				<!-- Article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">
						<h1><?php esc_html_e( 'Sorry, nothing to display', 'nora' ); ?></h1>
					</header>

				</article>

			<?php endif; ?>
		
		</main>

		<!--Sidebar-->
		<?php get_sidebar(); ?>

	</div>
			
<?php get_footer();
