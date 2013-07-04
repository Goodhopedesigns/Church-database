<?php
if(count($details) == '0'){
    echo "No details for the ministry found "; 
    if($_SESSION['user']['role'] == 1){
    echo anchor('ministries/addMembers/'.@$ministry['id'],'Add members'); }
    }//end if
else{

echo "<table  cellpadding = '0' cellspacing = '0' class='table table-striped table-bordered'>";
	echo "<tr><td colspan = '11' align = ''>
               <h4 class='alert alert-info'>".@$list_title."</h4>
               <div class='pull-left'>".$links."</div>";
                echo "<div class='display_action pull-right'>";
                $excel = "<img src='".base_url()."images/excel.png' class='icon' >";
                echo anchor('inventory/export /'.@$query,$excel);
                $pdf = " <img src='".base_url()."images/pdf.png' class='icon' >";
                echo $print = "<img src='".base_url()."images/print.png' class='icon' >";
                echo anchor_popup('inventory/inventoryListPdf/'.@$query,$pdf)         
                ."</div>";
                echo "</td></tr>";
                //fname	mname	surname	sex
                echo "<tr>";
                    echo "<th>S/N</th>
                        <th>FIRST NAME</th>
                        <th>MIDDLE NAME</th>
                        <th>LAST NAME</th>
                        <th>POSITION</th>
                        <th>SEX</th>";
                        if($_SESSION['user']['role'] == 1){
                            echo "<th colspan = '2'>ACTION</th>";
                           } 
                echo "</tr>";
        $index = 0;
        foreach($details as $key => $list)
        {
            $index++;
          echo "<tr>"; 
          echo "<td>".$index."</td>";
          echo "<td>".$list['fname']."</td>";
          echo "<td>".$list['mname']."</td>";
          echo "<td>".$list['lname']."</td>";
          echo "<td>".$list['sex']."</td>";
          echo "<td>".@$list['position']."</td>";
          if($_SESSION['user']['role'] == 1){
          echo "<td class='disabled'>".anchor('ministries/editMember/'.$list['id'],'Edit','class=disabled')."</td>";
          echo "<td class='disabled'>".anchor('ministries/removeMember/'.$list['id'],'Remove member','onclick="return confirmDelete()"','class=disabled')."</td>";
         }//end if
          echo "</tr>";
        }

        echo "<tr><td colspan = '11' align = 'center'><center>".@$links."</center></td></tr>";
        echo "<tr>";
if($_SESSION['user']['role'] == 1){  
        echo "<td colspan ='11' align = 'center'>".anchor('ministries/addMembers/'.$ministry['id'],'Add New Member(s)')."</td>";
  }
        echo "</tr>";
        echo "</table>";
}
?>
