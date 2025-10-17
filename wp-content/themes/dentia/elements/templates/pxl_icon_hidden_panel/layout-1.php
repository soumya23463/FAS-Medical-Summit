<?php 
$template = (int)$widget->get_setting('content_template','0');
$target = '.pxl-hidden-template-'.$template;
if($template > 0 ){
	if ( !has_action( 'pxl_anchor_target_hidden_panel_'.$template) ){
		add_action( 'pxl_anchor_target_hidden_panel_'.$template, 'dentia_hook_anchor_hidden_panel' );
	} 
}
?>
<div class="pxl-hidden-panel-button pxl-anchor-button1 pxl-cursor--cta <?php echo esc_attr($settings['style']); ?>" data-target="<?php echo esc_attr($target)?>">
	<ul class="pxl-button-sidebar">
		<li class="pxl-icon-line pxl-icon-line1"></li>
		<li class="pxl-icon-line pxl-icon-line2"></li>
	</ul>
</div>