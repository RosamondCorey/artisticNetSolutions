<?php
	
$IsForm='true';
$query = 'SELECT * FROM content_area WHERE page_id="'.$_GET['pageId'].'"';
$result = $db->query( $query );
echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group=3&module=4&component=1&action=edit_submit&pageId='.$_GET['pageId'].'">';
echo '<table cellspacing="0" cellpadding="3" style="font-size:11px;" class="cms_tabular">';
	echo '<tr class="tr_th_bg">';
	   echo '<th style="text-align:center;width:25px;border-right:1px dotted #BFBFBF">ID</th>';
	   echo '<th style="text-align:left;border-right:1px dotted #BFBFBF">Display Name</th>';
	   echo '<th style="text-align:left;width:100px;border-right:1px dotted #BFBFBF">Order</th>';
	   echo '<th style="text-align:center;width:30px;border-right:1px dotted #BFBFBF;">Edit</th>';
	   echo '<th style="text-align:center;width:45px;">Delete</th>';
	echo '</tr>';
	while( $row = mysql_fetch_assoc( $result ) ){
		echo '<tr style="height:25px;background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
			echo '<td style="border-right:1px dotted #BFBFBF;"><center>'.$row['content_id'].'</center></td>';
			echo '<td style="border-right:1px dotted #BFBFBF;"><center>'.$row['content_display_name'].'</center></td>';
		 	echo '<td style="border-right:1px dotted #BFBFBF;"><center><a class="edit" href="'.REGULAR_URL.'administration/index.php?group=3&module=4&component=1&action=edit&pageId='.$row['page_id'].'">&nbsp;</a></center></td>';
     		echo '<td><center><p class="delete" onclick=\'javascript: VerifyDelete("'.REGULAR_URL.'administration/index.php?group=3&module=4&component=1&action=delete&pageId='.$row['page_id'].'");\'>&nbsp;</p></center></td>';
		 
		 echo '</tr>';
		
	}
echo '</table>';
?>