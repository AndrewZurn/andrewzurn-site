<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> and <header>
 *
 * @package smallblog
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header id="header" role="banner">

    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">

            <?php if ( function_exists( 'ods_add_brand' ) ) ods_add_brand(); ?>

            <a class="btn-search" href="#search-dialog" title="<?php _e( 'Search', 'smallblog' ); ?>"
               data-search-dialog="true">
                <span class="icon-search"></span>
                <span class="screen-reader-text"><?php _e( 'Search', 'smallblog' ); ?></span>
            </a>
            <?php
            $ods_menu = array(
                'theme_location' => 'primary',
                'menu'           => '',
                'container'      => false,
                'menu_class'     => 'nav navbar-nav',
                'menu_id'        => '',
                'echo'           => true,
                'fallback_cb'    => 'wp_page_menu',
                'before'         => '',
                'after'          => '',
                'link_before'    => '',
                'link_after'     => '',
                'items_wrap'     => '<ul id="%1$s" class="%2$s" >%3$s</ul>',
                'depth'          => 2,
                'walker'         => ''
            );

            if ( has_nav_menu( 'primary' ) ) :
                ?>
                <div id="menu" class="collapse navbar-collapse navbar-right">
                    <?php wp_nav_menu( $ods_menu ); ?>
                </div>
                <div class="btn-trigger">
                    <a href="#" class="trigger" data-off-canvas="true" data-off-canvas-id="#navigation"
                       title="<?php _e( 'Menu', 'smallblog' ); ?>">
                        <span class="ico"></span>
                        <span class="screen-reader-text"><?php _e( 'Menu', 'smallblog' ); ?></span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>


<?php if ( is_home() and get_header_image() ) : ?>
    <div id="banner" style="background-image: url(<?php header_image(); ?>);">
        <img src="<?php header_image(); ?>" alt="<?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?>"/>

        <?php if ( display_header_text() ) : ?>
            <div class="box-wrapper">
                <div class="box">
                    <h2><?php bloginfo( 'name' ); ?></h2>
                    <span class="sep"></span>

                    <h3><?php bloginfo( 'description' ); ?></h3>
                </div>
            </div>
            <div class="overlay"></div>
        <?php endif; ?>
    </div>
<?php endif; ?>

