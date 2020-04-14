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
		$cookie_name = "wl_goal";
		$cookie_value = $_POST['inputname'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");

    }

    // Goal
    if ( $_POST['wl_goal'] ) {
    	
    	echo "The wl_goal exists:  " . $_POST['wl_goal'] ;
		$cookie_name = "wl_goal";
		$cookie_value = $_POST['wl_goal'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");

    }


    // Step One
    if ( $_POST['wl_step_one'] ) {
    	
    	echo "The wl_step_one exists:  " . $_POST['wl_step_one'] ;
		$cookie_name = "wl_step_one";
		$cookie_value = $_POST['wl_step_one'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");

    }

    // Step Two
    if ( $_POST['wl_step_two'] ) {
    	
    	echo "The wl_step_two exists:  " . $_POST['wl_step_two'] ;
		$cookie_name = "wl_step_two";
		$cookie_value = $_POST['wl_step_two'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");

    }

    // Step Three
    if ( $_POST['wl_step_three'] ) {
    	
    	echo "The wl_step_three exists:  " . $_POST['wl_step_three'] ;
		$cookie_name = "wl_step_three";
		$cookie_value = $_POST['wl_step_three'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");

    }


    // Notes
    if ( $_POST['wl_notes'] ) {
    	
    	echo "The wl_notes exists:  " . $_POST['wl_notes'] ;
		$cookie_name = "wl_notes";
		$cookie_value = $_POST['wl_notes'] ;
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

$cookie_name = "wl_step_one";
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
    $inputname = $_COOKIE[$cookie_name];
}

$cookie_name = "wl_step_two";
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
    $inputname = $_COOKIE[$cookie_name];
}

$cookie_name = "wl_step_three";
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
    $inputname = $_COOKIE[$cookie_name];
}

$cookie_name = "wl_notes";
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
    $inputname = $_COOKIE[$cookie_name];
}

?>
				<!-- action plan form -->
				<form name="actionplan" id="actionplan" class="actionplan" action="" method="POST">
					<h2>Action Plan</h2>
					<label for="wl_goal">Goal</label>
					<input type="text" name="wl_goal" id="wl_goal" value="<?php echo $wl_goal;?>">
					<h3>Key steps</h3>
					<label for="wl_step_one">Step 1:</label>
					<input type="text" name="wl_step_one" id="wl_step_one" value="<?php echo $wl_step_one;?>">
					<label for="wl_step_two">Step 2:</label>
					<input type="text" name="wl_step_two" id="wl_step_two" value="<?php echo $wl_step_two;?>">					
					<label for="wl_step_three">Step 3:</label>
					<input type="text" name="wl_step_three" id="wl_step_three" value="<?php echo $wl_step_three;?>">
					<label for="wl_notes">Notes:</label>
					<textarea name="wl_notes" id="wl_notes"><?php echo $wl_notes;?></textarea>

					
					<input type="submit" name="submit" value="Create your Action Plan" />




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
