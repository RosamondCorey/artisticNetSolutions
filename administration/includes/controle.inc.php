<?php require_once(ABSOLUTE_PATH.'administration/includes/left_navigation.inc.php'); ?>
<div class="content_area" id="content_area" style="height:<?php echo ($architectAdmin->Dimensions['contentHeight']-10); ?>px;
	width:<?php echo($_SESSION['viewportWidth']-210); ?>px;margin-right:-<?php echo $_SESSION['viewportWidth']; ?>px;margin-left:210px;">
	<?php
		if(isset($_GET['module'])&&$_GET['module']!='default'){
			$query = 'SELECT a.module_dir, b.file FROM module as a, component as b WHERE a.module_id="'.$_GET['module'].'" AND b.module_id="'.$_GET['module'].'" AND b.component_id="'.$_GET['component'].'"';
			$row = mysql_fetch_array($db->query($query));
			require_once(ABSOLUTE_PATH.'modules/'.$row['module_dir'].$row['file']);
		} else {
			if(isset($_GET['module_id'])&&$_GET['module_id']=="dashboard"){
				require_once(ABSOLUTE_PATH.'administration/default_text/dashboard.inc.php');
			} else if(isset($_GET['group_id'])||isset($_GET['navigation_id'])&&$_GET['navigation_id']!='default'||$_GET['redirect']=='true'){
				require_once(ABSOLUTE_PATH.'administration/includes/sub_section_help_text.inc.php');
			} else {
				$query = 'SELECT default_text FROM administration_navigation_1 WHERE navigation_id="'.$_GET['group'].'"';
				$row = mysql_fetch_array($db->query($query));
				require_once(ABSOLUTE_PATH.'administration/default_text/'.$row['default_text']);
			}
		}
	?>
</div>