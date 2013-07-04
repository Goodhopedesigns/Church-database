<center><h2><?php echo $header;?></h2></center>
<?php
echo "<table border = '1' cellpadding = '0' cellspacing = '0'>";//id, date, no_males, no_ females, no_children
echo "<tr><th>S/N</th><th>DATE</th><th>NUMBER OF MALES</th><th>NUMBER OF FEMALES</th><th>NUMBER OF CHILDREN</th></tr>";
    $index = 0;
    foreach($answer  as $key => $list)//id, date, no_males, no_ females, no_ children
    {
        $index++;
        echo "<tr><td>".$index."</td>";
        echo "<td>".$list['date']."</td>";
        echo "<td>".$list['no_males']."</td><td>".$list['no_females']."</td><td>".$list['no_children']."</td>";
    }
					
    echo "</table>";
?>