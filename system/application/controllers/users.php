<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	function Users(){
              session_start();
            if(!isset($_SESSION['user'])){
                  redirect('welcome/index','refresh');                    
                  }
		parent::__construct();
	 }

	public function index(){
		         if ($_SESSION['user']['role'] == 5){
					$data['main'] = 'users/admin';
					$_SESSION['home'] = 'users/admin';
                                        $data['title'] = "CIS | Login";
                                        $_SESSION['main_title'] = "Administrator's Dashboard";
				}else if($_SESSION['user']['role'] == 2){
					$data['main'] = 'users/report_viewer';
                                        $_SESSION['home'] = 'users/report_viewer';
					$data['title'] = "CIS | Login";
                                        $_SESSION['main_title'] = "Data viewer Dashboard";
							
				}
				else if($_SESSION['user']['role'] == 1){
					$data['main'] = 'users/data_entry_home_page';
                                        $_SESSION['home'] = 'users/data_entry_home_page';
					$data['title'] = "CIS | Login";
                                        $_SESSION['main_title'] = "Data entry Dashboard";
					
				}
                                //print_r($_SESSION); 
                                //print_r($data);
                                //exit;
			        $this-> load-> view('generic/template',$data);	
		}
       function view(){
                 $data['answer'] = $this -> musers -> get_all_users();
                 $data['main'] = 'users/view_all';
                 $data['title'] = 'All users';
                 $data['list_title'] = 'List of users';
                 if($this -> input -> is_ajax_request()){
                     $this -> load -> view($data['main'],$data);
                 }else{
                     $this -> load -> view('generic/template',$data);
                 }
       }         
		
		
	function addingUsers() // adding member to database.
		{	 
			$add = $this -> musers -> addUsers();
			redirect('users/index');
			//redirect('Users/addUser','refresh');
		}
                
	function addUser() { // add user form.
			$data['title'] = 'CIS | Users Create';
			$data['main'] = 'users/users_register';
			$data['roles'] = $this -> muser_role -> get_userrole_dropdown();
                        $data['members'] = $this->mmembers->get_members_dropdown();
		   if($this -> input -> is_ajax_request()){
                         $this -> load -> view($data['main'],$data);
                     }else{
                         $this -> load -> view('generic/template',$data);
                    }
		}
                
        function profile(  ){
                $data['user'] = $this -> mmembers -> get_member_by_id($_SESSION['user']['member_id']);
                $data['user']['role'] = $_SESSION['user']['role'];
                $data['user']['username'] = $_SESSION['user']['name'];
                //print_r($data['user']); exit;
                $data['main'] = 'users/profile';
                $data['title'] = 'User Profile | '.$_SESSION['user']['name'];
              if($this -> input -> is_ajax_request()){
                     $this -> load -> view($data['main'],$data);
                 }else{
                     $this -> load -> view('generic/template',$data);
                 }
                }
       function editProfile(  ){
                $data['user'] = $this -> mmembers -> get_member_by_id($_SESSION['user']['member_id']);
                $data['user']['role'] = $_SESSION['user']['role'];
                $data['user']['username'] = $_SESSION['user']['name'];
                //print_r($data['user']); exit;
                $data['main'] = 'users/edit_profile';
                $data['title'] = 'Edit Profile | '.$_SESSION['user']['name'];
              if($this -> input -> is_ajax_request()){
                     $this -> load -> view($data['main'],$data);
                 }else{
                     $this -> load -> view('generic/template',$data);
                 }
                }         
                
       function resetPassword() //reset passwd form
		{
			//$data['users'] = $this->musers->get_users_dropdown();
			$data['title'] = 'CIS | Reset Password';
			$data['main'] = 'users/reset_password';
                    if($this -> input -> is_ajax_request()){
                     $this -> load -> view($data['main'],$data);
                      }else{
                     $this -> load -> view('generic/template',$data);
                  }
	}//end function..
		
       function resetingPassword()
		{	
			//print_r($_POST);exit;
			$userid = $_SESSION['user']['userid'];
			$currentpwd = $this -> musers -> get_password_by_userid($userid);
			$oldpwd = strtolower(md5($this -> input -> post('oldpassword')));
			$newpwd = $this -> input -> post('nwpassword');
			$confirmpwd = $this -> input -> post('cnwpassword');
			if($currentpwd == $oldpwd){ 
				if($newpwd == $confirmpwd)
				{
					$newpwd = md5($newpwd);
					$this -> musers -> resetPassword($userid,$newpwd);
					$data['title'] = 'CIS ';
					$data['main'] = 'users/profile';
					redirect('users/profile');
				}
				else
				{
					$_SESSION['message'] = "New passwords do not match!";
					redirect('users/resetPassword','refresh');
				}
			}
			else
			{
				$_SESSION['message'] = "Old password does not exist!";
				redirect('users/resetPassword','refresh');
			}
		}//end function
           function block( $user_id ){
               $this -> musers -> block($user_id);
               redirect('users/view');
           } 
           
           function changeRole( $user_id ){
                $data['main'] = 'users/change_role';
                $data['user'] = $this -> musers -> get_user_by_id($user_id);
                $data['roles'] = $this -> muser_role -> get_userrole_dropdown();                
               if($this -> input -> is_ajax_request()){
                   $this -> load -> view($data['main']);
               }else{
                   $this -> load -> view('generic/template',$data);
               }
               
           }//end function
          
         function changingRole(){
             if($this -> input ->post('user_role') != 0){
                 $details = array('id'=>$this -> input ->post('user_id'),
                                   'role'=>$this -> input ->post('user_role')
                                   );
                 $this -> musers -> changeRole($details);
             }
             redirect('users/view');
         }  
}