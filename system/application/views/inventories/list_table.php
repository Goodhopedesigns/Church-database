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
                echo "</td></tr>";echo "<tr>";
        echo "<th>S/N</th>
              <th>ASSET NAME</th>
              <th>ASSET CODE</th>
              <th>QUANTITY</th>
              <th>STATUS<th>ACQUISITION MODE</th>
              </th><th>BOUGHT/DONATED BY</th>
              <th>MONETARY VALUE</th>";
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
          echo "<td>".$list['itemname']."</td>";
          echo "<td>".$list['asset_code']."</td>";
          echo "<td align = 'right'>".$list['quantity']."</td>";
          echo "<td>".$list['status']."</td>";
          echo "<td>".$list['acquisition_mode']."</td>";
          echo "<td>".$list['bought_donated']."</td>";
          echo "<td align ='right'>".$list['monetary_value']."</td>";
       if($_SESSION['user']['role'] == 1){
          echo "<td>".anchor('inventory/editInventoryFrm/'.$list['id'],'Edit')."</td>";
          echo "<td>".anchor('inventory/deleteInventoryAsset/'.$list['id'],'Delete','onclick="return confirmDelete()"')."</td>";
         }//end if
          echo "</tr>";
        }

        echo "<tr><td colspan = '11' align = 'center'><center>".@$links."</center></td></tr>";
        echo "<tr>";
if($_SESSION['user']['role'] == 1){  
        echo "<td colspan ='11' align = 'center'>".anchor('inventory/inventoryTakingFrm','ADD NEW ASSET')."</td>";
  }
        echo "</tr>";
        echo "</table>";
?>
