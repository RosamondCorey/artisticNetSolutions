<?php
	session_start();
	session_id($_GET['session_id']);
	$_SESSION[$_GET['varName']]=$_GET['varValue'];
	
?>
