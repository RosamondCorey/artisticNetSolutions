<?php
$moduleReturn = '';
$moduleReturn .= '<h1>%%HEADER%%</h1>';
$moduleReturn .= '<h2>%%SUB_HEADER%%</h2>';
$moduleReturn .= '%%CONTENT%%';
$moduleReturn .= '<ul>';
for($err=0;$err<sizeof($_SESSION['errorArr']);$err++){
  $moduleReturn .= '<li>'.$_SESSION['errorArr'][$err].'</li>';
 }
$moduleReturn .= '</ul>';
?>