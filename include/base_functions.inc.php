<?php 
function convertName( $name, $type ){
	$name = str_replace(" ","-",$name);
	if($type=="P"){ $name = $name.".php";
	} else if($type=="F"){ $name = $name."/";
	} else { $name = $name.".html"; }
	return $name;
}
function convertURI( $uri, $type ){
	if($type=="S"){ $pos = strpos($uri, 'https');
    	if(!$pos){ $uri = str_replace("http","https", $uri); }
  	} else { $uri = str_replace("https","http", $uri); }
  	return $uri;
}
// Test to see if a site is currently selected
function TestSiteSelected(){
	if($_SESSION['siteData']==''){
		return false;	
	} else {
		return true;
	}
}
// Simple function to return if a variable is odd. 
function is_odd($number) {
	return $number & 1; // 0 = even, 1 = odd
}
?>