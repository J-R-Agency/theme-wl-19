<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<div class="activity-taxonomies">
				<div class="activity-taxonomies__theme"><?php the_terms( $post->ID, 'themes', 'Themes: ', '  ' ); ?></div>
				<div class="activity-taxonomies__cost"><?php the_terms( $post->ID, 'costs', ' Cost: ', '  ' ); ?></div>
				<div class="activity-taxonomies__days"><?php the_terms( $post->ID, 'days', ' Days: ', '  ' ); ?></div>
			</div>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">
		<?php echo get_favorites_button($post_id, $site_id); ?>
		<?php the_content(); ?>
<iframe
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBPaQv0YSGsYVDNNtKZVy1Sh76Xc8n2ckQ&q=Sunflowers,Liverpool" allowfullscreen>
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
