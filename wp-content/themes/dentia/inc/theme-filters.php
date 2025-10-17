<?php
/**
 * Filters hook for the theme
 *
 * @package Bravis-Themes
 */

/* Custom Classs - Body */
function dentia_body_classes( $classes ) {   

	$classes[] = '';
    if (class_exists('ReduxFramework')) {
        $classes[] = ' pxl-redux-page';

	    $footer_fixed = dentia()->get_theme_opt('footer_fixed');
	    $p_footer_fixed = dentia()->get_page_opt('p_footer_fixed');

	    if($p_footer_fixed != false && $p_footer_fixed != 'inherit') {
	    	$footer_fixed = $p_footer_fixed;
	    }

	    if(isset($footer_fixed) && $footer_fixed == 'on') {
	        $classes[] = ' pxl-footer-fixed';
	    }

	    $pxl_body_typography = dentia()->get_theme_opt('pxl_body_typography');
	    if($pxl_body_typography != 'google-font') {
	        $classes[] = ' body-'.$pxl_body_typography.' ';
	    }

	    $pxl_heading_typography = dentia()->get_theme_opt('pxl_heading_typography');
	    if($pxl_heading_typography != 'google-font') {
	        $classes[] = ' heading-'.$pxl_heading_typography.' ';
	    }

	    $theme_default = dentia()->get_theme_opt('theme_default');
	    if(isset($theme_default['font-family']) && $theme_default['font-family'] == false && $pxl_body_typography == 'google-font') {
	        $classes[] = ' pxl-font-default';
	    }

	    $header_layout = dentia()->get_opt('header_layout');
	    if(isset($header_layout) && $header_layout) {
		    $post_header = get_post($header_layout);
		    $header_type = get_post_meta( $post_header->ID, 'header_type', true );
		    if(isset($header_type)) {
		    	$classes[] = ' bd-'.$header_type.'';
		    }
		}

	    $get_gradient_color = dentia()->get_opt('gradient_color');
		if($get_gradient_color['from'] == $get_gradient_color['to'] ) {
		    $classes[] = ' site-color-normal ';
		} else {
			$classes[] = ' site-color-gradient ';
		}

		$shop_layout = dentia()->get_theme_opt('shop_layout', 'grid');
		if(isset($_GET['shop-layout'])) {
	        $shop_layout = $_GET['shop-layout'];
	    }
		$classes[] = ' woocommerce-layout-'.$shop_layout;

		$body_custom_class = dentia()->get_page_opt('body_custom_class');
		if(!empty($body_custom_class)) {
			$classes[] = $body_custom_class;
		}
    }
    return $classes;
}
add_filter( 'body_class', 'dentia_body_classes' );

/* Post Type Support */
function dentia_add_cpt_support() {
    $cpt_support = get_option( 'elementor_cpt_support' );
    
    if( ! $cpt_support ) {
        $cpt_support = [ 'page', 'post', 'portfolio', 'footer', 'pxl-template' ];
        update_option( 'elementor_cpt_support', $cpt_support );
    }
    
    else if( ! in_array( 'portfolio', $cpt_support ) ) {
        $cpt_support[] = 'portfolio';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'footer', $cpt_support ) ) {
        $cpt_support[] = 'footer';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'pxl-template', $cpt_support ) ) {
        $cpt_support[] = 'pxl-template';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

}
add_action( 'after_switch_theme', 'dentia_add_cpt_support');

add_filter( 'pxl_support_default_cpt', 'dentia_support_default_cpt' );
function dentia_support_default_cpt($postypes){
	return $postypes; // pxl-template
}

