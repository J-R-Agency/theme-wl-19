<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_content(); ?>



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
					" . get_the_post_thumbnail() . "
				</div>
				<div class=\"lead_story__details flex-item\">
					<h3><a href=\"\">" . $post->post_title . "</a></h3>
					<p class=\"lead_story__excerpt\">" . $post->post_excerpt . "</p>
					<div class=\"lead_story__button\"><a href=\"#\"> Read more &gt;</a></div>
				</div>
			</div>";
		}

		?>


<?php


// check if the repeater field has rows of data
if( have_rows('blog_block') ):

 	// loop through the rows of data
    while ( have_rows('blog_block') ) : the_row();

    	unset($block_title);
    	unset($block_intro);
    	unset($block_category);

        // display a sub field value
        $block_title = get_sub_field('block_title');
        $block_intro = get_sub_field('block_intro');
        $block_category = get_sub_field('block_category');

?>

	<div class="row mt-20">
		<div class="blog_container flex-container">
			<h3 class="block_title"><?php echo $block_title ?></h3>
			<div class="block_intro"><?php echo $block_intro ?></div>
		<?php 
		unset($catquery);
		unset($new_query);
		$new_query = "cat=" . $block_category . "&posts_per_page=3" ;
		$catquery = new WP_Query( $new_query ) ;
		while($catquery->have_posts()) : $catquery->the_post(); ?>
			<div class="blog-item flex-item">
				<div class="blog-item__img">
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
	</div>


<?php



    endwhile;

else :

    // no rows found

endif;


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

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
