<?php
echo '<tr class="tr_th_bg">';
	echo '<td colspan="3" style="font-weight:bold;">FAQ Module</th>';
echo '</tr>';
echo '<tr>';	
	echo '<td style="width:150px;"><label for="content_output_type">FAQ Group: </label> </td>';
	echo '<td>';
		echo '<select name="faq_group" id="faq_group">';
			$query = 'SELECT * FROM faqs';
			$result = $db->query( $query );
			while( $row = mysql_fetch_assoc( $result ) ){
				echo '<option value="'.$row['faq_id'].'"'.(($pageData['module_sub_id']==$row['faq_id'])?' SELECTED=SELECTED':'').'>'.$row['faq_name'].'</option>';	
			}
		echo '</select>';
	echo '</td>';
echo '</tr>';
?>