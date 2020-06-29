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
  wp_insert_term('£ (up to £5)', 'costs');
  wp_insert_term('££ (£6-£9)', 'costs');
  wp_insert_term('£££ (£10+)', 'costs');

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





//hook into the init action and call create_postcode_nonhierarchical_taxonomy when it fires
 
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








//hook into the init action and call create_postcode_nonhierarchical_taxonomy when it fires
 
add_action( 'init', 'create_secondary_postcode_nonhierarchical_taxonomy', 0 );
 
function create_secondary_postcode_nonhierarchical_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'Secondary Postcodes', 'taxonomy general name' ),
    'singular_name' => _x( 'Secondary Postcode', 'taxonomy singular name' ),
    'search_items' =>  __( 'Secondary Search Postcodes' ),
    'popular_items' => __( 'Secondary Popular Postcodes' ),
    'all_items' => __( 'All Secondary Postcodes' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Secondary Postcode' ), 
    'update_item' => __( 'Update Secondary Postcode' ),
    'add_new_item' => __( 'Add New Secondary Postcode' ),
    'new_item_name' => __( 'New Topic Secondary Postcode' ),
    'separate_items_with_commas' => __( 'Separate secondary postcodes with commas' ),
    'add_or_remove_items' => __( 'Add or remove secondary postcodes' ),
    'choose_from_most_used' => __( 'Choose from the most used secondary postcodes' ),
    'menu_name' => __( 'Secondary Postcodes' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('secondary_postcodes','activities',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'secondary_postcode' ),
  ));



   // Add terms
  wp_insert_term('L1', 'secondary_postcodes');
  wp_insert_term('L2', 'secondary_postcodes');
  wp_insert_term('L3', 'secondary_postcodes');
  wp_insert_term('L4', 'secondary_postcodes');
  wp_insert_term('L5', 'secondary_postcodes');
  wp_insert_term('L6', 'secondary_postcodes');
  wp_insert_term('L7', 'secondary_postcodes');
  wp_insert_term('L8', 'secondary_postcodes');
  wp_insert_term('L9', 'secondary_postcodes');
  wp_insert_term('L10', 'secondary_postcodes');
  wp_insert_term('L11', 'secondary_postcodes');
  wp_insert_term('L12', 'secondary_postcodes');
  wp_insert_term('L13', 'secondary_postcodes');
  wp_insert_term('L14', 'secondary_postcodes');
  wp_insert_term('L15', 'secondary_postcodes');
  wp_insert_term('L16', 'secondary_postcodes');
  wp_insert_term('L17', 'secondary_postcodes');
  wp_insert_term('L18', 'secondary_postcodes');
  wp_insert_term('L19', 'secondary_postcodes');
  wp_insert_term('L20', 'secondary_postcodes');
  wp_insert_term('L21', 'secondary_postcodes');
  wp_insert_term('L22', 'secondary_postcodes');
  wp_insert_term('L23', 'secondary_postcodes');
  wp_insert_term('L24', 'secondary_postcodes');
  wp_insert_term('L25', 'secondary_postcodes');
  wp_insert_term('L26', 'secondary_postcodes');
  wp_insert_term('L27', 'secondary_postcodes');
  wp_insert_term('L28', 'secondary_postcodes');
  wp_insert_term('L29', 'secondary_postcodes');
  wp_insert_term('L30', 'secondary_postcodes');
  wp_insert_term('L30', 'secondary_postcodes');
  wp_insert_term('L30', 'secondary_postcodes');
  wp_insert_term('L30', 'secondary_postcodes');
  wp_insert_term('L31', 'secondary_postcodes');
  wp_insert_term('L32', 'secondary_postcodes');
  wp_insert_term('L33', 'secondary_postcodes');
  wp_insert_term('L34', 'secondary_postcodes');
  wp_insert_term('L35', 'secondary_postcodes');
  wp_insert_term('L36', 'secondary_postcodes');
  wp_insert_term('L37', 'secondary_postcodes');
  wp_insert_term('L38', 'secondary_postcodes');
  wp_insert_term('L39', 'secondary_postcodes');
  wp_insert_term('L40', 'secondary_postcodes');
  wp_insert_term('L70', 'secondary_postcodes');
  wp_insert_term('L71', 'secondary_postcodes');
  wp_insert_term('L72', 'secondary_postcodes');
  wp_insert_term('L73', 'secondary_postcodes');
  wp_insert_term('L74', 'secondary_postcodes');
  wp_insert_term('L75', 'secondary_postcodes');
  wp_insert_term('L80', 'secondary_postcodes');

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








