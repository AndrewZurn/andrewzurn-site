<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package smallblog
 */
get_header(); ?>

<div id="section" class="container">
    <div class="header-page">
        <h1 class="the-headline">
            <?php
            if ( is_day() ) :
                printf( __( 'Daily Archives: %s', 'smallblog' ), get_the_date() );

            elseif ( is_month() ) :
                printf( __( 'Monthly Archives: %s', 'smallblog' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'smallblog' ) ) );

            elseif ( is_year() ) :
                printf( __( 'Yearly Archives: %s', 'smallblog' ), get_the_date( _x( 'Y', 'yearly archives date format', 'smallblog' ) ) );

            else :
                _e( 'Archives', 'smallblog' );
            endif;
            ?>
        </h1>
    </div>
    <?php get_template_part( 'template-parts/layout', 'list' ); ?>
</div>

<?php get_footer(); ?>


