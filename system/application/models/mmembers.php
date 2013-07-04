<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mmembers
 *
 * @author simon < simonmanangu@gmail.com >
 */
class mmembers extends CI_Model{
	
    function mmembers (){
		parent::__construct();
		
		$this -> load -> dbutil();
		$this-> load-> library('CSVReader');
	}
   
    function get_all_members_pdf(){ 
       $data = array();
       $this -> db -> where('deleted','false'); 
       $this -> db -> where('id !=',77);	// this is the sample data used as template.....
       $this -> db -> where('status','active');
       $Q = $this -> db -> get('members');
	   //echo $this -> db -> last_query();exit;
       if($Q->num_rows()>0){
           foreach($Q->result_array() as $row){
                      
			   //getting the welcome group name of the given welcome group number.
			   $answer = $this -> mwelcome_group->get_welcome_grp_by_id($row['welcome_groupno']);
                     $row['welcome_groupno'] = $answer['name'];
			   // getting the related person by the related member id.
			  $answer1 = $this -> mmembers -> get_member_by_id($row['relatedto']);
                            if(isset($answer1['id']))
                                {
                                    $row['relatedto'] =   $answer1['fname']." ".substr($answer1['mname'],0,1)." ".$answer1['surname'];
                                    $row['fname'] =   $row['fname']." ".substr($row['mname'],0,1)." ".$row['surname'];
                                
                                    $answer2 = $this -> mrelationship -> get_relationship_by_id($row['relationship']);
                                    $row['relationship'] = $answer2['relationship'];
                          }
			 $data[] = $row;
           }//exit;
       }
       $Q ->free_result();
       return $data;
   }
   
   function get_member_by_id($id){
        $data = array();
       $this -> db -> where('deleted','false');
       $this -> db -> where('id',$id);
       $Q = $this -> db -> get('members');
       if($Q->num_rows()>0){
           $data = $Q->row_array();
       }
       $Q->free_result();
       return $data;
   }
   
   function get_member_by_code($membercode){
       $data = array();
       $this -> db -> where('deleted','false');
       $this ->db -> where('code_no',$membercode);
       $this -> db -> where('status','active');
       $Q = $this ->db -> get('members');
       if($Q->num_rows){
           
          $data = $Q->row_array();
         
       }
       $Q->free_result();
       return $data;
       
   }
   
   function get_member_by_title($title){
       $data = array();
       $this -> db -> where('deleted','false');
       $this -> db -> where('title',$title);
       $Q = $this -> db -> get('members');
       if($Q->num_rows()>0){
           $data = $Q->row_array();
       }
       $Q->free_result();
       return $data;
   }
	
	//	total number of records in a given welcome group........
   function record_count_by_welcome($welcome){
		$this -> db -> where('welcome_groupno',$welcome);
		$this -> db -> where('id !=',77);
		$this -> db -> where('status','active');
		$this -> db -> select('COUNT(id) TOTAL');
		$Q =$this -> db -> get('members');
		if($Q -> num_rows()>0){
			$row = $Q->row_array();
			$data = $row['TOTAL'];
		}
		return $data;
   }
   
