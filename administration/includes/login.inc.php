<div class="login_box">
	<center>
    <h3>&nbsp;&nbsp;&nbsp;Sign In...</h3>
    <?php
		if($error){
			
		}
	?>
	<form method="post" action="<?php echo REGULAR_URL; ?>administration/index.php?login=verify_data">
    	<table cellspacing="2" cellpadding="2">
        	<tr>
            	<td>
                	<center><label for="username">Username</label></center>
                </td>
            </tr>
            <tr>
            	<td>
                	<center><input type="text" id="username" name="username" /></center>
                </td>
            </tr>
            <tr>
            	<td>
                	<center><label for="password">Password</label></center>
                </td>
            </tr>
            <tr>
            	<td>
                	<center><input type="password" id="password" name="password" /></center>
                </td>
            </tr>
            <tr>
            	<td>
                	<center><input type="submit" value="Sign In" /></center>
                </td>
            </tr>
        </table>
    </form>
    </center>
</div>