<?php
	$query = 'SELECT * FROM site_headers';
	$result = $db->query( $query );
	echo $tbl_start;
		echo '<tr class="tr_th_bg">';
			echo '<th style="text-align:center;width:25px;border-right:1px dotted rgb(191, 191, 191);">ID</td>';
			echo '<th style="text-align:left;border-right:1px dotted rgb(191, 191, 191);">Header Name</th>';
			echo '<th style="text-align:center;width:50px;border-right: 1px dotted rgb(191, 191, 191);">Type</th>';
			echo '<th style="text-align:center;width:75px;border-right: 1px dotted rgb(191, 191, 191);">Edit File</th>';
			echo '<th style="text-align:center;width:70px;">Delete</th>';	
		echo '</tr>';
	while( $row = mysql_fetch_array( $result ) ){
		echo '<tr style="background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
			echo '<td><center>'.$row['header_id'].'</center></td>';
			echo '<td>'.$row['header_name'].'</td>';
			echo '<td><center>'.$row['header_type'].'</center></td>';
			echo '<td><center><a href="'.$modUri.'&action=edit_header_file&header_id='.$row['header_id'].'" class="edit">&nbsp;</a></center></td>';
			echo '<td></td>';
		echo '</tr>';		
	}
	echo '</table>';

?>
