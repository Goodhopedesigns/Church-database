<?php
	
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members extends CI_Controller {
	
	function Members(){
			parent::__construct();
			session_start();
			if(!isset($_SESSION['user'])){redirect('index.php/welcome/index','refresh');}
				$this -> load -> library('mpdf');				
				$this -> load -> library('javascript');
				$this -> load -> library('session');
				//$this -> load -> library('jquery');
				
			}
	public function index(){
                $data['header'] = 'LIST OF ALL CITYHARVEST CHURCH MEMBERS';
                $data['title'] = 'CIS | member list';
                $data['list_title'] = 'List of all members';              
                $data['main'] = 'members/members_ls';                   
                // pagination..........................
                $total_rows = 30; //$this -> mmembers -> count_records();
                $page = $this -> mpagination -> initialize('members/index',$total_rows);                
	        $data["answer"] = $this->mmembers->get_all_members(10, $page);
                $data['welcome'] = $this->mwelcome_group->get_welcome_grp_dropdown();
                $data["links"] = $this->pagination->create_links();
                
         if($this -> input -> is_ajax_request()){       
            $this->load->view($data['main'],$data);              
             }else{
            $this->load->view('generic/template',$data);
                }
                
          }
        function viewByWelcomeGroup(){
               $id = $this -> input -> post('welcome_group');
               $total_rows = 30; //$this -> mmembers -> count_records();
                $page = $this -> mpagination -> initialize('members/viewByWelcomeGroup',$total_rows);
	        $data["answer"] = $this->mmembers->get_by_welcome_group($id,10, $page);                
                $data["links"] = $this->pagination->create_links();
                $welcome_group = $this -> mwelcome_group -> get_welcome_grp_by_id($id);
                
                $data['main']= 'members/members_ls';
                $data['result']= 'members/list_table';
                $data['list_title'] = 'List of members for '.$welcome_group['name'].'['.$welcome_group['meeting_place'].']  (welcome group)';
                if($this -> input -> is_ajax_request()){       
                $this->load->view($data['result'],$data);              
                }else{
                $this->load->view('generic/template',$data);
                    }
        }//
        
         function viewByDates(){
           $date1 = $this -> input -> post('date1');
           $date2 = $this -> input -> post('date2');
                //pagination................
                $total_rows = 50; //$this -> mmembers -> count_records();
                $page = $this -> mpagination -> initialize('members/viewByDates',$total_rows);
	        $data["answer"] = $this->mmembers->get_by_dates($date1,$date2,$config["per_page"], $page);
                $data['welcome'] = $this->mwelcome_group->get_welcome_grp_dropdown();
                $data["links"] = $this->pagination->create_links();
                
                $data['main']= 'members/members_ls';
                $data['list_title'] = 'List of members joined between dates '.$date1.' and '.$date2;
                if($this -> input -> is_ajax_request()){       
                $this->load->view($data['main'],$data);              
                }else{
                $this->load->view('generic/template',$data);
                    }
        }//
                
	function addingMember(){	// adding member to database. if(isset($_POST['submit']))
                
			$email = $this -> input -> post('email');
			$phone = $this -> input -> post('phone');
			$add = $this -> mmembers -> member_add();
			$memberid = $this -> mmembers -> get_members_by_mail($email);
//			$this -> mmember_phone -> member_phone_add($memberid,$phone);
                        $_SESSION['success_msg'] = 'Member added successfully!';
			redirect('members/addmember');
                        
		}
	function addmember()  // add member form.
		{
			$data['answer'] = $this->mwelcome_group->get_welcome_grp_dropdown();
			$data['related'] = $this->mmembers->get_members_dropdown();
			$data['relationship'] = $this->mrelationship->get_relationship_dropdown();
			$data['header'] = "ADD NEW MEMBER TO THE CHURCH";
                        $data['title'] = 'CIS | adding member';
			$data['library_src'] = $this->jquery->script();
			$data['script_head'] = $this->jquery->_compile();
			$data['main'] = 'members/members_add';
			
			if($this -> input -> is_ajax_request()){       
                        $this->load->view($data['main'],$data);              
                        }else{
                        $this->load->view('generic/template',$data);
                            }
		}	
	function editMember($memberid) // editing form..
		{
			$data['answer'] = $this -> mmembers -> get_member_by_id_1($memberid);
			$data['welcome'] = $this->mwelcome_group->get_welcome_grp_dropdown();
			$data['related'] = $this->mmembers->get_members_dropdown();
			$data['relationship'] = $this->mrelationship->get_relationship_dropdown();
			$data['phone'] = $this -> mmember_phone -> get_member_phone_by_memberid($memberid);
			$data['header'] = "EDIT MEMBER'S INFORMATION";
                        $data['title'] = 'CIS | editing member';
			$data['main'] = 'members/members_edit';
			$this -> load ->vars($data);
			$this->load->view('generic/template');
		}
	function editingMember($memberid,$relatedto,$relationship,$welcome)
		{                       
                            $values = array(
                                                            'related' => $relatedto,
                                                            'relationship' => $relationship,
                                                            'welcome' => $welcome
                                                            );
                            $phone = $this -> input -> post('phone');
                            $this -> mmembers -> edit_member($memberid,$values);
                            $this -> mmember_phone -> member_phone_edit($memberid,$phone);
                            redirect('members/index');
                   
		}
		
	function deleteMember($memberid)
		{
			$this -> mmembers -> delete_member($memberid);
                        $_SESSION['success_msg'] = 'Member successfully deleted.';
			redirect('members/index');
		}

	function search(){ 
		$keyword = $this -> input -> post('search');				
		$data['answer'] = $this -> mmembers -> search($keyword);
                $data['welcome'] = $this -> mwelcome_group -> get_welcome_grp_dropdown();
                $data['list_title'] = 'Search results for <i style="color:black;"><b>\''.$keyword.'\'</b></i>';
                $data['main'] = 'members/members_ls';
                if($this -> input -> is_ajax_request()){
                    $this -> load -> view($data['main'],$data);
                }else{
                    $this -> load -> view('generic/template',$data);
                }
	 }
	
       function searchBy($seacrh_by){
		if($seacrh_by == 1){
			$data['search_by'] = 'welcome_grp';
		}
		elseif($seacrh_by == 2){
			$data['search_by'] = 'dates_btn';
		}
		else{
			// on error submit;
		}
			$data['query'] = 'ALL MEMBERS';
			$data['main'] = 'members/members_ls_report';
            $data['welcome'] = $this -> mwelcome_group -> get_welcome_grp_dropdown();
			//	pagination goes here................
			$config = array();
	        $config["base_url"] = base_url() . "index.php/members/memberView";
	        $config["total_rows"] = $this->mmembers->record_count();
	        $config["per_page"] = 5;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data["answer"] = $this->mmembers->get_all_members($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
            $data['welcome'] = $this -> mwelcome_group -> get_welcome_grp_dropdown();
			$this -> load ->vars($data);
			$this->load->view('generic/template');
	 }
	 
	function export()
	 {
		$this -> load -> helper('download');
		$csv = $this -> mmembers -> export_members();
		$name = "Members_export_list.csv";
		force_download($name,$csv);
		redirect('members/index','refresh');
	 }
	
        function import(){
		
		if($this->input->post('submit'))
		{
			if($this -> input -> post('csvinit'))
			{
					$data['csv'] = $this -> mmembers -> importCsv();
					if(! isset($data['csv']['error'])){ 
								$data['header'] = "YOU ARE ABOUT TO UPLOAD THE FOLLOWING LIST TO THE DATABASE.";
								$headers[0] = 'id';
								$headers[1]	= 'fname';		
								$headers[2]	= 'mname';
								$headers[3] = 'surname';
								$headers[4] = 'sex';
								$headers[5] = 'title';
								$headers[6] = 'email';
								$headers[7] = 'residence';
								$headers[8] = 'code_no';
								$headers[9] = 'welcome_groupno';
								$headers[10] = 'profession';
								$headers[11] = 'date_joined';
								$headers[12] = 'status';
								$headers[13] = 'relationship';
								$headers[14] = 'relatedto';
							$data['dbheaders'] = $headers;
							$data['title'] = "CIS | preview Import";
							$data['main'] = "members/members_ls_csv";
							$this -> load -> vars($data);
							$this -> load -> view('generic/template');
						}
						elseif(! isset($data['csv'])){
						
							$data['header'] = "PROBLEMS WERE DETECTED WHILE UPLOADING";
							$data['title'] = "CIS | Import errors";
							$data['main'] = "members/members_import_errors";
							$this -> load -> vars($data);
							$this -> load -> view('generic/template');
								}
						else
						{	
							$data['header'] = $data['csv']['error'];
							$data['title'] = "CIS | Import errors";
							$data['main'] = "members/members_import_errors";
							$this -> load -> vars($data);
							$this -> load -> view('generic/template');
						}
				}
				elseif($this -> input -> post('csvgo')){
					unset($_POST['submit']);
					unset($_POST['csvgo']);
					$values = $_POST;
					$add = $this -> mmembers -> add_multiple_members($values);
					if($add){
						$data['title'] = "CIS | MEMBERS VIEW";
						$MEMBER = 'MEMBER';
						if(count($values) > 1){$MEMBER.'S';}
						$data['header'] = 'YOU HAVE SUCCESSFULLY ADDED '.count($values).' NEW '.$MEMBER;
						$data['title'] = 'CIS | member list';
						$data['main'] = 'members/members_ls';
						$data['welcome'] = $this -> mwelcome_group -> get_welcome_grp_dropdown();
						$data['answer'] = $this -> mmembers -> get_all_members();
						$this -> load ->vars($data);
						$this->load->view('generic/template');
					}
				}
			 
			}
			else
			{
				redirect('index.php/members/index','refresh');
			}
	    }
	function memberTemplateDownload(){
		$this -> load -> helper('download');
		$csv = $this -> mmembers -> get_memberTemplate();
		$name = "Members_export_template.csv";
		force_download($name,$csv);
		redirect('members/index','refresh');
		}
	function memberListPdf()
		{	
			 
			 $data['answer'] = $this -> mmembers -> get_all_members_pdf();
			 $data['header'] = "LIST OF ALL CITYHARVEST CHURCH MEMBERS";
			 $data['title'] = 'CIS | members list PDF ';
			 //$this -> load -> library('mpdf');	loaded in the constructor.....	
			 $html = $this->load->view('members/member_pdf', $data, TRUE);		
			 $this -> mpdf -> WriteHTML($html);
			 $this -> mpdf -> Output();
		}
	
        function memberListPdfBywelGrp($welgrp){
		 $data['answer'] = $this -> mmembers -> get_member_byWelcomeGrp($welgrp);
		 $data['answer'][0]['welcome_groupno'];
		 $data['title'] = 'CIS | members list PDF ';
		 $data['header'] = "LIST OF ALL CITYHARVEST CHURCH MEMBERS";
		 $data['header'] = "THERE ARE ".$data['answer']['total_members']." MEMBERS WHO BELONG TO ".strtoupper($data['answer'][0]['welcome_groupno'])." WELCOME GROUP";
		 $this -> load -> library('mpdf');	
		 $html = $this->load->view('members/member_pdf', $data, TRUE);		
		 $this -> mpdf -> WriteHTML($html);
		 $this -> mpdf -> Output();
	}
	
        function memberListPdfBydateJoined($date1,$date2){
		 $data['answer'] = $this->mmembers->get_members_by_dates($date1,$date2);
		 $data['header'] = "MEMBERS JOINED BETWEEN ".$date1." AND ".$date2." ARE ".$data['answer']['total_members']." MEMBERS";
		 $data['title'] = 'CIS | members list PDF ';
		 //$this -> load -> library('mpdf');	
		 $html = $this->load->view('members/member_pdf', $data, TRUE);		
		 $this -> mpdf -> WriteHTML($html);
		 $this -> mpdf -> Output();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */