<?php

if(!isset($_SESSION['siteData']['site_id'])&&$_SESSION['siteData']['site_id']==''){	
	?>
    <script type="text/javascript" language="javascript">
		<?php echo 'window.location= JSRL+"administration/index.php?group=3&redirect=true";'; ?>
	</script>
    <?php
}
$siteSpecificPages = $db->query('SELECT * FROM pages WHERE  site_id="'.$_SESSION['siteData']['site_id'].'"');
$globalPages = $db->query('SELECT * FROM pages WHERE page_scope IN("P") AND site_id="0" AND service_id="1"');
$serviceSpecificPages = $db->query( 'SELECT * FROM pages WHERE service_id="'.$_SESSION['siteData']['service_id'].'" and page_scope NOT IN("P","N")' );
$pageName = 'Hero Sliders';
echo $page->BuildPageHeader( $pageName );
if(!isset($_GET['action'])){ $_GET['action']='default'; }
$IsForm='false';
switch($_GET['action']){
	case 'add_slider':
		$IsForm='true';
		echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group=3&module=7&component=2&action=submit_add_slider" enctype="multipart/form-data">';
		echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">';
		echo '<tr>';
		echo '<td style="width:100px;"><label for="slider_name">Slider Name: </label></td>';
		echo '<td><input type="text" name="slider_name" id="slider_name" /></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:100px;"><label for="slider_height">Slider Height: </label></td>';
		echo '<td><input type="text" name="slider_height" id="slider_height" /></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:100px;"><label for="slider_width">Slider Width: </label></td>';
		echo '<td><input type="text" name="slider_width" id="slider_width" /></td>';
		echo '</tr>';
		echo '</table>';
	break;
	case '':
	case 'submit_add_slider';
		$IsForm='false';
		$query = 'INSERT INTO hero_sliders ( slider_name, slider_height, slider_width, site_id) VALUES ';
		$query .= '( "'.$_POST['slider_name'].'", "'.$_POST['slider_height'].'", "'.$_POST['slider_width'].'", "'.$_SESSION['siteData']['site_id'].'")';
		$result = $db->query( $query );
		echo '<script type="text/javascript" language="Javascript">';
   		echo 'window.location= JSRL+"administration/index.php?group=3&module=7&component=2";';
   		echo '</script>';
	break;
	case 'submit_frame_reorder':
		foreach( $_POST as $key=>$value){
			$query = 'UPDATE slider_frames SET frame_order="'.$value.'" WHERE frame_id="'.$key.'"';
			$db->query( $query );	
		}
		echo '<script type="text/javascript" language="Javascript">';
   		echo 'window.location= JSRL+"administration/index.php?group=3&module=7&component=2&action=list_frames&slider_id='.$_SESSION['slider_id'].'";';
   		echo '</script>';
	break;
	case 'delete_slider':
		$query = 'DELETE FROM hero_sliders WHERE slider_id="'.$_GET['slider_id'].'"';
		$db->query( $query );
		$query = 'SELECT * FROM slider_frames WHERE slider_id="'.$_GET['slider_id'].'"';
		$result = $db->query( $query );
		while( $row = mysql_fetch_assoc( $result ) ){
			$UNSET = ABSOLUTE_PATH.'images/header_images/'.$row['frame_image'];
   			unlink($UNSET);	
		}
		$query = 'DELETE FROM slider_frames WHERE slider_id="'.$_GET['slider_id'].'"';
		$db->query( $query );
		echo '<script type="text/javascript" language="Javascript">';
   		echo 'window.location= JSRL+"administration/index.php?group=3&module=7&component=2";';
   		echo '</script>';
	break;
	case 'update_frame':
		$query = 'SELECT * FROM slider_frames WHERE frame_id="'.$_GET['frame_id'].'"';
		$row = mysql_fetch_assoc( $db->query( $query ) );
		if($_FILES['frame_image']['name']!=""){
			$UNSET = ABSOLUTE_PATH.'images/header_images/'.$row['frame_image'];
   			unlink($UNSET);
			$fHandler->upload('frame_image',ABSOLUTE_PATH."images/header_images/");
			$query = 'UPDATE slider_frames SET frame_image="'.$_FILES['frame_image']['name'].'", frame_text="'.mysql_real_escape_string($_POST['frame_text']).'", frame_page_link="'.$_POST['page_link'].'", frame_header="'.$_POST['frame_header'].'" WHERE frame_id="'.$_GET['frame_id'].'"';
			$db->query( $query );
		} else {
			$query = 'UPDATE slider_frames SET frame_text="'.mysql_real_escape_string($_POST['frame_text']).'", frame_page_link="'.$_POST['page_link'].'", frame_header="'.$_POST['frame_header'].'" WHERE frame_id="'.$_GET['frame_id'].'"';
			$db->query( $query );
		}
		echo '<script type="text/javascript" language="Javascript">';
   		echo 'window.location= JSRL+"administration/index.php?group=3&module=7&component=2&action=list_frames&slider_id='.$_SESSION['slider_id'].'";';
   		echo '</script>';
	break;
	case 'edit_frame':
		$IsForm='true';
		$query = 'SELECT * FROM slider_frames WHERE frame_id="'.$_GET['frame_id'].'"';
		$row = mysql_fetch_assoc( $db->query( $query ) );
		$query = 'SELECT * FROM hero_sliders WHERE slider_id="'.$row['slider_id'].'"';
		$slider_data =  mysql_fetch_assoc( $db->query( $query ) );
		echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group=3&module=7&component=2&action=update_frame&frame_id='.$_GET['frame_id'].'" enctype="multipart/form-data">';
		echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">';
		echo '<input type="hidden" value="'.$_SESSION['slider_id'].'" name="slider_id" id="slider_id" />';
		echo '<tr>';
			echo '<td colspan="2"><center>';
				if($slider_data['slider_width']>=600){
					$slider_data['slider_width'] = ($slider_data['slider_width']/2);
					$slider_data['slider_height'] = ($slider_data['slider_height']/2);	
				}
				echo '<img src="'.REGULAR_URL.'images/header_images/'.$row['frame_image'].'" height="'.$slider_data['slider_height'].'" width="'.$slider_data['slider_width'].'" /><br />';
			echo '</center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:100px;"><label for="frame_image">Frame Image: </label></td>';
		echo '<td><input type="file" name="frame_image" id="frame_image" /></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:100px;"><label for="frame_header">Frame Title: </label></td>';
		echo '<td><input type="text" name="frame_header" id="frame_header" value="'.$row['frame_header'].'" /></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td colspan="2" style="width:100px;"><label for="frame_text">Frame Text: </label></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td colspan="2"><center><textarea name="frame_text" id="frame_text" style="width:765px;">'.$row['frame_text'].'</textarea></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:100px;"><label for="page_link">Page to link to: </label></td>';
		echo '<td>';
		echo '<select name="page_link" id="page_link">';
		echo '<optgroup label="Site Specific Pages">';
		while($pages = mysql_fetch_assoc( $siteSpecificPages )){
			echo '<option value="'.$pages['page_id'].'" '.(($row['frame_page_link']==$pages['page_id'])?'selected=selected':'').'>'.$pages['cms_page_name'].'</option>';
		}
		echo '</optgroup>';
		echo '<optgroup label="Service Specific Pages">';
		while($pages = mysql_fetch_assoc( $serviceSpecificPages )){
			echo '<option value="'.$pages['page_id'].'" '.(($row['frame_page_link']==$pages['page_id'])?'selected=selected':'').'>'.$pages['cms_page_name'].'</option>';
		}
		echo '</optgroup>';
		echo '<optgroup label="Global Pages">';
		while($pages = mysql_fetch_assoc( $globalPages )){
			echo '<option value="'.$pages['page_id'].'" '.(($row['frame_page_link']==$pages['page_id'])?'selected=selected':'').'>'.$pages['cms_page_name'].'</option>';
		}
		echo '</optgroup>';
		echo '</select>';
		echo '</td>';
		echo '</tr>';
		echo '</table>';
	break;
	case 'delete_frame':
		$query = 'SELECT * FROM slider_frames WHERE frame_id="'.$_GET['frame_id'].'"';
		$row = mysql_fetch_assoc($db->query( $query ));
		$UNSET = ABSOLUTE_PATH.'images/header_images/'.$row['frame_image'];
   		unlink($UNSET);	
		$query = 'DELETE FROM slider_frames WHERE frame_id="'.$_GET['frame_id'].'"';
		$db->query( $query );
		echo '<script type="text/javascript" language="Javascript">';
   		echo 'window.location= JSRL+"administration/index.php?group=3&module=7&component=2&action=list_frames&slider_id='.$_SESSION['slider_id'].'";';
   		echo '</script>';
	break;
	case 'list_frames':
		$IsForm='true';
		$query = 'SELECT * FROM hero_sliders WHERE slider_id="'.$_GET['slider_id'].'"';
		$slider_data =  mysql_fetch_assoc( $db->query( $query ) );
		$query = 'SELECT * FROM slider_frames WHERE slider_id="'.$slider_data['slider_id'].'" ORDER BY frame_order';
		$result = $db->query( $query );
		echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group=3&module=7&component=2&action=submit_frame_reorder" enctype="multipart/form-data">';
		echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;width:780px;">';
		$i=0;
		while( $row = mysql_fetch_assoc( $result ) ){
			echo '<tr valign="top" style="background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
				echo '<td style="border-top:1px solid #525252;border-right:1px solid #525252;border-left:1px solid #525252;border-bottom:1px solid #525252; padding:5px;">';
					if($slider_data['slider_width']>=600){
						$slider_data['slider_width'] = ($slider_data['slider_width']/2);
						$slider_data['slider_height'] = ($slider_data['slider_height']/2);	
					}
					echo '<img src="'.REGULAR_URL.'images/header_images/'.$row['frame_image'].'" height="'.$slider_data['slider_height'].'" width="'.$slider_data['slider_width'].'" /><br />';
				echo '<br />Frame Text: '.$row['frame_text'];
				echo '</td>';
				echo '<td style="padding-top:5px;border-bottom:1px solid #525252;border-top:1px solid #525252; border-right:1px solid #525252;width:75px;">';
					echo '<center><a href="'.REGULAR_URL.'administration/index.php?group=3&module=7&component=2&action=edit_frame&frame_id='.$row['frame_id'].'" class="edit">&nbsp</a></center><br />';
					echo '<center><p onclick=\'javascript: VerifyDelete("'.REGULAR_URL.'administration/index.php?group=3&module=7&component=2&action=delete_frame&frame_id='.$row['frame_id'].'");\' class="delete">&nbsp;</p></center><br />';
					echo '<center><input style="width:60px;" type="text" id="'.$row['frame_id'].'" name="'.$row['frame_id'].'" value="'.$row['frame_order'].'" /></center>';
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
					echo '<td colspan="2">&nbsp;</td>';
			echo '<tr>';
			$i++;
		}
		echo '</table>';
		$_SESSION['slider_id'] = $slider_data['slider_id'];
	break;
	case 'add_frame_to_slider':
		$IsForm='true';
		echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group=3&module=7&component=2&action=submit_add_frame" enctype="multipart/form-data">';
		echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">';
		echo '<input type="hidden" value="'.$_SESSION['slider_id'].'" name="slider_id" id="slider_id" />';
		echo '<tr>';
		echo '<td style="width:100px;"><label for="frame_image">Frame Image: </label></td>';
		echo '<td><input type="file" name="frame_image" id="frame_image" /></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:100px;"><label for="frame_header">Frame Title: </label></td>';
		echo '<td><input type="text" name="frame_header" id="frame_header" /></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td colspan="2" style="width:100px;"><label for="frame_text">Frame Text: </label></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td colspan="2"><center><textarea name="frame_text" id="frame_text" style="width:765px;"></textarea></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:100px;"><label for="page_link">Page to link to: </label></td>';
		echo '<td>';
		echo '<select name="page_link" id="page_link">';
		echo '<optgroup label="Site Specific Pages">';
		while($pages = mysql_fetch_assoc( $siteSpecificPages )){
			echo '<option value="'.$pages['page_id'].'" '.(($row['page_id']==$pages['page_id'])?'selected=selected':'').'>'.$pages['cms_page_name'].'</option>';
		}
		echo '</optgroup>';
		echo '<optgroup label="Service Specific Pages">';
		while($pages = mysql_fetch_assoc( $serviceSpecificPages )){
			echo '<option value="'.$pages['page_id'].'" '.(($row['page_id']==$pages['page_id'])?'selected=selected':'').'>'.$pages['cms_page_name'].'</option>';
		}
		echo '</optgroup>';
		echo '<optgroup label="Global Pages">';
		while($pages = mysql_fetch_assoc( $globalPages )){
			echo '<option value="'.$pages['page_id'].'" '.(($row['page_id']==$pages['page_id'])?'selected=selected':'').'>'.$pages['cms_page_name'].'</option>';
		}
		echo '</optgroup>';
		echo '</select>';
		echo '</td>';
		echo '</tr>';
		echo '</table>';
	break;
	case 'submit_add_frame':
		$fHandler->upload('frame_image',ABSOLUTE_PATH."images/header_images/");
		$query = 'INSERT INTO slider_frames ( slider_id, frame_image, frame_text, frame_page_link, frame_header ) VALUES ';
		$query .= '( "'.$_SESSION['slider_id'].'", "'.$_FILES['frame_image']['name'].'", "'.mysql_real_escape_string($_POST['frame_text']).'", "'.$_POST['page_link'].'", "'.$_POST['frame_header'].'" )';
		$result = $db->query( $query );
		echo '<script type="text/javascript" language="Javascript">';
   		echo 'window.location= JSRL+"administration/index.php?group=3&module=7&component=2&action=list_frames&slider_id='.$_SESSION['slider_id'].'";';
   		echo '</script>';
	break;
	default:
		$IsForm='false';
		$query = 'SELECT * FROM hero_sliders WHERE site_id="'.$_SESSION['siteData']['site_id'].'" ORDER BY slider_id';
		$result = $db->query( $query );
		echo '<table cellspacing="0" cellpadding="2" class="cms_tabular">';
		echo '<tr class="tr_th_bg">';
			echo '<th style="text-align: center; width: 25px; border-right: 1px dotted rgb(191, 191, 191);text-align:center;">ID</th>';
			echo '<th style="text-align: left; border-right: 1px dotted rgb(191, 191, 191);">Slider Name</th>';
			echo '<th style="text-align: left; border-right: 1px dotted rgb(191, 191, 191);text-align:center;width:100px;">Height</th>';
			echo '<th style="text-align: left; border-right: 1px dotted rgb(191, 191, 191);text-align:center;width:100px;">Width</th>';
			echo '<th style="text-align: left; border-right: 1px dotted rgb(191, 191, 191);width:100px;text-align:center;">&nbsp;Edit Frames</th>';
			echo '<th style="text-align: center; width: 30px; border-right: 1px dotted rgb(191, 191, 191);">Edit</th>';
			echo '<th style="text-align: center; width: 45px;">Delete</th>';
		echo '</tr>';
		while( $row = mysql_fetch_assoc( $result ) ){
			echo '<tr style="background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center>'.$row['slider_id'].'</center></td>';	
				echo '<td style="border-right:1px dotted #BFBFBF;"> '.$row['slider_name'].'</td>';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center>'.$row['slider_height'].'px</center></td>';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center>'.$row['slider_width'].'px</center></td>';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center><a href="'.REGULAR_URL.'administration/index.php?group=3&module=7&component=2&action=list_frames&slider_id='.$row['slider_id'].'" class="button">Edit Frames</a></center></td>';
				echo '<td style="border-right:1px dotted #BFBFBF;"><center><a href="'.REGULAR_URL.'administration/index.php?group=3&module=7&component=1&action=edit&slider_id='.$row['slider_id'].'" class="edit">&nbsp;</a></center></td>';
     			echo '<td style="border-right:1px dotted #BFBFBF;"><center><p onclick=\'javascript: VerifyDelete("'.REGULAR_URL.'administration/index.php?group=3&module=7&component=2&action=delete_slider&slider_id='.$row['slider_id'].'");\' class="delete">&nbsp;</p></center></td>';				
			echo '</tr>';
			$i++;
		}
		echo '</table>';
	break;
}
$opt = Array();
$opt['default']= Array();
$opt['default']['0']['type']='A';
$opt['default']['0']['action']='add_slider';
$opt['default']['0']['text']='Add Hero Slider';
$opt['add_slider']= Array();
$opt['add_slider']['0']['type']='B';
$opt['add_slider']['0']['action']='Submit';
$opt['add_slider']['0']['text']='Add Slider';
$opt['edit_frame']= Array();
$opt['edit_frame']['0']['type']='B';
$opt['edit_frame']['0']['action']='Submit';
$opt['edit_frame']['0']['text']='Update Frame';
$opt['list_frames']= Array();
$opt['list_frames']['0']['type']='A';
$opt['list_frames']['0']['action']='add_frame_to_slider';
$opt['list_frames']['0']['text']='Add a Frame';
$opt['list_frames']['1']['type']='B';
$opt['list_frames']['1']['action']='Submit';
$opt['list_frames']['1']['text']='Re-Order';
$opt['add_frame_to_slider']= Array();
$opt['add_frame_to_slider']['0']['type']='B';
$opt['add_frame_to_slider']['0']['action']='add_frame_to_slider';
$opt['add_frame_to_slider']['0']['text']='Add Frame';
echo $page->buildPageFooter( $IsForm, $opt); 
?>