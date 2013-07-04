<?php
session_start();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vistors
 *
 * @author simon
 * @editor Stanley and Jeremiah
 */
class visitors extends CI_Controller{

	function visitors()
	 {
		if(!isset($_SESSION['user'])){ redirect('welcome/index','refresh');}
		parent::__construct();
                $this -> load -> library('mpdf');
                $this -> load -> library('pagination');
                $this -> load -> library('javascript');
                $this -> load -> library('session');
	 }
   
    function index(){
        $data['title'] = "CIS | visitors";
        $data['header'] = "LIST OF ALL VISITORS";
        $data['main'] = 'visitors/visitors_ls';
        $data['list_title'] = 'List of all visitors';
        $data['answer'] = $this -> mvisitors -> get_all_vistors();
        if($this -> input -> is_ajax_request()){       
            $this->load->view($data['main'],$data);              
        }else{
            $this->load->view('generic/template',$data);
        } 
    }
    
    function addVisitorFrm()
    {
        
        $data['title'] = "CIS | Add visitor";
        $data['header'] = "ADDING VISITOR'S INFORMATION";
        $data['main'] = 'visitors/visitor_add';
         if($this -> input -> is_ajax_request()){       
            $this->load->view($data['main'],$data);              
        }else{
            $this->load->view('generic/template',$data);
        } 
    }
    function addingVisitor(){
         if($this -> input -> is_ajax_request()){
             $this -> mvisitors -> add_vistor();
             redirect('visitors/index');
         }else{
             redirect('visitors/index');
         }
    }
 	
	
   function editVisitor($id){ //this display a form
        $data['title'] = "CIS | Edit visitor";
        $data['header'] = "EDITING VISITOR'S INFORMATION";
        $data['answer'] = $this -> mvisitors -> get_visitor_by_id($id);
        $data['main'] = 'visitors/visitors_edit';
         if($this -> input -> is_ajax_request()){       
            $this->load->view($data['main'],$data);              
        }else{
            $this->load->view('generic/template',$data);
        } 
   }
   function editingVisitor($id)
   {
       
			$this -> mvisitors -> edit_visitor($id);
			redirect('visitors/index');  
	
   }
   
    function export()
    {
        $this -> load -> helper('download');
        $csv = $this -> mvisitors -> export_visitors();
        $name = "Visitors_export_list.csv";
        force_download($name,$csv);
        redirect('visitors/index','refresh');
    }
         
    function visitorsListPdf()
    {
        $data['answer'] = $this -> mvisitors -> get_all_visitors_pdf();
        $data['header'] = "LIST OF CITYHARVEST CHURCH VISITORS";
        $data['title'] = 'CIS | visitors list PDF ';
        //$this -> load -> library('mpdf');	loaded in the constructor.....	
        $html = $this->load->view('visitors/_pdf', $data, TRUE);		
        $this -> mpdf -> WriteHTML($html);
        $this -> mpdf -> Output();
    }
    
    function search()
    { 
        $keyword = $this -> input -> post('search');				
        $data['answer'] = $this -> mvisitors -> search($keyword);
        $data['list_title'] = 'Search results for <i style="color:black;"><b>\''.$keyword.'\'</b></i>';
        $data['main'] = 'visitors/visitors_ls';
        if($this -> input -> is_ajax_request()){
            $this -> load -> view($data['main'],$data);
        }else{
            $this -> load -> view('generic/template',$data);
        }
    }
   
}

?>
