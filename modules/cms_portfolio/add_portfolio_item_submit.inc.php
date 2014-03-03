<?php
	$query = 'SELECT MAX( element_id ) AS start FROM portfolio_elements';
	$temp = mysql_fetch_assoc( $db->query( $query ) );
	if($temp['start']==''){ $name = 1; } else { $name = $temp['start']+1; } 
	$temp = explode('/',$_FILES['image']['type']);
	$fHandler->upload('image',ABSOLUTE_PATH."modules/cms_portfolio/portfolio_images/".$name);
	$query = 'INSERT INTO portfolio_elements ( portfolio_id, category_id, title, sub_title, description, date, link_text, link_location, image_name ) VALUES (';
	$query .= '"'.$_SESSION['portfolio_id'].'",
				"'.$_POST['category_id'].'",
				"'.$_POST['title'].'",
				"'.$_POST['sub_title'].'",
				"'.$_POST['description'].'",
				"'.$_POST['date'].'",
				"'.$_POST['link_text'].'",
				"'.$_POST['link_location'].'",
				"'.$name.$_FILES['image']['name'].'")';
	$db->query( $query );		
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'&action=portfolio_items_main&portfolio_id='.$_SESSION['portfolio_id'].'";';
	echo '</script>';
?>