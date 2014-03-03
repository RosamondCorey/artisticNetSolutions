<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
		<title>Simple CMS Administration</title>
               <?php require_once(ABSOLUTE_PATH.'assembler/style_back.inc.php'); ?>
        <script type="text/javascript" language="Javascript">	
   JSRL = "<?php echo REGULAR_URL; ?>";
			SESSION_ID = "<?php echo session_id(); ?>";
			PAGE = "<?php echo((isset($_GET['module_id']))?$_GET['module_id']:'NULL'); ?>";
		</script>
        <script type="text/javascript" src="<?php echo REGULAR_URL; ?>javascript/common/makeRequest.js"></script>
        <script type="text/javascript" src="<?php echo REGULAR_URL; ?>javascript/back/colorPicker.js"></script>
		<script type="text/javascript" src="<?php echo REGULAR_URL; ?>javascript/common/wysiwyg/scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="<?php echo REGULAR_URL; ?>javascript/common/wysiwyg/scripts/wysiwyg-settings.js"></script>

    </head>
    <body>
    	<div class="admin_container" id="admin_container">
        	<div class="admin_header" id="admin_header">
				<div class="admin_logo">&nbsp;</div>
            	<div class="admin_header_text">&raquo; <?php echo COMPANY_NAME; ?></div>
                <?php 
					if(isset($_SESSION['userInformation'])){
						?>
                        	<div class="userInfo">
								<div class="welcome_box">
									<?php if(isset($_SESSION['userInformation'])){ ?>
											Welcome, <?php echo $_SESSION['userInformation']['first'].' '.
											$_SESSION['userInformation']['last'].'!'; 
									} ?>
								</div>
								<div class="logoutBox">
									Not You? <a href="<?php echo REGULAR_URL; ?>administration/index.php?action=killSession">Change User &raquo;</a>
								</div>
								<?php if($_SESSION['userInformation']['userLevel']=='1'){
										echo '<div class="administration">
												<a href="'.REGULAR_URL.'administration/index.php?group=6">
													<img src="'.REGULAR_URL.'administration/images/adminThumb.gif" alt="" width="19" height="10" style="margin-bottom:-1px;"/>
													Administration
												</a>
										</div>';
								} ?>
								<div class="notifications">
									<a href="">
										<img src="<?php echo REGULAR_URL; ?>administration/images/notiThumb.gif" alt="" width="17" height="13" style="margin-bottom:-4px;"/>
										Notifications: 0
									</a>
								</div>
                            </div>
							
                        <?php require_once(ABSOLUTE_PATH.'administration/includes/top_navigation.inc.php');
					}
				?>
            </div>
			<?php if(isset($_SESSION['userInformation'])){ ?>
			<div class="breadcrumb">
				<?php
					echo '<div class="bc">';
						if(isset($_GET['module'])){
							$query = 'SELECT * FROM administration_navigation_3 WHERE group_id="'.$_GET['group'].'" AND module_id="'.$_GET['module'].'" AND component_id="'.$_GET['component'].'"';
							$rowThree = mysql_fetch_assoc( $db->query( $query ) );
							$query = $query = 'SELECT * FROM administration_navigation_2 WHERE group_id="'.$rowThree['group_id'].'" AND navigation_id="'.$rowThree['sub_group'].'"';
							$rowTwo = mysql_fetch_assoc( $db->query( $query ) );
							$query = $query = 'SELECT * FROM administration_navigation_1 WHERE navigation_id="'.$rowTwo['group_id'].'"';
							$rowOne = mysql_fetch_assoc( $db->query( $query ) );
							echo '<a href="'.REGULAR_URL.'administration/index.php?group='.$rowTwo['group_id'].'">'.$rowOne['navigation_text'].'</a> &raquo;';
							echo '<a href="'.REGULAR_URL.'administration/index.php?group='.$rowThree['group_id'].'&navigation_id='.$rowThree['sub_group'].'">'.$rowTwo['navigation_text'].'</a> &raquo;';
							echo $rowThree['navigation_text'];
						} else if(isset($_GET['navigation_id'])){
							$query = $query = 'SELECT * FROM administration_navigation_2 WHERE group_id="'.$_GET['group'].'" AND navigation_id="'.$_GET['navigation_id'].'"';
							$rowTwo = mysql_fetch_assoc( $db->query( $query ) );
							$query = $query = 'SELECT * FROM administration_navigation_1 WHERE navigation_id="'.$rowTwo['group_id'].'"';
							$rowOne = mysql_fetch_assoc( $db->query( $query ) );
							echo '<a href="'.REGULAR_URL.'administration/index.php?group='.$rowTwo['group_id'].'">'.$rowOne['navigation_text'].'</a> &raquo;';
							echo $rowTwo['navigation_text'];
						} else if(isset($_GET['group'])){
							$query = $query = 'SELECT * FROM administration_navigation_1 WHERE navigation_id="'.$_GET['group'].'"';
							$rowOne = mysql_fetch_assoc( $db->query( $query ) );
							echo $rowOne['navigation_text'];
						}
					echo '</div>';
				?>
			</div>
			<?php } ?>
            <div class="viewport" id="viewport"
            <?php echo((!isset($_SESSION['userInformation']))?"style='background:white;padding:25px 0px 100px 0px;border-top:1px solid #DCDCDC;'":''); ?>>