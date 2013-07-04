<?php

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
                ."</div></td></tr>";
echo "<tr><th>S/N</th>
      <th>DATE</th>
      <th>EVENT</th>
      <th>MALES</th>
      <th>FEMALES</th>
      <th>CHILDREN</th>";
 if($_SESSION['user']['role'] == 1){
 echo     "<th colspan = '2'>ACTION</th>";
 }
      echo "</tr>";
				$index = 0;
	  foreach($answer  as $key => $list){
                    $index++;
                    echo "<tr><td>".$index."</td>";
                    echo "<td>".$list['date']."</td>";
                    echo "<td>".@$list['event']."</td>";
                    echo "<td>".$list['no_males'].
                          "</td><td>".$list['no_females'].
                          "</td><td>".$list['no_children']."</td>";
                 if($_SESSION['user']['role'] == 1){
                    echo "<td>".anchor('attendance/editAttendance/'.$list['id'],'edit')."</td>";
                    echo "<td>".anchor('attendance/deleteAttendance/'.$list['id'],'delete')."</td>";
                    }//end if..
                  }
                 if($_SESSION['user']['role'] == 1){
		    echo "<tr><td colspan = '11' align = 'center'>".anchor('attendance/addAttendance','ADD NEW ATTENDANCE')."</td></tr>";
                   }
                    echo "</table>";
?>