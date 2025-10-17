<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');

$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);

$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";

$show_star = $widget->get_setting('show_star');
?>
<?php if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])):
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
?>
    <div class="pxl-grid pxl-testimonial-grid pxl-testimonial-grid1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-layout="<?php echo esc_attr($settings['data_layout']); ?>">
        <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
            <?php foreach ($settings['testimonial'] as $key => $value):
                $title = isset($value['title']) ? $value['title'] : '';
                $desc = isset($value['desc']) ? $value['desc'] : '';
                $position = isset($value['position']) ? $value['position'] : '';
                $image = isset($value['image']) ? $value['image'] : '';
                $style_star = isset($value['style_star']) ? $value['style_star'] : '';
                ?>
                <div class="<?php echo esc_attr($item_class); ?>">
                    <div class="pxl-item--inner">
                        <?php if( $show_star == 'true' ) : ?>
                            <div class="pxl-item--star pxl-item--<?php echo esc_attr( $style_star ); ?>-star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        <?php endif; ?>
                        <div class="pxl-item--desc">
                            <?php echo pxl_print_html($desc); ?>
                        </div>
                        <div class="pxl-item-content">
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
                            <div class="pxl-item--holder">
                                <h4 class="pxl-item--title">
                                    <?php echo pxl_print_html($title); ?>
                                </h4>
                                <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
                            </div>
                        </div>
                   </div>
                </div>
            <?php endforeach; ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        </div>
    </div>
<?php endif; ?>