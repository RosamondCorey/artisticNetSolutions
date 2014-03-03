<?php
	$query = 'SELECT * FROM portfolio_elements WHERE element_id="'.$_GET['element_id'].'"';
	$row = mysql_fetch_assoc( $db->query( $query ) );
	$query = 'DELETE FROM portfolio_elements WHERE element_id="'.$_GET['element_id'].'"';
	$db->query( $query );
	$UNSET = ABSOLUTE_PATH.$fpath.'portfolio_images/'.$row['image_name'];
	unlink($UNSET);	
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'&action=portfolio_items_main&portfolio_id='.$_SESSION['portfolio_id'].'";';
	echo '</script>';
?>