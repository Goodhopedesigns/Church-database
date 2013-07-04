
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
    <head>
        <title><?php echo @$title; 
        
        
        ?></title>
        <script type="text/javascript"> var BASE_URL = '<?= base_url(); ?>' </script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
        <link href="<?php echo base_url(); ?>css/clock.css" rel="stylesheet" type="text/css"  media="screen"/>
        <link href="<?php echo base_url(); ?>css/own_style.css" rel="stylesheet" type="text/css"  media="screen"/>
        <link href="<?php echo base_url(); ?>css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"  media="screen"/>
        <link  href="<?php echo base_url(); ?>css/validationEngine.jquery.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.7.2.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.7.min.js" ></script>        
        <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap/bootstrap.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap/bootstrap-modal.js" ></script>
<!--        <script type="text/javascript" src="<?php echo base_url(); ?>js/scripts.js" ></script>-->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/validations.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.history.js" ></script>
        <script src="<?php echo base_url(); ?>js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo base_url(); ?>js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo base_url(); ?>assets/css/jquery-ui.min.js" type="text/javascript"></script>
        <link href="<?php echo base_url(); ?>assets/css/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" >
           $(document).ready(function(){
                $("form").validationEngine();
                $("form").submit(function(){
                    alert('submited');
                });
              });
        </script>
    </head>


<body>  
       <?php $this -> load -> view('generic/header');?> 
    <div class="container">
    
        <form id="formID" method="post" action="submit.action">
            <input value="2010-12-01" class="validate[required,custom[date]]" type="text" name="date" id="date" />
            <tr><td><input value="" class="validate[required]" type="text" name="name" id="name" /></td></tr>
            <tr><td><input value="" class="validate[required,custom[email]]" type="text" name="email" id="email" /></td></tr>
            <tr><td><input id="skipbutton" class="btn submit" type="submit" value="Submit button"/></td></tr>
       </form>
    </div>    
     
       
</body>
</html>
