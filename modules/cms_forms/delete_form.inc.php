<?php
	//print_r($_POST);
	$query = 'DELETE FROM form_elements WHERE form_id="'.$_GET['form_id'].'"';
	$db->query( $query );
	$query = 'DELETE FROM forms WHERE form_id="'.$_GET['form_id'].'"';
	$db->query( $query );
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'";';
	echo '</script>';
?>