<?php
/**
 * The template used for displaying page content in single.php
 *
 * @package smallblog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( is_single() ) : ?>
        <h1 class="the-title">
            <?php the_title(); ?>
        </h1>
    <?php else: ?>
        <h2 class="the-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
    <?php endif; ?>

    <?php get_template_part( 'template-parts/content', 'infobar' ); ?>

    <?php if ( shortcode_exists( 'audio' ) ) : ?>
        <div class="the-shortcode">
            <?php ods_shortcode( 'playlist' ) ?>
            <?php ods_shortcode( 'audio' ) ?>
        </div>
    <?php endif; ?>

    <?php if ( is_single() ) : ?>
        <div class="the-content">
            <?php the_content(); ?>
        </div>

        <?php the_tags( '<div class="the-tags"><h4>' . __( 'Tags:', 'smallblog' ) . '</h4>', ', ', '</div>' ); ?>
    <?php else: ?>
        <div class="the-content">
            <?php echo wp_filter_nohtml_kses( get_the_excerpt() ); ?>
        </div>
    <?php endif; ?>

    <hr class="separator"/>

</article>
