<?php
/**
 * @package smallblog
 */
?>

<?php if ( is_single() or is_page() ) : ?>
    <header>
        <h1 class="the-title" role="heading">
            <?php the_title(); ?>
        </h1>
    </header>
<?php else: ?>
    <h2 class="the-title">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>
<?php endif; ?>