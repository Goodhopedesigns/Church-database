<?php


class mministries extends CI_Model{
   
   
   
    
    function get_all_ministries(){
       $data = array();
       //$this -> db -> where('ministryid','false');
       $Q = $this -> db -> get('ministry');
       //$sql =  "SELECT * FROM ministry WHERE id IN
	//(SELECT ministryid FROM member_ministry";
	//$Q = $this -> db -> query($sql);
       if($Q->num_rows()>0)
        {
           foreach($Q->result_array() as $row){ 
          
               $data[] = $row;
           }
        }
       $Q ->free_result();
       return $data;
   }
   
   
   function get_ministry_by_member_id($member_id){
        $data = array();
       // $this -> db -> where('deleted','false');        
       $this ->db -> where('id',$member_id);
       $Q  = $this -> db -> get('member_ministry');
         if($Q ->num_rows() > 0){
             foreach ($Q-> result_array() as $row){
               $data[] = $row;
           }
       }
            $Q -> free_result();
            return $data;
   }
   
   function get_ministry_by_cat($cat){ 
       $data = array();
       //$this -> db -> where('deleted','false');
       $this -> db -> where('ministry_category',$cat);
      print_r($Q = $this -> db -> get('member_ministry'));exit;
       if($Q -> num_rows() > 0){
           foreach($Q -> result_array() as $row){
               $data[] = $row;
           }
       }
       $Q -> free_result();
       return $data;
   }
   
      function get_ministry_dropdown()
	{
		$data = array();
		$this -> db -> from('ministry_category');
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

   
   
      function ministry_add(){
       $values = array('id' => '',
                        'name' => $this->input->post('name'),
                        //'ministry_category' => $this->input->post('ministry_category'),
                        'description' => $this->input->post('description')
                        ); 
       $this -> db -> insert('ministry',$values);
   }
   
   function get_ministry_by_id($id){
        $data = array();
       $this -> db -> where('id',$id);
       $Q = $this -> db -> get('ministry');
       if($Q->num_rows()>0)
	   {
           $data = $Q->row_array();
		}
       $Q->free_result();
       return $data;
   }
   //get_ministry_details($ministryid)
   function get_ministry_details($id){
        $data = array();
        //$this -> db -> where('id',$id);
        //$Q = $this -> db -> get('ministry');
        
        $sql =  "SELECT * FROM members WHERE id IN ( SELECT memberid FROM member_ministry WHERE ministryid = '$id') ";
	$Q = $this -> db -> query($sql);
        if($Q->num_rows()>0)
        {
            foreach($Q -> result_array() as $row){
                //$answer = $this -> mwelcome_group -> get_welcome_grp_by_id($row['welcome_groupno']);
                //$row['welcome_groupno'] = $answer['name'];
                $data[] = $row;
                
            }
           //$data = $Q->row_array();
        }
       $Q->free_result();
       return $data;
   }

   function edit_ministry($id){//description
        $values = array(
                        'name' => $this -> input -> post('name'),
                       // 'ministry_category' => $this -> input -> post('ministry_category'),
                        'description' => $this -> input -> post('description')
                       );
        $this -> db -> where('id',$id);
        $this -> db -> update('ministry',$values);
   }
   
    public function record_count() {
			$this -> db -> select('COUNT(id) AS TOTAL');
			//$this -> db -> where('status','active');
			$Q = $this -> db -> get('ministry');
			if($Q->num_rows()>0)
				{
					$row = $Q->row_array();
					$data = $row['TOTAL'];
				}
	        return $data;
    }
    
    function search($keyword){
	$data = array();
	$Q = $this -> db -> query(" SELECT * FROM ministry WHERE (name LIKE '%$keyword%' 
                                    OR description LIKE '%$keyword%')");
            if($Q -> num_rows() > 0){
                foreach($Q -> result_array() as $row){
            //        $answer = $this -> mwelcome_group -> get_welcome_grp_by_id($row['welcome_groupno']);
              //      $row['welcome_groupno'] = $answer['name'];
                    $data[] = $row;
                }
            }
            $Q -> free_result();
            return $data;
   }

   
}

?>
