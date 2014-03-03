<?php
session_start();
require_once('include/base_configuration.inc.php');
require_once(ABSOLUTE_PATH.'include/system_configuration.inc.php');
require_once(ABSOLUTE_PATH.'php_classes/class_construct.inc.php');
require_once(ABSOLUTE_PATH.'include/base_functions.inc.php');
require_once(ABSOLUTE_PATH.'include/http_htaccess.inc.php');
$architect->buildData();
require_once(ABSOLUTE_PATH.'composition/front/html_header_start.inc.php');
require_once(ABSOLUTE_PATH.'assembler/style.inc.php');
require_once(ABSOLUTE_PATH.'composition/front/html_header_end.inc.php');
//print_r($architect);
if(isset($_GET['action']) && $_GET['action'] == 'RAQ'){
  $error = 'false';
  $_SESSION['errorArr'] = array();
  if($_POST['name']==''){ $_SESSION['errorArr'][] = 'Your name is required for us to complete this form.'; }
  if($_POST['area_code']==''){ $_SESSION['errorArr'][] = 'Your area code is required to complete this form.'; }
  if($_POST['number']==''){ $_SESSION['errorArr'][] = 'Your phone number is required to complete this form.'; }
  if($_POST['zip']==''){ $_SESSION['errorArr'][] = 'Your Zip code is required to comeplete this form.'; }
  if(sizeof($_SESSION['errorArr'])!='0'){
     $query = 'SELECT * FROM pages WHERE site_id="0" AND service_id="'.$architect->hostData['service_id'].'" AND page_scope="O"';
     $DATA = mysql_fetch_assoc( $db->query( $query  ) );
     echo '<script type="text/javascript" language="Javascript">';
     echo 'window.location="http://'.$architect->hostData['site_url'].'/index.php?button_id=0&page_id='.$DATA['page_id'].'"';
     echo '</script>';
  } else {
    $to = 'ben@propacificbee.com';
    $from = ((isset($_POST['email']))?$_POST['email']:'NONE');
    $subject = 'Quote Request From '.$architect->contact['service_name'].' Network';
    $headers = "From: ".$from."\n" .
      "X-Mailer: php";
    $body = 'This quote request was filled out on http://'.$architect->hostData['site_url']."\n";
    $body .= "Name: ".$_POST['name']."\n";
    $body .= "Number: (".$_POST['area_code'].") ".$_POST['number']."\n";
    $body .= "Email: ".((isset($_POST['email']))?$_POST['email']:'Customer did not Specify')."\n";
    $body .= "Zip Code: ".$_POST['zip']."\n";
    $body .= "Comment: \n";
    $body .= ((isset($_POST['comment']))?$_POST['comment']:'Customer did not add a comment.');
    mail($to, $subject, $body, $headers);
    unset($_POST);
    $query = 'SELECT * FROM pages WHERE site_id="0" AND service_id="'.$architect->hostData['service_id'].'" AND page_scope="T"';
    $DATA = mysql_fetch_assoc( $db->query( $query ) );
    echo '<script type="text/javascript" language="javascript">';
    echo 'window.location="http://'.$architect->hostData['site_url'].'/index.php?button_id=0&page_id='.$DATA['page_id'].'"';
    echo '</script>';
  }
 }
$buffer = file_get_contents(ABSOLUTE_PATH.'templates/'.$architect->SiteData['file_name']);
$types = array();
$types[2] = "";
$types[3] = "";
$types[4] = "token_includes/components/";
$types[5] = "token_includes/html/";
for($i=0;$i<sizeof($architect->tokens);$i++){
  switch($architect->tokens[$i]['token_type']){
  case '1':
    $query = 'SELECT * FROM content_area WHERE page_id="'.$architect->Page_id.'"';
    $row = mysql_fetch_assoc( $db->query( $query ) );
    $buffer = str_replace($architect->tokens[$i]['token'], $row[$architect->tokens[$i]['token_value']], $buffer);
    break;
  case '2':
	//print_r($architect->tokens[$i]);
    $query = 'SELECT a.module_id, a.component_id, b.module_dir as DIR, c.file as FILE FROM page_module as a, module as b, component as c ';
    $query .= 'WHERE a.page_module_id="'.$architect->SiteData['page_type'].'" AND a.module_id=b.module_id AND a.module_id=c.module_id AND a.component_id=c.component_id';
	$row = mysql_fetch_assoc( $db->query( $query ) );
	$contents = file_get_contents(ABSOLUTE_PATH.'modules/'.$row['DIR'].$row['FILE']); 
	$contents = str_replace("<?php", "", $contents);
    $contents = str_replace("?>", "", $contents);
    eval($contents);
    $buffer = str_replace($architect->tokens[$i]['token'], $moduleReturn, $buffer);
    break;
  case '4':
    $contents = file_get_contents(ABSOLUTE_PATH.$types[$architect->tokens[$i]['token_type']].$architect->tokens[$i]['token_value']); 
	$contents = str_replace("<?php", "", $contents);
    $contents = str_replace("?>", "", $contents);
    eval($contents);
    $buffer = str_replace($architect->tokens[$i]['token'], $componentReturn, $buffer);
    break;
  case '5':
    $replace = file_get_contents(ABSOLUTE_PATH.$types[$architect->tokens[$i]['token_type']].$architect->tokens[$i]['token_value']);
    $buffer = str_replace($architect->tokens[$i]['token'], $replace, $buffer);
    break;
  case '6':
  	$query = 'SELECT * FROM site_headers WHERE header_id="'.$architect->SiteData['page_header'].'"';
	$row = mysql_fetch_assoc( $db->query( $query ) );
	$contents = stripslashes(file_get_contents(ABSOLUTE_PATH.'composition/front/site_header/'.$row['header_file'])); 
	$contents = str_replace("<?php", "", $contents);
    $contents = str_replace("?>", "", $contents);
    eval($contents);
	$buffer = str_replace($architect->tokens[$i]['token'], $componentReturn, $buffer);
	break;
  }
 }
echo str_replace("%%URL%%",$architect->SiteData['URL'],$buffer);
require_once(ABSOLUTE_PATH.'composition/front/html_footer.inc.php');
//echo $db->qcount.'<br />'.$db->qtime;
?>
