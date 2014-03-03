<?php
	$query = 'SELECT * FROM portfolio_elements WHERE category_id="'.$_GET['category_id'].'"';	
	$result = $db->query( $query );
	while( $row = mysql_fetch_assoc( $result ) ){
		$UNSET = ABSOLUTE_PATH.$fpath.'portfolio_images/'.$row['image_name'];
		unlink($UNSET);			
	}
	$query = 'DELETE FROM portfolio_elements WHERE category_id="'.$_GET['category_id'].'"';
	$db->query( $query );
	$query = 'DELETE FROM portfolio_categorys WHERE category_id="'.$_GET['category_id'].'"';
	$db->query( $query );
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'&action=category_main&portfolio_id='.$_SESSION['portfolio_id'].'";';
	echo '</script>';
?>