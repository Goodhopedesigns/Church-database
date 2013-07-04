<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mrelationship
 *
 * @author simon
 */
class mrelationship extends CI_Model{
    function get_all_relationships(){
      $data = array();
      $Q = $this -> db -> get('relationship');
            if($Q->num_rows()>0){
                
           foreach($Q->result_array() as $row){
               $data[] = $row;
           }
       }
       $Q ->free_result();
       return $data;
   }
   function get_relationship_by_id($id){
        $data = array();
       $this -> db -> where('id',$id);
       $Q = $this -> db -> get('relationship');
	   //$this -> db -> last_query();
       if($Q->num_rows()>0){
           $data = $Q->row_array();
       }
       $Q->free_result();
       return $data;
   }
   function get_relationship_dropdown()
   {
		
		$this -> db -> from('relationship');
		//echo $this -> db -> last_query();exit;
		$Q = $this -> db -> get();
		 $data[0] = ' -- SPECIFY IF ANY -- ';
				 if ($Q->num_rows()> 1)
					{
						foreach( $Q -> result_array() as $answer )
						{
						   $data[$answer['id']] = $answer['relationship'];
						}
					}
			 return $data;
   }
}

?>
