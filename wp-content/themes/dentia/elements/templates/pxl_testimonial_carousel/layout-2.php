<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');
$arrows = $widget->get_setting('arrows','false');  
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite','false');  
$drap = $widget->get_setting('drap','false');  
$speed = $widget->get_setting('speed', '500');
$center = $widget->get_setting('center', 'false');
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1', 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => $col_xl, 
    'slides_to_show_xxl'             => $col_xxl, 
    'slides_to_show_lg'             => $col_lg, 
    'slides_to_show_md'             => $col_md, 
    'slides_to_show_sm'             => $col_sm, 
    'slides_to_show_xs'             => $col_xs, 
    'slides_to_scroll'              => $slides_to_scroll,
    'arrow'                         => $arrows,
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,
    'pagination_number'             => 'true',
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => $speed,
    'center'                         => $center,
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if(isset($settings['testimonial_lv2']) && !empty($settings['testimonial_lv2']) && count($settings['testimonial_lv2'])): 
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : '80x80'; ?>
    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel2" <?php if($drap !== 'false') : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'dentia'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner" data-center="<?php echo esc_attr($center); ?>">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial_lv2'] as $key => $value):
                        $image = isset($value['image']) ? $value['image'] : '';
                        $title_lv2 = isset($value['title_lv2']) ? $value['title_lv2'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $desc_lv2 = isset($value['desc_lv2']) ? $value['desc_lv2'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <div class="pxl-icon">
                                    <i aria-hidden="true" class="fas fa-quote-left"></i>
                                </div>
                                <?php if(!empty($image['id'])) { 
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => $image_size,
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail'];
                                    ?>
                                    <div class="pxl-item--image">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    </div>
                                <?php } ?>
                                <div class="pxl-holder-content">
                                    <div class="pxl-item--title">
                                        <?php echo pxl_print_html($title_lv2); ?>
                                    </div>
                                    <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
                                </div>
                                <div class="pxl-item--desc">
                                    <?php echo pxl_print_html($desc_lv2); ?>
                                </div>
                           </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?php if($pagination !== 'false'): ?>
            <div class="pxl-swiper-dots style-1"></div>
        <?php endif; ?>
        <?php if($arrows !== 'false'): ?>
            <div class="pxl-swiper-arrow-wrap">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="caseicon-angle-arrow-left rtl-icon"></i></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="caseicon-angle-arrow-right rtl-icon"></i></div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
