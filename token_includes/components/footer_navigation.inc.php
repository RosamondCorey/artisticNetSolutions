<?php	
$componentReturn = '<div class="footer_navigation">';
$componentReturn .= '<ul>';
$query = 'SELECT * FROM navigation WHERE site_id="'.$architect->hostData['site_id'].'" AND navigation="F" ORDER BY display_order ASC';
$result = $db->query( $query );
$num = mysql_num_rows( $result );

while( $row = mysql_fetch_assoc( $result ) ){
  $componentReturn .= '<li>';
  $componentReturn .= '<a href="'.convertURI( $architect->SiteData['URL'], $row['http_type'] ).'index.php?button_id='.$row['button_id'].'">'.$row['display_text'].'</a>';
  $componentReturn .= '</li>';
  
  }
$componentReturn .= '</ul>';
$componentReturn .= '</div>';
?>
