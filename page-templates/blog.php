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
		$lead_story = get_field( "lead_story" );
		if (  $lead_story != "" ){
			global $post;
			$post = $lead_story ;
			setup_postdata( $post );
			//print_r( $post );
			echo "
			<div class=\"lead_story__card flex-container\">
				<div class=\"lead_story__image flex-item\">
					<img src=\"\"> 
				</div>
				<div class=\"lead_story__details flex-item\">
					<h3><a href=\"\">" . $post->post_title . "</a></h3>
					<p class=\"lead_story__excerpt\">" . $post->post_excerpt . "</p>
					<div class=\"lead_story__button\"><a href=\"#\"> Read more &gt;</a></div>
				</div>
			</div>";
		}

		?>
		<div class="flex-container">
			Container
			<div class="flex-item">
				Item 1
			</div>
			<div class="flex-item">
				Item 2
			</div>
		</div>

	</div>
	
	<div class="row mt-20">

<?php $catquery = new WP_Query( 'cat=38&posts_per_page=5' ); ?>
<ul>
<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
<li><h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
<ul><li><?php the_content(); ?></li>
</ul>
</li>
<?php endwhile; ?> 
</ul>
<?php wp_reset_postdata(); ?>

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