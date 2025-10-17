<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_button',
        'title' => esc_html__('BR Button', 'dentia' ),
        'icon' => 'eicon-button',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'dentia' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'btn_action',
                            'label' => esc_html__('Action', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-atc-link',
                            'options' => [
                                'pxl-atc-link' => esc_html__('Link', 'dentia' ),
                                'pxl-atc-onepage' => esc_html__('Onepage', 'dentia' ),
                            ],
                        ),
                        array(
                            'name' => 'onepage_offset',
                            'label' => esc_html__('Onepage Offset', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'condition' => [
                                'btn_action' => ['pxl-atc-onepage'],
                            ],
                        ),
                        array(
                            'name' => 'btn_style',
                            'label' => esc_html__('Type', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'btn-default',
                            'options' => [
                                'btn-default' => esc_html__('Default', 'dentia' ),
                                'btn-nanuk' => esc_html__('Nanuk', 'dentia' ),
                                'btn-nina' => esc_html__('Nina', 'dentia' ),
                                'btn-slide-lr' => esc_html__('Slide Left to Right', 'dentia' ),
                            ],
                        ),
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Text', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Click Here', 'dentia'),
                            'condition' => [
                                'btn_action' => ['pxl-atc-link','pxl-atc-onepage'],
                            ],
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'condition' => [
                                'btn_action' => ['pxl-atc-link','pxl-atc-onepage'],
                            ],
                            'default' => [
                                'url' => '#',
                            ],
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left'    => [
                                    'title' => esc_html__('Left', 'dentia' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'dentia' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'dentia' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__('Justified', 'dentia' ),
                                    'icon' => 'fa fa-align-justify',
                                ],
                            ],
                            'prefix_class' => 'elementor-align-',
                            'default' => '',
                            'selectors'         => [
                                '{{WRAPPER}} .pxl-button' => 'text-align: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'btn_icon',
                            'label' => esc_html__('Icon', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'label_block' => true,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'icon_align',
                            'label' => esc_html__('Icon Position', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'left',
                            'options' => [
                                'left' => esc_html__('Before', 'dentia' ),
                                'right' => esc_html__('After', 'dentia' ),
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button Normal', 'dentia' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__('Background Color', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn:after' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__('Typography', 'dentia' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-button .btn',
                        ),
                        array(
                            'name'         => 'btn_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'dentia' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-button .btn',
                        ),
                        array(
                            'name' => 'border_type',
                            'label' => esc_html__( 'Border Type', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'None', 'dentia' ),
                                'solid' => esc_html__( 'Solid', 'dentia' ),
                                'double' => esc_html__( 'Double', 'dentia' ),
                                'dotted' => esc_html__( 'Dotted', 'dentia' ),
                                'dashed' => esc_html__( 'Dashed', 'dentia' ),
                                'groove' => esc_html__( 'Groove', 'dentia' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'border-style: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__( 'Border Color', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'btn_border_radius',
                            'label' => esc_html__('Border Radius', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_padding',
                            'label' => esc_html__('Padding', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_button_hover',
                    'label' => esc_html__('Button Hover', 'dentia' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color Hover', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover .pxl--btn-text, {{WRAPPER}} .pxl-button .btn:focus .pxl--btn-text' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_hover',
                            'label' => esc_html__('Background Color', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn.btn-default:hover, {{WRAPPER}} .pxl-button .btn.btn-slide-lr:hover' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default:hover, {{WRAPPER}} .pxl-button .btn.btn-default:hover' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default:hover, {{WRAPPER}} .pxl-button .btn.btn-nina:hover' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default:hover, {{WRAPPER}} .pxl-button .btn.btn-nanuk:hover' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_active',
                            'label' => esc_html__('Background Color Active', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn.btn-default:active, {{WRAPPER}} .pxl-button .btn.btn-slide-lr:active' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default:active, {{WRAPPER}} .pxl-button .btn.btn-default:active' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default:active, {{WRAPPER}} .pxl-button .btn.btn-nina:active' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default:active, {{WRAPPER}} .pxl-button .btn.btn-nanuk:active' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_focus',
                            'label' => esc_html__('Background Color Focus', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn.btn-default:focus, {{WRAPPER}} .pxl-button .btn.btn-slide-lr:focus' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default:focus, {{WRAPPER}} .pxl-button .btn.btn-default:focus' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default:focus, {{WRAPPER}} .pxl-button .btn.btn-nina:focus' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default:focus, {{WRAPPER}} .pxl-button .btn.btn-nanuk:focus' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'border_color_hover',
                            'label' => esc_html__( 'Border Color Hover', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover' => 'border-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name'         => 'btn_box_shadow_hover',
                            'label' => esc_html__( 'Box Shadow', 'dentia' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-button .btn:hover',
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'dentia' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn i' => 'color: {{VALUE}};',
                            ],
                            
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Font Size', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_space_left',
                            'label' => esc_html__('Icon Spacer', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'default' => [
                                'size' => 9,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-icon--left i' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_align' => ['left'],
                            ],
                        ),
                        array(
                            'name' => 'icon_space_right',
                            'label' => esc_html__('Icon Spacer', 'dentia' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'default' => [
                                'size' => 9,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-icon--right i' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_align' => ['right'],
                            ],
                        ),
                    ),
                ),
                dentia_widget_animation_settings(),
            ),
        ),
    ),
    dentia_get_class_widget_path()
);