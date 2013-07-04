<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mattendance
 *
 * @author simon
 * @editor Stanley and Jeremiah
 */
class mattendance extends CI_Model{
    
   /* function mattendance(){
    parent:: CI_Model();
    }*/
	
	function get_all_attendance(){
       $data = array();
       $Q = $this -> db -> get('attendance');
       if($Q->num_rows()>0){
           foreach($Q->result_array() as $row){
               $data[] = $row;
           }
       }
       $Q ->free_result();
       return $data;
   }
   
   
      function add_attendance(){///id, date, no_males, no_ females, no_ children
       $values = array('id' => '',
                        'date' => $this->input->post('date'),
                        'event' => $this->input->post('event_type'),
                        'no_males' => $this->input->post('no_males'),
                        'no_females' => $this->input->post('no_females'),
                        'no_children' => $this->input->post('no_children'),
                        'event_description' => $this->input->post('description')
                        ); 
       $this -> db -> insert('attendance',$values);
   }
   
    function get_attendance_by_id($id){
        $data = array();
		$this -> db -> where('id',$id);
        $Q = $this->db->get('attendance');
        if($Q-> num_rows()> 0 ){
            $data = $Q -> row_array();
        }
        $Q -> free_result();
        return $data;
        }
     function get_attendance_by_date($date){
         $data = array();
         $this -> db -> where('date <=',$date);
         $Q = $this -> db -> get('attendance');
         if($Q -> num_rows() > 0){
             foreach($Q -> result_array() as $row){
                 $data[] = $row;
             }
         }
         $Q -> free_result();
         return $data; 
     }
	 
	function get_attendance_by_id_1($id)
	{
		$data = array();
		$this -> db -> where('id',$id);
		$Q = $this -> db -> get('attendance');
		if($Q->num_rows()>0)
		{
			$data = $Q->row_array();
		}
		$Q->free_result();
		return $data;
	}
	
	function edit_attendance($id){
        $values = array(
                        'date' => $this -> input -> post('date'),
                        'event'=>$this -> input -> post('event_type'),
                        'no_females' => $this -> input -> post('no_females'),
                        'no_males' => $this -> input -> post('no_males'),
                        'no_children' => $this -> input -> post('no_children'),
                        'event_description' => $this -> input -> post('description')
                       );
        $this -> db -> where('id',$id);
        $this -> db -> update('attendance',$values);
   }
   
    function export_attendance(){
        $Q = $this -> db -> query("SELECT * FROM attendance ");
        return $this -> dbutil -> csv_from_result($Q,",","\n");					   
    }
    
    function get_all_attendance_pdf()
    {
       $data = array();
        $this -> db -> where('id !=',77);	// this is the sample data used as template.....
        //$this -> db -> where('status','active');
        $Q = $this -> db -> get('attendance');
        //echo $this -> db -> last_query();exit;
        if($Q->num_rows()>0){
            foreach($Q->result_array() as $row){
                $data[] = $row;
            }//exit;
       }
       $Q ->free_result();
       return $data;
   
    }
    
    function search($keyword)
    {
	$data = array();// 
	$Q = $this -> db -> query(" SELECT * FROM attendance WHERE (date LIKE '%$keyword%' 
                                    OR event LIKE '%$keyword%' OR event_description LIKE '%$keyword%' OR 
                                    no_females LIKE '%$keyword%' OR no_children LIKE '%$keyword%' OR no_males LIKE '%$keyword%')");
            if($Q -> num_rows() > 0){
                foreach($Q -> result_array() as $row){
                    //$answer = $this -> mwelcome_group -> get_welcome_grp_by_id($row['welcome_groupno']);
                    //$row['welcome_groupno'] = $answer['name'];
                    $data[] = $row;
                }
            }
            $Q -> free_result();
            return $data;
   }
	 
	 
	 
}
    


?>
