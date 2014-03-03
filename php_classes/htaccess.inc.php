<?php 
class htaccess{
  public function __construct( $db ){
    $this->db = $db;
  }
  public function convertName( $name, $type ){
    $name = str_replace(" ","-",$name);
    if($type=="P"){ $name = $name.".php";
    } else if($type=="F"){ $name = $name."/";
    } else { $name = $name.".html"; }
    return $name;
  }
  public function updateHtaccess(){
    $htcontent = "RewriteEngine on\n";
    $htcontent.= "Options +FollowSymlinks\n";
    $on = "RewriteCond %{HTTPS} on\n";
    $off = "RewriteCond %{HTTPS} off\n";
    $query = 'SELECT * FROM site ORDER BY site_id';
    $res = $this->db->query( $query );
    while( $rowOne = mysql_fetch_array( $res )){
      $query = 'SELECT * FROM navigation WHERE site_id="'.$rowOne['site_id'].'"';
      $result = $this->db->query( $query );
      $htpart = '';
      while( $row = mysql_fetch_array( $result ) ){
	print_r($row);
	if($row['http_type']=='D'){
	  $off .= "RewriteRule http://".$rowOne['site_url']."/Development/SimpleCMS/".$this->convertName($row['display_text'], $row['link_format'])."$ ";
	  $off .= "http://".$rowOne['site_url']."/Development/SimpleCMS/index.php?button_id=".$row['button_id']."\n";
	} else {
	  $on .= "RewriteRule https://".$rowOne['site_url']."/Development/SimpleCMS/".$this->convertName($row['display_text'], $row['link_format'])."$ ";
	  $on .= "https://".$rowOne['site_url']."/Development/SimpleCMS/index.php?button_id=".$row['button_id']."\n";
	}
      }
    }
    $htcontent .= $on.$off;
    unlink(ABSOLUTE_PATH.'.htaccess');
    $ht_file = fopen(ABSOLUTE_PATH.'.htaccess' , "a+");
    fwrite($ht_file, $htcontent);
    fclose($ht_file);
  }
}
?>