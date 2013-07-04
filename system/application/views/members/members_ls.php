<script type="text/javascript">
     $(function() {
       $( "#datepicker1" ).datepicker();
     });
  
     $(function() {
       $( "#datepicker2" ).datepicker();
     });
  </script>
<?php
	 $pdf_query = $query; // a variable for printing different reports on pdf......
	
	echo  form_open('members/search');
	echo "<div class='filter_div'>"
        ."View by welcome group................    &nbsp;&nbsp; View by date joined....<br/>";
	
	echo  form_dropdown('welcome_goupno',$welcome,'_','id=welcome_group ');
              $data = array('name'=> 'date1', 'id'=> 'datepicker1','class'=>'datepicker','placeholder'=>'Between Date 1','style'=>'margin-left:12px;','readonly'=> '','size' => 20);
	echo "".form_input($data);
	
	$data = array('name'=> 'date2', 'id'=> 'datepicker2','class'=>'datepicker','placeholder'=>'And Date 2','readonly'=> '','size' => 20);
	
	echo  form_input($data)
        ."</div>";
	
	//echo " CLICK ".anchor('members/memberListPdf/'.$query,'HERE')." TO PRINT PDF</td></tr>";
		  $data = array('name' => 'search','align' => 'left', 'id' => 'appendedInputButton','class'=>'search_bar input-xxlarge', 'placeholder' => 'Your keyword here..');
	
	
	echo  "<div class='filter_div'>"
        ."Search Member<br/><div class='input-append'>"
	.form_input($data).form_submit('member/search','search','class=btn btn-primary')
        ."</div></div>";
	$this -> load -> view('members/list_table');
	
?>