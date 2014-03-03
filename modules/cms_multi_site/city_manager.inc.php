<?php

$countyNames = Array();
$query = 'SELECT * FROM county ORDER BY county_id ASC';
$result = $db->query( $query );
while( $row = mysql_fetch_assoc( $result ) ){ $countyNames[$row['county_id']]=$row['county_name']; }
$pageName = 'City Manager';
echo $page->BuildPageHeader( $pageName );
switch($_GET['action']){
 case 'edit':
   $IsForm='true';
   $query = 'SELECT * FROM city WHERE city_id="'.$_GET['cityID'].'"';
   $row = mysql_fetch_assoc( $db->query( $query ) );
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=edit_submit&cityID='.$row['city_id'].'">';
   echo '<table cellspacing="0" cellpadding="1" class="cms_tabular" style="padding:10px 0px 10px 10px;">';
   echo '<tr>';
   echo'<td style="width:100px;"><label for="city_name">City Name: </label></td>';
   echo '<td><input type="text" name="city_name" id="city_name" value="'.$row['city_name'].'" /></td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="county_id">County: </label></td>';
   echo '<td><select name="county_id" id="county_id">';
   foreach($countyNames AS $key=>$value){ 
     echo '<option value="'.$key.'" '.(($key==$row['county_id'])?'SELECTED=SELECTED':'').'>'.$value.'</option>'; 
   } 
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '</table>';
   break;
 case 'edit_submit':
   $query = 'UPDATE city SET ';
   $query .= 'city_name="'.$_POST['city_name'].'", ';
   $query .= 'county_id="'.$_POST['county_id'].'" ';
   $query .= 'WHERE city_id="'.$_GET['cityID'].'"';
   $db->query( $query );
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location= JSRL+"administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'";';
   echo '</script>';
   break;
 case 'delete';
 $query = 'DELETE FROM city WHERE city_id="'.$_GET['cityID'].'"';
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
   echo '<td style="width:100px;"><label for="city_name">City Name: </label></td>';
   echo '<td><input type="text" name="city_name" id="city_name" /></td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="county_id">County: </label></td>';
   echo '<td><select name="county_id" id="county_id">';
   foreach($countyNames AS $key=>$value){ 
     echo '<option value="'.$key.'">'.$value.'</option>'; 
   }
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '</table>';
   break;
 case 'add_submit':
   $query = 'INSERT INTO city ( city_name, county_id ) VALUES ( "'.$_POST['city_name'].'", "'.$_POST['county_id'].'")';
   $result = $db->query( $query );
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location= JSRL+"administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'";';
   echo '</script>';
   break;
 default:
   $IsForm='true';
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=reorder&cityID='.$row['county_id'].'">';
   echo '<table cellspacing="0" cellpadding="3" class="cms_tabular">';
   echo '<tr class="tr_th_bg">';
   echo '<th style="border-right:1px dotted #BFBFBF;text-align:left;width:75px;"><center>City ID</center></th>';
   echo '<th style="border-right:1px dotted #BFBFBF;text-align:left;">City Name</th>';
   echo '<th style="border-right:1px dotted #BFBFBF;text-align:left;width:200px;">County</th>';
   echo '<th style="border-right:1px dotted #BFBFBF;width:30px;">edit</th>';
   echo '<th style="width:40px;">delete</th>';
   echo '</tr>';
   $i=1;
   $query = 'SELECT * FROM city ORDER BY county_id ASC';
   $result = $db->query( $query );
   while( $row = mysql_fetch_assoc( $result ) ){
     echo '<tr style="background:'.((is_odd($i))?'#f4f4f4':'000000').'">';
     echo '<td style="height:22px;border-right:1px dotted #BFBFBF;"><center>'.$row['city_id'].'</center></td>';
     echo '<td style="border-right:1px dotted #BFBFBF;">'.$row['city_name'].'</td>';
     echo '<td style="border-right:1px dotted #BFBFBF;">'.$countyNames[$row['county_id']].'</td>';
     echo '<td style="border-right:1px dotted #BFBFBF;"><center><a href="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=edit&cityID='.$row['city_id'].'" class="edit">&nbsp;</a></center></td>';
     echo '<td><center><p onclick=\'javascript: VerifyDelete("'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=delete&cityID='.$row['city_id'].'");\' class="delete">&nbsp;</p></center></td>';
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
$opt['default']['0']['text']='Add New City';
$opt['add']= Array();
$opt['add']['0']['type']='B';
$opt['add']['0']['action']='Submit';
$opt['add']['0']['text']='Add City';
$opt['edit']= Array();
$opt['edit']['0']['type']='B';
$opt['edit']['0']['action']='Submit';
$opt['edit']['0']['text']='Update City';
echo $page->buildPageFooter( $IsForm, $opt); 
?>