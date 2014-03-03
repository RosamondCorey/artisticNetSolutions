<?php

	$topLevel = Array();
	$queryTopLevel = 'SELECT * FROM administration_navigation_1 ORDER BY display_order';
	$topLevelResult = $db->query( $queryTopLevel );
	while($topLevel = mysql_fetch_assoc( $topLevelResult ) ){ $TopLevel[$topLevel['navigation_id']]=$topLevel['navigation_text']; }
?>
<div class="cms_header">
	<img src="<?php echo REGULAR_URL; ?>administration/images/default_header_icon.gif" alt="ICON" height="19" width="20" />
	<h1>Administration Navigation Editor</h1>
</div>
<style type="text/css">
	#navBuilder{
		width:789px;
		margin:0px;
		padding:5px 0px 5px 0px;
		list-style-type:none;
		list-style:none;
	}
	#navBuilder li{
		border-bottom:1px solid #525252;
	}
	#navBuilder ul.second{
		clear:both;
		margin:10px 0px 10px 0px;
	}
	#navBuilder ul.third{
		clear:both;
		padding:0px;
		margin:0px 0px 10px 20px;
	}
	#navBuilder li.first{
		display:block;
		position:relative;
	}
	#navBuilder li.first a{
		position:absolute;
		top:0px;
		right:0px;
	}
	#navBuilder li.second{
		display:block;
		position:relative;
	}
	#navBuilder li.second a{
		position:absolute;
		top:0px;
		right:0px;
	}
	#navBuilder li.third{
		display:block;
		position:relative;
	}
	#navBuilder li.third a{
		position:absolute;
		top:0px;
		right:0px;
	}
	#navBuilder a{
		text-decoration:none;
		font-weight:bold;
	}
	
