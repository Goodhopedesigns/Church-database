<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of minventory_status
 *
 * @author simon
 */
class minventory_status extends CI_model{
   function get_all_inventory(){
       $data = array();
       $Q = $this -> db -> get('inventory_status');
       if($Q->num_rows()>0){
           foreach($Q->result_array() as $row){
               print_r($data[] = $row);exit;
           }
       }
       $Q ->free_result();
       return $data;
   }
   function get_inventory_status_by_id($id){
        $data = array();
       $this -> db -> where('id',$id);
       $Q = $this -> db -> get('inventory_status');
       if($Q->num_rows()>0){
           $data = $Q->row_array();
       }
       $Q->free_result();
       return $data;
   }
   function get_status_dropdown()
   {
		$this -> db -> from('inventory_status');
		$Q = $this -> db -> get();
		 $data[0] = ' -- SELECT ONE -- ';
				 if ($Q->num_rows()> 0)
					{
						foreach( $Q -> result_array() as $answer )
						{
						  $data[$answer['id']] = $answer['status'];
						}
					}
			 return $data;
   }
}

?>
