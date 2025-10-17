<?php

$col_xl = $widget->get_setting('col_xl', '');
$col_lg = 12 / floatval($widget->get_setting('col_lg', 4));
$col_md = 12 / floatval($widget->get_setting('col_md', 3));
$col_sm = 12 / floatval($widget->get_setting('col_sm', 2));
$col_xs = 12 / floatval($widget->get_setting('col_xs', 1));

$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$grid_custom_columns = $widget->get_setting('grid_masonry', []);
$msclass = is_admin() ? 'pxl-grid-masonry-adm' : 'pxl-grid-masonry';

if(isset($grid_custom_columns) && !empty($grid_custom_columns) && (count($grid_custom_columns) > 1)) {
    $layout_mode = 'fitRows';
}
if (!empty($grid_custom_columns)) {
    $col_xl_s = 12 / floatval($grid_custom_columns[0]['col_xl_m']);
    $col_lg_s = 12 / floatval($grid_custom_columns[0]['col_lg_m']);
    $col_md_s = 12 / floatval($grid_custom_columns[0]['col_md_m']);
    $col_sm_s = 12 / floatval($grid_custom_columns[0]['col_sm_m']);
    $col_xs_s = 12 / floatval($grid_custom_columns[0]['col_xs_m']);
    $grid_sizer = "col-xl-{$col_xl_s} col-lg-{$col_lg_s} col-md-{$col_md_s} col-sm-{$col_sm_s} col-{$col_xs_s}";
}
?>

<div class="pxl-grid pxl-showcase-grid pxl-showcase-grid1 <?php echo esc_attr($settings['style']); ?>" data-layout="<?php echo esc_attr($settings['data_layout']); ?>">
    <?php if ($settings['show_fillter'] == 'true'): ?>
        <div class="pxl-grid-filter normal style-1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
            <div class="pxl--filter-inner">
                <span class="filter-item active" data-filter="*">All Pages</span>
                <?php foreach ($settings['list_name'] as $key2 => $value2):
                    $title_fillter = isset($value2['title_fillter']) ? $value2['title_fillter'] : '';
                    ?>
                    <span class="filter-item" data-filter="<?php echo esc_attr('.' . $title_fillter); ?>">
                        <?php echo esc_html($title_fillter); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif ?>
    <?php if (isset($settings['showcase_grid']) && !empty($settings['showcase_grid']) && count($settings['showcase_grid'])):
    $image_size = !empty($settings['img_size']) ? $settings['img_size'] : '600x550'; ?>
    <div class="pxl-grid-inner-showcase <?php echo esc_attr($settings['pxl_animate_inner']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_inner_delay']); ?>ms">
        <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
            <?php foreach ($settings['showcase_grid'] as $key => $value):

                $item_class = $item_class;
                if (!empty($grid_custom_columns[$key])) {
                    $col_xl = 12 / floatval($grid_custom_columns[$key]['col_xl_m']);
                    $col_lg = 12 / floatval($grid_custom_columns[$key]['col_lg_m']);
                    $col_md = 12 / floatval($grid_custom_columns[$key]['col_md_m']);
                    $col_sm = 12 / floatval($grid_custom_columns[$key]['col_sm_m']);
                    $col_xs = 12 / floatval($grid_custom_columns[$key]['col_xs_m']);
                    $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                }

                $title = isset($value['title']) ? $value['title'] : '';
                $new = isset($value['new']) ? $value['new'] : '';
                $title_btn = isset($value['title_btn']) ? $value['title_btn'] : '';
                $cat = isset($value['cat']) ? $value['cat'] : '';
                $image = isset($value['image']) ? $value['image'] : '';
                $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
                if ( ! empty( $value['link']['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $value['link']['url'] );

                    if ( $value['link']['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }

                    if ( $value['link']['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key );
                ?>
                <div class="<?php echo esc_attr($item_class); ?> <?php echo esc_attr($cat); ?>">
                    <div class="pxl-item--inner">
                        <div class="pxl-img-inner">
                            <?php if(!empty($image['id'])) { 
                                $img = pxl_get_image_by_size( array(
                                    'attach_id'  => $image['id'],
                                    'thumb_size' => $image_size,
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail'];
                                ?>
                                <div class="pxl-item--image">
                                    <a class="pxl-link-img" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if ( ! empty( $link_attributes ) ) : ?>
                                <div class="pxl-showcase-btn">
                                    <a class="btn btn-primary" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                        <?php echo pxl_print_html( $title_btn ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="pxl-item-content">
                            <?php if ( ! empty( $new ) ) : ?>
                                <div class="pxl-item--new">
                                    <?php echo pxl_print_html($new); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( ! empty( $title ) ) : ?>
                                <h5 class="pxl-item--title">
                                    <?php echo pxl_print_html($title); ?>
                                </h5>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>
