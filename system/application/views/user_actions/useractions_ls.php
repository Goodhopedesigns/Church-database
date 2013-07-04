<?php

//  @Author:stanley Godlove Mtonyole   <  stanleymtonyole@gmail.com>
?>


<p><?php
echo form_open("userActions/userActionByUser");
//echo "<span style='padding-right: 10px;color:blue;border: 1px solid whiteSmoke;padding: 5px;margin-right: 10px;background: #D3DBD9;'> Set Date Range For User Actions &nbsp; </span><br/><br/>";
//echo "Start Date"."&nbsp;"."&nbsp;"."<input type = 'text' name = 'date1' id = 'd1'>"."&nbsp;"."&nbsp;"."&nbsp;";
//echo "End Date"."&nbsp;"."&nbsp;<input type = 'text' name = 'date2' id = 'd2'><br/>";

echo "<label for ='user'> Select User </label>";
echo " ".form_dropdown('user',$answer)." ";

echo"<input type='submit' name='search' value='Search Actions'>";
echo"<input type='submit' name='cancsearchel' Value='Cancel'>";
echo form_close();

?></p>



<?php
	$user=$_SESSION['user']['userid'];//trial
        echo "<table border = '1' cellpadding = '0' cellspacing = '0'>";
        echo "<tr><td colspan='5'>List Of All User Actions</td></tr>";
	echo "<tr><th>S/N</th><th>USER</th><th>ACTION</th><th>TIME</th><th>ACTION DESCRIPTION</th></tr>";
            $index = 0;
            foreach($answer  as $key => $list)
            {
                $index++;
                echo "<tr><td>".$index."</td>";
                echo "<td style='color:blue;'>".$list['name']."</td>";
                echo "<td>".$list['action']."</td>";
                echo "<td>".$list['time']."</td>";
                echo "<td>".$list['action_description']."</td>";
            }
        echo "</table>";
?>
