<?php
/**
 * Template Name: Contact Page Template
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
			        </div><!-- .entry-content-page -->
			    <?php
			    endwhile; //resetting the page loop
			    wp_reset_query(); //resetting the page query
			    ?>
				</div>
			</div>
		
			<!-- Contact Information -->
		
			<?php if( have_rows('contact_information') ): ?>
						
				<?php while( have_rows('contact_information') ): the_row(); 
			
					// vars
					$image = get_sub_field('contact_icon');
					$description = get_sub_field('contact_information');
					$link = get_sub_field('contact_link');
			
				?>
					<div class="row mt-2 mb-2 content-copy">			
						<!-- Contact icon -->
						<div class="col-2">	
							<?php if( $link ): ?>
								<a href="<?php echo $link['url']; ?>" target="<?php echo esc_attr( $link['target'] ); ?>">
							<?php endif; ?>				
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" class="icon centered"/>
							<?php if( $link ): ?>
								</a>
							<?php endif; ?>	
						</div> <!-- end contact icon -->
						
						<!-- Contact copy -->
						<div class="col-10 vertical-center">
							<h2>
								<?php if( $link ): ?>
									<a href="<?php echo $link['url']; ?>" target="<?php echo esc_attr( $link['target'] ); ?>">
								<?php endif; ?>							
							    	<?php echo $description; ?>
								<?php if( $link ): ?>
									</a>
								<?php endif; ?>	
							</h2>
						</div> <!-- end contact copy -->				
					</div> <!-- end contact info row -->
					
				<?php endwhile; ?>
			
			<?php endif; ?>
		</div>

<?php 
get_footer();

?>
