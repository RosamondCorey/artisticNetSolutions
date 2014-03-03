<?php
	$componentReturn = '';
	switch($architect->SiteData['header_type']){
		case 'S':
			$query = 'SELECT * FROM hero_sliders WHERE slider_id="'.$architect->SiteData['header_image'].'"';
			$heroData = mysql_fetch_assoc( $db->query( $query ) );
			$query = 'SELECT * FROM slider_frames WHERE slider_id="'.$heroData['slider_id'].'" ORDER BY frame_order';
			$result = $db->query( $query );
			$jsonArray = 'new Array(';
			$componentReturn .= '<div class="t1_bch">';
				$first = true;
				$jsoncount=0;
				while( $row = mysql_fetch_assoc( $result ) ){
					$componentReturn .= '<div id="frame_'.$row['frame_id'].'"';
						$componentReturn .= 'style="background: #151515 url(\'http://'.$architect->hostData['site_url'].'/images/header_images/'.$row['frame_image'].'\') left top no-repeat;';
						$componentReturn .= 'width:'.($heroData['slider_width']-10).'px;height:255px;';
						if($first){ $componentReturn .= 'display:block;visibility:visible;';
						} else { $componentReturn .= 'display:none;visibility:hidden;'; }
						if(!$first){ $jsonArray .= ', '; } 
					$componentReturn .= '"><div class="hero_content">';
					$componentReturn .= '<h3>'.$row['frame_header'].'</h3>';
					$componentReturn .= $row['frame_text'];
					$componentReturn .= '<div class="slider_readmore">';
					$componentReturn .= '<a href="http://'.$architect->hostData['site_url'].'/index.php?button_id=0&page_id='.$row['frame_page_link'].'">Read More</a></div>';	
					$componentReturn .= '</div>';
					$componentReturn .= '</div>';
					if($first){ $first = false; }
					$jsonArray .= '"frame_'.$row['frame_id'].'"';
					$jsoncount++;
				}
			$jsonArray .= ')';
			
			$componentReturn .= "</div>";
			$componentReturn .= '<script type="text/javascript" language="javascript">';
				$componentReturn .= 'SliderItems = '.$jsonArray.';';
				$componentReturn .= 'window.setInterval("hero_slider_interval_change()",10000);';
			$componentReturn .= '</script>';
		break;
		case 'I':
			$query = 'SELECT * FROM header_images WHERE header_id="'.$architect->SiteData['header_image'].'"';
			$row = mysql_fetch_assoc( $db->query( $query ) );
			//print_r($row);
			$componentReturn .= '<div class="t1_bch2">';
				$componentReturn .= '<img src="http://'.$architect->hostData['site_url'].'/images/'.$row['img_src'].'" />';
			$componentReturn .= "</div>";
		break;
		default: break;
	}
?>
