<?php
/**
 * travelinmind functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package travelinmind
 */

if ( ! function_exists( 'travelinmind_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function travelinmind_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on travelinmind, use a find and replace
		 * to change 'travelinmind' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'travelinmind', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'travelinmind' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'travelinmind_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'travelinmind_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

 function travelinmind_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'travelinmind_content_width', 640 );
}
add_action( 'after_setup_theme', 'travelinmind_content_width', 0 );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travelinmind_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'travelinmind' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'travelinmind' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'travelinmind' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 'travelinmind' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'travelinmind' ),
		'id'            => 'Footersecond',
		'description'   => esc_html__( 'Add widgets here.', 'travelinmind' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'travelinmind' ),
		'id'            => 'Footerthird',
		'description'   => esc_html__( 'Add widgets here.', 'travelinmind' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Group Excursion', 'travelinmind' ),
		'id'            => 'groupexcurion',
		'description'   => esc_html__( 'Add widgets here.', 'travelinmind' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );		register_sidebar( array(		'name'          => esc_html__( 'Our Undiscovered', 'travelinmind' ),		'id'            => 'undiscovered',		'description'   => esc_html__( 'Add widgets here.', 'travelinmind' ),		'before_widget' => '<section id="%1$s" class="widget %2$s">',		'after_widget'  => '</section>',		'before_title'  => '<h2 class="widget-title">',		'after_title'   => '</h2>',	) );
}
add_action( 'widgets_init', 'travelinmind_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function travelinmind_scripts() {
	wp_enqueue_style( 'travelinmind-style', get_stylesheet_uri() );

	wp_enqueue_script( 'travelinmind-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'travelinmind-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'travelinmind_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/**
 * Custom Post Type Lists for this theme.
 */
require get_template_directory() . '/inc/customposttypes.php';
/**
 * Package Metabox Lists for this theme.
 */
require get_template_directory() . '/inc/packge-metaboxs.php';

/**
 * Cab Managemnts for this theme.
 */
require get_template_directory() . '/inc/cab_managemnt_optionpage.php';


add_action('admin_menu','remove_default_post_type');
function remove_default_post_type() {
	remove_menu_page('edit.php');
}
global $current_user;
$current_user->user_login;
if($current_user->user_login !='admin'){
function remove_menus(){
    remove_menu_page( 'edit-comments.php' );  
    remove_menu_page( 'tools.php' ); 
	remove_menu_page( 'themes.php' ); 
	remove_menu_page( 'plugins.php' );
	remove_menu_page( 'options-general.php' );
	remove_menu_page('edit.php?post_type=acf');
	remove_menu_page('ultimatewpqsf');
}
add_action( 'admin_init', 'wpse_136058_remove_menu_pages' );
function wpse_136058_remove_menu_pages() {

    remove_menu_page( 'edit.php?post_type=acf' );
    remove_menu_page( 'wpcf7' );
}
add_action( 'admin_menu', 'remove_menus' );
}
/* Disable WordPress Admin Bar for all users but admins. */
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

add_action( 'user_register', 'my_save_extra_fields', 10, 1 );

function my_save_extra_fields( $phone_no ) {
    if ( isset( $_POST['phone_no'] ) )
        update_user_meta($phone_no, 'phone_no', $_POST['phone_no']);
}

/**
 * Register a custom menu page.
 */
function wpdocs_register_my_custom_menu_page() {
    add_menu_page(
        __( 'Widget Content', 'textdomain' ),
        'Widget Content',
        'manage_options',
        'widgets.php',
        '',
        plugins_url( 'write-letter.png' ),
        6
    );
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );