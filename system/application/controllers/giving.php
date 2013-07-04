<?php 
/**
	 * 
         * author Stanley Mtonyole G
	 */

	session_start();
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Giving extends CI_Controller {

	function Giving()
	 {
		if(!isset($_SESSION['user'])){ redirect('welcome/index','refresh');}
		parent::__construct();
                $this -> load -> library('mpdf');
                $this -> load -> library('pagination');
                $this -> load -> library('javascript');
                $this -> load -> library('session');

	 }

	public function index()
        {
            $data['title'] = 'CIS | Giving List';
            $data['main'] = 'givings/giving_ls';
            $data['list_title'] = 'List of Giving';
            $data['answer'] = $this -> mgiving -> get_all_giving();
            if($this -> input -> is_ajax_request()){       
                $this->load->view($data['main'],$data);              
             }else{
                $this->load->view('generic/template',$data);
            }
        }
		
	public function manage()
        {
            $data['title'] = 'CIS | Giving Manage';
            $data['main'] = 'givings/giving_ls';
            $data['answer'] = $this -> mgiving -> get_all_giving();
            $this -> load ->vars($data);
            $this->load->view('generic/template');
        }

		
	function addingGiving() // adding member to database.
                {
                       
                            $add = $this -> mgiving -> giving_add();
                            $data['title'] = 'CIS | Giving List';
                            redirect('giving/index');
                       
		}
	function addGiving()  // add giving form.
		{
			$data['answer'] = $this->mmembers->get_members_code_dropdown();
			$data['categories'] = $this->mgiving->get_giving_dropdown();
			$data['title'] = "CIS | Add Giving";
			$data['main'] = 'givings/giving_add';
			$this -> load ->vars($data);
			$this->load->view('generic/template');
		}	
	function editGiving($givingid) // editing form..
		{
			$data['answer'] = $this -> mgiving -> get_giving_by_id_1($givingid);
			//$data['answer'] = $this -> mgiving -> get_giving_by_id_1($givingid);
			$data['category'] = $this->mgiving->get_giving_dropdown();
			$data['title'] = "CIS | Edit Giving";
			$data['main'] = 'givings/giving_edit';
			$this -> load ->vars($data);
			$this->load->view('generic/template');
		}
	function editingGiving($id)
		{
			
                        $this -> mgiving -> edit_giving($id);
                        redirect('giving/index');  
			
			
		}
		
	function deleteGiving($id)
		{
			$this -> mgiving -> delete_giving($id);
			redirect('giving/index');
		}
                
        function search(){ 
		$keyword = $this -> input -> post('search');				
		$data['answer'] = $this -> mgiving -> search($keyword);
                //$data['welcome'] = $this -> mwelcome_group -> get_welcome_grp_dropdown();
                $data['list_title'] = 'Search results for <i style="color:black;"><b>\''.$keyword.'\'</b></i>';
                $data['main'] = 'givings/giving_ls';
                if($this -> input -> is_ajax_request()){
                    $this -> load -> view($data['main'],$data);
                }else{
                    $this -> load -> view('generic/template',$data);
                }
	 }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */