<?php
/**
 * The template for displaying tag pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package smallblog
 */

get_header(); ?>

<div id="section" class="container">
    <div class="header-page">
        <h1 class="the-headline">
            <?php printf( __( 'Tag Archives: %s', 'smallblog' ), single_tag_title( '', false ) ); ?>
        </h1>
        <?php if ( tag_description() ) : ?>
            <div class="description"><?php echo tag_description(); ?></div>
        <?php endif; ?>
    </div>
    <?php get_template_part( 'template-parts/layout', 'list' ); ?>
</div>

<?php get_footer(); ?>


