<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mgiving_category
 *
 * @author simon
 */
class mgiving_category extends CI_Model{
     /*function mgiving_category(){
       parent::CI_Model();
   }*/
   
   function get_all_giving_category(){
       $data = array();
       $Q = $this -> db -> get('giving_category');
       if($Q->num_rows()>0){
           foreach($Q->result_array() as $row){
               $data[] = $row;
           }
       }
       $Q ->free_result();
       return $data;
   }
   
   
   function get_giving_category_by_id($id){
       $data = array();
       $this -> db -> where('id',$id);
       $Q = $this -> db -> get('giving_category');
       if($Q->num_rows()> 0){
           $data = $Q->row_array();
       }
       $Q->free_result();
       return $data;
   }
   
   
   function giving_category_add()
	{
		$values = array('id' => '',
						'category' => $this->input->post('category')
						);
		$this -> db -> insert('giving_category',$values);
	}
   
   
}

?>
