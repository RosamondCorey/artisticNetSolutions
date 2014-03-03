<?php
$moduleReturn = '';
$moduleReturn .= '<h1>%%HEADER%%</h1>';
$moduleReturn .= '<h2>%%SUB_HEADER%%</h2>';
$moduleReturn .= '%%CONTENT%%';
$query = 'SELECT A.site_url, B.city_name, C.county_name FROM pp_site AS A, pp_city AS B, pp_county AS C WHERE A.service_id="'.$architect->hostData['service_id'].'" AND A.city_id=B.city_id AND A.county_id=C.county_id ORDER BY A.county_id';
$result = $db->query( $query );
$lastCounty='';
$first='true';
$siteNum = mysql_num_rows( $result );
$moduleReturn .= '<br /><br />';
$SiteCount=0;
while( $row = mysql_fetch_assoc( $result ) ){
  if($lastCounty!=$row['county_name']){
    if($first=='false'){
      $moduleReturn .= '</ul>';
    } else {
      $first = 'false';
    }
    $moduleReturn .= '<h4>'.$row['county_name'].'</h4><ul>';
  }
  $moduleReturn .= '<li><a href="http://'.$row['site_url'].'">'.$architect->contact['service_name'].' '.$row['city_name'].'</a></li>';
  $lastCounty=$row['county_name'];
  $SiteCount++;
  if($SiteCount==$siteNum){ $moduleReturn .= '</ul>'; }
 }
?>