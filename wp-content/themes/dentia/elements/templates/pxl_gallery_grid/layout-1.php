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
$image_size = !empty($img_size) ? $img_size : 'full';
$image_size_popup = !empty($img_size_popup) ? $img_size_popup : 'full';
$pxl_g_id = uniqid();
?>

<div class="pxl-grid pxl-gallery-<?php echo esc_attr($pxl_g_id); ?> pxl-gallery-grid pxl-gallery-grid1 <?php echo esc_attr($settings['style']); ?>" data-layout="<?php echo esc_attr($settings['data_layout']); ?>">
    <?php if ($settings['show_fillter'] == 'true'): ?>
        <div class="pxl-grid-filter normal style-1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
            <div class="pxl--filter-inner">
                <span class="filter-item active" data-filter="*">View All</span>
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
    <?php if (isset($settings['gallery_grid']) && !empty($settings['gallery_grid']) && count($settings['gallery_grid'])): ?>
    <div class="pxl-grid-inner-gallery <?php echo esc_attr($settings['pxl_animate_inner']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_inner_delay']); ?>ms">
        <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
            <?php foreach ($settings['gallery_grid'] as $key => $value):

                $item_class = $item_class;
                if (!empty($grid_custom_columns[$key])) {
                    $col_xl = 12 / floatval($grid_custom_columns[$key]['col_xl_m']);
                    $col_lg = 12 / floatval($grid_custom_columns[$key]['col_lg_m']);
                    $col_md = 12 / floatval($grid_custom_columns[$key]['col_md_m']);
                    $col_sm = 12 / floatval($grid_custom_columns[$key]['col_sm_m']);
                    $col_xs = 12 / floatval($grid_custom_columns[$key]['col_xs_m']);
                    $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                }

                $title_view = isset($value['title_view']) ? $value['title_view'] : '';
                $cat = isset($value['cat']) ? $value['cat'] : '';
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => isset($value['image']['id']) ? $value['image']['id'] : '',
                    'thumb_size' => $image_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail']; 

                $img_popup = pxl_get_image_by_size( array(
                    'attach_id'  => isset($value['image']['id']) ? $value['image']['id'] : '',
                    'thumb_size' => $image_size_popup,
                    'class' => 'no-lazyload',
                ));
                $thumbnail_popup = $img['url']; 
                ?>
                <div class="<?php echo esc_attr($item_class); ?> <?php echo esc_attr($cat); ?>">
                    <div class="pxl-item--inner">
                        <a href="<?php echo esc_url($thumbnail_popup); ?>" data-elementor-lightbox-slideshow="pxl-gallery-<?php echo esc_attr($pxl_g_id); ?>">
                            <?php echo wp_kses_post($thumbnail); ?>
                            <span class="pxl-item--view">
                                <?php echo pxl_print_html($title_view); ?>
                            </span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>
