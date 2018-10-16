<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.kalathiya.me
 * @since      1.0.0
 *
 * @package    Wp_Image_Cropper
 * @subpackage Wp_Image_Cropper/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Image_Cropper
 * @subpackage Wp_Image_Cropper/admin
 * @author     Hardik Kalathiya <hardikkalathiya93@gmail.com>
 */
class Wp_Image_Cropper_Admin {

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
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

        add_shortcode("wp_image_cropper", array($this, "wp_image_cropper"));
    }

    /**
     * Register the stylesheets for the admin area.
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
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wp-image-cropper-admin.css', array(), $this->version, 'all');

        wp_enqueue_style('hk_cropper_css', plugin_dir_url(__FILE__) . 'css/cropper.min.css', array(), time());
        wp_enqueue_style('hk_main_css', plugin_dir_url(__FILE__) . 'css/main.css', array(), time());
        wp_enqueue_style('hk_main_cfsddds', plugin_dir_url(__FILE__) . 'css/bootstrap.min.css', array(), time());
        wp_enqueue_style('hk_responsive', plugin_dir_url(__FILE__) . 'css/hk_cropper_responsive.css', array(), time());
        wp_enqueue_style('hk_custom_css', plugin_dir_url(__FILE__) . 'css/hk_cropper_custom.css', array(), time());
    }

    /**
     * Register the JavaScript for the admin area.
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
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wp-image-cropper-admin.js', array('jquery'), $this->version, false);

        wp_enqueue_script('hk_main_js_hk', plugin_dir_url(__FILE__) . 'js/main.js', array('jquery'), time());
        wp_enqueue_script('hk_crop_js', plugin_dir_url(__FILE__) . 'js/cropper.min.js', array('jquery'), time(), true);
        wp_enqueue_script('hk_bootstrap_min_js', plugin_dir_url(__FILE__) . 'js/bootstrap.min.js', array('jquery'), time(), true);
    }
    
       public function add_custom_menu_in_dashboard() {
        add_menu_page('WPImageCropper', 'WP Image Cropper', 'manage_options', array($this,'wp_image_cropper'), array($this, 'wp_image_cropper'), plugin_dir_url(__FILE__) . '/img/icon.png', 100);
    }


    public function wp_image_cropper() {
        ?>
        <div class="hk_cropper_mian_outer_wrap" id='hk_cropper_outer_wrap'>
            <div class="jumbotron docs-jumbotron">
                <div class="container">
                    <h1 class="title_tag"><b>HK's</b> Image Cropper <small class="version hk_version">v1.0.0</small></h1>
                    <p class="lead hk_lead">A wordpress image cropping plugin.</p>      
                </div>
            </div>
            <div class="container docs-overview hk_main_wrap space_more_90"  >        
                <div class="row">
                    <div class="col-md-9">
                        <h3  class="hk_space">Image:</h3>
                        <div class="img-container"><img src="<?php echo plugin_dir_url(__FILE__); ?>/img/picture-1.jpg"></div>
                        <div class="docs-toolbar">
                            <div class="btn-group">
                                <button class="btn btn-primary" data-method="zoom" data-option="0.1" type="button" title="Zoom In">
                                    <span class="docs-tooltip" data-toggle="tooltip" title="Zoom In">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </span>
                                </button>
                                <button class="btn btn-primary" data-method="zoom" data-option="-0.1" type="button" title="Zoom Out">
                                    <span class="docs-tooltip" data-toggle="tooltip" title="Zoom Out">
                                        <span class="glyphicon glyphicon-zoom-out"></span>
                                    </span>
                                </button>
                                <button class="btn btn-primary" data-method="rotate" data-option="-90" type="button" title="Rotate Left">
                                    <span class="docs-tooltip" data-toggle="tooltip" title="Rotate Left">
                                        <span class="glyphicon glyphicon-share-alt docs-flip-horizontal"></span>
                                    </span>
                                </button>
                                <button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="Rotate Right">
                                    <span class="docs-tooltip" data-toggle="tooltip" title="Rotate Right">
                                        <span class="glyphicon glyphicon-share-alt"></span>
                                    </span>
                                </button>
                                <button class="btn btn-primary" data-method="setDragMode" data-option="move" type="button" title="Move">
                                    <span class="docs-tooltip" data-toggle="tooltip" title="Move">
                                        <span class="glyphicon glyphicon-move"></span>
                                    </span>
                                </button>
                                <button class="btn btn-primary" data-method="setDragMode" data-option="crop" type="button" title="Crop">
                                    <span class="docs-tooltip" data-toggle="tooltip" title="Crop">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </span>
                                </button>
                                <button class="btn btn-primary" data-method="clear" type="button" title="Clear">
                                    <span class="docs-tooltip" data-toggle="tooltip" title="Clear">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </span>
                                </button>
                                <label class="btn btn-primary" for="inputImage" title="Upload image file">
                                    <input class="hide" id="inputImage" name="file" type="file" accept="image/*">
                                    <span class="docs-tooltip" data-toggle="tooltip" title="Upload Image">
                                        <span class="glyphicon glyphicon-upload"></span>
                                    </span>
                                </label>

                            </div>       
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h3>Preview:</h3>
                        <div class="row">

                            <div class="docs-preview clearfix">
                                <div class="img-preview img-preview-lg  img_preview_one"></div>
                                <div class="img-preview img-preview-md img_preview_two" ></div>
                                <div class="img-preview img-preview-sm img_preview_three" ></div>
                                <div class="img-preview img-preview-xs img_preview_four" ></div>
                            </div>

                        </div>
                        <hr>
                        <h3>Data:</h3>
                        <div class="docs-data">
                            <div class="input-group">
                                <label class="input-group-addon" for="dataX">X</label>
                                <input class="form-control" id="dataX" type="text" placeholder="x">
                                <span class="input-group-addon">px</span>
                            </div>
                            <div class="input-group">
                                <label class="input-group-addon" for="dataY">Y</label>
                                <input class="form-control" id="dataY" type="text" placeholder="y">
                                <span class="input-group-addon">px</span>
                            </div>
                            <div class="input-group">
                                <label class="input-group-addon" for="dataWidth">Width</label>
                                <input class="form-control" id="dataWidth" type="text" placeholder="width">
                                <span class="input-group-addon">px</span>
                            </div>
                            <div class="input-group">
                                <label class="input-group-addon" for="dataHeight">Height</label>
                                <input class="form-control" id="dataHeight" type="text" placeholder="height">
                                <span class="input-group-addon">px</span>
                            </div>
                            <div class="input-group">
                                <label class="input-group-addon" for="dataRotate">Rotate</label>
                                <input class="form-control" id="dataRotate" type="text" placeholder="rotate">
                                <span class="input-group-addon">deg</span>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="docs-btn-group">
                            <h3  class="hk_space_15">Methods:</h3>
                            <div class="button-group">
                                <button class="btn btn-warning" id="reset" data-method="reset" data-toggle="tooltip" type="button"  >Reset</button>
                                <button class="btn btn-warning" id="reset2" data-method="reset" data-option="true" data-toggle="tooltip" type="button" >Reset (deep)</button>
                                <button class="btn btn-success" id="enable" data-method="enable" type="button">Enable</button>
                                <button class="btn btn-warning" id="disable" data-method="disable" type="button">Disable</button>
                                <button class="btn btn-primary" id="clear" data-method="clear" type="button">Clear</button>
                                <button class="btn btn-danger" id="destroy" data-method="destroy" type="button">Destroy</button>
                                <button class="btn btn-info" id="freeRatio" data-method="setAspectRatio" data-option="auto" data-toggle="tooltip" type="button">Free Ratio</button>
                                <button class="btn btn-primary" id="setData" type="button" title="Set with the following data">Set Data</button>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">X</span>
                                        <input class="form-control" id="setDataX" type="number" value="550">
                                        <span class="input-group-addon">px</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Y</span>
                                        <input class="form-control" id="setDataY" type="number" value="100">
                                        <span class="input-group-addon">px</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Width</span>
                                        <input class="form-control" id="setDataWidth" type="number" value="480">
                                        <span class="input-group-addon">px</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Height</span>
                                        <input class="form-control" id="setDataHeight" type="number" value="270">
                                        <span class="input-group-addon">px</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" id="zoom" type="button">Zoom</button>
                                        </span>
                                        <input class="form-control" id="zoomWith" type="number" value="0.5">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" id="rotate" type="button">Rotate</button>
                                        </span>
                                        <input class="form-control" id="rotateWith" type="number" value="45">
                                        <span class="input-group-addon">deg</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" id="setAspectRatio" type="button">Set Aspect Ratio</button>
                                        </span>
                                        <input class="form-control" id="setAspectRatioWith" type="text" value="0.618" placeholder="Input aspect ratio">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info" id="getData" type="button">Get Data</button>
                                        </span>
                                        <input class="form-control" id="getDataInto" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info" id="getImageData" type="button">Get Image Data</button>
                                        </span>
                                        <input class="form-control" id="getImageDataInto" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row docs-data-url hk_left_0 hk_margin_top_cls"  >
                                <div cl ass="col-sm-12">
                                    <button class="btn btn-primary" id="getDataURL" data-toggle="tooltip" type="button"><span class="glyphicon glyphicon-picture"></span> Crop Image In (PNG)</button>
                                    <button class="btn btn-primary" id="getDataURL2" data-toggle="tooltip" type="button"><span class="glyphicon glyphicon-picture"></span> Crop Image In (JPG)</button>
                                    <button class="btn btn-primary" id="getDataURL3" data-toggle="tooltip" type="button"><span class="glyphicon glyphicon-picture"></span> Crop Image with (160*90)</button>
                                    <button class="btn btn-primary" id="getDataURL4" data-toggle="tooltip" type="button"><span class="glyphicon glyphicon-picture"></span> Crop Image with (320*180, JPG)</button>
                                </div>
                            </div>


                            <div class="row docs-data-url hk_space_15_top">
                                <div class="col-sm-12 hk_align_center">
                                    <div id="dataURLView"></div>
                                </div>
                            </div>
                            <div class="col-sm-12 hk_align_center">
                                <form method="post" id="fomr_hk_id">
                                    <textarea class="form-control hk_display_none" name= "image_base_val" id="dataURLInto"   rows="8"></textarea>
                                    <input type="submit" name="crop_image" class="crop_image_cls myButton hk_btn_upload" id="crop_image_id"   value="Upload to media">
                                </form>
                            </div>

                        </div>
                    </div>
                    <?php
                    if (isset($_POST["crop_image"])) {
                        $upload_dir = wp_upload_dir();
                        $upload_path = str_replace('/', DIRECTORY_SEPARATOR, $upload_dir['path']) . DIRECTORY_SEPARATOR;
                        $img = $_POST['image_base_val'];
                        $img = str_replace('data:image/png;base64,', '', $img);
                        $img = str_replace('data:image/jpeg;base64,', '', $img);
                        $img = str_replace(' ', '+', $img);
                        $decoded = base64_decode($img);
                        $filename = 'hk.png';
                        $hashed_filename = md5($filename . microtime()) . '_' . $filename;
                        $image_upload = file_put_contents($upload_path . $hashed_filename, $decoded);

                        //HANDLE UPLOADED FILE
                        if (!function_exists('wp_handle_sideload')) {
                            require_once( ABSPATH . 'wp-admin/includes/file.php' );
                        }

                        // Without that I'm getting a debug error!?
                        if (!function_exists('wp_get_current_user')) {
                            require_once( ABSPATH . 'wp-includes/pluggable.php' );
                        }

                        $file = array();
                        $file['error'] = '';
                        $file['tmp_name'] = $upload_path . $hashed_filename;
                        $file['name'] = $hashed_filename;
                        $file['type'] = 'image/png';
                        $file['size'] = filesize($upload_path . $hashed_filename);

                        // upload file to server
                        // @new use $file instead of $image_upload
                        $file_return = wp_handle_sideload($file, array('test_form' => false));

                        $filename = $file_return['file'];
                        $attachment = array(
                            'post_mime_type' => $file_return['type'],
                            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                            'post_content' => '',
                            'post_status' => 'inherit',
                            'guid' => $wp_upload_dir['url'] . '/' . basename($filename)
                        );
                        $attach_id = wp_insert_attachment($attachment, $filename, 0);
                        require_once(ABSPATH . 'wp-admin/includes/image.php');
                        $attach_data = wp_generate_attachment_metadata($attach_id, $filename);
                        wp_update_attachment_metadata($attach_id, $attach_data);
                        $jsonReturn = array(
                            'Status' => 'Success'
                        );

                        // Insert the post into the database
                        $tattoo_ID = wp_insert_post($my_post);

                        if ($tattoo_ID) {
                            add_post_meta($tattoo_ID, 'text', $_POST["tatooInput"]);
                            add_post_meta($tattoo_ID, 'image', $_POST["imageData"]);
                            add_post_meta($tattoo_ID, 'image_ID', $attach_id);
                            exit(wp_redirect(get_permalink($tattoo_ID)));
                        }
                    }
                    ?>

                    <div class="col-md-3" style="margin-top: 15px">
                        <h3>Options:</h3>
                        <form class="form-horizontal docs-options" role="form">
                            <div class="form-group">
                                <label class="col-xs-4 control-label">autoCrop:</label>
                                <div class="col-xs-8">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input id="autoCrop1" name="autoCrop" type="radio" value="true" checked> Yes
                                        </label>
                                        <label class="btn btn-primary">
                                            <input id="autoCrop2" name="autoCrop" type="radio" value="false"> No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">dragCrop:</label>
                                <div class="col-xs-8">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input id="dragCrop1" name="dragCrop" type="radio" value="true" checked> Yes
                                        </label>
                                        <label class="btn btn-primary">
                                            <input id="dragCrop2" name="dragCrop" type="radio" value="false"> No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">modal:</label>
                                <div class="col-xs-8">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input id="modal1" name="modal" type="radio" value="true" checked> Yes
                                        </label>
                                        <label class="btn btn-primary">
                                            <input id="modal2" name="modal" type="radio" value="false"> No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">dashed:</label>
                                <div class="col-xs-8">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input id="dashed1" name="dashed" type="radio" value="true" checked> Yes
                                        </label>
                                        <label class="btn btn-primary">
                                            <input id="dashed2" name="dashed" type="radio" value="false"> No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">movable:</label>
                                <div class="col-xs-8">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input id="movable1" name="movable" type="radio" value="true" checked> Yes
                                        </label>
                                        <label class="btn btn-primary">
                                            <input id="movable2" name="movable" type="radio" value="false"> No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">resizable:</label>
                                <div class="col-xs-8">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input id="resizable1" name="resizable" type="radio" value="true" checked> Yes
                                        </label>
                                        <label class="btn btn-primary">
                                            <input id="resizable2" name="resizable" type="radio" value="false"> No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">zoomable:</label>
                                <div class="col-xs-8">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input id="zoomable1" name="zoomable" type="radio" value="true" checked> Yes
                                        </label>
                                        <label class="btn btn-primary">
                                            <input id="zoomable2" name="zoomable" type="radio" value="false"> No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">rotatable:</label>
                                <div class="col-xs-8">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input id="rotatable1" name="rotatable" type="radio" value="true" checked> Yes
                                        </label>
                                        <label class="btn btn-primary">
                                            <input id="rotatable2" name="rotatable" type="radio" value="false"> No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">multiple:</label>
                                <div class="col-xs-8">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input id="multiple1" name="multiple" type="radio" value="true"> Yes
                                        </label>
                                        <label class="btn btn-primary active">
                                            <input id="multiple2" name="multiple" type="radio" value="false" checked> No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

}
