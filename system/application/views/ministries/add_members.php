<form action="<?= base_url()?>ministries/addingMembers" method="post">
<?php
echo "<table  cellpadding = '0' cellspacing = '0' class='table table-striped table-bordered'>";
	echo "<tr><td colspan = '11' align = ''>
               <h4 class='alert alert-info'>".@$list_title."</h4>
               <div class=''><center>".@$links."</center></div>";                
                echo "</td></tr>";
                echo "<tr>
                          <th></th>
                          <th>S/N</th><th>FULL NAME</th>
                          <th>SEX</th>
                          <th>TITLE</th>
			  <th>EMAIL</th>
                          <th>RESIDENCE</th>"
                          ."<th>CODE NUMBER</th>"
                          ."<th>WELCOME GROUP</th>";                         
			   
		  echo "</tr>";
			 	$index = 0;
                                $i = 0;
                       if(count($members) > 0){         
			foreach($members  as $key => $member){	//print_r($member);
					$index++;
                                        //$data = array('name'=>'member_'.++$i, 'class'=>'check-box');
                                        echo "<tr>";?>
                               <td><input type="checkbox" name="member_<?= ++$i ?>" value="<?= $member['id']?>"></td>
				<?	echo "<td>".$index."</td>";
					echo "<td>".strtolower($member['fname']." ".substr($member['mname'],0,1)." ".$member['surname'])."</td>";
					echo "<td>".$member['sex']."</td><td>".strtolower($member['title'])."</td><td>".$member['email']."</td>";
					echo "<td>".$member['residence']."</td>";
                                        echo "<td>".$member['code_no']."</td><td>"
                                        .strtolower($member['welcome_groupno'])."</td>";
					//echo "<td>".$member['date_joined']."</td>";				
				}?>
                             <input type="hidden" name="members" value="<?= $i?>">   
                     <?  }else{ //no result found , $members == 0 
                                        echo "<tr><td colspan = '10' align = 'center' style='font-size:22px;color:lightgray;'><center>No Record(s) found!</center></td></tr>";
                       }                                  		
                                        echo "<tr><td colspan = '10' align = 'center'><center>".@$links."</center></td></tr>";                                      
                                        echo "<tr><td colspan = '5' align = 'center'><center>".form_submit('submit','Add members')."</center></td>
                                                  <td colspan = '5' align = 'center'><center>".form_submit('cancel','Cancel')."</center></td> 
                                             </tr>";
                                        
			  echo "</table>";
                          ?>
              </form>