<?php

$themeNames = Array();
$query = 'SELECT * FROM theme ORDER BY theme_id ASC';
$result = $db->query( $query );
while( $row = mysql_fetch_assoc( $result ) ){ $themeNames[$row['theme_id']]=$row['theme_name']; }
$pageName = 'Template Manager';
echo $page->BuildPageHeader( $pageName );
switch($_GET['action']){
 case 'edit':
   $IsForm='true';
   $query = 'SELECT * FROM templates WHERE template_id="'.$_GET['templateID'].'"';
   $row = mysql_fetch_assoc( $db->query( $query ) );
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group=1&module=14&component=1&action=edit_submit&templateID='.$row['template_id'].'">';
   echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">';
   echo '<tr>';
   echo'<td style="width:100px;"><label for="template_name">Template Name: </label></td>';
   echo '<td><input type="text" name="template_name" id="template_name" value="'.$row['template_name'].'" /></td>';
   echo '</tr>';
   echo '<tr>';
   echo'<td style="width:100px;"><label for="theme_id">Theme: </label></td>';
   echo '<td><select name="theme_id" id="theme_name">';
   foreach( $themeNames AS $key=>$value ){
     echo '<option value="'.$key.'" '.(($key==$row['theme_id'])?'SELECTED=SELECTED':'').'>'.$value.'</option>';
   }
   echo '</select></td>';
   echo '</tr>';
   echo '<tr>';
   echo'<td style="width:100px;"><label for="template_file">Template File: </label></td>';
   echo '<td><input type="text" name="template_file" id="template_file" value="'.$row['file_name'].'" /></td>';
   echo '</tr>';
   echo '</table>';
   break;
 case 'edit_submit':
   $query = 'UPDATE templates SET ';
   $query .= 'template_name="'.$_POST['template_name'].'", ';
   $query .= 'theme_id="'.$_POST['theme_id'].'", ';
   $query .= 'file_name="'.$_POST['template_file'].'" ';
   $query .= 'WHERE template_id="'.$_GET['templateID'].'"';
   $db->query( $query );
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location= JSRL+"administration/index.php?group=1&module=14&component=1";';
   echo '</script>';
   break;
 case 'delete';
 $query = 'DELETE FROM templates WHERE template_id="'.$_GET['templateID'].'"';
 $db->query( $query );
 echo '<script type="text/javascript" language="Javascript">';
 echo 'window.location= JSRL+"administration/index.php?group=1&module=14&component=1";';
 echo '</script>';
 break;
 case 'add':
   $IsForm='true';
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group=1&module=14&component=1&action=add_submit">';
    echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">';
   echo '<tr>';
   echo'<td style="width:100px;"><label for="template_name">Template Name: </label></td>';
   echo '<td><input type="text" name="template_name" id="template_name" /></td>';
   echo '</tr>';
   echo '<tr>';
   echo'<td style="width:100px;"><label for="theme_id">Theme: </label></td>';
   echo '<td><select name="theme_id" id="theme_name">';
   foreach( $themeNames AS $key=>$value ){
     echo '<option value="'.$key.'">'.$value.'</option>';
   }
   echo '</select></td>';
   echo '</tr>';
   echo '<tr>';
   echo'<td style="width:100px;"><label for="template_file">Template File: </label></td>';
   echo '<td><input type="text" name="template_file" id="template_file" /></td>';
   echo '</tr>';
   echo '</table>';
   break;
 case 'add_submit':
   $query = 'INSERT INTO templates ( template_name, file_name, template_sheet_id, theme_id ) VALUES ( "'.$_POST['template_name'].'", "'.$_POST['template_file'].'", "'.$_POST['theme_id'].'","'.$_POST['theme_id'].'")';
   $result = $db->query( $query );
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location= JSRL+"administration/index.php?group=1&module=14&component=1";';
   echo '</script>';
   break;
 default:
   $IsForm='true';
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group=1&module=14&component=1&action=reorder&cityID='.$row['county_id'].'">';
   echo '<table cellspacing="0" cellpadding="3" class="cms_tabular">';
   echo '<tr class="tr_th_bg">';
   echo '<th style="border-right:1px dotted #BFBFBF;text-align:left;width:75px;"><center>Template ID</center></th>';
   echo '<th style="border-right:1px dotted #BFBFBF;text-align:left;">Theme Name</th>';
   echo '<th style="border-right:1px dotted #BFBFBF;text-align:left;">Template Name</th>';
   echo '<th style="border-right:1px dotted #BFBFBF;width:30px;">edit</th>';
   echo '<th style="width:40px;">delete</th>';
   echo '</tr>';
   $i=1;
   $query = 'SELECT * FROM templates ORDER BY theme_id, template_id ASC';
   $result = $db->query( $query );
   while( $row = mysql_fetch_assoc( $result ) ){
     echo '<tr style="background:'.((is_odd($i))?'#D7FBDF':'000000').'">';
     echo '<td style="height:22px;border-right:1px dotted #BFBFBF;"><center>'.$row['template_id'].'</center></td>';
     echo '<td style="border-right:1px dotted #BFBFBF;">'.$themeNames[$row['theme_id']].'</td>';
     echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['template_name'].'</td>';
     echo '<td style="border-right:1px dotted #BFBFBF;"><center><a href="'.REGULAR_URL.'administration/index.php?group=1&module=14&component=1&action=edit&templateID='.$row['template_id'].'" class="button">edit</a></center></td>';
     echo '<td><center><a href="'.REGULAR_URL.'administration/index.php?group=1&module=14&component=1&action=delete&templateID='.$row['template_id'].'" class="button">delete</a></center></td>';
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
$opt['default']['0']['text']='Add New Template';
$opt['add']= Array();
$opt['add']['0']['type']='B';
$opt['add']['0']['action']='Submit';
$opt['add']['0']['text']='Add Template';
$opt['edit']= Array();
$opt['edit']['0']['type']='B';
$opt['edit']['0']['action']='Submit';
$opt['edit']['0']['text']='Update Template';
echo $page->buildPageFooter( $IsForm, $opt); 
?>