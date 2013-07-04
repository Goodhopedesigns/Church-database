<?php
        //print_r($answer);exit;
	echo "<table>";
	echo form_open('ministries/editingProcess/'.$answer['id']."/");
	echo "<tr>";
	echo "<td><label for = 'name'>MINISTRY NAME : </label></td>";
		 $data = array('name' => 'name','id'=>'name','value' => $answer['name'] , 'size' => 25);
	echo "<td>".form_input($data)."</td>";
        
	echo "<td><label for = 'description'>MINISTRY DESCRIPTION : </label></td>";
		 $data = array('name' => 'description','id'=>'description', 'value' => $answer['description'], 'size' => 200);
	echo "<td>".form_input($data)."</td></tr>";
	
			
	echo "<tr><td></td><td>".form_submit('submit','submit','class=btn')."</td>";
	echo "<td></td><td>".form_submit('cancel','cancel','class=btn')."</td></tr>";
	echo "</table>";
?>