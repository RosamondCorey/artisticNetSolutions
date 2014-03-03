<?php 
	$query = 'UPDATE pages SET module_sub_id="'.$_POST['faq_group'].'" WHERE page_id="'.$_GET['pageId'].'"';
	$db->query( $query );
?>