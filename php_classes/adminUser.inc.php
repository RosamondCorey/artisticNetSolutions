<?php
class adminUser{
  public function __construct( $db ){
    $this->db = $db;
  }
  public function login( $username, $password ){    
    $result = $this->db->query('SELECT * FROM administration_users WHERE username="'.$username.'"');
    if(mysql_num_rows($result)==1){
      $data = mysql_fetch_array( $result );
      if($data['password'] == md5($password)){
	$_SESSION['userInformation'] = $data;
	return true;
      } else {
	return false;	
      }
    } else { 
      return false;
    }
  }
}
?>