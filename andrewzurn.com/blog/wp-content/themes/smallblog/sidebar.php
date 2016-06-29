<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package smallblog
 */

if ( !is_active_sidebar( 'sidebar' ) ) return; ?>

<aside id="sidebar" class="col-sm-4" role="complementary">
    <h2 class="screen-reader-text"><?php _e( 'Sidebar', 'smallblog' ) ?></h2>
    <?php dynamic_sidebar( 'sidebar' ); ?>
</aside>



