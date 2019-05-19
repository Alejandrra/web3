<?php
/**
 Plugin Name: Hunk Companion
 Plugin URI: https://themehunk.com/hunk-companion/
 Description: This plugin is an add-on for the Gogo WordPress Theme. It offers premium features & functionalities that enhance your theming experience at next level..
 Version: 1.0.4
 Author: Themehunk Team
 Text Domain: hunk-companion
 Author URI: https://themehunk.com/
 @package Gogo Addon
 */
if ( ! defined( 'ABSPATH' ) ) exit;
function hunk_customizer_text_domain(){
	$theme = wp_get_theme();
	$themeArr=array();
	$themeArr[] = $theme->get( 'TextDomain' );
	return $themeArr;
}
$theme = hunk_customizer_text_domain(); 
if(!in_array("gogo", $theme)){
   return;
}
// Version constant for easy CSS refreshes
define('HUNK_COMPANION', '1.0.2');
define('HUNK_COMPANION_EXT_FILE', __FILE__ );
define('HUNK_COMPANION_PLUGIN_DIR_URL', plugin_dir_url(HUNK_COMPANION_EXT_FILE));
define('HUNK_COMPANION_BASENAME', plugin_basename(HUNK_COMPANION_EXT_FILE) );
define('HUNK_COMPANION_DIR_PATH', plugin_dir_path(HUNK_COMPANION_EXT_FILE ) );
require_once HUNK_COMPANION_DIR_PATH . 'gogolite/admin/gogo-function.php';
add_action('after_setup_theme', 'gogolite_addon_load_plugin');
function gogolite_addon_load_plugin(){
require_once HUNK_COMPANION_DIR_PATH . 'gogolite/admin/init.php';
}
add_filter('body_class', 'hunk_companion_gogolite_body_classes');
function hunk_companion_gogolite_body_classes($classes){
         $classes[] = 'gogolite';
         return $classes;
}
function hunk_companion_gogolite_scripts(){
//Gogo frontpage styles	
wp_enqueue_style( 'gogo_section_css', HUNK_COMPANION_PLUGIN_DIR_URL.'gogolite/css/gogo-css/section.css', array(), '1.0.0' );
wp_enqueue_style( 'animate', HUNK_COMPANION_PLUGIN_DIR_URL.'gogolite/css/gogo-css/animate.css', array(), '1.0.0' );
//Gogo frontpage scripts
 wp_enqueue_script( 'owl.carousel', HUNK_COMPANION_PLUGIN_DIR_URL.'gogolite/js/gogo-js/owl.carousel.js', array( 'jquery' ), '', true );
 wp_enqueue_script( 'typer', HUNK_COMPANION_PLUGIN_DIR_URL.'gogolite/js/gogo-js/typer.js', array( 'jquery' ), '1.0.0', true );
 wp_enqueue_script( 'isotope.pkgd', HUNK_COMPANION_PLUGIN_DIR_URL.'gogolite/js/gogo-js/isotope.pkgd.js', array( 'jquery' ), '', false );
 wp_enqueue_script( 'izimodal', HUNK_COMPANION_PLUGIN_DIR_URL.'gogolite/js/gogo-js/iziModal.js', array( 'jquery' ), '1.0.0', false );
 wp_enqueue_script( 'vertical-navigation-modernizr', HUNK_COMPANION_PLUGIN_DIR_URL.'gogolite/js/gogo-js/vertical-navigation-modernizr.js', array( 'jquery' ), '', false );
 wp_enqueue_script( 'vertical-navigation-main', HUNK_COMPANION_PLUGIN_DIR_URL.'gogolite/js/gogo-js/vertical-navigation-main.js', array( 'jquery' ), '', false );
 wp_enqueue_script( 'wow', HUNK_COMPANION_PLUGIN_DIR_URL.'gogolite/js/gogo-js/wow.min.js', array( 'jquery' ), '', false );
 wp_enqueue_script( 'masonry', array( 'imagesloaded' ));
 wp_enqueue_script( 'gogo-frontpage-custom-js', HUNK_COMPANION_PLUGIN_DIR_URL.'gogolite/js/gogo-js/custom.js', array( 'jquery' ), '', false );
 wp_localize_script( 'gogo-frontpage-custom-js', 'frontendajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
}
add_action( 'wp_enqueue_scripts', 'hunk_companion_gogolite_scripts' );