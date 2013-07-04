<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mvistors
 *
 * @author simon
 */
class mvisitors extends CI_Model{
    function get_all_vistors(){
      $data = array();
      $Q = $this -> db -> get('visitors');
            if($Q->num_rows()>0){
                
           foreach($Q->result_array() as $row){
               $answer['name'] = $row['fname']." ".substr($row['mname'],0,1)." ".$row['surname'];
               $row['name'] = $answer['name'];
               $data[] = $row;
           }
       }
       $Q ->free_result();
       return $data;
   }
   function get_visitor_by_id($id){
        $data = array();
       $this -> db -> where('id',$id);
       $Q = $this -> db -> get('visitors');
       if($Q->num_rows()>0){
           $data = $Q->row_array();
       }
       $Q->free_result();
       return $data;
   }
   function add_vistor(){
       $college = $this -> input -> post('college');
       if( $college ==""){
           $college = "NONE";
       }
       $values = array(
                        'id' => '',
                        'fname' => $this -> input -> post('fname'),
                        'mname' => $this -> input -> post('mname'),
                        'surname' => $this -> input -> post('surname'),
                        'sex' => $this -> input -> post('sex'),
                        'title' => $this -> input -> post('title'),
                        'email' => $this -> input -> post('email'),
                        'residence' => $this -> input -> post('residence'),
                        'profession' => $this -> input -> post('profession'),
                        'date_visited' => $this -> input -> post('date_visited'),
                        'phone' => $this -> input -> post('phone'),
                        'college' => $college
                       );
       $this -> db -> insert('visitors',$values);
   }
   function edit_visitor($id){
        $values = array(
                        'fname' => $this -> input -> post('fname'),
                        'mname' => $this -> input -> post('mname'),
                        'surname' => $this -> input -> post('surname'),
                        'sex' => $this -> input -> post('sex'),
                        'title' => $this -> input -> post('title'),
                        'email' => $this -> input -> post('email'),
                        'residence' => $this -> input -> post('residence'),
                        'profession' => $this -> input -> post('profession'),
                        'date_visited' => $this -> input -> post('date_visited'),
                        'phone' => $this -> input -> post('phone'),
                        'college' => $this -> input -> post('college')
                       );
        $this -> db -> where('id',$id);
        $this -> db -> update('visitors',$values);
   }
   
    function export_visitors()
    {
        $Q = $this -> db -> query("SELECT * FROM visitors ");
        return $this -> dbutil -> csv_from_result($Q,",","\n");					   
    }
    
    function get_all_visitors_pdf()
    {
       $data = array();
        $this -> db -> where('id !=',77);	// this is the sample data used as template.....
        //$this -> db -> where('status','active');
        $Q = $this -> db -> get('visitors');
        //echo $this -> db -> last_query();exit;
        if($Q->num_rows()>0){
            foreach($Q->result_array() as $row){
                $data[] = $row;
            }//exit;
       }
       $Q ->free_result();
       return $data;
   
    }
    
    function search($keyword){
	$data = array();//			sex	title	email			date_visited	phone	
	$Q = $this -> db -> query(" SELECT * FROM visitors WHERE (fname LIKE '%$keyword%' 
							  OR mname LIKE '%$keyword%' OR residence LIKE '%$keyword%' OR 
								surname LIKE '%$keyword%' OR profession LIKE '%$keyword%' OR college LIKE '%$keyword%')");
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
