<?php
/**
 * Plugin Name: custom-elementor-widget
 * Description: Custom Elementor elements for VS&A blog.
 * Plugin URI:  https://yhlee.io
 * Version:     1.0.0
 * Author:      Yong Hoon Lee
 * Author URI:  https://yhlee.io
 * Text Domain: custom-elementor-widget
 *
 * Elementor tested up to: 3.6.8
 * Elementor Pro tested up to: 3.6.8
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Widgets.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_new_widgets( $widgets_manager ) {

  require_once( __DIR__ . '/widgets/blog-imageTextCard.php' );  // include the widget file

  $widgets_manager->register( new \Elementor_Blog_imageTextCard() );  // register the widget

}
add_action( 'elementor/widgets/register', 'register_new_widgets' );