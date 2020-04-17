<?php

if($_POST['submit']) {
  // we will add the code to process submitted form here
    // we can also echo some text here if form is submitted

    // Goal
    if ( $_POST['wl_goal'] ) {
    	
    	// echo "<br>The wl_goal exists:  " . $_POST['wl_goal'] ;
		$cookie_name = "wl_goal";
		$cookie_value = $_POST['wl_goal'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	// echo "<br>The wl_goal exists:  " . $_COOKIE['wl_goal'] ;

    }


    // Step One
    if ( $_POST['wl_step_one'] ) {
    	
    	// echo "<br>The wl_step_one exists:  " . $_POST['wl_step_one'] ;
		$cookie_name = "wl_step_one";
		$cookie_value = $_POST['wl_step_one'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	// echo "<br>The wl_step_one exists:  " . $_COOKIE['wl_step_one'] ;

    }

    // Step Two
    if ( $_POST['wl_step_two'] ) {
    	
    	// echo "<br>The wl_step_two exists:  " . $_POST['wl_step_two'] ;
		$cookie_name = "wl_step_two";
		$cookie_value = $_POST['wl_step_two'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	// echo "<br>The wl_step_two exists:  " . $_COOKIE['wl_step_two'] ;

    }

    // Step Three
    if ( $_POST['wl_step_three'] ) {
    	
    	// echo "<br>The wl_step_three exists:  " . $_POST['wl_step_three'] ;
		$cookie_name = "wl_step_three";
		$cookie_value = $_POST['wl_step_three'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	// echo "<br>The wl_step_three exists:  " . $_COOKIE['wl_step_three'] ;

    }

    // Step Four
    if ( $_POST['wl_step_four'] ) {
    	
    	// echo "<br>The wl_step_four exists:  " . $_POST['wl_step_four'] ;
		$cookie_name = "wl_step_four";
		$cookie_value = $_POST['wl_step_four'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	// echo "<br>The wl_step_four exists:  " . $_COOKIE['wl_step_four'] ;

    }

    // Step Three
    if ( $_POST['wl_step_five'] ) {
    	
    	// echo "<br>The wl_step_five exists:  " . $_POST['wl_step_five'] ;
		$cookie_name = "wl_step_five";
		$cookie_value = $_POST['wl_step_five'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	// echo "<br>The wl_step_five exists:  " . $_COOKIE['wl_step_five'] ;

    }

    // Notes
    if ( $_POST['wl_notes'] ) {
    	
    	// echo "<br>The wl_notes exists:  " . $_COOKIE['wl_notes'] ;
		$cookie_name = "wl_notes";
		$cookie_value = $_POST['wl_notes'] ;
		setcookie($cookie_name, $cookie_value, time() + apply_filters( 'simplefavorites_cookie_expiration_interval', 31556926 ), "/");
    	// echo "<br>The wl_notes exists:  " . $_COOKIE['wl_notes'] ;

    }

	header('Location: /action-plan/');

}

?>