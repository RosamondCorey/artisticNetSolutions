<?php
	// setting the faq_id so we can get back to the correct section
	$_SESSION['faq_id']=$_GET['faq_id'];
	$IsForm = 'true';
	echo '<form method="post" action="'.REGULAR_URL.$FunctionBaseUri.'&action=reorder_qa">';
		echo '<table cellspacing="0" cellpadding="2" style="font-size:11px;" class="cms_tabular">';
			// Start table header
			echo '<tr class="tr_th_bg">';
				echo '<th style="text-align:center;width:50px;border-right:1px dotted #BFBFBF"><center>Q ID</center></th>';
				echo '<th style="text-align:left;border-right:1px dotted #BFBFBF"> Question &amp; Answer </th>';
				echo '<th style="text-align:center;border-right:1px dotted #BFBFBF;width:50px;"> Order</th>';
				echo '<th style="text-align:center;width:45px;border-right:1px dotted #BFBFBF;">Edit</th>';
				echo '<th style="text-align:center;width:45px;">Delete</th>';
			echo '</tr>';
			// End table header
			// get all our faq pages
			$query = 'SELECT * FROM faq_qa WHERE faq_id="'.$_GET['faq_id'].'" ORDER BY `order`';
			$result = $db->query( $query );
			$i=1;
			// start looping through them
			while( $row = mysql_fetch_assoc( $result ) ){
				echo '<tr style="height:25px;background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
					echo '<td rowspan="2" style="border-right:1px dotted #BFBFBF;"><center>'.$row['qa_id'].'</center></td>';
					echo '<td style="border-right:1px dotted #BFBFBF;"><strong>Question: </strong>'.$row['question'].'</td>';
					echo '<td rowspan="2"  style="border-right:1px dotted #BFBFBF;"><center>';
						echo '<input type="text" id="Order_'.$row['qa_id'].'" name="Order_'.$row['qa_id'].'" value="'.$row['order'].'" style="width:25px;" />';
					echo '</center></td>';
					echo '<td rowspan="2" style="border-right:1px dotted #BFBFBF;"><center>';
						echo '<a class="edit" href="'.REGULAR_URL.$FunctionBaseUri.'&action=edit_qa&qa_id='.$row['qa_id'].'">';
						echo '&nbsp;</a></center></td>';
					echo '<td rowspan="2"><center>';
						echo '<p class="delete" onclick=\'javascript: VerifyDelete';
						echo '("'.REGULAR_URL.$FunctionBaseUri.'&action=delete_qa&qa_id='.$row['qa_id'].'");\'>';
					echo '</center></td>';	
				echo '</tr>';
				echo '<tr style="height:25px;background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
					echo '<td style="border-right:1px dotted #BFBFBF;"><strong>Answer:</strong> '.$row['answer'].'</td>';
				echo '</tr>';
				$i++;
			}
		echo '</table>';
?>