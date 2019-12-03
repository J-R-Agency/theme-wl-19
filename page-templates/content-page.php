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
	<div class="row">
		<div class="col-12">
			<div class="hero" style="background-image: url("<?php echo $image['url']; ?>");>
			    <?php $image = the_post_thumbnail(); ?>
			</div>
		</div>
	</div>
	<?php endif ?>
	
	
	<div class="row">
		<div class="col-12">
			<h3 class="center-text"><?php the_title(); ?></h3>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12 content-copy">
			<?php the_field('content_copy'); ?>
		</div>
	</div>
	
	<div class="row">
		<div class="col-1"></div>
		<div class="col-10 content-copy">
			<?php 
			$link = get_field('call_to_action');
			if( $link ): 
			    $link_url = $link['url'];
			    $link_title = $link['title'];
			    $link_target = $link['target'] ? $link['target'] : '_self';
			    ?>
			    <a class="call-to-action-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
			<?php endif; ?>
		</div>
		<div class="col-1"></div>
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
	?>    
			<div class="row content-copy">
				<div class="col-md-2 col-0"></div>
				
				<?php if( get_row_index() == 1 ) { ?>
					<div class="col-md-8 col-12 action-box-one">
				<?php } elseif( get_row_index() == 2 ) { ?>
					<div class="col-md-8 col-12 action-box-two">
				<?php } else {?>
					<div class="col-md-8 col-12 action-box-three">
				<?php } ?>
				
					<h4><?php echo $title; ?></h4>
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
