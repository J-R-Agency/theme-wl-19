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

	wl_display_additional_information( $post->ID ); 
	wl_display_activity_contacts( $post->ID ); 
	wl_display_activity_documents( $post->ID ); 
	wl_display_activity_images( $post->ID ); 
	wl_display_activity_largemap( $post->ID ); 

?>



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
