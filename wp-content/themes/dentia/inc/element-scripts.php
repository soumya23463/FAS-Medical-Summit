<?php
/**
 * Element Scripts Registration and Conditional Enqueue
 *
 * This file handles all script registrations for Elementor elements.
 * Scripts are only enqueued when their corresponding elements are used on the page.
 *
 * @package Dentia
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Register all element-specific scripts
 * These will be enqueued only when needed via Elementor hooks
 */
if ( ! function_exists( 'dentia_register_element_scripts' ) ) {
    add_action( 'wp_enqueue_scripts', 'dentia_register_element_scripts', 5 );
    function dentia_register_element_scripts() {
        $theme = wp_get_theme( get_template() );
        $template_uri = get_template_directory_uri();

        // Animation & Effects Libraries
        wp_register_script( 'gsap', $template_uri . '/assets/js/libs/gsap.min.js', [ 'jquery' ], '3.5.0', true );
        wp_register_script( 'pxl-scroll-trigger', $template_uri . '/assets/js/libs/scroll-trigger.js', [ 'jquery' ], '3.10.5', true );
        wp_register_script( 'pxl-draggable', $template_uri . '/assets/js/libs/draggable.min.js', [ 'jquery' ], '3.12.2', true );

        // Parallax & Movement
        wp_register_script( 'particles-background', $template_uri . '/assets/js/libs/particles.min.js', [ 'jquery' ], '1.1.0', true );
        wp_register_script( 'tilt', $template_uri . '/assets/js/libs/tilt.min.js', [ 'jquery' ], '1.0.0', true );
        wp_register_script( 'stellar-parallax', $template_uri . '/assets/js/libs/stellar-parallax.min.js', [ 'jquery' ], '0.6.2', true );
        wp_register_script( 'dentia-parallax-init', $template_uri . '/assets/js/libs/pxl-parallax-init.js', [ 'jquery', 'stellar-parallax' ], $theme->get( 'Version' ), true );
        wp_register_script( 'pxl-parallax-scroll', $template_uri . '/assets/js/libs/parallax-scroll.js', [ 'jquery' ], '1.0.0', true );
        wp_register_script( 'pxl-parallax-move-mouse', $template_uri . '/assets/js/libs/parallax-move-mouse.js', [ 'jquery' ], '1.0.0', true );
        wp_register_script( 'pxl-easing', $template_uri . '/assets/js/libs/easing.js', [ 'jquery' ], '1.3.0', true );

        // Scroll Effects
        wp_register_script( 'pxl-scroll', $template_uri . '/assets/js/libs/scroll.min.js', [ 'jquery' ], '0.6.0', true );
        wp_register_script( 'lenismin', $template_uri . '/assets/js/libs/lenis.min.js', [ 'jquery' ], '1.0.0', true );
        wp_register_script( 'pxl-ScrollToPlugin', $template_uri . '/assets/js/libs/scroll-toplpugin.js', [ 'jquery' ], '3.10.5', true );

        // Animation Libraries
        wp_register_script( 'pxl-tweenmax', $template_uri . '/assets/js/libs/tweenmax.min.js', [ 'jquery' ], '2.1.2', true );
        wp_register_script( 'pxl-bundled-lenis', $template_uri . '/assets/js/libs/bundled-lenis.min.js', [ 'jquery' ], '1.0.0', true );

        // Scroll Effects
        wp_register_script( 'pxl-nice-scroll', $template_uri . '/assets/js/libs/nice-scroll.min.js', [ 'jquery' ], '3.7.6', true );
        wp_register_script( 'pxl-clickText', $template_uri . '/assets/js/libs/click-text.js', [ 'jquery' ], $theme->get( 'Version' ), true );

        // Counter & Progress
        wp_register_script( 'pxl-counter-slide', $template_uri . '/assets/js/libs/counter-slide.min.js', [ 'jquery' ], '1.0.0', true );
        wp_register_script( 'pxl-pie-chart', $template_uri . '/assets/js/libs/pie-chart.min.js', [ 'jquery' ], $theme->get( 'Version' ), true );

        // Utility Scripts
        wp_register_script( 'pxl-cookie', $template_uri . '/assets/js/libs/cookie.js', [ 'jquery' ], '1.4.1', true );
        wp_register_script( 'pxl-direction', $template_uri . '/elements/widgets/js/direction.js', [ 'jquery' ], '1.0.0', true );

        // Element-Specific Scripts
        wp_register_script( 'dentia-particle', $template_uri . '/elements/widgets/js/particle.js', [ 'jquery' ], $theme->get( 'Version' ), true );
        wp_register_script( 'dentia-parallax', $template_uri . '/elements/widgets/js/parallax.js', [ 'jquery' ], $theme->get( 'Version' ), true );
        wp_register_script( 'pxl-post-grid', $template_uri . '/elements/widgets/js/grid.js', [ 'isotope', 'jquery' ], $theme->get( 'Version' ), true );
        wp_localize_script( 'pxl-post-grid', 'main_params', [ 'ajax_url' => admin_url( 'admin-ajax.php' ) ] );
        wp_register_script( 'pxl-swiper', $template_uri . '/elements/widgets/js/carousel.js', [ 'jquery' ], $theme->get( 'Version' ), true );
        wp_register_script( 'pxl-slick', $template_uri . '/elements/widgets/js/slick.js', [ 'jquery' ], $theme->get( 'Version' ), true );
        wp_register_script( 'dentia-counter', $template_uri . '/elements/widgets/js/counter.js', [ 'jquery' ], $theme->get( 'Version' ), true );
        wp_register_script( 'dentia-accordion', $template_uri . '/elements/widgets/js/accordion.js', [ 'jquery' ], $theme->get( 'Version' ), true );
        wp_register_script( 'dentia-tabs', $template_uri . '/elements/widgets/js/tabs.js', [ 'jquery' ], $theme->get( 'Version' ), true );
        wp_register_script( 'dentia-progressbar', $template_uri . '/elements/widgets/js/progressbar.js', [ 'jquery' ], $theme->get( 'Version' ), true );
        wp_register_script( 'dentia-countdown', $template_uri . '/elements/widgets/js/countdown.js', [ 'jquery' ], $theme->get( 'Version' ), true );
        wp_register_script( 'dentia-pie-chart', $template_uri . '/elements/widgets/js/pie-chart.js', [ 'jquery' ], $theme->get( 'Version' ), true );
        wp_register_script( 'dentia-postclick', $template_uri . '/elements/widgets/js/postclick.js', [ 'jquery' ], $theme->get( 'Version' ), true );

        // Main Elementor Script (always enqueued)
        wp_enqueue_script( 'dentia-elementor', $template_uri . '/elements/widgets/js/elementor.js', [ 'jquery' ], $theme->get( 'Version' ), true );
    }
}

