<?php
/**
 * The template for displaying categories pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package smallblog
 */

get_header(); ?>

<div id="section" class="container">
    <div class="header-page">
        <h1 class="the-headline"><?php printf( __( 'Category: %s', 'smallblog' ), single_cat_title( '', false ) ); ?></h1>
        <?php
        $ods_term_description = term_description();
        if ( !empty( $ods_term_description ) ) :
            printf( '<div class="description">%s</div>', $ods_term_description );
        endif;
        ?>
    </div>
    <?php get_template_part( 'template-parts/layout', 'list' ); ?>
</div>

<?php get_footer(); ?>
