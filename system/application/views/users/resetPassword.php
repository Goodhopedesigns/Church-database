<?php

//  @Author:stanley Godlove Mtonyole   <  stanleymtonyole@gmail.com>
?>
<div id="profile">
<?php 
    echo form_open('users/process_resetPassword');
echo " <p>  <label for='current password'> Old Password </label> ";
echo form_error('oldpassword','<span class="mandatory">','</span><br/>');
$data = array('name'=> 'oldpassword','id'=> 'oldpassword','class'=>'u_pass','size'=>  25 );
echo form_password($data) ." </p> ";

echo " <p>  <label for='new password'> New password </label> ";
echo form_error('nwpassword','<span class="mandatory">','</span><br/>');
$data = array('name'=> 'nwpassword','id'=> 'nwpassword','class'=>'u_pass','size'=>  25  );
echo form_password($data) ." </p> ";

echo " <p>  <label for='confirm password'> Confirm new password </label> ";
echo form_error('cnwpassword','<span class="mandatory">','</span><br/>');
$data = array('name'=> 'cnwpassword','id'=> 'cnwpassword','class'=>'u_pass','size'=>  25 );
echo form_password($data) ." </p> ";        
echo form_hidden('id',$user['id']);
echo form_submit('submit','Save Changes').'  '.form_submit('reset','cancel');
echo form_close();

?>
</div>