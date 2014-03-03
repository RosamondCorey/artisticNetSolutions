<?php
	// let the system know this case has a form
	$IsForm = 'true';
	// start form
	echo '<form method="post" action="'.REGULAR_URL.$FunctionBaseUri.'&action=add_portfolio_item_submit" enctype="multipart/form-data">';
		// start table
		echo '<table cellspacing="0" cellpadding="3" style="font-size:11px;" class="cms_tabular">';
			echo '<tr>';
				echo '<td style="width:150px;"><label for="category_id">Category: </label></td>';
				echo '<td><select name="category_id" id="category_id">';
					echo buildPortfolioCategories();
				echo '</select></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="width:150px;"><label for="title">Title: </label></td>';
				echo '<td><input type="text" name="title" id="title" style="width:200px;" /></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="width:150px;"><label for="sub_title">Sub Title: </label></td>';
				echo '<td><input type="text" name="sub_title" id="sub_title" style="width:300px;"/></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td colspan="2"><center><label for="description">Description: </label></center></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td colspan="2"><center><textarea id="description" name="description" style="width:95%; height:50px;"></textarea></center></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="width:150px;"><label for="image">Image </label></td>';
				echo '<td><input type="file" name="image" id="image" /></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="width:150px;"><label for="date">Date: </label></td>';
				echo '<td><input type="text" name="date" id="date" style="width:100px;" /></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="width:150px;"><label for="link_text">Link Text: </label></td>';
				echo '<td><input type="text" name="link_text" id="link_text" style="width:200px;"/></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="width:150px;"><label for="link_location">Link Location: </label></td>';
				echo '<td><input type="text" name="link_location" id="link_location" style="width:200px;" /></td>';
			echo '</tr>';
		// end table
		echo '</table>';
?> 