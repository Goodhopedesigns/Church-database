<?php 
	
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pledge_details extends CI_Controller {
		function pledge_details(){
			parent::__construct();
			session_start();
			if(!isset($_SESSION['user'])){ redirect('index.php/welcome/index','refresh');}
		}
	
	function index(){
		$data['answer'] = $this -> mpledge_details -> get_all_pledges();
		$data['title'] = "CIS | PLEDGE LIST PAGE";
		$data['header'] = "	UNCLEARED PLEDGES ON DIFFERENT CATEGORIES";
		$data['main'] = "pledge_details/pledge_details_ls";
		$this -> load -> vars($data);
		$this -> load -> view('generic/template');
	}
	function addPledge(){
		$data['title'] = "CIS | PLEDGE DETAILS ADD";
		$data['header'] = "ADD PLEDGE DETAILS FOR A PARTICULAR CATEGORY.";
		$data['answer'] = $this->mmembers->get_members_code_dropdown(); 
		$data['main'] = "pledge_details/pledge_details_add";
		$data['category'] = $this -> mgiving_category -> get_pledged_giving_dropdown();
		$this -> load -> vars($data);
		$this -> load -> view('generic/template');
	}
	
	function AddingPledge(){	
		if(isset($_POST['submit'])){
			$this -> mpledge_details -> add_pledge();
			redirect('index.php/pledge_details/index','refresh');
		}
		else{	
			redirect('index.php/pledge_details/index','refresh');
		}
	}
	function EditPledge($id){
		$data['title'] = "CIS | PLEDGE DETAILS EDIT";
		$data['header'] = "EDITING PLEDGE DETAILS .";
		$data['answer'] = $this->mmembers->get_members_code_dropdown();
		$data['member'] = $this -> mpledge_details -> get_pledge_details_by_id($id);
		$data['main'] = "pledge_details/pledge_details_edit";
		$data['category'] = $this -> mgiving_category -> get_pledged_giving_dropdown();
		$this -> load -> vars($data);
		$this -> load -> view('generic/template');
	}
	function EditingPledge($memberid,$giving,$id){
		if(isset($_POST['submit'])){
		 $member = $this -> input -> post('member');
		 $giving_cat = $this -> input -> post('category');
		 // tracing for whether changes on the drop down have been made......
		 if($member == 0){
			$member = $memberid;
		 }
		 if($giving_cat == 0){
			$giving_cat = $giving;
		 }
		// then updates to the database...........
		$this -> mpledge_details -> edit_pledge($id,$member,$giving_cat);
			redirect('index.php/pledge_details/index','refresh');
		 }
		 else{
			redirect('index.php/pledge_details/index','refresh');
		 }
	}
	function pledgeClearanceFrm($id){
		$data['title'] = 'CIS | PLEDGE CLEARANCE';
		$data['header'] = 'PLEDGE CLEARANCE';
		$data['pledge_details'] = $this -> mpledge_details -> get_pledge_details_by_id($id);
		$membercode = $data['pledge_details']['member_code'];
		$data['member'] = $this -> mmembers -> get_member_by_code($membercode);
		$data['main'] = 'pledge_details/pledge_clearance';
		$this -> load -> view('generic/template',$data);
	}
	function pledgeClearing($id){
		if($this -> input -> post('submit')){
			$this -> mpledge_details -> pledge_clearing($id);
			redirect('index.php/pledge_details/index','refresh');
			
		}
	}
	//---------------------------------------------REPORT VIEWER FUNCTIONS ----------------------------------------
	function pledgeDetailsByCategory(){
		$category_id = $this -> input -> post('category');
		$data['answer'] = $this -> mpledge_details -> get_pledge_details_by_cat($category_id);
		$data['categories'] = $this -> mgiving_category -> get_pledged_giving_dropdown();
		//echo $data['answer'][0]['category'];exit;
		$data['title'] = "CIS | PLEDGE LIST PAGE";
		$answer = $this -> mgiving_category -> get_giving_category_by_id($category_id );
		$data['cartid'] = $answer['id'];
		$data['header'] = "	UNCLEARED PLEDGES ON ".strtoupper($answer['category'])." CATEGORIES";
		$data['cat']=  1; // just a variable to control view.........
		$data['main'] = "givings/giving_pledges";
		$this -> load -> vars($data);
		$this -> load -> view('generic/template');
	}
	function pledgeDetailsByCatPdf($catid){
	
		 $data['title'] = "CIS | PLEDGE LIST PAGE";
		 $data['answer'] = $this -> mpledge_details -> get_pledge_details_by_cat($catid);
		 $answer = $this -> mgiving_category -> get_giving_category_by_id($catid );
		 $data['header'] = " UNCLEARED PLEDGES ON ".strtoupper($answer['category'])." CATEGORIES";
		 $data['cat']=  1; // just a variable to control view.........
		 $this -> load -> library('mpdf');	
		 $html = $this->load->view('pledge_details/pledge_details_pdf', $data, TRUE);		
		 $this -> mpdf -> WriteHTML($html);
		 $this -> mpdf -> Output();
	}
	}