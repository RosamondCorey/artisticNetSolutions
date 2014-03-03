<?php
foreach( $_POST as $key=>$value){
	$query = 'UPDATE content_area SET `order`="'.$value.'" WHERE content_id="'.$key.'"';
	$db->query( $query );	
}
echo '<script type="text/javascript" language="Javascript">';
echo 'window.location=JSRL+"administration/index.php?group=3&module=4&component=1&action=edit_content_areas&pageId='.$_GET['pageId'].'";';
echo '</script>';

?>