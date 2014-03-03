<?php
	$query = 'DELETE FROM faq_qa WHERE qa_id="'.$_GET['qa_id'].'"';
	$db->query( $query );
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'&action=faq_manage&faq_id='.$_SESSION['faq_id'].'";';
	echo '</script>';
?>