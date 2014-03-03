<?php
	// let the system know this case has a form
	$IsForm = 'true';
	// start form
	echo '<form method="post" action="'.REGULAR_URL.$FunctionBaseUri.'&action=add_qa_submit">';
		// start table
		echo '<table cellspacing="0" cellpadding="3" style="font-size:11px;" class="cms_tabular">';
			echo '<tr>';
				echo '<td><center><strong>Question</strong></center>';
					echo '<center><textarea name="question" id="question" style="width:90%;height:60px;"></textarea></center>';
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td><center><strong>Answer</strong></center>';
					echo '<center><textarea name="answer" id="answer" style="width:90%;height:60px;"></textarea></center>';
				echo '</td>';
			echo '</tr>';
		// end table
		echo '</table>';
		echo '<br />';
?>