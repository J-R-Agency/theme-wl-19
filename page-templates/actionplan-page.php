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

// Clear action plan variables and expire cookies
include get_theme_file_path( '/global-templates/actionplan-clear.php' );

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
// Display up advice boxes
include get_theme_file_path( '/global-templates/actionplan-adviceboxes.php' );
?>

<?php echo $steps_separator ; ?>

<?php
} else {
// Set
   
}
?>

<?php
// Display up advice boxes
include get_theme_file_path( '/global-templates/actionplan-mainform.php' );
?>
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
