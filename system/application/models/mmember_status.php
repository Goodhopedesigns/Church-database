<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mmember_status
 *
 * @author simon
 */
class mmember_status extends CI_Model{
    function get_all_member_status(){
      $data = array();
      $Q = $this -> db -> get('member_position');
            if($Q->num_rows()>0){
                
           foreach($Q->result_array() as $row){
               $data[] = $row;
           }
       }
       $Q ->free_result();
       return $data;
   }
   function get_member_phone_by_memberid($id){
        $data = array();
       $this -> db -> where('id',$id);
       $Q = $this -> db -> get('members');
       if($Q->num_rows()>0){
           $data = $Q->row_array();
       }
       $Q->free_result();
       return $data;
   }
}

?>
