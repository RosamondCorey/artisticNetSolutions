<?php
	$moduleReturn = '';
	if($architect->SiteData['content_position']=="B"){
		$moduleReturn .= '%%CONTENT%%';
	}
	$moduleReturn .= '<div class="content_full">';
		$moduleReturn .= '<div class="content_topper_full">&nbsp;</div>';
		$moduleReturn .= '<div class="list_content">';
			$query = 'SELECT * FROM faqs WHERE faq_id="'.$architect->SiteData['module_sub_id'].'"';
			$res = mysql_fetch_assoc( $db->query( $query ) );
			$moduleReturn .= "<h2>".$res['faq_name']."</h2><br />";
			$query = 'SELECT * FROM faq_qa WHERE faq_id="'.$architect->SiteData['module_sub_id'].'" ORDER BY `order`';
			$result = $db->query( $query );
			while( $row = mysql_fetch_assoc( $result ) ){
				$moduleReturn .= "<strong>Q</strong>: ".$row['question']."<br />";
				$moduleReturn .= "<strong>A</strong>: ".$row['answer']."<br />";
				$moduleReturn .= "<br />";	
			}
			$moduleReturn .= '<div class="content_bottom_full">&nbsp;</div>';
		$moduleReturn .= '</div>';
	$moduleReturn .= '</div>';
	if($architect->SiteData['content_position']=="A"){
		$moduleReturn .= '%%CONTENT%%';
	}
?>