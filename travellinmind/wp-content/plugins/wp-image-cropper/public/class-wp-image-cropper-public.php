<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.kalathiya.me
 * @since      1.0.0
 *
 * @package    Wp_Image_Cropper
 * @subpackage Wp_Image_Cropper/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Image_Cropper
 * @subpackage Wp_Image_Cropper/public
 * @author     Hardik Kalathiya <hardikkalathiya93@gmail.com>
 */
class Wp_Image_Cropper_Public {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Wp_Image_Cropper_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Wp_Image_Cropper_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wp-image-cropper-public.css', array(), $this->version, 'all');

        wp_enqueue_style('public_hk_cropper_css', plugin_dir_url(__FILE__) . 'css/cropper.min.css',array(), time());
        wp_enqueue_style('public_hk_main_css', plugin_dir_url(__FILE__) . 'css/main.css',array(), time());
        wp_enqueue_style('public_hk_main_cfsddds', plugin_dir_url(__FILE__) . 'css/bootstrap.min.css',array(), time());
        wp_enqueue_style('public_hk_responsive', plugin_dir_url(__FILE__) . 'css/hk_cropper_responsive.css',array(), time());
        wp_enqueue_style('public_hk_custom_css', plugin_dir_url(__FILE__) . 'css/hk_cropper_custom.css',array(), time());
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Wp_Image_Cropper_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Wp_Image_Cropper_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wp-image-cropper-public.js', array('jquery'), $this->version, false);

        wp_enqueue_script('public_hk_main_js_hk', plugin_dir_url(__FILE__) . 'js/main.js', array('jquery'), time());
        wp_enqueue_script('public_hk_crop_js', plugin_dir_url(__FILE__) . 'js/cropper.min.js', array('jquery'), time(), true);
        wp_enqueue_script('public_hk_bootstrap_min_js', plugin_dir_url(__FILE__) . 'js/bootstrap.min.js', array('jquery'), time(), true);
    }

}
