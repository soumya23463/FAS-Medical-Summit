<?php
$html_id = pxl_get_element_id($settings);
?>
<div class="pxl-meta-box pxl-meta-box1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-meta-inner">
        <?php if(!empty($settings['image']['id'])) :
            $image_size = !empty($settings['img_size']) ? $settings['img_size'] : '60x68';
            $img = pxl_get_image_by_size( array(
                'attach_id'  => $settings['image']['id'],
                'thumb_size' => $image_size,
            ));
            $thumbnail = isset($img['thumbnail']) ? $img['thumbnail'] : '';

            // Fallback if custom resize fails - use WordPress default thumbnail
            if (empty($thumbnail) || (is_array($img) && empty($img['url']))) {
                $thumbnail = wp_get_attachment_image($settings['image']['id'], 'thumbnail');
            }
            ?>
            <div class="pxl-item--img">
                <?php echo pxl_print_html($thumbnail); ?>
            </div>
        <?php endif; ?>
        <h5 class="pxl-item-title">
            <?php echo esc_attr($settings['title'])?>
        </h5>
    </div>
</div>