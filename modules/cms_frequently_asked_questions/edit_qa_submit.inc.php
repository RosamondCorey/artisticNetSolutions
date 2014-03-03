<?php 
	$query = 'UPDATE faq_qa SET question="'.mysql_real_escape_string($_POST['question']).'", answer="'.mysql_real_escape_string($_POST['answer']).'" ';
	$query .= 'WHERE qa_id="'.$_GET['qa_id'].'"';
	$db->query( $query );
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'&action=faq_manage&faq_id='.$_SESSION['faq_id'].'";';
	echo '</script>';
?>