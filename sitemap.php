<?php 
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
include('include/base_configuration.inc.php');
include('include/system_configuration.inc.php');
include('php_classes/database.inc.php');
$db = new database();
if(strstr($_SERVER['HTTP_HOST'],"www.")){
  $URL = $_SERVER['HTTP_HOST'];
 } else {
  $URL = "www.".$_SERVER['HTTP_HOST'];
 }
$SiteData = mysql_fetch_assoc( $db->query( 'SELECT * FROM pp_site WHERE site_url="'.$URL.'"' ) );
echo '<url>';
echo '<loc>http://'.$SiteData['site_url'].'/</loc>';
echo '<changefreq>weekly</changefreq>';
echo '<priority>1.0</priority>';
echo '</url>';
$result = $db->query( 'SELECT * FROM pages WHERE site_id="'.$SiteData['site_id'].'"');
while($row = mysql_fetch_assoc( $result ) ){
  echo '<url>';
  echo '<loc>http://'.$SiteData['site_url'].'/index.php?button_id=0&page_id='.$row['page_id'].'</loc>';
  echo '<changefreq>weekly</changefreq>';
  echo '</url>';
 }
$result = $db->query( 'SELECT * FROM pages WHERE page_scope IN("P","Q")');
while($row = mysql_fetch_assoc( $result ) ){
  echo '<url>';
  echo '<loc>http://'.$SiteData['site_url'].'/index.php?button_id=0&page_id='.$row['page_id'].'</loc>';
  echo '<changefreq>weekly</changefreq>';
  echo '</url>';
 }
$result = $db->query( 'SELECT * FROM pages WHERE site_id="0" AND service_id="'.$SiteData['service_id'].'"');
while($row = mysql_fetch_assoc( $result ) ){
  echo '<url>';
  echo '<loc>http://'.$SiteData['site_url'].'/index.php?button_id=0&page_id='.$row['page_id'].'</loc>';
  echo '<changefreq>weekly</changefreq>';
  echo '</url>';
 }
echo '</urlset>';
?>
