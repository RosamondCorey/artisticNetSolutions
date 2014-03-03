<?php
	// Base URI for this module
	$FunctionBaseUri = 'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'];
	// Build our page Header
	$pageName = 'Form Manager';
	echo $page->BuildPageHeader( $pageName );
	if(!isset($_GET['action'])){ $_GET['action']='default'; }
	// preset form to false so we can just reset it if it is a form
	$IsForm='false';
	$fpath = 'modules/cms_forms/';
	// Start our action switch
	
	switch($_GET['action']){
		
		case 'add_form': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'add_form_submit': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'edit_form': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'edit_form_submit': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'delete_form': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'form_builder_main': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'add_input': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'add_input_submit': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'add_select': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'add_select_submit': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'add_textarea': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'add_textarea_submit': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'edit_textarea': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'edit_textarea_submit': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'edit_input': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'edit_input_submit': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'edit_select': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'edit_select_submit': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'delete_element': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'form_reorder': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		default: require_once(ABSOLUTE_PATH.$fpath.'default.inc.php'); break;	
	}
	// build our button options
	$opt = Array();
		$opt['default']= Array();
			$opt['default']['0']['type']='A';
			$opt['default']['0']['action']='add_form';
			$opt['default']['0']['text']='Add a Form';
		$opt['add_form']= Array();
			$opt['add_form']['0']['type']='B';
			$opt['add_form']['0']['action']='Submit';
			$opt['add_form']['0']['text']='Add the Form';
		$opt['edit_form']= Array();
			$opt['edit_form']['0']['type']='B';
			$opt['edit_form']['0']['action']='add_qa';
			$opt['edit_form']['0']['text']='Update Form';
		$opt['form_builder_main']= Array();
			$opt['form_builder_main']['0']['type']='A';
			$opt['form_builder_main']['0']['action']='add_input';
			$opt['form_builder_main']['0']['text']='Add Input';
			$opt['form_builder_main']['1']['type']='A';
			$opt['form_builder_main']['1']['action']='add_textarea';
			$opt['form_builder_main']['1']['text']='Add Textarea';
			$opt['form_builder_main']['2']['type']='A';
			$opt['form_builder_main']['2']['action']='add_select';
			$opt['form_builder_main']['2']['text']='Add Select Box';
			$opt['form_builder_main']['3']['type']='B';
			$opt['form_builder_main']['3']['action']='Submit';
			$opt['form_builder_main']['3']['text']='Re-Order';
		$opt['add_input']= Array();
			$opt['add_input']['0']['type']='B';
			$opt['add_input']['0']['action']='Submit';
			$opt['add_input']['0']['text']='Add the Input';
		$opt['edit_input']= Array();
			$opt['edit_input']['0']['type']='B';
			$opt['edit_input']['0']['action']='Submit';
			$opt['edit_input']['0']['text']='Update Input';
		$opt['add_select']= Array();
			$opt['add_select']['0']['type']='B';
			$opt['add_select']['0']['action']='Submit';
			$opt['add_select']['0']['text']='Add the Select';
		$opt['edit_select']= Array();
			$opt['edit_select']['0']['type']='B';
			$opt['edit_select']['0']['action']='Submit';
			$opt['edit_select']['0']['text']='Update Select Box';
		$opt['add_textarea']= Array();
			$opt['add_textarea']['0']['type']='B';
			$opt['add_textarea']['0']['action']='Submit';
			$opt['add_textarea']['0']['text']='Add the Textarea';
		$opt['edit_textarea']= Array();
			$opt['edit_textarea']['0']['type']='B';
			$opt['edit_textarea']['0']['action']='Submit';
			$opt['edit_textarea']['0']['text']='Update Textarea';
	// output our footer
	echo $page->buildPageFooter( $IsForm, $opt); 
?>