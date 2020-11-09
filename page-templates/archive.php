<?php
/**
 * Template Name: Blog Archive
 *
 * Template for displaying the blog archive
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<section>
	<div class='container'>
		<div class="block_container">
			<h1>Archive</h1>
			
			<div class='row'>
				<div class="article__container">
				<?php	    	
					$args = array(
					    'post_type'      => 'post', //write slug of post type
					    'order'          => 'DESC',
					    'post_status'	 => 'publish',
					    'paged' => ( get_query_var('paged') ? get_query_var('paged') : 0)
					 );
					 
					$query = new WP_Query( $args );
					$wp_query = $query;
					 
					if ( $query->have_posts() ) :
					 	
					    while ( $query->have_posts() ) : $query->the_post();
						 					
							include (get_template_directory().'/global-templates/blog-card-small.php');	
							
						endwhile;
						
					endif; 
					wp_reset_postdata();
				?>
				</div>
			</div>
		
			<div class='understrap-pagination'>
				<?php understrap_pagination(); ?>
			</div>
		</div>
		
	</div>
</section>

<?php get_footer();
