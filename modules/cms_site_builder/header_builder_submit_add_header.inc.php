<?php 
	$query = 'SELECT MAX(header_id) AS ID FROM site_headers';
	$row = mysql_fetch_assoc( $db->query( $query ) );
	$ID = ($row['ID']+1);
	$query = 'INSERT INTO site_headers ( header_type, site_id, header_name, header_file ) VALUES ';
		$query .= '(
			"'.((is_numeric($_POST['header_type']))?'S':'G').'",
			"'.((is_numeric($_POST['header_type']))?$_POST['header_type']:'0').'",
			"'.$_POST['header_name'].'",
			"'.$ID.'.inc.php")';
	$db->query($query);
	$myFile = ABSOLUTE_PATH."composition/front/site_header/".$ID.".inc.php";
	$fh = fopen($myFile, 'w+');
	echo '<script type="text/javascript" language="Javascript">';
   	echo 'window.location= "'.$modUri.'&action=edit_header_file&header_id='.$ID.'";';
   	echo '</script>';
?>