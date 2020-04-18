<?php
// Display notifications and errors

	// echo $frm_email_actionplan__output;
	$wl_actionplan_notifications__style = "" ;

    echo wl_actionplan_notifications ( $wl_actionplan_notifications__heading, $wl_actionplan_notifications__parts, $wl_actionplan_notifications__style, $wl_actionplan_notifications__class, "" ) ;
    echo wl_actionplan_notifications ( $wl_actionplan_notifications__heading, $wl_actionplan_notifications__parts, $wl_actionplan_notifications__style, $wl_actionplan_notifications__class, "warning" ) ;
    echo wl_actionplan_notifications ( $wl_actionplan_notifications__heading, $wl_actionplan_notifications__parts, $wl_actionplan_notifications__style, $wl_actionplan_notifications__class, "error" ) ;
    echo wl_actionplan_notifications ( $wl_actionplan_notifications__heading, $wl_actionplan_notifications__parts, $wl_actionplan_notifications__style, $wl_actionplan_notifications__class, "success" ) ;

?>