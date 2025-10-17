<?php
$templates_df = ['0' => esc_html__('None', 'dentia')];
$templates = $templates_df + dentia_get_templates_option('hidden-panel') ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon_hidden_panel',
        'title' => esc_html__('BR Hidden Panel', 'dentia' ),
        'icon' => 'eicon-menu-bar',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'dentia' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'content_template',
                            'label' => esc_html__('Select Template', 'dentia'),
                            'type' => 'select',
                            'options' => $templates,
                            'default' => 'df',
                            'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-hidden-panel-button .pxl-button-sidebar .pxl-icon-line span' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'Default',
                                'style-2' => 'Style2',
                            ],
                            'default' => 'style-default',
                        ),
                    ),
                ),
            ),
        ),
    ),
    dentia_get_class_widget_path()
);