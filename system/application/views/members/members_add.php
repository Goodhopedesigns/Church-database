 <div id="message">
 </div>
 <div class="error">
 </div>    
	<script>
     $(function() {
       $( "#datepicker" ).datepicker();
     });
  </script>
  
 <form action="<?= base_url()?>members/addingMember" method="post" >
  <table class='plain_style_tbl'>
 <?php echo "<tr>";
	echo "<td><label for = 'fname'>FIRST NAME :"."<span class='error'>*</span> "."</label></td>";
		 $data = array('name' => 'fname','id'=>'fname', 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	echo "<td><label for = 'profession'>PROFESSION : </label></td>";
		 $data = array('name' => 'profession','id'=>'profession', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'mname'>MIDDLE NAME : </label></td>";
		 $data = array('name' => 'mname','id'=>'mname', 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	echo "<td><label for = 'date_joined'> DATE : </label></td>";
		 $data = array('name' => 'date_joined','id'=>'datepicker','readonly' =>'', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	
	echo "<tr><td><label for = 'mname'>SURNAME :"."<span class='error'>*</span> "." </label></td>";
		 $data = array('name' => 'surname','id'=>'surname','class'=>'validate[required]', 'size' => 25);
	echo "<td>";
                // .form_input($data).
               ?>
          <input type="text" name="surname" value="" id="surname" class="validate[required]" size="25"  />
               <?  
              echo "</td>";
	echo "<td><label for = 'related'> RELATED TO: </label></td>";
		 $data = array('name' => 'related','id'=>'related', 'size' => 25);
	echo "<td>".form_dropdown('relatedto',$related)."</td></tr>";
	
	echo "<tr><td><label for = 'sex'> SEX :"."<span class='error'>*</span> "." </label></td>";
             $data = array('0'=>'- select one -','M'=>'Male','F'=>'Female');
			echo "<td>".form_dropdown('sex',$data);
			
	echo "</td>";
	echo "<td><label for = 'related'> RELATIONSHIP : </label></td>";
		 //$data = array('name' => 'relationship','id'=>'relationship', 'size' => 25);
	echo "<td>".form_dropdown('relationship',$relationship)."</td></tr>";
	
	echo "<tr><td><label for = 'title'>TITLE : "."<span class='error'>*</span> "."</label></td>";
		 $data = array('name' => 'title','id'=>'title','class'=>'validate[required]', 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	echo "<td><label for = 'residence'> RESIDENCE:"."<span class='error'>*</span> "." </label></td>";
		 $data = array('name' => 'residence','id'=>'residence','class'=>'validate[required]', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";
	echo "<tr><td><label for = 'code'>CODE NUMBER:"."<span class='error'>*</span> "." </label></td>";
		$data = array('name' => 'code_no','id'=>'code_no','class'=>'validate[required]', 'size' => 25);
	echo "<td>".form_input($data)."</td>";
	echo "<td><label for ='welcome'> WELCOME GROUP </label></td>";
	echo "<td>".form_dropdown('welcome_group',$answer)."</td><tr>";
	echo "<tr><td>EMAIL</td><td><input type = 'email' name = 'email' class='validate[custom[email]]' size = '35px'></td>";
		echo	"<td><label for = 'phone'>PHONE NUMBER</label></td>";
			$data = array('name' => 'phone','id'=>'phone', 'size' => 25);
	echo "<td>".form_input($data)."</td></tr>";		
	echo "<tr><td></td><td><input type='submit' name='submit' value='submit' class='btn' id='save_member' onclick='actionPerformed(\"Saving Member..\")' /></td>";
	echo "<td></td><td>".form_submit('cancel','cancel','class=btn')."</td></tr>";
	echo "</table>";
        echo form_close();
?>