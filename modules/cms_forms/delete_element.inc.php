<?php
	//print_r($_POST);
	$query = 'DELETE FROM form_elements WHERE element_id="'.$_GET['element_id'].'"';
	
	$db->query( $query );
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'&action=form_builder_main&form_id='.$_SESSION['form_id'].'";';
	echo '</script>';
?>