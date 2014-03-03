<?php
	foreach( $_POST as $key => $value ){
		$temp = explode('_',$key);
		$query = 'UPDATE form_elements SET 
									`order`="'.$value.'"  
								WHERE element_id="'.$temp[1].'"';
	
		$db->query( $query );	
	}
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'&action=form_builder_main&form_id='.$_SESSION['form_id'].'";';
	echo '</script>';
?>