<?php
	$query = 'INSERT INTO faq_qa ( faq_id, question, answer, `order` ) VALUES ';
	$query .= '("'.$_SESSION['faq_id'].'", "'.mysql_real_escape_string($_POST['question']).'", "'.mysql_real_escape_string($_POST['answer']).'", "0")';
	$db->query( $query );
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'&action=faq_manage&faq_id='.$_SESSION['faq_id'].'";';
	echo '</script>';
?>