<?php
/**
 * Dentia Child Theme Functions
 *
 * @package Dentia Child
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue parent and child theme styles
 */

function dentia_child_enqueue_styles()
{

    // Parent theme stylesheet
    wp_enqueue_style(
        'dentia-parent-style',
        get_template_directory_uri() . '/style.css?v=11.1'
    );

    // Child theme stylesheet
    wp_enqueue_style(
        'dentia-child-style',
        get_stylesheet_directory_uri() . '/style.css?v=11.1',
        array('dentia-parent-style'),
        wp_get_theme()->get('Version')
    );

    // Child theme JS file
    wp_enqueue_script(
        'dentia-child-script',
        get_stylesheet_directory_uri() . '/site-dentia.js',
        array('jquery'), // remove if you don't use jQuery
        wp_get_theme()->get('Version'),
        true // loads in footer
    );
}
add_action('wp_enqueue_scripts', 'dentia_child_enqueue_styles');


/**
 * Add your custom functions below this line
 */

/**
 * Fix breadcrumb labels for custom post types
 * NOTE: Breadcrumb customization is now handled directly in parent theme's
 * class-breadcrumb.php add_single_entry() function (lines 253-314)
 * This filter is disabled to avoid conflicts.
 */
/*
function dentia_child_fix_breadcrumb_labels( $entries, $post ) {
    $post_type = get_post_type( $post );

    // Check if we have entries
    if ( empty( $entries ) ) {
        return $entries;
    }

    // For Service post type
    if ( $post_type === 'service' && isset( $entries[0] ) ) {
        $entries[0]['label'] = 'Services';
        $entries[0]['url'] = home_url( '/all-services/' );
    }

    // For Speciality post type
    if ( $post_type === 'speciality' && isset( $entries[0] ) ) {
        $entries[0]['label'] = 'Specialities';
        $entries[0]['url'] = home_url( '/specialities/' );
    }

    return $entries;
}
add_filter( 'dentia_breadcrumb_single', 'dentia_child_fix_breadcrumb_labels', 10, 2 );
*/


function show_current_year()
{
    return date('Y');
}
add_shortcode('current_year', 'show_current_year');