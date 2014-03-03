<?php
	if($_GET['action']=='submit'){
		foreach( $_POST as $key => $value){
			$query = 'UPDATE style SET value="'.(($key=='color')?'#':'').$value.'" WHERE element="body" AND property="'.$key.'"';
			$db->query($query);
		}
	}
	$query = 'SELECT * FROM style WHERE element="body"';
	$result = $db->query($query);
	$styles = array();
	while( $row = mysql_fetch_array( $result ) ){
		$styles[$row['property']]=$row['value'];	
	}
	$style = 'style="';
	foreach($styles as $key => $value ){ $style .= $key.':'.$value.';'; }
	$style .= '"';
	//print_r($styles);
	$supportedFonts = array(
		"Arial"=>"Arial, Arial, Helvetica, sans-serif",
		"Arial Black"=>"Arial Black, Arial Black, Gadget, sans-serif",
		"Comic Sans MS"=>"Comic Sans MS, Comic Sans MS5, cursive",
		"Courier New"=>"Courier New, Courier New, Courier6, monospace",
		"Georgia1"=>"Georgia1, Georgia, serif",
		"Impact"=>"Impact, Impact5, Charcoal6, sans-serif",
		"Lucida"=>"Lucida Console, Monaco5, monospace",
		"Lucida Sans Unicode"=>"Lucida Sans Unicode, Lucida Grande, sans-serif",
		"Palatino Linotype"=>"Palatino Linotype, Book Antiqua3, Palatino6, serif",
		"Tahoma"=>"Tahoma, Geneva, sans-serif",
		"Times New Roman"=>"Times New Roman, Times, serif",
		"Trebuchet MS1"=>"Trebuchet MS1, Helvetica, sans-serif",
		"Verdana"=>"Verdana, Verdana, Geneva, sans-serif",
		"Symbol"=>"Symbol, Symbol (Symbol2, Symbol2)",
		"Webdings"=>"Webdings, Webdings (Webdings2, Webdings2)",
		"Wingdings"=>"Wingdings, Zapf Dingbats (Wingdings2, Zapf Dingbats2)",
		"MS Sans Serif4"=>"MS Sans Serif4, Geneva, sans-serif",
		"MS Serif"=>"MS Serif4, New York6, serif"
	);
	$URL = REGULAR_URL.'administration/index.php?group='.$_GET['group'].'&module='.$_GET['module'].'&component='.$_GET['component'].'&action=submit';
?>
<script language="Javascript" type="text/javascript">
	function UpdateExampleText(e){
		switch(e.id){
			case 'font-family': document.getElementById("exampleText").style.fontFamily = e.value; break;
			case 'font-size': document.getElementById("exampleText").style.fontSize = e.value; break;
			case 'font-weight': document.getElementById("exampleText").style.fontWeight = e.value; break;
			case 'text-decoration': document.getElementById("exampleText").style.textDecoration = e.value; break;
			case 'font-style': document.getElementById("exampleText").style.fontStyle = e.value; break;
			case 'color': document.getElementById("exampleText").style.color = "#"+e.value; break;
			
		}
	}
</script>
<div class="cms_header">
	<img src="<?php echo REGULAR_URL; ?>administration/images/left_header_curve_top.png" class="leftimg" />
	<div class="header_span_grad" style="width:765px;">Basic Font Settings</div>
	<img src="<?php echo REGULAR_URL; ?>administration/images/right_header_curve_top.png" class="rightimg" />
