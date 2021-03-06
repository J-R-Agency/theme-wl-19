<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$site_url = site_url();
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


	<div class="entry-content">

		<?php the_content(); ?>



				<!-- Lead story -->
		<?php
		$lead_story = get_field( "lead_story" );
		if (  $lead_story != "" ){
			global $post;
			$post = $lead_story ;
			setup_postdata( $post );
			$lead_link = $post->guid ;
			echo "
			<div class=\"block_container\">
				<div class=\"lead_story__card\">
					<div class=\"lead_story__image\">
						" . get_the_post_thumbnail() . "
					</div>
					<div class=\"lead_story__details\">
						<h3><a href=\"\">" . $post->post_title . "</a></h3>
						<p class=\"lead_story__excerpt\">" . $post->post_excerpt . "</p>
						<div class=\"lead_story__button\"><a class=\"btn btn-secondary understrap-read-more-link\" href=\"" . get_permalink() . "\">Read more &gt;</a></div>
					</div>
				</div>
			</div>
			";
		}

		?>
		<?php wp_reset_postdata(); ?>

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
        $read_more_link_text = get_sub_field('read_more_link_text');
        $block_term = get_term($block_category);
        $category_link = get_category_link($block_category);

?>
	
	<div class="block_container">
		<!-- Section title -->
		<a href='<?php echo $category_link; ?>'>
			<h3 class="block_title"><?php echo $block_title ; ?></h3>
		</a>
		
		<div class="block_intro"><?php echo $block_intro ; ?></div>
		
		<div class="article__container">
			<?php 
			unset($catquery);
			unset($new_query);
			$new_query = "cat=" . $block_category . "&posts_per_page=3" ;
			$catquery = new WP_Query( $new_query ) ;
			while($catquery->have_posts()) : $catquery->the_post(); ?>
				<div class="article__item">
					<a href="<?php the_permalink() ?>" rel="bookmark">
					<div class="article__img" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
					</div>
					<h3 class="article__title"><?php the_title(); ?></h3>
					<div class="article__summary">
						<?php the_excerpt(); ?>
					</div>
					</a>
				</div>
			<?php endwhile; ?> 
			<?php wp_reset_postdata(); ?>
		</div>
		
		<a class='read-more-link' href='<?php echo $category_link; ?>'>
			<?php
				if (!$read_more_link_text) {
					echo "Read more of our ".$block_term->name;
				} else {
					echo $read_more_link_text;
				}
				
			?>
		</a>
		
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
