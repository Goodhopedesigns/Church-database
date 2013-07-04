<?php

echo "<table  cellpadding = '0' cellspacing = '0' class='table table-striped table-bordered'>";
	echo "<tr><td colspan = '11' align = ''>
               <h4 class='alert alert-info'>".@$list_title."</h4>
               <div class='pull-left'>".$links."</div>";
                echo "<div class='display_action pull-right'>";
                $excel = "<img src='".base_url()."images/excel.png' class='icon' >";
                echo anchor('members/export /'.$query,$excel);
                $pdf = " <img src='".base_url()."images/pdf.png' class='icon' >";
                echo $print = "<img src='".base_url()."images/print.png' class='icon' >";
                echo anchor_popup('members/memberListPdf/'.$query,$pdf)         
                ."</div>";
                echo "</td></tr>";
        echo "<tr><th>S/N</th><th>FULL NAME</th>
                          <th>SEX</th>
                          <th>TITLE</th>
			  <th>EMAIL</th>
                          <th>RESIDENCE</th>"
                          //."<th>CODE NUMBER</th>"
                          ."<th>WELCOME GROUP</th>";
                          //."<th>DATE JOINED</th>"
			  if($_SESSION['user']['role'] == 1){
                             echo "<th colspan = '2'>ACTION</th>";
                               }   
		  echo "</tr>";
			 	$index = 0;
                       if(count($answer) > 0){         
			foreach($answer  as $key => $list){	//print_r($list);
					$index++;
					echo "<tr><td>".$index."</td>";
					echo "<td>".strtolower($list['fname']." ".substr($list['mname'],0,1)." ".$list['surname'])."</td>";
					echo "<td>".$list['sex']."</td><td>".strtolower($list['title'])."</td><td>".$list['email']."</td>";
					echo "<td>".$list['residence']."</td><td>"
                                        //.$list['code_no']."</td><td>"
                                        .strtolower($list['welcome_groupno'])."</td>";
					//echo "<td>".$list['date_joined']."</td>";
				if($_SESSION['user']['role'] == 1){
                                        echo "<td>".anchor('members/editMember/'.$list['id'],'edit')."</td>";
					echo "<td>".anchor('members/deleteMember/'.$list['id'],'delete','class="delete"')."</td>";
                                         }
				}
                       }else{ //no result found , $answer == 0 
                                        echo "<tr><td colspan = '11' align = 'center' style='font-size:22px;color:lightgray;'><center>No Record(s) found!</center></td></tr>";
                       }  
                                
		
                                        echo "<tr><td colspan = '11' align = 'center'><center>".$links."</center></td></tr>";                                      
                		if($_SESSION['user']['role'] == 1){
                                        echo "<tr><td colspan = '11' align = 'center'>".anchor('members/addmember','ADD NEW MEMBER')."</td></tr>";
                                }
                                        
			  echo "</table>";
                          ?>