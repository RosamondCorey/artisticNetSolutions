<?php 
$moduleReturn = "";
$moduleReturn .= "<h1>%%HEADER%%</h1>";
$moduleReturn .= "<h2>%%SUB_HEADER%%</h2>";
$moduleReturn .= "%%CONTENT%%";
$moduleReturn .= '<ul style="list-style-type:none;list-style:none;padding:0px;margin:10px 0 0 0;">';
$result = $db->query('SELECT * FROM pages WHERE site_id="'.$architect->hostData['site_id'].'"');
while($row = mysql_fetch_assoc( $result ) ){
  $moduleReturn .= '<li style="margin:0px;padding:0px;"> - <a href="%%URL%%index.php?button_id=0&page_id='.$row['page_id'].'">'.$row['cms_page_name'].'</a></li>';
 }
$result = $db->query('SELECT * FROM pages WHERE page_scope IN("P","Q")');
while($row = mysql_fetch_assoc( $result ) ){
  $moduleReturn .= '<li style="margin:0px;padding:0px;"> - <a href="%%URL%%index.php?button_id=0&page_id='.$row['page_id'].'">'.$row['cms_page_name'].'</a></li>';
 }
//$moduleReturn = 'SELECT * FROM pages WHERE page_id="0" AND service_id="'.$architect->hostData['service_id'].'"';
$result = $db->query('SELECT * FROM pages WHERE site_id="0" AND service_id="'.$architect->hostData['service_id'].'"');
while($row = mysql_fetch_assoc( $result ) ){
  $moduleReturn .= '<li style="margin:0px;padding:0px;"> - <a href="%%URL%%index.php?button_id=0&page_id='.$row['page_id'].'">'.$row['cms_page_name'].'</a></li>';
 }

$moduleReturn .= '</ul>';
?>