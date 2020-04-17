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

// Set up Action Plan variables
$include_path = get_theme_file_path( '/global-templates/actionplan-variables.php' );
include get_theme_file_path( '/global-templates/actionplan-variables.php' );

// Process posted action plan variables and set cookies
include get_theme_file_path( '/global-templates/actionplan-postvariables.php' );





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
<?php 
if(!isset($_COOKIE["wl_goal"])) {
// Not set

?>
					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

<?php echo $steps_separator ; ?>

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

<?php echo $steps_separator ; ?>

<?php
} else {
// Set
   
}
?>


				<!-- action plan form -->
				<div id="wl_actionplan" class="wl_actionplan">
				<form name="actionplan" id="actionplan" class="actionplan" action="" method="POST">
					
					<h1>Action Plan</h1>
					<label for="wl_goal"><h2>Goal</h2></label>
					<input type="text" name="wl_goal" id="wl_goal" value="<?php echo $wl_goal;?>" placeholder="Describe your main goal for your wellbeing">

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

<?php
// Set button text

if ( !isset($_COOKIE['wl_goal']) ) {
	$msg_btn_action_plan = "Create" ;
	$flg_action_plan = 0 ;
} else {
	$msg_btn_action_plan = "Update" ;
	$flg_action_plan = 1 ;
}

?>

					<label for="wl_notes">Notes:</label>
					<textarea name="wl_notes" id="wl_notes" placeholder="Here you can add any notes or tips"><?php echo $wl_notes;?></textarea>

					<input type="submit" name="submit" value="<?php echo $msg_btn_action_plan ;?> your Action Plan" />
					<input type="submit" name="clear" value="Clear" />

				</form>
				</div>
				<?php endwhile; // end of the loop. ?>

<?php
// Show sharing and next steps

if ( $flg_action_plan ) {

	// Display next steps (sharing, print, etc.)

	echo $steps_separator ;

	// Begin HTML
	?>
<h2>What to do next</h2>
<div class="wl_actions__container">
	<div class="wl_actions__row wl_actions_columns">
		<div class="wl_actions_columns__item wl_actions_email__container">
			<form name="frm_email_actionplan" id="frm_email_actionplan" class="frm_email_actionplan" action="" method="POST">
			<div class="wl_actions_email__img wl_action_icon">
				<img src="<?php echo $theme_path; ?>/assets/images/icon-mail.png"
					alt="Email your Action Plan"
					height="70"
					width="70">
			</div>
			<div class="wl_actions_email__info">
					<label class="visually-hidden" for="wl_actionplan_actions__email">Step 1:</label>
					<input class="wl_actionplan_actions__email" type="text" name="wl_actionplan_actions__email" id="wl_actionplan_actions__email" value="<?php echo $wl_actionplan_actions__email;?>" placeholder="you@youremail.com">
			</div>
			<div class="wl_actions_email__btn wl_action_btn">
				<!--a href="#">Email your Action Plan</a-->
				<input type="submit" name="email" value="Email your Action Plan" />
			</div>
			</form>
		</div>
		<div class="wl_actions_columns__item wl_actions_print__container">
			<div class="wl_actions_print__img wl_action_icon">
				<img src="<?php echo $theme_path; ?>/assets/images/icon-print.png"
					alt="Print your Action Plan"
					height="70"
					width="70">
			</div>
			<div class="wl_actions_print__info">
				Pin your Action Plan somewhere visible so you can track your progress
			</div>
			<div class="wl_actions_print__btn wl_action_btn">
				<a onclick="window.print();return false;">Print your Action Plan</a>
			</div>
		</div>
	</div>
	<div class="wl_actions__row wl_actions_full">
		<div class="wl_actions_full__item">
			<div class="wl_actions_share__info">
				<h3>Share your goals</h3>
				<p>It can feel easier to achieve your goals if you have the support of a friend, family member or health professional. If you want to share your Action Plan, please fill in some details below.</p>
			</div>
			<div class="wl_actions_share__img">
				<div class="wl_actions_share__img_container wl_action_icon">
					<img src="<?php echo $theme_path; ?>/assets/images/icon-group.png"
						alt="Share your goals"
						height="70"
						width="70">
				</div>
			</div>
			<div class="wl_actions_share__frm">
				<form name="frm_share_actionplan" id="frm_share_actionplan" class="frm_share_actionplan" action="" method="POST">
					<div class="frm_share_actionplan__row">
						<div class="frm_share_actionplan__col">
							<label for="frm_share_actionplan__your_name">Your name</label>
							<input type="text" name="frm_share_actionplan__your_name" id="frm_share_actionplan__your_name" value="<?php echo $frm_share_actionplan__your_name;?>">
						</div>
						<div class="frm_share_actionplan__col">
							<label for="frm_share_actionplan__your_email">Your email</label>
							<input type="text" name="frm_share_actionplan__your_email" id="frm_share_actionplan__your_email" value="<?php echo $frm_share_actionplan__your_email;?>">
						</div>
					</div>
					<div class="frm_share_actionplan__row">
						<p>Please enter the name and email address for the person you would like to share your Action Plan with.</p>
					</div>
					<div class="frm_share_actionplan__row">
						<div class="frm_share_actionplan__col">
							<label for="frm_share_actionplan__their_name">Their name</label>
							<input type="text" name="frm_share_actionplan__their_name" id="frm_share_actionplan__their_name" value="<?php echo $frm_share_actionplan__their_name;?>">
						</div>
						<div class="frm_share_actionplan__col">
							<label for="frm_share_actionplan__their_email">Their email</label>
							<input type="text" name="frm_share_actionplan__their_email" id="frm_share_actionplan__their_email" value="<?php echo $frm_share_actionplan__their_email;?>">
						</div>
					</div>
					<div class="frm_share_actionplan__row">
						<input type="submit" name="share" value="Share your Action Plan" />
					</div>
				</form>

			</div>
		</div>
	</div>
	<div class="wl_actions__row wl_actions_full">
		<div class="wl_actions_full__item">
			<div class="wl_actions_help__img">
				<div class="wl_actions_help__img_container wl_action_icon">
					<img src="<?php echo $theme_path; ?>/assets/images/icon-message.png"
						alt="We are here to help"
						height="70"
						width="70">
				</div>
			</div>
			<div class="wl_actions_help__info">
				<h3>We are here to help!</h3>
				<p>If you would like a hand setting up your Action Plan we can help. The best way to do this is a referral through your GP.</p>
				<p>If you are having any other issues, please <a href="/get-in-touch/" title="Get in touch">Get in touch</a></p>
			</div>
		</div>
	</div>
</div>
	<?php


}


?>



			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer();
