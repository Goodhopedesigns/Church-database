<script type="text/javascript">
     $(function() {
       $( "#datepicker" ).datepicker();
     });
  </script>
<?php
	echo "<table>";
	echo form_open('attendance/editingAttendance/'.$answer['id']);
	echo "<tr>";
	echo "<td><label for = 'date'>DATE : </label></td>";
		 $data = array('name' => 'date','id'=>'datepicker','value' => $answer['date'] , 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
         $data_0 = array($answer['event']=>$answer['event']);
         
        $data = array('Sunday first mass' => 'Sunday first mass','Sunday second mass' => 'Sunday second mass', 'Wedding mass' => 'Wedding mass', 'Morning mass' => 'Morning mass','others'=>'others');
        $data = array_merge($data_0, $data);
        echo "<tr><td><label for = 'event'>EVENT TYPE: </label></td>";
	echo "<td>".form_dropdown('event_type',@$data)."</td></tr>";
	
	echo "<tr><td><label for = 'no_males'>NUMBER OF MALES : </label></td>";
		 $data = array('name' => 'no_males','id'=>'no_males', 'value' => $answer['no_males'], 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'no_females'>NUMBER OF FEMALES : </label></td>";
		 $data = array('name' => 'no_females','id'=>'no_females', 'value' => $answer['no_females'], 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	
	echo "<tr><td><label for = 'no_children'> NUMBER OF CHILDREN : </label></td>";
		 $data = array('name' => 'no_children','id'=>'no_children','value' => $answer['no_children'], 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'event'>EVENT DESCRIPTION : </label></td>";
		 $data = array('name' => 'event','id'=>'event','value' => $answer['event_description'],'class'=>'input-xxlarge', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
		//echo "<td>".form_input($data)."</td></tr>";		
	echo "<tr><td align='right'>".form_submit('submit','Edit','class=btn')."</td>";
	echo "<td align='center'>".form_submit('cancel','cancel','class=btn')."</td></tr>";
	echo "</table>";
?>