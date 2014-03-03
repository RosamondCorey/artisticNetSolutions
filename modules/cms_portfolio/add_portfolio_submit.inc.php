<?php
	$query = 'INSERT INTO portfolio ( portfolio_name ) VALUES ( "'.$_POST['portfolio_name'].'" )';
	$db->query( $query );
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'";';
	echo '</script>';
?>