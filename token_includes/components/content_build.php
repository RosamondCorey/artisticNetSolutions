<?php
	$query = 'SELECT * FROM content_area WHERE page_id="'.$architect->Page_id.'" ORDER BY `order`';
	$result = $db->query( $query );
	
		
	if( mysql_num_rows( $result ) >= 1){
		if($architect->SiteData['content_type']=='T'){
			$componentReturn = '<div class="content_topper">&nbsp;</div>';
			$leftContent = '<div class="left_content">';
			$rightContent = '<div class="right_content">';
			$contentAreaCount = 0;
			while( $row = mysql_fetch_assoc( $result ) ){
				$leftContent .= '<div class="tab_'.(($contentAreaCount==0)?'active':'inactive').'" id="tab_'.$row['content_id'].'" onClick="Javascript: flip_content_area(\''.$row['content_id'].'\');">';
				$leftContent .= $row['content_display_name'].'</div>';
				$rightContent .= '<div class="tab_content" id="content_'.$row['content_id'].'" style="'.(($contentAreaCount==0)?'display:block;visibility:visible;':'display:none;visibility:hidden;').'">';
				$rightContent .= '<h1>'.$row['header'].'</h1>';
				$rightContent .= '<h2>'.$row['sub_header'].'</h2><br />';
				$rightContent .= $row['content'].'</div>';
				$contentAreaCount++;
			}
			$leftContent .= '</div>';
			$rightContent .= '<div class="content_bottom">&nbsp;</div></div>';
			$componentReturn .= $leftContent.$rightContent;
			$componentReturn .= '<div style="clear:left;"></div>';
		} else {
			$componentReturn ='';
			$rightContent = '<div class="content_full">';
			$contentAreaCount = 0;
			while( $row = mysql_fetch_assoc( $result ) ){
				$rightContent .= '<div class="content_topper_full">&nbsp;</div>';
				$rightContent .= '<div class="list_content" >';
				$rightContent .= '<h1>'.$row['header'].'</h1>';
				$rightContent .= '<h2>'.$row['sub_header'].'</h2><br />';
				$rightContent .= $row['content'];
				$rightContent .= '<div class="content_bottom_full">&nbsp;</div></div>';
				$contentAreaCount++;
			}
			$componentReturn .= $rightContent;
			//$componentReturn .= '<div style="clear:left;"></div>';
		}
	} else {
		echo '<center>Error No content associated with this page.</center>';
	}
?>
