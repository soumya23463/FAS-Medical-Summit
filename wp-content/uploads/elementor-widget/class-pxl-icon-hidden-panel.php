<?php

class PxlIconHiddenPanel_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_icon_hidden_panel';
    protected $title = 'BR Hidden Panel';
    protected $icon = 'eicon-menu-bar';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"content_template","label":"Select Template","type":"select","options":["None"],"default":"df","description":"Add new tab template: \"<a href=\"http:\/\/localhost\/FAS-Medical-Summit\/wp-admin\/edit.php?post_type=pxl-template\" target=\"_blank\">Click Here<\/a>\""},{"name":"icon_color","label":"Icon Color","type":"color","selectors":{"{{WRAPPER}} .pxl-hidden-panel-button .pxl-button-sidebar .pxl-icon-line span":"background-color: {{VALUE}} !important;"}},{"name":"style","label":"Style","type":"select","options":{"style-default":"Default","style-2":"Style2"},"default":"style-default"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}