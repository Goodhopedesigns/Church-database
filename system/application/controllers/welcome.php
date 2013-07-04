<?php 
session_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index()	{
		
            $data['title']= 'Church | Home';
                
                if(isset($_SESSION['user'])){
                $data['main'] = $_SESSION['home'];
                
                }else{    
		$data['main'] = 'public/home_login';
                }
                 if($this -> input -> is_ajax_request() ){
		$this -> load -> vars($data);
		$this -> load -> view($data['main']);
                 }else{
                $this -> load -> view('generic/template',$data);    
                 }
	}
	
	function verify()      
	{
                if ($this-> input-> post('username')){	
			
			$answer = $this-> musers-> verifyUser();
			if($answer)
			{
				$_SESSION['user']['userid'] = $answer['id'];
				$_SESSION['user']['role'] = $answer['role'];
				$_SESSION['user']['name'] = $answer['name'];
                                $_SESSION['user']['member_id'] = $answer['member_id'];

				//print_r($_SESSION); exit;
                                redirect('users/index');
			}
			else
			{
				$data['main'] = 'public/home_login';
                                $_SESSION['message'] = "ACCESS DENIED:Wrong username/password combination <br/>";
				$this -> load -> view('generic/template',$data);
			}
		
		}
		else
		{
			redirect('welcome/index');
		}
	}
        
       
	
	function goverify()
	{
		$data['main'] = 'users/data_entry_home_page';
		$data['title'] = "Church | Login";
		$this-> load-> vars($data);
		$this-> load-> view('generic/template',$data);
	}
	
	
	
	
	function logout(){
		unset($_SESSION['user']);
		$data['main'] = 'public/home_login';                                
		$this -> load -> view('generic/template',$data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */