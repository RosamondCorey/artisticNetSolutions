<?php
	class headerNavigation{
		public function __construct( $db, $htaccess ){
			$this->db = $db;
			$this->htaccess = $htaccess;
		}
		public function convertName( $name, $type ){
			$name = str_replace(" ","-",$name);
			if($type=="P"){ $name = $name.".php";
			} else if($type=="F"){ $name = $name."/";
			} else { $name = $name.".html"; }
			return $name;
		}
		public function buildHeadNavigation(){
			$this->htaccess->updateHeaderEntrys();
			$this->htaccess->updateHtaccess();
			$query = 'SELECT class_id, class_css FROM button_class WHERE class_owner="H"';
			$result = $this->db->query( $query );
			$buttonClass = array();
			while( $row = mysql_fetch_assoc( $result ) ){ $buttonClass[$row['class_id']]=$row['class_css']; }
			$navigationFile = "<div class='header_navigation'>\n";
			$navigationFile .= chr(9)."<ul>\n";
			$query = 'SELECT * FROM navigation WHERE navigation="H" ORDER BY display_order';
			$result = $this->db->query( $query );
			$num = mysql_num_rows( $result );
			$i=1;
			while( $row = mysql_fetch_assoc( $result ) ){
				$navigationFile .= chr(9).chr(9)."<li".(($row['button_class']=="0")?'':' class="'.$buttonClass[$row['button_class']].'"')." id=\"".$row['button_id']."\">\n";
					$navigationFile .= chr(9).chr(9).chr(9)."<span class='left_span'>&nbsp;</span>\n";
					$navigationFile .= chr(9).chr(9).chr(9)."<span class='center_span'>\n";
					$navURL = "%%URL%%".$this->convertName( $row['display_text'], $row['link_format'] );
					$navigationFile .= chr(9).chr(9).chr(9).chr(9)."<a href='".$navURL."'".(($row['button_class']!="0")?' alt="'.$row['display_text'].'"':'').">".(($row['button_class']=="0")?$row['display_text']:'&nbsp;')."</a>\n";
					$navigationFile .= chr(9).chr(9).chr(9)."</span>\n";
					$navigationFile .= chr(9).chr(9).chr(9)."<span class='right_span'>&nbsp;</span>\n";
				$navigationFile .= chr(9).chr(9)."</li>\n";
				$i++;
			}
			$navigationFile .= chr(9)."</ul>\n";
			$navigationFile .= "</div>\n";
			unlink(ABSOLUTE_PATH."token_includes/html/header_navigation.inc.php");
			$navFile = fopen(ABSOLUTE_PATH.'token_includes/html/header_navigation.inc.php' , "a+");
			fwrite($navFile, $navigationFile);
			fclose($navFile);
		}
		public function buildFooterNavigation(){
			$this->htaccess->updateHeaderEntrys();
			$this->htaccess->updateHtaccess();
			$query = 'SELECT class_id, class_css FROM button_class WHERE class_owner="F"';
			$result = $this->db->query( $query );
			$buttonClass = array();
			while( $row = mysql_fetch_assoc( $result ) ){ $buttonClass[$row['class_id']]=$row['class_css']; }
			$navigationFile = "<div class='footer_navigation'>\n";
			$navigationFile .= chr(9)."<ul>\n";
			$query = 'SELECT * FROM navigation WHERE navigation="F" ORDER BY display_order';
			$result = $this->db->query( $query );
			$num = mysql_num_rows( $result );
			$i=1;
			while( $row = mysql_fetch_assoc( $result ) ){
				$navigationFile .= chr(9).chr(9)."<li".(($num==$i)?' id="last"':'').(($i=="1")?' id="first"':'').(($row['button_class']=="0")?'':' class="'.$buttonClass[$row['button_class']].'"').">\n";
					$navURL = "%%URL%%".$this->convertName( $row['display_text'], $row['link_format'] );
					$navigationFile .= chr(9).chr(9).chr(9).chr(9)."<a href='".$navURL."'".(($row['button_class']!="0")?' alt="'.$row['display_text'].'"':'').">".(($row['button_class']=="0")?$row['display_text']:'&nbsp;')."</a>\n";
				$navigationFile .= chr(9).chr(9)."</li>\n";
				$i++;
			}
			$navigationFile .= chr(9)."</ul>\n";
			$navigationFile .= "</div>\n";
			unlink(ABSOLUTE_PATH."token_includes/html/footer_navigation.inc.php");
			$navFile = fopen(ABSOLUTE_PATH.'token_includes/html/footer_navigation.inc.php' , "a+");
			fwrite($navFile, $navigationFile);
			fclose($navFile);
		}
	}
?>