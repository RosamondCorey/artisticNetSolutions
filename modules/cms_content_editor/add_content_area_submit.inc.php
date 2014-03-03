<?php 
//print_r( $_POST );
$query = 'INSERT INTO content_area ( page_id, header, sub_header, content, content_display_name, `order` )';
$query .= ' VALUES ( 
					"'.$_GET['pageId'].'", 
					"'.$_POST['header_1'].'", 
					"'.$_POST['header_2'].'", 
					"'.$_POST['page_content'].'",
					"'.$_POST['display_name'].'",
					"0"
					)';
$db->query( $query );
echo '<script type="text/javascript" language="Javascript">';
echo 'window.location=JSRL+"administration/index.php?group=3&module=4&component=1&action=edit_content_areas&pageId='.$_GET['pageId'].'";';
echo '</script>';
?>