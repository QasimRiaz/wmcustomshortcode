<?php 
/**
 * Plugin Name:       Wm Custom Shortcode
 * Plugin URI:        https://github.com/QasimRiaz/wm-custom-shortcode
 * Description:       Create New Custom Shortcode
 * Version:           1.0.0
 * Author:            Qasim
 * License:           GNU General Public License v2
 * Text Domain:       WM
 * Network:           true
 * GitHub Plugin URI: https://github.com/QasimRiaz/wm-custom-shortcode
 * Requires WP:       5.0.3
 * Requires PHP:      7.4
 * Date 07/06/2022
 */



define( 'WMCUSTOMSHORTCODE__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WMCUSTOMSHORTCODE_VERSION', '1.1.2' );


register_activation_hook( __FILE__, array( 'WMCustomshortcode', 'wm_custom_shortcode_plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'WMCustomshortcode', 'wm_custom_shortcode_plugin_deactivation' ) );



require_once( WMCUSTOMSHORTCODE__PLUGIN_DIR . 'class.wmcustomshortcode.php' );


add_action( 'init', array( 'WmCustomShortCode', 'init' ) );
add_action( 'init', array( 'WmCustomShortCode', 'wm_register_shortcode_posttype' ), 0 );
add_action( 'acf/init', array( 'WmCustomShortCode', 'register_custom_acf_fields' ) );
add_action( 'manage_wm-custom-shortcode_posts_custom_column' , array( 'WmCustomShortCode', 'wm_custom_shortcode_column_value' ) , 10, 2 );

add_shortcode( 'wm-custom-shortcode', array( 'WmCustomShortCode', 'wm_custom_shortcode' ) );


add_action( "wp_ajax_loadfrm", array( 'WmCustomShortCode', 'wm_custom_shortcode_loadfrm' ) );
add_action( "wp_ajax_nopriv_loadfrm", array( 'WmCustomShortCode', 'wm_custom_shortcode_loadfrm' ) );

add_action( 'frm_form_classes', array( 'WmCustomShortCode', 'wmcustomcode_formidable_class' )  );