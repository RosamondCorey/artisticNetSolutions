<?php

$pageName = 'Phone Number Manager';
echo $page->BuildPageHeader( $pageName );
switch($_GET['action']){
 case 'edit':
   $IsForm='true';
   $query = 'SELECT * FROM phone WHERE phone_id="'.$_GET['phoneID'].'"';
   $row = mysql_fetch_assoc( $db->query( $query ) );
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=edit_submit&phoneID='.$row['phone_id'].'">';
   echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="phone_name">Phone Name: </label></td>';
   echo '<td><input type="text" name="phone_name" id="phone_name" value="'.$row['phone_name'].'" /></td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="phone_number">Phone Number: </label></td>';
   echo '<td><input type="text" name="phone_number" id="phone_number" value="'.$row['phone_number'].'" /></td>';
   echo '</tr>';
   echo '</table>';
   break;
 case 'edit_submit':
   $query = 'UPDATE phone SET ';
   $query .= 'phone_name="'.$_POST['phone_name'].'", ';
   $query .= 'phone_number="'.$_POST['phone_number'].'" ';
   $query .= 'WHERE phone_id="'.$_GET['phoneID'].'"';
   $db->query( $query );
   echo '<script type="text/javascript" language="Javascript">';
	echo 'window.location= JSRL+"administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'";';
   echo '</script>';
   break;
 case 'delete';
 $query = 'DELETE FROM phone WHERE phone_id="'.$_GET['phoneID'].'"';
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
   echo '<td style="width:100px;"><label for="phone_name">Phone Name: </label></td>';
   echo '<td><input type="text" name="phone_name" id="phone_name" /></td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="phone_number">Phone Number: </label></td>';
   echo '<td><input type="text" name="phone_number" id="phone_number" /></td>';
   echo '</tr>';
   echo '</table>';
   break;
 case 'add_submit':
   $query = 'INSERT INTO phone ( phone_name, phone_number) VALUES ( "'.$_POST['phone_name'].'", "'.$_POST['phone_number'].'" )';
   $result = $db->query( $query );
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location= JSRL+"administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'";';
   echo '</script>';
   break;
 default:
   $IsForm='true';
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=reorder&phoneID='.$row['county_id'].'">';
   echo '<table cellspacing="0" cellpadding="3" class="cms_tabular">';
   echo '<tr class="tr_th_bg">';
   echo '<th style="border-right:1px dotted #BFBFBF;text-align:left;width:75px;"><center>Phone ID</center></th>';
   echo '<th style="border-right:1px dotted #BFBFBF;text-align:left;width:125px;">Number</th>';
   echo '<th style="border-right:1px dotted #BFBFBF;text-align:left;">Phone Name</th>';
   echo '<th style="border-right:1px dotted #BFBFBF;width:30px;">edit</th>';
   echo '<th style="width:40px;">delete</th>';
   echo '</tr>';
   $i=1;
   $query = 'SELECT * FROM phone ORDER BY phone_id ASC';
   $result = $db->query( $query );
   while( $row = mysql_fetch_assoc( $result ) ){
     echo '<tr style="background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
     echo '<td style="height:22px;border-right:1px dotted #BFBFBF;"><center>'.$row['phone_id'].'</center></td>';
     echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['phone_number'].'</td>';
     echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['phone_name'].'</td>';
     echo '<td style="border-right:1px dotted #BFBFBF;"><center><a href="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=edit&phoneID='.$row['phone_id'].'" class="edit">&nbsp;</a></center></td>';
     echo '<td><center><p onclick=\'javascript: VerifyDelete("'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=delete&phoneID='.$row['phone_id'].'");\' class="delete">&nbsp;</p></center></td>';
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
$opt['default']['0']['text']='Add New Phone Number';
$opt['add']= Array();
$opt['add']['0']['type']='B';
$opt['add']['0']['action']='Submit';
$opt['add']['0']['text']='Add Phone Number';
$opt['edit']= Array();
$opt['edit']['0']['type']='B';
$opt['edit']['0']['action']='Submit';
$opt['edit']['0']['text']='Update Phone Number';
echo $page->buildPageFooter( $IsForm, $opt); 
?>