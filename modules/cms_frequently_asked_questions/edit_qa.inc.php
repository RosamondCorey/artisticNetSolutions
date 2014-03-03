<?php
	// let the system know this case has a form
	$IsForm = 'true';
	// start form
	$query = 'SELECT * FROM faq_qa WHERE qa_id="'.$_GET['qa_id'].'"';
	$row = mysql_fetch_assoc( $db->query( $query ) );
	echo '<form method="post" action="'.REGULAR_URL.$FunctionBaseUri.'&action=edit_qa_submit&qa_id='.$_GET['qa_id'].'">';
		// start table
		echo '<table cellspacing="0" cellpadding="3" style="font-size:11px;" class="cms_tabular">';
			echo '<tr>';
				echo '<td><center><strong>Question</strong></center>';
					echo '<center><textarea name="question" id="question" style="width:90%;height:60px;">'.$row['question'].'</textarea></center>';
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td><center><strong>Answer</strong></center>';
					echo '<center><textarea name="answer" id="answer" style="width:90%;height:60px;">'.$row['answer'].'</textarea></center>';
				echo '</td>';
			echo '</tr>';
		// end table
		echo '</table>';
		echo '<br />';
?>