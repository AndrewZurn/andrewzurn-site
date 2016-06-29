<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package smallblog
 */

get_header(); ?>

<div id="section" class="container">
    <div class="row">
        <main id="page" class="col-sm-8" role="main">
            <?php

            if ( have_posts() ):

                // Start the loop.
                while ( have_posts() ) : the_post();

                    // Include the page content template.
                    get_template_part( 'template-parts/content', 'page' );

                    wp_link_pages();

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }

                    // End of the loop.
                endwhile;

            else:
                get_template_part( 'template-parts/content', 'none' );
            endif;

            ?>
        </main>
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>





