<?php
  // The architect is just like an architect in real life. He is responsible for designing and constructing your web site just like your house.
class architect{
  // The constructor cant do all the work alone this is where we pass him all his workers he can tell what to do.
  public function __construct( $db ){
    $this->db = $db;
  }
  // This is the current page we are on
  public $Page_id = '';
  public $hostData = Array();
  // This is where the constructor gathers all the information compiled by the cms and constructs this page.
  public function buttonToPage($button){
    $query = 'SELECT page_id FROM navigation WHERE button_id="'.$button.'"';
    $res = mysql_fetch_assoc( $this->db->query( $query ) );
    return $res['page_id'];
  }
  public function buildData(){
    $wwwIsSet = strstr($_SERVER['HTTP_HOST'],"www.");
    //echo '|'.$wwwIsSet.'|';
    if($wwwIsSet=='0'&&!strstr($_SERVER['HTTP_HOST'],"localhost")){
      $NEWURL = 'www.'.$_SERVER['HTTP_HOST'];
    } else {
      $NEWURL = $_SERVER['HTTP_HOST'];
    }
    //echo $NEWURL;
    $query = 'SELECT * FROM site WHERE site_url="'.$NEWURL.'"';
    $this->hostData = mysql_fetch_assoc( $this->db->query( $query ) );
    $query = 'SELECT page_id FROM pages WHERE site_id="'.$this->hostData['site_id'].'" AND isindex="Y"';
    $res = mysql_fetch_assoc($this->db->query( $query ));
    define("INDEX_ID",$res['page_id']);
    //print_r($this->hostData);
    $res = $this->db->query('SELECT b.county_name AS `county`, c.city_name AS `city`, d.phone_number AS number, e.address_1 AS `address_1`, e.address_2 AS `address_2`, f.service_name AS `service_name` FROM site AS a, county AS b, city AS c, phone AS d, address AS e, services AS f WHERE a.site_id="'.$this->hostData['site_id'].'" AND a.county_id=b.county_id AND a.city_id=c.city_id AND a.phone_id=d.phone_id AND a.address_id=e.address_id AND a.service_id=f.service_id');
    $this->contact = mysql_fetch_assoc( $res );
    //print_r($this->contact);
    if(isset($_GET['button_id'])){ 
      if($_GET['button_id']!="0"){
	$this->Page_id = $this->buttonToPage($_GET['button_id']);
      } else {
	$this->Page_id = $_GET['page_id'];
      } 
    } else { 
      $this->Page_id = INDEX_ID; 
    } 
    //$complex_query = 'SELECT a.*, b.*, c.* FROM pages as a, page_meta as b, templates as c ';
    //$complex_query .= ' WHERE a.page_id = b.page_id AND a.template_id IN(c.template_id,"0") AND a.page_id="'.$this->Page_id.'"';
    // $return = $this->db->query( $complex_query );
    $this->SiteData['page_id'] = $this->Page_id;
    $query = 'SELECT * FROM pages WHERE page_id="'.$this->SiteData['page_id'].'"';
    $res = mysql_fetch_assoc( $this->db->query( $query ) );
	//print_r($res);
    if($res['template_id']==0){
      $query = 'SELECT * FROM templates WHERE theme_id="'.$this->hostData['theme_id'].'" AND template_type="C"';
      $result = mysql_fetch_assoc( $this->db->query( $query ) );
      $this->SiteData['template_id'] = $result['template_id'];
    } else {
      $query = 'SELECT * FROM templates WHERE template_id="'.$res['template_id'].'"';
      $result = mysql_fetch_assoc( $this->db->query( $query ) );
      $this->SiteData['template_id'] = $res['template_id'];
    }
    $this->SiteData['page_type'] = $res['page_type'];
    $this->SiteData['cms_page_name'] = $res['cms_page_name'];
    $this->SiteData['header_image'] = $res['header_image'];
    $this->SiteData['page_scope'] = $res['page_scope'];
    $this->SiteDate['site_id'] = $this->hostData['site_id'];
    $this->SiteData['service_id'] = $this->hostData['service_id'];
    $this->SiteData['isindex'] = $res['isindex'];
	$this->SiteData['page_header'] = $res['page_header'];
	$this->SiteData['header_type'] = $res['header_type'];
	$this->SiteData['content_type'] = $res['content_type'];
	$this->SiteData['module_sub_id'] = $res['module_sub_id'];
	$this->SiteData['content_position'] = $res['content_position'];
    $query = 'SELECT * FROM page_meta WHERE page_id="'.$this->SiteData['page_id'].'"';
    $res = mysql_fetch_assoc( $this->db->query( $query ) );
    $this->SiteData['title'] = $res['title'];
    $this->SiteData['keywords'] = $res['keywords'];
    $this->SiteData['description'] = $res['description'];
    $this->SiteData['nofollow'] = $res['nofollow'];
    $this->SiteData['file_name'] = $result['file_name'];
    $this->SiteData['template_name'] = $result['template_name'];
    $this->SiteData['template_sheet_id'] = $result['template_sheet_id'];
    $this->SiteData['theme_id'] = $result['theme_id'];
    $this->SiteData['template_type'] = $result['template_type'];
    $query = 'SELECT page_module_sheet_id FROM page_module WHERE page_module_id="'.$this->SiteData['page_type'].'"';
    $res2 = mysql_fetch_array( $this->db->query( $query ) );
    $this->SiteData['page_module_sheet_id'] = $res2['page_module_sheet_id'];
    //print_r($this->SiteData);
    $query = 'SELECT page_module_sheet_id FROM page_module WHERE page_module_id="'.$this->SiteData['page_type'].'"';
    $res = mysql_fetch_assoc($this->db->query( $query ) );
    $this->SiteData['page_module_sheet_id'] = $res['page_module_sheet_id'];
    
    $query = 'SELECT * FROM templates_tokens WHERE template_id IN(0,"'.$this->SiteData['template_id'].'") ORDER BY order_index';
    $result = $this->db->query( $query );
    $i = 0;
    while( $row = mysql_fetch_assoc( $result ) ){
      $this->tokens[$i] = $row;
      $i++;
    }
    $this->SiteData['URL'] = REGULAR_URL;
    $query = 'SELECT page_id FROM pages WHERE service_id="'.$this->SiteData['service_id'].'" AND page_scope="H"';
    $result = mysql_fetch_assoc( $this->db->query( $query ) );
    $this->SiteData['hotDealId'] = $result['page_id'];
    //$this->SetHttpType();
    return true;
  }
  private function SetHttpType(){
    if($_SERVER['HTTPS'] == 'on'){ $this->SiteData['URL'] = SECURE_URL;
    } else { $this->SiteData['URL'] = REGULAR_URL; }
  }
  public function BuildStyles(){
    //print_r( $this->SiteData );
    $query = 'SELECT * FROM style_sheet WHERE sheet_id IN("0","'.$this->SiteData['template_sheet_id'].'")';
    $res = $this->db->query( $query );
    $i=0;
    while( $row = mysql_fetch_assoc( $res ) ){
      $this->SiteData['Sheets'][$i] = $row;
      $i++;
    }
  }		
  
  private function redirect( $url ){
    header( 'Location: '.$url );
  }
}
?>