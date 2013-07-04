<script>
     $(function() {
       $( "#datepicker1" ).datepicker();
     });
  
     $(function() {
       $( "#datepicker2" ).datepicker();
     });
  </script>
<?php
		
		echo form_open('index.php/attendance/attendanceByDates');
			echo "<table width = '850px'>";
				echo "<tr>";
					$data = array('name'=> 'date1', 'id'=> 'datepicker1','placeholder'=>'date1','readonly'=> '','size' => 10);
					echo "<td><label for 'date1'>START DATE</td><td>".form_input($data)."</label></td>";
		
					$data = array('name'=> 'date2', 'id'=> 'datepicker2','placeholder'=>'date2','readonly'=> '','size' => 10);
		
					echo "<td><label for 'date2'> END DATE </label></td><td>". form_input($data)."</td><td>".form_submit('date_search','search')."<br/>";
			echo "</tr>";
		
			if(!isset($date)){
					echo "<tr><td colspan = '2'>CLICK ".anchor('index.php/attendance/attendancePdf','HERE')." TO PRINT PDF</td></tr>";
			}
		else{
				
			echo "<tr><td colspan = '2'>CLICK ".anchor('index.php/attendance/attendanceByDatesPdf/'.$date1."/".$date2,'HERE')." TO PRINT PDF</td></tr>";
		}
		echo "</table>";
		echo form_close();
	echo "<table border = '1' cellpadding = '0' cellspacing = '0' align ='center' >";//id, date, no_males, no_females, no_children
	echo "<tr><th>S/N</th><th>DATE</th><th>NUMBER OF MALES</th><th>NUMBER OF FEMALES</th><th>NUMBER OF CHILDREN</th><th>DESCRIPTION</th></tr>";
				$index = 0;
				$avg_male = $answer['avg_male'];
				$avg_female = $answer['avg_female'];
				$avg_children = $answer['avg_children'];
				unset($answer['avg_male']);
				unset($answer['avg_female']);
				unset($answer['avg_children']);
			foreach($answer  as $key => $list)
				{	
					$index++;
					echo "<tr><td>".$index."</td>";
					echo "<td>".$list['date']."</td>";
					echo "<td>".$list['no_males']."</td><td>".$list['no_females']."</td>";
					echo "<td>".$list['no_children']."</td>";
					echo "<td>".$list['event_desption']."</td>";
				}
				echo "<tr><th colspan = '2'><center>AVERAGE</center></th>
					 <th>".$avg_male."</th><th>".$avg_female."</th>
					 <th>".$avg_children."</th>
				</tr>";
			  echo "</table>";
			  
?>