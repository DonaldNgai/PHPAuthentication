<?php
/**
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2014, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

return 
	array(
		"base_url" => "http://localhost/", 

		"providers" => array ( 

			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "560678407417714", "secret" => "b3cab76afdf226d396303d749df4d2ff" ),
				"trustForwarded" => false
			),
		),

		// If you want to enable logging, set 'debug_mode' to true.
		// You can also set it to
		// - "error" To log only error messages. Useful in production
		// - "info" To log info and error messages (ignore debug messages) 
		"debug_mode" => true,

		// Path to file writable by the web server. Required if 'debug_mode' is not false
		"debug_file" => "",
	);
