<?php
/**
 * The template for displaying search results pages.
 *
 * @package smallblog
 */

get_header(); ?>

<div id="section" class="container">
    <div class="header-page">
        <h1 class="the-headline">
            <?php printf( __( 'Search Results for: %s', 'smallblog' ), get_search_query() ); ?>
        </h1>
    </div>
    <?php get_template_part( 'template-parts/layout', 'list' ); ?>
</div>

<?php get_footer(); ?>
