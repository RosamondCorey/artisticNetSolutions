<?php
	
  	$query = 'UPDATE pages SET cms_page_name="'.$_POST['cms_page_name'].'", isindex="'.((isset($_POST['is-index']))?'Y':'N').'" ';
	$query .= ' WHERE page_id="'.$_GET['pageId'].'"';
   	$db->query( $query );
   	$query = 'UPDATE page_meta SET title="'.$_POST['page_title'].'", keywords="'.$_POST['keywords'].'", description="'.$_POST['description'].'", ';
	$query .= 'nofollow="'.((isset($_POST['no-follow']))?'Y':'N').'" WHERE page_id="'.$_GET['pageId'].'"';
   	$db->query( $query );
   	echo '<script type="text/javascript" language="Javascript">';
   	echo 'window.location= JSRL+"administration/index.php?group=3&module=4&component=1";';
   	echo '</script>';
?>