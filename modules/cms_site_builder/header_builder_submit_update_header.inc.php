<?php
	$ID = $_POST['header_id'];
	$myFile = ABSOLUTE_PATH."composition/front/site_header/".$ID.".inc.php";
	$fh = fopen($myFile, 'w');
	fclose($fh);
	$fh = fopen($myFile, 'w');
	fwrite($fh, $_POST['file_contents'], strlen($_POST['file_contents']));
	fclose($fh);
	echo '<script type="text/javascript" language="Javascript">';
   	echo 'window.location= "'.$modUri.'&action=default";';
   	echo '</script>';
?>