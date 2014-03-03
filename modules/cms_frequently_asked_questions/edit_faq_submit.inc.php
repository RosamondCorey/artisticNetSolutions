<?php
	$query = 'UPDATE faqs SET faq_name="'.$_POST['faq_name'].'" WHERE faq_id="'.$_GET['faq_id'].'"';
	$db->query( $query );
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'";';
	echo '</script>';

?>