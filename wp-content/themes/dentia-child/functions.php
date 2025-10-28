<?php
/**
 * Dentia Child Theme Functions
 *
 * @package Dentia Child
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue parent and child theme styles
 */
function dentia_child_enqueue_styles() {
    // Enqueue parent theme stylesheet
    wp_enqueue_style( 'dentia-parent-style', get_template_directory_uri() . '/style.css' );

    // Enqueue child theme stylesheet
    wp_enqueue_style( 'dentia-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'dentia-parent-style' ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'dentia_child_enqueue_styles' );

/**
 * Add your custom functions below this line
 */

/**
 * Fix breadcrumb labels for custom post types
 */
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

/**
 * Temporary debug function to check what's happening
 */
add_action( 'wp_footer', function() {
    if ( is_singular( 'speciality' ) ) {
        echo '<!-- Filter is registered: ' . ( has_filter( 'dentia_breadcrumb_single' ) ? 'YES' : 'NO' ) . ' -->';
    }
} );