<?php 
//print_r( $_POST );
$query = 'UPDATE content_area SET 
			header="'.$_POST['header_1'].'", 
			sub_header="'.$_POST['header_2'].'", 
			content="'.$_POST['page_content'].'", 
			content_display_name="'.$_POST['display_name'].'"
		  WHERE content_id="'.$_GET['content_id'].'"';
$db->query( $query );
echo '<script type="text/javascript" language="Javascript">';
echo 'window.location=JSRL+"administration/index.php?group=3&module=4&component=1&action=edit_content_areas&pageId='.$_GET['pageId'].'";';
echo '</script>';
?>