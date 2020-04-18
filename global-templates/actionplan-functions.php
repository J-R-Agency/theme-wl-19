<?php

function wl_actionplan_notifications ( 
	$wl_actionplan_notifications__heading, 
	$wl_actionplan_notifications__parts, 
	$wl_actionplan_notifications__style = "block", 
	$wl_actionplan_notifications__class = "wl_actionplan_notifications"
) {

	unset($output);

	$output = "<div class=\"$wl_actionplan_notifications__class\">\r\n";

	if ( $wl_actionplan_notifications__heading != "" ){
		$output .= "<h2>$wl_actionplan_notifications__heading</h2>\r\n";
	}

	if ( is_array( $wl_actionplan_notifications__parts ) ){

		switch ( $wl_actionplan_notifications__style ) {
		    case "list":

		    	$output .= "<ul>\r\n<li>" . implode("</li>\r\n<li>", $wl_actionplan_notifications__parts ) . "</li>\r\n</ul>\r\n";

		        break;

		    case "block":

		    default:

		    	$output .= "<div>" . implode("\r\n<br>", $wl_actionplan_notifications__parts ) . "</div>\r\n";

			}

	}

	$output .= "\r\n</div>";

	return $output;

}

?>