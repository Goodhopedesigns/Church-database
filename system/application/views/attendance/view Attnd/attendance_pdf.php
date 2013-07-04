<table  cellpadding = "0" cellspacing = "0">
	<tr>
		<td>
		<span id="header_title"><img src="<?php  echo base_url();?>/images/logo.jpg" height = "10%" width = "10%">
		</td>
		<td><big><h5>CITY HARVEST CHURCH FOR YOUNG PROFESSIONS COMMITED <br/><center>TO EXCELLENCE.</center></h5></big></td>
		<td><?php echo date('d/m/Y');?></td>
	</tr>
	<tr>
		<td colspan = "3">
			<center><h6><?php echo $header;?></h6></center>
		</td>
	</tr>
</table>
<table  cellpadding = "0" cellspacing = "0" border = "1" align ='center'>
<?php

	//echo "<table border = '1' cellpadding = '0' cellspacing = '0' align ='center' >";//id, date, no_males, no_females, no_children
	echo "<tr><th>S/N</th><th>DATE</th><th>NUMBER OF MALES</th><th>NUMBER OF FEMALES</th><th>NUMBER OF CHILDREN</th><th>DESCRIPTION</th></tr>";
				$index = 0;
				$avg_male = $answer['avg_male'];
				$avg_female = $answer['avg_female'];
				$avg_children = $answer['avg_children'];
				unset($answer['avg_male']);
				unset($answer['avg_female']);
				unset($answer['avg_children']);
			foreach($answer  as $key => $list)
				{	
					$index++;
					echo "<tr><td>".$index."</td>";
					echo "<td>".$list['date']."</td>";
					echo "<td><center>".$list['no_males']."</center></td><td><center>".$list['no_females']."</center></td>";
					echo "<td><center>".$list['no_children']."</center></td>";
					echo "<td>".$list['event_desption']."</td>";
				}
				echo "<tr><td></td><th><center>AVERAGE</center></th>
					 <th>".$avg_male."</th><th>".$avg_female."</th>
					 <th>".$avg_children."</th>
				</tr>";
			  echo "</table>";
?>
			  