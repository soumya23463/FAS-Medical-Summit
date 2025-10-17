<?php

if( !defined( 'ABSPATH' ) )
	exit; 

class dentia_Admin_Templates extends dentia_Base{

	public function __construct() {
		$this->add_action( 'admin_menu', 'register_page', 20 );
	}
 
	public function register_page() {
		add_submenu_page(
			'pxlart',
		    esc_html__( 'Templates', 'dentia' ),
		    esc_html__( 'Templates', 'dentia' ),
		    'manage_options',
		    'edit.php?post_type=pxl-template',
		    false
		);
	}
}
new dentia_Admin_Templates;
