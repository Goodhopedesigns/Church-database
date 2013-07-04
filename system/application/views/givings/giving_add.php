<script>
     $(function() {
       $( "#datepicker" ).datepicker();
     });
  </script>
<?php 
	echo form_fieldset('Add Giving');
	echo "<table>";
	echo form_open('giving/addingGiving');
	echo "<tr>";
	echo "<td><label for = 'membercode'>MEMBER CODE : </label></td>";
		// $data = array('name' => 'mcode','id'=>'mcode', 'size' => 25);
	echo "<td>".form_dropdown('mcode',$answer)."</td>";
	//echo "<td><label for = 'category'>GIVING CATEGORY : </label></td>";
		// $data = array('name' => 'category','id'=>'category', 'size' => 25);
	//echo "<td>".form_input($data)."</td></tr>";
	
	echo "<td><label for = 'date'> DATE : </label></td>";
		 $data = array('name' => 'date','id'=>'datepicker','readonly' => '', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'amount'>AMOUNT : </label></td>";
		 $data = array('name' => 'amount','id'=>'amount', 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	
	echo "<td><label for = 'giving_category'> GIVING CATEGORY : </label></td>";
		 $data = array('name' => 'giving_category','id'=>'giving_category', 'size' => 25);
	echo "<td>".form_dropdown('giving_category',$categories)."</td></tr>";
	
	echo "<tr><td>".form_submit('submit','submit')."</td>";
	echo "<td>".form_submit('cancel','cancel')."</td></tr>";
	echo "</table>";
	echo form_fieldset_close();	
?>