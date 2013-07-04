<?php 
	echo form_fieldset('Add Ministry');
	echo "<table>";
	echo form_open('Ministries/addingProcess');
	echo "<tr>";
	echo "<td><label for = 'name'> MINISTRY NAME : </label></td>";
		 $data = array('name' => 'name','id'=>'name','size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'description'>MINISTRY DESCRIPTION : </label></td>";
		 $data = array('name' => 'description','id'=>'description', 'size' => 200);
	echo "<td>".form_input($data)."</td>";
	
	echo "<tr><td>".form_submit('submit','submit')."</td>";
	echo "<td>".form_submit('cancel','cancel')."</td></tr>";
	echo "</table>";
	echo form_fieldset_close();	
?>