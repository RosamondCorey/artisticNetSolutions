<?php

function services( $id ){
  global $db;
  $query = 'SELECT * FROM services ORDER BY service_id ASC';
  $result = $db->query( $query );
  $option = '';
  $option .= '<option value="0" '.(('0'==$id)?'SELECTED=SELECTED':'').'>Global</option>';
  while( $row = mysql_fetch_array( $result ) ){
    $option .= '<option value="'.$row['service_id'].'" '.(($row['service_id']==$id)?'SELECTED=SELECTED':'').'>'.$row['service_name'].'</option>';
  }
  return $option;
}
$pageName = 'Header Images';
echo $page->BuildPageHeader( $pageName );
if(!isset($_GET['action'])){ $_GET['action']='default'; }
$IsForm='false';
switch($_GET['action']){
 case 'add':
 $IsForm='true';
   //echo ABSOLUTE_PATH;
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group=3&module=7&component=1&action=add_submit" enctype="multipart/form-data">';
   echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="header_name">Header Name: </label></td>';
   echo '<td><input type="text" name="header_name" id="header_name" /></td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td><label for="header_src">Header Image: </label></td>';
   echo '<td>';
   echo '<input type="file" name="header_src" id="header_src" />';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td><label for="service_id">Service: </label>';
   echo '<td><select id="service_id" name="service_id">'.services('0').'</select></td>';
   echo '</tr>';
   echo '</table>';
   break;
 case 'add_submit':
   //print_r($_FILES['header_src']['name']);
   $fHandler->upload('header_src',ABSOLUTE_PATH."images/");
   $q = 'INSERT INTO header_images (header_name, img_src, svc_own) VALUES ("'.$_POST['header_name'].'", "'.$_FILES['header_src']['name'].'","'.$_POST['service_id'].'")';
   $db->query($q);
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location= JSRL+"administration/index.php?group=3&module=7&component=1";';
   echo '</script>';
   break;
 case 'edit':
   $query = 'SELECT * FROM header_images WHERE header_id="'.$_GET['header_id'].'"';
   $result = mysql_fetch_array( $db->query( $query ) );
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group=3&module=7&component=1&action=edit_submit&header_id='.$_GET['header_id'].'" enctype="multipart/form-data">';
   echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="header_name">Header Name: </label></td>';
   echo '<td><input type="text" name="header_name" id="header_name" value="'.$result['header_name'].'"/></td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td><label for="header_src">Header Image: </label></td>';
   echo '<td>';
   echo '<input type="file" name="header_src" id="header_src" />&nbsp;&nbsp;';
   echo '<a href="'.REGULAR_URL.'images/'.$result['img_src'].'" target="_BLANK">View Current</a>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td><label for="service_id">Service: </label>';
   echo '<td><select id="service_id" name="service_id">'.services($result['svc_own']).'</select></td>';
   echo '</tr>';
   echo '</table>';
   break;
 case'edit_submit':
   $query = 'SELECT * FROM header_images WHERE header_id="'.$_GET['header_id'].'"';
   $row = mysql_fetch_assoc($db->query( $query ) );
   $query = 'UPDATE header_images SET header_name="'.$_POST['header_name'].'", svc_own="'.$_POST['service_id'].'" WHERE header_id="'.$_GET['header_id'].'"';
   $db->query($query);
   if(isset($_FILES['header_src'])){
     $UNSET = ABSOLUTE_PATH.'images/'.$row['img_src'];
     unlink($UNSET);
     $fHandler->upload('header_src',ABSOLUTE_PATH."images/");
     $query = 'UPDATE header_images SET img_src="'.$_FILES['header_src']['name'].'" WHERE header_id="'.$_GET['header_id'].'"';
     $db->query($query);
   }
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location= JSRL+"administration/index.php?group=3&module=7&component=1";';
   echo '</script>';
   break;
 case 'delete':
   $query = 'SELECT * FROM header_images WHERE header_id="'.$_GET['header_id'].'"';
   $row = mysql_fetch_assoc($db->query( $query ) );
   $UNSET = ABSOLUTE_PATH.'images/'.$row['img_src'];
   unlink($UNSET);
   $query = 'DELETE FROM header_images WHERE header_id="'.$_GET['header_id'].'"';
   $db->query( $query );
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location= JSRL+"administration/index.php?group=3&module=7&component=1";';
   echo '</script>';
   break;
 default:
   echo '<table cellspacing="0" cellpadding="2" class="cms_tabular">';
   echo '<tr class="tr_th_bg">';
   echo '<th style="text-align: center; width: 25px; border-right: 1px dotted rgb(191, 191, 191);">ID</th>';
   echo '<th style="text-align: left; border-right: 1px dotted rgb(191, 191, 191);">Image Name</th>';
   echo '<th style="text-align: center; width: 30px; border-right: 1px dotted rgb(191, 191, 191);">Edit</th>';
   echo '<th style="text-align: center; width: 45px;">Delete</th>';
   echo '</tr>';
   $i=1;
   $query = 'SELECT * FROM header_images';
   $result = $db->query( $query );
   while( $row = mysql_fetch_assoc( $result ) ){
     echo '<tr style="background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
     echo '<td style="height:24px; border-right:1px dotted #BFBFBF;">'.$row['header_id'].'</td>';
     echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['header_name'].'</td>';
     echo '<td style="border-right:1px dotted #BFBFBF;"><center><a href="'.REGULAR_URL.'administration/index.php?group=3&module=7&component=1&action=edit&header_id='.$row['header_id'].'" class="edit">&nbsp;</a></center></td>';
     echo '<td><center><p onclick=\'javascript: VerifyDelete("'.REGULAR_URL.'administration/index.php?group=3&module=7&component=1&action=delete&header_id='.$row['header_id'].'");\' class="delete">&nbsp;</p></center></td>';
     echo '</tr>';
     $i++;
   }
   echo '</table>';
   break;
 }
$opt = Array();
$opt['default']= Array();
$opt['default']['0']['type']='A';
$opt['default']['0']['action']='add';
$opt['default']['0']['text']='Add New Header Image';
$opt['add']= Array();
$opt['add']['0']['type']='B';
$opt['add']['0']['action']='Submit';
$opt['add']['0']['text']='Add Header Image';
$opt['edit']= Array();
$opt['edit']['0']['type']='B';
$opt['edit']['0']['action']='Submit';
$opt['edit']['0']['text']='Update Header Image';
echo $page->buildPageFooter( $IsForm, $opt); 
?>
