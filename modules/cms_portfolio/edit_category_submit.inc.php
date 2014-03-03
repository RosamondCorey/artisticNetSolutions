<?php
	$query = 'UPDATE portfolio_categorys SET category_name="'.$_POST['category_name'].'" ';
	$query .= 'WHERE category_id="'.$_GET['category_id'].'"';
	$db->query( $query );
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'&action=category_main&portfolio_id='.$_SESSION['portfolio_id'].'";';
	echo '</script>';
?>