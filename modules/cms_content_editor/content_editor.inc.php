<?php
	if(!TestSiteSelected()){
		?>
    		<script type="text/javascript" language="javascript">
				<?php echo 'window.location= JSRL+"administration/index.php?group=3&redirect=true";'; ?>
			</script>
    	<?php
	}
	$FunctionBaseUri = 'administration/index.php?group=3&module=4&component=1';
	function template_select($current){
		global $db;
		$query = 'SELECT * FROM templates WHERE theme_id="'.$_SESSION['siteData']['theme_id'].'"';
		$result = $db->query( $query );
		while( $row = mysql_fetch_assoc( $result ) ){
			$opt .= '<option value="'.$row['template_id'].'" '.(($row['template_id']==$current)?'SELECTED=SELECTED':'').'>'.$row['template_name'].'</option>';
		}
		return $opt;
	}
	function type_select($current){
		global $db;
		$query = 'SELECT * FROM page_module';
		$result = $db->query( $query );
		while( $row = mysql_fetch_assoc( $result ) ){
			$opt .= '<option value="'.$row['page_module_id'].'" '.(($row['page_module_id']==$current)?'SELECTED=SELECTED':'').'>'.$row['page_module_name'].'</option>';
		}
		return $opt;
	}
	function html_header_select($current){
		global $db;
		$query = 'SELECT * FROM site_headers ORDER BY header_id';
		$result = $db->query( $query );
		$opt = '';
		while( $row = mysql_fetch_assoc( $result ) ){
			$opt .= '<option value="'.$row['header_id'].'"'.(($row['header_id']==$current)?' SELECTED=SELECTED':'').'>'.$row['header_name'].'</option>';
				
		}
		return $opt;	
	}
	function header_select($current,$header_type='N'){
		global $db;
		$query = 'SELECT * FROM header_images WHERE svc_own="'.$_SESSION['siteData']['service_id'].'"';
		$result = $db->query( $query );
		$opt = '<option value="none">None</option>';
		$opt .= '<optgroup label="Header Images">';
		while( $row = mysql_fetch_assoc( $result ) ){
			$opt .= '<option value="Image_'.$row['header_id'].'" '.(($row['header_id']==$current&&$header_type=='I')?'SELECTED=SELECTED':'').'>';
			$opt .= $row['header_name'].'</option>';
		}
		$opt .= '</optgroup>';
		$opt .= '<optgroup label="Rotating Header">';
		$query = 'SELECT * FROM hero_sliders WHERE site_id="'.$_SESSION['siteData']['site_id'].'"';
		$result = $db->query( $query );
		while( $row = mysql_fetch_assoc( $result ) ){
			$opt .= '<option value="slider_'.$row['slider_id'].'" '.(($row['slider_id']==$current&&$header_type=='S')?'SELECTED=SELECTED':'').'>';
			$opt .= $row['slider_name'].'</option>';
		}
		$opt .= '</optgroup>';
		return $opt;
	}
	$pageName = 'Page Editor';
	echo $page->BuildPageHeader( $pageName );
	if(!isset($_GET['action'])){ $_GET['action']='default'; }
	$IsForm='false';
	switch($_GET['action']){
		case 'module_and_layout_edit': require_once(ABSOLUTE_PATH.'modules/cms_content_editor/module_and_layout_edit.inc.php'); break;
		case 'module_and_layout_edit_submit': require_once(ABSOLUTE_PATH.'modules/cms_content_editor/module_and_layout_edit_submit.inc.php'); break;
		case 'edit_content_areas': require_once(ABSOLUTE_PATH.'modules/cms_content_editor/edit_content_areas.inc.php'); break;
		case 'add_content_area': require_once(ABSOLUTE_PATH.'modules/cms_content_editor/add_content_area.inc.php'); break;
		case 'add_content_area_submit': require_once(ABSOLUTE_PATH.'modules/cms_content_editor/add_content_area_submit.inc.php'); break;
		case 'reorder_content_areas': require_once(ABSOLUTE_PATH.'modules/cms_content_editor/reorder_content_areas.inc.php'); break;
		case 'edit_content_area': require_once(ABSOLUTE_PATH.'modules/cms_content_editor/edit_content_area.inc.php'); break;
		case 'edit_content_area_submit': require_once(ABSOLUTE_PATH.'modules/cms_content_editor/edit_content_area_submit.inc.php'); break;
		case 'content_area_delete': require_once(ABSOLUTE_PATH.'modules/cms_content_editor/content_area_delete.inc.php'); break;
		case 'meta_edit': require_once(ABSOLUTE_PATH.'modules/cms_content_editor/meta_edit.inc.php'); break;
		case 'meta_edit_submit': require_once(ABSOLUTE_PATH.'modules/cms_content_editor/meta_edit_submit.inc.php'); break;
 case 'add_submit':
 	if(substr($_POST['header_image'],0,4)=='none'){ $header_type='N';	
	} else if(substr($_POST['header_image'],0,4)=='slid'){ $header_type='S';
	} else { $header_type='I'; }
	$temp = explode('_',$_POST['header_image']);
	$_POST['header_image']=$temp[1];
   $query = 'INSERT INTO pages (cms_page_name, template_id, page_type, header_image, page_scope, site_id, service_id, isindex, header_type) VALUES';
   $query .= '("'.$_POST['cms_page_name'].'", "'.$_POST['template'].'", "'.$_POST['page_type'].'","'.$_POST['header_image'].'","N","'.$_SESSION['siteData']['site_id'].'","'.$_SESSION['siteData']['service_id'].'","'.((isset($_POST['is-index']))?'Y':'N').'","'.$header_type.'")';
   $db->query( $query );
   $query = 'SELECT max(page_id) as num FROM pages';
   $row = mysql_fetch_assoc( $db->query( $query ) );
   $id = $row['num'];
   $query = 'INSERT INTO page_meta ( page_id, title, keywords, description, nofollow) VALUES (';
   $query .= '"'.$id.'", "'.$_POST['page_title'].'","'.$_POST['keywords'].'", "'.$_POST['description'].'", "'.((isset($_POST['no-follow']))?'Y':'N').'")';
   $db->query( $query );
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location= JSRL+"administration/index.php?group=3&module=4&component=1";';
   echo '</script>';
   break;
 case 'delete':
   $query = 'DELETE FROM pages where page_id="'.$_GET['pageId'].'"';
   $db->query( $query );
   $query = 'DELETE FROM content_area WHERE page_id="'.$_GET['pageId'].'"';
   $db->query( $query );
   $query = 'DELETE FROM page_meta WHERE page_id="'.$_GET['pageId'].'"';
   $db->query( $query );
   echo '<script type="text/javascript" language="Javascript">';
   echo 'window.location= JSRL+"administration/index.php?group=3&module=4&component=1";';
   echo '</script>';
   break;
 case 'add':
   echo '<script type="text/javascript" language="javascript">';
   //echo 'WYSIWYG.attach("description", full);';
   //echo 'WYSIWYG.attach("content", full);';
   echo '</script>';
   echo '<form method="post" action="'.REGULAR_URL.'administration/index.php?group=3&module=4&component=1&action=add_submit">';
   echo '<table cellspacing="0" cellpadding="3" style="font-size:11px;" class="cms_tabular">';
   echo '<tr class="tr_th_bg">';
   echo '<td colspan="3" style="font-weight:bold;">Page Information</th>';
   echo '</tr>';
   echo '<tr style="vertical-align:top;">';	
   echo '<td style="width:100px;"><label for="cms_page_name">CMS Page Name: </label> </td>';
   echo '<td><input type="text" name="cms_page_name" id="cms_page_name" /></td>';
   echo '<td rowspan="4" style="width:200px;">';
   echo '<div style="padding:0px 10px 10px 10px;width:170px;margin-left:auto;margin-right:auto;margin-top:10px;border:1px solid grey;">';
   echo '<center><strong>Options</strong></center>';
   echo '<hr />';
   echo 'Home Page: <input type="checkbox" id="is-index" name="is-index" '.(($pageData['isindex']=='Y')?'CHECKED=CHECKED':'').' /><br />';
   echo 'No-Follow: <input type="checkbox" id="no-follow" name="no-follow" '.(($metaData['nofollow']=='Y')?'CHECKED=CHECKED':'').' />';
   echo '</div>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';	
   echo '<td style="width:100px;"><label for="page_title">Page Title: </label> </td>';
   echo '<td><input type="text" name="page_title" id="page_title" /></td>';
   echo '</tr>';
   echo '<tr>';	
   echo '<td style="width:100px;"><label for="page_type">Page Type: </label> </td>';
   echo '<td>';
   echo '<select name="page_type" id="page_type">';
   echo type_select($current); 
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';	
   echo '<td style="width:100px;"><label for="template">Template: </label> </td>';
   echo '<td>';
   echo '<select name="template" id="template">';
   echo template_select("null"); 
   echo '</select>';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td style="width:100px;"><label for="header_image">Header Image: </label> </td>';
   echo '<td colspan="2"><select id="header_image" name="header_image">';
   echo header_select('0');
   echo '</select></td>';
   echo '</tr>';
   echo '<tr class="tr_th_bg">';
   echo '<td colspan="3" style="font-weight:bold;">SEO Information</th>';
   echo '</tr>';
   echo '<tr>';	
   echo '<td style="width:100px;"><label for="keywords">Page Keywords: </label> </td>';
   echo '<td colspan="2"><input type="text" name="keywords" id="keywords" style="width:670px;"/></td>';
   echo '</tr>';
   echo '<tr>';	
   echo '<td colspan="3"><center><label for="description">Page Description</label></center></td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td colspan="3">';
   echo '<textarea id="description" name="description" style="width:775px;height:50px;"></textarea>';
   echo '</td>';
   echo '</tr>';
   echo '</table>';
   break;
   		case 'update_template_and_module': require_once(ABSOLUTE_PATH.'modules/cms_content_editor/update_template_and_module.inc.php'); break;
		default: require_once(ABSOLUTE_PATH.'modules/cms_content_editor/default.inc.php'); break;
 	}
	// This is the opt array it is used to create all the navigation elements at the boottom of the cms it will also close any opened form elements
	$opt = Array();
		$opt['default']= Array();
			$opt['default']['0']['type']='A';
			$opt['default']['0']['action']='add';
			$opt['default']['0']['text']='Add New Page';
			$opt['default']['1']['type']='B';
			$opt['default']['1']['action']='Submit';
			$opt['default']['1']['text']='Update Module &amp; Template';
		$opt['add']= Array();
			$opt['add']['0']['type']='B';
			$opt['add']['0']['action']='Submit';
			$opt['add']['0']['text']='Add Page';
		$opt['edit']= Array();
			$opt['meta_edit']['0']['type']='B';
			$opt['meta_edit']['0']['action']='Submit';
			$opt['meta_edit']['0']['text']='Update Page';
		$opt['module_and_layout_edit']= Array();
			$opt['module_and_layout_edit']['0']['type']='B';
			$opt['module_and_layout_edit']['0']['action']='Submit';
			$opt['module_and_layout_edit']['0']['text']='Update Module &amp; Layout';
		// Content Nav Buttons
		$opt['edit_content_areas']= Array();
			$opt['edit_content_areas']['0']['type']='A';
			$opt['edit_content_areas']['0']['action']='add_content_area';
			$opt['edit_content_areas']['0']['text']='Add Content Area';
			$opt['edit_content_areas']['1']['type']='B';
			$opt['edit_content_areas']['1']['action']='Submit';
			$opt['edit_content_areas']['1']['text']='Re-Order';
		$opt['add_content_area']= Array();
			$opt['add_content_area']['0']['type']='B';
			$opt['add_content_area']['0']['action']='Submit';
			$opt['add_content_area']['0']['text']='Add This Content Area';
		$opt['edit_content_area']= Array();
			$opt['edit_content_area']['0']['type']='B';
			$opt['edit_content_area']['0']['action']='Submit';
			$opt['edit_content_area']['0']['text']='Update Content Area';
		
	echo $page->buildPageFooter( $IsForm, $opt); 
?>
