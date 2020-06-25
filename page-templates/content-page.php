<?php
/**
 * Template Name: Content Page Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div class="container-fluid">
	
	<?php if ( has_post_thumbnail() ): ?>
		<?php $thumb = get_the_post_thumbnail_url(); ?>
			<div class="hero" style="background-image: url('<?php echo $thumb; ?>') ;"></div>
			<div class="hero_inner" style="background-image: url('<?php echo $thumb; ?>') ;"></div>	
	<?php endif ?>
	
	
	<div class="row entry-header">
		<div class="col-12">
			<h1 class="centered"><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="row">
		<div class="col-12 content-copy">	
		<?php while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
	        <div class="entry-content-page">
	            <?php the_content(); ?> <!-- Page Content -->
	            <h1 class="centered"><?php the_field('cta_title'); ?></h1>
	        </div><!-- .entry-content-page -->
	    <?php
	    endwhile; //resetting the page loop
	    wp_reset_query(); //resetting the page query
	    ?>
		</div>
	</div>
	
	
	<?php
	
	// check if the repeater field has rows of data
	if( have_rows('call_to_action_boxes') ):
	
	 	// loop through the rows of data
	    while ( have_rows('call_to_action_boxes') ) : the_row();
	
	        // display a sub field value
	        $title = get_sub_field('action_title');
	        $description = get_sub_field('action_description');
	        $link = get_sub_field('action_link');
	        $modifier = get_sub_field('modifier');
	        if(!empty($modifier)){
	        	$modifier_class = " action-box--" . $modifier ;
	        }
	?>    
			<div class="row content-copy">
				<div class="col-md-2 col-0"></div>
				
				<?php
					echo "<div class=\"col-md-8 col-12 action-box action-box--" . get_row_index() . $modifier_class . "\">" ;
				?>

				
					<h2><?php echo $title; ?></h2>
					<p><?php echo $description; ?></p>
					
					<?php 
					if( $link ): 
					    $link_url = $link['url'];
					    $link_title = $link['title'];
					    $link_target = $link['target'] ? $link['target'] : '_self';
					    ?>
					    <a class="call-to-action-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>
					
				</div>
				<div class="col-md-2 col-0"></div>
			</div>
	<?php
	    endwhile;
	
	else :
	
	    // no rows found
	
	endif;
	
	?>
	
	
</div>

<?php
get_footer();
?>
