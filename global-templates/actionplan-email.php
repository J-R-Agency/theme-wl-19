<?php

if($_POST['email']) {
  // we will add the code to process submitted form here
    // we can also echo some text here if form is submitted

    // Goal
    if ( $_POST['wl_actionplan_actions__email'] ) {
    	
    	echo "<br>The wl_actionplan_actions__email exists:  " . $_POST['wl_actionplan_actions__email'] ;

    }

	// header('Location: /action-plan/');

} else {

}

?>