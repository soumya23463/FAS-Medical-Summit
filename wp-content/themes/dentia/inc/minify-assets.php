<?php
/**
 * CSS and JavaScript Minification
 *
 * This file handles inline minification of CSS and JS to reduce file sizes
 * and improve Lighthouse performance scores.
 *
 * @package Dentia
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Minify CSS by removing unnecessary characters
 *
 * @param string $css The CSS content to minify
 * @return string Minified CSS
 */
function dentia_minify_css( $css ) {
    // Remove comments only - safest approach
    $css = preg_replace( '!/\*[^*]*\*+(?:[^/*][^*]*\*+)*/!', '', $css );
    // Convert tabs and carriage returns to spaces
    $css = str_replace( [ "\r\n", "\r", "\t" ], ' ', $css );
    // Remove newlines
    $css = str_replace( "\n", '', $css );
    // Remove multiple spaces (but safely)
    $css = preg_replace( '/\s{2,}/', ' ', $css );
    return trim( $css );
}

/**
 * Minify JavaScript by removing unnecessary characters
 *
 * @param string $js The JavaScript content to minify
 * @return string Minified JavaScript
 */
function dentia_minify_js( $js ) {
    // Remove single-line comments
    $js = preg_replace( '~//.*?\n~', "\n", $js );
    // Remove multi-line comments
    $js = preg_replace( '~\/\*.*?\*\/~s', '', $js );
    // Remove multiple spaces
    $js = preg_replace( '/\s\s+/', ' ', $js );
    // Remove spaces around special characters (carefully)
    $js = preg_replace( '/\s*([{}();,:=\[\]])\s*/', '$1', $js );
    return trim( $js );
}

/**
 * CSS Inlining Disabled - was breaking design
 * Using .htaccess GZIP compression instead for file size reduction
 */
if ( ! function_exists( 'dentia_inline_minified_css' ) ) {
    // Inline CSS disabled - was breaking page layout
    // add_action( 'wp_head', 'dentia_inline_minified_css', 5 );
    function dentia_inline_minified_css() {
        // CSS inlining disabled
    }
}

/**
 * Optimize resource hints and font loading
 */
if ( ! function_exists( 'dentia_optimize_resources' ) ) {
    add_action( 'wp_head', 'dentia_optimize_resources', 2 );
    function dentia_optimize_resources() {
        // Preconnect to external domains for faster loading
        echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
        echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';

        // Font with display=swap prevents invisible text while loading
        echo '<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">';
    }
}

/**
 * Optimize images with lazy loading
 * DISABLED - caused score to drop from 31 to 25
 */
if ( ! function_exists( 'dentia_optimize_images' ) ) {
    // add_action( 'wp_head', 'dentia_optimize_images' );
    function dentia_optimize_images() {
        // Disabled - was breaking image rendering
    }
}

/**
 * Remove unnecessary WordPress bloat
 */
if ( ! function_exists( 'dentia_remove_wp_bloat' ) ) {
    // Note: Bloat removal disabled - caused score to drop from 31 to 30
    // add_action( 'wp_enqueue_scripts', 'dentia_remove_wp_bloat', 100 );
    function dentia_remove_wp_bloat() {
        // Remove WP emoji styles and script if not needed
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'wp_head', 'wp_print_emoji_styles' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );

        // Remove block library styles if not using blocks
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );

        // Remove REST API link if not using it
        if ( ! is_admin() ) {
            remove_action( 'wp_head', 'rest_output_link_wp_head' );
        }
    }
}