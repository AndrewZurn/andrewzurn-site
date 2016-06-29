<?php
/**
 * The template used for navigation Off-Canvas.
 *
 * @package smallblog
 */
?>

<nav id="navigation" class="off-canvas" role="navigation" aria-label="<?php _e( 'Mobile Navigation', 'smallblog' ); ?>">
    <h2 class="off-canvas-headline">
        <?php _e( 'Navigation', 'smallblog' ); ?>
        <span class="icon-close"></span>
    </h2>
    <div class="off-canvas-body">
        <div class="off-canvas-content">
            <?php
            $ods_offcanvas_menu = array(
                'theme_location'  => 'primary',
                'menu'            => '',
                'container'       => false,
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => false,
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul id="%1$s" class="%2$s" >%3$s</ul>',
                'depth'           => 0,
                'walker'          => ''
            );

            if ( has_nav_menu( 'primary' ) ) wp_nav_menu( $ods_offcanvas_menu ); ?>
        </div>
    </div>
</nav>