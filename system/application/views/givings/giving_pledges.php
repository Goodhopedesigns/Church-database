<?php	

	//echo $cat = $answer['cat'];exit;
	echo "<table>";	
	echo form_open('index.php/pledge_details/pledgeDetailsByCategory');
		echo "<tr>";
			echo "<td align = 'left'>";
				$categories[0] = "--SPECIFY ONE--";
				echo "<td><label for = 'category'><strong>VIEW BY CATEGORY</strong></label><td>".form_dropdown('category',$categories);
			echo "</td><td>".form_submit('submit','submit')."</td>";
		echo "</tr>";
		echo form_close();
	echo "</table>";
	echo "<table border = 1 cellspacing = '0' cellpadding = '0' align = 'center'>";
		echo "<tr>";
			echo "<th>S/N</th><th>MEMBER</th>";if(!isset($cat)){ echo "<th>CATEGORY PLEDGED ON</th>";}
			echo "<th>DATE OF PLEDGE</th><th>PLEDGED AMOUNT</th>
				  <th>PAID AMOUNT</th><th>UNCLEARED AMOUNT</th>";
		
		echo "</tr>";
			$totalPledgedAmount = $answer['TOTAL'];
			$paidPledges = $answer['PAID_PLEDGES'];
			unset($answer['PAID_PLEDGES']);
			unset($answer['TOTAL']);
			$index = 0;
		foreach($answer as $ey => $list){	//print_r($list);exit;
			 $index++;
			echo "<tr>";
					$pledged_amount = $list['pledged_amount'] - $list['paid_amount'];
				echo "<td>".$index."</td><td>".$list['name']."</td>";if(!isset($cat)){echo "<td>".$list['category']."</td>";}
				echo "<td>".$list['date']."</td><td align = 'right'>".$list['pledged_amount']."</td>
					  <td align='right'>".$list['paid_amount']."</td></td><td>
					  ".$pledged_amount."</td>";
			echo "</tr>";
			}
			
				if(!isset($cat)){echo "<td colspan = 4 ><center><big><b>TOTAL</b></big></center></td>";}
				else{ echo "<td colspan = 3 ><center><big><b>TOTAL</b></big></center></td>";}
				echo "<th><b>".$totalPledgedAmount."</b></th>
						<th><b>".$paidPledges."</b></th><th><b>".$debt = $totalPledgedAmount - $paidPledges."</b></th>";
			echo "</tr>";
		
	echo "</table>";