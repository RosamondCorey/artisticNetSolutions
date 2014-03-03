<?php
	//print_r($_POST);
	$query = 'INSERT INTO forms (
									form_name, 
									form_recipiant, 
									form_subject, 
									form_message, 
									send_confirmation, 
									confirmation_subject, 
									confirmation_message,
									confirmation_link_input,
									thank_you_title,
									thank_you_message, 
									thank_you_link_input 
								) values (
									"'.$_POST['form_name'].'", 
									"'.$_POST['form_recipiant'].'", 
									"'.$_POST['form_subject'].'", 
									"'.$_POST['form_message'].'", 
									"'.$_POST['send_confirmation'].'", 
									"'.$_POST['confirmation_subject'].'", 
									"'.$_POST['confirmation_message'].'", 
									"'.$_POST['confirmation_link_input'].'", 
									"'.$_POST['thank_you_title'].'", 
									"'.$_POST['thank_you_message'].'", 
									"'.$_POST['thank_you_link_input'].'" 
								)';
	
	$db->query( $query );
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'";';
	echo '</script>';
?>