<?php

class Ajax extends CI_Controller {

	function Ajax()
	{
		parent::__Construct();
    
	}
	
	function index(){
	 $name = $_POST['username'];
            //$email = $_POST['email'];


            $response = array( "name"=>$name,                              
                               "link"=>"jerry"
                            );

            // $response = array( 1 => "Today is.. ".date());

            header('Content-type: application/json');
            echo json_encode($response);
	}//end index
	
	function post(){

            $name = $_POST['name'];
            $email = $_POST['email'];


            $response = array( "name"=>$name,
                               "email"=>$email,
                               "link"=>"jerry"
                            );

            // $response = array( 1 => "Today is.. ".date());

            header('Content-type: application/json');
            echo json_encode($response);

        }

	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */