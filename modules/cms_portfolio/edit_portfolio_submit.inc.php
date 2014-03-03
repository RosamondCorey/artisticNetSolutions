<?php
	$query = 'UPDATE portfolio SET portfolio_name="'.$_POST['portfolio_name'].'" WHERE portfolio_id="'.$_GET['portfolio_id'].'"';
	$db->query( $query );
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'";';
	echo '</script>';
?>