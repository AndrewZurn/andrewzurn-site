<?php

/**
 * Header image on the Homepage.
 *
 */
add_action( 'init', 'ods_custom_header' );
function ods_custom_header()
{
    $ods_defaults = array(
        'default-image'          => '',
        'width'                  => 1920,
        'height'                 => 620,
        'flex-height'            => true,
        'flex-width'             => true,
        'uploads'                => true,
        'random-default'         => false,
        'header-text'            => true,
        'default-text-color'     => '000',
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    );

    add_theme_support( 'custom-header', $ods_defaults );
}





