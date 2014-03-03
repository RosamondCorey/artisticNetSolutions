<?php
	$query = 'DELETE FROM faqs WHERE faq_id="'.$_GET['faq_id'].'"';
	$db->query( $query );
	$query = 'DELETE FROM faq_qa WHERE faq_id="'.$_GET['faq_id'].'"';
	$db->query( $query );
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'";';
	echo '</script>';
?>