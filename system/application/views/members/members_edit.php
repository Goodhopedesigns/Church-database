	<script>
     $(function() {
       $( "#datepicker" ).datepicker();
     });
  </script>
<?php
        //print_r($answer);exit;
	 $relatedto1 = $answer['relatedto'];
	 $relationship1 = $answer['relationship'];
	 $welcome1 = $answer['welcome_groupno'];
	echo "<table>";
	echo form_open('members/editingMember/'.$answer['id']."/".$relatedto1."/".$relationship1."/".$welcome1);
	echo "<tr>";
	echo "<td><label for = 'fname'>FIRST NAME : </label></td>";
		 $data = array('name' => 'fname','id'=>'fname','value' => $answer['fname'] , 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	echo "<td><label for = 'profession'>PROFESSION : </label></td>";
		 $data = array('name' => 'profession','id'=>'profession', 'value' => $answer['profession'], 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'mname'>MIDDLE NAME : </label></td>";
		 $data = array('name' => 'mname','id'=>'mname', 'value' => $answer['mname'], 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	echo "<td><label for = 'date_joined'> DATE : </label></td>";
		 $data = array('name' => 'date_joined','id'=>'datepicker','value' => $answer['date_joined'], 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'mname'>SURNAME : </label></td>";
		 $data = array('name' => 'surname','id'=>'surname','value' => $answer['surname'], 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	echo "<td><label for = 'related'> RELATED TO: </label></td>";
		 $data = array('name' => 'related','id'=>'related', 'size' => 25);
                // echo $answer['relatedto'];exit;
                 if($answer['relatedto'] != 0)
                 {
                    $related[0] = $related [$answer['relatedto']];
                    $related [$answer['relatedto']]= $answer['related_to'];
                 }
	echo "<td>".form_dropdown('relatedto',$related)."</td></tr>";
			
	echo "<tr><td><label for = 'sex'> SEX : </label></td>";
        echo "<td>"; 
               $data = array($answer['sex']=>($answer['sex'] == 'M'? 'Male':'female'),'M'=>'Male','F'=>'Female');
	echo form_dropdown('sex',$data);
	echo "</td>";
	echo "<td><label for = 'related'> RELATIONSHIP : </label></td>";
                        if($answer['relationship'] != 0)
                        {
                            $relationship[0] = $relationship[$answer['relationship']];
                            $relationship[$answer['relationship']] = $answer['relationship_name'];
                        }
	echo "<td>".form_dropdown('relationship',$relationship)."</td></tr>";
	
	echo "<tr><td><label for = 'title'>TITLE : </label></td>";
		 $data = array('name' => 'title','id'=>'title','value' => $answer['title'], 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	echo "<td><label for = 'residence'> RESIDENCE: </label></td>";
		 $data = array('name' => 'residence','id'=>'residence','value' => $answer['residence'], 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	echo "<tr><td><label for = 'code'>CODE NUMBER: </label></td>";
		$data = array('name' => 'code_no','id'=>'code_no','value' => $answer['code_no'], 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	echo "<td><label for ='welcome'> WELCOME GROUP </label></td>";
			$welcome[0] = $welcome[$answer['welcome_groupno']];
			$welcome[$answer['welcome_groupno']] = $answer['welcome_groupname'];
	echo "<td>".form_dropdown('welcome_group',$welcome)."</td><tr>";
			$data = array('name' => 'email','value' => $answer['email'],'size' => 30);
	echo "<tr><td>EMAIL</td><td>".form_input($data)."</td>";
		echo	"<td><label for = 'phone'>PHONE NUMBER</label></td>";
			$data = array('name' => 'phone','id'=>'phone','value' => $phone, 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";		
	echo "<tr><td></td><td>".form_submit('submit','submit','class=btn')."</td>";
	echo "<td></td><td>".form_submit('cancel','cancel','class=btn')."</td></tr>";
	echo "</table>";
?>