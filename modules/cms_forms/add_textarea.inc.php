<?php
	// let the system know this case has a form
	$IsForm = 'true';
	// start form
	echo '<form method="post" action="'.REGULAR_URL.$FunctionBaseUri.'&action=add_textarea_submit">';
		// start table
		echo '<table cellspacing="0" cellpadding="3" style="font-size:11px;" class="cms_tabular">';
			echo '<tr>';
				echo '<td style="width:150px;"><label for="element_label">Element Label: </label></td>';
				echo '<td><input type="text" name="element_label" id="element_label" style ="width:200px;"/></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="width:150px;"><label for="element_value">Element Value: </label></td>';
				echo '<td><input type="text" name="element_value" id="element_value" style ="width:200px;"/></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="width:150px;"><label for="element_height">Input height: </label></td>';
				echo '<td><input type="text" name="element_height" id="element_height" style ="width:200px;"/></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="width:150px;"><label for="element_width">Input Width: </label></td>';
				echo '<td><input type="text" name="element_width" id="element_width" style ="width:200px;"/></td>';
			echo '</tr>';
		echo '</table>';
?>