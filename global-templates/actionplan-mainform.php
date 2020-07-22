

				<!-- action plan form -->
				<div id="wl_actionplan" class="wl_actionplan">
				<form name="actionplan" id="actionplan" class="actionplan" action="" method="POST">
					
					<h1>Action Plan</h1>
					<?php
					if ($wl_goal==""){
						echo "<h2>Set a clear goal</h2>
						<div>A clear goal will provide focus and direction, it will help give clarity to your decision making and puts you in control of your own future. It can help keep you motivated as you remember why you are choosing your activities. It only needs to be a sentence or two about your ideal outcome and why you want that.</div>";
					}?>
					<label for="wl_goal"><h2>Goal</h2></label>
					<input type="text" name="wl_goal" id="wl_goal" value="<?php echo stripslashes( $wl_goal );?>" placeholder="Describe your main goal for your wellbeing">
					<input type="submit" name="submit" value="Save" />

					<?php
					if ($wl_step_one==""){
						echo "<h2>Decide on the key steps</h2>
						<div>Think about the main things that will help you achieve your goal, these should be 3–5 specific things you can do that are relevant to you and what you want out of your Action Plan.</div>";
					}?>
					<h2>Key steps</h2>
					<p>STEPS</p>
					<ol>
						<li><label class="visually-hidden" for="ddwl_step_one">Step 1:</label>
<input class="wl_steps" type="text" name="wl_step_one" id="ddwl_step_one" value="
<?php 
// EXTRA LINES
if ( isset( $wl_step_one ) ){ 
	echo stripslashes( $wl_step_one ); 
}
?>
" placeholder=" e.g. Find out what groups there are"></li>
						<li><label class="visually-hidden" for="wl_step_two">Step 2:</label>
<input class="wl_steps" type="text" name="wl_step_two" id="wl_step_two" value="<?php if ( isset( $wl_step_two ) ){ echo stripslashes( $wl_step_two ); }?>" placeholder=" e.g. Join a walking group"></li>
						<li><label class="visually-hidden" for="wl_step_three">Step 3:</label>
<input class="wl_steps" type="text" name="wl_step_three" id="wl_step_three" value="<?php if ( isset( $wl_step_three ) ){ echo stripslashes( $wl_step_three ); }?>" placeholder=" e.g. Try to socialise at least once a week"></li>
						<li><label class="visually-hidden" for="wl_step_four">Step 4:</label>
<input class="wl_steps" type="text" name="wl_step_four" id="wl_step_four" value="<?php if ( isset( $wl_step_four ) ){ echo stripslashes( $wl_step_four ); }?>" placeholder="..."></li>
						<li><label class="visually-hidden" for="wl_step_five">Step 5:</label>
<input class="wl_steps" type="text" name="wl_step_five" id="wl_step_five" value="<?php if ( isset( $wl_step_five ) ){ echo stripslashes( $wl_step_five ); }?>" placeholder="..."></li>
					</ol>

					<input type="submit" name="submit" value="Save" />

					<!-- display shortlist from action plan (favorites plugin) -->
					<?php

					echo "<h2>Key Activities</h2>" ;

					// Action Plan but no activities yet
					$msg_no_activities_a = "
							<h3>You have no activities yet</h3>
							<p>Save your action plan then you can <a href=\"/types-of-activity/\">view types of activity</a>, <a href=\"/search-for-an-activity/\">search for activities</a> or <a href=\"/blog/\">read our blog for ideas</a>.</p>
					";

					// No Action Plan or activities
					$msg_no_activities_b = "
							<h3>You have no activities yet</h3>
							<p>Save your action plan then you can <a href=\"/create-your-action-plan/\">create a new action plan</a>, <a href=\"/search-for-an-activity/\">search for activities</a> or <a href=\"/blog/\">read our blog for ideas</a>.</p>
					";

					$msg_no_activities_b = $msg_no_activities_a ;

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

						     echo "<h3 class=\"actionplan__activity_title\"><a href=\"" . get_the_permalink() . "\" title=\"View " . get_the_title()  . " on the Wellbeing Liverpool site\"><strong>" . get_the_title() . "</strong></a></h3>";

// META

unset($days);
$days;

$args = array(
'taxonomy' => 'days'
);

$categories = get_terms( $args );  

// echo "<pre>PRE ";
// print_r($categories);
// echo "</pre>";
// $categories = usort($categories, function($a, $b) {
//    return get_field("days_order", "days_".$a->term_id) - get_field("days_order", "days_".$b->term_id);
// });


// echo "<pre>POST ";
// print_r($categories);
// echo "</pre>";

foreach ($categories as $category){
//print_r($category);
//echo "<br>" . get_field("days_order", "days_" . $category->term_id);
$day_of_the_week = get_field("days_order", "days_" . $category->term_id);
$days[$day_of_the_week] = $category->slug;

}



		?>
			<div class="activity-taxonomies activity-taxonomies--actionplan">
				<div class="activity-taxonomies__theme"><?php the_terms( $post->ID, 'themes', '<strong>Themes:</strong> ', '  ' ); ?> &nbsp; <?php the_terms( $post->ID, 'costs', ' <strong>Cost:</strong> ', '  ' ); ?></div>
				<div class="activity-taxonomies__days"><?php the_terms( $post->ID, 'days', ' <strong>Days:</strong> ', '  ' ); ?></div>
			</div>

<?php

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
					<p>Many of the services on Wellbeing Liverpool have multiple activities and services on offer. The Notes section is where you can keep track of any additional information you might need, like any specific dates or costs, a local landmark to look out fo, or which buses might go near to the activity.</p>
					<textarea name="wl_notes" id="wl_notes" placeholder="Here you can add any notes or tips"><?php echo stripslashes( $wl_notes );?></textarea>

					<input type="submit" name="submit" value="<?php echo $msg_btn_action_plan ;?> your Action Plan" />
					<input type="submit" name="clear" value="Clear" />

				</form>
				</div>

				