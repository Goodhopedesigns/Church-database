<?php

echo "<table  cellpadding = '0' cellspacing = '0' class='table table-striped table-bordered'>";
	echo "<tr><td colspan = '11' align = ''>
               <h4 class='alert alert-info'>".@$list_title."</h4>
               <div class='pull-left'>".$links."</div>";
                echo "<div class='display_action pull-right'>";
                $excel = "<img src='".base_url()."images/excel.png' class='icon' >";
                echo anchor('inventory/export /'.@$query,$excel);
                $pdf = " <img src='".base_url()."images/pdf.png' class='icon' >";
                echo $print = "<img src='".base_url()."images/print.png' class='icon' >";
                echo anchor_popup('inventory/inventoryListPdf/'.@$query,$pdf)         
                ."</div>";
                echo "</td></tr>";
                echo "<tr>";
                    echo "<th>S/N</th>
                        <th>MINISTRY NAME</th>
                        <th>MINISTRY DESCRIPTION</th>";
                        if($_SESSION['user']['role'] == 1){
                            echo "<th colspan = '2'>ACTION</th>";
                           } 
                echo "</tr>";
        $index = 0;
        foreach($answer as $key => $list)
        {
            $index++;
          echo "<tr>"; 
          echo "<td>".$index."</td>";
          echo "<td>".$list['name']."</td>";
          echo "<td>".$list['description']."</td>";
          if($_SESSION['user']['role'] == 1){
          echo "<td>".anchor('ministries/editFrm/'.$list['id'],'Edit')."</td>";           
          }//end if
          echo "<td>".anchor('ministries/details/'.$list['id'],'More details')."</td>";
        
          echo "</tr>";
        }

        echo "<tr><td colspan = '11' align = 'center'><center>".@$links."</center></td></tr>";
        echo "<tr>";
if($_SESSION['user']['role'] == 1){  
        echo "<td colspan ='11' align = 'center'>".anchor('ministries/addFrm','Add New Ministry')."</td>";
  }
        echo "</tr>";
        echo "</table>";
?>
