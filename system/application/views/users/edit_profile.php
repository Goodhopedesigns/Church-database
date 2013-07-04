 <div class="label11 offset1">
 
<?php 
if(count($user) > 0)
    {
    $index = 0;
    ?>
     <form cass="form-horizontal span12" action="<?= base_url()?>users/editingProfile" method="post"> 
      <div class="control-group">     
        <label class="control-label">Full name: </label>
        <div class="controls"><input type ="text" value="  <?= $user['fname'].'  '.$user['surname'] ?> " readonly="true" class="input-large" ></div>
      </div>      
       <div class="control-group">     
        <label class="control-label">  User name:</label>
        <div class="controls"><input type ="text" value="  <?= $user['username'] ?>" class="input-large" ></div>
       </div>  
       <div class="control-group">     
         <label class="control-label">Role:</label>
         <div class="controls"><input type ="text" value="   
          <? if($user['role'] == 5){
                echo ' Administrator <br/>';              
              }else if($user['role'] == 1){
                echo 'Data Entry <br/>';                
              }else if($user['role'] == 2){
                echo ' Report Viewer <br/>';                
                } ?>
           " class="input-large" readonly="true"></div>
       </div>  
       <div class="control-group">      
           <label class="control-label">Sex:</label>
           <div class="controls"><input type ="text" value="  <?= $user['sex'] ?>" class="input-large" readonly="true"></div>
       </div>
       <div class="control-group">    
           <label class="control-label">Email:</label>
           <div class="controls"><input type ="text" value="  <?= $user['email'] ?>" class="input-large" ></div>
       </div>
       <div class="control-group">    
         <label class="control-label"><?= anchor('users/editingProfile',' Save','class=btn') ?></label>
        <input type="cancel" value="Cancel" class="btn">
       </div>  
  </form>   
 </div>          
   <? }	
?>

 
