<?php
echo '<tr class="tr_th_bg">';
	echo '<td colspan="3" style="font-weight:bold;">Form Module</th>';
echo '</tr>';
echo '<tr>';	
	echo '<td style="width:150px;"><label for="form_id">Forms: </label> </td>';
	echo '<td>';
		echo '<select name="form_id" id="form_id">';
			$query = 'SELECT * FROM forms';
			$result = $db->query( $query );
			while( $row = mysql_fetch_assoc( $result ) ){
				echo '<option value="'.$row['form_id'].'"'.(($pageData['module_sub_id']==$row['form_id'])?' SELECTED=SELECTED':'').'>'.$row['form_name'].'</option>';	
			}
		echo '</select>';
	echo '</td>';
echo '</tr>';
?>