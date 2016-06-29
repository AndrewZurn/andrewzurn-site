<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package smallblog
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments">
    <?php if ( have_comments() ) : ?>
        <div class="comments-area">
            <h2 class="the-subtitle">
                <?php
                $comments_number = get_comments_number();
                if ( 1 === $comments_number ) {
                    /* translators: %s: post title */
                    printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'smallblog' ), get_the_title() );
                } else {
                    printf(
                    /* translators: 1: number of comments, 2: post title */
                        _nx(
                            '<span class="number">%1$s</span> thought on &ldquo;%2$s&rdquo;',
                            '<span class="number">%1$s</span> thoughts on &ldquo;%2$s&rdquo;',
                            $comments_number,
                            'comments title',
                            'smallblog'
                        ),
                        number_format_i18n( $comments_number ),
                        get_the_title()
                    );
                }
                ?>
            </h2>

            <ul class="comment-list">
                <?php wp_list_comments( 'type=comment&callback=ods_comment' ); ?>
            </ul>
        </div>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="the-subtitle"><?php _e( 'Comment navigation', 'smallblog' ); ?></h2>

                <div
                    class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'smallblog' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'smallblog' ) ); ?></div>
            </nav>
        <?php endif; ?>

        <?php if ( !comments_open() ) : ?>
            <p class="no-comments"><?php _e( 'Comments are closed.', 'smallblog' ); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php comment_form(); ?>

</div>
