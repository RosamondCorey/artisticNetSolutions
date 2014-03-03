<?php
	$query = 'INSERT INTO portfolio_categorys ( portfolio_id, category_name, `order` ) VALUES ';
	$query .= '( "'.$_SESSION['portfolio_id'].'", "'.$_POST['category_name'].'", "0" )';
	$db->query( $query );
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'&action=category_main&portfolio_id='.$_SESSION['portfolio_id'].'";';
	echo '</script>';
?>