/**
 * Conditionally enqueue scripts based on page content
 * This hook fires after Elementor finishes rendering the page
 */
if ( ! function_exists( 'dentia_enqueue_conditional_element_scripts' ) ) {
    add_action( 'wp_footer', 'dentia_enqueue_conditional_element_scripts', 1 );
    function dentia_enqueue_conditional_element_scripts() {
        // Only check if Elementor is active
        if ( ! did_action( 'elementor/loaded' ) ) {
            return;
        }

        global $post;
        if ( ! $post ) {
            return;
        }

        // Get the current page content
        $content = $post->post_content;

        // Map of Elementor widget names to required scripts
        $widget_script_map = [
            'pxl_counter' => [ 'pxl-counter-slide', 'dentia-counter' ],
            'pxl_parallax_image' => [ 'tilt', 'dentia-parallax' ],
            'pxl_particle' => [ 'particles-background', 'dentia-particle' ],
            'pxl_gallery' => [ 'dentia-parallax' ],
            'pxl_accordion' => [ 'dentia-accordion' ],
            'pxl_tabs' => [ 'dentia-tabs' ],
            'pxl_progressbar' => [ 'dentia-progressbar' ],
            'pxl_countdown' => [ 'dentia-countdown' ],
            'pxl_pie_chart' => [ 'pxl-pie-chart', 'dentia-pie-chart' ],
            'pxl_carousel' => [ 'pxl-swiper' ],
            'pxl_post_grid' => [ 'pxl-post-grid', 'pxl-slick' ],
        ];

        // Check for Elementor elements and enqueue required scripts
        foreach ( $widget_script_map as $widget => $scripts ) {
            // Check if widget exists in the page content
            if ( strpos( $content, '"widgetType":"' . $widget . '"' ) !== false ) {
                foreach ( $scripts as $script ) {
                    wp_enqueue_script( $script );
                }
            }
        }

        // Check for scroll effects, parallax backgrounds, etc.
        if ( strpos( $content, 'pxl_parallax_bg_img' ) !== false ) {
            wp_enqueue_script( 'pxl-parallax-scroll' );
            wp_enqueue_script( 'pxl-easing' );
        }

        // Check for animation effects
        if ( strpos( $content, 'pxl_animation' ) !== false ) {
            wp_enqueue_script( 'gsap' );
            wp_enqueue_script( 'pxl-scroll-trigger' );
        }

        // Check for scroll direction effects
        if ( strpos( $content, 'pxl_direction' ) !== false ) {
            wp_enqueue_script( 'pxl-direction' );
        }

        // Always enqueue for element support
        wp_enqueue_script( 'dentia-elementor' );
    }
}

/**
 * Add defer attribute to non-critical scripts for performance
 * Scripts in this list will load asynchronously without blocking render
 */
if ( ! function_exists( 'dentia_add_script_defer' ) ) {
    // Defer filter disabled - causes performance regression (score drops from 32 to 27-28)
    // add_filter( 'script_loader_tag', 'dentia_add_script_defer', 10, 3 );
    function dentia_add_script_defer( $tag, $handle, $src ) {
        // Scripts that MUST load synchronously (critical for functionality)
        $must_load_sync = [
            'jquery',
            'jquery-migrate',
            'wp-polyfill',
            'wp-block-library',
            'wp-dom-ready',
            'wp-i18n',
            'bootstrap',
        ];

        // Don't defer critical scripts
        if ( in_array( $handle, $must_load_sync, true ) ) {
            return $tag;
        }

        // Don't double-defer scripts that already have defer or async
        if ( strpos( $tag, ' defer' ) !== false || strpos( $tag, ' async' ) !== false ) {
            return $tag;
        }

        // Defer all other scripts
        return str_replace( ' src=', ' defer src=', $tag );
    }
}