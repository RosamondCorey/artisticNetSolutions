<?php
	$IsForm = 'true';
	echo '<form method="post" action="'.$modUri.'&action=submit_add_header">';
	echo $tbl_start;
		echo '<tr>';
			echo '<td><label for="header_name">Header Name: </label></td>';
			echo '<td><input type="text" name="header_name" id="header_name" style="width:200px;"/></td>';
		echo '</tr>';
		echo '<tr>';
			echo '<td style="width:100px;"><label for="header_type">Header Scope: </label></td>';
			echo '<td>';
				$query = 'SELECT * FROM site ORDER BY site_id';
				$result = $db->query( $query );
				echo '<select id="header_type" name="header_type">';
					echo '<option value="G">Global</option>';
					while( $row = mysql_fetch_assoc( $result ) ){
						echo '<option value="'.$row['site_id'].'">'.$row['site_name'].'</option>';	
					}
				echo '</select>';
			echo '</td>';
		echo '</tr>';
	echo '</table>';
?>