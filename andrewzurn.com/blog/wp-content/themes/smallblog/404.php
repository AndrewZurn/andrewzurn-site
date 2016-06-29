<?php get_header(); ?>

<div id="section" class="container">
    <h1 class="the-headline">
        <?php _e( 'Nothing Found', 'smallblog' ); ?>
    </h1>
    <main id="page" role="main">
        <?php get_template_part( 'template-parts/content', 'none' ); ?>
    </main>
</div>

<?php get_footer(); ?>