   function get_by_welcome_group($welcomeGrp,$start,$limit){ 
      $data = array();
      $this -> db -> where('deleted','false'); 
      $this->db->limit($limit, $start);
       $this -> db -> where('status','active');
       $this -> db -> where('welcome_groupno',$welcomeGrp);
       $Q = $this -> db -> get('members');	
       if($Q->num_rows()>0){
		foreach($Q->result_array() as $row){
			$result = $this -> mwelcome_group -> get_welcome_grp_by_id($row['welcome_groupno']);
		   $row['welcome_groupno'] = $result['name']." [ ".$result['meeting_place']." ]<br/>";
                   $data[] = $row;
		   }
		 
       }
	   
	   //$data['total_members'] = $answer['COUNT(welcome_groupno)'];  // the total members
       $Q->free_result();
       return $data;
		}
   function get_by_dates($date1,$date2,$start,$limit){
        $data = array();
        $this -> db -> where('deleted','false');
        $this->db->limit($limit, $start);
        $this -> db -> where('status','active');
        $this -> db -> where('date_joined >=',$date1);
        $this -> db -> where('date_joined <=',$date2);
        $Q = $this -> db -> get('members');
       if($Q->num_rows()>0){
		foreach($Q-> result_array() as $row){
                   $answer= $this ->mwelcome_group->get_welcome_grp_by_id($row['welcome_groupno']);
		   $row['welcome_groupno'] = $answer['name']." [ ".$answer['meeting_place']." ] ";
		   $data[] = $row;
		   }
		   		 
		   //$data['total_members'] = $total_members;
       }	//print_r($data);exit;
       $Q->free_result();
       return $data;
   }
   function get_members_dropdown()
	{
		$data = array();
		$this -> db -> where('id !=',77); // this is the sample data..
        $this -> db -> where('status','active');
		$this -> db -> from('members');
		$Q = $this -> db -> get();
		if($Q -> num_rows() > 0)
			{
				$data[0] = ' -- SPECIFFY IF ANY -- ';
				foreach($Q -> result_array() as $answer)
					{
						$data[$answer['id']] = $answer['fname']." ".substr($answer['mname'],0,1)." ".$answer['surname'];
					}
			}
			$Q -> free_result();
			return $data;
	}
   function member_add(){
       $values = array('id' => '',
                        'fname' => $this->input->post('fname'),
                        'mname' => $this->input->post('mname'),
                        'surname' => $this->input->post('surname'),
                        'sex' =>    $this->input->post('sex'),
                        'title' => $this->input->post('title'),
                        'email' => $this->input->post('email'),
                        'residence' => $this->input->post('residence'),
                        'code_no' => $this->input->post('code_no'),
                        'welcome_groupno' => $this->input->post('welcome_group'),
                        'profession' => $this->input->post('profession'),
                        'date_joined' => $this->input->post('date_joined'),
                        'status' => 'active',
                        'relationship' => $this->input->post('relationship'),
                        'relatedto' => $this->input->post('relatedto')
                       ); 
       $this -> db -> insert('members',$values);
   }
   
   function edit_member($id,$values)
		{	//echo $this->input->post('welcome_group');exit;
				if($this -> input -> post('relatedto') == 0)
					{
						$relatedto = $values['related'];
					}
				else
					{
						$relatedto = $this -> input -> post('relatedto');
					}
				if($this->input->post('relationship') == 0)
					{
						$relationship = $values['relationship'];
					}
				else
					{
						$relationship = $this->input->post('relationship');
					}
					
					if($this->input->post('welcome_group') == 0)
					{
						 $welcome = $values['welcome'];
					}
				else
					{
						 $welcome = $this->input->post('welcome_group');
					}
				
			$values = array(
                        'fname' => $this->input->post('fname'),
                        'mname' => $this->input->post('mname'),
                        'surname' => $this->input->post('surname'),
                        'sex' =>    $this->input->post('sex'),
                        'title' => $this->input->post('title'),
                        'email' => $this->input->post('email'),
                        'residence' => $this->input->post('residence'),
                        'code_no' => $this->input->post('code_no'),
                        'welcome_groupno' => $welcome,
                        'profession' => $this->input->post('profession'),
                        'date_joined' => $this->input->post('date_joined'),
                        'relationship' => $relationship,
                        'relatedto' => $relatedto
                       ); 
		$this -> db -> where('id',$id);
		$this -> db -> update('members',$values);
		}
		
	function delete_member($memberid)
		{
			$values = array('deleted' => 'true');
			$this -> db -> where('id',$memberid);
			$this -> db -> update('members',$values);
		}
		
