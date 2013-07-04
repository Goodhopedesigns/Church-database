	<script>
     $(function() {
       $( "#datepicker" ).datepicker();
     });
  </script>
<?php
        
	echo "<table>";
	echo form_open('visitors/editingVisitor/'.$answer['id']);
	echo "<tr>";
	echo "<td><label for = 'fname'>FIRST NAME : </label></td>";
		 $data = array('name' => 'fname','id'=>'fname','value' => $answer['fname'] , 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	echo "<td><label for = 'profession'>PROFESSION : </label></td>";
		 $data = array('name' => 'profession','id'=>'profession', 'value' => $answer['profession'], 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'mname'>MIDDLE NAME : </label></td>";
		 $data = array('name' => 'mname','id'=>'mname', 'value' => $answer['mname'], 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	echo "<td><label for = 'date_visited'> DATE VISITED: </label></td>";
		 $data = array('name' => 'date_visited','id'=>'datepicker','value' => $answer['date_visited'], 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'surname'>SURNAME : </label></td>";
		 $data = array('name' => 'surname','id'=>'surname','value' => $answer['surname'], 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	echo "<td><label for = 'phone'> MOBILE: </label></td>";
		 $data = array('name' => 'phone','id'=>'phone','value' => $answer['phone'], 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'sex'> SEX : </label></td>";
			echo "<td>MALE".form_radio('sex','M');
			echo "FEMALE".form_radio('sex','F');
	echo "</td>";
	echo "<td><label for = 'college'> COLLEGE : </label></td>";
		 $data = array('name' => 'college','id'=>'college','value' => $answer['college'], 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'title'>TITLE : </label></td>";
		 $data = array('name' => 'title','id'=>'title','value' => $answer['title'], 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	echo "<td><label for = 'email'> EMAIL : </label></td>";
		 $data = array('name' => 'email','id'=>'email','value' => $answer['email'], 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'residence'> RESIDENCE: </label></td>";
		 $data = array('name' => 'residence','id'=>'residence','value' => $answer['residence'], 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td> </td>";
	echo "<td align='right'>".form_submit('submit','submit').form_submit('cancel','cancel')."</td></tr>";
	echo "</table>";
?>