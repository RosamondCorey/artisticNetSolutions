<?php
	echo '<table cellspacing="0" cellpadding="2" style="font-size:11px;" class="cms_tabular">';
		// Start table header
		echo '<tr class="tr_th_bg">';
			echo '<th style="text-align:center;width:50px;border-right:1px dotted #BFBFBF"><center>ID</center></th>';
			echo '<th style="text-align:left;border-right:1px dotted #BFBFBF"> Portfolio Name</th>';
			echo '<th style="text-align:center;width:125px;border-right:1px dotted #BFBFBF;">Edit Portfolio</th>';
			echo '<th style="text-align:center;width:125px;border-right:1px dotted #BFBFBF;">Edit Categorys</th>';
			echo '<th style="text-align:center;width:75px;border-right:1px dotted #BFBFBF;">Edit Entrys</th>';
			echo '<th style="text-align:center;width:45px;">Delete</th>';
		echo '</tr>';
		// End table header
		// get all our faq pages
		$query = 'SELECT * FROM portfolio';
		$result = $db->query( $query );
		$i=1;
		// start looping through them
		while( $row = mysql_fetch_assoc( $result ) ){
			echo '<tr style="height:25px;background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center>'.$row['portfolio_id'].'<center></td>';
				echo '<td style="border-right:1px dotted #BFBFBF;"> '.$row['portfolio_name'].'</td>';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center>';
					echo '<a class="edit" href="'.REGULAR_URL.$FunctionBaseUri.'&action=edit_portfolio&portfolio_id='.$row['portfolio_id'].'">';
					echo '&nbsp;</a></center></td>';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center>';
					echo '<a class="edit" href="'.REGULAR_URL.$FunctionBaseUri.'&action=category_main&portfolio_id='.$row['portfolio_id'].'">';
					echo '&nbsp;</a></center></td>';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center>';
					echo '<a class="edit" href="'.REGULAR_URL.$FunctionBaseUri.'&action=portfolio_items_main&portfolio_id='.$row['portfolio_id'].'">';
					echo '&nbsp;</a></center></td>';
				echo '<td><center>';
						echo '<p class="delete" onclick=\'javascript: VerifyDelete';
						echo '("'.REGULAR_URL.$FunctionBaseUri.'&action=delete_portfolio&portfolio_id='.$row['portfolio_id'].'");\'>';
					echo '&nbsp;</p></center></td>';
			echo '</tr>';
			$i++;
		}
	// end our table
	echo '</table>';

?>