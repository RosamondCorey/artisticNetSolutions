<?php
	print_r($_POST);
	$query = 'INSERT INTO form_elements (
									form_id,
									element_type,
									element_label,
									element_value,
									element_height,
									element_width,
									element_return_email,
									`order`
								) values (
									"'.$_SESSION['form_id'].'", 
									"S", 
									"'.$_POST['element_label'].'", 
									"'.$_POST['element_value'].'", 
									"0", 
									"0",
									"N", 
									"0" 
								)';
	
	$db->query( $query );
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'&action=form_builder_main&form_id='.$_SESSION['form_id'].'";';
	echo '</script>';
?>