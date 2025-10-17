<?php if(!function_exists('dentia_configs')){
    function dentia_configs($value){
        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'dentia'), 
                    'value' => dentia()->get_opt('primary_color', '#4A7CD2')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'dentia'), 
                    'value' => dentia()->get_opt('secondary_color', '#93a0af')
                ],
                'body-bg'   => [
                    'title' => esc_html__('Body Background Color', 'dentia'), 
                    'value' => dentia()->get_page_opt('body_bg_color', '#fff')
                ]
            ],
            'link' => [
                'color' => dentia()->get_opt('link_color', ['regular' => '#10244b'])['regular'],
                'color-hover'   => dentia()->get_opt('link_color', ['hover' => '#10244b'])['hover'],
                'color-active'  => dentia()->get_opt('link_color', ['active' => '#10244b'])['active'],
            ],
            'gradient' => [
                'color-from' => dentia()->get_opt('gradient_color', ['from' => '#10244b'])['from'],
                'color-to' => dentia()->get_opt('gradient_color', ['to' => '#10244b'])['to'],
            ],
               
        ];
        return $configs[$value];
    }
}
if(!function_exists('dentia_inline_styles')) {
    function dentia_inline_styles() {  
        
        $theme_colors      = dentia_configs('theme_colors');
        $link_color        = dentia_configs('link');
        $gradient_color    = dentia_configs('gradient');
        ob_start();
        echo ':root{';
            
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  dentia_hex_rgb($value['value']));
            }
            foreach ($link_color as $color => $value) {
                printf('--link-%1$s: %2$s;', $color, $value);
            }
            foreach ($gradient_color as $color => $value) {
                printf('--gradient-%1$s: %2$s;', $color, $value);
            }
        echo '}';

        return ob_get_clean();
         
    }
}
 