<?php
	$IsForm = 'true';
	// start form
	echo '<form method="post" action="'.REGULAR_URL.$FunctionBaseUri.'&action=reorder_category">';
	echo '<table cellspacing="0" cellpadding="2" style="font-size:11px;" class="cms_tabular">';
		// Start table header
		echo '<tr class="tr_th_bg">';
			echo '<th style="text-align:center;width:50px;border-right:1px dotted #BFBFBF"><center>ID</center></th>';
			echo '<th style="text-align:left;border-right:1px dotted #BFBFBF"> Category Name</th>';
			echo '<th style="text-align:center;width:65px;border-right:1px dotted #BFBFBF;">Order</th>';
			echo '<th style="text-align:center;width:65px;border-right:1px dotted #BFBFBF;">Edit</th>';
			echo '<th style="text-align:center;width:45px;">Delete</th>';
		echo '</tr>';
		// End table header
		// get all our faq pages
		$query = 'SELECT * FROM portfolio_categorys WHERE portfolio_id="'.$_GET['portfolio_id'].'" ORDER BY `order`';
		$result = $db->query( $query );
		$i=1;
		// start looping through them
		$_SESSION['portfolio_id']=$_GET['portfolio_id'];
		while( $row = mysql_fetch_assoc( $result ) ){
			echo '<tr style="height:25px;background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center>'.$row['category_id'].'<center></td>';
				echo '<td style="border-right:1px dotted #BFBFBF;"> '.$row['category_name'].'</td>';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center>';
				echo '<input type="text" name="category_'.$row['category_id'].'" id="category_'.$row['category_id'].'" value="'.$row['order'].'" style="width:50px;" />';
				echo '</center></td>';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center>';
					echo '<a class="edit" href="'.REGULAR_URL.$FunctionBaseUri.'&action=edit_category&category_id='.$row['category_id'].'">';
					echo '&nbsp;</a></center></td>';
				echo '<td><center>';
						echo '<p class="delete" onclick=\'javascript: VerifyDelete';
						echo '("'.REGULAR_URL.$FunctionBaseUri.'&action=delete_category&category_id='.$row['category_id'].'");\'>';
					echo '&nbsp;</p></center></td>';
			echo '</tr>';
			$i++;
		}
	// end our table
	echo '</table>';

?>