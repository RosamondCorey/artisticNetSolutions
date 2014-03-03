<?php

	$type = Array();
	$type['P']='Pest';
	$type['B']='Bee';
	$countyNames = Array();
	$query = 'SELECT * FROM county ORDER BY county_id ASC';
	$result = $db->query( $query );
	while( $row = mysql_fetch_assoc( $result ) ){ $countyNames[$row['county_id']]=$row['county_name']; }
$pageName = 'Module Manager';
echo $page->BuildPageHeader( $pageName );
switch($_GET['action']){
	case 'edit':
		$query = 'SELECT * FROM module WHERE module_id="'.$_GET['ModuleID'].'"';
		$row = mysql_fetch_assoc( $db->query( $query ) );
		?>
		<form method="post" action="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=11&component=1&action=edit_submit&ModuleID=<?php echo $row['module_id']; ?>">
			<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">
				<tr>
					<td style="width:100px;"><label for="module_name">Module Name: </label></td>
					<td><input type="text" name="module_name" id="module_name" value="<?php echo $row['module_name']; ?>" style="width:200px;" /></td>
				</tr>
				<tr>
					<td style="width:100px;"><label for="module_dir">Module Directory: </label></td>
					<td><input type="text" name="module_dir" id="module_dir" value="<?php echo $row['module_dir']; ?>"  style="width:200px;" /></td>
				</tr>
			</table>
		<?php
	break;
	case 'edit_submit':
		$query = 'UPDATE module SET ';
		$query .= 'module_name="'.$_POST['module_name'].'", ';
		$query .= 'module_dir="'.$_POST['module_dir'].'" ';
		$query .= 'WHERE module_id="'.$_GET['ModuleID'].'"';
		$db->query( $query );
		?>
			<script type="text/javascript" language="Javascript">
				window.location= JSRL+"administration/index.php?group=6&module=11&component=1";
			</script>
		<?php 
	break;
	case 'delete';
		echo '<p style="margin:0px;padding:10px;">Not Enabled For Safty. If your name is not Corey Rosamond. You have no business here.</p>';
	break;
	case 'add':
		?>
		<form method="post" action="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=11&component=1&action=add_submit">
			<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">
				<tr>
					<td style="width:100px;"><label for="module_name">Module Name: </label></td>
					<td><input type="text" name="module_name" id="module_name" style="width:200px;" /></td>
				</tr>
				<tr>
					<td style="width:100px;"><label for="module_dir">Module Directory: </label></td>
					<td><input type="text" name="module_dir" id="module_dir"  style="width:200px;" /></td>
				</tr>
			</table>
		<?php
	break;
	case 'add_submit':
		$query = 'SELECT MAX(module_id) AS mod_id, MAX(global_module_id) as global_mod_id FROM module';
		$row = mysql_fetch_assoc( $db->query( $query ) );
		
		$query = 'INSERT INTO module ( module_id, module_name, module_dir, global_module_id ) VALUES 
				( "'.($row['mod_id']+1).'", "'.$_POST['module_name'].'", "'.$_POST['module_dir'].'", "'.($row['global_mod_id']+1).'")';
		$result = $db->query( $query );
		?>
			<script type="text/javascript" language="Javascript">
				window.location= JSRL+"administration/index.php?group=6&module=11&component=1";
			</script>
		<?php 
	break;
	default:
		?>
		<form method="post" action="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=11&component=1&action=reorder&phoneID=<?php echo $row['county_id']; ?>">
		<table cellspacing="0" cellpadding="3" class="cms_tabular">
			<tr class="tr_th_bg">
				<th style="border-right:1px dotted #BFBFBF;text-align:left;width:100px;"><center>Module ID</center></th>
				<th style="border-right:1px dotted #BFBFBF;text-align:left;">Module Name</th>
				<th style="border-right:1px dotted #BFBFBF;text-align:left;width:150px;">Module Directory</th>
				<th style="border-right:1px dotted #BFBFBF;width:30px;">edit</th>
				<th style="width:40px;">delete</th>
			</tr>
		<?php
			$i=1;
			$query = 'SELECT * FROM module ORDER BY module_id ASC';
			$result = $db->query( $query );
			while( $row = mysql_fetch_assoc( $result ) ){
				echo '<tr style="background:'.((is_odd($i))?'#D7FBDF':'000000').'">';
					echo '<td style="height:22px;border-right:1px dotted #BFBFBF;"><center>'.$row['module_id'].'</center></td>';
					echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['module_name'].'</td>';
					echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['module_dir'].'</td>';
					echo '<td style="border-right:1px dotted #BFBFBF;"><center><a href="'.REGULAR_URL.'administration/index.php?group=6&module=11&component=1&action=edit&ModuleID='.$row['module_id'].'" class="button">edit</a></center></td>';
					echo '<td><center><a href="'.REGULAR_URL.'administration/index.php?group=6&module=11&component=1&action=delete&ModuleID='.$row['module_id'].'" class="button">delete</a></center></td>';
				echo '</tr>'; 
				$i++;
			}
		?>
		<tr>
		</table>
	<?php
	break;
}
		?>
		<div class="content_footer">
			<img src="<?php echo REGULAR_URL; ?>administration/images/left_header_curve_bottom.png" class="leftimg" />
			<div class="footer_span_grad" style="width:765px;">
			<center>
				<?php 
					switch($_GET['action']){
						case 'add':
							?><input type="submit" value="Add Module" class="button"/><?php
						break;
						case 'edit':
							?><input type="submit" value="Update Module" class="button"/><?php
						break;
						default:
							?>
							<a href="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=11&component=1&action=add" class="button">Add New Module</a>
							<?php
						break;
					}
				?>
			</center>
			</div>
			<img src="<?php echo REGULAR_URL; ?>administration/images/right_header_curve_bottom.png" class="rightimg" />
		</div>
</div>