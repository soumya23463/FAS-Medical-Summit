<?php
$html_id = pxl_get_element_id($settings);

// Social
$social = isset($settings['social']) ? $settings['social'] : '';
$team_social = !empty($social) ? json_decode($social, true) : [];
?>

<div id="<?php echo esc_attr($html_id); ?>" class="pxl-banner-box pxl-banner-box1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-banner-inner">
        <div class="row">
            <!-- Image Section -->
            <div class="col-md-4 pxl-inner-section">
                <?php if (!empty($settings['image']['id'])) :
                    $image_size = !empty($settings['img_size']) ? $settings['img_size'] : '1000x1350';
                    $img = pxl_get_image_by_size([
                        'attach_id'  => $settings['image']['id'],
                        'thumb_size' => $image_size,
                    ]);
                    ?>
                    <div class="pxl-item--img">
                        <?php echo pxl_print_html($img['thumbnail']); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Content Section -->
            <div class="col-md-8 pxl-inner-section">
                <div class="pxl-item-content">
                    <?php if (!empty($settings['number'])): ?>
                        <div class="pxl-item-number">
                            <?php echo esc_html($settings['number']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="pxl-content-heading">
                        <?php if (!empty($settings['title'])): ?>
                            <h3 class="pxl-item-title">
                                <?php echo esc_html($settings['title']); ?>
                            </h3>
                        <?php endif; ?>
                        <?php if (!empty($settings['sub_title'])): ?>
                            <div class="pxl-sub-title">
                                <?php echo esc_html($settings['sub_title']); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="pxl-content-expertise">
                        <?php if (!empty($settings['title_expertise'])): ?>
                            <h4 class="pxl-level pxl-title-expertise">
                                <?php echo esc_html($settings['title_expertise']); ?>
                            </h4>
                        <?php endif; ?>
                        <?php if (!empty($settings['desc_expertise'])): ?>
                            <div class="pxl-desc-expertise">
                                <?php echo esc_html($settings['desc_expertise']); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($settings['banner_list']) && is_array($settings['banner_list'])): ?>
                        <div class="pxl-inner-list">
                            <?php foreach ($settings['banner_list'] as $value): ?>
                                <div class="pxl-item">
                                    <?php if (!empty($value['title_check'])): ?>
                                        <h4 class="pxl-level pxl-title-check">
                                            <?php echo pxl_print_html($value['title_check']); ?>
                                        </h4>
                                    <?php endif; ?>

                                    <?php if (!empty($value['desc_check'])): ?>
                                        <div class="pxl-desc-check">
                                            <span class="pxl-item--icon"><i class="caseicon-check"></i></span>
                                            <span class="pxl-desc-check"><?php echo pxl_print_html($value['desc_check']); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($value['desc_check_lv2'])): ?>
                                        <div class="pxl-desc-check lv2">
                                            <span class="pxl-item--icon"><i class="caseicon-check"></i></span>
                                            <span class="pxl-desc-check"><?php echo pxl_print_html($value['desc_check_lv2']); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($team_social)): ?>
                        <div class="pxl-social--wrap">
                            <div class="pxl-social--icon">
                                <?php foreach ($team_social as $item): ?>
                                    <?php
                                    $icon = !empty($item['icon']) ? $item['icon'] : '';
                                    $url  = !empty($item['url']) ? $item['url'] : '#';
                                    if (!$icon) {
                                        continue;
                                    }
                                    ?>
                                    <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer">
                                        <i class="<?php echo esc_attr($icon); ?>"></i>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>