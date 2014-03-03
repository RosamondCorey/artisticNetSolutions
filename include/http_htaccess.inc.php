<?php
/*
if(strpos( $_SERVER['REQUEST_URI'] , 'button_id' )){
	$var = explode('=',$_SERVER['QUERY_STRING']);
	$query = 'SELECT * FROM navigation WHERE button_id="'.$var[1].'"';
	$res = mysql_fetch_assoc($db->query( $query ));
	$type = $res['link_format'];
	$name = $res['display_text'];
	$name = str_replace(" ","-",$name);
	if($type=="P"){ $name = $name.".php";
	} else if($type=="F"){ $name = $name."/";
	} else { $name = $name.".html"; }
	$uri = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$uriParts = explode("index",$uri);
	$newUri = $uriParts[0].$name;
	if($_SERVER['HTTPS']=='on'){
		header('Location: https://'.$newUri);
	} else {
		header('Location: http://'.$newUri);
	}
}
*/
?>