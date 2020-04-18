<?php

if( $wl_goal != ""){

    echo "GOAL: " . stripslashes( $wl_goal ) ;

    // Parse steps and format HTML

    unset($wl_steps);

    if ( $wl_step_one != "" ) {
        $wl_steps[] = $wl_step_one;
    }
    if ( $wl_step_two != "" ) {
        $wl_steps[] = $wl_step_two;
    }
    if ( $wl_step_three != "" ) {
        $wl_steps[] = $wl_step_three;
    }
    if ( $wl_step_four != "" ) {
        $wl_steps[] = $wl_step_four;
    }
    if ( $wl_step_five != "" ) {
        $wl_steps[] = $wl_step_five;
    }

    $display_wl_steps = "<ul>\r\n<li>" . implode("</li>\r\n<li>", $wl_actionplan_notifications__parts ) . "</li>\r\n</ul>\r\n";


    // Parse activities shortlist

    $wl_simplefavorites = json_decode(stripslashes($_COOKIE['simplefavorites']), true);
    $wl_shortlist = $wl_simplefavorites[0]["posts"] ;

    echo "<pre>SHORTLIST";
    print_r($wl_shortlist);
    echo "</pre>";


        $body = "
<div>
<h1>Action Plan</h1>
<div>$your_name</div>
<div>$your_email</div>
<h2>Goal</h2>
<div>$wl_goal</div>
<h2>Steps</h2>
<div>
$display_wl_steps
</div>
<h2>Activities</h2>
<div>
<ul>
<li>Activity 1: ACTIVITY ONE DETAIL</li>
<li>Activity 2: ACTIVITY TWO DETAIL</li>
<li>Activity 3: ACTIVITY THREE DETAIL</li>
</ul>
</div>

        ";

} else {


}



?>