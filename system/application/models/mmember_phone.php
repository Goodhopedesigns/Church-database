<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mmember_phone
 *
 * @author simon
 */
class mmember_phone extends CI_Model{
     function get_all_member_phones(){
      $data = array();
      $Q = $this -> db -> get('member_phone');
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
       $this -> db -> where('memberid',$id);
       $Q = $this -> db -> get('member_phone');
	  //$this -> db ->last_query();exit;
       if($Q->num_rows()>0){
           $data = $Q->row_array();
       }
       $Q->free_result();
       return $data['phone'];
   }
   function member_phone_add($id,$phone)
	{
		$values = array('id' => '',
						'memberid' => $id,
						'phone' => $phone
						);
		$this -> db -> insert('member_phone',$values);
	}
	function member_phone_edit($id,$phone)
		{	
				$values = array(
								'phone' => $phone
								);
				$this -> db -> where('memberid',$id);
				$this -> db -> update('member_phone',$values);
		}
}

?>
