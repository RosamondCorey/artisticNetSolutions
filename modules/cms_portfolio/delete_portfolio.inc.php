<?php
	$query = 'SELECT * FROM portfolio_elements WHERE portfolio_id="'.$_GET['portfolio_id'].'"';	
	$result = $db->query( $query );
	while( $row = mysql_fetch_assoc( $result ) ){
		$UNSET = ABSOLUTE_PATH.$fpath.'portfolio_images/'.$row['image_name'];
		unlink($UNSET);			
	}
	$query = 'DELETE FROM portfolio_elements WHERE portfolio_id="'.$_GET['portfolio_id'].'"';
	$db->query( $query );
	$query = 'DELETE FROM portfolio_categorys WHERE portfolio_id="'.$_GET['portfolio_id'].'"';
	$db->query( $query );
	$query = 'DELETE FROM portfolio WHERE portfolio_id="'.$_GET['portfolio_id'].'"';
	$db->query( $query );
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'";';
	echo '</script>';
?>