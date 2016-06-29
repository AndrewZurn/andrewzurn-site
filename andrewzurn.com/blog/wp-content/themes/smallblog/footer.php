<?php
/**
 * The template for displaying the footer.
 *
 * @package smallblog
 */

$ods_footer = array(
    'logo_src'  => esc_url( get_theme_mod( 'ods_footer_img_src' ) ),
    'logo_alt'  => sprintf( __( 'Footer Logo: %s', 'smallblog' ), esc_attr( get_bloginfo( 'name' ) ) ),
    'text'      => esc_html( get_theme_mod( 'ods_footer_text', 'Per lor maledizione si non si perde, che non possa tornar, l`etterno amore, mentre che la speranza ha fior del verde.' ) ),
    'copyright' => esc_html( get_theme_mod( 'ods_copyright', __( 'Created by Monkey Themes', 'smallblog' ) ) ),
    'menu'      => array(
        'container'       => false,
        'menu_class'      => 'list-inline',
        'container_class' => 'footer-nav',
        'theme_location'  => 'secondary',
        'items_wrap'      => '<ul id="%1$s" class="%2$s" >%3$s</ul>',
        'depth'           => 1
    )
);
?>

<footer id="footer" role="contentinfo">
    <div class="f-top">
        <div class="container">
            <?php if ( $ods_footer[ 'logo_src' ] or $ods_footer[ 'text' ] ) : ?>
                <div class="footer-quote">
                    <?php if ( $ods_footer[ 'logo_src' ] ) : ?>
                        <figure>
                            <img src="<?php echo $ods_footer[ 'logo_src' ]; ?>"
                                 alt="<?php echo $ods_footer[ 'logo_alt' ]; ?>"/>
                        </figure>
                    <?php endif; ?>
                    <?php if ( $ods_footer[ 'text' ] ) : ?>
                        <div class="body">
                            <?php echo $ods_footer[ 'text' ]; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php get_template_part( 'template-parts/social-media' ); ?>
        </div>
    </div>

    <div class="f-bottom">
        <a href="#" class="anchor" title="<?php _e( 'To top', 'smallblog' ); ?>">
            <span class="icon-arrow-up"></span>
            <span class="screen-reader-text"><?php _e( 'To top', 'smallblog' ); ?></span>
        </a>

        <div class="container">
            <span class="copyright">
                <?php echo $ods_footer[ 'copyright' ]; ?>
                <?php
                if ( has_nav_menu( 'secondary' ) ) : ?>
                    <nav role="navigation">
                        <?php wp_nav_menu( $ods_footer[ 'menu' ] ); ?>
                    </nav>
                <?php endif; ?>
            </span>

        </div>
    </div>
</footer>

<?php get_template_part( 'template-parts/mobile', 'navigation' ); ?>
<?php get_template_part( 'template-parts/search-dialog' ); ?>

<?php wp_footer(); ?>
</body>
</html>