add_filter( 'pxl_extra_post_types', 'dentia_add_post_type' );
function dentia_add_post_type( $postypes ) {
	$portfolio_display = dentia()->get_theme_opt('portfolio_display', true);
	$portfolio_slug = dentia()->get_theme_opt('portfolio_slug', 'portfolio');
	$portfolio_name = dentia()->get_theme_opt('portfolio_name', 'Portfolio');
	$service_display = dentia()->get_theme_opt('service_display', true);
	$service_slug = dentia()->get_theme_opt('service_slug', 'service');
	$service_name = dentia()->get_theme_opt('service_name', 'Services');
	if($portfolio_display) {
		$portfolio_status = true;
	} else {
		$portfolio_status = false;
	}
	if($service_display) {
		$service_status = true;
	} else {
		$service_status = false;
	}

	$postypes['portfolio'] = array(
		'status' => $portfolio_status,
		'item_name'  => $portfolio_name,
		'items_name' => $portfolio_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $portfolio_slug,
 		 	),
		),
	);

	$postypes['service'] = array(
		'status' => $service_status,
		'item_name'  => $service_name,
		'items_name' => $service_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $service_slug,
 		 	),
		),
	);
  
	return $postypes;
}

/* Custom Archive Post Type Link */
function dentia_custom_archive_service_link() {
    if( is_post_type_archive( 'service' ) ) {
    	$archive_service_link = dentia()->get_theme_opt('archive_service_link');
        wp_redirect( get_permalink($archive_service_link), 301 );
        exit();
    }
}
add_action( 'template_redirect', 'dentia_custom_archive_service_link' );

function dentia_custom_archive_portfolio_link() {
    if( is_post_type_archive( 'portfolio' ) ) {
        $archive_portfolio_link = dentia()->get_theme_opt('archive_portfolio_link');
        wp_redirect( get_permalink($archive_portfolio_link), 301 );
        exit();
    }
}
add_action( 'template_redirect', 'dentia_custom_archive_portfolio_link' );

add_filter( 'pxl_extra_taxonomies', 'dentia_add_tax' );
function dentia_add_tax( $taxonomies ) {

	$taxonomies['portfolio-category'] = array(
		'status'     => true,
		'post_type'  => array( 'portfolio' ),
		'taxonomy'   => 'Portfolio Categories',
		'taxonomies' => 'Portfolio Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'portfolio-category'
 		 	),
		),
		'labels'     => array()
	);

	$taxonomies['service-category'] = array(
		'status'     => true,
		'post_type'  => array( 'service' ),
		'taxonomy'   => 'Service Categories',
		'taxonomies' => 'Service Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'service-category'
 		 	),
		),
		'labels'     => array()
	);
	
	return $taxonomies;
}

add_filter( 'pxl_theme_builder_post_types', 'dentia_theme_builder_post_type' );
function dentia_theme_builder_post_type($postypes){
	//default are header, footer, mega-menu
	return $postypes;
}

add_filter( 'pxl_theme_builder_layout_ids', 'dentia_theme_builder_layout_id' );
function dentia_theme_builder_layout_id($layout_ids){
	//default [], 
	$header_layout        = (int)dentia()->get_opt('header_layout');
	$header_sticky_layout = (int)dentia()->get_opt('header_sticky_layout');
	$footer_layout        = (int)dentia()->get_opt('footer_layout');
	$ptitle_layout        = (int)dentia()->get_opt('ptitle_layout');
	if( $header_layout > 0) 
		$layout_ids[] = $header_layout;
	if( $header_sticky_layout > 0) 
		$layout_ids[] = $header_sticky_layout;
	if( $footer_layout > 0) 
		$layout_ids[] = $footer_layout;
	if( $ptitle_layout > 0) 
		$layout_ids[] = $ptitle_layout;

	$slider_template = dentia_get_templates_option('slider');
	if( count($slider_template) > 0){
		foreach ($slider_template as $key => $value) {
			$layout_ids[] = $key;
		}
	}

	$tab_template = dentia_get_templates_option('tab');
	if( count($tab_template) > 0){
		foreach ($tab_template as $key => $value) {
			$layout_ids[] = $key;
		}
	}
	
	$mega_menu_id = dentia_get_mega_menu_builder_id();
	if(!empty($mega_menu_id))
		$layout_ids = array_merge($layout_ids, $mega_menu_id);

	$page_popup_id = dentia_get_page_popup_builder_id();
	if(!empty($page_popup_id))
		$layout_ids = array_merge($layout_ids, $page_popup_id);

	return $layout_ids;
}

add_filter( 'pxl_wg_get_source_id_builder', 'dentia_wg_get_source_builder' );
function dentia_wg_get_source_builder($wg_datas){
  $wg_datas['tabs'] = ['control_name' => 'tabs', 'source_name' => 'content_template'];
  $wg_datas['slides'] = ['control_name' => 'slides', 'source_name' => 'slide_template'];
  return $wg_datas;
}

