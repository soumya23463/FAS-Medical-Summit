<?php

class PxlSlider_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_slider';
    protected $title = 'BR Slider';
    protected $icon = 'eicon-slider-device';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"slides","label":"Slides","type":"repeater","controls":[{"name":"slide_template","label":"Select Template","type":"select","options":{"0":"None","568":"Main Slide1 Home 01","597":"Main Slide2 Home 01"},"default":"df","description":"Add new tab template: \"<a href=\"http:\/\/localhost\/blaxcut\/wp-admin\/edit.php?post_type=pxl-template\" target=\"_blank\">Click Here<\/a>\""},{"name":"bg_color","label":"Background Color","type":"color","selectors":{"{{WRAPPER}} .pxl-element-slider {{CURRENT_ITEM}}":"background-color: {{VALUE}};"}},{"name":"bg_image","label":"Background Image","type":"media"}]}]},{"name":"section_settings_carousel","label":"Settings","tab":"settings","controls":[{"name":"arrows","label":"Show Arrows","type":"switcher"},{"name":"pagination","label":"Show Pagination","type":"switcher","default":"false"},{"name":"pagination_type","label":"Pagination Type","type":"select","default":"bullets","options":{"bullets":"Bullets","fraction":"Fraction"},"condition":{"pagination":"true"}},{"name":"pause_on_hover","label":"Pause on Hover","type":"switcher"},{"name":"autoplay","label":"Autoplay","type":"switcher"},{"name":"autoplay_speed","label":"Autoplay Delay","type":"number","default":5000,"condition":{"autoplay":"true"}},{"name":"infinite","label":"Infinite Loop","type":"switcher"},{"name":"speed","label":"Animation Speed","type":"number","default":500},{"name":"drap","label":"Show Scroll Drap","type":"switcher","default":"false"},{"name":"progressbar","label":"Show Progress Bar","type":"switcher","default":"false"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'swiper','pxl-swiper' );
}