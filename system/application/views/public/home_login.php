<!-- Author: Jeremiah < Jemanyanda02@hotmail.com > -->
    <div class="row-fluid">    
     <div id="welcome_home" class="span12 offset0" >
           <i style="color:yellowgreen;text-shadow: 1px 1px 1px #000044;">CHURCH Database System: 
           </i>It is the Software aims at assisting the church in the efficient organization of information
           about members and their credentials,  church and group’s activities,  projects associated 
           with the church as well as keeping track of other important information on giving, 
           expenditure and attendance.
     </div> 
    </div>
  <div class="row-fluid"> 
     <div id="login_form" class="span10 offset1"> 
           <form name="register_form" class="form-vertical span12" method="POST" action="<?= base_url(); ?>welcome/verify" style="margin-top: 10px ;" >
          <center><div  class="alert alert-info "> Administrator's Authentication ( Login area )</div>
          <span style="color:red;"><?= @$_SESSION['message']; ?></span>
          <input type="text" name="username" id="username" class="input-xlarge" placeholder="Username" ><br/>
          <input type="password" name="password" id="password" class="input-xlarge validate[required]" placeholder="Password" ><br/>
          <input type="checkbox" name="remember" ><i><span id="">Remember my password</span></i> <br/>
          <input type="submit" name="reg_btn" id="login" class="btn validate[required]" placeholder="" value="Login" >
          <input type="reset" name="reg_btn" class="btn" placeholder="" value="Clear" ><br/>
          <?php echo anchor('user/password_recovery','Forgot your password?'); ?>
          </center>
        </form>
     
      </div>  
  <div class="span5 offset1">
         
  </div>
 </div>     
