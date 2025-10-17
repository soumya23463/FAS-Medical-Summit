<?php

if (!class_exists('dentia_Footer')) {

    class dentia_Footer
    {
        public function getFooter()
        {
            if(is_singular('elementor_library')) return;
            
            $footer_layout = (int)dentia()->get_opt('footer_layout');
            
            if ($footer_layout <= 0 || !class_exists('Pxltheme_Core') || !is_callable( 'Elementor\Plugin::instance' )) {
                get_template_part( 'template-parts/footer/default');
            } else {
                $args = [
                    'footer_layout' => $footer_layout
                ];
                get_template_part( 'template-parts/footer/elementor','', $args );
            } 

            // Back To Top
            $back_totop_on = dentia()->get_theme_opt('back_totop_on', true); 
            if (isset($back_totop_on) && $back_totop_on) : ?>
                <a class="pxl-scroll-top" href="#"><i class="caseicon-angle-arrow-up"></i></a>
            <?php endif;

            // Mouse Move Animation
            dentia_mouse_move_animation();

            // Cookie Policy
            dentia_cookie_policy();

            // Subscribe Popup
            dentia_subscribe_popup();

            // Page Popup
            dentia_page_popup();
            
        }
 
    }
}
 