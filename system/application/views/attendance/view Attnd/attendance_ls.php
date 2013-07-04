
<div class="error">
    
</div>
<script type="text/javascript">
     $(function() {
       $( "#datepicker1" ).datepicker();
     });
  
     $(function() {
       $( "#datepicker2" ).datepicker();
     });
  </script>
<?php
	 $pdf_query = @$query; // a variable for printing different reports on pdf......
	
	echo  form_open('attendance/search');
	echo "<div class='filter_div'>"
        ."View by Acquisition mode...........    &nbsp;&nbsp; View by date purchased/donated....<br/>";
	$data = array('selectone' => '--select one--','purchased' => 'PURCHASED', 'donated' => 'DONATED', 'hire purchased' => 'HIRE PURCHASED');
	echo  form_dropdown('acquisition_mod',@$data);
			$data = array('name'=> 'date1', 'id'=> 'datepicker1','class'=>'datepicker','placeholder'=>'Between Date 1','style'=>'margin-left:12px;','readonly'=> '','size' => 20);
	echo "".form_input($data);
	
	$data = array('name'=> 'date2', 'id'=> 'datepicker2','class'=>'datepicker','placeholder'=>'And Date 2','readonly'=> '','size' => 20);
	
	echo  form_input($data)
        ."</div>";
	
	//echo " CLICK ".anchor('members/memberListPdf/'.$query,'HERE')." TO PRINT PDF</td></tr>";
		  $data = array('name' => 'search','align' => 'left', 'id' => 'appendedInputButton','class'=>'search_bar input-xxlarge', 'placeholder' => 'Your keyword here..');
	
	
	echo  "<div class='filter_div'>"
        ."Search Member<br/><div class='input-append'>"
	.form_input($data).form_submit('inventory/search','search','class=btn btn-primary')
        ."</div></div>";
        echo "<table  cellpadding = '0' cellspacing = '0' class='table table-striped table-bordered'>";
	echo "<tr><td colspan = '11' align = ''>
               <h4 class='alert alert-info'>".@$list_title."</h4>
               <div class='pull-left'>".$links."</div>";
                echo "<div class='display_action pull-right'>";
                $excel = "<img src='".base_url()."images/excel.png' class='icon' >";
                echo anchor('attendance/export /'.@$query,$excel);
                $pdf = " <img src='".base_url()."images/pdf.png' class='icon' >";
                echo $print = "<img src='".base_url()."images/print.png' class='icon' >";
                echo anchor_popup('attendance/attendanceListPdf/'.@$query,$pdf)         
                ."</div>";
                
	echo form_fieldset('Manage Attendance');
	echo "<table border = '1' cellpadding = '0' cellspacing = '0'>";//id, date, no_males, no_ females, no_children
	echo "<tr><th>S/N</th><th>DATE</th><th>NUMBER OF MALES</th><th>NUMBER OF FEMALES</th><th>NUMBER OF CHILDREN</th><th colspan = '2'>ACTION</th></tr>";
				$index = 0;
			foreach($answer  as $key => $list)//id, date, no_males, no_ females, no_ children
				{
					$index++;
					echo "<tr><td>".$index."</td>";
					echo "<td>".$list['date']."</td>";
					echo "<td>".$list['no_males']."</td><td>".$list['no_females']."</td><td>".$list['no_children']."</td>";
					echo "<td>".anchor('attendance/editAttendance/'.$list['id'],'edit')."</td>";
					echo "<td>".anchor('attendance/deleteAttendance/'.$list['id'],'delete')."</td>";
				}
					echo "<tr><td colspan = '11' align = 'center'>".anchor('attendance/addAttendance','ADD NEW ATTENDANCE')."</td></tr>";
			  echo "</table>";
	echo form_fieldset_close();
?>