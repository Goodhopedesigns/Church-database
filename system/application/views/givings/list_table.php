<?php

echo "<table  cellpadding = '0' cellspacing = '0' class='table table-striped table-bordered'>";
	echo "<tr><td colspan = '11' align = ''>
               <h4 class='alert alert-info'>".@$list_title."</h4>
               <div class='pull-left'>".@$links."</div>";
                echo "<div class='display_action pull-right'>";
                $excel = "<img src='".base_url()."images/excel.png' class='icon' >";
                echo anchor('giving/export /'.@$query,$excel);
                $pdf = " <img src='".base_url()."images/pdf.png' class='icon' >";
                echo $print = "<img src='".base_url()."images/print.png' class='icon' >";
                echo anchor_popup('giving/visitorListPdf/'.@$query,$pdf)         
                ."</div></td></tr>";	
	echo "<tr><th>S/N</th>
              <th>MEMBER CODE</th>
              <th>MEMBER NAME</th>
              <th>CATEGORY</th>
              <th>DATE</th>
              <th>AMOUNT</th>";
            if($_SESSION['user']['role'] == 1){              
              echo "<th colspan = '2'>ACTION</th>";
            }
              echo   "</tr>";
				$index = 0;
			foreach($answer  as $key => $list)
				{
					$index++;
                                        echo "<tr><td>".$index."</td>";
					echo "<td>".$list['membercode']."</td>";
                                        echo "<td>".$list['name']."</td>";
					echo "<td>".$list['giving_category']."</td><td>".$list['date']."</td><td>".$list['amount']."</td>";
				if($_SESSION['user']['role'] == 1){           
                                        echo "<td>".anchor('giving/editGiving/'.$list['id'],'edit')."</td>";
					echo "<td>".anchor('giving/deleteGiving/'.$list['id'],'delete')."</td>";
                                }//end if
                                        echo "</tr>";
                                        
                                }//end foreach
                                       echo "<tr><td colspan = '11' align = ''>".@$links."</td></tr>";
				if($_SESSION['user']['role'] == 1){ 	
                                       echo "<tr><td colspan = '11' align = ''>".anchor('giving/addGiving','ADD GIVING INFORMATION    ')."</td></tr>";
                                }
			          echo "</table>";
?>
