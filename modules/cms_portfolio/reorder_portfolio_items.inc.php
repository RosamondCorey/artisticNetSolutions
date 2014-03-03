<?php
	//print_r($_POST);
	foreach( $_POST as $key => $value ){
		$temp = explode( '_', $key);
		$query = 'UPDATE portfolio_elements SET `order`="'.$value.'" WHERE element_id="'.$temp['1'].'"';
		$db->query( $query );
	}
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'&action=portfolio_items_main&portfolio_id='.$_SESSION['portfolio_id'].'";';
	echo '</script>';
?>