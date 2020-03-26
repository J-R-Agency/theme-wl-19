<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

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
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/wp-admin.php',                        // /wp-admin/ related functions
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}


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
			'taxonomies' => array( 'themes' ),
	        'hierarchical' => false,
            'menu_icon' => 'dashicons-awards',

        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_post_type' );

//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires
 
add_action( 'init', 'create_topics_nonhierarchical_taxonomy' );
 
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
}



//hook into the init action and call create_costs_nonhierarchical_taxonomy when it fires
 
add_action( 'init', 'create_costs_nonhierarchical_taxonomy' );
 
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
}





//hook into the init action and call create_days_nonhierarchical_taxonomy when it fires
 
add_action( 'init', 'create_days_nonhierarchical_taxonomy' );
 
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



    $terms = get_terms('days', array('hide_empty' => false));
    foreach ($terms as $term) {
        echo $term->name;
    }

}






// Limit search to custom post type

function searchfilter($query) {
 
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('activities'));
    }
 
return $query;
}
 
add_filter('pre_get_posts','searchfilter');




