<script>
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
	
	echo  form_dropdown('welcome_goupno',$welcome,'_','id=welcome_group');
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
	
	echo "<table  cellpadding = '0' cellspacing = '0' class='table table-striped table-bordered'>";
	echo "<tr><td colspan = '11' align = ''>
               <h4 class='alert alert-info'>".@$list_title."</h4>
               <div class='pull-left'>".$links."</div>";
                echo "<div class='display_action pull-right'>";
                $excel = "<img src='".base_url()."images/excel.png' class='icon' >";
                echo anchor('members/export /'.$query,$excel);
                $pdf = " <img src='".base_url()."images/pdf.png' class='icon' >";
                echo $print = "<img src='".base_url()."images/print.png' class='icon' >";
                echo anchor_popup('members/memberListPdf/'.$query,$pdf)         
                ."</div>";
                echo "</td></tr>";
	echo  "<tr><th>S/N</th><th>FULL NAME</th><th>SEX</th><th>TITLE</th>
			  <th>EMAIL</th><th>RESIDENCE</th><th>CODE NUMBER</th><th>WELCOME GROUP</th><th>DATE JOINED</th>
		  </tr>";
				$index = 0;
			foreach($answer  as $key => $list)
				{ //print_r($list);exit;
					$index++;
					echo "<tr><td>".$index."</td>";
					echo "<td>".$list['fname']."</td>";
					echo "<td>".$list['sex']."</td><td>".$list['title']."</td><td>".$list['email']."</td>";
					echo "<td>".$list['residence']."</td><td>".$list['code_no']."</td><td>".$list['welcome_groupno']."</td>";
					echo "<td>".$list['date_joined']."</td>";
				}
                          echo "<tr><td colspan='11'>".$links."</td></tr>";      
			  echo "</table>";
			  echo form_close();
?>