

<script>
     $(function() {
       $( "#datepicker1" ).datepicker();
     });
  
     $(function() {
       $( "#datepicker2" ).datepicker();
     });
  </script>

<?php
	
	echo "<table align = 'center'  width = '850px' >";
		echo "<tr>";
			echo form_open('index.php/giving/givingReportBycat');
				echo "<td align = 'right' >";
						echo form_dropdown('category',$category)."</td><td>".form_submit('submit','submit');
				echo "</td><td>TO VIEW AND PRINT DETAILED GIVING REPORTS CLICK <big><b>".anchor('index.php/giving/givingDetailedReport','HERE')."</b></big></td>";
			echo form_close();
		echo "</tr>";
		echo "<tr>";
				echo form_open('index.php/giving/givingReportByDates');
					$data = array('name' => 'date1','id' => 'datepicker1','readonly' =>'','size' => 10);
					echo "<td><label for = 'date1'>DATE FROM </label>".form_input($data)."</td>";
						 $data = array('name' => 'date2','id' => 'datepicker2','readonly' =>'','size' => 10);
						echo "<td><label for = 'date2'>DATE TO </label>".form_input($data);
					echo "</td><td>"."<br/>".form_submit('search_date','submit')."</td>";
				echo form_close();
		echo "</tr>";
		echo "</table>";
		
		echo "<table border = 1 cellpadding = '0' cellspacing = '0' align = 'center' border = '850px'>";
		echo "<tr><th>S/N</th><th>MEMBER CODE</th><th> NAME </th><th>DATE</th><th>AMOUNT</th>
		  </tr>";
				$total = $answer['TOTAL'];
				unset($answer['TOTAL']);
				$index = 0;
			foreach($answer  as $key => $list)
				{	//print_r($list);exit;
					$index++;
					echo "<tr><td>".$index."</td>";
					echo "<td>".$list['membercode']."</td>";
					echo "<td>".$list['name']."</td><td>".$list['date']."</td><td align = 'right'>".$list['amount']."</td>";
	 	}
		echo "<tr><td colspan = 4 align = 'right'><center><big>TOTAL</big></center></td><th><b>".$total."</b></th></tr>";
	echo "</table>";
	
?>