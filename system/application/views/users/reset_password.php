<?php
	echo "<table>";
		if(isset($_SESSION['message']))
		{
			echo "<h3>".$_SESSION['message']."</h3>";
			session_unset($_SESSION['message']);
		}
	echo form_open(base_url().'Users/resetingPassword');
	
	echo "<tr><td><label for = 'oldpassword'>OLD PASSWORD : </label></td>";
		 $data = array('name' => 'oldpassword','id'=>'oldpassword', 'size' => 25);
	echo "<td>".form_password($data)."</td></tr>";

	
	echo "<tr><td><label for = 'nwpassword'>NEW PASSWORD : </label></td>";
		 $data = array('name' => 'nwpassword','id'=>'nwpassword', 'size' => 25);
	echo "<td>".form_password($data)."</td></tr>";
	
	echo "<tr><td><label for = 'cnwpassword'>CONFIRM PASSWORD : </label></td>";
		 $data = array('name' => 'cnwpassword','id'=>'cnwpassword', 'size' => 25);
	echo "<td>".form_password($data)."</td></tr>";
	
	echo "<tr><td> </td>";
	echo "<td>".form_submit('submit','Reset')." ".form_submit('cancel','cancel')."</td></tr>";
	echo "</table>";
?>