   function get_members_by_mail($email){
        $data = array();
       $this -> db -> where('email',$email);
       $Q = $this -> db -> get('members');
       if($Q->num_rows()>0){
          $data = $Q->row_array();
		  $id = $data['id'];
       }
       $Q->free_result();
       return $id;
   }
   function get_member_by_id_1($id){
        $data = array();
       $this -> db -> where('id',$id);
       $Q = $this -> db -> get('members');
       if($Q->num_rows()>0){
            $data = $Q->row_array();
		       $answer = $this -> mwelcome_group->get_welcome_grp_by_id($data['welcome_groupno']);
			$data['welcome_groupname'] = $answer['name'];
			$answer1 = $this -> mrelationship -> get_relationship_by_id($data['relationship']);
                        if(isset($answer1['id']))
                            {   
                                $data['relationship_name'] = $answer1['relationship'];
                                $answer2 = $this -> mmembers -> get_member_by_id($data['relatedto']);
                                $data['related_to'] = $answer2['fname']." ".substr($answer2['mname'],0,1)." ".$answer2['surname'];
                            }
       }
       $Q->free_result();
       return $data;
   }
 function get_members_code_dropdown(){
       $data = array();
		$this -> db -> where('id !=',77); // this is the sample data..
        $this -> db -> where('status','active');
		$this -> db -> from('members');	
		$Q = $this -> db -> get();
		if($Q -> num_rows() > 0)
			{	
				$data[0] = ' -- SPECIFFY IF ANY -- ';
				foreach($Q -> result_array() as $answer)
					{
						$code = $answer['code_no'];
						$data[$answer['id']] = $code."]"." ".$answer['surname'];
					}	
			}
			$Q -> free_result();
			return $data;
   }
    function get_memberswithnoministry_dropdown(){ // -- DROPDOWN LIST OF ALL MEMBERS WITH NO MINISTRIES....
        $data = array();
        $Q = $this -> db -> query("SELECT * FROM members WHERE id NOT IN (SELECT memberid FROM member_ministry )
									AND status = 'active' AND id != 77
								  ");
       if($Q -> num_rows() > 0){
           $data[0] = "--members--";
           foreach($Q -> result_array() as $row){
               $row['name'] = strtoupper($row['fname']." ".substr($row['mname'],0,1)." ".$row['surname']);
               $data[$row['id']] = $row['name'];
           }
       }
       $Q -> free_result();
       return $data;
    }
	
	function search($keyword){
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
   
   function export_members(){
	// $this -> load -> dbutil();	loadede in the constructor.................
	 $Q = $this -> db -> query("
								SELECT * FROM members WHERE status = 'active'
							   ");
		return $this -> dbutil -> csv_from_result($Q,",","\n");					   
   }
	   function importCsv(){ 
		  $config['upload_path'] = './tmp/';
		  $config['allowed_types'] = 'csv';
		  $config['max_size'] = '2000';
		  $config['remove_spaces'] = true;
		  $config['overwrite'] = true;
		  
		 // $this-> load-> library('CSVReader'); loaded in the constructor.................
		  $this-> load->  library('upload', $config);
		   
		  if(!$this-> upload-> do_upload('csvfile')){
		  $error = $this-> upload-> display_errors();
			$errors = array('error' => $error,
							);
			return $errors;
			exit();
		  }
		  
		 $csv = $this-> upload-> data();
		 $path = $csv['full_path'];
		 $data =array( 'file_name' => $csv['file_name'],
						 'csv_data' => $this -> csvreader -> parse_file($path)
						 );
		   return $data;
	}

	function add_multiple_members($data){
		foreach($data as $list){
			$values = array('id' => '',
					'fname' => $list['fname'],
					'mname' => $list['mname'],
					'surname' => $list['surname'],
					'sex' => $list['sex'],
					'title' => $list['title'],
					'email' => $list['email'],
					'residence' => $list['residence'],
					'code_no' => $list['code_no'],
					'welcome_groupno' => $list['welcome_groupno'],
					'profession' => $list['profession'],
					'date_joined' => $list['date_joined'],
					'status' => $list['status'],
					'relationship' => $list['relationship'],
					'relatedto' => $list['relatedto']
					);
			$this -> db -> insert('members',$values);
		}
		return TRUE;
	}
	function get_memberTemplate(){ 
		//$this -> load -> dbutil();	loaded in the constructor........................
		$this -> db -> where('id',77);// this is the sample data for guidance on the template...
		$Q = $this -> db -> get('members');
		return $this -> dbutil -> csv_from_result($Q,",","\n");
	}
	
	
	// MAZOEZI YA PAGINATION...............
	 public function record_count() {
			$this -> db -> select('COUNT(id) AS TOTAL');
			$this -> db -> where('status','active');
			$Q = $this -> db -> get('members');
			if($Q->num_rows()>0)
				{
					$row = $Q->row_array();
					$data = $row['TOTAL'];
				}
	        return $data;
    }
        public function get_all_members($limit, $start) {	
	                $this->db->limit($limit, $start);
			$this -> db -> where('id !=',77);
                        $this -> db -> where('deleted','false');
			$this -> db -> where('status','active');
	        $query = $this->db->get("members");
	 
	        if ($query->num_rows() > 0)
			{
				foreach ($query->result_array() as $row)
				{
					//getting the welcome group name of the given welcome group number.
					$answer = $this -> mwelcome_group->get_welcome_grp_by_id($row['welcome_groupno']);
						 $row['welcome_groupno'] = $answer['name'];
				   // getting the related person by the related member id.
					$answer1 = $this -> mmembers -> get_member_by_id($row['relatedto']);
					if(isset($answer1['id']))
					 {
						$row['relatedto'] =   $answer1['fname']." ".substr($answer1['mname'],0,1)." ".$answer1['surname'];
						$row['fname'] =   $row['fname']." ".substr($row['mname'],0,1)." ".$row['surname'];
						$answer2 = $this -> mrelationship -> get_relationship_by_id($row['relationship']);
						$row['relationship'] = $answer2['relationship'];
				     }
					$data[] = $row;
	                
	            }
	            return $data;
	        }
	        return false;
	   }
}

?>
