<?php
	// Base URI for this module
	$FunctionBaseUri = 'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'];
	// Build our page Header
	$pageName = 'Portfolio Manager';
	echo $page->BuildPageHeader( $pageName );
	if(!isset($_GET['action'])){ $_GET['action']='default'; }
	// preset form to false so we can just reset it if it is a form
	$IsForm='false';
	// Start our action switch
	$fpath = 'modules/cms_portfolio/';
	function buildPortfolioCategories( $current=NULL ){
		global $db;
		echo $query = 'SELECT * FROM portfolio_categorys WHERE portfolio_id="'.$_SESSION['portfolio_id'].'" ORDER BY `order`';
		$result = $db->query( $query );
		$opt = '';
		while( $row = mysql_fetch_assoc( $result ) ){
			$opt .= '<option value="'.$row['category_id'].'">'.$row['category_name'].'</option>';		
		}
		return $opt;
	}
	
	switch($_GET['action']){
		// portfolio
		case 'add_portfolio': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'add_portfolio_submit': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'edit_portfolio': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'edit_portfolio_submit': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'delete_portfolio': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		// categorys
		case 'category_main': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'add_category': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'add_category_submit': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'edit_category': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'edit_category_submit': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'reorder_category': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'delete_category': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		// items
		case 'portfolio_items_main': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'add_portfolio_item': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'add_portfolio_item_submit': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'edit_portfolio_item': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'edit_portfolio_item_submit': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'reorder_portfolio_items': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		case 'delete_portfolio_items': require_once(ABSOLUTE_PATH.$fpath.$_GET['action'].'.inc.php'); break;
		default: require_once(ABSOLUTE_PATH.$fpath.'default.inc.php'); break;	
	}
	// build our button options
	$opt = Array();
		$opt['default']= Array();
			$opt['default']['0']['type']='A';
			$opt['default']['0']['action']='add_portfolio';
			$opt['default']['0']['text']='Add a Portfolio';
		$opt['add_portfolio']= Array();
			$opt['add_portfolio']['0']['type']='B';
			$opt['add_portfolio']['0']['action']='Submit';
			$opt['add_portfolio']['0']['text']='Add the Portfolio';
		$opt['edit_portfolio']= Array();
			$opt['edit_portfolio']['0']['type']='B';
			$opt['edit_portfolio']['0']['action']='Submit';
			$opt['edit_portfolio']['0']['text']='Update Portfolio';
		$opt['category_main']= Array();
			$opt['category_main']['0']['type']='B';
			$opt['category_main']['0']['action']='Submit';
			$opt['category_main']['0']['text']='Re-Order';
			$opt['category_main']['1']['type']='A';
			$opt['category_main']['1']['action']='add_category';
			$opt['category_main']['1']['text']='Add Category';
		$opt['add_category']= Array();
			$opt['add_category']['0']['type']='B';
			$opt['add_category']['0']['action']='Submit';
			$opt['add_category']['0']['text']='Add the Category';
		$opt['edit_category']= Array();
			$opt['edit_category']['0']['type']='B';
			$opt['edit_category']['0']['action']='Submit';
			$opt['edit_category']['0']['text']='Update Category';
		$opt['portfolio_items_main']= Array();
			$opt['portfolio_items_main']['0']['type']='B';
			$opt['portfolio_items_main']['0']['action']='Submit';
			$opt['portfolio_items_main']['0']['text']='Re-Order';
			$opt['portfolio_items_main']['1']['type']='A';
			$opt['portfolio_items_main']['1']['action']='add_portfolio_item';
			$opt['portfolio_items_main']['1']['text']='Add Portfolio Item';
		$opt['add_portfolio_item']= Array();
			$opt['add_portfolio_item']['0']['type']='B';
			$opt['add_portfolio_item']['0']['action']='Submit';
			$opt['add_portfolio_item']['0']['text']='Add Portfolio Item';
		$opt['edit_portfolio_item']= Array();
			$opt['edit_portfolio_item']['0']['type']='B';
			$opt['edit_portfolio_item']['0']['action']='Submit';
			$opt['edit_portfolio_item']['0']['text']='Update Portfolio Item';
			
	// output our footer
	echo $page->buildPageFooter( $IsForm, $opt); 
?>