<?php

$pageName = 'Theme Manager';
echo $page->BuildPageHeader( $pageName );
switch($_GET['action']){
 case 'edit':
   $IsForm='true';
   $query = 'SELECT * FROM theme WHERE theme_id="'.$_GET['themeID'].'"';
   $row = mysql_fetch_assoc( $db->query( $query ) );
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group=1&module=14&component=2&action=edit_submit&themeID='.$row['theme_id'].'">';
   echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">';
   echo '<tr>';
   echo'<td style="width:100px;"><label for="theme_name">Theme Name: </label></td>';
   echo '<td><input type="text" name="theme_name" id="theme_name" value="'.$row['theme_name'].'" /></td>';
   echo '</tr>';
   echo '</table>';
   break;
 case 'edit_submit':
   $query = 'UPDATE theme SET ';
   $query .= 'theme_name="'.$_POST['theme_name'].'" ';
   $query .= 'WHERE theme_id="'.$_GET['themeID'].'"';
   $db->query( $query );
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location= JSRL+"administration/index.php?group=1&module=14&component=2";';
   echo '</script>';
   break;
 case 'delete';
 $query = 'DELETE FROM theme WHERE theme_id="'.$_GET['themeID'].'"';
 $db->query( $query );
 echo '<script type="text/javascript" language="Javascript">';
 echo 'window.location= JSRL+"administration/index.php?group=1&module=14&component=2";';
 echo '</script>';
 break;
 case 'add':
   $IsForm='true';
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group=1&module=14&component=2&action=add_submit">';
   echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="theme_name">Theme Name: </label></td>';
   echo '<td><input type="text" name="theme_name" id="theme_name" /></td>';
   echo '</tr>';
   echo '</table>';
   break;
 case 'add_submit':
   $query = 'INSERT INTO theme ( theme_name ) VALUES ( "'.$_POST['theme_name'].'")';
   $result = $db->query( $query );
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location= JSRL+"administration/index.php?group=1&module=14&component=2";';
   echo '</script>';
   break;
 default:
   $IsForm='true';
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group=1&module=14&component=2&action=reorder&cityID='.$row['county_id'].'">';
   echo '<table cellspacing="0" cellpadding="3" class="cms_tabular">';
   echo '<tr class="tr_th_bg">';
   echo '<th style="border-right:1px dotted #BFBFBF;text-align:left;width:75px;"><center>Theme ID</center></th>';
   echo '<th style="border-right:1px dotted #BFBFBF;text-align:left;">Theme Name</th>';
   echo '<th style="border-right:1px dotted #BFBFBF;width:30px;">edit</th>';
   echo '<th style="width:40px;">delete</th>';
   echo '</tr>';
   $i=1;
   $query = 'SELECT * FROM theme ORDER BY theme_id ASC';
   $result = $db->query( $query );
   while( $row = mysql_fetch_assoc( $result ) ){
     echo '<tr style="background:'.((is_odd($i))?'#D7FBDF':'000000').'">';
     echo '<td style="height:22px;border-right:1px dotted #BFBFBF;"><center>'.$row['theme_id'].'</center></td>';
     echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['theme_name'].'</td>';
     echo '<td style="border-right:1px dotted #BFBFBF;"><center><a href="'.REGULAR_URL.'administration/index.php?group=1&module=14&component=2&action=edit&themeID='.$row['theme_id'].'" class="button">edit</a></center></td>';
     echo '<td><center><a href="'.REGULAR_URL.'administration/index.php?group=1&module=14&component=2&action=delete&themeID='.$row['theme_id'].'" class="button">delete</a></center></td>';
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
$opt['default']['0']['text']='Add New Theme';
$opt['add']= Array();
$opt['add']['0']['type']='B';
$opt['add']['0']['action']='Submit';
$opt['add']['0']['text']='Add Theme';
$opt['edit']= Array();
$opt['edit']['0']['type']='B';
$opt['edit']['0']['action']='Submit';
$opt['edit']['0']['text']='Update Theme';
echo $page->buildPageFooter( $IsForm, $opt); 
?>