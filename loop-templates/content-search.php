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
/*
		$xml = $search_summary; 
		$dom = new DOMDocument;
		$dom->loadXML($xml);
		$paragraphs = $dom->getElementsByTagName('p');
		foreach ($paragraphs as $paragraph) {
		    echo $paragraph->nodeValue, PHP_EOL;
		}
		unset( $dom );
		unset( $xml );
*/



		$search_summary = str_replace("</p>", "", $search_summary);
		$search_summary_parts = preg_split('#<p([^>])*>#', $search_summary);
		$search_summary_display_max = 255 ;
		//$search_summary_parts_max = count( $search_summary_parts ) ;
		$search_summary_parts_max = 3 ;
		while ( $i <= $search_summary_parts_max ) {			
			if ( strlen( $search_summary_display ) >= $search_summary_display_max ) {
				break ;
			} else {
				$search_summary_display_diff = $search_summary_display_max - strlen( $search_summary_display ) ;
				if ( strlen( wp_strip_all_tags( $search_summary_parts[$i] ) ) <= $search_summary_display_diff ) {
					$search_summary_display .= wp_strip_all_tags( $search_summary_parts[$i] ) . " " ;
				}
				$i = $i + 1 ;		
			}
		}
		echo "<div class=\"search_summary\">" . $search_summary_display . "</div>" ;

		unset($days);
		$days;

$args = array(
	'taxonomy' => 'days'
);

$day_categories = get_terms( $args );  

usort($categories, function($a, $b) {
   return get_field("days_order", "category_".$a->term_id) - get_field("days_order", "category_".$b->term_id);
});

foreach ($categories as $category){
	print_r($category);
}

		?>
			<div class="activity-taxonomies">
				<div class="activity-taxonomies__theme"><?php the_terms( $post->ID, 'themes', '<strong>Themes:</strong> ', '  ' ); ?> &nbsp; <?php the_terms( $post->ID, 'costs', ' <strong>Cost:</strong> ', '  ' ); ?></div>
				<div class="activity-taxonomies__days"><?php the_terms( $post->ID, 'days', ' <strong>Days:</strong> ', '  ' ); ?></div>
			</div>
		<?php echo "<div class=\"wishlist\"> " . get_favorites_button($post_id, $site_id) . "</div>"; ?>

	</div><!-- .entry-summary -->

	<footer class="entry-footer">

		<?php // understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
