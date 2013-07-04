<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mmember_ministry
 *
 * @author simon
 */
class mmember_ministry extends CI_Model{
    
    function assign_member($data){
        
       $this -> db -> insert('member_ministry',$data);  
        
    }
    function remove_member(){
        
    }
   
    function get_all_member_ministries(){
        $data = array();
        $Q = $this -> db -> get('member_ministry');
        $data = array();
        if($Q -> num_rows() > 0){
            foreach($Q->result_array() as $row){
            $answer = $this ->mmembers ->get_member_by_id($row['memberid']); 
            $row['member'] = $answer['fname']." ".strtoupper(substr($answer['mname'],0,1))." ".$answer['surname'];
            $answer1 = $this -> mministry_groups -> get_ministry_grp_by_id($row['ministryid']);
            $row['ministry'] = $answer1['ministry'];
            $data[] = $row;
       }
        }$data;
       $Q ->free_result();
       return $data;
   }
   function get_members_not_in_ministry($ministry_id,$limit,$start){
        $data = array();
        $this -> db -> where('ministryid !=',$ministry_id);
        $this->db->limit($limit, $start);
        $Q = $this -> db -> get('member_ministry');
        $data = array();
        if($Q -> num_rows() > 0){
            foreach($Q->result_array() as $row){
            $member = $this ->mmembers ->get_member_by_id($row['memberid']);
            //$member['leadership'] = $row['leadership'];            
            $data[] = $member;
       }
        }
       $Q ->free_result();
       return $data;
   }
   function get_member_ministry_by_id($id){
        $data = array();
       $this -> db -> where('id',$id);
       $Q = $this -> db -> get('member_ministry');
       if($Q->num_rows()>0){
           $data = $Q->row_array();
       }
       $Q->free_result();
       return $data;
   }
   function get_memberid_by_ministry($ministryid){
       $data = array();
       $this -> db -> where('ministryid',$ministryid);
       $Q = $this -> db -> get('member_ministry');
       if($Q -> num_rows> 0){
           $data = $Q -> row_array();
       }
       $Q -> free_result();
       return $data;
   }
   function assign_member_1(){
       $values = array('id' => '',
                        'memberid' => $this -> input ->post('member'),
                        'ministryid' => $this -> input ->post('ministry')
               );
       $this -> db -> insert('member_ministry',$values);
   }
}

?>
