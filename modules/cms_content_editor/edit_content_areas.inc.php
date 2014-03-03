<?php
	$_SESSION['pageId'] = $_GET['pageId'];
	$IsForm='true';
	$query = 'SELECT * FROM content_area WHERE page_id="'.$_GET['pageId'].'" ORDER BY `order`';
	$result = $db->query( $query );
	echo '<form method="post" action="'.REGULAR_URL.$FunctionBaseUri.'&action=reorder_content_areas&pageId='.$_GET['pageId'].'">';
		echo '<table cellspacing="0" cellpadding="3" style="font-size:11px;" class="cms_tabular">';
			echo '<tr class="tr_th_bg">';
			   echo '<th style="text-align:center;width:25px;border-right:1px dotted #BFBFBF">ID</th>';
			   echo '<th style="text-align:left;border-right:1px dotted #BFBFBF">Display Name</th>';
			   echo '<th style="text-align:left;width:100px;border-right:1px dotted #BFBFBF">Order</th>';
			   echo '<th style="text-align:center;width:30px;border-right:1px dotted #BFBFBF;">Edit</th>';
			   echo '<th style="text-align:center;width:45px;">Delete</th>';
			echo '</tr>';
			$i=1;
			while( $row = mysql_fetch_assoc( $result ) ){
				echo '<tr style="height:25px;background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
					echo '<td style="border-right:1px dotted #BFBFBF;"><center>'.$row['content_id'].'</center></td>';
					echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['content_display_name'].'</td>';
					echo '<td style="border-right:1px dotted #BFBFBF;"><center>';
						echo '<input type="text" id="'.$row['content_id'].'" name="'.$row['content_id'].'" value="'.$row['order'].'" />';
					echo '</center></td>';
					echo '<td style="border-right:1px dotted #BFBFBF;"><center>';
						echo '<a class="edit" ';
						echo 'href="'.REGULAR_URL.$FunctionBaseUri.'&action=edit_content_area&pageId='.$row['page_id'].'&content_id='.$row['content_id'].'">';
					echo '&nbsp;</a></center></td>';
					echo '<td><center><p class="delete" onclick=\'javascript: ';
						echo 'VerifyDelete("'.REGULAR_URL.$FunctionBaseUri.'&action=content_area_delete&pageId='.$row['page_id'].'&content_id='.$row['content_id'].'"';
						echo ');\'>&nbsp;</p></center></td>';
				 echo '</tr>';
				$i++;
			}
		echo '</table>';
?>