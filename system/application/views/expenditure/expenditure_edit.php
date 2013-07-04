	<script>
     $(function() {
       $( "#from-datepicker" ).datepicker();
     });
  </script>

<?php 
        $expend_category = $expenditure['expenditure_category'];
    echo "<table>";
        echo form_open('expenditure/editingExpenditure/'.$expenditure['id']."/".$expend_category);
        echo "<tr><td><label for = 'related'> CATEGORY: </label></td>";
		 $data = array('name' => 'category','id'=>'category', 'size' => 25);
                 $answer[0] = $expenditure['category_name'];
	echo "<td>".form_dropdown('category',$answer)."</td></tr>";
    
        echo "<tr><td><label for = 'date'>DATE : </label></td>";
		 $data = array('name' => 'date','id'=>'from-datepicker','readonly' => '','value'=> $expenditure['date'], 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
        
        echo "<tr><td><label for = 'amount'>AMOUNT : </label></td>";
		 $data = array('name' => 'amount','id'=>'amount','value' =>$expenditure['amount'], 'size' => 25);
	echo "<td>".form_input($data)."</td>";
        echo "<tr><td><label for = 'amount'>DESCRIPTION</label></td><td>";
             $data = array('name'=> 'description','id'=> 'desc','rows'=> 5,'value' =>$expenditure['description'], 'cols'=> '40');
        echo form_textarea($data) ."</td></tr> ";
        echo "<td></td><td>".  form_submit('submit','submit')."</td>";
        echo "<td>".  form_submit('cancel','cancel')."</td>";
        echo form_close();
    echo "</table>";
?>

