<?php
/**
 * Template Name: Action Plan Page Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set up Action Plan variables & functions
$include_path = get_theme_file_path( '/global-templates/actionplan-variables.php' );
include get_theme_file_path( '/global-templates/actionplan-variables.php' );
include get_theme_file_path( '/global-templates/actionplan-functions.php' );

// Process posted action plan variables and set cookies
include get_theme_file_path( '/global-templates/actionplan-postvariables.php' );

// Clear action plan variables and expire cookies
include get_theme_file_path( '/global-templates/actionplan-clear.php' );


// Process email form variables and send email
include get_theme_file_path( '/global-templates/actionplan-email.php' );

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php
				// Set up page variables from cookies
				include get_theme_file_path( '/global-templates/actionplan-cookievariables.php' );
				?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php 
					if(!isset($_COOKIE["wl_goal"])) {
					// Not set
					?>
					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

					<?php echo $steps_separator ; ?>

					<?php
					// Display advice boxes
					include get_theme_file_path( '/global-templates/actionplan-adviceboxes.php' );
					?>

					<?php echo $steps_separator ; ?>

					<?php
					} else {
					// Set
					   
					}
					?>

				<?php
				// Display main action plan form
				include get_theme_file_path( '/global-templates/actionplan-mainform.php' );
				?>
				<?php endwhile; // end of the loop. ?>

			<?php
			// Display action boxes
			include get_theme_file_path( '/global-templates/actionplan-nextsteps.php' );
			?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer();
