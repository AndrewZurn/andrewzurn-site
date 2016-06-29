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

    <?php
    get_template_part( 'template-parts/content', 'infobar' );
    get_template_part( 'template-parts/content', 'thumbnail' );
    ?>

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
