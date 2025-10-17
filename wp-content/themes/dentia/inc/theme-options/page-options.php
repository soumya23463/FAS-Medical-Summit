<?php
 
add_action( 'pxl_post_metabox_register', 'dentia_page_options_register' );
function dentia_page_options_register( $metabox ) {
 
	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Options', 'dentia' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'post_settings' => [
					'title'  => esc_html__( 'Post Options', 'dentia' ),
					'icon'   => 'el el-refresh',
					'fields' => array_merge(
						dentia_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']),
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'dentia' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
					    )
					)
				]
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Page Options', 'dentia' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'dentia' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
				        dentia_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
				           		'id'       => 'logo_m',
					            'type'     => 'media',
					            'title'    => esc_html__('Mobile Logo', 'dentia'),
					            'default'  => '',
					            'url'      => false,
					        ),
					        array(
					            'id'       => 'mobile_style',
					            'type'     => 'button_set',
					            'title'    => esc_html__('Mobile Style', 'dentia'),
					            'options'  => array(
					                'inherit'  => esc_html__('Inherit', 'dentia'),
					                'light'  => esc_html__('Light', 'dentia'),
					                'dark'  => esc_html__('Dark', 'dentia'),
					            ),
					            'default'  => 'inherit',
					        ),
					        array(
				                'id'       => 'p_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'dentia' ),
				                'options'  => dentia_get_nav_menu_slug(),
				                'default' => '',
				            ),
					    ),
					    array(
				            array(
				                'id'       => 'sticky_scroll',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Sticky Scroll', 'dentia'),
				                'options'  => array(
				                    '-1' => esc_html__('Inherit', 'dentia'),
				                    'pxl-sticky-stt' => esc_html__('Scroll To Top', 'dentia'),
				                    'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'dentia'),
				                ),
				                'default'  => '-1',
				            ),
				        )
				    )
					 
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'dentia' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        dentia_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
					        array(
					            'id' => 'custom_ptitle',
					            'type' => 'text',
					            'title' => esc_html__('Custom Page Title', 'dentia'),
					        ),
					    )
				    )
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'dentia' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						dentia_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'dentia' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
					    )
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'dentia' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        dentia_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
				                'id'       => 'p_footer_fixed',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Footer Fixed', 'dentia'),
				                'options'  => array(
				                    'inherit' => esc_html__('Inherit', 'dentia'),
				                    'on' => esc_html__('On', 'dentia'),
				                    'off' => esc_html__('Off', 'dentia'),
				                ),
				                'default'  => 'inherit',
				            ),
						)
				    )
				],
				'colors' => [
					'title'  => esc_html__( 'Colors', 'dentia' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        array(
				        	array(
					            'id'          => 'body_bg_color',
					            'type'        => 'color',
					            'title'       => esc_html__('Body Background Color', 'dentia'),
					            'transparent' => false,
					            'default'     => ''
					        ),
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
					            'id'          => 'gradient_color',
					            'type'        => 'color_gradient',
					            'title'       => esc_html__('Gradient Color', 'dentia'),
					            'transparent' => false,
					            'default'  => array(
					                'from' => '',
					                'to'   => '', 
					            ),
					        ),
					    )
				    )
				],
				'extra' => [
					'title'  => esc_html__( 'Extra', 'dentia' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        array(
				        	array(
					            'id' => 'body_custom_class',
					            'type' => 'text',
					            'title' => esc_html__('Body Custom Class', 'dentia'),
					        ),
					    )
				    )
				]
			]
		],
		'portfolio' => [
			'opt_name'            => 'pxl_portfolio_options',
			'display_name'        => esc_html__( 'Portfolio Options', 'dentia' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'dentia' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'dentia' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						)
				    )
				],
			]
		],
		'service' => [
			'opt_name'            => 'pxl_service_options',
			'display_name'        => esc_html__( 'Service Options', 'dentia' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'dentia' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						dentia_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
					            'id'=> 'service_external_link',
					            'type' => 'text',
					            'title' => esc_html__('External Link', 'dentia'),
					            'validate' => 'url',
					            'default' => '',
					        ),
							array(
					            'id'=> 'service_excerpt',
					            'type' => 'textarea',
					            'title' => esc_html__('Excerpt', 'dentia'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
					        array(
					            'id'       => 'service_icon_type',
					            'type'     => 'button_set',
					            'title'    => esc_html__('Icon Type', 'dentia'),
					            'options'  => array(
					                'icon'  => esc_html__('Icon', 'dentia'),
					                'image'  => esc_html__('Image', 'dentia'),
					            ),
					            'default'  => 'icon'
					        ),
					        array(
					            'id'       => 'service_icon_font',
					            'type'     => 'pxl_iconpicker',
					            'title'    => esc_html__('Icon', 'dentia'),
					            'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'icon' ),
            					'force_output' => true
					        ),
					        array(
					            'id'       => 'service_icon_img',
					            'type'     => 'media',
					            'title'    => esc_html__('Icon Image', 'dentia'),
					            'default' => '',
					            'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'image' ),
				            	'force_output' => true
					        ),
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'dentia' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						)
				    )
				],
				'page_title_service' => [
					'title'  => esc_html__( 'Page Title Service', 'dentia' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        dentia_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
					        array(
					            'id' => 'custom_ptitle',
					            'type' => 'text',
					            'title' => esc_html__('Custom Page Title Service', 'dentia'),
					        ),
					    )
				    )
				],
			]
		],
		'product' => [
			'opt_name'            => 'pxl_product_options',
			'display_name'        => esc_html__( 'Product Options', 'dentia' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'dentia' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
					            'id'=> 'product_label',
					            'type' => 'text',
					            'title' => esc_html__('Label', 'dentia'),
					            'default' => '',
					        ),
					        array(
					            'id'=> 'product_text_btn',
					            'type' => 'text',
					            'title' => esc_html__('Text Button Video', 'dentia'),
					            'default' => '',
					        ),
					        array(
								'id'           => 'link_video',
								'type'         => 'text',
								'title'        => esc_html__( 'Link Video', 'dentia' ),
								'default'		=> '',
								'force_output' => true
							),
						)
				    )
				],
			]
		],
		'pxl-template' => [
			'opt_name'            => 'pxl_hidden_template_options',
			'display_name'        => esc_html__( 'Template Options', 'dentia' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'dentia' ),
					'icon'   => 'el-icon-website',
					'fields' => array(
						array(
							'id'    => 'template_type',
							'type'  => 'select',
							'title' => esc_html__('Type', 'dentia'),
				            'options' => [
				            	'df'       	   => esc_html__('Select Type', 'dentia'), 
								'header'       => esc_html__('Header', 'dentia'), 
								'footer'       => esc_html__('Footer', 'dentia'), 
								'mega-menu'    => esc_html__('Mega Menu', 'dentia'), 
								'page-title'   => esc_html__('Page Title', 'dentia'), 
								'tab' => esc_html__('Tab', 'dentia'),
								'wgaboutauthor' => esc_html__('Widget Sidebar', 'dentia'),
								'hidden-panel' => esc_html__('Hidden Panel', 'dentia'),
								'popup' => esc_html__('Popup', 'dentia'),
								'slider' => esc_html__('Slider', 'dentia'),
				            ],
				            'default' => 'df',
				        ),
				        array(
							'id'    => 'header_type',
							'type'  => 'select',
							'title' => esc_html__('Header Type', 'dentia'),
				            'options' => [
				            	'px-header--default'       	   => esc_html__('Default', 'dentia'), 
								'px-header--transparent'       => esc_html__('Transparent', 'dentia'),
								'px-header--fixed'       => esc_html__('Fixed', 'dentia'),
				            ],
				            'default' => 'px-header--default',
				            'indent' => true,
                			'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header' ),
				        ),
					),
				    
				],
			]
		],
	];
 
	$metabox->add_meta_data( $panels );
}
 