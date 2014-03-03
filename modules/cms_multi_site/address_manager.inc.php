<?php

$pageName = 'Address Manager';
echo $page->BuildPageHeader( $pageName );
switch($_GET['action']){
 case 'edit':
   $IsForm='true';
   $query = 'SELECT * FROM address WHERE address_id="'.$_GET['addressID'].'"';
   $row = mysql_fetch_assoc( $db->query( $query ) );
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=edit_submit&addressID='.$row['address_id'].'">';
   echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">';
   echo '<tr>';
   echo'<td style="width:100px;"><label for="address_name">Address Name: </label></td>';
   echo '<td><input type="text" name="address_name" id="address_name" value="'.$row['address_name'].'" /></td>';
   echo '</tr>';
   echo '<tr>';
   echo'<td style="width:100px;"><label for="address_line_1">Address Line 1: </label></td>';
   echo '<td><input type="text" name="address_line_1" id="address_line_1" value="'.$row['address_1'].'" /></td>';
   echo '</tr>';
   echo '<tr>';
   echo'<td style="width:100px;"><label for="address_line_2">Address Line 2: </label></td>';
   echo '<td><input type="text" name="address_line_2" id="address_line_2" value="'.$row['address_2'].'" /></td>';
   echo '</tr>';
   echo '</table>';
   break;
 case 'edit_submit':
   $query = 'UPDATE address SET ';
   $query .= 'address_name="'.$_POST['address_name'].'", ';
   $query .= 'address_1="'.$_POST['address_line_1'].'", ';
   $query .= 'address_2="'.$_POST['address_line_2'].'" ';
   echo $query .= 'WHERE address_id="'.$_GET['addressID'].'"';
   $db->query( $query );
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location= JSRL+"administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'";';
   echo '</script>';
   break;
 case 'delete';
 $query = 'DELETE FROM address WHERE address_id="'.$_GET['addressID'].'"';
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
   echo'<td style="width:100px;"><label for="address_name">Address Name: </label></td>';
   echo '<td><input type="text" name="address_name" id="address_name" /></td>';
   echo '</tr>';
   echo '<tr>';
   echo'<td style="width:100px;"><label for="address_line_1">Address Line 1: </label></td>';
   echo '<td><input type="text" name="address_line_1" id="address_line_1" /></td>';
   echo '</tr>';
   echo '<tr>';
   echo'<td style="width:100px;"><label for="address_line_2">Address Line 2: </label></td>';
   echo '<td><input type="text" name="address_line_2" id="address_line_2" /></td>';
   echo '</tr>';
   echo '</table>';
   break;
 case 'add_submit':
   $query = 'INSERT INTO address ( address_name, address_1, address_2 ) VALUES ( "'.$_POST['address_name'].'", "'.$_POST['address_line_1'].'", "'.$_POST['address_line_2'].'" )';
   $result = $db->query( $query );
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location= JSRL+"administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'";';
   echo '</script>';
   break;
 default:
   $IsForm='true';
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=reorder&addressID='.$row['address_id'].'">';
   echo '<table cellspacing="0" cellpadding="3" class="cms_tabular">';
   echo '<tr class="tr_th_bg">';
   echo '<th style="border-right:1px dotted #BFBFBF;text-align:left;width:75px;"><center>ID</center></th>';
   echo '<th style="border-right:1px dotted #BFBFBF;text-align:left;">Address Name</th>';
   echo '<th style="border-right:1px dotted #BFBFBF;width:30px;">edit</th>';
   echo '<th style="width:40px;">delete</th>';
   echo '</tr>';
   $i=1;
   $query = 'SELECT * FROM address ORDER BY address_id ASC';
   $result = $db->query( $query );
   while( $row = mysql_fetch_assoc( $result ) ){
     echo '<tr style="background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
     echo '<td style="height:22px;border-right:1px dotted #BFBFBF;"><center>'.$row['address_id'].'</center></td>';
     echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['address_name'].'</td>';
     echo '<td style="border-right:1px dotted #BFBFBF;"><center><a href="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=edit&addressID='.$row['address_id'].'" class="edit">&nbsp;</a></center></td>';
     echo '<td><center><p onclick=\'javascript: VerifyDelete("'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=delete&addressID='.$row['address_id'].'");\' class="delete">&nbsp;</p></center></td>';
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
$opt['default']['0']['text']='Add New Address';
$opt['add']= Array();
$opt['add']['0']['type']='B';
$opt['add']['0']['action']='Submit';
$opt['add']['0']['text']='Add Address';
$opt['edit']= Array();
$opt['edit']['0']['type']='B';
$opt['edit']['0']['action']='Submit';
$opt['edit']['0']['text']='Update Address';
echo $page->buildPageFooter( $IsForm, $opt); 
?>