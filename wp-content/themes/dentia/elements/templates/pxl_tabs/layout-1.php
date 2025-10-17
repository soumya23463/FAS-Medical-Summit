<?php $html_id = pxl_get_element_id($settings); 
if(isset($settings['tabs']) && !empty($settings['tabs']) && count($settings['tabs'])): 
    $tab_bd_ids = [];
    ?>
    <div class="pxl-tabs pxl-tabs1 <?php echo esc_attr($settings['style'].' '.$settings['tab_effect'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <div class="pxl-tabs--inner">
            <div class="pxl-tabs--title">
                <?php foreach ($settings['tabs'] as $key => $title) : ?>
                    <span class="pxl-tab--title pxl-cursor--cta <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?>" data-target="#<?php echo esc_attr($html_id.'-'.$title['_id']); ?>">
                        <span class="pxl-title--text">
                            <?php echo pxl_print_html($title['title']); ?>
                        </span>
                    </span>
                <?php endforeach; ?>
            </div>
            <div class="pxl-tabs--content">
                <?php foreach ($settings['tabs'] as $key => $content) : ?>
                    <div id="<?php echo esc_attr($html_id.'-'.$content['_id']); ?>" class="pxl-tab--content <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?> <?php if($content['content_type'] == 'template') { echo 'pxl-tabs--elementor'; } ?>" <?php if($settings['tab_active'] == $key + 1) { ?>style="display: block;"<?php } ?>>
                        <?php if($content['content_type'] == 'df' && !empty($content['desc'])) {
                            echo pxl_print_html($content['desc']); 
                        } elseif($content['content_type'] == 'template' && !empty($content['content_template'])) {
                            $tab_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$content['content_template']);
                            $tab_bd_ids[] = (int)$content['content_template'];
                            pxl_print_html($tab_content);
                        } ?>        
                    </div>
                <?php endforeach; ?>
            </div>
            
        </div>
    </div>
<?php endif; ?>