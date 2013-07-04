<?php

echo "<table  cellpadding = '0' cellspacing = '0' class='table table-striped table-bordered'>";
	echo "<tr><td colspan = '11' align = ''>
               <h4 class='alert alert-info'>".@$list_title."</h4>
               <div class='pull-left'>".$links."</div>";
                echo "<div class='display_action pull-right'>";
                $excel = "<img src='".base_url()."images/excel.png' class='icon' >";
                echo anchor('visitors/export /'.@$query,$excel);
                $pdf = " <img src='".base_url()."images/pdf.png' class='icon' >";
                echo $print = "<img src='".base_url()."images/print.png' class='icon' >";
                echo anchor_popup('visitors/visitorListPdf/'.@$query,$pdf)         
                ."</div></td></tr>";
      echo "<tr><th>S/N</th>
            <th>FULL NAME</th>
            <th>SEX</th>
            <th>TITLE</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>COLLEGE</th>
            <th>RESIDENCE</th>
            <th>DATE VISITED</th>";
         if($_SESSION['user']['role'] == 1){
            echo "<th>ACTION</th>";
              }  
            echo   "</tr>";
			 	$index = 0;
			foreach($answer  as $key => $list)
				{
					$index++;
					echo "<tr><td>".$index."</td>";
					echo "<td>".strtolower($list['fname']." ".substr($list['mname'],0,1)." ".$list['surname'])."</td>";
					echo "<td>".$list['sex']."</td><td>".strtolower($list['title'])."</td><td>".$list['email']."</td>";
					echo "<td style='color:blue;'>".$list['phone']."</td>";
					echo "<td>".$list['college']."</td>";
					echo "<td>".$list['residence']."</td>";
					echo "<td>".$list['date_visited']."</td>";
				if($_SESSION['user']['role'] == 1){
                                        echo "<td align='center'>".anchor('visitors/editVisitor/'.$list['id'],'edit')."</td>";
                                    }//end if  
					//echo "<td>".anchor('visitors/deleteVisitor/'.$list['id'],'delete')."</td>";
				}//end foreach
                                echo "<tr><td colspan = '10' align = 'center'>".@$links."</td></tr>";
				if($_SESSION['user']['role'] == 1){
				echo "<tr><td colspan = '10' align = 'center'>".anchor('visitors/addVisitorFrm','ADD NEW VISITOR')."</td></tr>";
                                }
			  echo "</table>";
?>
