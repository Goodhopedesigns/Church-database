
<h3></h3>
<?php
	echo "<table  cellpadding = '0' cellspacing = '0' class='table table-striped table-bordered'>";
	echo "<tr><th>S/N</th><th>CATEGORY</th><th colspan = '2'>ACTION</th></tr>";
		$index = 0;
		foreach($answer  as $key => $list)
		{
			$index++;
			echo "<tr><td>".$index."</td>";
			echo "<td>".$list['category']."</td>";
                        echo "<td>".anchor('givingcategory/editCategory','Edit')."</td>";
                        echo "<td>".anchor('givingcategory/deleteCategory','Delete')."</td>";
		}
        echo       "<tr><td colspan = '4' align = 'center'>".anchor('givingcategory/addCategory','Add New Category')."</td></tr>";
	echo "</table>";
	
	
?>