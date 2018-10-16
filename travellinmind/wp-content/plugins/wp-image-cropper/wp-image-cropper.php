<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.kalathiya.me
 * @since             1.0.0
 * @package           Wp_Image_Cropper
 *
 * @wordpress-plugin
 * Plugin Name:       WP Image Cropper
 * Plugin URI:        www.kalathiyaplugins.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Hardik Kalathiya
 * Author URI:        www.kalathiya.me
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-image-cropper
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-image-cropper-activator.php
 */
function activate_wp_image_cropper() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-image-cropper-activator.php';
	Wp_Image_Cropper_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-image-cropper-deactivator.php
 */
function deactivate_wp_image_cropper() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-image-cropper-deactivator.php';
	Wp_Image_Cropper_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_image_cropper' );
register_deactivation_hook( __FILE__, 'deactivate_wp_image_cropper' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-image-cropper.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_image_cropper() {

	$plugin = new Wp_Image_Cropper();
	$plugin->run();

}
run_wp_image_cropper();
