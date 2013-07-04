<?php
echo "<table border = 1 cellpadding = '0' cellspacing = '0'>";
echo "<tr><th>S/N</th><th>MEMBER</th><th>MINISTRY</th></tr>";
    $index = 0;
    foreach($answer as $key => $list){
        $index++;
        echo "<td>".$index."</td>";
        echo "<td>".$list['member']."</td>";
        echo "<td>".$list['ministry']."</td></tr>";
    }
echo "</table>";
?>

