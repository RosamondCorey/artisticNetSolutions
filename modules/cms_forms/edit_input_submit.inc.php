<?php
	//print_r($_POST);
	$query = 'UPDATE form_elements SET 
									element_label="'.$_POST['element_label'].'", 
									element_value="'.$_POST['element_value'].'", 
									element_width="'.$_POST['element_width'].'" 
								WHERE element_id="'.$_GET['element_id'].'"';
	
	$db->query( $query );
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'&action=form_builder_main&form_id='.$_SESSION['form_id'].'";';
	echo '</script>';
?>