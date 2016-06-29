<?php

/**
 * Register theme support Panel.
 * @param $wp_customize
 */
add_action( 'customize_register', 'ods_register_panel' );
function ods_register_panel( $wp_customize )
{
    $wp_customize->add_panel( 'panel_theme', array(
        'priority'       => 155,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Theme options', 'smallblog' ),
        'description'    => ''
    ) );
}


/**
 * Register theme support sections.
 * @param $wp_customize
 */
add_action( 'customize_register', 'ods_register_sections' );
function ods_register_sections( $wp_customize )
{
    $wp_customize->add_section( 'ods_logo', array(
        'title'    => __( 'Logo', 'smallblog' ),
        'priority' => 10,
        'panel'    => 'panel_theme'
    ) );

    $wp_customize->add_section( 'ods_social', array(
        'title'       => __( 'Social Media (Links)', 'smallblog' ),
        'description' => __( 'Enter your social media links here. If the field is empty the button on footer will not be visible.', 'smallblog' ),
        'priority'    => 20,
        'panel'       => 'panel_theme'
    ) );

    $wp_customize->add_section( 'ods_copyright', array(
        'title'    => __( 'Copyright', 'smallblog' ),
        'priority' => 40,
        'panel'    => 'panel_theme'
    ) );

    $wp_customize->add_section( 'ods_footer', array(
        'title'       => 'Footer',
        'priority'    => 50,
        'description' => '',
        'panel'       => 'panel_theme'
    ) );

}


/**
 *
 * @param $wp_customize
 */
add_action( 'customize_register', 'ods_register_settings' );
function ods_register_settings( $wp_customize )
{
    $wp_customize->add_setting( 'ods_logo_src', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod'
    ) );

    $wp_customize->add_setting( 'ods_facebook_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
    ) );

    $wp_customize->add_setting( 'ods_twitter_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod'
    ) );

    $wp_customize->add_setting( 'ods_xing_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod'
    ) );

    $wp_customize->add_setting( 'ods_youtube_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod'
    ) );

    $wp_customize->add_setting( 'ods_googleplus_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod'
    ) );

    $wp_customize->add_setting( 'ods_instagram_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod'
    ) );

    $wp_customize->add_setting( 'ods_path_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod'
    ) );

    $wp_customize->add_setting( 'ods_pinterest_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod'
    ) );

    $wp_customize->add_setting( 'ods_linkedin_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod'
    ) );

    $wp_customize->add_setting( 'ods_copyright', array(
        'default'           => __( 'Created by Monkey Themes', 'smallblog' ),
        'sanitize_callback' => 'esc_textarea',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod'
    ) );

    $wp_customize->add_setting( 'ods_footer_img_src', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod'
    ) );

    $wp_customize->add_setting( 'ods_footer_text', array(
        'default'           => 'Per lor maledizione si non si perde, che non possa tornar, l`etterno amore, mentre che la speranza ha fior del verde.',
        'sanitize_callback' => 'esc_textarea',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod'
    ) );

}


/**
 * Register Controls
 * @param $wp_customize
 */
add_action( 'customize_register', 'ods_register_controls' );
function ods_register_controls( $wp_customize )
{

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'src_logo', array(
        'section'  => 'ods_logo',
        'settings' => 'ods_logo_src'
    ) ) );

    $wp_customize->add_control( 'ods_fb', array(
        'label'    => 'Facebook',
        'section'  => 'ods_social',
        'settings' => 'ods_facebook_url'
    ) );

    $wp_customize->add_control( 'ods_twitter', array(
        'label'    => 'Twitter',
        'section'  => 'ods_social',
        'settings' => 'ods_twitter_url'
    ) );

    $wp_customize->add_control( 'ods_xing', array(
        'label'    => 'Xing',
        'section'  => 'ods_social',
        'settings' => 'ods_xing_url'
    ) );

    $wp_customize->add_control( 'ods_youtube', array(
        'label'    => 'Youtube',
        'section'  => 'ods_social',
        'settings' => 'ods_youtube_url'
    ) );

    $wp_customize->add_control( 'ods_googleplus', array(
        'label'    => 'Google Plus',
        'section'  => 'ods_social',
        'settings' => 'ods_googleplus_url'
    ) );

    $wp_customize->add_control( 'ods_instagram', array(
        'label'    => 'Instagram',
        'section'  => 'ods_social',
        'settings' => 'ods_instagram_url'
    ) );

    $wp_customize->add_control( 'ods_path', array(
        'label'    => 'Path',
        'section'  => 'ods_social',
        'settings' => 'ods_path_url'
    ) );

    $wp_customize->add_control( 'ods_pinterest', array(
        'label'    => 'Pinterest',
        'section'  => 'ods_social',
        'settings' => 'ods_pinterest_url'
    ) );

    $wp_customize->add_control( 'ods_linkedin', array(
        'label'    => 'Linkedin',
        'section'  => 'ods_social',
        'settings' => 'ods_linkedin_url',
    ) );

    $wp_customize->add_control( 'ods_copyright', array(
        'section'     => 'ods_copyright',
        'settings'    => 'ods_copyright',
        'description' => __( 'Space dedicated to copyright positioned in the page footer.', 'smallblog' ),
        'type'        => 'textarea'
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ods_footer_img_src', array(
        'label'    => __( 'Image', 'smallblog' ),
        'section'  => 'ods_footer',
        'settings' => 'ods_footer_img_src'
    ) ) );

    $wp_customize->add_control( 'ods_footer_text', array(
        'label'    => __( 'Content', 'smallblog' ),
        'section'  => 'ods_footer',
        'settings' => 'ods_footer_text',
        'type'     => 'textarea'
    ) );

}




