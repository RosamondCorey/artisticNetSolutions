<?php
	$query = 'SELECT * FROM site_headers WHERE header_id="'.$_GET['header_id'].'"';
	$row = mysql_fetch_assoc( $db->query( $query ) );
	$fpath = ABSOLUTE_PATH.'composition/front/site_header/';
	$content = file_get_contents($fpath.$row['header_file']);
	$IsForm = 'true';
	echo '<form method="post" action="'.$modUri.'&action=submit_update_header_file">';
	echo '<input type="hidden" name="header_id" name="header_id" value="'.$row['header_id'].'" />';
	echo '<center>';
	echo '<textarea name="file_contents" id="file_contents" style="width:750px;height:400px;margin:10px 0px 10px 0px;" />';
		echo stripslashes($content);
	echo '</textarea>';
	echo '</center>';



?>