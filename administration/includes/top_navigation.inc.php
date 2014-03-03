<?php
	$query = 'SELECT * FROM administration_navigation_1 WHERE display_order NOT IN(0) ORDER BY display_order ASC';
	$result = $db->query( $query );
?>
<div class="top_navigation">
	<ul>
    	<?php
			if(!isset($_GET['group'])){ $_GET['group']='NULL'; }
			$num = mysql_num_rows($result);
			$i=1;
			while( $row = mysql_fetch_array( $result ) ){
				echo '<li'.(($row['navigation_id']==$_GET['group'])?' class="active"':'').'>';
					echo '<a href="'.REGULAR_URL.'administration/index.php?group='.$row['navigation_id'].'">';
						echo $row['navigation_text'];
					echo '</a>';
				echo '</li>';
				$i++;
			}
		?>
    </ul>
</div>