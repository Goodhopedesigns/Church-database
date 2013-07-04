<?php session_start();

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of member_ministry
 *
 * @author simon
 */
class member_ministry extends CI_Controller{

	function member_ministry()
	 {
		if(!isset($_SESSION['user'])){ redirect('welcome/index','refresh');}
		parent::__construct();
	 }

	
    public function index()
        {
        $data['header'] = 'LIST OF MEMBER MINISTRIES';
        $data['title'] = 'CIS | MINISRIES';
        $data['main'] = 'members/member_ministry_ls';
        $data['answer'] = $this -> mmember_ministry -> get_all_member_ministries();
        //$data['members'] = $this -> mmembers -> get_memberswithnoministry_dropdown();
        $this -> load ->vars($data);
        $this->load->view('generic/template');
        }
    function assignMemberFrm(){
        $data['header'] = 'ASSIGNING A MEMBER TO A MINISTRY';
        $data['title'] = 'CIS | MINISRIES';
        $data['main'] = 'members/member_ministry_assign';
        $data['answer'] = $this -> mministry_groups -> get_ministrygrp_dropdown();
        $data['members'] = $this -> mmembers -> get_memberswithnoministry_dropdown();
        $this -> load ->vars($data);
        $this->load->view('generic/template');
    }
    function assignMember(){
            if(isset($_POST['submit'])){
                $this -> mmember_ministry -> assign_member();
                redirect('member_ministry','refresh');
            }
           else{
               redirect('member_ministry','refresh');
           }
        }
    function memberMinistryView(){
        $data['title'] = "CIS | MINISTRIES VIEW";
        $data['header'] = 'LIST OF ALL CITYHARVEST MINISTRY GROUPS';
        $data['main'] = 'members/member_ministry_ls_report';
        $data['answer'] = $this -> mmember_ministry -> get_all_member_ministries();
        $this -> load ->vars($data);
        $this->load->view('generic/template');
    }    
}

?>