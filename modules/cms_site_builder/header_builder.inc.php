<?php
if(!isset($_SESSION['siteData']['site_id'])&&$_SESSION['siteData']['site_id']==''){	
	?>
    <script type="text/javascript" language="javascript">
		<?php echo 'window.location= JSRL+"administration/index.php?group=3&redirect=true";'; ?>
	</script>
    <?php
}
$pageName = 'Header builder';
echo $page->BuildPageHeader( $pageName );
if(!isset($_GET['action'])){ $_GET['action']='default'; }
$IsForm='false';
$modPath = ABSOLUTE_PATH.'modules/cms_site_builder/';
$tbl_start = '<table cellspacing="0" cellpadding="2" class="cms_tabular">';
$modUri = REGULAR_URL.'administration/index.php?group=10&module=17&component=1';

switch($_GET['action']){
	case 'submit_delete_header': require_once($modPath.'header_builder_submit_update_header.inc.php'); break;
	case 'submit_update_header_file': require_once($modPath.'header_builder_submit_update_header.inc.php'); break; 
	case 'add_header': require_once($modPath.'header_builder_add_header.inc.php'); break;
	case 'submit_add_header':  require_once($modPath.'header_builder_submit_add_header.inc.php'); break;
	case 'edit_header_file': require_once($modPath.'header_builder_edit_file.inc.php'); break;
	default: require_once($modPath.'header_builder_default.inc.php'); break;	
}
$opt = Array();
$opt['default']= Array();
$opt['default']['0']['type']='A';
$opt['default']['0']['action']='add_header';
$opt['default']['0']['text']='Add a New Header';
$opt['edit_header_file']= Array();
$opt['edit_header_file']['0']['type']='B';
$opt['edit_header_file']['0']['action']='Submit';
$opt['edit_header_file']['0']['text']='Update Header File';
$opt['add_header']= Array();
$opt['add_header']['0']['type']='B';
$opt['add_header']['0']['action']='Submit';
$opt['add_header']['0']['text']='Add Header';
echo $page->buildPageFooter( $IsForm, $opt );
?>