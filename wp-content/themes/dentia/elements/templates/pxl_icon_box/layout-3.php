<?php
$html_id = pxl_get_element_id($settings);
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'link_text', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'link_text', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'link_text', 'rel', 'nofollow' );
    }
}
?>
<div class="pxl-icon-box pxl-icon-box3">
	<div class="pxl-item-inner">
        <?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
            <div class="pxl-item--icon <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
            </div>
        <?php endif; ?>
        <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : ?>
            <div class="pxl-item--icon <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                <?php $img_icon  = pxl_get_image_by_size( array(
                        'attach_id'  => $settings['icon_image']['id'],
                        'thumb_size' => '70x70',
                    ) );
                    $thumbnail_icon    = $img_icon['thumbnail'];
                echo pxl_print_html($thumbnail_icon); ?>
            </div>
        <?php endif; ?>
		<div class="pxl-meta-content <?php echo esc_attr($settings['pxl_animate2']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay2']); ?>ms">
            <h4 class="pxl-item-title">
                <?php echo esc_attr($settings['title']); ?>
            </h4>
            <div class="pxl-item-desc">
                <?php echo esc_attr($settings['desc']); ?>
            </div>
            <div class="pxl-btn-section">
                <a class="pxl-banner-btn" <?php pxl_print_html($widget->get_render_attribute_string( 'link_text' )); ?>>
                    <span class="pxl-btn-icon">
                        <i aria-hidden="true" class="far fa-plus"></i>
                    </span>
                    <span class="pxl-title-btn">
                        <?php echo esc_attr($settings['title_btn'])?>
                    </span>
                </a>
            </div>
		</div>
	</div>
</div>