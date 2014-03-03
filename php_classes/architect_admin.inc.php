<?php
	class architectAdmin{
		public function __construct( $db, $User ){
			$this->db = $db;
			$this->User = $User;
		}
		public function BuildStyles(){
			$styles_q = 'SELECT * FROM administration_styles WHERE module_id="0"';
			$styles = $this->db->query( $styles_q );
			$this->SiteData['style_sheets'] = array();
			$i = 0;
			while($row = mysql_fetch_array( $styles ) ){
					$this->SiteData['style_sheets'][$i] = $row['sheet'];
				$i++;
			}
			return true;
		}
		public function PageDimensions(){
			$this->Dimensions = array();
			$baseHeight = ($_SESSION['viewportHeight']-0);
			$this->Dimensions['headerWidth'] = $_SESSION['viewportWidth'];
			$this->Dimensions['footerWidth'] = $_SESSION['viewportWidth'];
			$this->Dimensions['containerHeight'] = $baseHeight;
			$this->Dimensions['viewportHeight'] = ($baseHeight-125);
			$this->Dimensions['contentHeight'] = (($baseHeight-125)-30);
		}
	}
?>