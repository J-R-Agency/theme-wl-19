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

$theme_path = get_template_directory_uri();

if($_POST['submit']) {
  // we will add the code to process submitted form here
    // we can also echo some text here if form is submitted

    // Goal
    if ( $_POST['wl_goal'] ) {
    	
    	// echo "<br>The wl_goal exists:  " . $_POST['wl_goal'] ;
		$cookie_name = "wl_goal";
		$cookie_value = $_POST['wl_goal'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	// echo "<br>The wl_goal exists:  " . $_COOKIE['wl_goal'] ;

    }


    // Step One
    if ( $_POST['wl_step_one'] ) {
    	
    	// echo "<br>The wl_step_one exists:  " . $_POST['wl_step_one'] ;
		$cookie_name = "wl_step_one";
		$cookie_value = $_POST['wl_step_one'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	// echo "<br>The wl_step_one exists:  " . $_COOKIE['wl_step_one'] ;

    }

    // Step Two
    if ( $_POST['wl_step_two'] ) {
    	
    	// echo "<br>The wl_step_two exists:  " . $_POST['wl_step_two'] ;
		$cookie_name = "wl_step_two";
		$cookie_value = $_POST['wl_step_two'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	// echo "<br>The wl_step_two exists:  " . $_COOKIE['wl_step_two'] ;

    }

    // Step Three
    if ( $_POST['wl_step_three'] ) {
    	
    	// echo "<br>The wl_step_three exists:  " . $_POST['wl_step_three'] ;
		$cookie_name = "wl_step_three";
		$cookie_value = $_POST['wl_step_three'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	// echo "<br>The wl_step_three exists:  " . $_COOKIE['wl_step_three'] ;

    }

    // Step Four
    if ( $_POST['wl_step_four'] ) {
    	
    	// echo "<br>The wl_step_four exists:  " . $_POST['wl_step_four'] ;
		$cookie_name = "wl_step_four";
		$cookie_value = $_POST['wl_step_four'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	// echo "<br>The wl_step_four exists:  " . $_COOKIE['wl_step_four'] ;

    }

    // Step Three
    if ( $_POST['wl_step_five'] ) {
    	
    	// echo "<br>The wl_step_five exists:  " . $_POST['wl_step_five'] ;
		$cookie_name = "wl_step_five";
		$cookie_value = $_POST['wl_step_five'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	// echo "<br>The wl_step_five exists:  " . $_COOKIE['wl_step_five'] ;

    }

    // Notes
    if ( $_POST['wl_notes'] ) {
    	
    	// echo "<br>The wl_notes exists:  " . $_COOKIE['wl_notes'] ;
		$cookie_name = "wl_notes";
		$cookie_value = $_POST['wl_notes'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	// echo "<br>The wl_notes exists:  " . $_COOKIE['wl_notes'] ;

    }

	header('Location: /action-plan/');

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

	header('Location: /action-plan-cleared/');

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
// Not set
} else {
// Set
    $wl_goal = $_COOKIE[$cookie_name];
}

$cookie_name = "wl_step_one";
if(!isset($_COOKIE[$cookie_name])) {
// Not set
} else {
// Set
    $wl_step_one = $_COOKIE[$cookie_name];
}

$cookie_name = "wl_step_two";
if(!isset($_COOKIE[$cookie_name])) {
// Not set
} else {
// Set
	$wl_step_two = $_COOKIE[$cookie_name];
}

$cookie_name = "wl_step_three";
if(!isset($_COOKIE[$cookie_name])) {
// Not set
} else {
// Set
    $wl_step_three = $_COOKIE[$cookie_name];
}

$cookie_name = "wl_step_four";
if(!isset($_COOKIE[$cookie_name])) {
// Not set
} else {
// Set
    $wl_step_four = $_COOKIE[$cookie_name];
}

$cookie_name = "wl_step_five";
if(!isset($_COOKIE[$cookie_name])) {
// Not set
} else {
// Set
    $wl_step_five = $_COOKIE[$cookie_name];
}

$cookie_name = "wl_notes";
if(!isset($_COOKIE[$cookie_name])) {
// Not set
} else {
// Set
   $wl_notes = $_COOKIE[$cookie_name];
}

?>


				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'loop-templates/content', 'page' ); ?>
<?php 
if(!isset($_COOKIE["wl_goal"])) {
// Not set

?>

<!-- Separator -->
<div class="wl_banner_next">
	<img src="<?php echo $theme_path; ?>/assets/images/icon-down-arrow.png"
		alt="Next"
		height="70"
		width="70">
</div>

<!-- Action Plan Advice -->

<div class="wl_advice_privacy__container">
	<div class="wl_advice_privacy__img wl_advice_icon">
		<img src="<?php echo $theme_path; ?>/assets/images/icon-lock.png"
			alt="Privacy"
			height="70"
			width="70">
	</div>
	<div class="wl_advice_privacy__info">
		<h3>Privacy first</h3>
		<p>We don't store any personal data and your Action Plan can be cleared at any time</p> 
	</div>
</div>
<h2>Put your plan into action!</h2>
<div class="wl_advice_action__container">
	
	<div class="wl_advice_action__item wl_advice_email__container">
		<div class="wl_advice_email__header wl_advice_header">
			<div class="wl_advice_email__img wl_advice_icon">
				<img src="<?php echo $theme_path; ?>/assets/images/icon-mail.png"
					alt="Email your Action Plan"
					height="70"
					width="70">
			</div>
			<div class="wl_advice_email__title wl_advice_title">
				<h3>Email your Action Plan</h3>
			</div>
		</div>
		<div class="wl_advice_email__info">
			<p>Once you have created your Action Plan you can email it to yourself to to refer back to and keep you on track!</p>
		</div>
	</div>
	
	<div class="wl_advice_action__item wl_advice_print__container">
		<div class="wl_advice_print__header wl_advice_header">
			<div class="wl_advice_print__img wl_advice_icon">
				<img src="<?php echo $theme_path; ?>/assets/images/icon-print.png"
					alt="Print your Action Plan"
					height="70"
					width="70">
			</div>
			<div class="wl_advice_print__title wl_advice_title">
				<h3>Print your Action Plan</h3>
			</div>
		</div>
		<div class="wl_advice_print__info">
			<p>You can print a copy of your Action Plan to pin on your wall so you can keep everything fresh in your mind.</p>
		</div>
	</div>	

	<div class="wl_advice_action__item wl_advice_share__container">
		<div class="wl_advice_share__header wl_advice_header">
			<div class="wl_advice_share__img wl_advice_icon">
				<img src="<?php echo $theme_path; ?>/assets/images/icon-group.png"
					alt="Share your goals"
					height="70"
					width="70">
			</div>
			<div class="wl_advice_share__title wl_advice_title">
				<h3>Share your goals</h3>
			</div>
		</div>
		<div class="wl_advice_share__info">
			<p>We know it can help when you feel supported, so you can share your Action Plan with a friend, family member or health professional.</p>
		</div>
	</div>	

	<div class="wl_advice_action__item wl_advice_help__container">
		<div class="wl_advice_help__header wl_advice_header">
			<div class="wl_advice_help__img wl_advice_icon">
				<img src="<?php echo $theme_path; ?>/assets/images/icon-message.png"
					alt="We are here to help"
					height="70"
					width="70">
			</div>
			<div class="wl_advice_help__title wl_advice_title">
				<h3>We are here to help</h3>
			</div>
		</div>
		<div class="wl_advice_help__info">
			<p>If you would like a hand setting up your Action Plan we can help. The best way to do this is a referral through your GP.</p>
		</div>
	</div>

</div>

<?php
} else {
// Set
   
}
?>

<!-- Separator -->
<div class="wl_banner_next">
	<img src="<?php echo $theme_path; ?>/assets/images/icon-down-arrow.png"
		alt="Next"
		height="70"
		width="70">
</div>

				<!-- action plan form -->
				<div id="wl_actionplan" class="wl_actionplan">
				<form name="actionplan" id="actionplan" class="actionplan" action="" method="POST">
					
					<h1>Action Plan</h1>
					<label for="wl_goal"><h2>Goal</h2></label>
					<input type="text" name="wl_goal" id="wl_goal" value="<?php echo $wl_goal;?>" placeholder="Describe your main goal">

					<h2>Key steps</h2>
					<label class="visually-hidden" for="wl_step_one">Step 1:</label>
					<input class="wl_steps" type="text" name="wl_step_one" id="wl_step_one" value="<?php echo $wl_step_one;?>" placeholder="Step 1: e.g. Find out what groups there are">
					<label class="visually-hidden" for="wl_step_two">Step 2:</label>
					<input class="wl_steps" type="text" name="wl_step_two" id="wl_step_two" value="<?php echo $wl_step_two;?>" placeholder="Step 2: e.g. Join a walking group">					
					<label class="visually-hidden" for="wl_step_three">Step 3:</label>
					<input class="wl_steps" type="text" name="wl_step_three" id="wl_step_three" value="<?php echo $wl_step_three;?>" placeholder="Step 3: e.g. Try to socialise at least once a week">
					<label class="visually-hidden" for="wl_step_four">Step 4:</label>
					<input class="wl_steps" type="text" name="wl_step_four" id="wl_step_four" value="<?php echo $wl_step_four;?>" placeholder="Step 4">					
					<label class="visually-hidden" for="wl_step_five">Step 5:</label>
					<input class="wl_steps" type="text" name="wl_step_five" id="wl_step_five" value="<?php echo $wl_step_five;?>" placeholder="Step 5">

					<!-- display shortlist from action plan (favorites plugin) -->
					<?php

					echo "<h2>Key Activities</h2>" ;

					// Action Plan but no activities yet
					$msg_no_activities_a = "
							<h3>Oops, you have no activities yet</h3>
							<p>You can <a href=\"/types-of-activity/\">view types of activity</a>, <a href=\"/search-for-an-activity/\">search for activities</a> or <a href=\"/blog/\">read our blog</a>.</p>
					";

					// No Action Plan or activities
					$msg_no_activities_b = "
							<h3>Oops, you have no activities yet</h3>
							<p>You can <a href=\"/create-your-action-plan/\">create a new action plan</a>, <a href=\"/search-for-an-activity/\">search for activities</a> or <a href=\"/blog/\">read our blog</a>.</p>
					";

					$cookie_name = "simplefavorites";
					if(!isset($_COOKIE[$cookie_name])) {
					// Not set
						if ( !isset($_COOKIE['wl_goal']) ) {
							echo $msg_no_activities_b ;
						} else {
							echo $msg_no_activities_a ;
						}

					} else {
					// Set
						$wl_simplefavorites = json_decode(stripslashes($_COOKIE['simplefavorites']), true);
						$wl_shortlist = $wl_simplefavorites[0]["posts"] ;

						if ( empty( $wl_shortlist ) ) {

							if ( !isset($_COOKIE['wl_goal']) ) {
								echo $msg_no_activities_b ;
							} else {
								echo $msg_no_activities_a ;
							}

						} else {


						$args = array(
						    'post_type' => 'activities',
						    'post__in' => $wl_shortlist ,
						);
												

						$shortlist_posts = new WP_Query($args);

						if($shortlist_posts->have_posts()) : 
						  while($shortlist_posts->have_posts()) : 
						     $shortlist_posts->the_post();

						     // echo "<h3>" . get_the_title() ." - " . $post->ID . "</h3>";

						     echo "<h3>" . get_the_title()  . "</h3>";

							endwhile;
						else: 

							if ( !isset($_COOKIE['wl_goal']) ) {
								echo $msg_no_activities_b ;
							} else {
								echo $msg_no_activities_a ;
							}
							
						endif;

						wp_reset_postdata();

						}


					}
						// the_user_favorites_list($user_id, $site_id, $include_links = true, $filters, $include_button, $include_thumbnails = false, $thumbnail_size = 'thumbnail', $include_excerpt = false) ;
					?>


					<label for="wl_notes">Notes:</label>
					<textarea name="wl_notes" id="wl_notes" placeholder="Here you can add any notes or tips"><?php echo $wl_notes;?></textarea>

					<input type="submit" name="submit" value="Create your Action Plan" />
					<input type="submit" name="clear" value="Clear" />

				</form>
				</div>
				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer();
