<?php
/**
 * Right sidebar check.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

</div><!-- #closing the primary container from /global-templates/left-sidebar-check.php -->

<?php $sidebar_pos = get_theme_mod( 'understrap_sidebar_position' ); ?>

<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

	<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>

	<?php print_r ( get_user_favorites_list($user_id, $site_id, $include_links, $filters, $include_button, $include_thumbnails = false, $thumbnail_size = 'thumbnail', $include_excerpt = false) ); ?>

<?php endif;
