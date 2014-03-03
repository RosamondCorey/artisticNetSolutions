<?php

	$type = Array();
	$type['B']='Back End';
	$type['F']='Front End';
	$modules = Array();
	$query = 'SELECT * FROM module ORDER BY module_id ASC';
	$result = $db->query( $query );
	while( $row = mysql_fetch_assoc( $result ) ){ $modules[$row['module_id']]=$row['module_name']; }
?>
<div class="cms_header">
	<img src="<?php echo REGULAR_URL; ?>administration/images/left_header_curve_top.png" class="leftimg" />
	<div class="header_span_grad" style="width:765px;">Component Manager</div>
	<img src="<?php echo REGULAR_URL; ?>administration/images/right_header_curve_top.png" class="rightimg" />
</div>
<div class="cms_content">
	<?php 
		switch($_GET['action']){
			case 'edit':
				$query = 'SELECT * FROM component WHERE unique_key="'.$_GET['componentID'].'"';
				$row = mysql_fetch_assoc( $db->query( $query ) );
				?>
				<form method="post" action="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=11&component=2&action=edit_submit&componentID=<?php echo $row['unique_key']; ?>">
					<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">
						<tr>
							<td style="width:100px;"><label for="file">File: </label></td>
							<td><input type="text" name="file" id="file" value="<?php echo $row['file']; ?>" style="width:200px;" /></td>
						</tr>
						<tr>
							<td style="width:100px;"><label for="type">Type: </label></td>
							<td>
								&nbsp;Front End: <input type="radio" name="type" value="F" <?php echo(($row['type']=='F')?'CHECKED=CHECKED':''); ?>/>&nbsp;&nbsp;&nbsp;
								Back End: <input type="radio" name="type" value="B" <?php echo(($row['type']=='B')?'CHECKED=CHECKED':''); ?>/>
							</td>
						</tr>
						<tr>
							<td style="width:100px;"><label for="module">Owning Module</label></td>
							<td>
								<select name="module" id="module">
									<?php 
										foreach( $modules AS $key => $value ){
											echo '<option value="'.$key.'"'.(($key==$row['module_id'])?' SELECTED=SELECTED':'').'>'.$value.'</option>';
										}
									?>
								</select>
							</td>
						</tr>
					</table>
				<?php
			break;
			case 'edit_submit':
				$query = 'UPDATE component SET ';
				$query .= 'file="'.$_POST['file'].'", ';
				$query .= 'type="'.$_POST['type'].'", ';
				$query .= 'module_id="'.$_POST['module'].'" ';
				$query .= 'WHERE unique_key="'.$_GET['componentID'].'"';
				$db->query( $query );
				?>
					<script type="text/javascript" language="Javascript">
						window.location= JSRL+"administration/index.php?group=6&module=11&component=2";
					</script>
				<?php 
			break;
			case 'delete';
				echo '<p style="margin:0px;padding:10px;">Not Enabled For Safty. If your name is not Corey Rosamond. You have no business here.</p>';
			break;
			case 'add':
				?>
				<form method="post" action="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=11&component=2&action=add_submit">
					<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">
						<tr>
							<td style="width:100px;"><label for="file">File: </label></td>
							<td><input type="text" name="file" id="file" style="width:200px;" /></td>
						</tr>
						<tr>
							<td style="width:100px;"><label for="type">Type: </label></td>
							<td>
								&nbsp;Front End: <input type="radio" name="type" value="F" />&nbsp;&nbsp;&nbsp;
								Back End: <input type="radio" name="type" value="B" />
							</td>
						</tr>
						<tr>
							<td style="width:100px;"><label for="module">Owning Module</label></td>
							<td>
								<select name="module" id="module">
									<?php 
										foreach( $modules AS $key => $value ){
											echo '<option value="'.$key.'"'.(($key==$row['module_id'])?' SELECTED=SELECTED':'').'>'.$value.'</option>';
										}
									?>
								</select>
							</td>
						</tr>
					</table>
				<?php
			break;
			case 'add_submit':
				$query = 'SELECT MAX(component_id) AS comp_id FROM component WHERE module_id="'.$_POST['module'].'"';
				$row = mysql_fetch_assoc( $db->query( $query ) );
				$comp_id = ($row['comp_id']+1);
				$query = 'SELECT MAX(unique_key) AS new_key FROM component';
				$row = mysql_fetch_assoc( $db->query( $query ) );
				$newkey = ($row['new_key']+1);
				$query = 'INSERT INTO component ( module_id, component_id, file, type, global_component_id, unique_key ) VALUES 
						( "'.$_POST['module'].'", "'.$comp_id.'", "'.$_POST['file'].'", "'.$_POST['type'].'", "'.$newkey.'", "'.$newkey.'")';
				$result = $db->query( $query );
				?>
					<script type="text/javascript" language="Javascript">
						window.location= JSRL+"administration/index.php?group=6&module=11&component=2";
					</script>
				<?php 
			break;
			default:
				?>
				<form method="post" action="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=11&component=2&action=reorder&phoneID=<?php echo $row['county_id']; ?>">
				<table cellspacing="0" cellpadding="3" class="cms_tabular">
					<tr class="tr_th_bg">
						<th style="border-right:1px dotted #BFBFBF;text-align:left;width:150px;">Module</th>
						<th style="border-right:1px dotted #BFBFBF;text-align:left;width:25px;">ID</th>
						<th style="border-right:1px dotted #BFBFBF;text-align:left;">File</th>
						<th style="border-right:1px dotted #BFBFBF;text-align:center;width:100px;">Type</th>
						<th style="border-right:1px dotted #BFBFBF;width:30px;">edit</th>
						<th style="width:40px;">delete</th>
					</tr>
				<?php
					$i=1;
					$query = 'SELECT * FROM component ORDER BY module_id ASC';
					$result = $db->query( $query );
					while( $row = mysql_fetch_assoc( $result ) ){
						echo '<tr style="background:'.((is_odd($i))?'#D7FBDF':'000000').'">';
							echo '<td style="height:25px;border-right:1px dotted #BFBFBF;">'.$modules[$row['module_id']].'</td>';
							echo '<td style="border-right:1px dotted #BFBFBF;"><center>'.$row['component_id'].'</center></td>';
							echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['file'].'</td>';
							echo '<td style="border-right:1px dotted #BFBFBF;"><center>'.$type[$row['type']].'</center></td>';
							echo '<td style="border-right:1px dotted #BFBFBF;"><center><a href="'.REGULAR_URL.'administration/index.php?group=6&module=11&component=2&action=edit&componentID='.$row['unique_key'].'" class="button">edit</a></center></td>';
							echo '<td><center><a href="'.REGULAR_URL.'administration/index.php?group=6&module=11&component=2&action=delete&componentID='.$row['unique_key'].'" class="button">delete</a></center></td>';
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
							?><input type="submit" value="Add Component" class="button"/><?php
						break;
						case 'edit':
							?><input type="submit" value="Update Component" class="button"/><?php
						break;
						default:
							?>
							<a href="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=11&component=2&action=add" class="button">Add New Component</a>
							<?php
						break;
					}
				?>
			</center>
			</div>
			<img src="<?php echo REGULAR_URL; ?>administration/images/right_header_curve_bottom.png" class="rightimg" />
		</div>
</div>