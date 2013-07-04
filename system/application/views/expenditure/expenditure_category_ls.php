<?php

echo "<table border = '1'>";
    echo "<tr><th>S/N</th><th>EXPENDITURE CATEGORY</th><th colspan = '2'>ACTION</th></tr>";
        $index = 0;
    foreach($answer as $key => $list)
        {
           $index++; 
           echo "<td>".$index."</td>";
           echo "<td>".$list['category']."</td>";
           echo "<td>".anchor('expenditure/expendCategoryEditFrm/'.$list['id'],'edit')."</td>";
            echo "<td >".anchor('expenditure/expendCategoryDelete/'.$list['id'],'delete')."</td>";
           echo "</tr>";
        }
        echo "<tr><td colspan = '4' align = 'center'>".anchor('expenditure/expenditureCategoryAddFrm','ADD NEW CATEGORY')."</td></tr>";
echo "</table>";
?>
