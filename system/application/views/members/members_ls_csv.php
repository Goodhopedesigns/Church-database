<?php	
	if(count($csv)){
		echo form_open('members/import');
		echo form_submit('cancel',' <<start over');
		echo form_submit('submit','finalize Import>>');
	
?>
	<table border = '1' cellspacing = '0' cellpadding = '5'>
		<tr valign = 'top'>
		<?php
			$error = array();
	  $headers = array_keys($csv['csv_data'][0]);
      $col_num = 0;
	  echo "<th> s#</th>  \n";  
    foreach ($headers as $v){ 
      $hdr = trim(str_replace('"','',$v));
	  $col_num++;
	 //checking headers if exist in databse table, 
	 //
	  if(in_array($hdr,$dbheaders) || $hdr == '' ){
			$error[$hdr] = false; 
       }else{ 
      $error[$hdr] = true; 
     }
      if ($hdr != '' ){ //removing empty fields..
	          echo "<th> ".$hdr;
			    if ($error[$hdr]){  
              echo "<span class='mandatory'>* <blink>error</blink></span>\n";
           	     }
			  "</th>  \n";  
			  
      }
    }
		?>
		</tr>
		<?php
	foreach ($csv['csv_data'] as $key =>  $line){
    echo "<tr valign='top' > <td>".($key+1)."</td>\n";
    foreach ($line as $f =>  $d){ 
      $FIELD = trim(str_replace('"','',$f));
      $FDATA = trim(str_replace('"','',$d));
      if ($FIELD != ''){ //excluding empty fields..
        echo "<td> ";
        echo $FDATA . "\n";
        echo form_hidden("line_".$key."[".$FIELD."]",$FDATA);
        echo "</td> \n";
      }
    }
    echo "</tr> \n";
  }  
				?>
				</table>
 <?php
			echo form_hidden('csvgo',true);
			echo form_close();
			}else{
					echo "<h1> We detected a problem... </h1> ";
					echo "<p> No records to import! Please try again. </p> ";
}			
?>