<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

global $wl_google_api_key;

function dump($var){

	echo "<pre>";
	print_r($var);
	echo "</pre>";

}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		<?php
		// Get API custom fields 
		$websiteurl = get_field('websiteurl');
		$wl_api_main_address = get_field("main_address");
		$wl_api_additional_information = get_field("additional_information");
		$wl_api_activity_documents = get_field("activity_documents");
		$wl_api_activity_images = get_field("activity_images");
		$wl_api_activity_contacts = get_field("contacts");

		$activity_documents = unserialize($wl_api_activity_documents);
		$activity_images = unserialize($wl_api_activity_images);
		$activity_contacts = unserialize($wl_api_activity_contacts);

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
		?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<div class="activity-taxonomies">
				<div class="activity-taxonomies__theme"><?php the_terms( $post->ID, 'themes', '<strong>Themes:</strong> ', '  ' ); ?></div>
				<div class="activity-taxonomies__cost"><?php the_terms( $post->ID, 'costs', ' <strong>Cost:</strong> ', '  ' ); ?></div>
				<div class="activity-taxonomies__days"><?php the_terms( $post->ID, 'days', ' <strong>Days:</strong> ', '  ' ); ?></div>
			</div>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">
		<?php echo get_favorites_button($post_id, $site_id); ?>
		<?php the_content(); ?>

<?php

	if ( $wl_api_additional_information != "" ) {
		echo "<div class=\"additional_information\"> " . $wl_api_additional_information . "</div>" ;
	}

?>

<?php

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
}else{
	// Do not display images
}


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
	
	if( $websiteurl != "" ){

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
}else{
	// Do not display documents
}


?>

<iframe
  width="100%"
  height="300"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=<?php echo $wl_google_api_key ;?>&q=<?php echo urlencode($wl_api_main_address);?>" allowfullscreen>
</iframe>
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
