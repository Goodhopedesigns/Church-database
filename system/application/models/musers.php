<?php
class musers extends CI_Model{
    
   function get_all_users(){
      $data = array();
      $Q = $this -> db -> get('users');
            if($Q->num_rows()>0){
                
           foreach($Q->result_array() as $row){
               if($row['role'] == 5){
                   $role = 'Admin';
               }else if($row['role'] == 1){
                   $role = 'Data entry';
               }else if($row['role'] == 2){
                   $role = 'Data Viewer';
               } 
               $data[] = array('id'=>$row['id'],
                                'username'=> $row['name'],
                                'last_login'=>@$row['las_login'],
                                 'role'=>$role,
                                 'full_name'=>@$full_name,
                                 'email'=>@$email
                                 );
              // print_r($data); exit;
           }
       }
       $Q ->free_result();
       return $data;
   }
   function get_user_by_id($id){
        $user = array();
       $this -> db -> where('id',$id);
       $Q = $this -> db -> get('users');
       if($Q->num_rows()>0){
           
           $user = $Q->row_array();
           if($user['role'] == 5){
                $user['role'] =' Administrator';              
              }else if($user['role'] == 1){
                $user['role'] = 'Data Entry';                
              }else if($user['role'] == 2){
                $user['role'] = ' Report Viewer';                
                }
       }
       $Q->free_result();
       return $user;
   }
   function verifyUser(){
       $data = array();
        $u = $this -> input -> post('username');
	$pw = md5($this-> input-> post('password'));
        $this -> db -> where('name',$u);
        $this -> db -> where('password',$pw);
        $Q = $this -> db -> get('users');
        if($Q -> num_rows() > 0){
            $data = $Q -> row_array();
        }
        $Q -> free_result();
        return $data;
   }
   
   function addUsers(){
			$pwd = $this ->input->post('name');
			$password1 = substr($pwd,0,3).'123';
			$password = md5(strtolower($password1));
		$values = array('name' => $this ->input->post('name'),
                                'password' => $password,
                                'role' => $this ->input->post('user_role'),
                                'member_id' => $this ->input->post('member')
				);
		$answer = $this -> db -> insert('users',$values);
		if($answer){
		   return TRUE;
		}else{
		   return FALSE;
		}
   }//end function
   
   function resetPassword($userid,$newpassword)
   {
		$values = array(
						'password' => $newpassword
						);
		$this -> db -> where('id',$userid);	
		$this -> db -> update('users',$values);
   }
   
   function get_users_dropdown()
	{
		$data = array();
		$this -> db -> from('users');
		$Q = $this -> db -> get();
		if($Q -> num_rows() > 0)
			{
				$data[0] = ' -- SELECT -- ';
				foreach($Q -> result_array() as $answer)
					{
						$data[$answer['id']] = $answer['name'];
					}
			}
			$Q -> free_result();
			return $data;
	}
	
	function get_password_by_userid($userid){
		$this -> db -> where('id',$userid);
		$Q = $this -> db -> get('users');
		if($Q -> num_rows()> 0){
			$data =$Q ->row_array();
			$password = $data['password'];
		}
		$Q -> free_result();
		return $password;
	}
       function edit( $data ){
         $this -> db -> where('id',$data['id']);   
         $this -> db -> update('users',$data); 
         
       }
       
}

?>
