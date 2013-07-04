<fieldset>
<legend>
<center><h2><?php echo $header;?></h2></center>
</legend>
<table border = "1" cellpadding = "0" cellspacing = "0">
 <?php
 $index =0;
    if(count($answer)) 
       {
         echo "<tr><th>S/N</th><th>FULL NAME</th><th>SEX</th><th>TITLE</th>
			  <th>EMAIL</th><th>RESIDENCE</th><th>CODE NUMBER</th><th>WELCOME GROUP</th><th>DATE JOINED</th>
		  </tr>";
            foreach($answer as $key => $list)
                {
				$index++;
					echo "<tr><td>".$index."</td>";
					echo "<td>".$list['fname']."</td>";
					echo "<td>".$list['sex']."</td><td>".$list['title']."</td><td>".$list['email']."</td>";
					echo "<td>".$list['residence']."</td><td>".$list['code_no']."</td><td>".$list['welcome_groupno']."</td>";
					echo "<td>".$list['date_joined']."</td></tr>";
				 }				
		}
		echo "</table>";
               	
  echo "</fieldset>";