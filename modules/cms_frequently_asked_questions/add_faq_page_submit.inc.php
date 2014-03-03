<?php
	$query = 'INSERT INTO faqs ( faq_name ) VALUES ( "'.$_POST['faq_name'].'" )';
	$db->query( $query );
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'";';
	echo '</script>';
?>