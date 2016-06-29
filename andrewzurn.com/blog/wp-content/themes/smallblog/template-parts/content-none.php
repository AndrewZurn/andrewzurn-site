<?php
/**
 * The template used for displaying page content not found.
 *
 * @package smallblog
 */
?>

<div class="content-none">
    <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

        <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'smallblog' ), admin_url( 'post-new.php' ) ); ?></p>

    <?php elseif ( is_search() ) : ?>
        <p class="alert alert-warning">
            <?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'smallblog' ); ?>
        </p>
        <?php get_search_form(); ?>
    <?php else : ?>
        <p class="alert alert-warning">
            <?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'smallblog' ); ?>
        </p>
        <?php get_search_form(); ?>
    <?php endif; ?>
</div>

