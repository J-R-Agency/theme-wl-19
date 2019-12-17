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
		
		<!-- What we do -->
		<div class="col-md-6 col-12 d-flex">
			<div class="highlight w-100">
				<p class="vertical-center">
					<?php while(have_posts()) : the_post(); ?>
						<?php the_content();?>
					<?php endwhile; ?>
				</p>
			</div>
		</div>
		<!-- end what we do -->
		
		<!-- What would you like to do? (action-box bar) -->
		<div class="col-md-6 col-12 d-flex">
			<?php include get_template_directory() ."/global-templates/search-box.php"; ?>
		</div>
		<!-- end What would you like to do? -->
		
	</div>
	
	
	<div class="row mt-5">
		<div class="col-12">
			<h1 class="centered">What do you want to be?</h1>
		</div>
	</div>
	
	<!-- MOOD BUTTONS -->
	<?php include get_template_directory() ."/global-templates/mood-buttons.php"; ?>
	<!-- end mood buttons -->
	
	<!-- What would you like to try? -->
	<?php include get_template_directory() ."/global-templates/activity-buttons.php"; ?>	
	<!-- end What would you like to try? -->
	
	<!-- Horizontal break -->
	<hr>
	
	
	<div class="row mt-20">
		
		<!-- Benefits of an Action Plan -->
		<div class="col-md-6 col-sm-12 d-flex">
			<div class="highlight w-100">
				<h1><?php the_field("benefits_title"); ?></h1>
				<ul>
					<?php
						// check if the repeater field has rows of data
						if( have_rows('benefits_list') ):
						
						 	// loop through the rows of data
						    while ( have_rows('benefits_list') ) : the_row();
						
						        // display a sub field value
						        $bulletPoint = get_sub_field('benefits_bullet_point');
					?> 
							<li><?php echo $bulletPoint; ?></li>  
						<?php
						    endwhile;
						else :
						    // no rows found
						endif;
						?>				
				</ul>
			</div>
		</div>
		<!-- end benefits of an action plan -->
		
		<!-- Create your Action Plan -->
		<div class="col-md-6 col-sm-12 d-flex">
			<div class="action-box w-100">
				<h1><?php the_field("create_ac_title");?></h1>
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
		<!-- end create an action plan -->
		
	</div>
	
	<div class="row mt-20">
		<!-- TWITTER BOX -->
		<div class="col-md-6 col-sm-12 d-flex">
			<div class="highlight w-100">
				<h1>Twitter</h1>
			</div>
		</div>
		<!-- end twitter -->
		
		<!-- INSTAGRAM BOX -->
		<div class="col-md-6 col-sm-12 d-flex">
			<div class="action-box w-100">
				<h1>Instagram</h1>
			</div>
		</div>
		<!-- end instagram -->
	</div>	
	
</div>

<?php
get_footer();
?>