</style>
<div class="cms_content">
	<?php 
		switch($_GET['action']){
			case 'editThirdSubmit':
				$query = 'SELECT * FROM administration_navigation_2 WHERE aut_inc="'.$_POST['parent'].'"';
				$parentInfo = mysql_fetch_assoc( $db->query( $query ) );
				$query = 'SELECT * FROM component WHERE unique_key="'.$_POST['component'].'"';
				$componentInfo = mysql_fetch_assoc( $db->query( $query ) );
				$query = 'UPDATE administration_navigation_3 SET ';
				$query .= 'group_id="'.$parentInfo['group_id'].'", ';
				$query .= 'sub_group="'.$parentInfo['navigation_id'].'", ';
				$query .= 'module_id="'.$componentInfo['module_id'].'", ';
				$query .= 'component_id="'.$componentInfo['component_id'].'", ';
				$query .= 'navigation_text="'.$_POST['display_text'].'", ';
				$query .= 'help_text="'.addslashes($_POST['helptext']).'" ';
				$query .= 'WHERE unique_key="'.$_GET['ID'].'"';
				$db->query( $query );
				?>
					<script type="text/javascript" language="Javascript">
						window.location= JSRL+"administration/index.php?group=6&module=12&component=1";
					</script>
				<?php
			break;
			case 'editThird':
				$IsForm='true';
				$query = 'SELECT * FROM administration_navigation_3 WHERE unique_key="'.$_GET['ID'].'"';
				$row = mysql_fetch_assoc( $db->query( $query ) );
				?>
					<script type="text/javascript" language="javascript">
						WYSIWYG.attach('helptext', full);
					</script>
					<form method="post" action="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=12&component=1&action=editThirdSubmit&ID=<?php echo $_GET['ID']; ?>">
					<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">
						<tr>
							<td style="width:100px;"><label for="display_text">Display Text</td>
							<td><input type="text" id="display_text" name="display_text"  style="width:200px;" value="<?php echo $row['navigation_text']; ?>" />
						</tr>
						<tr>
							<td style="width:100px;"><label for="parent">Parent Navigation:</td>
							<td>
								<select id="parent" name="parent">
									<?php 
										foreach( $TopLevel AS $key => $value ){
											echo '<optgroup label="'.$value.'">';
												$query = 'SELECT * FROM administration_navigation_2 WHERE group_id="'.$key.'"';
												$result = $db->query( $query );
												while( $levelTwo = mysql_fetch_assoc( $result ) ){
													echo '<option value="'.$levelTwo['aut_inc'].'"'.(($levelTwo['group_id']==$row['group_id']&&$levelTwo['navigation_id']==$row['sub_group'])?' SELECTED=SELECTED':'').'>'.$levelTwo['navigation_text'].'</option>';
												}
											echo '</optgroup>';
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td style="width:100px;"><label for="component">Component:</td>
							<td>
								<select id="component" name="component">
									<?php 
										$query = 'SELECT * FROM module ORDER BY module_id';
										$resultSetOne = $db->query( $query );
										while( $rowOne = mysql_fetch_assoc( $resultSetOne ) ){
											echo '<optgroup label="'.$rowOne['module_name'].'">';
												$query = 'SELECT * FROM component WHERE module_id="'.$rowOne['module_id'].'"';
												$resultSetTwo = $db->query( $query );
												while( $rowTwo = mysql_fetch_assoc( $resultSetTwo ) ){
													echo '<option value="'.$rowTwo['unique_key'].'"'.(($rowTwo['module_id']==$row['module_id']&&$rowTwo['component_id']==$row['component_id'])?'SELECTED=SELECTED':'').'>'.$rowTwo['file'].'</option>';
												}
											echo '</optgroup>';
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<center><strong>Help Text&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></center>
								<textarea id="helptext" name="helptext" style="width:750px;height:400px;"><?php echo stripslashes($row['help_text']); ?></textarea>
							</td>
						</tr>
					</table>
				<?php
			break;
			case 'submitAddThird':
				$query = 'SELECT * FROM administration_navigation_2 WHERE aut_inc="'.$_POST['parent'].'"';
				$navInfo = mysql_fetch_assoc( $db->query( $query ) );
				$query = 'SELECT * FROM component WHERE unique_key="'.$_POST['component'].'"';
				$progInfo = mysql_fetch_assoc( $db->query( $query ) );
				$query = 'INSERT INTO administration_navigation_3 (group_id, navigation_text, module_id, component_id, sub_group, help_text) VALUES ( 
					"'.$navInfo['group_id'].'", 
					"'.$_POST['display_text'].'", 
					"'.$progInfo['module_id'].'", 
					"'.$progInfo['component_id'].'", 
					"'.$navInfo['navigation_id'].'", 
					"'.$_POST['helptext'].'" )';
					$db->query( $query );
				?>
					<script type="text/javascript" language="Javascript">
						window.location= JSRL+"administration/index.php?group=6&module=12&component=1";
					</script>
				<?php
			break;
			case 'addThird':
				$IsForm='true';
				?>
					<script type="text/javascript" language="javascript">
						WYSIWYG.attach('helptext', full);
					</script>
					<form method="post" action="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=12&component=1&action=submitAddThird">
					<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">
						<tr>
							<td style="width:100px;"><label for="display_text">Display Text</td>
							<td><input type="text" id="display_text" name="display_text"  style="width:200px;" />
						</tr>
						<tr>
							<td style="width:100px;"><label for="parent">Parent Navigation:</td>
							<td>
								<select id="parent" name="parent">
									<?php 
										foreach( $TopLevel AS $key => $value ){
											echo '<optgroup label="'.$value.'">';
												$query = 'SELECT * FROM administration_navigation_2 WHERE group_id="'.$key.'"';
												$result = $db->query( $query );
												while( $levelTwo = mysql_fetch_assoc( $result ) ){
													echo '<option value="'.$levelTwo['aut_inc'].'"'.(($levelTwo['group_id']==$row['group_id']&&$levelTwo['navigation_id']==$row['navigation_id'])?' SELECTED=SELECTED':'').'>'.$levelTwo['navigation_text'].'</option>';
												}
											echo '</optgroup>';
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td style="width:100px;"><label for="component">Component:</td>
							<td>
								<select id="component" name="component">
									<?php 
										$query = 'SELECT * FROM module ORDER BY module_id';
										$resultSetOne = $db->query( $query );
										while( $rowOne = mysql_fetch_assoc( $resultSetOne ) ){
											echo '<optgroup label="'.$rowOne['module_name'].'">';
												$query = 'SELECT * FROM component WHERE module_id="'.$rowOne['module_id'].'"';
												$resultSetTwo = $db->query( $query );
												while( $rowTwo = mysql_fetch_assoc( $resultSetTwo ) ){
													echo '<option value="'.$rowTwo['unique_key'].'">'.$rowTwo['file'].'</option>';
												}
											echo '</optgroup>';
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<center><strong>Help Text&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></center>
								<textarea id="helptext" name="helptext" style="width:750px;height:400px;"><?php echo stripslashes($row['help_text']); ?></textarea>
							</td>
						</tr>
					</table>
				<?php
			break;
			case 'editSecondSubmit':
				$query = 'UPDATE administration_navigation_2 SET navigation_text="'.$_POST['display_text'].'",  group_id="'.$_POST['parent'].'", help_text="'.addslashes($_POST['helptext']).'" WHERE aut_inc="'.$_GET['ID'].'"';
				$db->query( $query );
				?>
					<script type="text/javascript" language="Javascript">
						window.location= JSRL+"administration/index.php?group=6&module=12&component=1";
					</script>
				<?php
			break;
			case 'editSecond':
				$IsForm='true';
				$query = 'SELECT * FROM administration_navigation_2 WHERE aut_inc="'.$_GET['ID'].'"';
				$row = mysql_fetch_array( $db->query( $query ) );
				?>
					<script type="text/javascript" language="javascript">
						WYSIWYG.attach('helptext', full);
					</script>
					<form method="post" action="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=12&component=1&action=editSecondSubmit&ID=<?php echo $_GET['ID']; ?>">
					<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">
						<tr>
							<td style="width:100px;"><label for="display_text">Display Text</td>
							<td><input type="text" id="display_text" name="display_text"  style="width:200px;" value="<?php echo $row['navigation_text']; ?>"/>
						</tr>
						<tr>
							<td style="width:100px;"><label for="parent">Parent Navigation:</td>
							<td>
								<select id="parent" name="parent">
									<?php 
										foreach( $TopLevel AS $key => $value ){
											echo '<option value="'.$key.'"'.(($key==$row['group_id'])?' SELECTED=SELECTED':'').'>'.$value.'</option>';
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<center><strong>Help Text&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></center>
								<textarea id="helptext" name="helptext" style="width:750px;height:400px;"><?php echo stripslashes($row['help_text']); ?></textarea>
							</td>
						</tr>
					</table>
				<?php
			break;
			case 'addSecondSubmit':
				$query = 'SELECT MAX(navigation_id) AS nID FROM administration_navigation_2 WHERE group_id="'.$_POST['parent'].'"';
				$row = mysql_fetch_assoc( $db->query( $query ) );
				$nid = ($row['nID']+1);
				$query = 'INSERT INTO administration_navigation_2 ( navigation_id, group_id, navigation_text, display_order, help_text) VALUES (
						"'.$nid.'", "'.$_POST['parent'].'", "'.$_POST['display_text'].'", "0", "'.addslashes($_POST['helptext']).'"
					)';
				$db->query( $query );
				?>
					<script type="text/javascript" language="Javascript">
						window.location= JSRL+"administration/index.php?group=6&module=12&component=1";
					</script>
				<?php
			break;
			case 'addSecond':
				$IsForm='true';
				?>
					<script type="text/javascript" language="javascript">
						WYSIWYG.attach('helptext', full);
					</script>
					<form method="post" action="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=12&component=1&action=addSecondSubmit">
					<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">
						<tr>
							<td style="width:100px;"><label for="display_text">Display Text</td>
							<td><input type="text" id="display_text" name="display_text"  style="width:200px;"/>
						</tr>
						<tr>
							<td style="width:100px;"><label for="parent">Parent Navigation:</td>
							<td>
								<select id="parent" name="parent">
									<?php 
										foreach( $TopLevel AS $key => $value ){
											echo '<option value="'.$key.'"'.(($key==$_GET['PID'])?' SELECTED=SELECTED':'').'>'.$value.'</option>';
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<center><strong>Help Text&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></center>
								<textarea id="helptext" name="helptext" style="width:750px;height:400px;">Please Write Help Text...</textarea>
							</td>
						</tr>
					</table>
				<?php
			break;
			case 'editSubmitTop':
				$query = 'UPDATE administration_navigation_1 SET 
					navigation_text="'.$_POST['display_text'].'",
					default_text="'.$_POST['default_text'].'",
					help_text="'.addslashes($_POST['helptext']).'", 
					hidden="'.$_POST['hidden'].'"
					WHERE navigation_id="'.$_GET['ID'].'"';
				$db->query( $query );
				?>
					<script type="text/javascript" language="Javascript">
						window.location= JSRL+"administration/index.php?group=6&module=12&component=1";
					</script>
				<?php
			break;
			case 'editTop':
				$IsForm='true';
				$query = 'SELECT * FROM administration_navigation_1 WHERE navigation_id="'.$_GET['ID'].'"';
				$row = mysql_fetch_assoc( $db->query( $query ) );
				?>
				<script type="text/javascript" language="javascript">
					WYSIWYG.attach('helptext', full);
				</script>
				<form method="post" action="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=12&component=1&action=editSubmitTop&ID=<?php echo$_GET['ID']; ?>">
					<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">
						<tr>
							<td style="width:100px;"><label for="display_text">Display Text</td>
							<td><input type="text" id="display_text" name="display_text"  style="width:200px;" value="<?php echo $row['navigation_text']; ?>" />
						</tr>
						<tr>
							<td style="width:100px;"><label for="default_text">Default Text File</td>
							<td><input type="text" id="default_text" name="default_text" style="width:200px;" value="<?php echo $row['default_text']; ?>"/>
						</tr>
						<tr>
							<td style="width:100px;"><label for="hidden">Hidden Page:</td>
							<td>
								Yes: <input type="radio" name="hidden" value="Y" <?php echo(($row['hidden']=='Y')?'CHECKED=CHECKED':''); ?>/>&nbsp;&nbsp;&nbsp;
								No: <input type="radio" name="hidden" value="N" <?php echo(($row['hidden']=='N')?'CHECKED=CHECKED':''); ?>/>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<center><strong>Help Text&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></center>
								<textarea id="helptext" name="helptext" style="width:750px;height:400px;"><?php echo stripslashes($row['help_text']); ?></textarea>
							</td>
						</tr>
					</table>
				<?php
			break;
			case 'addTop':
				$IsForm='true';
				?>
					<script type="text/javascript" language="javascript">
						WYSIWYG.attach('helptext', full);
					</script>
					<form method="post" action="<?php echo REGULAR_URL; ?>administration/index.php?group=6&module=12&component=1&action=topLevelAddSubmit">
					<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">
						<tr>
							<td style="width:100px;"><label for="display_text">Display Text</td>
							<td><input type="text" id="display_text" name="display_text"  style="width:200px;"/>
						</tr>
						<tr>
							<td style="width:100px;"><label for="default_text">Default Text File</td>
							<td><input type="text" id="default_text" name="default_text" style="width:200px;"/>
						</tr>
						<tr>
							<td style="width:100px;"><label for="hidden">Hidden Page:</td>
							<td>
								Yes: <input type="radio" name="hidden" value="Y" />&nbsp;&nbsp;&nbsp;
								No: <input type="radio" name="hidden" value="N" CHECKED=CHECKED/>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<center><strong>Help Text&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></center>
								<textarea id="helptext" name="helptext" style="width:750px;height:400px;">Please Write Help Text...</textarea>
							</td>
						</tr>
					</table>
				<?php
			break;
			case 'topLevelAddSubmit':
				$query = 'SELECT MAX(display_order) AS nextIn FROM administration_navigation_1';
				$temp = mysql_fetch_assoc( $db->query( $query ) );
				$nextID = ($temp['nextIn']+1);
				$query = 'INSERT INTO administration_navigation_1 ( navigation_text, display_order, default_text, hidden, help_text ) VALUES (
					"'.$_POST['display_text'].'",
					"'.$nextID.'",
					"'.$_POST['default_text'].'",
					"'.$_POST['hidden'].'",
					"'.addslashes($_POST['helptext']).'"
				)';
				$db->query( $query );
				?>
					<script type="text/javascript" language="Javascript">
						window.location= JSRL+"administration/index.php?group=6&module=12&component=1";
					</script>
				<?php
			break;
			default:
				$queryTopLevel = 'SELECT * FROM administration_navigation_1 ORDER BY display_order';
				$topLevelResult = $db->query( $queryTopLevel );
				echo '<ul id="navBuilder">';
				while($topLevel = mysql_fetch_assoc( $topLevelResult ) ){
					$i=0;
					echo '<li class="first" style="background:'.((is_odd($i))?'#f4f4f4':'white').';"><strong>&nbsp;&nbsp;&nbsp;'.$topLevel['navigation_text'].'</strong> <a class="edit" href="'.REGULAR_URL.'administration/index.php?group=6&module=12&component=1&action=editTop&ID='.$topLevel['navigation_id'].'">&nbsp;</a>';
					$i++;
						echo '<ul class="second">';
							$querySecondLevel = 'SELECT * FROM administration_navigation_2 WHERE group_id="'.$topLevel['navigation_id'].'"';
							$secondLevelResult = $db->query( $querySecondLevel );
							while($secondLevel = mysql_fetch_assoc( $secondLevelResult ) ){
								echo '<li class="second" style="background:'.((is_odd($i))?'#f4f4f4':'white').';">&nbsp;&nbsp;&nbsp;<strong>'.$secondLevel['navigation_text'].'</strong> <a class="edit" href="'.REGULAR_URL.'administration/index.php?group=6&module=12&component=1&action=editSecond&ID='.$secondLevel['aut_inc'].'">&nbsp;</a>';
									$i++;
									echo '<ul class="third" style="background:'.((is_odd($i))?'#f4f4f4':'white').';">';
									$i++;
									$queryThirdLevel = 'SELECT * FROM administration_navigation_3 WHERE group_id="'.$topLevel['navigation_id'].'" AND sub_group="'.$secondLevel['navigation_id'].'"';
									$thirdLevelResult = $db->query( $queryThirdLevel );
									while($thirdLevel = mysql_fetch_assoc( $thirdLevelResult ) ){
										echo '<li class="third">&nbsp;&nbsp;&nbsp;'.$thirdLevel['navigation_text'].'<a class="edit" href="'.REGULAR_URL.'administration/index.php?group=6&module=12&component=1&action=editThird&ID='.$thirdLevel['unique_key'].'">&nbsp;</a></li>';
									}
									echo '<li class="third" style="border-bottom:0px solid black;">&nbsp;<a href="'.REGULAR_URL.'administration/index.php?group=6&module=12&component=1&action=addThird&ID='.$secondLevel['aut_inc'].'" style="top:0px;left:0px;">+ Add Component Link</a></li>';
									echo '</ul>';
								echo '</li>';
							}
							echo '<li class="second" style="border-bottom:0px solid black;background:'.((is_odd($i))?'#f4f4f4':'white').';">&nbsp;<a href="'.REGULAR_URL.'administration/index.php?group=6&module=12&component=1&action=addSecond&PID='.$topLevel['navigation_id'].'" style="top:0px;left:0px;">+ Add Sub Navigation Group</a></li>';
							$i++;
						echo '</ul>';
					echo '</li>';
				}
				echo '<li class="first" style="border-bottom:0px solid black;background:'.((is_odd($i))?'#f4f4f4':'white').';"><br /><br /><a href="'.REGULAR_URL.'administration/index.php?group=6&module=12&component=1&action=addTop" style="margin-top:10px;top:0px;left:10px;">+ Add New Top Level Navigation Element</a></li>';
				$i++;
				echo '</ul>';
			break;
		}
		?>
		<div class="content_footer">
			<center>
				<?php 
					switch($_GET['action']){
						case 'addThird': ?><input type="submit" value="Add to System" class="button"/><?php break;
						case 'addSecond': ?><input type="submit" value="Add to System" class="button"/><?php break;
						case 'addTop': ?><input type="submit" value="Add to System" class="button"/><?php break;
						case 'editTop': ?><input type="submit" value="Update to System" class="button"/><?php break;
						case 'editSecond': ?><input type="submit" value="Update to System" class="button"/><?php break;
						case 'editThird': ?><input type="submit" value="Update to System" class="button"/><?php break;
						default: ?><?php break;
					}
				?>
			</center>
		</div>
		<?php if($IsForm=='true'){ echo '</form>'; } ?>
</div>