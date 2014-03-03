<?php
$row = mysql_fetch_assoc( $db->query( 'SELECT * FROM header_images WHERE header_id="'.$architect->SiteData['header_image'].'"' ) );
$componentReturn = '';
$componentReturn .= '<div class="t2_bch" style="background: url(\'%%URL%%images/'.$row['img_src'].'\') left top no-repeat;">';
$componentReturn .= '&nbsp;';
$componentReturn .= '</div>';
?>