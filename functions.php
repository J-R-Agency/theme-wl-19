<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

/** Wellbeing Liverpool Custom Functions
 *
 *
 */

/**
 * Add excerpt support to pages
 */

add_post_type_support( 'page', 'excerpt' );

function change_excerpt( $text )
{
	$pos = strrpos( $text, '[');
	if ($pos === false)
	{
		return $text;
	}
	
	return rtrim (substr($text, 0, $pos) );
}
add_filter('get_the_excerpt', 'change_excerpt');

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



/* -- CUSTOM THEME FUNCTIONALITY FOR J&R -- */

/* -- ADD POST TYPE SUPPORT FOR EXCERPTS ON PAGES -- */
add_post_type_support( 'page', 'excerpt' );


/* -- CREATE **TEST** IMPORT FUNCTIONALITY FOR WELLBEING DIRECTORY FROM LIVEWELL -- */

// Our custom post type function
function create_post_type() {
 
    register_post_type( 'activities',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Activities' ),
                'singular_name' => __( 'Activity' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'activities'),
            'taxonomies' => array( 'theme', 'cost', 'day' ),
            'hierarchical' => false,
            'menu_icon' => 'dashicons-awards',

        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_post_type' );



//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires
 
add_action( 'init', 'create_topics_nonhierarchical_taxonomy', 0 );
 
function create_topics_nonhierarchical_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'Themes', 'taxonomy general name' ),
    'singular_name' => _x( 'Theme', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Themes' ),
    'popular_items' => __( 'Popular Themes' ),
    'all_items' => __( 'All Themes' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Theme' ), 
    'update_item' => __( 'Update Theme' ),
    'add_new_item' => __( 'Add New Theme' ),
    'new_item_name' => __( 'New Topic Theme' ),
    'separate_items_with_commas' => __( 'Separate themes with commas' ),
    'add_or_remove_items' => __( 'Add or remove themes' ),
    'choose_from_most_used' => __( 'Choose from the most used themes' ),
    'menu_name' => __( 'Themes' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('themes','activities',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'theme' ),
  ));


  // Add terms
  wp_insert_term('Active', 'themes');
  wp_insert_term('Calm', 'themes');
  wp_insert_term('Social', 'themes');
  wp_insert_term('Creative', 'themes');
  wp_insert_term('Useful', 'themes');

}




//hook into the init action and call create_costs_nonhierarchical_taxonomy when it fires
 
add_action( 'init', 'create_costs_nonhierarchical_taxonomy', 0 );
 
function create_costs_nonhierarchical_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'Costs', 'taxonomy general name' ),
    'singular_name' => _x( 'Cost', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Costs' ),
    'popular_items' => __( 'Popular Costs' ),
    'all_items' => __( 'All Costs' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Cost' ), 
    'update_item' => __( 'Update Cost' ),
    'add_new_item' => __( 'Add New Cost' ),
    'new_item_name' => __( 'New Topic Cost' ),
    'separate_items_with_commas' => __( 'Separate costs with commas' ),
    'add_or_remove_items' => __( 'Add or remove costs' ),
    'choose_from_most_used' => __( 'Choose from the most used costs' ),
    'menu_name' => __( 'Costs' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('costs','activities',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'cost' ),
  ));

  // Add terms
  wp_insert_term('Free', 'costs');
  wp_insert_term('£', 'costs');
  wp_insert_term('££', 'costs');
  wp_insert_term('£££', 'costs');

}




//hook into the init action and call create_days_nonhierarchical_taxonomy when it fires
 
add_action( 'init', 'create_days_nonhierarchical_taxonomy', 0 );
 
function create_days_nonhierarchical_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'Days', 'taxonomy general name' ),
    'singular_name' => _x( 'Day', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Days' ),
    'popular_items' => __( 'Popular Days' ),
    'all_items' => __( 'All Days' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Day' ), 
    'update_item' => __( 'Update Day' ),
    'add_new_item' => __( 'Add New Day' ),
    'new_item_name' => __( 'New Topic Day' ),
    'separate_items_with_commas' => __( 'Separate days with commas' ),
    'add_or_remove_items' => __( 'Add or remove days' ),
    'choose_from_most_used' => __( 'Choose from the most used days' ),
    'menu_name' => __( 'Days' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('days','activities',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'day' ),
  ));



   // Add terms
  wp_insert_term('Monday', 'days');
  wp_insert_term('Tuesday', 'days');
  wp_insert_term('Wednesday', 'days');
  wp_insert_term('Thursday', 'days');
  wp_insert_term('Friday', 'days');
  wp_insert_term('Saturday', 'days');
  wp_insert_term('Sunday', 'days');


}





//hook into the init action and call create_days_nonhierarchical_taxonomy when it fires
 
