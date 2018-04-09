<?php /* Header Meta */  ?>

<?php if(! is_page(30)){	//If not contact us page ?>

<section class="h1_section">
    <?php if ( is_archive() ) : ?>
    <h1>
    <?php
    if ( is_category() ) {
        single_cat_title( '', false );
    } elseif ( is_tag() ) {
        single_tag_title( '', false );
    } elseif ( is_author() ) {
        $curauth = get_queried_object();
        echo esc_html( $curauth->display_name );
    } elseif ( is_day() ) {
        echo esc_html( get_the_date() );
    } elseif ( is_month() ) {
        echo esc_html( get_the_date( 'F Y' ) );
    } elseif ( is_year() ) {
        echo esc_html( get_the_date( 'Y' ) );
    } else {
        esc_html_e( 'Archives', 'nora' );
    }
    ?>
    </h1>
    <?php elseif ( is_search() ) : ?>
        <h1><?php esc_html_e( 'Search', 'nora' ) ?>: '<?php the_search_query(); ?>'</h1>
    <?php elseif ( is_404() ) : ?>
        <h1><?php esc_html_e( 'Page Not Found', 'nora' ) ?></h1>
    <?php elseif ( is_single() ) :
        if ( $posts_page = get_post( get_option( 'page_for_posts' ) ) ) {
                echo '<h1>' . $posts_page->post_title . '</h1>';
                echo '<h2>' . $posts_page->post_excerpt . '</h2>';
        }
    ?>
    <?php else :
            if ( !empty( $_GET ) ) {
                if( !array_key_exists('token',$_GET) ){
    ?>
                    <h1><?php single_post_title(); ?></h1>
    <?php
                }
            }else{
                $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                if (strpos($url,'lost-password') !== false) {
                    echo '<h1>Forgot Password</h1>';
                }
                else{
    ?>
                    <h1><?php single_post_title(); ?></h1>
    <?php
                }
            }
            if ( ! is_archive() && !is_search() && !is_404() ) :
            $page_id = get_queried_object_id(); ?>
            <h2><?php echo get_post_field( 'post_excerpt', $page_id, 'display' ); ?></h2>
        <?php endif;?>
    <?php endif; ?>			
</section>
<?php } ?>
