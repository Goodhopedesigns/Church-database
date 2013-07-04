
<h3>ATTENDANCE INFORMATION</h3>
<?php
	echo form_fieldset('');
	echo "<table border = '1' cellpadding = '0' cellspacing = '0'>";//id, date, no_males, no_females, no_children
	echo "<tr><th>S/N</th><th>DATE</th><th>NUMBER OF MALES</th><th>NUMBER OF FEMALES</th><th>NUMBER OF CHILDREN</th></tr>";
				$index = 0;
			foreach($answer  as $key => $list)
				{
					$index++;
					echo "<tr><td>".$index."</td>";
					echo "<td>".$list['date']."</td>";
					echo "<td>".$list['no_males']."</td><td>".$list['no_females']."</td>";
					echo "<td>".$list['no_children']."</td>";
				}
			  echo "</table>";
			  echo form_fieldset_close();
?>