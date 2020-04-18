<?php

if($_POST['share']) {

    unset($your_name);
    unset($your_email);
    unset($their_name);
    unset($their_email);
    unset($frm_share_actionplan__outputs);
    unset($frm_share_actionplan__output);
    unset($msg_type);
    unset($wl_error_log);

    // Get POST variables
    $your_name = $_POST["frm_share_actionplan__your_name"];
    $your_email = $_POST["frm_share_actionplan__your_email"];
    $their_name = $_POST["frm_share_actionplan__their_name"];
    $their_email = $_POST["frm_share_actionplan__their_email"];

    // Check for errors
    if ( $your_name != "" ) {
        $your_name = trim( htmlspecialchars( stripslashes( $your_name ) ) ;
        $frm_share_actionplan__outputs[] = "your_name: $your_name";
    } else {
        $frm_share_actionplan__outputs[] = "Please enter your name";
        $wl_error_log["frm_share_actionplan__your_name"] = 1 ;
    }

    if ( filter_var( $your_email, FILTER_VALIDATE_EMAIL ) ) {
        // Do nothing
        $frm_share_actionplan__outputs[] = "your_email: $your_email";

    } else {
        $frm_share_actionplan__outputs[] = "Please check your email address";
        $wl_error_log["frm_share_actionplan__your_email"] = 1 ;
    }
    if ( $their_name != "" ) {
        $their_name = trim( htmlspecialchars( stripslashes( $their_name ) ) ) ;
        $frm_share_actionplan__outputs[] = "their_name: $their_name";
    } else {
        $frm_share_actionplan__outputs[] = "Please enter the name of the person you want to share your action plan with";
        $wl_error_log["frm_share_actionplan__their_name"] = 1 ;
    }

    if ( filter_var( $their_email, FILTER_VALIDATE_EMAIL ) ) {
        // Do nothing
        $frm_share_actionplan__outputs[] = "their_email: $their_email";
    } else {
        $frm_share_actionplan__outputs[] = "Please check the email address of the person you want to share your action plan with";
        $wl_error_log["frm_share_actionplan__their_email"] = 1 ;
    }

    $wl_actionplan_checkerrors__return = wl_actionplan_checkerrors ( $wl_error_log, $wl_error_details ) ;
    if ( $wl_actionplan_checkerrors__return ) {
        // There are errors
        $msg_type = "error" ;

    } else {
        // There are no errors
        $to = $their_email ; //sendto@example.com
        $subject = "Wellbeing Liverpool: $your_name has shared their Action Plan with you";
        $body = "
<div>Hello $their_name,</div>
<div>$your_name has created an Action Plan on Wellbeing Liverpool and has decided to share it with you so that you can help them on their wellbeing journey.</div>
<div>Please see below for details</div>
<div>
<h1>Action Plan</h1>
<div>$your_name</div>
<div>$your_email</div>
<h2>Goal</h2>
<div>GOALS DETAIL</div>
<h2>Steps</h2>
<div>
<ul>
<li>Step 1: STEP ONE DETAIL</li>
<li>Step 2: STEP TWO DETAIL</li>
<li>Step 3: STEP THREE DETAIL</li>
</ul>
</div>
<h2>Activities</h2>
<div>
<ul>
<li>Activity 1: ACTIVITY ONE DETAIL</li>
<li>Activity 2: ACTIVITY TWO DETAIL</li>
<li>Activity 3: ACTIVITY THREE DETAIL</li>
</ul>
</div>
<div>Thank you for your help!</div>
<div>Please visit <a href=\"https://preview.wellbeingliverpool.org.uk\" title=\"Wellbeing Liverpool website\">Wellbeing Liverpool</a> if you need any more information or assistance.</div>
        ";
        $headers = array("Content-Type: text/html; charset=UTF-8");

        if ( wp_mail( $their_email, $subject, $body, $headers ) ) {

            $frm_share_actionplan__outputs[] = " Sent to $to ";
            $msg_type = "success";

        } else {

            $frm_share_actionplan__outputs[] = " Not sent to $to "; 
            $msg_type = "error";
            $wl_error_log["wp_mail"] = 1 ;

        }
    }

    // Output notifications and errors
    $wl_actionplan_notifications__heading = "Share your action plan";
    $wl_actionplan_notifications__parts = $frm_share_actionplan__outputs;
    $wl_actionplan_notifications__style = "list";
    $wl_actionplan_notifications__class = "frm_share_actionplan__outputs";
    $wl_actionplan_notifications__type = $msg_type;

    $frm_share_actionplan__output = wl_actionplan_notifications ( $wl_actionplan_notifications__heading, $wl_actionplan_notifications__parts, $wl_actionplan_notifications__style, $wl_actionplan_notifications__class, $wl_actionplan_notifications__type ) ;

	// header('Location: /action-plan/');

} else {
    // Do nothing
}

?>