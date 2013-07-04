<?php

echo "<table border = 1 cellpadding = '0' cellspacing = '0'>";
echo "<tr><th>S/N</th><th>MEMBER</th><th>MINISTRY</th><th>ACTION</th></tr>";
    $index = 0;
    foreach($answer as $key => $list){
        $index++;
        echo "<td>".$index."</td>";
        echo "<td>".$list['member']."</td>";
        echo "<td>".$list['ministry']."</td>";
        echo "<td align = 'center'>".anchor('member_ministry/editMinistryFrm/'.$list['id'],'Edit')."</td></tr>";
    }
echo "<tr>";
echo "<td colspan = '4' align = 'center'>".anchor('member_ministry/assignMemberFrm/'.$list['id'],'ASSIGN A MEMBER TO A MINISTRY')."</td>";
echo "</tr>";
echo "</table>";
?>
