<?php

if($_POST['email']) {
  // we will add the code to process submitted form here
    // we can also echo some text here if form is submitted

/*

// Reference for locating PHP ini file to check mail & smtp server settings on Digital Ocean

$inipath = php_ini_loaded_file();

if ($inipath) {
    echo 'Loaded php.ini: ' . $inipath;
} else {
    echo 'A php.ini file is not loaded';
}
*/

    // Goal
    if ( $_POST['wl_actionplan_actions__email'] ) {

        unset($email);
        unset($frm_email_actionplan__outputs);

        $email = $_POST['wl_actionplan_actions__email'];
    	
    	$frm_email_actionplan__outputs[] = "The $email exists:  " . $email ;

        if ( filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {

            $frm_email_actionplan__outputs[] = "$email is a valid email address";

            $to = $email ; //sendto@example.com
            $subject = 'The subject';
            $body = 'The email body content';
            $headers = array('Content-Type: text/html; charset=UTF-8');

            if ( wp_mail( $to, $subject, $body, $headers ) ) {

                $frm_email_actionplan__outputs[] = " Sent to $to "; 
            
            } else {
            
                $frm_email_actionplan__outputs[] = " Not sent to $to "; 
            
            }

        } else {

            $frm_email_actionplan__outputs[] = "$email is not a valid email address";

        }

    }

    // Output notifications and errors
    $wl_actionplan_notifications__heading = "Email your action plan";
    $wl_actionplan_notifications__parts = $frm_email_actionplan__outputs;
    $wl_actionplan_notifications__style = "list";
    $wl_actionplan_notifications__class = "frm_email_actionplan__outputs";

    echo wl_actionplan_notifications ( $wl_actionplan_notifications__heading, $wl_actionplan_notifications__parts, $wl_actionplan_notifications__style, $wl_actionplan_notifications__class ) ;

	// header('Location: /action-plan/');

} else {

}

?>