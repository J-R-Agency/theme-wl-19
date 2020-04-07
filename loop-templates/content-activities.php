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

		$activity_documents = unserialize($wl_api_activity_documents);
		$activity_images = unserialize($wl_api_activity_images);

		dump($activity_documents);
		dump($activity_images);

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

// Address
echo "<div class=\"main_address\">" . $wl_api_main_address . "</div>" ;

// Documents
$activity_document_list[] = "<li><a href=\"" . $activity_documents["Url"] . "\" title=\"" . $activity_documents["Title"] . "\" target=\"_blank\">" . $activity_documents["Title"] . "</a></li>";
$wl_api_activity_documents = implode(",", $activity_document_list);
echo "<div class=\"activity_documents\"><h3>Documents</h3> <ul>" . $wl_api_activity_documents . "</ol></div>" ;


// Documents
$activity_image_list[] = "<img src=\"" . $activity_images["Url"] . "\" title=\"" . $activity_images["Description"] . "\">" . $activity_images["Description"] . "";
$wl_api_activity_images = implode(",", $activity_image_list);
echo "<div class=\"activity_images\"><h3>Images</h3> <ul>" . $wl_api_activity_images . "</ol></div>" ;

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
