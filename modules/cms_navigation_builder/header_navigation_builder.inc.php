<?php

$linkTypes = Array('P'=>'.php format','H'=>'.html format','F'=>'folder format');
$httpTypes = Array('D'=>'Normal','S'=>'Secure');
$pageNames = Array();
//print_r($_SESSION);
// Pages
$siteSpecificPages = $db->query('SELECT * FROM pages WHERE  site_id="'.$_SESSION['siteData']['site_id'].'"');
$globalPages = $db->query('SELECT * FROM pages WHERE page_scope IN("P") AND site_id="0" AND service_id="1"');
$serviceSpecificPages = $db->query( 'SELECT * FROM pages WHERE service_id="'.$_SESSION['siteData']['service_id'].'" and page_scope NOT IN("P","N")' );
// End pages
$query = 'SELECT class_id, class_name FROM button_class WHERE class_owner="H"';
$result = $db->query( $query );
$buttonClass[0]="Default";
while( $row = mysql_fetch_assoc( $result ) ){ $buttonClass[$row['class_id']]=$row['class_name']; }
$pageName = 'Header Navigation Builder';
echo $page->BuildPageHeader( $pageName );
if(!isset($_GET['action'])){ $_GET['action']='default'; }
$IsForm='false';
switch($_GET['action']){
  // START EDIT CODE
 case 'edit':
   $IsForm='true';
   $query = 'SELECT * FROM navigation WHERE button_id="'.$_GET['buttonID'].'" AND site_id="'.$_SESSION['siteData']['site_id'].'"';
   $row = mysql_fetch_assoc( $db->query( $query ) );
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group=3&module=3&component=1&action=edit_submit&buttonID='.$row['button_id'].'">';
   echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="display_text">Display Text: </label></td>';
   echo '<td><input type="text" name="display_text" id="display_text" value="'.$row['display_text'].'" /></td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td><label for="button_class">Button Class: </label></td>';
   echo '<td>';
   echo '<select name="button_class" id="button_class">';
   foreach($buttonClass as $key => $value){
     echo '<option value="'.$key.'" '.(($key==$row['button_class'])?'SELECTED=SELECTED':'').'>'.$value.'</option>';
   }
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td><label for="page_id">Page ID: </label></td>';
   echo '<td>';
   echo '<select name="page_id" id="page_id">';
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
   // END EDIT CODE
 case 'edit_submit':
   $query = 'UPDATE navigation SET ';
   $query .= 'display_text="'.$_POST['display_text'].'", ';
   $query .= 'link_format="P", ';
   $query .= 'page_id="'.$_POST['page_id'].'", ';
   $query .= 'button_class="'.$_POST['button_class'].'", ';
   $query .= 'http_type="D" ';
   $query .= 'WHERE button_id="'.$_GET['buttonID'].'"';
   $query .= ' AND site_id="'.$_SESSION['siteData']['site_id'].'"';
   $db->query( $query );
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location = JSRL+"administration/index.php?group=3&module=3&component=1";';
   echo '</script>';
   break;
 case 'delete';
 $query = 'SELECT * FROM navigation WHERE button_id="'.$_GET['buttonID'].'" AND site_id="'.$_SESSION['siteData']['site_id'].'"';
 $result = mysql_fetch_assoc( $db->query( $query ) );
 $query = 'DELETE FROM htacces_entrys WHERE access_entry="'.$result['access_id'].'" AND site_id="'.$_SESSION['siteData']['site_id'].'"';
 $db->query( $query );
 $query = 'DELETE FROM navigation WHERE button_id="'.$_GET['buttonID'].'" AND site_id="'.$_SESSION['siteData']['site_id'].'"';
 $db->query( $query );
 ?>
   <script type="text/javascript" language="Javascript">
      window.location= JSRL+"administration/index.php?group=3&module=3&component=1";
 </script>
     <?php 
     break;
 case 'add':
   $IsForm='true';
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group=3&module=3&component=1&action=add_submit">';
   echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="display_text">Display Text: </label></td>';
   echo '<td><input type="text" name="display_text" id="display_text" /></td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td><label for="button_class">Button Class: </label></td>';
   echo '<td>';
   echo '<select name="button_class" id="button_class">';
   foreach($buttonClass as $key => $value){
     echo '<option value="'.$key.'">'.$value.'</option>';
   }
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td><label for="link_format">Link Format: </label></td>';
   echo '<td>';
   echo '<select name="link_format" id="link_format">';
   foreach($linkTypes as $key => $value){
     echo '<option value="'.$key.'">'.$value.'</option>';
   }
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td><label for="page_id">Page ID: </label></td>';
   echo '<td>';
    echo '<select name="page_id" id="page_id">';
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
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td><label for="http_type">Http Type: </label></td>';
   echo '<td>';
   echo '<select name="http_type" id="http_type">';
   foreach($httpTypes as $key => $value){
     echo '<option value="'.$key.'">'.$value.'</option>';
   }
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '</table>';
   break;
 case 'add_submit':
   $query = 'SELECT MAX(display_order) as num FROM navigation';
   $row = mysql_fetch_assoc( $db->query( $query ) );
   $query = 'INSERT INTO navigation ( display_text, link_format, page_id, display_order, http_type, navigation, button_class, site_id) VALUES (';
   $query .= '"'.$_POST['display_text'].'","'.$_POST['link_format'].'","'.$_POST['page_id'].'","'.($row['num']+1).'","'.$_POST['http_type'].'","H", "'.$_POST['button_class'].'", "'.$_SESSION['siteData']['site_id'].'" )';
   $db->query( $query );
   ?>
     <script type="text/javascript" language="Javascript">
	window.location= JSRL+"administration/index.php?group=3&module=3&component=1";
   </script>
       <?php 
       break;
 case 'reorder':
   foreach( $_POST as $key => $value){
     $query = 'UPDATE navigation SET display_order="'.$value.'" WHERE button_id="'.$key.'" AND site_id="'.$_SESSION['siteData']['site_id'].'"';
     $db->query( $query );
     $htaccess->updateHtaccess();
   }
   ?>
     
       <?php
       break;
 default:
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group=3&module=3&component=1&action=reorder&buttonID='.$row['button_id'].'">';
   echo '<table cellspacing="0" cellpadding="3" class="cms_tabular">';
   echo '<tr class="tr_th_bg">';
   echo '<th style="border-right:1px solid #c6c6c6;text-align:left;width:150px;">Display Text</th>';
   echo '<th style="border-right:1px solid #c6c6c6;text-align:left;width:100px;">Link Format</th>';
   echo '<th style="border-right:1px solid #c6c6c6;text-align:left;width:100px;">HTTP Type</th>';
   echo '<th style="border-right:1px solid #c6c6c6;text-align:left;width:100px;">Button Class</th>';
   echo '<th style="border-right:1px solid #c6c6c6;text-align:left;">Page Name</th>';
   echo '<th style="border-right:1px solid #c6c6c6;text-align:center;width:50px;">Order</th>';
   echo '<th style="border-right:1px solid #c6c6c6;width:30px;">Edit</th>';
   echo '<th style="width:40px;">Delete</th>';
   echo '</tr>';
   $i=1;
   $query = 'SELECT * FROM pages WHERE site_id IN("'.$_SESSION['siteData']['site_id'].'","0")';
   $result = $db->query( $query );
   $pageNames = Array();
   while($row = mysql_fetch_assoc( $result ) ){ $pageNames[$row['page_id']] = $row['cms_page_name']; }
   $query = 'SELECT * FROM navigation WHERE navigation="H" AND site_id="'.$_SESSION['siteData']['site_id'].'" ORDER BY display_order ASC';
   $result = $db->query( $query );
   while( $row = mysql_fetch_assoc( $result ) ){
     echo '<tr style="background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
     echo '<td style="border-right:1px solid #c6c6c6;">'.$row['display_text'].'</td>';
     echo '<td style="border-right:1px solid #c6c6c6;">'.$linkTypes[$row['link_format']].'</td>';
     echo '<td style="border-right:1px solid #c6c6c6;">'.$httpTypes[$row['http_type']].'</td>';
     echo '<td style="border-right:1px solid #c6c6c6;">'.$buttonClass[$row['button_class']].'</td>';
     echo '<td style="border-right:1px solid #c6c6c6;">'.$pageNames[$row['page_id']].'</td>';
     echo '<td style="border-right:1px solid #c6c6c6;"><center><input type="text" name="'.$row['button_id'].'" id="'.$row['button_id'].'" value="'.$row['display_order'].'" style="width:25px;"/></td>';
   echo '<td style="border-right:1px solid #c6c6c6;"><center><a href="'.REGULAR_URL.'administration/index.php?group=3&module=3&component=1&action=edit&buttonID='.$row['button_id'].'" class="edit">&nbsp;</a></center></td>';
   echo '<td><center><p onclick=\'javascript: VerifyDelete("'.REGULAR_URL.'administration/index.php?group=3&module=3&component=1&action=delete&buttonID='.$row['button_id'].'");\' class="delete">&nbsp</p></center></td>';
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
$opt['default']['0']['text']='Add New Navigation Button';
$opt['default']['1']['type']='B';
$opt['default']['1']['action']='Submit';
$opt['default']['1']['text']='Re-Order';
$opt['add']= Array();
$opt['add']['0']['type']='B';
$opt['add']['0']['action']='Submit';
$opt['add']['0']['text']='Add Navigation Button';
$opt['edit']= Array();
$opt['edit']['0']['type']='B';
$opt['edit']['0']['action']='Submit';
$opt['edit']['0']['text']='Update Navigation Button';
echo $page->buildPageFooter( $IsForm, $opt); 
?>