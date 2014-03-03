<?php 
	$result = $db->query('SELECT * FROM content_area WHERE content LIKE "%'.$_POST['search_text'].'%" OR header like "%'.$_POST['search_text'].'%" ORDER BY page_id DESC');
	$moduleReturn = "";
	$moduleReturn .= "<h1>%%HEADER%%</h1>";
	$moduleReturn .= '<div class="text_area">';
	$moduleReturn .= "<p>%%CONTENT_AREA%%</p><br />";
	while($row = mysql_fetch_assoc( $result ) ){
		$moduleReturn .= '<span style="font-weight:bold;font-size:16px;color:#081853;">'.$row['header'].'</span><br />';
		$content = strip_tags(stripslashes($row['content']));
		$content = str_replace($_POST['search_text'],'<span style="background:yellow;">'.$_POST['search_text'].'</span>', $content);
		$moduleReturn .= '<p style="margin:0px;padding:0px;">'.$content;
		$moduleReturn .= ' - <a href="%%URL%%index.php?button_id=0&page_id='.$row['page_id'].'">More</a></p>';
		$moduleReturn .= '<hr style="background:#889083;border:0px solid #889083;height:2px;width:100%;" /><br />';
	}
	$moduleReturn .= '</div>';
?>