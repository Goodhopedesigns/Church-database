 <div class="span11 offset1">
 
<?php 
if(count($user) > 0)
    {
    $index = 0;
    ?>
      <div class="control-group">     
        <span class="  ">Full name: </code>
        <code>  <?= $user['fname'].'  '.$user['surname'] ?> </code>
      </div>      
       <div class="control-group">     
        <span class="  ">  User name:</span>
        <code>  <?= $user['username'] ?></code>
       </div>  
       <div class="control-group">     
         <span class="  ">Role:</span>
         <code>   
          <? if($user['role'] == 5){
                echo ' Administrator <br/>';              
              }else if($user['role'] == 1){
                echo 'Data Entry <br/>';                
              }else if($user['role'] == 2){
                echo ' Report Viewer <br/>';                
                } ?>
           </code>
       </div>  
       <div class="control-group">      
           <span class="  ">Sex:</span>
           <code>  <?= $user['sex'] ?></code>
       </div>
       <div class="control-group">    
           <span class="  ">Email:</span>
           <code>  <?= $user['email'] ?></code>
       </div>
       <div class="control-group">    
         <span class="  "><?= anchor('users/editProfile',' Edit Profile','class=btn') ?></span>
         <?= anchor('users/resetPassword','Reset Password','class=btn') ?>
       </div>  
    </div>          
   <? }	
?>

 
