<?php
/**
 * The template used for displaying information-bar.
 *
 * @package smallblog
 */

if ( 'post' == get_post_type() ) : ?>
    <div class="info-bar">
        <?php if ( get_the_author() ) : ?>
            <span class="author">
                <a class="author-link"
                   href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                    <?php printf( __( 'by %s ', 'smallblog' ), get_the_author() ); ?>
                </a>
            </span>
        <?php endif; ?>
        <?php if ( get_the_date() ) : ?>
            <span class="date">
                <span class="icon-date"></span> <?php echo get_the_date( 'd. F Y' ); ?>
            </span>
        <?php endif; ?>

        <span class="categories">
                <span class="icon-categories"></span>
            <?php the_category( ', ' ); ?>
            </span>

            <span class="comments">
                <?php comments_number( '<span class="icon-comment"></span> 0', '<span class="icon-comment"></span> 1', '<span class="icon-comment"></span> %' ); ?>
            </span>
    </div>
<?php endif; ?>