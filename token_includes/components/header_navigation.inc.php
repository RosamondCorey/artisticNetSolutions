<?php	
$componentReturn = '<div class="header_navigation">';
	$componentReturn .= '<a class="submit_a_project" href="index.php?button_id=0&page_id=253" style="text-decoration:none;">';
		$componentReturn .= '<span class="level_1">SUBMIT A PROJECT</span>';
		$componentReturn .= '<span class="level_2">Have ANS build your next Masterpiece</span>';
	$componentReturn .= '</a>';
$componentReturn .= '<ul>';
$query='SELECT * FROM button_class';
$result = $db->query( $query );
$buttonClasses = array();
while( $row = mysql_fetch_assoc( $result ) ){ $buttonClasses[$row['class_id']] = $row['class_css']; }
//print_r($buttonClasses);
$query = 'SELECT * FROM navigation WHERE site_id="'.$architect->hostData['site_id'].'" AND navigation="H" ORDER BY display_order ASC';
$result = $db->query( $query );
$num = mysql_num_rows( $result );
while( $row = mysql_fetch_assoc( $result ) ){
  $componentReturn .= '<li '.(($row['button_class']!='0')?'class="'.$buttonClasses[$row['button_class']].(($_GET['button_id']==$row['button_id'])?'_active':'').'"':'').'>';
  $componentReturn .= '<a href="'.convertURI( $architect->SiteData['URL'], $row['http_type'] ).'index.php?button_id='.$row['button_id'].'">'.$row['display_text'].'</a>';
  $componentReturn .= '</li>';
 }
$componentReturn .= '</ul>';
$componentReturn .= '</div>';
?>
