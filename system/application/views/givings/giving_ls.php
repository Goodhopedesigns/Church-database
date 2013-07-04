<?php
       	  $data = array('name' => 'search','align' => 'left', 'id' => 'appendedInputButton','class'=>'search_bar input-xxlarge', 'placeholder' => 'Your keyword here..');
	
	
	echo  "<div class='filter_div'>"
        ."Search Givings<br/><div class='input-append'>"
	.form_input($data).form_submit('giving/search','search','class=btn btn-primary')
        ."</div></div>";
        //including list table file
        $this -> load -> view('givings/list_table');
        	
?>