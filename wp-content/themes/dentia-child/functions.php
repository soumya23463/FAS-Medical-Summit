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

/**
 * Add FAQPage Schema Markup for FAQ pages
 */
function add_faq_schema_markup() {
    // Only add schema on FAQ page
    if ( is_page() && get_the_ID() ) {
        $page_slug = get_post_field( 'post_name', get_the_ID() );

        if ( $page_slug === 'faq' ) {
            $faq_schema = array(
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => array(
                    array(
                        '@type' => 'Question',
                        'name' => 'What is your service and who is it for?',
                        'acceptedAnswer' => array(
                            '@type' => 'Answer',
                            'text' => 'Our service is designed to help individuals and businesses achieve their goals more efficiently through a simple, guided, and reliable process. It\'s suitable for both beginners and experienced users.'
                        )
                    ),
                    array(
                        '@type' => 'Question',
                        'name' => 'How do I get started?',
                        'acceptedAnswer' => array(
                            '@type' => 'Answer',
                            'text' => 'Depends on complexity. A straightforward practice might be up and running in 2-4 weeks. Larger organizations with multiple locations or specialties? Usually 6-8 weeks. We don\'t rush it—getting the setup right matters more than hitting an arbitrary deadline.'
                        )
                    ),
                    array(
                        '@type' => 'Question',
                        'name' => 'Do I need any prior experience?',
                        'acceptedAnswer' => array(
                            '@type' => 'Answer',
                            'text' => 'We typically work on a percentage-of-collections model, which means our incentives align with yours. Some clients prefer flat fees for specific services. We\'re flexible—let\'s talk about what makes sense for your situation.'
                        )
                    ),
                    array(
                        '@type' => 'Question',
                        'name' => 'How much does your service cost?',
                        'acceptedAnswer' => array(
                            '@type' => 'Answer',
                            'text' => 'Our service is designed to help individuals and businesses achieve their goals more efficiently through a simple, guided, and reliable process. It\'s suitable for both beginners and experienced users.'
                        )
                    ),
                    array(
                        '@type' => 'Question',
                        'name' => 'What payment methods do you accept?',
                        'acceptedAnswer' => array(
                            '@type' => 'Answer',
                            'text' => 'Depends on complexity. A straightforward practice might be up and running in 2-4 weeks. Larger organizations with multiple locations or specialties? Usually 6-8 weeks. We don\'t rush it—getting the setup right matters more than hitting an arbitrary deadline.'
                        )
                    ),
                    array(
                        '@type' => 'Question',
                        'name' => 'Can I cancel or change my plan later?',
                        'acceptedAnswer' => array(
                            '@type' => 'Answer',
                            'text' => 'We typically work on a percentage-of-collections model, which means our incentives align with yours. Some clients prefer flat fees for specific services. We\'re flexible—let\'s talk about what makes sense for your situation.'
                        )
                    ),
                    array(
                        '@type' => 'Question',
                        'name' => 'How does the process work?',
                        'acceptedAnswer' => array(
                            '@type' => 'Answer',
                            'text' => 'Our service is designed to help individuals and businesses achieve their goals more efficiently through a simple, guided, and reliable process. It\'s suitable for both beginners and experienced users.'
                        )
                    ),
                    array(
                        '@type' => 'Question',
                        'name' => 'How long does it take to see results?',
                        'acceptedAnswer' => array(
                            '@type' => 'Answer',
                            'text' => 'Results vary depending on your specific situation and goals. Most clients start seeing meaningful improvements within the first 30-60 days.'
                        )
                    ),
                    array(
                        '@type' => 'Question',
                        'name' => 'What happens after I sign up?',
                        'acceptedAnswer' => array(
                            '@type' => 'Answer',
                            'text' => 'After signing up, you\'ll be assigned a dedicated account manager who will guide you through onboarding and help you get the most out of our service.'
                        )
                    ),
                    array(
                        '@type' => 'Question',
                        'name' => 'What kind of support do you offer?',
                        'acceptedAnswer' => array(
                            '@type' => 'Answer',
                            'text' => 'We offer comprehensive support including email, phone, and live chat assistance. We also provide detailed documentation and regular training sessions.'
                        )
                    ),
                    array(
                        '@type' => 'Question',
                        'name' => 'How quickly will I get a response?',
                        'acceptedAnswer' => array(
                            '@type' => 'Answer',
                            'text' => 'Our support team typically responds within 2-4 hours during business hours. For urgent matters, we offer priority support.'
                        )
                    ),
                    array(
                        '@type' => 'Question',
                        'name' => 'Do you provide onboarding or guidance?',
                        'acceptedAnswer' => array(
                            '@type' => 'Answer',
                            'text' => 'Yes, we provide comprehensive onboarding including setup assistance, training sessions, and ongoing guidance to ensure your success.'
                        )
                    )
                )
            );

            echo '<script type="application/ld+json">' . wp_json_encode( $faq_schema ) . '</script>';
        }
    }
}
add_action( 'wp_head', 'add_faq_schema_markup' );