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
		<div class="blog_container flex-container">
<?php $catquery = new WP_Query( 'category_name=reports&posts_per_page=3' ); ?>
<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
			<div class="blog-item flex-item">
				<div class="blog-item__img">
					<img src="">
					<?php get_the_post_thumbnail(); ?>
				</div>
				<h3 class="blog-item__title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				<div class="blog-item__summary">
					<?php the_excerpt(); ?>
				</div>
			</div>
<?php endwhile; ?> 
<?php wp_reset_postdata(); ?>
		</div>

		<!-- News & Views -->

	</div>



<?php

// check if the repeater field has rows of data
if( have_rows('blog_block') ):

 	// loop through the rows of data
    while ( have_rows('blog_block') ) : the_row();

        // display a sub field value
        $block_title = the_sub_field('block_title');
        $block_intro = the_sub_field('block_intro');
        $block_category = the_sub_field('block_category');

        echo "<pre>" ;
        print_r( $block_title );
        print_r( $block_intro );
        print_r( $block_category );
        echo "</pre>" ;

    endwhile;

else :

    // no rows found

endif;

?>



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