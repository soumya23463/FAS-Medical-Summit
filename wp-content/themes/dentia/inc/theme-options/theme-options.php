<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

$opt_name = dentia()->get_option_name();
$version = dentia()->get_version();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => '', //$theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $version,
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu', //class_exists('Pxltheme_Core') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'dentia'),
    'page_title'           => esc_html__('Theme Options', 'dentia'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => 80,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'pxlart', //class_exists('dentia_Admin_Page') ? 'case' : '',
    // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'pxlart-theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'dentia'),
    'icon'   => 'el-icon-home',
    'fields' => array(
        
    )
));

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'dentia'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields' => array(
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'dentia'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'dentia'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Link Colors', 'dentia'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'  => ''
            ),
            'output'  => array('a')
        ),
        array(
            'id'          => 'gradient_color',
            'type'        => 'color_gradient',
            'title'       => esc_html__('Gradient Color', 'dentia'),
            'transparent' => false,
            'default'  => array(
                'from' => '',
                'to'   => '', 
            ),
        ),
        array(
            'id'      => 'body_text_color',
            'type'    => 'color',
            'title'   => esc_html__('Body Color', 'dentia'),
            'default'     => '',
            'output'  => array('body'),
            'transparent' => false,
            'required' => array( 0 => 'pxl_body_typography', 1 => '!=', 2 => 'google-font' ),
        ),
        array(
            'id'      => 'heading_text_color',
            'type'    => 'color',
            'title'   => esc_html__('Heading Color', 'dentia'),
            'default'     => '',
            'output'  => array('h1,h2,h3,h4,h5,h6'),
            'transparent' => false,
            'required' => array( 0 => 'pxl_heading_typography', 1 => '!=', 2 => 'google-font' ),
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Favicon', 'dentia'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__('Favicon', 'dentia'),
            'default'  => '',
            'url'      => false
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Mouse', 'dentia'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'mouse_move_animation',
            'type'     => 'switch',
            'title'    => esc_html__('Mouse Move Animation', 'dentia'),
            'default'  => false
        ),
        array(
            'id'    => 'mouse_move_style',
            'type'  => 'select',
            'title' => esc_html__('Mouse Move Style', 'dentia'),
            'options' => [
                'style-default'           => esc_html__('Default', 'dentia'),
                'style-morden'           => esc_html__('Morden', 'dentia'),
            ],
            'default' => 'style-default',
            'indent' => true,
            'required' => array( 0 => 'mouse_move_animation', 1 => 'equals', 2 => true ),
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Loader', 'dentia'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'site_loader',
            'type'     => 'switch',
            'title'    => esc_html__('Loader', 'dentia'),
            'default'  => false
        ),
        array(
            'id'    => 'loader_style',
            'type'  => 'select',
            'title' => esc_html__('Loader Style', 'dentia'),
            'options' => [
                'style-default'           => esc_html__('Default', 'dentia'),
            ],
            'default' => 'style-default',
            'indent' => true,
            'required' => array( 0 => 'site_loader', 1 => 'equals', 2 => true ),
        ),
        array(
            'id'      => 'loader_text',
            'type'    => 'text',
            'title'   => esc_html__('Loader Text', 'dentia'),
            'default' => '',
            'required' => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-law' ),
        ),
        array(
            'id'       => 'loader_text_color',
            'type'     => 'button_set',
            'title'    => esc_html__('Color Type', 'dentia'),
            'options'  => array(
                'primary' => esc_html__('Primary', 'dentia'),
                'gradient' => esc_html__('Gradient', 'dentia'),
            ),
            'default'  => 'primary',
            'required' => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-law' ),
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Cookie Policy', 'dentia'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'cookie_policy',
            'type'     => 'button_set',
            'title'    => esc_html__('Cookie Policy', 'dentia'),
            'options'  => array(
                'show' => esc_html__('Show', 'dentia'),
                'hide' => esc_html__('Hide', 'dentia'),
            ),
            'default'  => 'hide',
        ),
        array(
            'id'      => 'cookie_policy_description',
            'type'    => 'text',
            'title'   => esc_html__('Description', 'dentia'),
            'default' => '',
            'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'          => 'cookie_policy_description_typo',
            'type'        => 'typography',
            'title'       => esc_html__('Description Font', 'dentia'),
            'google'      => true,
            'font-backup' => false,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('.pxl-cookie-policy .pxl-item--description'),
            'units'       => 'px',
            'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'      => 'cookie_policy_btntext',
            'type'    => 'text',
            'title'   => esc_html__('Button Text', 'dentia'),
            'default' => '',
            'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'    => 'cookie_policy_link',
            'type'  => 'select',
            'title' => esc_html__( 'Button Link', 'dentia' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Subscribe', 'dentia'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'subscribe',
            'type'     => 'button_set',
            'title'    => esc_html__('Subscribe', 'dentia'),
            'options'  => array(
                'show' => esc_html__('Show', 'dentia'),
                'hide' => esc_html__('Hide', 'dentia'),
            ),
            'default'  => 'hide',
        ),
        array(
            'id'      => 'subscribe_layout',
            'type'    => 'select',
            'title'   => esc_html__('Layout', 'dentia'),
            'desc'    => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','dentia'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
            'options' => dentia_get_templates_option('popup'),
            'required' => array( 0 => 'subscribe', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'    => 'popup_effect',
            'type'  => 'select',
            'title' => esc_html__('Popup Effect', 'dentia'),
            'options' => [
                'fade'           => esc_html__('Fade', 'dentia'),
                'fade-slide'           => esc_html__('Fade Slide', 'dentia'),
                'zoom'           => esc_html__('Zoom', 'dentia'),
            ],
            'default' => 'fade',
            'required' => array( 0 => 'subscribe', 1 => 'equals', 2 => 'show' ),
        ),
    )
));

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header', 'dentia'),
    'icon'   => 'el el-indent-left',
    'fields' => array_merge(
        dentia_header_opts(),
        array(
            array(
                'id'       => 'sticky_scroll',
                'type'     => 'button_set',
                'title'    => esc_html__('Sticky Scroll', 'dentia'),
                'options'  => array(
                    'pxl-sticky-stt' => esc_html__('Scroll To Top', 'dentia'),
                    'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'dentia'),
                ),
                'default'  => 'pxl-sticky-stb',
            ),
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Mobile', 'dentia'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'mobile_display',
            'type'     => 'button_set',
            'title'    => esc_html__('Display', 'dentia'),
            'options'  => array(
                'show'  => esc_html__('Show', 'dentia'),
                'hide'  => esc_html__('Hide', 'dentia'),
            ),
            'default'  => 'show'
        ),
        array(
            'id'       => 'mobile_style',
            'type'     => 'button_set',
            'title'    => esc_html__('Style', 'dentia'),
            'options'  => array(
                'light'  => esc_html__('Light', 'dentia'),
                'dark'  => esc_html__('Dark', 'dentia'),
            ),
            'default'  => 'light',
            'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'       => 'logo_m',
            'type'     => 'media',
            'title'    => esc_html__('Select Logo', 'dentia'),
             'default' => array(
                'url'=>get_template_directory_uri().'/assets/img/logo.png'
            ),
            'url'      => false,
            'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'       => 'logo_height',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Height', 'dentia'),
            'width'    => false,
            'unit'     => 'px',
            'output'    => array('#pxl-header-default .pxl-header-branding img, #pxl-header-default #pxl-header-mobile .pxl-header-branding img, #pxl-header-elementor #pxl-header-mobile .pxl-header-branding img, .pxl-logo-mobile img'),
            'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'       => 'search_mobile',
            'type'     => 'switch',
            'title'    => esc_html__('Search Form', 'dentia'),
            'default'  => true,
            'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'      => 'search_placeholder_mobile',
            'type'    => 'text',
            'title'   => esc_html__('Search Text Placeholder', 'dentia'),
            'default' => '',
            'subtitle' => esc_html__('Default: Search...', 'dentia'),
            'required' => array( 0 => 'search_mobile', 1 => 'equals', 2 => true ),
        )
    )
));

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'dentia'),
    'icon'   => 'el-icon-map-marker',
    'fields' => array_merge(
        dentia_page_title_opts() 
    )
));


