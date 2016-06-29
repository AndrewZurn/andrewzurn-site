<?php
/**
 * The template used for displaying page content in single.php
 *
 * @package smallblog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
    get_template_part( 'template-parts/content', 'heading' );
    get_template_part( 'template-parts/content', 'infobar' );
    ?>

    <?php if ( shortcode_exists( 'video' ) ) : ?>
        <?php
        $ods_first_embed_media = ods_get_first_embed_media( get_the_ID() );
        if ( $ods_first_embed_media ): ?>
            <div class="the-video-shortcode">
                <div class="embed-responsive embed-responsive-16by9">
                    <?php echo $ods_first_embed_media; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="the-video-shortcode">
                <?php ods_shortcode( 'video' ); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="the-content">
        <?php if ( is_single() ) : ?>
            <?php the_content(); ?>
        <?php else: ?>
            <?php echo wp_filter_nohtml_kses( get_the_excerpt() ); ?>
        <?php endif; ?>
    </div>

    <?php if ( is_single() ) : ?>
        <?php the_tags( '<div class="the-tags"><h4>' . __( 'Tags:', 'smallblog' ) . '</h4>', ', ', '</div>' ); ?>
    <?php endif; ?>

    <hr class="separator"/>
</article>
