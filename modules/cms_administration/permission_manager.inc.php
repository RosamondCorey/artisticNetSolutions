<?php

	$type = Array();
	$type['P']='Pest';
	$type['B']='Bee';
	$countyNames = Array();
	$query = 'SELECT * FROM pp_county ORDER BY county_id ASC';
	$result = $db->query( $query );
	while( $row = mysql_fetch_assoc( $result ) ){ $countyNames[$row['county_id']]=$row['county_name']; }
?>
<div class="cms_header">
	<img src="<?php echo REGULAR_URL; ?>administration/images/left_header_curve_top.png" class="leftimg" />
	<div class="header_span_grad" style="width:765px;">Permission Manager</div>
	<img src="<?php echo REGULAR_URL; ?>administration/images/right_header_curve_top.png" class="rightimg" />
</div>
<div class="cms_content">
	<?php 
		switch($_GET['action']){
			case 'edit':
				$query = 'SELECT * FROM pp_phone WHERE phone_id="'.$_GET['phoneID'].'"';
				$row = mysql_fetch_assoc( $db->query( $query ) );
				?>
				<form method="post" action="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=2&component=2&action=edit_submit&phoneID=<?php echo $row['county_id']; ?>">
					<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">
						<tr>
							<td style="width:100px;"><label for="phone_name">Phone Name: </label></td>
							<td><input type="text" name="phone_name" id="phone_name" value="<?php echo $row['phone_name']; ?>" /></td>
						</tr>
						<tr>
							<td style="width:100px;"><label for="phone_number">Phone Number: </label></td>
							<td><input type="text" name="phone_number" id="phone_number" value="<?php echo $row['phone_number']; ?>" /></td>
						</tr>
						<tr>
							<td style="width:100px;"><label for="phone_type">Type: </label></td>
							<td><input type="radio" name="phone_type" value="B" <?php echo(($row['phone_number_type']=='B')?'CHECKED=CHECKED':''); ?>/> Bee
								<input type="radio" name="phone_type" value="P" <?php echo(($row['phone_number_type']=='P')?'CHECKED=CHECKED':''); ?>/> Pest
							</td>
						</tr>
						<tr>
							<td style="width:100px;"><label for="county_id">County: </label></td>
							<td><select name="county_id" id="county_id">
									<?php foreach($countyNames AS $key=>$value){ echo '<option value="'.$key.'" '.(($key==$row['county_id'])?'SELECTED=SELECTED':'').'>'.$value.'</option>'; } ?>
								</select>
							</td>
						</tr>
					</table>
				<?php
			break;
			case 'edit_submit':
				$query = 'UPDATE pp_phone SET ';
				$query .= 'phone_name="'.$_POST['phone_name'].'", ';
				$query .= 'phone_number="'.$_POST['phone_number'].'", ';
				$query .= 'phone_number_type="'.$_POST['phone_type'].'", ';
				$query .= 'county_id="'.$_POST['county_id'].'" ';
				$query .= 'WHERE phone_id="'.$_GET['phoneID'].'"';
				$db->query( $query );
				?>
					<script type="text/javascript" language="Javascript">
						window.location= JSRL+"administration/index.php?group=6&module=2&component=2";
					</script>
				<?php 
			break;
			case 'delete';
				$query = 'DELETE FROM pp_phone WHERE phone_id="'.$_GET['phoneID'].'"';
				$db->query( $query );
				?>
					<script type="text/javascript" language="Javascript">
						window.location= JSRL+"administration/index.php?group=6&module=2&component=2";
					</script>
				<?php 
			break;
			case 'add':
				?>
				<form method="post" action="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=2&component=2&action=add_submit">
					<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">
						<tr>
							<td style="width:100px;"><label for="phone_name">Phone Name: </label></td>
							<td><input type="text" name="phone_name" id="phone_name" /></td>
						</tr>
						<tr>
							<td style="width:100px;"><label for="phone_number">Phone Number: </label></td>
							<td><input type="text" name="phone_number" id="phone_number" /></td>
						</tr>
						<tr>
							<td style="width:100px;"><label for="phone_type">Type: </label></td>
							<td><input type="radio" name="phone_type" value="B" CHECKED=CHECKED/> Bee
								<input type="radio" name="phone_type" value="P" /> Pest
							</td>
						</tr>
						<tr>
							<td style="width:100px;"><label for="county_id">County: </label></td>
							<td><select name="county_id" id="county_id">
									<?php foreach($countyNames AS $key=>$value){ echo '<option value="'.$key.'">'.$value.'</option>'; } ?>
								</select>
							</td>
						</tr>
					</table>
				<?php
			break;
			case 'add_submit':
				$query = 'INSERT INTO pp_phone ( phone_name, phone_number, phone_number_type, county_id ) VALUES 
						( "'.$_POST['phone_name'].'", "'.$_POST['phone_number'].'", "'.$_POST['phone_type'].'", "'.$_POST['county_id'].'")';
				$result = $db->query( $query );
				?>
					<script type="text/javascript" language="Javascript">
						window.location= JSRL+"administration/index.php?group=6&module=2&component=2";
					</script>
				<?php 
			break;
			default:
				?>
				<form method="post" action="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=2&component=2&action=reorder&phoneID=<?php echo $row['county_id']; ?>">
				<table cellspacing="0" cellpadding="3" class="cms_tabular">
					<tr class="tr_th_bg">
						<th style="border-right:1px dotted #BFBFBF;text-align:left;width:100px;"><center>Permission ID</center></th>
						<th style="border-right:1px dotted #BFBFBF;text-align:left;">Permission Name</th>
						<th style="border-right:1px dotted #BFBFBF;width:30px;">edit</th>
						<th style="width:40px;">delete</th>
					</tr>
				<?php
					$i=1;
					$query = 'SELECT * FROM administration_user_permision ORDER BY permission_id ASC';
					$result = $db->query( $query );
					while( $row = mysql_fetch_assoc( $result ) ){
						echo '<tr style="background:'.((is_odd($i))?'#D7FBDF':'000000').'">';
							echo '<td style="height:22px;border-right:1px dotted #BFBFBF;"><center>'.$row['phone_id'].'</center></td>';
							echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['phone_number'].'</td>';
							echo '<td style="border-right:1px dotted #BFBFBF;"><center><a href="'.REGULAR_URL.'administration/index.php?group=6&module=2&component=2&action=edit&phoneID='.$row['phone_id'].'" class="button">edit</a></center></td>';
							echo '<td><center><a href="'.REGULAR_URL.'administration/index.php?group=6&module=2&component=2&action=delete&phoneID='.$row['phone_id'].'" class="button">delete</a></center></td>';
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
							?><input type="submit" value="Add Permission" class="button"/><?php
						break;
						case 'edit':
							?><input type="submit" value="Update Permission" class="button"/><?php
						break;
						default:
							?>
							<a href="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=2&component=2&action=add" class="button">Add New Permission</a>
							<?php
						break;
					}
				?>
			</center>
			</div>
			<img src="<?php echo REGULAR_URL; ?>administration/images/right_header_curve_bottom.png" class="rightimg" />
		</div>
</div>