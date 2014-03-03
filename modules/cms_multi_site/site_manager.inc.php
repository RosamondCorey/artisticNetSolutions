<?php

function theme( $id ){
  global $db;
  $query = 'SELECT * FROM theme ORDER BY theme_id ASC';
  $result = $db->query( $query );
  $option = '';
  while( $row = mysql_fetch_array( $result ) ){
    $option .= '<option value="'.$row['theme_id'].'" '.(($row['theme_id']==$id)?'SELECTED=SELECTED':'').'>'.$row['theme_name'].'</option>';
  }
  return $option;
}
function services( $id ){
  global $db;
  $query = 'SELECT * FROM services ORDER BY service_id ASC';
  $result = $db->query( $query );
  $option = '';
  while( $row = mysql_fetch_array( $result ) ){
    $option .= '<option value="'.$row['service_id'].'" '.(($row['service_id']==$id)?'SELECTED=SELECTED':'').'>'.$row['service_name'].'</option>';
  }
  return $option;
}
function addy( $id ){
  global $db;
  $query = 'SELECT * FROM address ORDER BY address_id ASC';
  $result = $db->query( $query );
  $option = '';
  while( $row = mysql_fetch_array( $result ) ){
    $option .= '<option value="'.$row['address_id'].'" '.(($row['address_id']==$id)?'SELECTED=SELECTED':'').'>'.$row['address_name'].'</option>';
  }
  return $option;
}
function county( $id ){
  global $db;
  $query = 'SELECT * FROM county ORDER BY county_id ASC';
  $result = $db->query( $query );
  $option = '';
  while( $row = mysql_fetch_array( $result ) ){
    $option .= '<option value="'.$row['county_id'].'" '.(($row['county_id']==$id)?'SELECTED=SELECTED':'').'>'.$row['county_name'].'</option>';
  }
  return $option;
}
function city( $id ){
  global $db;
  $option = '';
  $query = 'SELECT * FROM county ORDER BY county_id ASC';
  $result = $db->query( $query );
  while( $row = mysql_fetch_assoc( $result ) ){
    $option .= '<optgroup label="'.$row['county_name'].'">';
    $query2 = 'SELECT * FROM city WHERE county_id="'.$row['county_id'].'" ORDER BY city_id ASC';
    $result2 = $db->query( $query2 );
    while( $row2 = mysql_fetch_assoc( $result2 ) ){
      $option .= '<option value="'.$row2['city_id'].'" '.(($row2['city_id']==$id)?'SELECTED=SELECTED':'').'>'.$row2['city_name'].'</option>';
    }
    $option .= '</optgroup>';
  }
  return $option;
}
function phone( $id ){
  global $db;
  $query = 'SELECT * FROM phone ORDER BY phone_id ASC';
  $result = $db->query( $query );
  $option = '';
  while( $row = mysql_fetch_array( $result ) ){
    $option .= '<option value="'.$row['phone_id'].'" '.(($row['phone_id']==$id)?'SELECTED=SELECTED':'').'>'.$row['phone_name'].'</option>';
  }
  return $option;
}
$pageName = 'Site Manager';
echo $page->BuildPageHeader( $pageName );
$IsForm='false';
if(!isset($_GET['action'])){ $_GET['action']='default'; }
switch($_GET['action']){
 case 'edit':
   $IsForm='true';
   $query = 'SELECT * FROM site WHERE site_id="'.$_GET['siteID'].'"';
   $row = mysql_fetch_assoc( $db->query( $query ) );
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=edit_submit&siteID='.$row['site_id'].'">';
   echo '<input type="hidden" id="old_svc_id" name="old_svc_id" value="'.$row['service_id'].'" />';
   echo '<input type="hidden" id="old_theme_id" name="old_theme_id" value="'.$row['theme_id'].'" />';
   echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="site_name">Site Name: </label></td>';
   echo '<td><input type="text" name="site_name" id="site_name" value="'.$row['site_name'].'" /></td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="site_url">Site URL: </label></td>';
   echo '<td><input type="text" name="site_url" id="site_url" value="'.$row['site_url'].'" /></td>';
   echo '</tr>';
   
   echo '<tr>';
   echo '<td style="width:100px;"><label for="county_id">County: </label></td>';
   echo '<td>';
   echo '<select name="county_id" id="county_id">';
   echo county($row['county_id']); 
   echo '</select>'; 
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="city_id">City: </label></td>';
   echo '<td>';
   echo '<select name="city_id" id="city_id">';
   echo city($row['city_id']); 
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="phone_id">Phone: </label></td>';
   echo '<td>';
   echo '<select name="phone_id" id="phone_id">';
   echo phone($row['phone_id']); 
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="address_id">Address: </label></td>';
   echo '</td>';
   echo '<td>';
   echo '<select name="address_id" name="address_id">';
   echo addy($row['address_id']);
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="service_type">Service Type: </label>';
   echo '</td>';
   echo '<td>';
   echo '<select name="service_type" id="service_type">';
   echo services($row['service_id']);
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="theme_id">Theme: </label>';
   echo '</td>';
   echo '<td>';
   echo '<select name="theme_id" id="theme_id">';
   echo theme($row['theme_id']);
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="gmapapi">GMaps API</lable></td>';
   echo '<td><input type="text" name="gmapapi" id="gmapapi" value="'.$row['gmapapi'].'" style="width:650px;" /></td>';
   echo '</tr>';
   echo '</table>';
   break;
 case 'edit_submit':
   $query = 'UPDATE site SET ';
   $query .= 'site_name="'.$_POST['site_name'].'", ';
   $query .= 'site_url="'.$_POST['site_url'].'", ';
   $query .= 'county_id="'.$_POST['county_id'].'", ';
   $query .= 'city_id="'.$_POST['city_id'].'", ';
   $query .= 'address_id="'.$_POST['address_id'].'", ';
   $query .= 'service_id="'.$_POST['service_type'].'", ';
   $query .= 'theme_id="'.$_POST['theme_id'].'", ';
   $query .= 'gmapapi="'.$_POST['gmapapi'].'", ';
   $query .= 'phone_id="'.$_POST['phone_id'].'" ';
   $query .= 'WHERE site_id="'.$_GET['siteID'].'"';
   //echo  $query;
   $db->query( $query );
   if($_POST['old_svc_id']!=$_POST['service_type']){
     // Switch SCV Code here
	 
   }
   if($_POST['old_theme_id']!=$_POST['theme_id']){
     $query = 'SELECT * FROM pages WHERE site_id="'.$_GET['siteID'].'"';
     $result = $db->query( $query );
     while( $row = mysql_fetch_assoc( $result ) ){
       $query = 'SELECT template_type FROM templates WHERE template_id="'.$row['template_id'].'"';
       $res = mysql_fetch_array( $db->query( $query ) );
       $query = 'SELECT template_id from templates WHERE template_type="'.$res['template_type'].'" AND theme_id="'.$_POST['theme_id'].'"';
       $res = mysql_fetch_array( $db->query( $query ) );
       $query = 'UPDATE pages SET template_id="'.$res['template_id'].'" WHERE page_id="'.$row['page_id'].'"';
       $db->query( $query );
     }
   }
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location= JSRL+"administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'";';
   echo '</script>';
   break;
 case 'delete':
   echo 'Disabled due to lack of structure.';
   break;
 case 'add':
   $IsForm='true';
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=add_submit">';
   echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="site_name">Site Name: </label></td>';
   echo '<td><input type="text" name="site_name" id="site_name" /></td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="site_url">Site URL: </label></td>';
   echo '<td><input type="text" name="site_url" id="site_url" /></td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="county_id">County: </label></td>';
   echo '<td>';
   echo '<select name="county_id" id="county_id">';
   echo county('0'); 								
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="city_id">City: </label></td>';
   echo '<td>';
   echo '<select name="city_id" id="city_id">';
   echo city('0'); 
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="phone_id">Phone: </label></td>';
   echo '<td>';
   echo '<select name="phone_id" id="phone_id">';
   echo phone('0');
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="address_id">Address: </label>';
   echo '<td>';
   echo '<select name="address_id" name="address_id">';
   echo addy('0');
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="service_type">Service Type: </label>';
   echo '</td>';
   echo '<td>';
   echo '<select name="service_type" id="service_type">';
   echo services('0');
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="theme_id">Theme: </label>';
   echo '</td>';
   echo '<td>';
   echo '<select name="theme_id" id="theme_id">';
   echo theme($row['theme_id']);
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><lable for="gmapapi">GMap API</lable></td>';
   echo '<td><input type="text" name="gmapapi" id="gmapapi" /></td>';
   echo '<tr>';
   echo '</table>';
   break;
 case 'add_submit':
  echo  $query = 'INSERT INTO site ( `site_name`, `site_url`, `county_id`, `city_id`, `phone_id`, `address_id`, `service_id`, `theme_id`, `gmapapi` ) VALUES ( "'.$_POST['site_name'].'", "'.$_POST['site_url'].'", "'.$_POST['county_id'].'", "'.$_POST['city_id'].'", "'.$_POST['phone_id'].'", "'.$_POST['address_id'].'", "'.$_POST['service_type'].'", "'.$_POST['theme_id'].'", "'.$_POST['gmapapi'].'" )';
   $db->query( $query );
   $query = 'SELECT * FROM site WHERE site_url="'.$_POST['site_url'].'"';
   $row = mysql_fetch_assoc( $db->query( $query ) );
   // Making home page
   $query = 'INSERT INTO pages ( template_id, page_type, cms_page_name, header_image, page_scope, site_id, service_id, isindex ) VALUES (
"'.$themeTemplates[$_POST['theme_id']]['i'].'", "1", "Index Page", "NULL" , "N", "'.$row['site_id'].'", "'.$_POST['service_type'].'", "Y" )';
   $db->query( $query );
   $last = mysql_fetch_assoc( $db->query( 'SELECT MAX(page_id) as ID FROM pages' ) );
   $last = $last['ID'];
   $query = 'INSERT INTO page_meta (page_id, title, keywords, description, nofollow ) VALUES (
