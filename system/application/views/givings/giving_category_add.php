
<?php 
	
	echo "<table>";
	echo form_open('givingcategory/addingCategory');
	echo "<td><label for = 'category'>GIVING CATEGORY : </label></td>";
		 $data = array('name' => 'category','id'=>'category', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td></td></td>";
	echo "<td align='center'>".form_submit('submit','Add','class=btn')." ".form_submit('cancel','cancel','class=btn')."</td></tr>";
	echo "</table>";
	echo form_fieldset_close();	
?>