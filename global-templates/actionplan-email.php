<?php

if($_POST['email']) {
  // we will add the code to process submitted form here
    // we can also echo some text here if form is submitted

    // Goal
    if ( $_POST['wl_actionplan_actions__email'] ) {
    	
    	echo "<br>The wl_actionplan_actions__email exists:  " . $_POST['wl_actionplan_actions__email'] ;

        $to = $_POST['wl_actionplan_actions__email']; //sendto@example.com
        $subject = 'The subject';
        $body = 'The email body content';
        $headers = array('Content-Type: text/html; charset=UTF-8');

        if ( wp_mail( $to, $subject, $body, $headers ) ) {
            echo "Sent to $to "; 
        }

    }

	// header('Location: /action-plan/');

} else {

}

?>