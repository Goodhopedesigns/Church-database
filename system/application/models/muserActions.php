<?php

//  @Author:stanley Godlove Mtonyole   <  stanleymtonyole@gmail.com>



class muserActions extends CI_Model
{
  //function muserAction(){
    //parent::Model();
	//}
    function getAllUserActions()
    {
	   $data=array();
                // $Q=$this->db->query("SELECT * FROM tbl_user_actions ORDER BY id DESC" );
                //$this->db->select('id,Action,Time,Action_description');
                $this->db->from("user_actions");
                //$this->db->orderby(id desc);
                $Q=$this->db->get();
                if ($Q->num_rows()> 0)
                    {
                        foreach( $Q -> result_array() as $action )
                        {
                            $user = $this -> musers -> get_user_by_id($action['user']);
                            $action['name'] = $user['fullname'];
                            $data[] = $action; 
                        }
                       // print_r($data); exit;
                            return $data;
                    }
    }
    
    function getActionByDate($date1,$date2)
    {
        $data=array();
        //$Q = $this -> db -> query("SELECT * FROM `tbl_user_actions` WHERE time BETWEEN $date1 OR '$date2%' ) AND inst_id = $inst ORDER BY time DESC");
        $this -> db -> select('id,user,action,time,action_description');
        $this -> db -> where('time >',$date1);
        $this -> db -> where('time <',$date2);
        $this->db->from('user_actions');
        $Q=$this->db->get();
        if ($Q->num_rows()> 0)
        {
            foreach( $Q -> result_array() as $answer )
            {
                $data[] = $answer; 
            }
            return $data;
        }
    }
    
    function getActionsByDate( )
    {
        $data=array();
        //$Q = $this -> db -> query("SELECT * FROM user_actions order by time DESC");
        $this->db->from('user_actions');
        $Q=$this->db->get();
        if ($Q->num_rows()> 0)
        {
            foreach( $Q -> result_array() as $answer )
            {
                $data[] = $answer; 
            }
                    return $data;
        }
    }
    
//    getActionsByUserId($userid)
    
    function getActionsByUserId($userid)
    {
        $data=array();
            // $Q = $this -> db -> query("SELECT * FROM tbl_user_actions WHERE actor_id=3");
            //$this -> db -> select('id,fullname');
            $this -> db -> where('user',$userid);
            $Q=$this->db->get('user_actions');// ORDER BY time DESC
            if ($Q->num_rows()> 0)
            {
                foreach( $Q -> result_array() as $answer )
                {
                    $data[] = $answer; 
                }
                return $data;
            }
    }
    
    function get_users_dropdown()
	{
		$data = array();
		$this -> db -> select('fullname');
                $this -> db -> from('users');
		$Q = $this -> db -> get();
		if($Q -> num_rows() > 0)
			{
				$data[0] = ' -- SELECT -- ';
				foreach($Q -> result_array() as $user)
					{
						$data[$user['id']] = $user['name'];
					}
			}
			$Q -> free_result();
			return $data;
	}
					
    function addAction( $values=array() )
    {
        $this -> db -> insert('user_actions',$values);
    }
    
    function getActionByUser( )
    {
        $data=array();
        $Q = $this -> db -> query("SELECT * FROM user_actions");
        $this->db->from('user_actions');
        $Q=$this->db->get();
        if ($Q->num_rows()> 0)
        {
            foreach( $Q -> result_array() as $answer )
            {
                $data[] = $answer; 
            }
            return $data;
        }
    }
}//end
				 
	?>
