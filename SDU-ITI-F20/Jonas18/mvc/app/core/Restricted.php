<?php

function restricted ($controller, $method) {
//'restricted', 'logout'
	$restricted_urls = array(	'HomeController' => array('restricted', 'logout'),
								'ApiController' => array(),
								'UserController' => array('imagefeed', 'upload', 'userlist')
							);

	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
		return false;
	} else if( isset($controller) && in_array($method, $restricted_urls[$controller])) {
		return true;
	} else {
		return false;
	}
}