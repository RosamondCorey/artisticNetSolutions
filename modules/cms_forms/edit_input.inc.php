<?php
	// let the system know this case has a form
	$IsForm = 'true';
	$query = 'SELECT * FROM form_elements WHERE element_id="'.$_GET['element_id'].'"';
	$row = mysql_fetch_assoc( $db->query( $query ) );
	// start form
	echo '<form method="post" action="'.REGULAR_URL.$FunctionBaseUri.'&action=edit_input_submit&element_id='.$_GET['element_id'].'">';
		// start table
		echo '<table cellspacing="0" cellpadding="3" style="font-size:11px;" class="cms_tabular">';
			echo '<tr>';
				echo '<td style="width:150px;"><label for="element_label">Element Label: </label></td>';
				echo '<td><input type="text" name="element_label" id="element_label" style ="width:200px;" value="'.$row['element_label'].'" /></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="width:150px;"><label for="element_value">Element Value: </label></td>';
				echo '<td><input type="text" name="element_value" id="element_value" style ="width:200px;" value="'.$row['element_value'].'" /></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="width:150px;"><label for="element_width">Input Width: </label></td>';
				echo '<td><input type="text" name="element_width" id="element_width" style ="width:200px;" value="'.$row['element_width'].'" /></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="width:150px;"><label for="return_email">Is This The Return Email: </label></td>';
				echo '<td>';
					echo '<select name="return_email" id="return_email">';
						echo '<option value="N">No</option>';
						echo '<option value="Y"'.(($row['element_return_email']=='Y')?'SELECTED=SELECTED':'').'>Yes</option>';
					echo '</select>';
				echo '</td>';
			echo '</tr>';
		echo '</table>';
?>