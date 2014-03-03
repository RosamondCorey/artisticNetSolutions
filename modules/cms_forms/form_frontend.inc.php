<?php
	// output module content if needed
	$moduleReturn = '';
	if($architect->SiteData['content_position']=="B"){
		$moduleReturn .= '%%CONTENT%%';
	}
	//print_r($architect);
	$query = 'SELECT * FROM forms WHERE form_id="'.$architect->SiteData['module_sub_id'].'"';
	$formData = mysql_fetch_assoc( $db->query( $query ) );
	if(!isset($_GET['action'])){
	$query = 'SELECT * FROM form_elements WHERE form_id="'.$architect->SiteData['module_sub_id'].'" ORDER BY `order`';
	$result = $db->query( $query );
	$moduleReturn .= '<div class="content_full">';
		$moduleReturn .= '<div class="content_topper_full">&nbsp;</div>';
			$moduleReturn .= '<div class="list_content" >';
				$moduleReturn .= '<h2>'.$formData['form_name'].'</h2><br />';
				$moduleReturn .= '<form method="post" action="'.$architect->SiteData['URL'].'index.php?button_id='.$_GET['button_id'].'&action=submit">';
				while( $row = mysql_fetch_array( $result ) ){
					switch($row['element_type']){
						case 'I':
							$moduleReturn .= '<span style="display:block;width:100%;padding:3px 0px 3px 0px;">';
							$moduleReturn .= '<label for="element_'.$row['element_id'].'" style="float:left;text-align:right;width:250px;">'.$row['element_label'].'</label>';
							$moduleReturn .= '<span style="float:right;width:400px;">';
							$moduleReturn .= '&nbsp;&nbsp;&nbsp;<input 
								type="text" 
								id="element_'.$row['element_id'].'" 
								name="element_'.$row['element_id'].'" 
								value="'.$row['element_value'].'" 
								style="width:'.$row['element_width'].'px;"/></span>';
								$moduleReturn .= '<div style="clear:both;"></div>';
							$moduleReturn .= '</span>';
						break;
						case 'S':
							$moduleReturn .= '<span style="display:block;width:100%;padding:3px 0px 3px 0px;">';
							$moduleReturn .= '<label for="element_'.$row['element_id'].'" style="float:left;text-align:right;width:250px;">'.$row['element_label'].'</label>';
							$moduleReturn .= '<span style="float:right;width:400px;">&nbsp;&nbsp;&nbsp;<select id="element_'.$row['element_id'].'" name="element_'.$row['element_id'].'">'; 
								$temp = explode(',',$row['element_value']);
								foreach( $temp as $key => $value ){
									$moduleReturn .= '<option value="'.$value.'">'.$value.'</option>';
								}
							$moduleReturn .= '</select></span>';
							$moduleReturn .= '<div style="clear:both;"></div>';
							$moduleReturn .= '</span>';
						break;	
						case 'T':
							$moduleReturn .= '<span style="display:block;width:100%;padding:3px 0px 3px 0px;">';
							$moduleReturn .= '<label for="element_'.$row['element_id'].'"  style="float:left;text-align:right;width:250px;">'.$row['element_label'].'</label>';
							$moduleReturn .= '<span style="float:right;width:400px;">&nbsp;&nbsp;&nbsp;<textarea 
													id="element_'.$row['element_id'].'" 
													name="element_'.$row['element_id'].'"
													style="width:'.$row['element_width'].'px;height:'.$row['element_height'].'px;">';
							$moduleReturn .= $row['element_value'].'</textarea></span>';
							$moduleReturn .= '<div style="clear:both;"></div>';
							$moduleReturn .= '</span>';
						break;	
					}
				}
				$moduleReturn .= '<center><input type="submit" value="Send" /></center>';	
				$moduleReturn .= '</form>';
			$moduleReturn .= '<div class="content_bottom_full">&nbsp;</div>';
			$moduleReturn .= '</div>';
	$moduleReturn .= '</div>';	
	} else {
		$query = 'SELECT * FROM form_elements WHERE form_id="'.$architect->SiteData['module_sub_id'].'" ORDER BY `order`';
		$result = $db->query( $query );
		$moduleReturn .= '<div class="content_full">';
			$moduleReturn .= '<div class="content_topper_full">&nbsp;</div>';
				$moduleReturn .= '<div class="list_content" >';
					$info = '';
					while( $row = mysql_fetch_assoc( $result ) ){
						$info .= $row['element_label'].' '.$_POST['element_'.$row['element_id']].'<br />';
						if($row['element_return_email']=='Y'){ $recipiant = $_POST['element_'.$row['element_id']]; }
					}
					$moduleReturn .= '<h1>'.$formData['thank_you_title'].'</h1><br />';
					$moduleReturn .= '<p>'.$formData['thank_you_message'].'</p>';
					if($formData['confirmation_link_input']=='Y'){
						$moduleReturn .= '<p>'.$info.'</p>';
					}
					$moduleReturn .= '<div class="content_bottom_full">&nbsp;</div>';
				$moduleReturn .= '</div>';
		$moduleReturn .= '</div>';
		$header = '<html><head></head><body>';
		// Email to us
		$to      = $formData['form_recipiant'];
		$subject = $formData['form_subject'];
		$message = $header.$formData['form_message'].'<br />'.$info.'</body></html>';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		// Additional headers
		$headers .= 'From: Artistic Net Solutions <support@artisticnetsolution.com>' . "\r\n";
		mail($to, $subject, $message, $headers);
		if($formData['send_confirmation']=='Y'){
			// email to them
			$to      = $recipiant;
			$subject = $formData['confirmation_subject'];
			$message = $header.$formData['confirmation_message'].'<br />'.(($formData['confirmation_link_input']=='Y')?$info:'').'</body></html>';
			mail($to, $subject, $message, $headers);
		}
	}
	// output module content if needed
	if($architect->SiteData['content_position']=="A"){
		$moduleReturn .= '%%CONTENT%%';
	}
?>