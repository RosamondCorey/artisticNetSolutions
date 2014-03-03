<?php
	// let the system know this case has a form
	$IsForm = 'true';
	// start form
	echo '<form method="post" action="'.REGULAR_URL.$FunctionBaseUri.'&action=add_category_submit">';
		// start table
		echo '<table cellspacing="0" cellpadding="3" style="font-size:11px;" class="cms_tabular">';
			echo '<tr>';
				echo '<td style="width:150px;"><label for="category_name">Category Name: </label></td>';
				echo '<td><input type="text" name="category_name" id="category_name" style ="width:200px;"/></td>';
			echo '</tr>';
		// end table
		echo '</table>';
?>