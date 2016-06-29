<?php
function ods_comment( $comment, $args, $depth )
{
    global $counter;
    $counter++;
    $GLOBALS[ 'comment' ] = $comment;
    extract( $args, EXTR_SKIP );

    if ( 'div' == $args[ 'style' ] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args[ 'has_children' ] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args[ 'style' ] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
<?php endif; ?>
    <figure class="comment-figure">
        <?php if ( $args[ 'avatar_size' ] != 0 ) echo get_avatar( $comment, 70 ); ?>
        <span class="comment-number"><?php echo $counter; ?></span>
    </figure>
    <div class="comment-info">
        <?php printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?>
        <?php printf( __( 'on %1$s', 'smallblog' ), get_comment_date() ); ?>
        <span class="comment-links">
        <?php edit_comment_link( __( '(Edit)', 'smallblog' ), '  ', '' ); ?>
        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args[ 'max_depth' ] ) ) ); ?>
        </span>
    </div>

    <?php if ( $comment->comment_approved == '0' ) : ?>
    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'smallblog' ); ?></em>
    <br/>
<?php endif; ?>
    <?php comment_text(); ?>
    <?php if ( 'div' != $args[ 'style' ] ) : ?>
    </div>
<?php endif; ?>

<?php
}

?>