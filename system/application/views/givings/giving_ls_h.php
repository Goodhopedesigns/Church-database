
<h3>LIST OF GIVING</h3>
<?php
	echo form_fieldset(' ');
	echo "<table border = '1' cellpadding = '0' cellspacing = '0'>";
	echo "<tr><th>S/N</th><th>MEMBER CODE</th><th>CATEGORY</th><th>DATE</th><th>AMOUNT</th>
		  </tr>";
				$index = 0;
			foreach($answer  as $key => $list)
				{
					$index++;
					echo "<tr><td>".$index."</td>";
					echo "<td>".$list['membercode']."</td>";
					echo "<td>".$list['giving_category']."</td><td>".$list['date']."</td><td>".$list['amount']."</td>";
				}
			  echo "</table>";
	echo form_fieldset_close();
?>