/* Update primary color in Editor Builder */
add_action( 'elementor/preview/enqueue_styles', 'dentia_add_editor_preview_style' );
function dentia_add_editor_preview_style(){
    wp_add_inline_style( 'editor-preview', dentia_editor_preview_inline_styles() );
}
function dentia_editor_preview_inline_styles(){
    $theme_colors = dentia_configs('theme_colors');
    ob_start();
        echo '.elementor-edit-area-active{';
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
        echo '}';
    return ob_get_clean();
}
 
add_filter( 'get_the_archive_title', 'dentia_archive_title_remove_label' );
function dentia_archive_title_remove_label( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author();
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() ) {
		$title = single_post_title( '', false );
	}

	return $title;
}

add_filter( 'comment_reply_link', 'dentia_comment_reply_text' );
function dentia_comment_reply_text( $link ) {
	$link = str_replace( 'Reply', ''.esc_attr__('Reply', 'dentia').'', $link );
	return $link;
}
add_filter( 'pxl_enable_pagepopup', 'dentia_enable_pagepopup' );
function dentia_enable_pagepopup() {
	return true;
}
add_filter( 'pxl_enable_megamenu', 'dentia_enable_megamenu' );
function dentia_enable_megamenu() {
	return true;
}
add_filter( 'pxl_enable_onepage', 'dentia_enable_onepage' );
function dentia_enable_onepage() {
	return true;
}

add_filter( 'pxl_support_awesome_pro', 'dentia_support_awesome_pro' );
function dentia_support_awesome_pro() {
	return true;
}
 
add_filter( 'redux_pxl_iconpicker_field/get_icons', 'dentia_add_icons_to_pxl_iconpicker_field' );
function dentia_add_icons_to_pxl_iconpicker_field($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}


add_filter("pxl_mega_menu/get_icons", "dentia_add_icons_to_megamenu");
function dentia_add_icons_to_megamenu($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}
 

/**
 * Move comment field to bottom
 */
add_filter( 'comment_form_fields', 'dentia_comment_field_to_bottom' );
function dentia_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}


/* ------Disable Lazy loading---- */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );

/* ------ Export Settings ---- */
add_filter( 'pxl_export_wp_settings', 'dentia_export_wp_settings' );
function dentia_export_wp_settings($wp_options){
  $wp_options[] = 'mc4wp_default_form_id';
  return $wp_options;
}

/* ------ Theme Info ---- */
add_filter( 'pxl_server_info', 'dentia_add_server_info');
function dentia_add_server_info($infos){
  $infos = [
    'api_url' => 'https://api.bravisthemes.com/',
    'docs_url' => 'https://doc.bravisthemes.com/dentia/',
    'plugin_url' => 'https://api.bravisthemes.com/plugins/',
    'demo_url' => 'https://demo.bravisthemes.com/dentia/',
    'support_url' => 'https://bravisthemes.desky.support/',
    'help_url' => 'https://doc.bravisthemes.com/dentia',
    'email_support' => 'https://bravisthemes.desky.support/',
    'video_url' => '#'
  ];
  
  return $infos;
}

/* ------ Template Filter ---- */
add_filter( 'pxl_template_type_support', 'dentia_template_type_support' );
function dentia_template_type_support($type) {
	$extra_type = [
		'page-title'          => esc_html__('Page Title', 'dentia'), 
		'hidden-panel'          => esc_html__('Hidden Panel', 'dentia'), 
		'tab'          => esc_html__('Tab', 'dentia'), 
		'popup'          => esc_html__('Popup', 'dentia'),
		'slider'          => esc_html__('Slider', 'dentia'),
	];
	$template_type = array_merge($type,$extra_type); 
	return $template_type;
}

/* Search Result  */
function dentia_custom_post_types_in_search_results( $query ) {
    if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
        $query->set( 'post_type', array( 'post', 'portfolio', 'service', 'product' ) );
    }
}
add_action( 'pre_get_posts', 'dentia_custom_post_types_in_search_results' );
