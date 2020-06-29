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

		<?php
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail( 'full' );
			}
		?>

		<div class="blog__featured-image" style="background-image: url(' <?php echo get_the_post_thumbnail_url( 'full') ;?> ');">
			IMAGE
		</div>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

			<?php understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">
<!-- 		<?php echo get_favorites_button($post_id, $site_id); ?>
 -->		<?php the_content(); ?>
 			<div class="page-links">
 				<p><a href="javascript:window.history.back();">&lt; Back</a></p>
 			</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
