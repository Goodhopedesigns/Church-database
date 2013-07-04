<?php

//  @Author:stanley Godlove Mtonyole   <  stanleymtonyole@gmail.com>
?>

<?php
	echo "<table border = '1' cellpadding = '0' cellspacing = '0'>";
        echo "<tr><td colspan='5'>List Of All User Actions</td></tr>";
	echo "<tr><th>S/N</th><th>USER</th><th>ACTION</th><th>TIME</th><th>ACTION DESCRIPTION</th></tr>";
            $index = 0;
            foreach($answer  as $key => $list)
            {
                $index++;
                echo "<tr><td>".$index."</td>";
                echo "<td style='color:blue;'>".$list['user']."</td>";
                echo "<td>".$list['action']."</td>";
                echo "<td>".$list['time']."</td>";
                echo "<td>".$list['action_description']."</td>";
            }
        echo "</table>";
?>




