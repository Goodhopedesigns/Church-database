<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mgiving
 *
 * @author simon
 */
class mgiving extends CI_Model{
   /*function mgiving(){
       parent::CI_Model();
   }*/
   
   
   function get_all_giving(){
       $data = array();
       $this -> db -> where('deleted','false');
       $Q = $this -> db -> get('giving');
       if($Q->num_rows()>0){
           foreach($Q->result_array() as $row){ 
               $answer = $this -> mmembers ->get_member_by_code($row['membercode']);
               $row['name'] = $answer['fname']." ".substr($answer['mname'],0,1)." ".$answer['surname'];
               $answer1 = $this -> mgiving_category ->get_giving_category_by_id($row['giving_category']);
               $row['giving_category'] = $answer1['category'];
               $data[] = $row;
           }
       }
       $Q ->free_result();
       return $data;
   }
   
   
   function get_giving_by_member_id($member_id){
        $data = array();
        $this -> db -> where('deleted','false');        
//$options = array('id',$member_id);
       $this ->db -> where('id',$member_id);
       $Q  = $this -> db -> get('giving');
         if($Q ->num_rows() > 0){
             foreach ($Q-> result_array() as $row){
               $data[] = $row;
           }
       }
            $Q -> free_result();
            return $data;
   }
    function get_giving_by_code($membercode){
        $data = array();
        $this -> db -> where('deleted','false');
        $this -> db -> where('membercode',$membercode);
        $Q = $this -> db -> get('giving');
        if($Q -> num_rows() > 0){
            foreach($Q -> result_array() as $row){
                $data[] = $row;
            }
        }
        $Q -> free_result();
        return $data;
        }
    function get_giving_by_date($date){ 
        $data = array();
        $this -> db -> where('deleted','false');
        $this -> db -> where('date',$date);
        $Q = $this -> db -> get('giving');
        if($Q -> num_rows() > 0){
            foreach($Q -> result_array() as $row){
                $data[] = $row;
            }
        }
        $Q -> free_result();
        return $data;
       }
   function get_giving_by_cat($cat){ 
       $data = array();
       $this -> db -> where('deleted','false');
       $this -> db -> where('giving_category',$cat);
      print_r($Q = $this -> db -> get('giving'));exit;
       if($Q -> num_rows() > 0){
           foreach($Q -> result_array() as $row){
               $data[] = $row;
           }
       }
       $Q -> free_result();
       return $data;
   }
   
      function get_giving_dropdown()
	{
		$data = array();
		$this -> db -> from('giving_category');
		$Q = $this -> db -> get();
		if($Q -> num_rows() > 0)
			{
				$data[0] = ' Select ';
				foreach($Q -> result_array() as $answer)
					{
						$data[$answer['id']] = $answer['category'];
					}
			}
			$Q -> free_result();
			return $data;
	}

   
   
      function giving_add(){
       $values = array('id' => '',
                        'membercode' => $this->input->post('mcode'),
                        'giving_category' => $this->input->post('giving_category'),
                        'date' => $this->input->post('date'),
                        'amount' => $this->input->post('amount')
                        ); 
       $this -> db -> insert('giving',$values);
   }
   
   function get_giving_by_id_1($id){
        $data = array();
       $this -> db -> where('id',$id);
       $Q = $this -> db -> get('giving');
       if($Q->num_rows()>0)
	   {
           $data = $Q->row_array();
		}
       $Q->free_result();
       return $data;
   }
   
   function delete_giving($id)
   {
		$values = array('deleted' => 'true');
			$this -> db -> where('id',$id);
			$this -> db -> update('giving',$values);
   }
   
   function edit_giving($id)//id	membercode	giving_category	date	amount
   {
        $values = array(
                        'membercode' => $this -> input -> post('membercode'),
                        'giving_category' => $this -> input -> post('giving_category'),
                        'date' => $this -> input -> post('date'),
                        'amount' => $this -> input -> post('amount')
                       );
        $this -> db -> where('id',$id);
        $this -> db -> update('giving',$values);
   }
   
   function search($keyword)
   {
	$data = array();
	$Q = $this -> db -> query(" SELECT * FROM members WHERE (fname LIKE '%$keyword%' 
							  OR mname LIKE '%$keyword%' OR surname LIKE '%$keyword%' OR 
								residence LIKE '%$keyword%' OR code_no LIKE '%$keyword%') 
							  AND (status = 'active')");
			if($Q -> num_rows() > 0){
				foreach($Q -> result_array() as $row){
					$answer = $this -> mwelcome_group -> get_welcome_grp_by_id($row['welcome_groupno']);
					$row['welcome_groupno'] = $answer['name'];
					$data[] = $row;
				}
			}
			$Q -> free_result();
			return $data;
   }


   
}

?>