function wl_display_activity_contacts ( $args ) {

// Aggregates all relevant contact fields pulled through from
// the Live Well API for this particular entry 

  if( ! class_exists('ACF') ) {
    // Do nothing
  } else {

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


}

add_action( 'init', 'wl_display_activity_contacts', 0 );








function wl_display_activity_documents ( $args ) {

// Aggregates all relevant contact fields pulled through from
// the Live Well API for this particular entry 

  if( ! class_exists('ACF') ) {
    // Do nothing
  } else {

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
}

add_action( 'init', 'wl_display_activity_documents', 0 );






function wl_display_activity_images ( $args ) {

// Aggregates all relevant contact fields pulled through from
// the Live Well API for this particular entry 


  if( ! class_exists('ACF') ) {
    // Do nothing
  } else {

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
}

add_action( 'init', 'wl_display_activity_images', 0 );

 



 
function wl_display_activity_largemap ( $args ) {

// Aggregates all relevant address fields pulled through from
// the Live Well API for this particular entry 

  if( ! class_exists('ACF') ) {
    // Do nothing
  } else {

    setup_postdata ( $args ) ;
    
    global $wl_google_api_key;

    $wl_api_main_address = get_field("main_address");

    if ( $wl_api_main_address != "" ) {

      echo "
      <iframe
        width=\"100%\"
        height=\"300\"
        frameborder=\"0\" style=\"border:0\"
        src=\"https://www.google.com/maps/embed/v1/place?key=" . $wl_google_api_key . "&q=" . urlencode ( $wl_api_main_address ) . "\" allowfullscreen>
      </iframe>
      ";
    } else {
      
    }
  }
}

add_action( 'init', 'wl_display_activity_largemap', 0 );






function wl_display_activity_logo ( $args ) {

// Aggregates all relevant contact fields pulled through from
// the Live Well API for this particular entry 

  if( ! class_exists('ACF') ) {
    // Do nothing
  } else {

    setup_postdata ( $args ) ;
    
    // Get website URL 
    $websiteurl = get_field('websiteurl');

    // Get logo if available
    $wl_api_logo_description = get_field("logo_description");
    $wl_api_logo_url = get_field("logo_url");

    if ( $websiteurl != "" ) {
      $activity_link[0] = "<a href=\"" . $websiteurl . "\" title=\"" . $wl_api_logo_description . "\" target=\"_blank\">";
      $activity_link[1] = "</a>";
    } else {
      $activity_link[0] = "";
      $activity_link[1] = "";
    }

    if ( $wl_api_logo_url != "" ){
      echo "
        <div class=\"activity-logo\">
          " . $activity_link[0] . "<img src=\"" . $wl_api_logo_url . "\" title=\"" . $wl_api_logo_description . "\">" . $activity_link[1] . "
        </div>
      ";
    }
  }
}

add_action( 'init', 'wl_display_activity_logo', 0 );





/*

** SEEMS TO CAUSE ISSUE WITH MEDIA UPLOADER **

function wl_dump ( $var ) {

  echo "<pre>";
  print_r($var);
  echo "</pre>";

}

add_action( 'init', 'wl_dump', 0 );

*/




/* RANDOM SEARCH RESULTS */
/*
function random_search_result( $q ) {
  if ( is_search() && is_main_query() )
  $q->set( 'orderby', 'rand');
}
add_action( 'pre_get_posts', 'random_search_result' );
*/

/* Filter Archive Title */

add_filter( 'get_the_archive_title', function ($title) {    
  if ( is_category() ) {    
          $title = single_cat_title( '', false );    
      } elseif ( is_tag() ) {    
          $title = single_tag_title( '', false );    
      } elseif ( is_author() ) {    
          $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
      } elseif ( is_tax() ) { //for custom post types
          $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
      } elseif (is_post_type_archive()) {
          $title = post_type_archive_title( '', false );
      }
  return $title;    
});





/* SEARCH FOR WHOLE WORDS ONLY */

add_filter('posts_search', 'my_search_is_exact', 20, 2);
function my_search_is_exact($search, $wp_query){

    global $wpdb;

    if(empty($search))
        return $search;

    $q = $wp_query->query_vars;
    $n = !empty($q['exact']) ? '' : '%';

    $search = $searchand = '';

    foreach((array)$q['search_terms'] as $term) :

        $term = esc_sql(like_escape($term));

        $search.= "{$searchand}($wpdb->posts.post_title REGEXP '[[:<:]]{$term}[[:>:]]') OR ($wpdb->posts.post_content REGEXP '[[:<:]]{$term}[[:>:]]')";

        $searchand = ' AND ';

    endforeach;

    if(!empty($search)) :
        $search = " AND ({$search}) ";
        if(!is_user_logged_in())
            $search .= " AND ($wpdb->posts.post_password = '') ";
    endif;

    return $search;

}




