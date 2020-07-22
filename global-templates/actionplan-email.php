<?php

if( isset($_POST['email'])  {
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
        unset($msg_type);
        unset($frm_email_actionplan__outputs);

        $email = $_POST['wl_actionplan_actions__email'];
    	
    	// $frm_email_actionplan__outputs[] = "The $email exists:  " . $email ;

        $msg_type = "success";

        if ( filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {

            // $frm_email_actionplan__outputs[] = "$email is a valid email address";

            $to = $email ; //sendto@example.com
            $subject = "Wellbeing Liverpool: Thank you for creating an Action Plan";
            $body = "
<div>
<p>Here is a copy of the Action Plan you created with us. You can print out this email to keep for reference.</p>
$body_actionplan
</div> 
$body_actionplan
<div>Please visit <a href=\"https://preview.wellbeingliverpool.org.uk\" title=\"Wellbeing Liverpool website\">Wellbeing Liverpool</a> if you need any more information or assistance.</div>
</div>
            ";
            $headers = array('Content-Type: text/html; charset=UTF-8');

            if ( wp_mail( $to, $subject, $body, $headers ) ) {

                $frm_email_actionplan__outputs[] = "Your Action Plan was sent to $to ";
                $msg_type = "success";

            } else {
            
                $frm_email_actionplan__outputs[] = "Unfortunately, there was a problem sending your Action Plan to and it was not sent to $to "; 
                $msg_type = "error";

            }

        } else {

            $frm_email_actionplan__outputs[] = "$email is not a valid email address";
            $msg_type = "error";

        }

    }

    // Output notifications and errors
    $wl_actionplan_notifications__heading = "Email your action plan";
    $wl_actionplan_notifications__parts = $frm_email_actionplan__outputs;
    $wl_actionplan_notifications__style = "list";
    $wl_actionplan_notifications__class = "frm_email_actionplan__outputs";
    $wl_actionplan_notifications__type = $msg_type;

    $frm_email_actionplan__output = wl_actionplan_notifications ( $wl_actionplan_notifications__heading, $wl_actionplan_notifications__parts, $wl_actionplan_notifications__style, $wl_actionplan_notifications__class, $wl_actionplan_notifications__type ) ;

	// header('Location: /action-plan/');

} else {

}

?>