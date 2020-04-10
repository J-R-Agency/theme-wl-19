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

  setup_postdata ( $args ) ;
  
  $wl_api_additional_information = get_field("additional_information");

  if ( $wl_api_additional_information != "" ) {
    
    echo "<div class=\"additional_information\"> " . $wl_api_additional_information . "</div>" ;
  
  }

}

add_action( 'init', 'wl_display_additional_information', 0 );


function wl_display_activity_contacts ( $args ) {

// Aggregates all relevant contact fields pulled through from
// the Live Well API for this particular entry 

  setup_postdata ( $args ) ;
  
  $wl_api_main_address = get_field("main_address");
  $wl_api_activity_contacts = get_field("contacts");
  $activity_contacts = unserialize($wl_api_activity_contacts);


  if ($activity_contacts != ""){

    // Display contacts
    // Contacts
    foreach ($activity_contacts as $activity_contact) {

      if ( $activity_contact["FullName"] != "" ){
        $activity_contact_list[] = "<li class=\"activity_contact__item\">" . $activity_contact["FullName"] . "</li>";
      }
      if ( $activity_contact["EmailAddress"] != "" ){
        $activity_contact_list[] = "<li class=\"activity_contact__item\"><a href=\"mailto:" . $activity_contact["EmailAddress"] . "\" title=\"" . $activity_contact["FullName"] . "\" target=\"_blank\">" . $activity_contact["EmailAddress"] . "</a></li>";
      }
      if ( $activity_contact["PhoneNumber"] != "" ){
        $activity_contact_list[] = "<li class=\"activity_contact__item\">" . $activity_contact["PhoneNumber"] . "</li>";
      }

    }

    $wl_api_activity_contacts = implode("", $activity_contact_list);
    
    if ( $websiteurl != "" ) {

      $website_link = $activity_link[0] . $websiteurl . $activity_link[1] ;

    }
    echo "
      <div class=\"activity_contact__container\">
        <h3 class=\"activity_contact__title\">Contacts</h3>
        <div class=\"main_address\">" . 
        $wl_api_main_address . 
        "</div>
        <ul class=\"activity_contact__list\">" . 
        $wl_api_activity_contacts . 
        "</ul>
        $website_link
        </div>" ;
  } else {
    // Do not display documents
  }
}

add_action( 'init', 'wl_display_activity_contacts', 0 );



function wl_display_activity_documents ( $args ) {

// Aggregates all relevant contact fields pulled through from
// the Live Well API for this particular entry 

  setup_postdata ( $args ) ;

  $wl_api_activity_documents = get_field("activity_documents");
  $activity_documents = unserialize($wl_api_activity_documents);

  if ($activity_documents != ""){
    // Display documents
    // Documents
    foreach ($activity_documents as $activity_document) {
      $activity_document_list[] = "<li class=\"activity_document__item\"><a href=\"" . $activity_document["Url"] . "\" title=\"" . $activity_document["Title"] . "\" target=\"_blank\">" . $activity_document["Title"] . "</a></li>";
    }
    $wl_api_activity_documents = implode("", $activity_document_list);
    echo "<div class=\"activity_documents__container\"><h3 class=\"activity_documents__title\">Documents</h3> <ul class=\"activity_document__list\">" . $wl_api_activity_documents . "</ul></div>" ;
  }else{
    // Do not display documents
  }

}

add_action( 'init', 'wl_display_activity_documents', 0 );


function wl_display_activity_images ( $args ) {

// Aggregates all relevant contact fields pulled through from
// the Live Well API for this particular entry 

  setup_postdata ( $args ) ;

  $wl_api_activity_images = get_field("activity_images");
  $activity_images = unserialize($wl_api_activity_images);


  if ($activity_images != ""){
    // Display images
    // Images
    foreach ($activity_images as $activity_image) {
      list($width, $height, $type, $attr) = getimagesize($activity_image["Url"]);
      // echo "$width, $height, $type, $attr";
      unset($use_dimensions);
      if ($width<250 && $height<250){
        $use_dimensions = " width: " . $width . "px; height: " . $height . "px; ";
      }else{
        unset($use_dimensions);
      }

      $activity_image_list[] = "<a class=\"flex-item\" href=\"" . $activity_image["Url"] . "\" title=\"" . $activity_image["Description"] . "\" target=\"_blank\"><div class=\"activity_images__img\" $use_dimensions style=\"" . $use_dimensions . "background-image: url('" . $activity_image["Url"] . "')\"></div></a>" ;
    }
    $wl_api_activity_images = "<div class=\"flex-container\">" . implode("", $activity_image_list) . "</div>";
    echo "<div class=\"activity_images__container\"><h3 class=\"activity_images__title\">Images</h3>" . $wl_api_activity_images . "</div>" ;
  } else {
    // Do not display images
  }
  
}

add_action( 'init', 'wl_display_activity_images', 0 );

 
function wl_display_activity_largemap ( $args ) {

// Aggregates all relevant contact fields pulled through from
// the Live Well API for this particular entry 

  setup_postdata ( $args ) ;
  
  global $wl_google_api_key;

  $wl_api_main_address = get_field("main_address");

  echo "
  <iframe
    width=\"100%\"
    height=\"300\"
    frameborder=\"0\" style=\"border:0\"
    src=\"https://www.google.com/maps/embed/v1/place?key=" . $wl_google_api_key . "&q=" . urlencode($wl_api_main_address) . "\" allowfullscreen>
  </iframe>
  ";
  
}

add_action( 'init', 'wl_display_activity_largemap', 0 );


function wl_display_activity_logo ( $args ) {

// Aggregates all relevant contact fields pulled through from
// the Live Well API for this particular entry 

  setup_postdata ( $args ) ;
  
  // Get website URL 
  $websiteurl = get_field('websiteurl');

  // Get logo if available
  $wl_api_logo_description = get_field("logo_description");
  $wl_api_logo_url = get_field("logo_url");

  if ( $websiteurl !="" ) {
    $activity_link[0] = "<a href=\"" . $websiteurl . "\" title=\"" . $wl_api_logo_description . "\" target=\"_blank\">";
    $activity_link[1] = "</a>";
  } else {
    $activity_link[0] = "";
    $activity_link[1] = "";
  }

  if ( $wl_api_logo_url!="" ){
    echo "
      <div class=\"activity-logo\">
        " . $activity_link[0] . "<img src=\"" . $wl_api_logo_url . "\" title=\"" . $wl_api_logo_description . "\">" . $activity_link[1] . "
      </div>
    ";
  }
  
}

add_action( 'init', 'wl_display_activity_logo', 0 );

