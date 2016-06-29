<?php
/**
 * The template for displaying author pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package smallblog
 */

get_header(); ?>

<div id="section" class="container">
    <div class="header-page">
        <h1 class="the-headline">
            <?php the_post();
            printf( __( 'View all posts by %s', 'smallblog' ), get_the_author() );
            ?>
        </h1>
        <?php if ( get_the_author_meta( 'description' ) ) : ?>
            <div class="description"><?php the_author_meta( 'description' ); ?></div>
        <?php endif; ?>
    </div>
    <?php get_template_part( 'template-parts/layout', 'list' ); ?>
</div>

<?php get_footer(); ?>
