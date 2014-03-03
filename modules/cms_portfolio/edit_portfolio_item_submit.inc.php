<?php
	//print_r($_POST);
	//print_r($_FILES);
	if($_FILES['image']['name']!=''){
		$query = 'SELECT * FROM portfolio_elements WHERE element_id="'.$_GET['element_id'].'"';	
		$row = mysql_fetch_assoc( $db->query( $query ) );
		$UNSET = ABSOLUTE_PATH.$fpath.'portfolio_images/'.$row['image_name'];
		unlink($UNSET);		
		$fHandler->upload('image',ABSOLUTE_PATH."modules/cms_portfolio/portfolio_images/".$_GET['element_id']);
		$query = 'UPDATE portfolio_elements SET image_name="'.$_GET['element_id'].$_FILES['image']['name'].'" WHERE element_id="'.$_GET['element_id'].'"';
		$db->query( $query );
	}
	$query = 'UPDATE portfolio_elements SET 
					category_id="'.$_POST['category_id'].'",
					title="'.$_POST['title'].'", 
					sub_title="'.$_POST['sub_title'].'", 
					description="'.$_POST['description'].'",
					date="'.$_POST['date'].'",
					link_text="'.$_POST['link_text'].'",
					link_location="'.$_POST['link_location'].'" 
				WHERE element_id="'.$_GET['element_id'].'"';
	$db->query( $query );	
	echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location=JSRL+"'.$FunctionBaseUri.'&action=portfolio_items_main&portfolio_id='.$_SESSION['portfolio_id'].'";';
	echo '</script>';
?>