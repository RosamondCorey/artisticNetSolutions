<?php
	class page{
		public function BuildPageHeader( $text ){
			$header ='';
			$header .= '<div class="cms_header">';
				$header .= '<img src="'.REGULAR_URL.'administration/images/default_header_icon.gif" alt="ICON" height="19" width="20" />';
				$header .= '<h1>'.$text.'</h1>';
			$header .= '</div>';
			$header .= '<div class="cms_content">';
			return $header;
		}
		public function buildPageFooter( $IsForm, $opt){
			if(!isset($_GET['action'])){ $_GET['action'] = 'default'; }
			$footer = '<div class="content_footer">';
				$footer .= '<center>';
					foreach($opt as $key=>$value){
						if($key == $_GET['action']){
							foreach($value as $subKey=>$subvalue){
								if($subvalue['type']=='A'){
									$footer .= '<a href="'.REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action='.$subvalue['action'].'" class="button">'.$subvalue['text'].'</a>';
								} else if( $subvalue['type']=='B'){
									$footer .= '<input type="submit" value="'.$subvalue['text'].'" class="button"/>';
								} else {
									$footer .= 'NONE';
								}
							}
						}
					}
				$footer .= '</center>';
				$footer .= '</div>';
				if($IsForm=='true'){ $footer .= '</form>'; } 
			$footer .= '</div>';
			return $footer;
		}
		public function buildInput( $width, $name , $value, $label, $type, $col, $row ){
			$output = '<td';
			if($col!=0){ $output .= ' colspan="'.$col.'"'; }
			if($row!=0){ $output .= ' rowspan="'.$row.'"'; }
			$output .= '>'; 
			$output .='<label for="'.$name.'">'.$label.': </label><br />';
			$output .= '<input type="'.$type.'" name="'.$name.'" id="'.$name.'" style="width:'.$width.'px;"'.(($value=='NONE')?'':' value="'.$value.'"').' />';
			$output .= '</td>';
			return $output;
		}
	}
?>