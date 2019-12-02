<?php
/**
 * Template Name: Homepage
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
	
	<div class="row mt-20">
		<div class="col-md-6 col-sm-12 highlight">
			<p>Wellbeing Liverpool is a service designed to help you find activities, groups and organisations that can help you live the life you want to live.</p>
		</div>
		<div class="col-md-6 col-sm-12 search">
			<h4>What would you like to do?</h4>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<h3 class="center-title">What do you want to be?</h3>
		</div>
	</div>

	<!-- MOOD BUTTONS -->
	<div class="row horizontal-center">
		<div class="col-2">
			<button>Active</button>
		</div>
		<div class="col-2">
			<button>Creative</button>
		</div>
		<div class="col-2">
			<button>Useful</button>
		</div>
		<div class="col-2">
			<button>Social</button>
		</div>
		<div class="col-2">
			<button>Calm</button>
		</div>
	</div>
	
	<!-- What would you like to try? -->
	<div class="row highlight">
		<div class="row">
			<div class="col-12">
				<h3 class="horizontal-center">What would you like to try?</h3>
			</div>
		</div>
		
		<div class="row">
			<?php if( have_rows('activity') ): ?>
						
				<?php while( have_rows('activity') ): the_row(); 
			
					// vars
					$image = get_sub_field('activity_icon');
					$name = get_sub_field('activity_name');
					$description = get_sub_field('activity_description');
					$link = get_sub_field('activity_link');
			
					?>
					<div class="col-md-3 col-xs-12">
						<!-- Activity icon -->
						<div class="col-md-12 col-xs-6 horizontal-center">
							<?php if( $link ): ?>
								<a href="<?php echo $link; ?>">
							<?php endif; ?>
				
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" class="activity-icon horizontal-center"/>
						
							<?php if( $link ): ?>
								</a>
							<?php endif; ?>
						</div>
						
						<!-- Activity copy -->
						<div class="col-md-12 col-xs-6">
						    <h4 class="activity-name"><?php echo $name; ?></h4>
						    <p class="activity-description"><?php echo $description; ?></p>
						</div>
					</div>
					
				<?php endwhile; ?>
			
			<?php endif; ?>
		</div>
	</div>
	
	<!-- Horizontal break -->
	<hr>
	
	
	<div class="row mt-20">
		<div class="col-md-6 col-sm-12 highlight">
			<h4>Benefits of an Action Plan</h4>
			<ul>
				<li>Be more productive</li>
				<li>Reduce stress</li>
				<li>Stay on target</li>
				<li>Feel more supported</li>
			</ul>
		</div>
		<div class="col-md-6 col-sm-12 search">
			<h4>Create your action plan!</h4>
		</div>
	</div>
	
	<div class="row mt-20">
		<div class="col-md-6 col-sm-12 highlight">
			<h4>Twitter</h4>
			
		</div>
		<div class="col-md-6 col-sm-12 search">
			<h4>Instagram</h4>
		</div>
	</div>	
	
</div>

<?php
get_footer();
?>