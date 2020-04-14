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

if($_POST['submit']) {
  // we will add the code to process submitted form here
    // we can also echo some text here if form is submitted
    if($_POST['inputname']){
    	echo "The input exists:  " . $_POST['inputname'] ;


		// PROOF OF CONCEPT
		// GREG MACOY
		$cookie_name = "wl_goal";
		$cookie_value = $_POST['inputname'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");

    }
}

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
$cookie_name = "wl_goal";
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
    $inputname = $_COOKIE[$cookie_name];
}
?>
				<!-- action plan form -->
				<form id="formid" action="" method="POST">
					<input type="text" name="inputname" value="<?php echo $inputname;?>" />
					<input type="submit" name="submit" value="submit" />
				</form>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer();
