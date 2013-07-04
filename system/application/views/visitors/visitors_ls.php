
<div class="error">
    
</div>
<script type="text/javascript">
     $(function() {
       $( "#datepicker1" ).datepicker();
     });
  
     $(function() {
       $( "#datepicker2" ).datepicker();
     });
  </script>
<?php
	 $pdf_query = @$query; // a variable for printing different reports on pdf......
	
	echo  form_open('visitors/search');
	echo "<div class='filter_div'>";
        echo " View by date range (visiting dates)....<br/>";
	 $data = array('name'=> 'date1', 'id'=> 'datepicker1','class'=>'datepicker','placeholder'=>'Between Date 1','style'=>'margin-left:12px;','readonly'=> '','size' => 20);
	echo "".form_input($data);
	
	$data = array('name'=> 'date2', 'id'=> 'datepicker2','class'=>'datepicker','placeholder'=>'And Date 2','readonly'=> '','size' => 20);
	
	echo  form_input($data)
        ."</div>";
	
	//echo " CLICK ".anchor('members/memberListPdf/'.$query,'HERE')." TO PRINT PDF</td></tr>";
		  $data = array('name' => 'search','align' => 'left', 'id' => 'appendedInputButton','class'=>'search_bar input-xxlarge', 'placeholder' => 'Your keyword here..');
	
	
	echo  "<div class='filter_div'>"
        ."Search visitor<br/><div class='input-append'>"
	.form_input($data).form_submit('visitors/search','search','class=btn btn-primary')
        ."</div></div>";
        //including list table file
        $this -> load -> view('visitors/list_table');
       
         echo form_fieldset_close();
?>