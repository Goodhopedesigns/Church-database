
<?php echo ' <table border = "1" cellpadding = "0" cellspacing = "0"> ';
 $index =0;
    if(count($answer)) 
    {
        echo "<tr><th>S/N</th><th>ASSET NAME</th><th>ASSET CODE</th><th>QUANTITY</th>
              <th>STATUS<th>ACQUISITION MODE</th></th><th>BOUGHT/DONATED BY</th><th>MONETARY VALUE</th></tr>";
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
        //  echo "<td>".anchor('inventory/editInventoryFrm/'.$list['id'],'Edit')."</td>";
          //echo "<td>".anchor('inventory/deleteInventoryAsset/'.$list['id'],'Delete','onclick="return confirmDelete()"')."</td>";
          echo "</tr>";
        }}

echo "</table>";
