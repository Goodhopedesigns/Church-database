<?php
        echo form_open('Users/addingUsers');
        echo form_fieldset('Create new user from members..');
	echo "<table>";	
        echo "<tr>";
	echo "<td><label for = 'name'>SELECT MEMBER: </label></td>";		
	echo "<td>".form_dropdown('member',$members)."</td></tr>";
	echo "<tr>";
	echo "<td><label for = 'name'>SET USERNAME : </label></td>";
		 $data = array('name' => 'name','id'=>'name', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'role'>ASSIGN ROLE : </label></td>";
		 
	echo "<td>".form_dropdown('user_role',$roles)."</td></tr>";
	//echo "<td>".form_password($data)."</td></tr>";

	
	/*echo "<tr><td><label for = 'password'>SET PASSWORD : </label></td>";
		 $data = array('name' => 'password','id'=>'password', 'size' => 25);
	echo "<td>".form_password($data)."</td></tr>";
	*/

	
	
	//echo "<tr><td><label for = 'repassword'>CONFIRM PASSWORD : </label></td>";
		// $data = array('name' => 'repassword','id'=>'repassword', 'size' => 25);
	//echo "<td>".form_password($data)."</td>";
	
	echo "<tr><td> </td>";
	echo "<td>".form_submit('submit','Create')." ".form_submit('cancel','cancel')."</td></tr>";
	echo "</table>";
?>