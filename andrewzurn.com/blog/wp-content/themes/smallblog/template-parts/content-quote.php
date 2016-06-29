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

    <?php if ( has_post_thumbnail() ) : ?>
        <figure>
            <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
            <figcaption>
                <div class="fig-table">
                    <div class="fig-quote">
                        <?php echo wp_filter_nohtml_kses( get_the_content() ); ?>
                    </div>
                </div>
            </figcaption>
        </figure>
    <?php else: ?>
        <div class="the-content">
            <blockquote>
                <span class="icon-quote-left"></span>
                <?php echo wp_filter_nohtml_kses( get_the_content() ); ?>
            </blockquote>
        </div>
    <?php endif; ?>

    <?php if ( is_single() ) : ?>
        <?php the_tags( '<div class="the-tags"><h4>' . __( 'Tags:', 'smallblog' ) . '</h4>', ', ', '</div>' ); ?>
    <?php endif; ?>

    <hr class="separator"/>
</article>
