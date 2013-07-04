<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mmember_position
 *
 * @author simon
 */
class mmember_position extends CI_Model{
    function get_all_member_positions(){
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
   function get_memberid_by_position($position){
       $data = array();
       $this -> db -> select('id');
       $this -> db -> where('position',$position);
       $Q = $this -> db -> get('member_position');
       if($Q->num_rows()>0){
           $data = $Q->row_array();
       }
       $Q->free_result();
       return $data;
   }
}

?>
