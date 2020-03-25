<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'single' ); ?>

					<?php understrap_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

					<?php
					// Get API custom fields 
					$websiteurl = get_field('websiteurl');
					$wellbeing_api_cost_bracket = get_field('wellbeing-api-cost-bracket');
					$wellbeing_api_theme = get_field('wellbeing-api-theme');
					$wellbeing_api_days_of_the_week = get_field('wellbeing-api-days-of-the-week');

					echo "<pre>
						websiteurl = $websiteurl
						wellbeing-api-cost-bracket = $wellbeing_api_cost_bracket
						wellbeing-api-theme = $wellbeing_api_theme
						wellbeing-api-days-of-the-week = $wellbeing_api_days_of_the_week
						</pre>
						";

						$wl_api_cost = explode(",",$wellbeing_api_cost_bracket);
						$wl_api_theme = explode(",",$wellbeing_api_theme);
						$wl_api_days = explode(",",$wellbeing_api_days_of_the_week);

						//function wl_api_format_cost($wl_api_cost) {
							foreach $wl_api_cost as $cost{
								echo str_replace ("WLFREE", "FREE");
								echo str_replace ("WLLowCost", "&pound;");
								echo str_replace ("WLMidCost", "&pound;&pound;");
								echo str_replace ("WLHighCost", "&pound;&pound;&pound;");
							}
						//}

					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php get_footer();
