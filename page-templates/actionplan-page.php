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

    // Goal
    if ( $_POST['wl_goal'] ) {
    	
    	echo "<br>The wl_goal exists:  " . $_POST['wl_goal'] ;
		$cookie_name = "wl_goal";
		$cookie_value = $_POST['wl_goal'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	echo "<br>The wl_goal exists:  " . $_COOKIE['wl_goal'] ;

    }


    // Step One
    if ( $_POST['wl_step_one'] ) {
    	
    	echo "<br>The wl_step_one exists:  " . $_POST['wl_step_one'] ;
		$cookie_name = "wl_step_one";
		$cookie_value = $_POST['wl_step_one'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	echo "<br>The wl_step_one exists:  " . $_COOKIE['wl_step_one'] ;

    }

    // Step Two
    if ( $_POST['wl_step_two'] ) {
    	
    	echo "<br>The wl_step_two exists:  " . $_POST['wl_step_two'] ;
		$cookie_name = "wl_step_two";
		$cookie_value = $_POST['wl_step_two'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	echo "<br>The wl_step_two exists:  " . $_COOKIE['wl_step_two'] ;

    }

    // Step Three
    if ( $_POST['wl_step_three'] ) {
    	
    	echo "<br>The wl_step_three exists:  " . $_POST['wl_step_three'] ;
		$cookie_name = "wl_step_three";
		$cookie_value = $_POST['wl_step_three'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	echo "<br>The wl_step_three exists:  " . $_COOKIE['wl_step_three'] ;

    }

    // Step Four
    if ( $_POST['wl_step_four'] ) {
    	
    	echo "<br>The wl_step_four exists:  " . $_POST['wl_step_four'] ;
		$cookie_name = "wl_step_four";
		$cookie_value = $_POST['wl_step_four'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	echo "<br>The wl_step_four exists:  " . $_COOKIE['wl_step_four'] ;

    }

    // Step Three
    if ( $_POST['wl_step_five'] ) {
    	
    	echo "<br>The wl_step_five exists:  " . $_POST['wl_step_five'] ;
		$cookie_name = "wl_step_five";
		$cookie_value = $_POST['wl_step_five'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	echo "<br>The wl_step_five exists:  " . $_COOKIE['wl_step_five'] ;

    }

    // Notes
    if ( $_POST['wl_notes'] ) {
    	
    	echo "<br>The wl_notes exists:  " . $_COOKIE['wl_notes'] ;
		$cookie_name = "wl_notes";
		$cookie_value = $_POST['wl_notes'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	echo "<br>The wl_notes exists:  " . $_COOKIE['wl_notes'] ;

    }

}

if($_POST['clear']) {

	// Delete Action Plan cookies
	// Set expiration to time in the past
	
	setcookie('wl_goal', "", time() - 3600, "/");
	setcookie('wl_step_one', "", time() - 3600, "/");
	setcookie('wl_step_two', "", time() - 3600, "/");
	setcookie('wl_step_three', "", time() - 3600, "/");
	setcookie('wl_step_four', "", time() - 3600, "/");
	setcookie('wl_step_five', "", time() - 3600, "/");
	setcookie('wl_notes', "", time() - 3600, "/");

	setcookie('simplefavorites', "", time() - 3600, "/");

 //  	echo "<br>Cookies cleared & Action Plan deleted" ;

   	unset($wl_goal);
	unset($wl_step_one);
	unset($wl_step_two);
	unset($wl_step_three);
	unset($wl_step_four);
	unset($wl_step_five);
	unset($wl_notes);

	unset($simplefavorites);

	header('Location: '.$_SERVER['PHP_SELF']);

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
    echo "<br>Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "<br>Cookie '" . $cookie_name . "' is set!<br>";
    echo "<br>Value is: " . $_COOKIE[$cookie_name];
    $wl_goal = $_COOKIE[$cookie_name];
}

$cookie_name = "wl_step_one";
if(!isset($_COOKIE[$cookie_name])) {
    echo "<br>Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "<br>Cookie '" . $cookie_name . "' is set!<br>";
    echo "<br>Value is: " . $_COOKIE[$cookie_name];
    $wl_step_one = $_COOKIE[$cookie_name];
}

$cookie_name = "wl_step_two";
if(!isset($_COOKIE[$cookie_name])) {
    echo "<br>Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "<br>Cookie '" . $cookie_name . "' is set!<br>";
    echo "<br>Value is: " . $_COOKIE[$cookie_name];
    $wl_step_two = $_COOKIE[$cookie_name];
}

$cookie_name = "wl_step_three";
if(!isset($_COOKIE[$cookie_name])) {
    echo "<br>Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "<br>Cookie '" . $cookie_name . "' is set!<br>";
    echo "<br>Value is: " . $_COOKIE[$cookie_name];
    $wl_step_three = $_COOKIE[$cookie_name];
}

$cookie_name = "wl_step_four";
if(!isset($_COOKIE[$cookie_name])) {
    echo "<br>Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "<br>Cookie '" . $cookie_name . "' is set!<br>";
    echo "<br>Value is: " . $_COOKIE[$cookie_name];
    $wl_step_four = $_COOKIE[$cookie_name];
}

$cookie_name = "wl_step_five";
if(!isset($_COOKIE[$cookie_name])) {
    echo "<br>Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "<br>Cookie '" . $cookie_name . "' is set!<br>";
    echo "<br>Value is: " . $_COOKIE[$cookie_name];
    $wl_step_five = $_COOKIE[$cookie_name];
}

$cookie_name = "wl_notes";
if(!isset($_COOKIE[$cookie_name])) {
    echo "<br>Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "<br>Cookie '" . $cookie_name . "' is set!<br>";
    echo "<br>Value is: " . $_COOKIE[$cookie_name];
    $wl_notes = $_COOKIE[$cookie_name];
}

?>


				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

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
					<label for="wl_step_four">Step 4:</label>
					<input type="text" name="wl_step_four" id="wl_step_four" value="<?php echo $wl_step_four;?>">					
					<label for="wl_step_five">Step 5:</label>
					<input type="text" name="wl_step_five" id="wl_step_five" value="<?php echo $wl_step_five;?>">
					<label for="wl_notes">Notes:</label>
					<textarea name="wl_notes" id="wl_notes"><?php echo $wl_notes;?></textarea>

					<input type="submit" name="submit" value="Create your Action Plan" />
					<input type="submit" name="clear" value="Clear" />

				</form>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer();
