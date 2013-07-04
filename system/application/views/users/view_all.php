<?php
       	  $data = array('name' => 'search','align' => 'left', 'id' => 'appendedInputButton','class'=>'search_bar input-xxlarge', 'placeholder' => 'Your keyword here..');
	
	//putting a form..
	echo  "<div class='filter_div'>"
        ."Search users<br/><div class='input-append'>"
	.form_input($data).form_submit('users/search','search','class=btn btn-primary')
        ."</div></div>";

       echo "<table  cellpadding = '0' cellspacing = '0' class='table table-striped table-bordered'>";
	echo "<tr><td colspan = '11' align = ''>
               <h4 class='alert alert-info'>".@$list_title."</h4>
               <div class='pull-left'>".@$links."</div>";
                echo "<div class='display_action pull-right'>";
                $excel = "<img src='".base_url()."images/excel.png' class='icon' >";
                echo anchor('user/export /'.@$query,$excel);
                $pdf = " <img src='".base_url()."images/pdf.png' class='icon' >";
                echo $print = "<img src='".base_url()."images/print.png' class='icon' >";
                echo anchor_popup('user/userListPdf/'.@$query,$pdf)         
                ."</div></td></tr>";	
	echo "<tr><th>S/N</th>
            <th>Username</th>
            <th>Full name</th>
            <th>Last login</th>
            <th>Role</th>
            <th>Email</th>
            <th colspan = '3'>ACTION</th>
		  </tr>";
				$index = 0;
			foreach($answer  as $key => $list)
				{
					$index++;
                                        echo "<tr><td>".$index."</td>";
					echo "<td>".$list['username']."</td>";
                                        echo "<td>".$list['full_name']."</td>";
					echo "<td>".@$list['last_login']."</td>
                                             <td>".$list['role']."</td>
                                             <td>".$list['email']."</td>";
					echo "<td>".anchor('users/block/'.$list['id'],'block')."</td>";
					echo "<td>".anchor('users/changeRole/'.$list['id'],'Change Role')."</td>";
                                        echo "<td>".anchor('users/delete/'.$list['id'],'Delete','class=delete')."</td></tr>";
				}
					echo "<tr><td colspan = '11' align = ''>".anchor('user/adduser','ADD USER    ')."</td></tr>";
			  echo "</table>";	
?>