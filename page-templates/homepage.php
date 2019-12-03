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
		<div class="col-md-6 col-sm-12 highlight vertical-center">
			<p> <?php while(have_posts()) : the_post(); ?>
				<?php the_content();?>
				<?php endwhile; ?></p>
		</div>
		<div class="col-md-6 col-sm-12 search">
			<h4>What would you like to do?</h4>
		</div>
	</div>
	
	<div class="row mt-5">
		<div class="col-12">
			<h3 class="horizontal-center">What do you want to be?</h3>
		</div>
	</div>

	<!-- MOOD BUTTONS -->
	<div class="row mb-5 horizontal-center mood-btns">
		<div class="col-md-2 col-4">
			<button style="background-color: #4e8f48;">Active</button>
		</div>
		<div class="col-md-2 col-4">
			<button style="background-color: #fa952f;">Creative</button>
		</div>
		<div class="col-md-2 col-4">
			<button style="background-color: #d70014;">Useful</button>
		</div>
		<div class="col-md-2 col-4">
			<button style="background-color: #996fca;">Social</button>
		</div>
		<div class="col-md-2 col-4">
			<button style="background-color: #ff8cd3;;">Calm</button>
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
					<div class="col-md-3 col-12 activity">
						<!-- Activity icon -->
						<div class="col-md-12 col-4 horizontal-center">
							<?php if( $link ): ?>
								<a href="<?php echo $link; ?>">
							<?php endif; ?>
				
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" class="activity-icon horizontal-center"/>
						
							<?php if( $link ): ?>
								</a>
							<?php endif; ?>
						</div>
						
						<!-- Activity copy -->
						<div class="col-md-12 col-8">
							
							
							<h4 class="activity-name">
								<?php if( $link ): ?>
									<a href="<?php echo $link; ?>">
								<?php endif; ?>							
							    	<?php echo $name; ?>
								<?php if( $link ): ?>
									</a>
								<?php endif; ?>	
							</h4>					    	
						    	
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
			<h4><?php the_field("action_plan_title"); ?></h4>
			<ul>
				<?php the_field("action_plan_copy"); ?>
			</ul>
		</div>
		<div class="col-md-6 col-sm-12 search">
			<h4><?php the_field("create_ac_title");?></h4>
			<p><?php the_field("create_ac_copy");?></p>
			
			<?php
				$link = get_field('create_ac_link');
				if( $link ): 
			    	$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
			?>
			<a class="call-to-action-btn" style="background-color: #0077AF;" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
			<?php endif; ?>
			
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