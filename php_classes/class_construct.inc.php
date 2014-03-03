<?php
	// These are all of your classes that will be included.
	require_once(ABSOLUTE_PATH.'php_classes/database.inc.php');
	require_once(ABSOLUTE_PATH.'php_classes/architect.inc.php');
	
	// This is where we begin instatiation of all your classes
	$db = new database();
	$architect = new architect( $db );
?>