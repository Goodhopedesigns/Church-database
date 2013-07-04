<?php

       echo "<table  cellpadding = '0' cellspacing = '0' class='table table-striped table-bordered'>";
	echo "<tr><td colspan = '11' align = ''>
               <h4 class='alert alert-info'>".@$list_title."</h4>
               <div class='pull-left'>".@$links."</div>";
                echo "<div class='display_action pull-right'>";
                $excel = "<img src='".base_url()."images/excel.png' class='icon' >";
                echo anchor('expenditure/export /'.@$query,$excel);
                $pdf = " <img src='".base_url()."images/pdf.png' class='icon' >";
                echo $print = "<img src='".base_url()."images/print.png' class='icon' >";
                echo anchor_popup('expenditure/visitorListPdf/'.@$query,$pdf)         
                ."</div></td></tr>";
    echo       "<tr><th>S/N</th>
                <th>EXPENDITURE CATEGORY</th>
                <th>DESCRIPTION</th>
                <th>AMOUNT</th>
                <th>DATE</th>";
              if($_SESSION['user']['role'] == 1){
               echo "<th colspan = '2'>ACTION</th>";
              }
               echo "</tr>";
                $index = 0;
            foreach($answer as $key => $list)
                {
                    $index++;
                   echo "<td align = 'right'>".$index."</td>";
                   echo "<td>".$list['category']."</td>";
                   echo "<td>".$list['description']."</td>";
                   echo "<td>".$list['amount']."</td>";
                   echo "<td>".$list['date']."</td>";
                   if($_SESSION['user']['role'] == 1){
                   echo "<td>".anchor('expenditure/editExpenditureFrm/'.$list['id'],'Edit')."</td>";
                   echo "<td>".anchor('expenditure/deleteExpenditure/'.$list['id'],'Delete')."</td></tr>";
                   }
                }
                echo "<tr><td colspan=7>".@$links."</td></tr>";
                if($_SESSION['user']['role'] == 1){
                echo "<tr><td colspan ='7' align = 'center'>".anchor('expenditure/recordExpenditureFrm','RECORD NEW EXPENDITURE')."</td></tr>";
                }
    echo "</table>";
?>
