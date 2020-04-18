

				<!-- action plan form -->
				<div id="wl_actionplan" class="wl_actionplan">
				<form name="actionplan" id="actionplan" class="actionplan" action="" method="POST">
					
					<h1>Action Plan</h1>
					<label for="wl_goal"><h2>Goal</h2></label>
					<input type="text" name="wl_goal" id="wl_goal" value="<?php echo stripslashes( $wl_goal );?>" placeholder="Describe your main goal for your wellbeing">

					<h2>Key steps</h2>
					<label class="visually-hidden" for="wl_step_one">Step 1:</label>
					<input class="wl_steps" type="text" name="wl_step_one" id="wl_step_one" value="<?php echo stripslashes( $wl_step_one );?>" placeholder="Step 1: e.g. Find out what groups there are">
					<label class="visually-hidden" for="wl_step_two">Step 2:</label>
					<input class="wl_steps" type="text" name="wl_step_two" id="wl_step_two" value="<?php echo stripslashes( $wl_step_two );?>" placeholder="Step 2: e.g. Join a walking group">					
					<label class="visually-hidden" for="wl_step_three">Step 3:</label>
					<input class="wl_steps" type="text" name="wl_step_three" id="wl_step_three" value="<?php echo stripslashes( $wl_step_three );?>" placeholder="Step 3: e.g. Try to socialise at least once a week">
					<label class="visually-hidden" for="wl_step_four">Step 4:</label>
					<input class="wl_steps" type="text" name="wl_step_four" id="wl_step_four" value="<?php echo stripslashes( $wl_step_four );?>" placeholder="Step 4">					
					<label class="visually-hidden" for="wl_step_five">Step 5:</label>
					<input class="wl_steps" type="text" name="wl_step_five" id="wl_step_five" value="<?php echo stripslashes( $wl_step_five );?>" placeholder="Step 5">

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
					<textarea name="wl_notes" id="wl_notes" placeholder="Here you can add any notes or tips"><?php echo stripslashes( $wl_notes );?></textarea>

					<input type="submit" name="submit" value="<?php echo $msg_btn_action_plan ;?> your Action Plan" />
					<input type="submit" name="clear" value="Clear" />

				</form>
				</div>

				