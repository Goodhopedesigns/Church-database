<?php 
/**
	 * 
         * author Stanley Mtonyole G
	 */

	session_start();
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ministries extends CI_Controller {

	function Ministries()
	 {     
		
            //if(!isset($_SESSION['user']))
            //{ redirect('index.php/welcome/index','refresh');}
		parent::__construct();
                $this -> load -> library('mpdf');               
                $this -> load -> library('javascript');
                $this -> load -> library('session');

	 }

	public function index()
        {
            $data['title'] = 'CIS | Ministries List';
            $data['main'] = 'Ministries/_ls';
            $data['list_title'] = 'List of Ministries';                        
                // pagination..........................
                $total_rows = 50; ////$this -> mministries -> count_records();
                $page = $this -> mpagination -> initialize('ministries/index',$total_rows);
	        $data["answer"] = $this->mministries->get_all_ministries(10, $page);
                $data["links"] = $this->pagination->create_links();
                
                    if($this -> input -> is_ajax_request()){       
                    $this->load->view($data['main'],$data);              
                    }else{
                    $this->load->view('generic/template',$data);
                    }
                      
        }
		
	public function manage()
        {
            $data['title'] = 'CIS | Ministries Manage';
            $data['main'] = 'Ministries/_ls';
            $data['answer'] = $this -> mministries -> get_all_ministries();
            $this -> load ->vars($data);
            $this->load->view('generic/template');
        }

		
	function addingProcess()
        {

           if($this -> input -> post('name')){
                $add = $this -> mministries -> ministry_add();
            }
                $data['title'] = 'CIS | Ministries List';
                redirect('ministries/index');
                    }
	function addFrm()
		{
			//$data['answer'] = $this->mministries->get_members_code_dropdown();
			//$data['categories'] = $this->mministries->get_ministries_dropdown();
			$data['title'] = "CIS | Add Ministries";
			$data['main'] = 'Ministries/_add';
               if($this -> input -> is_ajax_request()){       
                $this->load->view($data['main'],$data);              
               }else{
                $this->load->view('generic/template',$data);
              }
		}	
	function editFrm($ministryid) // editing form..
		{
			$data['answer'] = $this -> mministries -> get_ministry_by_id($ministryid);
			$data['title'] = "CIS | Edit Ministries";
			$data['main'] = 'ministries/_edit';
               if($this -> input -> is_ajax_request()){       
                $this->load->view($data['main'],$data);              
               }else{
                $this->load->view('generic/template',$data);
              }
		}
	function editingProcess($id)
		{
			//print_r($_POST); exit;
                        
                            $this -> mministries -> edit_ministry($id);
                            //print_r($data['edi']);exit;
                            redirect('ministries/index');
                        
                        			
		}
        function  addMembers($ministryid){
            $data['title'] = 'Ministry | Add members';
            $data['main'] = 'ministries/add_members';
            $data['list_title'] = 'List of Church members, Check to add to a ministry';
            $total_rows = 50; //$this -> mmembers -> count_records();
            $page = $this -> mpagination -> initialize('ministries/addMembers',$total_rows);
            $data['members'] = $this -> mmembers -> get_all_members(10,$page);
            $data["links"] = $this->pagination->create_links();
              if($this -> input -> is_ajax_request()){       
                $this->load->view($data['main'],$data);              
               }else{
                $this->load->view('generic/template',$data);
              }
            
        }
        
        function addingMembers(){
            $ministry_id = $this -> input -> post('ministry');
            for($i = 1; $i<=($this -> input -> post('members')); $i++){
              $member_id = $this -> input -> post('member_'.$i);
              $data = array('memberid'=>$member_id,
                            'ministryid'=>$ministry_id
                            );
                  $this -> mmember_ministry -> assign_member($data);
            }
            redirect( 'ministries/details/'.$ministry_id ); 
        }
       function removeMember($id){
           redirect('minstries/index');
       } 
       function editMember($id){
           redirect('minstries/index');
       }
		
       function details($ministryid)
		{
			$data['details'] = $this -> mministries -> get_ministry_details($ministryid);
			$data['ministry'] = $this -> mministries -> get_ministry_by_id($ministryid);
                        $data['title'] = "CIS | Ministry Details";
			$data['main'] = 'ministries/_details';
                if($this -> input -> is_ajax_request()){       
                $this->load->view($data['main'],$data);              
               }else{
                $this->load->view('generic/template',$data);
              }
		}
                
                
        function search(){ 
		$keyword = $this -> input -> post('search');				
		$data['answer'] = $this -> mministries -> search($keyword);
                //$data['welcome'] = $this -> mwelcome_group -> get_welcome_grp_dropdown();
                $data['list_title'] = 'Search results for <i style="color:black;"><b>\''.$keyword.'\'</b></i>';
                $data['main'] = 'ministries/_ls';
                if($this -> input -> is_ajax_request()){
                    $this -> load -> view($data['main'],$data);
                }else{
                    $this -> load -> view('generic/template',$data);
                }
	 }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */