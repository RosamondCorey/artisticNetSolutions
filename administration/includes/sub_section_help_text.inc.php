<?php
	$query = 'SELECT * FROM administration_navigation_1 WHERE navigation_id="'.$_GET['group'].'"';
	$topLevel = mysql_fetch_assoc( $db->query( $query ) );
	$query = 'SELECT * FROM administration_navigation_2 WHERE group_id="'.$_GET['group'].'" AND navigation_id="'.$_GET['navigation_id'].'"';
	$secondLevel = mysql_fetch_assoc( $db->query( $query ) );
	$query = 'SELECT * FROM administration_navigation_3 WHERE group_id="'.$_GET['group'].'" AND sub_group="'.$_GET['navigation_id'].'"';
	$thirdLevelResult = $db->query( $query );
	if($_GET['redirect']!='true'){
?>
    <div class="cms_header">
        Dashboard: <?php echo $topLevel['navigation_text']; ?> &raquo; <?php echo $secondLevel['navigation_text']; ?>
    </div>
    <div class="cms_content">
        <p><?php echo $secondLevel['help_text']; ?><br /><br />Bellow is a list of applications that belong to this group and a small explanation of each.</p>
        <?php 
        while( $row = mysql_fetch_assoc( $thirdLevelResult ) ){
            echo '<h2>'.$row['navigation_text'].'</h2>';
            echo '<p>'.$row['help_text'].'</p>';
        }	
        ?>
        <div class="content_footer">&nbsp;</div>
    </div>
<?php
	} else {
		?>
        	<div class="cms_header">
            Dashboard: <span style="color:red;font-weight:bold;">Please choose a site first</span>
            </div>
            <div class="cms_content">
                <p style="color:red;text-align:center;"><br /><strong>Please choose a site you would like to edit first.</strong><br /><br /></p>
                
                <div class="content_footer">&nbsp;</div>
            </div>
        
        <?php
	}
?>