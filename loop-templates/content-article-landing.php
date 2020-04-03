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
					<img src=\"\"> 
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
/*
        echo "<pre>" ;
        print_r( $block_title );
        print_r( $block_intro );
        print_r( $block_category );
        echo "</pre>" ;
*/

		echo "
			<div class=\"row mt-20\">
				<div class=\"blog_container flex-container\">" ;
		$catquery = new WP_Query( 'cat=" . $block_category . "&posts_per_page=3' ) ;
		while($catquery->have_posts()) : $catquery->the_post() ;
			echo "
					<div class=\"blog-item flex-item\">
						<div class=\"blog-item__img\">
							" ;
							get_the_post_thumbnail();
			echo "
						</div>
						<h3 class=\"blog-item__title\"><a href=\"" . the_permalink() . "\" rel=\"bookmark\">" . the_title() . "</a></h3>
						<div class=\"blog-item__summary\">
							" . the_excerpt() . "
						</div>
					</div>" ;
		endwhile ;
		wp_reset_postdata() ;
		echo "
				</div>
			</div>" ;

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