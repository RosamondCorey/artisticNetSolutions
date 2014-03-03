<?php 
	foreach( $_POST as $key => $value ){
		$temp = explode('_',$key);
		$query = 'UPDATE faq_qa SET `order`="'.$value.'" WHERE qa_id="'.$temp['1'].'"';	
		$db->query( $query );
	}
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'&action=faq_manage&faq_id='.$_SESSION['faq_id'].'";';
	echo '</script>';
?>