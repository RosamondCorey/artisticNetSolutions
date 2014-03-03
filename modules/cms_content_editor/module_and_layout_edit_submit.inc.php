<?php
	if(substr($_POST['page_hero'],0,4)=='none'){ $header_type='N';	
	} else if(substr($_POST['page_hero'],0,4)=='slid'){ $header_type='S';
	} else { $header_type='I'; }
	$temp = explode('_',$_POST['page_hero']);
	$_POST['page_hero']=$temp[1];
	$query = 'UPDATE pages SET header_image="'.$_POST['page_hero'].'", header_type="'.$header_type.'", page_header="'.$_POST['page_header'].'", ';
	$query .= 'content_type="'.$_POST['content_output_type'].'", content_position="'.$_POST['content_position'].'" WHERE page_id="'.$_GET['pageId'].'"';
	$db->query( $query );
	$query = 'SELECT * FROM pages WHERE page_id="'.$_GET['pageId'].'"';
	$pageData = mysql_fetch_assoc( $db->query( $query ) );
	$query = 'SELECT module_id FROM page_module WHERE page_module_id="'.$pageData['page_type'].'"';
	$row = mysql_fetch_assoc( $db->query( $query ) );
	$query = 'SELECT module_dir FROM module WHERE module_id="'.$row['module_id'].'"';
	$row = mysql_fetch_assoc( $db->query( $query ) );
	if(file_exists(ABSOLUTE_PATH.'modules/'.$row['module_dir'].'module_page_edit_submit.inc.php')){
		require_once(ABSOLUTE_PATH.'modules/'.$row['module_dir'].'module_page_edit_submit.inc.php');
	}
	echo '<script type="text/javascript" language="Javascript">';
   	echo 'window.location= JSRL+"administration/index.php?group=3&module=4&component=1";';
   	echo '</script>';
?>