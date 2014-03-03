<?php
	// These are all of your classes that will be included.
	require_once(ABSOLUTE_PATH.'php_classes/database.inc.php');
	require_once(ABSOLUTE_PATH.'php_classes/architect_admin.inc.php');
	require_once(ABSOLUTE_PATH.'php_classes/adminUser.inc.php');
	require_once(ABSOLUTE_PATH.'php_classes/htaccess.inc.php');
	require_once(ABSOLUTE_PATH.'php_classes/headerNavigation.inc.php');
	require_once(ABSOLUTE_PATH.'php_classes/file_handler.inc.php');
	require_once(ABSOLUTE_PATH.'php_classes/page.inc.php');
	// This is where we begin instatiation of all your classes
	$db = new database();
	$page = new page();
	$fHandler = new file_handler();
	$User = new adminUser( $db );
	$htaccess = new htaccess( $db );
	$headerNavigation = new headerNavigation( $db, $htaccess );
	$architectAdmin = new architectAdmin( $db, $User );
?>