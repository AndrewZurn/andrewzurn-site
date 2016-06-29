<?php
/**
 * The template used for displaying the thumbnail on the page and list.
 *
 * @package smallblog
 */

if ( has_post_thumbnail() ) :

    $ods_thumbnail = array(
        'class' => 'img-responsive',
        'alt'   => get_the_title()
    );

    ?>
    <figure>
        <?php if ( is_single() or is_page() ) : ?>
            <?php the_post_thumbnail( 'large', $ods_thumbnail ); ?>
        <?php else: ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <span class="icon-link"></span>
                <?php the_post_thumbnail( 'large', $ods_thumbnail ); ?>
            </a>
        <?php endif; ?>
    </figure>
<?php endif; ?>