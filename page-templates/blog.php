<?php
/**
 * Template Name: Blog landing page
 *
 * Template for displaying a blog landing page.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div class="container">
	
	<div class="row mt-20">
		
		<!-- Lead story -->
		<?php
		$lead_story = get_field("lead_story");
		if ( isset( $lead_story ) ){
			global $post;
			$post = $lead_story ;
			setup_postdata( $post );

			echo "HELLO: " . $post->ID . " | ";
 
			echo get_the_post_thumbnail( $post->ID );  

			echo "
			<div class=\"lead_story__card\">
				<h3><a href=\"" . the_permalink() . "\">POST TITLE: " . $post->post_title . "</a></h3>
				<p class=\"lead_story__excerpt\">POST EXCERPT" . $post->post_excerpt . "</p>
			</div>";

		}

		?>
		
	</div>
	
	<div class="row mt-20">

		<!-- News & Views -->

	</div>
	
	<div class="row mt-20">
		
		<!-- Reports & Publications -->
		
	</div>

	<div class="row mt-20">
		
		<!-- Advice & Information -->
		
	</div>

</div>

<?php
get_footer();
?>