add_action( 'init', 'create_postcode_nonhierarchical_taxonomy', 0 );
 
function create_postcode_nonhierarchical_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'Postcodes', 'taxonomy general name' ),
    'singular_name' => _x( 'Postcode', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Postcodes' ),
    'popular_items' => __( 'Popular Postcodes' ),
    'all_items' => __( 'All Postcodes' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Postcode' ), 
    'update_item' => __( 'Update Postcode' ),
    'add_new_item' => __( 'Add New Postcode' ),
    'new_item_name' => __( 'New Topic Postcode' ),
    'separate_items_with_commas' => __( 'Separate postcodes with commas' ),
    'add_or_remove_items' => __( 'Add or remove postcodes' ),
    'choose_from_most_used' => __( 'Choose from the most used postcodes' ),
    'menu_name' => __( 'Postcodes' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('postcodes','activities',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'postcode' ),
  ));



   // Add terms
  wp_insert_term('L1', 'postcodes');
  wp_insert_term('L2', 'postcodes');
  wp_insert_term('L3', 'postcodes');
  wp_insert_term('L4', 'postcodes');
  wp_insert_term('L5', 'postcodes');
  wp_insert_term('L6', 'postcodes');
  wp_insert_term('L7', 'postcodes');
  wp_insert_term('L8', 'postcodes');
  wp_insert_term('L9', 'postcodes');
  wp_insert_term('L10', 'postcodes');
  wp_insert_term('L11', 'postcodes');
  wp_insert_term('L12', 'postcodes');
  wp_insert_term('L13', 'postcodes');
  wp_insert_term('L14', 'postcodes');
  wp_insert_term('L15', 'postcodes');
  wp_insert_term('L16', 'postcodes');
  wp_insert_term('L17', 'postcodes');
  wp_insert_term('L18', 'postcodes');
  wp_insert_term('L19', 'postcodes');
  wp_insert_term('L20', 'postcodes');
  wp_insert_term('L21', 'postcodes');
  wp_insert_term('L22', 'postcodes');
  wp_insert_term('L23', 'postcodes');
  wp_insert_term('L24', 'postcodes');
  wp_insert_term('L25', 'postcodes');
  wp_insert_term('L26', 'postcodes');
  wp_insert_term('L27', 'postcodes');
  wp_insert_term('L28', 'postcodes');
  wp_insert_term('L29', 'postcodes');
  wp_insert_term('L30', 'postcodes');
  wp_insert_term('L30', 'postcodes');
  wp_insert_term('L30', 'postcodes');
  wp_insert_term('L30', 'postcodes');
  wp_insert_term('L31', 'postcodes');
  wp_insert_term('L32', 'postcodes');
  wp_insert_term('L33', 'postcodes');
  wp_insert_term('L34', 'postcodes');
  wp_insert_term('L35', 'postcodes');
  wp_insert_term('L36', 'postcodes');
  wp_insert_term('L37', 'postcodes');
  wp_insert_term('L38', 'postcodes');
  wp_insert_term('L39', 'postcodes');
  wp_insert_term('L40', 'postcodes');
  wp_insert_term('L70', 'postcodes');
  wp_insert_term('L71', 'postcodes');
  wp_insert_term('L72', 'postcodes');
  wp_insert_term('L73', 'postcodes');
  wp_insert_term('L74', 'postcodes');
  wp_insert_term('L75', 'postcodes');
  wp_insert_term('L80', 'postcodes');

}





function wl_set_google_api_key() {

    global $wl_google_api_key;
    $wl_google_api_key = "AIzaSyBPaQv0YSGsYVDNNtKZVy1Sh76Xc8n2ckQ" ;

}
    
add_action( 'after_setup_theme', 'wl_set_google_api_key' );







// Limit search to custom post type

function searchfilter($query) {
 
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('activities'));
    }
 
return $query;
}
 
add_filter('pre_get_posts','searchfilter');








// WL ACTIVITY FUNCTIONS

function wl_display_example ( $args ) {

// Aggregates all relevant contact fields pulled through from
// the Live Well API for this particular entry 

  setup_postdata ( $args ) ;

  
}

add_action( 'init', 'wl_display_example', 0 );









function wl_display_additional_information ( $args ) {

// Aggregates all relevant AI fields pulled through from
// the Live Well API for this particular entry 


  if( ! class_exists('ACF') ) {
    // Do nothing
  } else {

    setup_postdata ( $args ) ;

    $wl_api_additional_information = get_field("additional_information");

    if ( $wl_api_additional_information != "" ) {
      
      echo "<div class=\"additional_information\"> " . $wl_api_additional_information . "</div>" ;

    }    
  }


}

add_action( 'init', 'wl_display_additional_information', 0 );








