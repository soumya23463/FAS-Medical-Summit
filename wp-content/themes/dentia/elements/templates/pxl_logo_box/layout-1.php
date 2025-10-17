<?php
if ( ! empty( $settings['logo_link']['url'] ) ) {
    $widget->add_render_attribute( 'logo_link', 'href', $settings['logo_link']['url'] );

    if ( $settings['logo_link']['is_external'] ) {
        $widget->add_render_attribute( 'logo_link', 'target', '_blank' );
    }

    if ( $settings['logo_link']['nofollow'] ) {
        $widget->add_render_attribute( 'logo_link', 'rel', 'nofollow' );
    }
}

$thumbnail = '';
if (!empty($settings['logo']['id'])) { 
    $img = pxl_get_image_by_size( array(
        'attach_id'  => $settings['logo']['id'],
        'thumb_size' => 'full',
    ) );
    $thumbnail = $img['thumbnail'];
}

$thumbnail_light = '';
if (!empty($settings['logo_lv2']['id'])) { 
    $img_light = pxl_get_image_by_size( array(
        'attach_id'  => $settings['logo_lv2']['id'],
        'thumb_size' => 'full',
    ) );
    $thumbnail_light = $img_light['thumbnail'];
}

if ( $thumbnail || $thumbnail_light ) :
?>
<div class="pxl-logo-box <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php if ( ! empty( $settings['logo_link']['url'] ) ) { ?>
        <a <?php pxl_print_html($widget->get_render_attribute_string( 'logo_link' )); ?>>
    <?php } ?>

        <span class="pxl-logo-lv1">
            <?php echo wp_kses_post($thumbnail); ?>
        </span>
        <span class="pxl-logo-lv2">
            <?php echo wp_kses_post($thumbnail_light); ?>
        </span>

    <?php if ( ! empty( $settings['logo_link']['url'] ) ) { ?>
        </a>
    <?php } ?>
</div>
<?php endif; ?>
