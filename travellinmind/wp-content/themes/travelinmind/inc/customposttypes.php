<?php 
/**
 * Custom Post Type For Travelinmind
*----------- Travelinmind custom post-------*
*/
function create_post_type_travelinmind() {
	/*-- package Post Type--*/
  register_post_type( 'package',
    array(
      'labels' => array(
        'name' => __( 'Packages' ),
        'singular_name' => __( 'Package' ),	
		 'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
        'all_items'           => __( 'All Packages', 'text_domain' ),
        'view_item'           => __( 'View Packages', 'text_domain' ),
        'add_new_item'        => __( 'Add New Package', 'text_domain' ),
        'add_new'             => __( 'Add New Package', 'text_domain' ),
        'edit_item'           => __( 'Edit Package', 'text_domain' ),
        'update_item'         => __( 'Update Package', 'text_domain' ),
        'search_items'        => __( 'Search Packages', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
      ),
      'public' => true,
      'has_archive' => true,
	 'supports'           => array( 'title', 'editor','thumbnail'),
    )
  );
  /*-- Group Excursion Post Type--*/
  register_post_type( 'group-excursion',
    array(
      'labels' => array(
        'name' => __( 'Group Excursion' ),
        'singular_name' => __( 'Group Excursion' ),	
		 'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
        'all_items'           => __( 'All Group Excursion', 'text_domain' ),
        'view_item'           => __( 'View Group Excursion', 'text_domain' ),
        'add_new_item'        => __( 'Add New Group Excursion', 'text_domain' ),
        'add_new'             => __( 'Add New Group Excursion', 'text_domain' ),
        'edit_item'           => __( 'Edit Group Excursion', 'text_domain' ),
        'update_item'         => __( 'Update Group Excursion', 'text_domain' ),
        'search_items'        => __( 'Search Group Excursion', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
      ),
      'public' => true,
      'has_archive' => true,
	 'supports'           => array( 'title','editor'),
	 'menu_icon'           => 'dashicons-universal-access',
    )
  );
     /*-- Trekking Post Type--*/
  register_post_type( 'trekking',
    array(
      'labels' => array(
        'name' => __( 'Trekking' ),
        'singular_name' => __( 'Trekking' ),	
		 'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
        'all_items'           => __( 'All Trekking', 'text_domain' ),
        'view_item'           => __( 'View Trekking', 'text_domain' ),
        'add_new_item'        => __( 'Add New Trekking', 'text_domain' ),
        'add_new'             => __( 'Add New Trekking', 'text_domain' ),
        'edit_item'           => __( 'Edit Trekking', 'text_domain' ),
        'update_item'         => __( 'Update Trekking', 'text_domain' ),
        'search_items'        => __( 'Search Trekking', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
      ),
      'public' => true,
      'has_archive' => true,
	 'supports'           => array( 'title','editor','thumbnail'),
	 'menu_icon'           => 'dashicons-welcome-learn-more',
    )
  );
  
  /*-- Undiscovered Post Type--*/
  register_post_type( 'undiscovered',
    array(
      'labels' => array(
        'name' => __( 'Undiscovered' ),
        'singular_name' => __( 'Undiscovered' ),	
		 'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
        'all_items'           => __( 'All Undiscovered', 'text_domain' ),
        'view_item'           => __( 'View Undiscovered', 'text_domain' ),
        'add_new_item'        => __( 'Add New Undiscovered', 'text_domain' ),
        'add_new'             => __( 'Add New Undiscovered', 'text_domain' ),
        'edit_item'           => __( 'Edit Undiscovered', 'text_domain' ),
        'update_item'         => __( 'Update Undiscovered', 'text_domain' ),
        'search_items'        => __( 'Search Undiscovered', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
      ),
      'public' => true,
      'has_archive' => true,
	  'supports'           => array( 'title','editor','thumbnail'),
	 'menu_icon'           => 'dashicons-welcome-learn-more',
    )
  );
  
    /*-- Events Post Type--*/
  register_post_type( 'event',
    array(
      'labels' => array(
        'name' => __( 'Events' ),
        'singular_name' => __( 'Event' ),	
		 'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
        'all_items'           => __( 'All Events', 'text_domain' ),
        'view_item'           => __( 'View Events', 'text_domain' ),
        'add_new_item'        => __( 'Add New Event', 'text_domain' ),
        'add_new'             => __( 'Add New Event', 'text_domain' ),
        'edit_item'           => __( 'Edit Events', 'text_domain' ),
        'update_item'         => __( 'Update Event', 'text_domain' ),
        'search_items'        => __( 'Search Events', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
      ),
      'public' => true,
      'has_archive' => true,
	 'supports'           => array( 'title','editor','thumbnail'),
	 'menu_icon'           => 'dashicons-megaphone',
    )
  );
  
   /*-- Testimonial Post Type--*/
  register_post_type( 'testimonial',
    array(
      'labels' => array(
        'name' => __( 'Testimonial' ),
        'singular_name' => __( 'Testimonial' ),	
		 'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
        'all_items'           => __( 'All Testimonials', 'text_domain' ),
        'view_item'           => __( 'View Testimonials', 'text_domain' ),
        'add_new_item'        => __( 'Add New Testimonial', 'text_domain' ),
        'add_new'             => __( 'Add New Testimonial', 'text_domain' ),
        'edit_item'           => __( 'Edit Testimonial', 'text_domain' ),
        'update_item'         => __( 'Update Testimonial', 'text_domain' ),
        'search_items'        => __( 'Search Testimonial', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
      ),
      'public' => true,
      'has_archive' => true,
	  'supports'           => array( 'title','editor','thumbnail'),
	 'menu_icon'           => 'dashicons-welcome-learn-more',
    )
  );
  
   /*-- FAQ Post Type--*/
  register_post_type( 'faq',
    array(
      'labels' => array(
        'name' => __( 'FAQ' ),
        'singular_name' => __( 'FAQ' ),	
		 'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
        'all_items'           => __( 'All FAQs', 'text_domain' ),
        'view_item'           => __( 'View FAQs', 'text_domain' ),
        'add_new_item'        => __( 'Add New FAQ', 'text_domain' ),
        'add_new'             => __( 'Add New FAQ', 'text_domain' ),
        'edit_item'           => __( 'Edit FAQ', 'text_domain' ),
        'update_item'         => __( 'Update FAQ', 'text_domain' ),
        'search_items'        => __( 'Search FAQs', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
      ),
      'public' => true,
      'has_archive' => true,
	  'supports'           => array( 'title','editor'),
	 'menu_icon'           => 'dashicons-welcome-learn-more',
    )
  );

  	/*-- package Post Type--*/
  register_post_type( 'banner_content',
    array(
      'labels' => array(
        'name' => __( 'Home left Banner Content' ),
        'singular_name' => __( 'home_left_banner_content' ),	
		 'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
        'all_items'           => __( 'All Banner Content', 'text_domain' ),
        'view_item'           => __( 'View Banner Content', 'text_domain' ),
        'add_new_item'        => __( 'Add New Banner Content', 'text_domain' ),
        'add_new'             => __( 'Add New Banner Content', 'text_domain' ),
        'edit_item'           => __( 'Edit Title', 'text_domain' ),
        'update_item'         => __( 'Update Banner Content', 'text_domain' ),
        'search_items'        => __( 'Search Banner Content', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
      ),
      'public' => true,
      'has_archive' => true,
	 'supports'           => array( 'title'),
    )
  );
  
}

add_action( 'init', 'create_post_type_travelinmind' );

/*------------------- Created Consulting Service Type Taxonomy------------------*/
add_action( 'init', 'package_cat_hierarchical_taxonomy', 0 );
function package_cat_hierarchical_taxonomy() {
  $labels = array(
    'name' => _x( 'Package Category', 'taxonomy general Package Category' ),
    'singular_name' => _x( 'Package Category', 'taxonomy singular Package Category' ),
    'search_items' =>  __( 'Search Package Category' ),
    'all_items' => __( 'All Package Category' ),
    'parent_item' => __( 'Parent Package Category' ),
    'parent_item_colon' => __( 'Parent Package Category:' ),
    'edit_item' => __( 'Edit Package Category' ), 
    'update_item' => __( 'Update Package Category' ),
    'add_new_item' => __( 'Add Package Category' ),
    'new_item_name' => __( 'New Package Category' ),
    'menu_name' => __( 'Package Category' ),
  ); 	

  register_taxonomy('package-category',array('package'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'package-category' ),
  ));
}

/*-------- Package Activities ------------*/
add_action( 'init', 'create_package_activity_taxonomies', 0 );
function create_package_activity_taxonomies() 
{
  $labels = array(
    'name' => _x( 'Package Activity', 'taxonomy general name' ),
    'singular_name' => _x( 'Package Activity', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Package Activity' ),
    'popular_items' => __( 'Popular Package Activities' ),
    'all_items' => __( 'All Package Activities' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Package Activity' ), 
    'update_item' => __( 'Update Package Activity' ),
    'add_new_item' => __( 'Add New Package Activity' ),
    'new_item_name' => __( 'New Package Activity Name' ),
    'separate_items_with_commas' => __( 'Separate Activities with commas' ),
    'add_or_remove_items' => __( 'Add or remove Package Activities' ),
    'choose_from_most_used' => __( 'Choose from the most used Activities' ),
    'menu_name' => __( 'Package Activities' ),
  ); 
  register_taxonomy('tags','package',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tgs' ),
  ));
}