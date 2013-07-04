<?php
      echo "<table>";
    echo form_open('expenditure/expenditureCategoryAdd');
        echo "<tr><td><label for = 'mname'>EXPENDITURE CATEGORY : </label></td>";
		 $data = array('name' => 'category','id'=>'mname', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
        echo "<tr><td></td><td>".form_submit('submit','submit')."</td>";
         echo "<td>".form_submit('cancel','cancel')."</td></tr>";
    echo form_close();
    echo "</table>";
?>
