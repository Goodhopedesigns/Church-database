<script>
     $(function() {
       $( "#datepicker" ).datepicker();
     });
</script>
<?php 
	echo "<table>";
	echo form_open('inventory/editingInventory/'.$inventory['id']."/".$inventory['statusid']."/".$inventory['bought_donated']);
	echo "<tr>";
	echo "<td><label for = 'item'>ASSET NAME  </label></td>";
		 $data = array('name' => 'itemname','id'=>'asset','value' => $inventory['itemname'], 'size' => 25);
	echo "<td>".form_input($data)."</td>";
        
	echo "<td><label for = 'ASSETCODE'>ASSET CODE </label></td>";
		 $data = array('name' => 'asset_code','id'=>'quantity','value' =>$inventory['asset_code'], 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
        
        echo "<tr>";
	echo "<td><label for = 'qty'>QUANTITY  </label></td>";
		 $data = array('name' => 'quantity','id'=>'quantity','value' =>$inventory['quantity'], 'size' => 10);
	echo "<td>".form_input($data)."</td>";
        
	echo "<td><label for = 'danated'> ACQUISITION MODE : </label></td>";
        $data = array($inventory['acquisition_mode'] => $inventory['acquisition_mode'],'purchased' => 'PURCHASED', 'donated' => 'DONATED', 'hire purchased' => 'HIRE PURCHASED');
	echo "<td>".form_dropdown('acquisition_mode',$data)."</td></tr>";
        
        echo "<tr><td><label for = 'status'> STATUS : </label></td>";
                $status[0] = $inventory['status'];
	echo "<td>".form_dropdown('status',$status)."</td>";
        
	echo "<td><label for = 'danated'> BOUGHT/DONATED BY : </label></td>";
        $answer[0] = $inventory['bought_donated_name'];
	echo "<td>".form_dropdown('bought_donated',$answer)."</td></tr>";

	echo "<tr><td><label for = 'monetory'>MONETARY VALUE : </label></td>";
		 $data = array('name' => 'monetary_value','id'=>'monetary','value' => $inventory['monetary_value'],'size' => 25);
	echo "<td>".form_input($data)."</td>";	
        
        echo "<td><label for = 'date'>DATE ACQUIRED : </label></td>";
		 $data = array('name' => 'date_acquired','id'=>'datepicker', 'readonly' => '','value' =>$inventory['date_acquired'] ,'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
        
        echo "<tr><td><label for = 'desc'>DESCRIPTION:</label></td>";
                $data = array('name' => 'description','value' => $inventory['description'],'rows' => 3, 'cols' => 18);
        echo "<td>".form_textarea($data)."</td></tr>";
	echo "<tr><td></td><td>".form_submit('submit','submit')."</td>";
	echo "<td>".form_submit('cancel','cancel')."</td></tr>";
        echo form_close();
	echo "</table>";
?>

