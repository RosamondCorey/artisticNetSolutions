<div class="left_navigation" id="left_navigation">
<?php
if(!isset($_GET['navigation_id'])){ $_GET['navigation_id']='default'; }
if(!isset($_GET['module'])){ $_GET['module']='default'; }
if(!isset($_GET['component'])){ $_GET['component']='default'; }
if(!isset($_GET['saction'])){ $_GET['saction']='default'; }
echo '<ul class="left_navigation_ul">';
if($_GET['group']=='3'){
  echo '<li><a href="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&navigation_id='.$row['navigation_id'].'">&nbsp;&nbsp;
				<img src="'.REGULAR_URL.'administration/images/'.(($row['group_id']==$_GET['group']&&$_GET['navigation_id']==$row['navigation_id'])?'activ_left_nav_default.gif':'notactiv_left_nav_default.gif').'" alt="ICON" height="20" width="20" border="0" style="margin-bottom:-4px;" />
			&nbsp;Site Selecter</a>';
  echo '<ul class="sub_ul" style="margin:0px;padding:0px;">';
  echo '<li style="margin:0px;padding:10px 0px 10px 10px;">';
  if($_GET['saction']=='updateSiteSelect'){
    $query = 'SELECT * FROM site WHERE site_id = "'.$_POST['siteSelector'].'"';
    $res = $db->query( $query );
    $_SESSION['siteData'] = mysql_fetch_assoc($res);
  }
  $query = 'SELECT * FROM site ORDER BY site_id ASC';
  $res = $db->query( $query );
  echo '<form method="post" action="http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'&saction=updateSiteSelect">';
  echo '<center><select name="siteSelector" id="siteSelector" style="width:175px;">';
  echo '<option value="null">Choose a site...</option>';
  while( $site = mysql_fetch_assoc( $res ) ){
    echo '<option value="'.$site['site_id'].'"'.(($site['site_id']==$_SESSION['siteData']['site_id'])?' SELECTED=SELECTED':'').'>'.$site['site_name'].'</option>';
  }
  echo '</select><br />';
  echo '<input type="submit" value="Select This Site" style="width:175px;"/></center>';
  echo '</form>';
  echo '</li>';
echo '</ul>';
echo '</li>';
}
$query = 'SELECT * FROM administration_navigation_2 WHERE group_id="'.$_GET['group'].'" ORDER BY navigation_id ASC';
$result = $db->query( $query );
while( $row = mysql_fetch_array( $result ) ){
  echo '<li'.(($row['group_id']==$_GET['group']&&$_GET['navigation_id']==$row['navigation_id'])?' class="active"':'').'><a href="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&navigation_id='.$row['navigation_id'].'">&nbsp;&nbsp;
				<img src="'.REGULAR_URL.'administration/images/'.(($row['group_id']==$_GET['group']&&$_GET['navigation_id']==$row['navigation_id'])?'activ_left_nav_default.gif':'notactiv_left_nav_default.gif').'" alt="ICON" height="20" width="20" border="0" style="margin-bottom:-4px;" />
			&nbsp;'.$row['navigation_text'].'</a>';
  echo '<ul class="sub_ul">';
  $subquery = 'SELECT * FROM administration_navigation_3 WHERE sub_group="'.$row['navigation_id'].'" AND group_id="'.$row['group_id'].'"';
  $subresult = $db->query( $subquery );
  while( $subrow = mysql_fetch_array( $subresult ) ){
    echo '<li'.(($subrow['group_id']==$_GET['group']&&$subrow['module_id']==$_GET['module']&&$subrow['component_id']==$_GET['component'])?' class="active"':'').'>';
    echo '<a href="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$subrow['module_id'].'&component='.$subrow['component_id'].'">';
    echo '&raquo;&nbsp;'.$subrow['navigation_text'];
    echo '</a>';
    echo '</li>';
  }
  echo '</ul>';
  echo '</li>';
 }
echo '</ul>';
?>
</div>
