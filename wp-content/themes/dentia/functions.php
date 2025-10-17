<?php
/**
 * Theme functions: init, enqueue scripts and styles, include required files and widgets.
 *
 * @package Bravis-Themes
 * @since dentia 1.0
 */

if(!defined('DEV_MODE')){ define('DEV_MODE', true); }

if(!defined('THEME_DEV_MODE_ELEMENTS') && is_user_logged_in()){
    define('THEME_DEV_MODE_ELEMENTS', true);
}
 
require_once get_template_directory() . '/inc/classes/class-main.php';

if ( is_admin() ){ 
	require_once get_template_directory() . '/inc/admin/admin-init.php'; }
 
/**
 * Theme Require
*/
dentia()->require_folder('inc');
dentia()->require_folder('inc/classes');
dentia()->require_folder('inc/theme-options');
dentia()->require_folder('template-parts/widgets');
if(class_exists('Woocommerce')){
    dentia()->require_folder('woocommerce');
}