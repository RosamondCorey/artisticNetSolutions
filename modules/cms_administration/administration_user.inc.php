<?php

?>
<div class="cms_header">
	<img src="<?php echo REGULAR_URL; ?>administration/images/left_header_curve_top.png" class="leftimg" />
	<div class="header_span_grad" style="width:765px;">Add / Remove Users</div>
	<img src="<?php echo REGULAR_URL; ?>administration/images/right_header_curve_top.png" class="rightimg" />
</div>
<div class="cms_content">
	<?php 
		switch($_GET['action']){
			case 'delete':
				$query='DELETE FROM administration_users WHERE user_id="'.$_GET['userID'].'"';
				$db->query($query);
			?>
				<script type="text/javascript" language="javascript">
					window.location=JSRL+"administration/index.php?group=6&module=2&component=1";
				</script>
			<?php
			break;
			case 'edit':
				$query = 'SELECT * FROM administration_users WHERE user_id="'.$_GET['userID'].'"';
				$row=mysql_fetch_assoc($db->query($query));
				?>
					<form method="post" action="<?php echo REGULAR_URL;?>administration/index.php?group=6&module=2&component=1&action=edit_submit&userID=<?php echo $_GET['userID']; ?>">
						<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">
							<tr>
								<td style="width:100px;"><label for="first">First Name: </label> </td>
								<td>
									<input type="text" name="first" id="first" style="" value="<?php echo $row['first']; ?>" />
								</td>
							</tr>
							<tr>
								<td><label for="last">Last Name: </label> </td>
								<td>
									<input type="text" name="last" id="last" style="" value="<?php echo $row['last']; ?>" />
								</td>
							</tr>
							<tr>
								<td><label for="email">Email Address: </label> </td>
								<td>
									<input type="text" name="email" id="email" style="" value="<?php echo $row['email']; ?>" />
								</td>
							</tr>
							<tr>
								<td><label for="username">Username: </label> </td>
								<td>
									<input type="text" id="username" name="username" style="" value="<?php echo $row['username']; ?>" />
								</td>
							</tr>
							<tr>
								<td><label for="password">Password: </label> </td>
								<td>
									<input type="text" id="password" name="password" value="SET">
								</td>
							</tr>
							<tr>
								<td><label for="user_level">User Level</label> </td>
								<td>
									<select id="user_level" name="user_level">
										<option value="1" <?php echo (($row['userLevel']=="1")?"SELECTED=SELECTED":""); ?>>Super User</option>
										<option value="2" <?php echo (($row['userLevel']=="2")?"SELECTED=SELECTED":""); ?>>Client User</option>
										<option value="3" <?php echo (($row['userLevel']=="3")?"SELECTED=SELECTED":""); ?>>Limited User</option>
									</select>
								</td>
							</tr>
						</table>
				<?php
			break;
			case 'edit_submit';
				$query = 'UPDATE administration_users SET ';
				$query .= 'first="'.$_POST['first'].'", ';
				$query .= 'last="'.$_POST['last'].'", ';
				$query .= 'email="'.$_POST['email'].'", ';
				$query .= 'username="'.$_POST['username'].'", ';
				$query .= 'userLevel="'.$_POST['user_level'].'" ';
				if($_POST['password']!="SET"){
					$query .= ', password="'.md5($_POST['password']).'" ';
				}
				$query .= 'WHERE user_id="'.$_GET['userID'].'"';
				$db->query( $query );
				?>
					<script type="text/javascript" language="javascript">
						window.location=JSRL+"administration/index.php?group=6&module=2&component=1";
					</script>
				<?php
			break;
			case 'add';
				?>
					<form method="post" action="<?php echo REGULAR_URL;?>administration/index.php?group=6&module=2&component=1&action=add_submit">
						<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">
							<tr>
								<td style="width:100px;"><label for="first">First Name: </label> </td>
								<td>
									<input type="text" name="first" id="first" style="" />
								</td>
							</tr>
							<tr>
								<td><label for="last">Last Name: </label> </td>
								<td>
									<input type="text" name="last" id="last" style="" />
								</td>
							</tr>
							<tr>
								<td><label for="email">Email Address: </label> </td>
								<td>
									<input type="text" name="email" id="email" style="" />
								</td>
							</tr>
							<tr>
								<td><label for="username">Username: </label> </td>
								<td>
									<input type="text" id="username" name="username" style="" />
								</td>
							</tr>
							<tr>
								<td><label for="password">Password: </label> </td>
								<td>
									<input type="text" id="password" name="password">
								</td>
							</tr>
							<tr>
								<td><label for="user_level">User Level</label> </td>
								<td>
									<select id="user_level" name="user_level">
										<option value="1">Super User</option>
										<option value="2">Client User</option>
										<option value="3">Limited User</option>
									</select>
								</td>
							</tr>
						</table>
				<?php
			break;
			case 'add_submit':
				$q='INSERT INTO administration_users ( username, password, first, last, email, userLevel) VALUES ';
				$q.='("'.$_POST['username'].'","'.md5($_POST['password']).'","'.$_POST['first'].'","'.$_POST['last'].'", "'.$_POST['email'].'","'.$_POST['user_level'].'")';
				$db->query( $q );
				?>
					<script type="text/javascript" language="javascript">
						window.location=JSRL+"administration/index.php?group=6&module=2&component=1";
					</script>
				<?php
			break;
			default:
			$query = 'SELECT * FROM administration_users';
			$result = $db->query($query);
			?>
				<table cellspacing="0" cellpadding="3" class="cms_tabular">
					<tr class="tr_th_bg">	
						<th style="width:40px;text-align:center;border-right:1px dotted #BFBFBF;">ID</th>
						<th style="text-align:center;width:50px;border-right:1px dotted #BFBFBF;">Level</th>
						<th style="text-align:left;width:100px;border-right:1px dotted #BFBFBF;">First</th>
						<th style="text-align:left;width:100px;border-right:1px dotted #BFBFBF;">Last</th>
						<th style="text-align:left;width:150px;border-right:1px dotted #BFBFBF;">Username</th>
						<th style="text-align:left;border-right:1px dotted #BFBFBF;">Email Address</th>
						<th style="width:30px;text-align:center;border-right:1px dotted #BFBFBF;">Edit</th>
						<th style="width:40px;text-align:center;">Remove</th>
					</tr>
					<?php 
						$i=1;
						while( $row = mysql_fetch_assoc( $result ) ){
							echo '<tr style="background:'.((is_odd($i))?'#D7FBDF':'000000').';height:25px;">';
								echo '<td style="border-right:1px dotted #BFBFBF;"><center>'.$row['user_id'].'</center></td>';
								echo '<td style="border-right:1px dotted #BFBFBF;"><center>'.$row['userLevel'].'</center></td>';
								echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['first'].'</td>';
								echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['last'].'</td>';
								echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['username'].'</td>';
								echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['email'].'</td>';
								echo '<td style="border-right:1px dotted #BFBFBF;"><center><a class="button" href="'.REGULAR_URL.'administration/index.php?group=6&module=2&component=1&action=edit&userID='.$row['user_id'].'">edit</a></center></td>';
								echo '<td style="border-right:1px dotted #BFBFBF;"><center><a class="button" href="'.REGULAR_URL.'administration/index.php?group=6&module=2&component=1&action=delete&userID='.$row['user_id'].'">delete</a></center></td>';
							echo '<tr>';
							$i++;
						}
					?>
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
							?><input type="submit" value="Add User" class="button"/><?php
						break;
						case 'edit':
							?><input type="submit" value="Update User Information" class="button"/><?php
						break;
						default:
							?><a class="button" href="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=2&component=1&action=add">Add User</a><?php
						break;
					}
				?>
			</center>
			</div>
			</form>
			<img src="<?php echo REGULAR_URL; ?>administration/images/right_header_curve_bottom.png" class="rightimg" />
		</div>
</div>