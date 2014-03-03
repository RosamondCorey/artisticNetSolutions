<?php
	echo '<table cellspacing="0" cellpadding="2" style="font-size:11px;" class="cms_tabular">';
		// Start table header
		echo '<tr class="tr_th_bg">';
			echo '<th style="text-align:center;width:50px;border-right:1px dotted #BFBFBF"><center>FAQ ID</center></th>';
			echo '<th style="text-align:left;border-right:1px dotted #BFBFBF"> FAQ Name</th>';
			echo '<th style="text-align:center;width:65px;border-right:1px dotted #BFBFBF;">Edit</th>';
			echo '<th style="text-align:center;width:65px;border-right:1px dotted #BFBFBF;">Manage</th>';
			echo '<th style="text-align:center;width:45px;">Delete</th>';
		echo '</tr>';
		// End table header
		// get all our faq pages
		$query = 'SELECT * FROM faqs ORDER BY faq_id';
		$result = $db->query( $query );
		$i=1;
		// start looping through them
		while( $row = mysql_fetch_assoc( $result ) ){
			echo '<tr style="height:25px;background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center>'.$row['faq_id'].'<center></td>';
				echo '<td style="border-right:1px dotted #BFBFBF;"> '.$row['faq_name'].'</td>';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center>';
					echo '<a class="edit" href="'.REGULAR_URL.$FunctionBaseUri.'&action=edit_faq&faq_id='.$row['faq_id'].'">';
					echo '&nbsp;</a></center></td>';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center>';
					echo '<a class="edit" href="'.REGULAR_URL.$FunctionBaseUri.'&action=faq_manage&faq_id='.$row['faq_id'].'">';
					echo '&nbsp;</a></center></td>';
				echo '<td><center>';
						echo '<p class="delete" onclick=\'javascript: VerifyDelete';
						echo '("'.REGULAR_URL.$FunctionBaseUri.'&action=delete_faq&faq_id='.$row['faq_id'].'");\'>';
					echo '&nbsp;</p></center></td>';
			echo '</tr>';
			$i++;
		}
	// end our table
	echo '</table>';

?>