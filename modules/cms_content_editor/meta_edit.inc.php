<?php
	// This case is a form
	$IsForm='true';
	// Load all page info from the page table into pageData
	$query = 'SELECT * FROM pages WHERE page_id="'.$_GET['pageId'].'"';
	$pageData = mysql_fetch_assoc($db->query( $query ));
	// Load all page meta data
	$query = 'SELECT * FROM page_meta WHERE page_id="'.$_GET['pageId'].'"';
	$metaData = mysql_fetch_assoc($db->query( $query ));
	echo '<form method="post" action="'.REGULAR_URL.$FunctionBaseUri.'&action=meta_edit_submit&pageId='.$_GET['pageId'].'">';
		echo '<table cellspacing="0" cellpadding="3" style="font-size:11px;" class="cms_tabular">';
			echo '<tr class="tr_th_bg">';
				echo '<td colspan="3" style="font-weight:bold;">Page Information</th>';
			echo '</tr>';
			echo '<tr style="vertical-align:top;">';	
				echo '<td style="width:100px;"><label for="cms_page_name">CMS Page Name: </label> </td>';
				echo '<td><input type="text" name="cms_page_name" id="cms_page_name" value="'.$pageData['cms_page_name'].'" /></td>';
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
				echo '<td style="width:100px;"><label for="page_title">Page Title: </label> <br /><br /><br /><br /></td>';
				echo '<td><input type="text" name="page_title" id="page_title" value="'.$metaData['title'].'" /><br /><br /><br /><br /></td>';
			echo '</tr>';
			echo '<tr class="tr_th_bg">';
				echo '<td colspan="3" style="font-weight:bold;">SEO Information</th>';
			echo '</tr>';
			echo '<tr>';	
				echo '<td style="width:100px;"><label for="keywords">Page Keywords: </label> </td>';
				echo '<td colspan="2"><input type="text" name="keywords" id="keywords" style="width:670px;"  value="'.$metaData['keywords'].'" /></td>';
			echo '</tr>';
			echo '<tr>';	
				echo '<td colspan="3"><center><label for="description">Page Description</label></center></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td colspan="3">';
					echo '<textarea id="description" name="description" style="width:775px;height:50px;">'.$metaData['description'].'</textarea>';
				echo '</td>';
			echo '</tr>';
		echo '</table>';
?>