<?php

$pageName = 'County Manager';
echo $page->BuildPageHeader( $pageName );  
switch($_GET['action']){
 case 'edit':
   $IsForm='true';
   $query = 'SELECT * FROM county WHERE county_id="'.$_GET['countyID'].'"';
   $row = mysql_fetch_assoc( $db->query( $query ) );
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=edit_submit&countyID='.$row['county_id'].'">';
   echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="county_name">County Name: </label></td>';
   echo '<td><input type="text" name="county_name" id="county_name" value="'.$row['county_name'].'" /></td>';
   echo '</tr>';
   echo '</table>';
   break;
 case 'edit_submit':
   $query = 'UPDATE county SET ';
   $query .= 'county_name="'.$_POST['county_name'].'" ';
   $query .= 'WHERE county_id="'.$_GET['countyID'].'"';
   $db->query( $query );
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location= JSRL+"administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'";';
   echo '</script>';
   break;
 case 'delete';
 $query = 'DELETE FROM county WHERE county_id="'.$_GET['countyID'].'"';
 $db->query( $query );
 echo '<script type="text/javascript" language="Javascript">';
 echo 'window.location= JSRL+"administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'";';
 echo '</script>';
 break;
 case 'add':
   $IsForm='true';
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=add_submit">';
   echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="county_name">County Name: </label></td>';
   echo '<td><input type="text" name="county_name" id="county_name" /></td>';
   echo '</tr>';
   echo '</table>';
   break;
 case 'add_submit':
   $query = 'INSERT INTO county ( county_name ) VALUES ( "'.$_POST['county_name'].'" )';
   $result = $db->query( $query );
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location= JSRL+"administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'";';
   echo '</script>';
   break;
 default:
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=reorder&countyID='.$row['county_id'].'">';
   echo '<table cellspacing="0" cellpadding="3" class="cms_tabular">';
   echo '<tr class="tr_th_bg">';
   echo '<th style="border-right:1px dotted #BFBFBF;text-align:left;width:75px;">County ID</th>';
   echo '<th style="border-right:1px dotted #BFBFBF;text-align:left;">County Name</th>';
   echo '<th style="border-right:1px dotted #BFBFBF;width:30px;">edit</th>';
   echo '<th style="width:40px;">delete</th>';
   echo '</tr>';
   $i=1;
   $query = 'SELECT * FROM county ORDER BY county_id ASC';
   $result = $db->query( $query );
   while( $row = mysql_fetch_assoc( $result ) ){
     echo '<tr style="background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
     echo '<td style="height:22px;border-right:1px dotted #BFBFBF;"><center>'.$row['county_id'].'</center></td>';
     echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['county_name'].'</td>';
     echo '<td style="border-right:1px dotted #BFBFBF;"><center><a href="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=edit&countyID='.$row['county_id'].'" class="edit">&nbsp;</a></center></td>';
     echo '<td><center><p onclick=\'javascript: VerifyDelete("'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=delete&countyID='.$row['county_id'].'");\' class="delete">&nbsp;</p></center></td>';
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
$opt['default']['0']['text']='Add New County';
$opt['add']= Array();
$opt['add']['0']['type']='B';
$opt['add']['0']['action']='Submit';
$opt['add']['0']['text']='Add County';
$opt['edit']= Array();
$opt['edit']['0']['type']='B';
$opt['edit']['0']['action']='Submit';
$opt['edit']['0']['text']='Update County';
echo $page->buildPageFooter( $IsForm, $opt); 
?>