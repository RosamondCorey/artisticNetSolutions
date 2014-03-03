<?php
	foreach( $_POST as $key => $value ){
		$temp = explode( '_', $key);
		$query = 'UPDATE portfolio_categorys SET `order`="'.$value.'" WHERE category_id="'.$temp['1'].'"';
		$db->query( $query );
	}
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'&action=category_main&portfolio_id='.$_SESSION['portfolio_id'].'";';
	echo '</script>';
?>