<?php
	$_SESSION['form_id']=$_GET['form_id'];
	$IsForm = 'true';
	echo '<form method="post" action="'.REGULAR_URL.$FunctionBaseUri.'&action=form_reorder">';
	echo '<table cellspacing="0" cellpadding="2" style="font-size:11px;" class="cms_tabular">';
		// Start table header
		echo '<tr class="tr_th_bg">';
			echo '<th style="text-align:center;width:50px;border-right:1px dotted #BFBFBF"><center>ID</center></th>';
			echo '<th style="text-align:left;border-right:1px dotted #BFBFBF"> Input Label</th>';
			echo '<th style="text-align:center;width:50px;border-right:1px dotted #BFBFBF;">Input Type</th>';
			echo '<th style="text-align:center;width:50px;border-right:1px dotted #BFBFBF;">Return Email</th>';
			echo '<th style="text-align:center;width:50px;border-right:1px dotted #BFBFBF;">Order</th>';
			echo '<th style="text-align:center;width:45px;border-right:1px dotted #BFBFBF;">Edit</th>';
			echo '<th style="text-align:center;width:45px;">Delete</th>';
		echo '</tr>';
		// End table header
		// get all our faq pages
		$query = 'SELECT * FROM form_elements WHERE form_id="'.$_GET['form_id'].'"';
		$result = $db->query( $query );
		$i=1;
		// start looping through them
		$typeArr=array();
		$typeArr['I']='Input';
		$typeArr['T']='Textarea';
		$typeArr['S']='Select';
		while( $row = mysql_fetch_assoc( $result ) ){
			echo '<tr style="height:25px;background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center>'.$row['element_id'].'<center></td>';
				echo '<td style="border-right:1px dotted #BFBFBF;"> '.$row['element_label'].'</td>';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center>'.$typeArr[$row['element_type']].'</center></td>';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center>'.(($row['element_return_email']=='Y')?'Yes':'No').'</center></td>';
				echo '<td style="border-right:1px dotted #BFBFBF;">';
				echo '<input type="text" id="element_'.$row['element_id'].'" name="element_'.$row['element_id'].'" value="'.$row['order'].'" style="width:40px;" />';
				echo '</td>';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center>';
					if($row['element_type']=="T"){
						echo '<a class="edit" href="'.REGULAR_URL.$FunctionBaseUri.'&action=edit_textarea&element_id='.$row['element_id'].'">';
					} else if ($row['element_type']=="S"){
						echo '<a class="edit" href="'.REGULAR_URL.$FunctionBaseUri.'&action=edit_select&element_id='.$row['element_id'].'">';
					} else {
						echo '<a class="edit" href="'.REGULAR_URL.$FunctionBaseUri.'&action=edit_input&element_id='.$row['element_id'].'">';
					}
					echo '&nbsp;</a></center></td>';
				echo '<td><center>';
						echo '<p class="delete" onclick=\'javascript: VerifyDelete';
						echo '("'.REGULAR_URL.$FunctionBaseUri.'&action=delete_element&element_id='.$row['element_id'].'");\'>';
					echo '&nbsp;</p></center></td>';
			echo '</tr>';
			$i++;
		}
	// end our table
	echo '</table>';

?>