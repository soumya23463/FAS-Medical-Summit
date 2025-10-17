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
