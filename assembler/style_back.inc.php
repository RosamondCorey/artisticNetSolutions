<?php
	$architectAdmin->BuildStyles();
	$count = sizeof($architectAdmin->SiteData['style_sheets']);
	for($i=0;$i<$count;$i++){
		echo "\t";
		echo '<link href="'; 
		echo REGULAR_URL.'css/back/default/';
		echo $architectAdmin->SiteData['style_sheets'][$i].'" rel="stylesheet" type="text/css">';
		echo "\n";
	}
?>