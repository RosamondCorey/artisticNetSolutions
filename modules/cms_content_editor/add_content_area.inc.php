<?php
echo '<script type="text/javascript" language="javascript">';
   echo 'WYSIWYG.attach("page_content", full);';
echo '</script>';
$IsForm = 'true';
echo '<form method="post" action="'.REGULAR_URL.$FunctionBaseUri.'&action=add_content_area_submit&pageId='.$_SESSION['pageId'].'">';
echo '<table cellspacing="0" cellpadding="3" style="font-size:11px;" class="cms_tabular">';
	echo '<tr>';
		echo '<td style="padding-left:20px;width:100px;"><label for="display_name">Display Name:</label></td>';
		echo '<td><input type="text" id="display_name" name="display_name" style="width:500px;" /></td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td style="padding-left:20px;width:100px;"><label for="header_1">Header One:</label></td>';
		echo '<td><input type="text" id="header_1" name="header_1" style="width:500px;"/></td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td style="padding-left:20px;width:100px;"><label for="header_2">Header Two:</label></td>';
		echo '<td><input type="text" id="header_2" name="header_2" style="width:500px;" /></td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td colspan="2"><center><labe for="page_content"></strong>Content</strong></label></center></td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td colspan="2"><center><textarea id="page_content" name="page_content" style="width:750px;height:400px;"></textarea></center></td>';
	echo '</tr>';
echo '</table>';

?>
