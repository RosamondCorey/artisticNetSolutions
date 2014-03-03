<?php
	$IsForm = 'true';
	// start form
	echo '<form method="post" action="'.REGULAR_URL.$FunctionBaseUri.'&action=reorder_portfolio_items">';
	echo '<table cellspacing="0" cellpadding="2" style="font-size:11px;" class="cms_tabular">';
		// Start table header
		echo '<tr class="tr_th_bg">';
			echo '<th style="text-align:center;width:50px;border-right:1px dotted #BFBFBF"><center>ID</center></th>';
			echo '<th style="text-align:center;border-right:1px dotted #BFBFBF;"> Information</th>';
			echo '<th style="text-align:center;border-right:1px dotted #BFBFBF;width:50px;">Order</th>';
			echo '<th style="text-align:center;width:75px;border-right:1px dotted #BFBFBF;">Edit</th>';
			echo '<th style="text-align:center;width:45px;">Delete</th>';
		echo '</tr>';
		// End table header
		// get all our faq pages
		$_SESSION['portfolio_id']=$_GET['portfolio_id'];
		$query = 'SELECT * FROM portfolio_elements WHERE portfolio_id="'.$_GET['portfolio_id'].'" ORDER BY `order`';
		$result = $db->query( $query );
		$i=1;
		// start looping through them
		while( $row = mysql_fetch_assoc( $result ) ){
			echo '<tr style="height:15px;background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
				echo '<td style="height:20px;border-right:1px dotted #BFBFBF;" rowspan="3"><center>'.$row['element_id'].'<center></td>';
				echo '<td style="height:20px;border-right:1px dotted #BFBFBF;"><strong>Title: </strong>'.$row['title'].'</td>';
				echo '<td style="height:20px;border-right:1px dotted #BFBFBF;" rowspan="3"><center>';
					echo '<input type="text" id="order_'.$row['element_id'].'" name="order_'.$row['element_id'].'" value="'.$row['order'].'" style="width:40px;" />';
				
				echo '</center></td>';
				echo '<td style="height:20px;border-right:1px dotted #BFBFBF;" rowspan="3"><center>';
					echo '<a class="edit" href="'.REGULAR_URL.$FunctionBaseUri.'&action=edit_portfolio_item&element_id='.$row['element_id'].'">';
					echo '&nbsp;</a></center></td>';
				echo '<td rowspan="3" style="height:20px;"><center>';
						echo '<p class="delete" onclick=\'javascript: VerifyDelete';
						echo '("'.REGULAR_URL.$FunctionBaseUri.'&action=delete_portfolio_items&element_id='.$row['element_id'].'");\'>';
					echo '&nbsp;</p></center></td>';
			echo '</tr>';
			echo '<tr style="height:15px;background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
				echo '<td style="height:20px;border-right:1px dotted #BFBFBF;"><strong>Sub Title: </strong>'.$row['sub_title'].'</td>';
			
			echo '</tr>';
			echo '<tr style="height:15px;background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
				echo '<td style="height:20px;border-right:1px dotted #BFBFBF;"><strong>Description: </strong>'.$row['description'].'</td>';
			echo '</tr>';
			$i++;
		}
	// end our table
	echo '</table>';

?>