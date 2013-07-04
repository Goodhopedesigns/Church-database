<?php 
	session_start();
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attendance extends CI_Controller {

	function Attendance()
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
			$data['title'] = 'CIS | Attendance List';
			$data['main'] = 'attendance/attendance_ls';
			$data['answer'] = $this -> mattendance -> get_all_attendance();
			$data['list_title'] = 'List of all attendences';
                        if($this -> input -> is_ajax_request()){       
                $this->load->view($data['main'],$data);              
             }else{
                $this->load->view('generic/template',$data);
            }
		}
		
	public function manage()
		{
			$data['title'] = 'CIS | Attendance Manage';
			$data['main'] = 'attendance/attendance_ls';
			$data['answer'] = $this -> mattendance -> get_all_attendance();
			$this -> load ->vars($data);
			$this->load->view('generic/template');
		}

		
	function addingAttendance(){ // adding member to database.	
      
            $this -> mattendance -> add_attendance();
            redirect('Attendance/index');
	   
			
	}
	function addAttendance()  // add member form.
		{
			$data['title'] = "CIS | Add Attendance";
			$data['main'] = 'attendance/attendance_add';
			$this -> load ->vars($data);
			$this->load->view('generic/template');
		}	
	function editAttendance($id) // editing form..
		{
			$data['answer'] = $this -> mattendance -> get_attendance_by_id($id);
			$data['title'] = "CIS | Edit Attendance";
			$data['main'] = 'attendance/attendance_edit';
			$this -> load ->vars($data);
			$this->load->view('generic/template');
		}
		
		
    function editingAttendance($id)
	{
		       $this -> mattendance -> edit_attendance($id);
		       redirect('Attendance/index');
	}
		
		
	function deleteGiving($memberid)
		{
			$this -> mmembers -> delete_member($memberid);
			redirect('members/index','refresh');
		}
                
    function export()
    {
        $this -> load -> helper('download');
        $csv = $this -> mattendance -> export_attendance();
        $name = "Attendance_export_list.csv";
        force_download($name,$csv);
        redirect('attendance/index','refresh');
    }
         
    function attendanceListPdf()
    {
        $data['answer'] = $this -> mattendance -> get_all_attendance_pdf();
        $data['header'] = "LIST OF CITYHARVEST CHURCH ATTENDANCE";
        $data['title'] = 'CIS | attendance list PDF ';
        //$this -> load -> library('mpdf');	loaded in the constructor.....	
        $html = $this->load->view('attendance/_pdf', $data, TRUE);		
        $this -> mpdf -> WriteHTML($html);
        $this -> mpdf -> Output();
    }
    
    function search()
    { 
        $keyword = $this -> input -> post('search');				
        $data['answer'] = $this -> mattendance -> search($keyword);
        $data['list_title'] = 'Search results for <i style="color:black;"><b>\''.$keyword.'\'</b></i>';
        $data['main'] = 'attendance/attendance_ls';
        if($this -> input -> is_ajax_request()){
            $this -> load -> view($data['main'],$data);
        }else{
            $this -> load -> view('generic/template',$data);
        }
    }
  

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */