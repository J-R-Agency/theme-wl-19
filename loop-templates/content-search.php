<?php
/**
 * Search results partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>

		<?php if ( 'post' == get_post_type() ) : ?>

			<div class="entry-meta">

				<?php understrap_posted_on(); ?>

			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-summary">

		<?php 
		$search_summary = get_the_content(); 

		$search_summary = str_replace("</p>", "", $search_summary);

		$search_summary_parts = preg_split('#<p([^>])*>#',$search_summary);

		//echo substr($search_summary, 0, 255);
		$search_summary_display_max = 8 ;
		//$search_summary_parts_max = count( $search_summary_parts ) ;

		$search_summary_parts_max = 3 ;

		while ( ( strlen( $search_summary_display ) <= $search_summary_display_max ) && ( $i <= $search_summary_parts_max ) ) {
			// $search_summary_display .= wp_strip_all_tags( $search_summary_parts[$i] ) ;

			$search_summary_display = $i ;
			echo $i ;
			$i = $i++ ;
		}

		echo $search_summary_display;

		?>

	</div><!-- .entry-summary -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
