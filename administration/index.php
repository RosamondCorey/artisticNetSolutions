<?php
	session_start();
	require_once('../include/base_configuration.inc.php');
	require_once('../include/base_functions.inc.php');
	require_once(ABSOLUTE_PATH.'php_classes/class_constructor_admin.inc.php');
	require_once(ABSOLUTE_PATH.'include/system_configuration.inc.php');
	$error = false;
	if(isset($_GET['action'])&&$_GET['action']=='killSession'){
		session_destroy();
		?>
			<script type="text/javascript" language="Javascript">
				window.location="<?php echo REGULAR_URL; ?>administration/index.php";
			</script>
		<?php
	}
	if(isset($_GET['login'])&&$_GET['login']=='verify_data'){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$return = $architectAdmin->User->login( $username, $password );
		if($return){
			$url = REGULAR_URL."administration/index.php?module_id=dashboard";
			header( 'Location: '.$url );
		} else {
			$error = true;
		}
	}
	require_once(ABSOLUTE_PATH.'composition/back/html_header.inc.php');
	if(isset($_SESSION['userInformation'])){
		require_once(ABSOLUTE_PATH.'administration/includes/controle.inc.php');
	} else {
		require_once(ABSOLUTE_PATH.'administration/includes/login.inc.php');
	}
	?><div style="clear:both;"></div><?php
	require_once(ABSOLUTE_PATH.'composition/back/html_footer.inc.php');
?>