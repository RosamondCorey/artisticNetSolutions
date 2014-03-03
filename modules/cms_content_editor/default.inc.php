<?php
	// This set of code is used to load all of the template names into the template array to be used later
	$template_array = array();
	$query = 'SELECT * FROM templates';
	$result = $db->query( $query );
	while( $row = mysql_fetch_assoc( $result ) ){
		$template_array[$row['template_id']] = $row['template_name'];
	}
	// End template arry build
	// This loads all page modules into an arry to be used later
	$type_array = array();
	$query = 'SELECT * FROM page_module';
	$result = $db->query( $query );
	while( $row = mysql_fetch_assoc( $result ) ){
		$type_array[$row['page_module_id']] = $row['page_module_name'];
	}
	// End type array build
	// Start form
	$IsForm='true';
	echo '<form method="post" action="'.REGULAR_URL.$FunctionBaseUri.'&action=update_template_and_module">';
		// Start table
		echo '<table cellspacing="0" cellpadding="2" style="font-size:11px;" class="cms_tabular">';
			// Start table header
			echo '<tr class="tr_th_bg">';
				echo '<th style="text-align:center;width:35px;border-right:1px dotted #BFBFBF"><center>ID</center></th>';
				echo '<th style="text-align:left;border-right:1px dotted #BFBFBF">CMS Page Name</th>';
				echo '<th style="text-align:left;width:100px;border-right:1px dotted #BFBFBF"><center>Module</center></th>';
				echo '<th style="text-align:left;width:100px;border-right:1px dotted #BFBFBF"><center>Template</center></th>';
				echo '<th style="text-align:center;width:65px;border-right:1px dotted #BFBFBF;">Content<br />Edit</th>';
				echo '<th style="text-align:center;width:65px;border-right:1px dotted #BFBFBF;">Meta<br />Edit</th>';
				echo '<th style="text-align:center;width:65px;border-right:1px dotted #BFBFBF;">Module &amp;<br />Layout<br />Edit</th>';
				echo '<th style="text-align:center;width:45px;">Delete</th>';
			echo '</tr>';
			// End table header
			// Search for all pages in the system
			$query = 'SELECT * FROM pages WHERE site_id="'.$_SESSION['siteData']['site_id'].'"';
			$result = $db->query( $query );
			$i=1;
			// Start looping through all the elements in the array
			while( $row = mysql_fetch_assoc( $result ) ){
				// Start table row	
				echo '<tr style="height:25px;background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
					echo '<td style="border-right:1px dotted #BFBFBF;"><center>'.$row['page_id'].'</center></td>';
					echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['cms_page_name'].'</td>';
					echo '<td style="border-right:1px dotted #BFBFBF;">';
						echo '<select name="moduleSelect_'.$row['page_id'].'" id="moduleSelect_'.$row['page_id'].'">';
							echo type_select($row['page_type']);
						echo '</select>';
					echo '</td>';
					echo '<td style="border-right:1px dotted #BFBFBF;">';
						echo '<select name="templateSelect_'.$row['page_id'].'" id="templateSelect_'.$row['page_id'].'">';
							echo template_select($row['template_id']);
						echo '</select>';
					echo '</td>';
					echo '<td style="border-right:1px dotted #BFBFBF;">';
						echo '<center><a class="edit"'; 
							echo 'href="'.REGULAR_URL.$FunctionBaseUri.'&action=edit_content_areas&pageId='.$row['page_id'].'">';
						echo '&nbsp;</a></center>';
					echo '</td>';
					echo '<td style="border-right:1px dotted #BFBFBF;"><center>';
						echo '<a class="edit" href="'.REGULAR_URL.$FunctionBaseUri.'&action=meta_edit&pageId='.$row['page_id'].'">';
						echo '&nbsp;</a></center></td>';
					echo '<td style="border-right:1px dotted #BFBFBF;"><center>';
						echo '<a class="edit" href="'.REGULAR_URL.$FunctionBaseUri.'&action=module_and_layout_edit&pageId='.$row['page_id'].'">';
						echo '&nbsp;</a></center></td>';
					echo '<td><center>';
						echo "<p class='delete' onclick=\'javascript: VerifyDelete onclick=\'javascript: VerifyDelete";
						echo '("'.REGULAR_URL.$FunctionBaseUri.'&action=delete&pageId='.$row['page_id'].'");\'>';
					echo '&nbsp;</p></center></td>';
				// End table row
				echo '</tr>';
			 $i++;
			}
		// End table
		echo '</table>';

?>