/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'dentia'),
    'icon'   => 'el el-website',
    'fields' => array_merge(
        dentia_footer_opts(),
        array(
            array(
                'id'       => 'back_totop_on',
                'type'     => 'switch',
                'title'    => esc_html__('Button Back to Top', 'dentia'),
                'default'  => false,
            ),
            array(
                'id'       => 'footer_fixed',
                'type'     => 'button_set',
                'title'    => esc_html__('Footer Fixed', 'dentia'),
                'options'  => array(
                    'on' => esc_html__('On', 'dentia'),
                    'off' => esc_html__('Off', 'dentia'),
                ),
                'default'  => 'off',
            ),
        ) 
    )
    
));

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog Archive', 'dentia'),
    'icon'  => 'el-icon-pencil',
    'fields'     => array_merge(
        dentia_sidebar_pos_opts([ 'prefix' => 'blog_']),
        array(
            array(
                'id'       => 'archive_date',
                'title'    => esc_html__('Date', 'dentia'),
                'subtitle' => esc_html__('Display the Date for each blog post.', 'dentia'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_category',
                'title'    => esc_html__('Category', 'dentia'),
                'subtitle' => esc_html__('Display the category for each blog post.', 'dentia'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'      => 'archive_readmore_text',
                'type'    => 'text',
                'title'   => esc_html__('Read More Text', 'dentia'),
                'default' => '',
                'subtitle' => esc_html__('Default: Read more', 'dentia'),
            ),
            array(
                'id'      => 'archive_excerpt_length',
                'type'    => 'text',
                'title'   => esc_html__('Excerpt Length', 'dentia'),
                'default' => '',
                'subtitle' => esc_html__('Default: 50', 'dentia'),
            ),
            array(
                'id'      => 'archive_readmore_text',
                'type'    => 'text',
                'title'   => esc_html__('Read More Text', 'dentia'),
                'default' => '',
                'subtitle' => esc_html__('Default: Read more', 'dentia'),
            )
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'dentia'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array_merge(
        dentia_sidebar_pos_opts([ 'prefix' => 'post_']),
        array(
            array(
                'id'       => 'pxl_post_title',
                'type'     => 'button_set',
                'title'    => esc_html__('Post Title Type', 'dentia'),
                'options'  => array(
                    'default' => esc_html__('Default', 'dentia'),
                    'custom'  => esc_html__('Custom', 'dentia'),
                ),
                'default'  => 'default',
            ),
            array(
                'id'      => 'pxl_post_title_text',
                'type'    => 'text',
                'title'   => esc_html__('Post Title Text', 'dentia'),
                'default' => '',
                'required' => array( 0 => 'pxl_post_title', 1 => 'equals', 2 => 'custom' ),
            ),
            array(
                'id'       => 'post_comments_on',
                'title'    => esc_html__('Comment', 'dentia'),
                'subtitle' => esc_html__('Display the Comment for blog post.', 'dentia'),
                'type'     => 'switch',
                'default'  => true,
            ),
        )
    )
));

/*--------------------------------------------------------------
# Shop
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Shop', 'dentia'),
        'icon'   => 'el el-shopping-cart',
        'fields'     => array_merge(
            dentia_sidebar_pos_opts([ 'prefix' => 'shop_']),
            array(
                array(
                    'id'       => 'shop_layout',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Layout', 'dentia'),
                    'options'  => array(
                        'grid'  => esc_html__('Grid', 'dentia'),
                        'list'  => esc_html__('List', 'dentia'),
                    ),
                    'default'  => 'grid',
                ),
                array(
                    'title'         => esc_html__('Products displayed per row', 'dentia'),
                    'id'            => 'products_columns',
                    'type'          => 'slider',
                    'subtitle'      => esc_html__('Number product to show per row', 'dentia'),
                    'default'       => 3,
                    'min'           => 2,
                    'step'          => 1,
                    'max'           => 5,
                    'display_value' => 'text',
                    'required' => array( 0 => 'shop_layout', 1 => 'equals', 2 => 'grid' ),
                ),
                array(
                    'title'         => esc_html__('Products displayed per page', 'dentia'),
                    'id'            => 'product_per_page',
                    'type'          => 'slider',
                    'subtitle'      => esc_html__('Number product to show', 'dentia'),
                    'default'       => 9,
                    'min'           => 3,
                    'step'          => 1,
                    'max'           => 50,
                    'display_value' => 'text'
                ),
                array(
                    'title' => esc_html__('Single Product', 'dentia'),
                    'type'  => 'section',
                    'id' => 'shop_single',
                    'indent' => true,
                ),
                array(
                    'id'       => 'product_title',
                    'type'     => 'switch',
                    'title'    => esc_html__('Product Title', 'dentia'),
                    'default'  => false
                ),
                array(
                    'id'       => 'product_social_share',
                    'type'     => 'switch',
                    'title'    => esc_html__('Social Share', 'dentia'),
                    'default'  => false
                ),
            )
        )
    ));
}
/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'dentia'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'       => 'pxl_body_typography',
            'type'     => 'select',
            'title'    => esc_html__('Body Font Type', 'dentia'),
            'options'  => array(
                'default-font'  => esc_html__('Default Font', 'dentia'),
                'google-font'  => esc_html__('Google Font', 'dentia'),
            ),
            'default'  => 'default-font',
        ),

        array(
            'id'          => 'font_body',
            'type'        => 'typography',
            'title'       => esc_html__('Body Google Font', 'dentia'),
            'google'      => true,
            'font-backup' => false,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'output'      => array('body'),
            'units'       => 'px',
            'required' => array( 0 => 'pxl_body_typography', 1 => 'equals', 2 => 'google-font' ),
            'force_output' => true
        ),

        array(
            'id'       => 'pxl_heading_typography',
            'type'     => 'select',
            'title'    => esc_html__('Heading Font Type', 'dentia'),
            'options'  => array(
                'default-font'  => esc_html__('Default Font', 'dentia'),
                'google-font'  => esc_html__('Google Font', 'dentia'),
            ),
            'default'  => 'default-font',
        ),
        
        array(
            'id'          => 'font_heading',
            'type'        => 'typography',
            'title'       => esc_html__('Heading Google Font', 'dentia'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'line-height'  => false,
            'font-size'  => false,
            'font-backup'  => false,
            'font-style'  => false,
            'output'      => array('h1,h2,h3,h4,h5,h6,.ft-heading-default'),
            'units'       => 'px',
            'required' => array( 0 => 'pxl_heading_typography', 1 => 'equals', 2 => 'google-font' ),
            'force_output' => true
        ),

        array(
            'id'          => 'theme_default',
            'type'        => 'typography',
            'title'       => esc_html__('Theme Default', 'dentia'),
            'google'      => true,
            'font-backup' => false,
            'all_styles'  => false,
            'line-height'  => false,
            'font-size'  => false,
            'color'  => false,
            'font-style'  => false,
            'font-weight'  => false,
            'text-align'  => false,
            'units'       => 'px',
            'required' => array( 0 => 'pxl_heading_typography', 1 => 'equals', 2 => 'google-font' ),
            'force_output' => true
        ),

    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Extra Post Type', 'dentia'),
    'icon'       => 'el el-briefcase',
    'fields'     => array(
        array(
            'title' => esc_html__('Portfolio', 'dentia'),
            'type'  => 'section',
            'id' => 'post_portfolio',
            'indent' => true,
        ),
        array(
            'id'       => 'portfolio_display',
            'type'     => 'switch',
            'title'    => esc_html__('Portfolio', 'dentia'),
            'default'  => true
        ),
        array(
            'id'      => 'portfolio_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Slug', 'dentia'),
            'default' => '',
            'desc'     => 'Default: portfolio',
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'      => 'portfolio_name',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Name', 'dentia'),
            'default' => '',
            'desc'     => 'Default: Portfolio',
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'    => 'archive_portfolio_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'dentia' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'title' => esc_html__('Service', 'dentia'),
            'type'  => 'section',
            'id' => 'post_service',
            'indent' => true,
        ),
        array(
            'id'       => 'service_display',
            'type'     => 'switch',
            'title'    => esc_html__('Service', 'dentia'),
            'default'  => true
        ),
        array(
            'id'      => 'service_slug',
            'type'    => 'text',
            'title'   => esc_html__('Service Slug', 'dentia'),
            'default' => '',
            'desc'     => 'Default: service',
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'      => 'service_name',
            'type'    => 'text',
            'title'   => esc_html__('Service Name', 'dentia'),
            'default' => '',
            'desc'     => 'Default: Services',
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'    => 'archive_service_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'dentia' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
    )
));