</div>
<div class="cms_content"><br />
<div class="exampleText" id="exampleText" <?php echo $style; ?>>
	Example Text<br />
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce accumsan sapien consequat sapien ultrices sodales. Sed 		consectetur fermentum mauris, id pretium tellus adipiscing a.
</div>
<form method="post" action="<?php echo $URL; ?>">
<table cellspacing="0" cellpadding="1" class="cms_tabular">
	<tr>
    	<td style="width:100px;"><label for="font-family">Site Font: </label></td>
        <td>
        	<select name="font-family" id="font-family" onChange="Javasript: UpdateExampleText(this);">
            <?php
            	foreach($supportedFonts as $key => $value){
					echo '<option value="'.$value.'" style="font-family:'.$value.';"'.(($styles['font-family']==$value)?' SELECTED=SELECTED':'').'>'.$key.'</option>';	
				}
        	?>
        	</select>
        </td>
    </tr>
	<tr>
    	<td><label for="font-size">Font Size: </label></td>
        <td>
        	<select name="font-size" id="font-size" onChange="Javasript: UpdateExampleText(this);">
            	<?php
					for($i=9;$i<20;$i++){ echo '<option value="'.$i.'px" style="font-size:'.$i.'px;"'.(($styles['font-size']==$i.'px')?' SELECTED=SELECTED':'').'>'.$i.'px</option>'; }
				?>
            </select>
        </td>
    </tr>
    <tr>
    	<td><label for="font-weight">Font Weight: </label></td>
        <td>
        	<select name="font-weight" id="font-weight" onChange="Javasript: UpdateExampleText(this);">
            	<option value="normal" style="font-weight:normal;"<?php echo(($styles['font-weight']=='normal')?' SELECTED=SELECTED':''); ?>>Normal</option>
                <option value="bold" style="font-weight:bold;"<?php echo(($styles['font-weight']=='bold')?' SELECTED=SELECTED':''); ?>>Bold</option>
            </select>
        </td>
    </tr>
    <tr>
    	<td><label for="text-decoration">Text Decoration: </label></td>
        <td>
        	<select name="text-decoration" id="text-decoration" onChange="Javasript: UpdateExampleText(this);">
            	<option value="none" style="text-decoration:none;"<?php echo(($styles['text-decoration']=='none')?' SELECTED=SELECTED':''); ?>>None</option>
                <option value="underline" style="text-decoration:underline;"<?php echo(($styles['text-decoration']=='underline')?' SELECTED=SELECTED':''); ?>>Underline</option>
                <option value="overline" style="text-decoration:overline;"<?php echo(($styles['text-decoration']=='overline')?' SELECTED=SELECTED':''); ?>>Overline</option>
                <option value="line-through" style="text-decoration:line-through;"<?php echo(($styles['text-decoration']=='line-through')?' SELECTED=SELECTED':''); ?>>Line Through</option>
                <option value="blink" style="text-decoration:blink;"<?php echo(($styles['text-decoration']=='blink')?' SELECTED=SELECTED':''); ?>>Blink</option>
            </select>
        </td>
    </tr>
	<tr>
    	<td><label for="font-style">Font Style: </label></td>
        <td>
        	<select name="font-style" id="font-style" onChange="Javasript: UpdateExampleText(this);">
            	<option value="normal" style="font-style:normal;"<?php echo(($styles['font-style']=='normal')?' SELECTED=SELECTED':''); ?>>Normal</option>
                <option value="italic" style="font-style:italic;"<?php echo(($styles['font-style']=='italic')?' SELECTED=SELECTED':''); ?>>Italic</option>
                <option value="oblique" style="font-style:oblique;"<?php echo(($styles['font-style']=='oblique')?' SELECTED=SELECTED':''); ?>>Oblique</option>
            </select>
        </td>
    </tr>
    <tr>
    	<td><label for="color">Font Color: </label></td>
        <td>
        	<input type="text" value="<?php echo $styles['color']; ?>" id="color" name="color" class="color" onChange="Javasript: UpdateExampleText(this);" />
        </td>
    </tr>
</table>
	<div class="content_footer">
		<img src="<?php echo REGULAR_URL; ?>administration/images/left_header_curve_bottom.png" class="leftimg" />
		<div class="footer_span_grad" style="width:765px;"><input type="submit" value="Update" class="button"/></div>
		<img src="<?php echo REGULAR_URL; ?>administration/images/right_header_curve_bottom.png" class="rightimg" />
	</div>
</div>
</form>
