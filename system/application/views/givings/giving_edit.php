
<?php
	echo form_fieldset('Edit Giving');
	echo "<table>";
	echo form_open('giving/editingGiving/'.$answer['id']);

	echo "<tr>";
	echo "<td><label for = 'membercode'>MEMBER CODE : </label></td>";
		 $data = array('name' => 'membercode','id'=>'membercode','value' => $answer['membercode'] , 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	
/*	
	echo "<td><label for = 'giving_category'>GIVING CATEGORY : </label></td>";
		 $data = array('name' => 'giving_category','id'=>'giving_category', 'value' => $answer['giving_category'], 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
*/
	echo "<td><label for ='category'> GIVING CATEGORY :</label></td>";
		$category[0] = $category[$answer['giving_category']];
		$category[$answer['giving_category']] = $answer['giving_category'];
	echo "<td>".form_dropdown('giving_category',$category)."</td><tr>";

	echo "<tr><td><label for = 'date'>DATE : </label></td>";
		 $data = array('name' => 'date','id'=>'date', 'value' => $answer['date'], 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	echo "<td><label for = 'amount'> AMOUNT : </label></td>";
		 $data = array('name' => 'amount','id'=>'amount','value' => $answer['amount'], 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
					
	echo "<tr><td>".form_submit('submit','submit')."</td>";
	echo "<td>".form_submit('cancel','cancel')."</td></tr>";

	echo "</table>";
	echo form_fieldset_close();
?>