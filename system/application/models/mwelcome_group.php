<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mwelcome_gruop
 *
 * @author simon
 */
class mwelcome_group extends CI_Model{
    
	function get_all_welcome_grps(){
      $data = array();
	  $this -> db -> from('welcome_group');
	  $Q = $this -> db -> get();
	  //$this -> db -> last_query();
            if($Q->num_rows()>0){
           foreach($Q->result_array() as $row){
               $data[] = $row;
           }
       }
       $Q ->free_result();
       return $data;
   }
   function get_welcome_grp_by_id($id){
        $data = array();
       $this -> db -> where('id',$id);
       $Q = $this -> db -> get('welcome_group');
       if($Q->num_rows()>0){
           $data = $Q->row_array();
       }
       $Q->free_result();
       return $data;
   }
   function get_welcome_grp_dropdown()
   {
		$this -> db -> from('welcome_group');
		$Q = $this -> db -> get();
		 $data[0] = ' -- SELECT ONE -- ';
				 if ($Q->num_rows()> 0)
					{
						foreach( $Q -> result_array() as $answer )
						{
						   $data[$answer['id']] = $answer['name']." "."[".$answer['meeting_place']."]";
						}
					}
			 return $data;
   }
   
}

?>
