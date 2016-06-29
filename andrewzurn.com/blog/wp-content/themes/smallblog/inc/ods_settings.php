<?php

/**
 * Small blog setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Smallblog 1.0
 */

if ( !isset( $content_width ) ) $content_width = 1200;

if ( !function_exists( 'ods_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function ods_setup()
    {

        /**
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on cosimo, use a find and replace
         * to change 'smallblog' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'smallblog', get_template_directory() . '/languages' );


        /**
         * Add default posts and comments RSS feed links to head.
         */
        add_theme_support( 'automatic-feed-links' );


        /**
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );


        /**
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );


        /**
         * Register custom background.
         */
        add_theme_support( 'custom-background' );


        /**
         * This theme uses wp_nav_menu() in two location.
         */
        add_action( 'init', 'ods_register_menus' );
        function ods_register_menus()
        {
            register_nav_menus(
                array(
                    'primary'   => __( 'Header Menu', 'smallblog' ),
                    'secondary' => __( 'Footer Menu', 'smallblog' )
                )
            );
        }


        /**
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ) );


        /**
         * Enable support for Post Formats.
         */
        add_theme_support( 'post-formats', array(
            'video',
            'image',
            'gallery',
            'audio',
            'quote'
        ) );


        /**
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style( array( 'css/editor-style.min.css', ods_add_editor_font() ) );

    }
endif;
add_action( 'after_setup_theme', 'ods_setup' );


/**
 * Enqueue scripts and styles.
 *
 */
add_action( 'wp_enqueue_scripts', 'ods_scripts' );
function ods_scripts()
{

    /**
     * Add Roboto and Roboto Condensed font, used in the main stylesheet.
     */
    $ods_protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style( 'font-roboto', $ods_protocol . '://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,100,100italic', array(), null );


    /**
     * Load our main stylesheet.
     */
    wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.min.css' );


    /**
     * Load our main javascript.
     */
    wp_enqueue_script( 'json2' );
    wp_enqueue_script( 'jquery' );
    if ( is_single() ) wp_enqueue_script( 'validate', get_template_directory_uri() . '/js/lib/jquery.validate.min.js' );
    wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.js' );


    /**
     * Load script for the comments.
     */
    if ( is_singular() && comments_open() ) wp_enqueue_script( "comment-reply" );


    /**
     * Load our main localize script file.
     */
    include_once( 'ods_localize_script.php' );

}


/**
 * Create the excerpt shortcode
 *
 * @param $ods_shortcode
 */
function ods_shortcode( $ods_shortcode )
{

    if ( shortcode_exists( $ods_shortcode ) ) {
        $pattern = get_shortcode_regex();
        preg_match( '/' . $pattern . '/s', get_the_content(), $matches );

        if ( !empty( $matches ) ) {
            if ( is_array( $matches ) && $matches[ 2 ] == $ods_shortcode ) {
                $shortcode = $matches[ 0 ];
                echo do_shortcode( $shortcode );
            }
        }

    }

}


/**
 * @param null $content
 * @return mixed|null
 */
add_filter( 'the_content', 'ods_remove_first_shortcode' );
function ods_remove_first_shortcode( $content = null )
{
    global $post;

    $terms = array( 'audio', 'gallery', 'video', 'playlist' );

    if ( is_single() && is_main_query() && $post->post_type == 'post' && has_post_format( $terms, $post->ID ) ) {
        $pattern = get_shortcode_regex();
        preg_match( '/' . $pattern . '/s', $content, $matches );
        if ( isset( $matches[ 2 ] ) && is_array( $matches ) && in_array( $matches[ 2 ], $terms ) ) {
            $content = str_replace( $matches[ '0' ], '', $content );
        }
    }
    return $content;

}


/**
 * @param $post_id
 * @return bool
 */
function ods_get_first_embed_media( $post_id )
{
    $post = get_post( $post_id );
    $content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
    $embeds = get_media_embedded_in_content( $content, array( 'object', 'embed', 'iframe' ) );

    if ( !empty( $embeds ) ) {
        return $embeds[ 0 ];
    } else {
        return false;
    }
}


/**
 * Styled MORE excerpt
 *
 */
add_filter( 'excerpt_more', 'ods_new_excerpt_more' );
function ods_new_excerpt_more( $more )
{
    return ' ...';
}


/**
 * Pagination for archive, taxonomy, category, tag and search results pages
 *
 */
function ods_pagination()
{
    global $wp_query;
    $big = 999999999; // This needs to be an unlikely integer
    $pages = paginate_links( array(
        'base'      => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'current'   => max( 1, get_query_var( 'paged' ) ),
        'total'     => $wp_query->max_num_pages,
        'mid_size'  => 5,
        'prev_text' => '<span class="screen-reader-text">' . __( 'Previous', 'smallblog' ) . '</span><span class="icon-arrow-left"></span>',
        'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'smallblog' ) . '</span><span class="icon-arrow-right"></span>',
        'type'      => 'array'
    ) );

    if ( is_array( $pages ) ) {
        $paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
        echo '<ul class="pagination">';
        foreach ( $pages as $page ) {
            echo '<li>' . $page . '</li>';
        }
        echo '</ul>';
    }
}


/**
 * Add editor font.
 *
 */
function ods_add_editor_font()
{

    return str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,300,400|Roboto:500,400italic,300,500italic,300italic,400' );

}


/**
 * Added a brand.
 *
 * @param string $ods_logo_src
 * @return string
 */
function ods_add_brand( $ods_img_src = 'ods_logo_src' )
{

    $ods_brand = array(
        'img_src'    => esc_url( get_theme_mod( $ods_img_src ) ),
        'link'       => esc_url( home_url( '/' ) ),
        'title'      => esc_attr( get_bloginfo( 'name', 'display' ) ),
        'name'       => get_bloginfo( 'name', 'display' ),
        'class'      => esc_url( get_theme_mod( $ods_img_src ) ) ? 'logo' : 'navbar-brand',
        'tag_before' => is_home() ? '<h1 class="entry-title">' : '<div class="entry-title">',
        'tag_after'  => is_home() ? '</h1>' : '</div>',
        'color'      => '#' . get_header_textcolor()
    );

    $tpl = $ods_brand[ 'tag_before' ];

    if ( empty( $ods_brand[ 'img_src' ] ) ):
        $tpl .= '<a class="' . $ods_brand[ 'class' ] . '" href="' . $ods_brand[ 'link' ] . '" title="' . $ods_brand[ 'title' ] . '"  style="color:' . $ods_brand[ 'color' ] . ';" >';
        $tpl .= $ods_brand[ 'name' ];
        $tpl .= '</a>';
    else:
        $tpl .= '<figure style="background-image: url(' . $ods_brand[ 'img_src' ] . ');">';
        $tpl .= '<a class="' . $ods_brand[ 'class' ] . '" href="' . $ods_brand[ 'link' ] . '" title="' . $ods_brand[ 'title' ] . '" >';
        $tpl .= '<img class="img-responsive" src="' . $ods_brand[ 'img_src' ] . '" alt="' . $ods_brand[ 'title' ] . '"/></figure>';
        $tpl .= '</a>';
        $tpl .= '</figure>';
    endif;
    $tpl .= $ods_brand[ 'tag_after' ];

    echo $tpl;

}
