
<?php
	echo "<table border = '1' cellpadding = '0' cellspacing = '0'>";
	echo "<tr><th>S/N</th><th>FULL NAME</th><th>SEX</th><th>TITLE</th>
			  <th>EMAIL</th><th>PHONE</th><th>COLLEGE</th><th>RESIDENCE</th><th>DATE VISITED</th>
		  </tr>";
			 	$index = 0;
			foreach($answer  as $key => $list)
				{
					$index++;
					echo "<tr><td>".$index."</td>";
					echo "<td>".strtolower($list['fname']." ".substr($list['mname'],0,1)." ".$list['surname'])."</td>";
					echo "<td>".$list['sex']."</td><td>".strtolower($list['title'])."</td><td>".$list['email']."</td>";
					echo "<td style='color:blue;'>".$list['phone']."</td>";
					echo "<td>".$list['college']."</td>";
					echo "<td>".$list['residence']."</td>";
					echo "<td>".$list['date_visited']."</td>";
					//echo "<td align='center'>".anchor('visitors/editVisitor/'.$list['id'],'edit')."</td>";
					//echo "<td>".anchor('visitors/deleteVisitor/'.$list['id'],'delete')."</td>";
				}
				
				//echo "<tr><td colspan = '10' align = 'center'>".anchor('visitors/addVisitor','ADD NEW VISITOR')."</td></tr>";
			  echo "</table>";
?>