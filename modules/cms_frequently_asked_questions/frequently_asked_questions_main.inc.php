<?php
	// Base URI for this module
	$FunctionBaseUri = 'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'];
	// Build our page Header
	$pageName = 'FAQ Manager';
	echo $page->BuildPageHeader( $pageName );
	if(!isset($_GET['action'])){ $_GET['action']='default'; }
	// preset form to false so we can just reset it if it is a form
	$IsForm='false';
	// Start our action switch
	switch($_GET['action']){
		case 'faq_manage':  require_once(ABSOLUTE_PATH.'modules/cms_frequently_asked_questions/faq_manage.inc.php'); break;
		case 'add_qa': require_once(ABSOLUTE_PATH.'modules/cms_frequently_asked_questions/add_qa.inc.php'); break;
		case 'add_qa_submit': require_once(ABSOLUTE_PATH.'modules/cms_frequently_asked_questions/add_qa_submit.inc.php'); break;
		case 'edit_qa': require_once(ABSOLUTE_PATH.'modules/cms_frequently_asked_questions/edit_qa.inc.php'); break;
		case 'edit_qa_submit': require_once(ABSOLUTE_PATH.'modules/cms_frequently_asked_questions/edit_qa_submit.inc.php'); break;
		case 'delete_qa': require_once(ABSOLUTE_PATH.'modules/cms_frequently_asked_questions/delete_qa.inc.php'); break;
		case 'reorder_qa': require_once(ABSOLUTE_PATH.'modules/cms_frequently_asked_questions/reorder_qa.inc.php'); break;
		case 'add_faq_page': require_once(ABSOLUTE_PATH.'modules/cms_frequently_asked_questions/add_faq_page.inc.php'); break;
		case 'add_faq_page_submit':  require_once(ABSOLUTE_PATH.'modules/cms_frequently_asked_questions/add_faq_page_submit.inc.php'); break;
		case 'edit_faq': require_once(ABSOLUTE_PATH.'modules/cms_frequently_asked_questions/edit_faq.inc.php'); break;
		case 'edit_faq_submit': require_once(ABSOLUTE_PATH.'modules/cms_frequently_asked_questions/edit_faq_submit.inc.php'); break;
		case 'delete_faq': require_once(ABSOLUTE_PATH.'modules/cms_frequently_asked_questions/delete_faq.inc.php'); break;
		default: require_once(ABSOLUTE_PATH.'modules/cms_frequently_asked_questions/default.inc.php'); break;	
	}
	// build our button options
	$opt = Array();
		$opt['default']= Array();
			$opt['default']['0']['type']='A';
			$opt['default']['0']['action']='add_faq_page';
			$opt['default']['0']['text']='Add FAQ Page';
		$opt['add_faq_page']= Array();
			$opt['add_faq_page']['0']['type']='B';
			$opt['add_faq_page']['0']['action']='Submit';
			$opt['add_faq_page']['0']['text']='Add FAQ Page';
		$opt['faq_manage']= Array();
			$opt['faq_manage']['0']['type']='A';
			$opt['faq_manage']['0']['action']='add_qa';
			$opt['faq_manage']['0']['text']='Add Question &amp; Answer';
			$opt['faq_manage']['1']['type']='B';
			$opt['faq_manage']['1']['action']='Submit';
			$opt['faq_manage']['1']['text']='Re-Order';
		$opt['add_qa']= Array();
			$opt['add_qa']['0']['type']='B';
			$opt['add_qa']['0']['action']='Submit';
			$opt['add_qa']['0']['text']='Add Question &amp; Answer';
		$opt['edit_qa']= Array();
			$opt['edit_qa']['0']['type']='B';
			$opt['edit_qa']['0']['action']='Submit';
			$opt['edit_qa']['0']['text']='Update Question &amp; Answer';
		$opt['edit_faq']= Array();
			$opt['edit_faq']['0']['type']='B';
			$opt['edit_faq']['0']['action']='Submit';
			$opt['edit_faq']['0']['text']='Update FAQ Page';
			
	// output our footer
	echo $page->buildPageFooter( $IsForm, $opt); 
?>