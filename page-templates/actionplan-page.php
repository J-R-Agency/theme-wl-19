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
include get_theme_file_path( '/global-templates/actionplan-functions.php' );
include get_theme_file_path( '/global-templates/actionplan-variables.php' );

// Process posted action plan variables and set cookies
include get_theme_file_path( '/global-templates/actionplan-postvariables.php' );

// Set up page variables from cookies
include get_theme_file_path( '/global-templates/actionplan-cookievariables.php' );

// Clear action plan variables and expire cookies
include get_theme_file_path( '/global-templates/actionplan-clear.php' );

// Set 'action plan' body text for use in HTML emails * uses cookies etc. - check data flow
include get_theme_file_path( '/global-templates/actionplan-htmlemail.php' );

// Process email form variables and send email
include get_theme_file_path( '/global-templates/actionplan-email.php' );

// Process share form variables and send email
include get_theme_file_path( '/global-templates/actionplan-share.php' );

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
				// Display notifications and errors
				include get_theme_file_path( '/global-templates/actionplan-notifications.php' );
				?>

				<?php while ( have_posts() ) : the_post(); ?>

				<div class="actionplan__container">
				<?php
				// Display main action plan form
				include get_theme_file_path( '/global-templates/actionplan-mainform.php' );
				?>
				</div>
				<?php endwhile; // end of the loop. ?>
					<?php 
					if(!isset($_COOKIE["wl_goal"])) {
					// Not set
					?>

					<?php echo $steps_separator ; ?>

					<?php
					// Display advice boxes
					include get_theme_file_path( '/global-templates/actionplan-adviceboxes.php' );
					?>

					<?php
					} else {
						// Set
						// Display action boxes
						include get_theme_file_path( '/global-templates/actionplan-nextsteps.php' );
					}
					?>


			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer();
