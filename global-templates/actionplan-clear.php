<?php

if($_POST['clear']) {

	// Delete Action Plan cookies
	// Set expiration to time in the past
	
	setcookie('wl_goal', "", time() - 3600, "/");
	setcookie('wl_step_one', "", time() - 3600, "/");
	setcookie('wl_step_two', "", time() - 3600, "/");
	setcookie('wl_step_three', "", time() - 3600, "/");
	setcookie('wl_step_four', "", time() - 3600, "/");
	setcookie('wl_step_five', "", time() - 3600, "/");
	setcookie('wl_notes', "", time() - 3600, "/");

	setcookie('simplefavorites', "", time() - 3600, "/");

 //  	echo "<br>Cookies cleared & Action Plan deleted" ;

   	unset($wl_goal);
	unset($wl_step_one);
	unset($wl_step_two);
	unset($wl_step_three);
	unset($wl_step_four);
	unset($wl_step_five);
	unset($wl_notes);

	unset($simplefavorites);

	header('Location: /action-plan-cleared/');

}

?>