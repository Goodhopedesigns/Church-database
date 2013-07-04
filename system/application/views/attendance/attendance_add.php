<script type="text/javascript">
     $(function() {
       $( "#datepicker" ).datepicker();
     });
  </script>
<?php 
	echo form_fieldset('Add Attendance');
	echo "<table>";
	echo form_open('attendance/addingAttendance');
	echo "<td><label for = 'date'>DATE : </label></td>";
		 $data = array('name' => 'date','id'=>'datepicker', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
        $data = array('Sunday first mass' => 'Sunday first mass','Sunday second mass' => 'Sunday second mass', 'Wedding mass' => 'Wedding mass', 'Morning mass' => 'Morning mass','others'=>'others');
        echo "<td><label for = 'event'>EVENT TYPE: </label></td>";
	
        echo "<td>".form_dropdown('event_type',@$data)."</td></tr>";
	echo "<td><label for = 'no_males'>NUMBER OF MALES : </label></td>";
		 $data = array('name' => 'no_males','id'=>'no_males', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";

	echo "<td><label for = 'no_females'>NUMBER OF FEMALES : </label></td>";
		 $data = array('name' => 'no_females','id'=>'no_remales', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<td><label for = 'no_children'>NUMBER OF CHILDREN : </label></td>";
		$data = array('name' => 'no_children','id'=>'no_children', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";

	echo "<td><label for = 'event'>EVENT DESCRIPTION : </label></td>";
		$data = array('name' => 'description','id'=>'event','class'=>'input-xxlarge', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";

	
	
	echo "<tr><td>".form_submit('submit','Add')."</td>";
	echo "<td>".form_submit('cancel','cancel')."</td></tr>";
	echo "</table>";
	echo form_fieldset_close();	
?>