"'.$last.'", "Temporary Title", "Temporary Keywords", "Temporary Description", "N")';
   $db->query( $query );
   $query = 'INSERT INTO content_area ( page_id, content, header ) VALUES ( "'.$last.'", "Temporary Content", "Temporary Header")';
   $db->query( $query );
   $homePage = $last;
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location= JSRL+"administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'";';
   echo '</script>';
   break;
 default:
	if(!isset($row['county_id'])){ $row['county_id']='NULL'; }
	echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=reorder&cityID='.$row['county_id'].'">';
   echo '<table cellspacing="0" cellpadding="3" class="cms_tabular">';
   echo '<tr class="tr_th_bg">';
   echo '<th style="border-right:1px dotted #BFBFBF;text-align:left;width:75px;"><center>Site ID</center></th>';
   echo '<th style="border-right:1px dotted #BFBFBF;text-align:left;">Site URL</th>';
   echo '<th style="border-right:1px dotted #BFBFBF;text-align:left;width:200px;">Site Name</th>';
   echo '<th style="border-right:1px dotted #BFBFBF;width:30px;">edit</th>';
   echo '<th style="width:40px;">delete</th>';
   echo '</tr>';
   $i=1;
   $query = 'SELECT * FROM site ORDER BY site_id ASC';
   $result = $db->query( $query );
   while( $row = mysql_fetch_assoc( $result ) ){
     echo '<tr style="background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
     echo '<td style="height:22px;border-right:1px dotted #BFBFBF;"><center>'.$row['site_id'].'</center></td>';
     echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['site_url'].'</td>';
     echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['site_name'].'</td>';
     echo '<td style="border-right:1px dotted #BFBFBF;"><center><a href="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=edit&siteID='.$row['site_id'].'" class="edit">&nbsp;</a></center></td>';
     echo '<td><center><p onclick=\'javascript: VerifyDelete("'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=delete&cityID='.$row['site_id'].'");\' class="delete">&nbsp;</p></center></td>';
     echo '</tr>'; 
     $i++;
   }
   echo '<tr>';
   echo '</table>';
   break;
 }
$opt = Array();
$opt['default']= Array();
$opt['default']['0']['type']='A';
$opt['default']['0']['action']='add';
$opt['default']['0']['text']='Add New Site';
$opt['add']= Array();
$opt['add']['0']['type']='B';
$opt['add']['0']['action']='Submit';
$opt['add']['0']['text']='Add Site';
$opt['edit']= Array();
$opt['edit']['0']['type']='B';
$opt['edit']['0']['action']='Submit';
$opt['edit']['0']['text']='Update Site';
echo $page->buildPageFooter( $IsForm, $opt); 
?>
