<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

// Get uploads path
$uploads = wp_get_upload_dir();
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="container-fluid">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

						<!--<?php understrap_site_info(); ?>-->
						<div class="row partners">
							<div class="col-12">
								<h4>
									Delivered in partnership with
								</h4>
							</div>
							<div class="row">
								<div class="col-4">
									<img src="<?php echo $uploads['basedir'];?>/2019/12/healthwatch-liverpool-logo.png" alt="Healthwatch Liverpool">
								</div>
								<div class="col-4">
									<img src="<?php echo $uploads['basedir'];?>/2019/12/citizens-advice-liverpool-logo.jpg" alt="Citizens Advice Liverpool">
								</div>
							</div>
						</div>
						
						<div class="row footer-links">
							<div class="col-md-6 col-xs-12 footer-left">
								<h2>
									Wellbeing Liverpool
								</h2>
							</div>
							
							<div class="col-md-6 col-xs-12 footer-right">
								<div class="row">
									<div class="col-12 links">
										<span>
											<a href="<?php echo get_permalink( get_page_by_path( 'get-in-touch' ) ); ?>">																		Get in touch
											</a>
										</span>
										<span>
											<a href="<?php echo get_permalink( get_page_by_path( 'privacy-policy' ) ); ?>">
												Privacy Policy
											</a>
										</span>
										<span>
											<a href="<?php echo get_permalink( get_page_by_path( 'legal-information' ) ); ?>">
												Legal Information
											</a>										
										</span>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<p>
											0300 77 77 007
										</p>
										<p>	enquiries@healthwatchliverpool.co.uk
										</p>
										<p>
											4th floor, 151 Dale Street, Liverpool, L2 2AH
										</p>
									</div>
								</div>
									
							</div>
						
						</div>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

