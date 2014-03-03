<?php
	
$componentReturn = '<div class="t1_fc">';
	$componentReturn .= '<div class="footer_logo">&nbsp;</div>';
  	$componentReturn .= '<div class="t1_fcb_center">';
		$componentReturn .= $architect->hostData['site_name'].'. ';
		$componentReturn .= '&copy; '.COPY_YEAR.' All rights reserved.';
		$componentReturn .= '<br />Designed &amp; Developed By <a href="http://www.artisticnetsolution.com" target="_ANS">Artistic Net Solutions</a>';
  	$componentReturn .= '</div>';
	$componentReturn .= '<div class="t1_fct_nav">';
		$componentReturn .= '%%FOOTER_NAVIGATION%%';
	$componentReturn .= '</div>';
$componentReturn .= '</div>';
?>
