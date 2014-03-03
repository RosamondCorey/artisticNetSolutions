<?php
$architect->BuildStyles();
$count = sizeof($architect->SiteData['Sheets']);
for($i=0;$i<$count;$i++){
  echo "\t";
  echo '<link href="'; 
  echo $architect->SiteData['URL'].$architect->SiteData['Sheets'][$i]['sheet_dir'].$architect->SiteData['Sheets'][$i]['sheet_name'].'" rel="stylesheet" type="text/css">';
  echo "\n";
 }
if($architect->SiteData['page_type']=="2"){ 
  echo '<script src="http://maps.google.com/maps?file=api&v=2&key='.$architect->hostData['gmapapi'].'&sensor=true" type="text/javascript"></script>';  
 }                
?>