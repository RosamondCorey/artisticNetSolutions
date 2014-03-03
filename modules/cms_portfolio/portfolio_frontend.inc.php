<?php
	// output module content if needed
	$moduleReturn = '';
	if($architect->SiteData['content_position']=="B"){
		$moduleReturn .= '%%CONTENT%%';
	}
	//print_r($architect);
	// Build the category select
	$query = 'SELECT * FROM portfolio_categorys WHERE portfolio_id="'.$architect->SiteData['module_sub_id'].'" ORDER BY `order`';
	$result = $db->query( $query );
	$elementCats = array();
	$cats = '<div style="margin-top:20px;background:#1f1f1f;width:975px;height:39px;border-top:1px solid #313131;border-bottom:3px solid #171717;border-left:3px solid #171717;">';
	$activeTab = 'style="color:white;padding:0px 10px 0px 10px;background:#61366A;height:29px;font-size:16px;line-height:26px;diplay:inline;float:left;';
	$activeTab .= 'margin:5px 0px 0px 5px; border-top:1px solid #82538c;font-family:\'lato\', sans-serif; font-weight:300;cursor:pointer;text-decoration:none;"';
	$inActiveTab = 'style="color:white;padding:0px 10px 0px 10px;height:29px;font-size:16px;line-height:27px;diplay:inline;float:left;';
	$inActiveTab .= 'margin:5px 0px 0px 5px;font-family:\'lato\', sans-serif; font-weight:300;cursor:pointer;text-decoration:none;"';
	$first='true';
	$active = ((isset($_GET['active']))?$_GET['active']:'NULL');
	while( $row = mysql_fetch_assoc( $result )){
		$elementCats[$row['category_id']] = '';
		$cats .= '<a href="'.$architect->SiteData['URL'].'index.php?button_id='.$_GET['button_id'].'&active='.$row['category_id'].'" ';
		$cats .= (($active!='NULL')?(($active==$row['category_id'])?$activeTab:$inActiveTab):(($first=='true')?$activeTab:$inActiveTab));
		$cats .= '>'.$row['category_name'].'</a>';
		$first = 'false';
	}
	$cats .= '<div style="clear:both;"></div>';
	$cats .= '</div>';
	$moduleReturn .= $cats;
	
	
	
	// build portfolio elements
	$query = 'SELECT * FROM portfolio_elements WHERE portfolio_id="'.$architect->SiteData['module_sub_id'].'" ORDER BY `order`';
	$result = $db->query( $query );
	$elementBox = 'style="width:978;background:#1f1f1f;margin-top:20px;"';
	$temp = 'display:block;font-family:\'lato\', sans-serif;';
	while( $row = mysql_fetch_assoc( $result )){
		$elementCats[$row['category_id']] .= '<div '.$elementBox.'>';
			$elementCats[$row['category_id']] .= '<div style="float:right;height:290px;width:188px;border-top:1px solid #313131;border-bottom:3px solid #171717;border-left:3px solid #171717;padding:20px 30px 20px 30px;">';
				$elementCats[$row['category_id']] .= '<span style="'.$temp.'font-size:20px; font-weight:300;color:white;">'.$row['title'].'</span>';
				$elementCats[$row['category_id']] .= '<span style="'.$temp.'font-size:12px;color:#8a8a8a;margin:5px 0 10px;">'.$row['sub_title'].'</span>';
				$elementCats[$row['category_id']] .= '<hr style="width:100%;height:1px;border:0px solid white;background:#313131;" />';	
				$elementCats[$row['category_id']] .= '<span style="'.$temp.'font-size:14px; font-weight:300;color:white;margin-bottom:10px;">Description</span>';
				$elementCats[$row['category_id']] .= '<span style="'.$temp.'font-size:12px;line-height:18px;color:#8a8a8a;height:130px;">'.$row['description'].'</span>';
				$elementCats[$row['category_id']] .= '<hr style="width:100%;height:1px;border:0px solid white;background:#313131;" />';
				$elementCats[$row['category_id']] .= '<span style="'.$temp.'font-size:16px; font-weight:300;color:white;font-weight:bold;margin:10px 0 5px 0;">'.$row['date'].'</span>';
				$elementCats[$row['category_id']] .= '<a target="_blank" href="'.$row['link_location'].'" style="'.$temp.'font-size:12px;color:#8dc63f;text-decoration:none;">'.$row['link_text'].'</a>';
			$elementCats[$row['category_id']] .= '</div>';
			$elementCats[$row['category_id']] .= '<div style="padding:5px 5px 5px 5px;width:716px;height:324px;background:white;">';
				$elementCats[$row['category_id']] .= '<img src="'.$architect->SiteData['URL'].'modules/cms_portfolio/portfolio_images/'.$row['image_name'].'" alt="'.$row['title'].'" height="324" width="716" />';
			$elementCats[$row['category_id']] .= '</div>';
		$elementCats[$row['category_id']] .= '</div>';
	}
	$show = 'style="display:block;visibility:visible"';
	$hide = 'style="display:none;visibility:hidden"';
	$first = 'true';
	//echo $active;
	foreach( $elementCats as $key => $value ){
		$moduleReturn .= '<div '.(($active!='NULL')?(($active==$key)?$show:$hide):(($first=='true')?$show:$hide)).'>';	
		$moduleReturn .= (($value=="")?'<br /><br /><br /><center><span style="color:#8A8A8A;font-style:italic;">There are no entrys in this section.</span></center><br /><br />':$value);	
		$moduleReturn .= '</div>';
		$first='false';
	}
	
	
	
	
	
	
	
	// output module content if needed
	if($architect->SiteData['content_position']=="A"){
		$moduleReturn .= '%%CONTENT%%';
	}
?>