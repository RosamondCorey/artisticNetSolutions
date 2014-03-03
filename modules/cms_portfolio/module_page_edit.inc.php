<?php
echo '<tr class="tr_th_bg">';
	echo '<td colspan="3" style="font-weight:bold;">Portfolio Module</th>';
echo '</tr>';
echo '<tr>';	
	echo '<td style="width:150px;"><label for="portfolio">Portfolio: </label> </td>';
	echo '<td>';
		echo '<select name="portfolio" id="portfolio">';
			$query = 'SELECT * FROM portfolio';
			$result = $db->query( $query );
			while( $row = mysql_fetch_assoc( $result ) ){
				echo '<option value="'.$row['portfolio_id'].'"'.(($pageData['module_sub_id']==$row['portfolio_id'])?' SELECTED=SELECTED':'').'>'.$row['portfolio_name'].'</option>';	
			}
		echo '</select>';
	echo '</td>';
echo '</tr>';
?>