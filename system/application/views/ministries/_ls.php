
<?php
        $pdf_query = $query; // a variable for printing different reports on pdf......
	
        echo  form_open('ministries/search');
        $data = array('name' => 'search','align' => 'left', 'id' => 'appendedInputButton','class'=>'search_bar input-xxlarge', 'placeholder' => 'Your keyword here..');
	
	echo  "<div class='filter_div'>"
        ."Search Ministry<br/><div class='input-append'>"
	.form_input($data).form_submit('ministries/search','search','class=btn btn-primary')
        ."</div></div>";
	$this -> load -> view('ministries/list_table');
	
?>