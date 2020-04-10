<?php
/**
 * Activity Contacts setup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<?php

// Aggregates all relevant contact fields pulled through from
// the Live Well API for this particular entry 

if ($activity_contacts != ""){

	// Display contacts
	// Contacts
	foreach ($activity_contacts as $activity_contact) {

		if ( $activity_contact["FullName"] != "" ){
			$activity_contact_list[] = "<li class=\"activity_contact__item\">" . $activity_contact["FullName"] . "</li>";
		}
		if ( $activity_contact["EmailAddress"] != "" ){
			$activity_contact_list[] = "<li class=\"activity_contact__item\"><a href=\"mailto:" . $activity_contact["EmailAddress"] . "\" title=\"" . $activity_contact["FullName"] . "\" target=\"_blank\">" . $activity_contact["EmailAddress"] . "</a></li>";
		}
		if ( $activity_contact["PhoneNumber"] != "" ){
			$activity_contact_list[] = "<li class=\"activity_contact__item\">" . $activity_contact["PhoneNumber"] . "</li>";
		}

	}
	$wl_api_activity_contacts = implode("", $activity_contact_list);
	
	if( $websiteurl != "" ){

		$website_link = $activity_link[0] . $websiteurl . $activity_link[1] ;

	}
	echo "
		<div class=\"activity_contact__container\">
			<h3 class=\"activity_contact__title\">Contacts</h3>
			<div class=\"main_address\">" . 
			$wl_api_main_address . 
			"</div>
			<ul class=\"activity_contact__list\">" . 
			$wl_api_activity_contacts . 
			"</ul>
			$website_link
			</div>" ;
}else{
	// Do not display documents
}
?>