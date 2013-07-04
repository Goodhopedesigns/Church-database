<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of muser_role
 *
 * @author simon
 */
class muser_role extends CI_Model{
    function get_all_user_roles(){
      $data = array();
      $Q = $this -> db -> get('user_role');
            if($Q->num_rows()>0){
                
           foreach($Q->result_array() as $row){
               $data[] = $row;
           }
       }
       $Q ->free_result();
       return $data;
   }
   function get_user_by_id($id){
        $data = array();
       $this -> db -> where('id',$id);
       $Q = $this -> db -> get('user_role');
       if($Q->num_rows()>0){
           $data = $Q->row_array();
       }
       $Q->free_result();
       return $data;
   }
   
   function get_userrole_dropdown(){
		$data = array();
		$this -> db -> from('user_role');
		$Q = $this -> db -> get();
			$data[0] = "--select one--";
	  if($Q -> num_rows() > 0){
		foreach($Q -> result_array() as $answer){
		   $data[$answer['role']] = ($answer['role'] == 1)? 'Data entry': ( ($answer['role'] == 5)? 'Administrator': 'Report viewer');
		}
			$Q -> free_result();
			return $data;
		}
   }
}

?>
