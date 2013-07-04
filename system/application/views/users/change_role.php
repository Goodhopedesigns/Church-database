<?php
        echo form_open('Users/changingRole');
        echo form_fieldset('Change user role');
	echo "<table>";	
        echo "<tr>";
	echo "<td colspan='2'>".$user['name']."{ ".$user['role']." }</td></tr>";
	echo "<tr>";
	echo "<td><label for = 'name'>SET NEW ROLE : </label></td>";			 
	echo "<td>".form_dropdown('user_role',$roles)."</td></tr>";
	echo "<tr><td> </td>";
	echo "<td>".form_submit('submit','Change')." ".form_submit('cancel','cancel')."</td></tr>";
	echo "</table>";
        echo form_close();
?>