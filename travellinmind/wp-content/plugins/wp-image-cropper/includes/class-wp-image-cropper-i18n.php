<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       www.kalathiya.me
 * @since      1.0.0
 *
 * @package    Wp_Image_Cropper
 * @subpackage Wp_Image_Cropper/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Image_Cropper
 * @subpackage Wp_Image_Cropper/includes
 * @author     Hardik Kalathiya <hardikkalathiya93@gmail.com>
 */
class Wp_Image_Cropper_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-image-cropper',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
