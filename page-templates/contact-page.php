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
			
			<div class="row">
				<div class="col-12 content-copy">
					<h1>Get in touch</h1>
					<p>Here are a few ways to get in touch with us. Please choose whichever method feels the most comfortable for you.</p>
					
					
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2378.238219084266!2d-2.997528484682095!3d53.41056567760082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487b21d234cfabf9%3A0x93751a74f8df9d9b!2sCitizens%20Advice%20Liverpool%20office!5e0!3m2!1sen!2suk!4v1575385333769!5m2!1sen!2suk" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
					
					<h1>Contact Information</h1>
					<h2>Citizens Advice Liverpool</h2>
					<p>Citizens Advice Liverpool gives you advice on a wide range of subjects such as: benefits, work, debt & money, consumer, family, housing, law & courts, immigration and health. There are a number of ways that you can contact us, depending on the advice you need.</p>
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
