<?php
	foreach( $_POST as $key => $value ){
		if(strstr($key,'moduleSelect')){
			$temp = explode('_',$key);
			$query = 'UPDATE pages SET page_type="'.$value.'" WHERE page_id="'.$temp['1'].'"';
		} else {
			$temp = explode('_',$key);
			$query = 'UPDATE pages SET template_id="'.$value.'" WHERE page_id="'.$temp['1'].'"';
		}
		$db->query( $query );
	}
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location= JSRL+"administration/index.php?group=3&module=4&component=1";';
	echo '</script>';
?>