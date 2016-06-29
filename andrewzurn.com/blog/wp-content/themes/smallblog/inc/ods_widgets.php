<?php
/**
 * Register three widget areas.
 *
 */
add_action('widgets_init', 'smallblog_widgets_init');
function smallblog_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar', 'smallblog'),
        'id' => 'sidebar',
        'description' => __('These widgets appear on the sidebar of the categories, archive, author list articles.', 'smallblog'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}