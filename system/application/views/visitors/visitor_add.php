
	<script>
     $(function() {
       $( "#datepicker" ).datepicker();
     });
  </script>
  
<?php
	echo "<table>";
	echo form_open('visitors/addingVisitor');
	echo "<tr>";
	echo "<td><label for = 'fname'>FIRST NAME : </label></td>";
		 $data = array('name' => 'fname','id'=>'fname', 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	echo "<td><label for = 'profession'>PROFESSION : </label></td>";
		 $data = array('name' => 'profession','id'=>'profession', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'mname'>MIDDLE NAME : </label></td>";
		 $data = array('name' => 'mname','id'=>'mname', 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	echo "<td><label for = 'date_visited'> DATE VISITED : </label></td>";
		 $data = array('name' => 'date_visited','id'=>'datepicker','readonly' =>'', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'mname'>SURNAME : </label></td>";
		 $data = array('name' => 'surname','id'=>'surname', 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	echo "<td><label for = 'phone'> MOBILE: </label></td>";
		 $data = array('name' => 'phone','id'=>'phone', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'sex'> SEX : </label></td>";
			echo "<td>MALE".form_radio('sex','M');
			echo "FEMALE".form_radio('sex','F');
	echo "</td>";
	echo "<td><label for = 'college'> COLLEGE : </label></td>";
		 $data = array('name' => 'college','id'=>'college', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'title'>TITLE : </label></td>";
		 $data = array('name' => 'title','id'=>'title', 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	echo "<td><label for = 'email'> EMAIL : </label></td>";
		 $data = array('name' => 'email','id'=>'email', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'residence'> RESIDENCE: </label></td>";
		 $data = array('name' => 'residence','id'=>'residence', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td> </td>";
	echo "<td align='right'>".form_submit('submit','submit').form_submit('cancel','cancel')."</td></tr>";
	echo "</table>";
?>