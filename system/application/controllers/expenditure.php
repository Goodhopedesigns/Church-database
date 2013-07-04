<?php
session_start();


/**
 * Description of expenditure
 *
 * @author simon
 */
class expenditure extends CI_Controller{

	function expenditure()
	 {
		if(!isset($_SESSION['user'])){ redirect('welcome/index','refresh');}
		parent::__construct();
	 }
 
    
    function index (){
        $data['header'] = 'MANAGE EXPENDITURES';
        $data['title'] = 'CIS | expenditures';
        $data['list_title'] = 'List of expenditures';
        $data['main'] = 'expenditure/expenditure_ls';
        $data['answer'] = $this -> mexpenditure -> get_all_expenditures();
          if($this -> input -> is_ajax_request()){       
                $this->load->view($data['main'],$data);              
             }else{
                $this->load->view('generic/template',$data);
            }
    }
    
    function recordExpenditureFrm(){
        $data['header'] = 'RECORD EXPENDITURE';
        $data['title'] = 'CIS | record expenditure';
        $data['answer'] = $this -> mexpenditure_category -> get_category_dropdown();
        $data['main'] = 'expenditure/expenditure_record';
        $this -> load -> vars($data);
        $this -> load -> view('generic/template');
        }
    function recordingExpenditure(){
        if(isset($_POST['submit']))
        {
        $this -> mexpenditure -> record_expenditure();
        redirect('expenditure/viewExpenditure','refresh');
        }
        else
        {
            redirect('expenditure/index','refresh');
        }
    }
    function viewExpenditure()
    {
        $data['header'] = 'ALL CHURCH EXPENDITURES';
        $data['title'] = 'CIS | expenditures';
        $data['main'] = 'expenditure/expenditure_ls';
        $data['answer'] = $this -> mexpenditure -> get_all_expenditures();
        $this -> load -> vars($data);
        $this -> load -> view('generic/template');
    }
    function editExpenditureFrm($id){
        $data['header'] = 'EDIT EXPENDITURE';
        $data['title'] = 'CIS | Edit expenditure';
        $data['expenditure'] = $this -> mexpenditure -> get_expenditure_by_id($id);
        $data['answer'] = $this -> mexpenditure_category -> get_category_dropdown();
        $data['main'] = 'expenditure/expenditure_edit';
        $this -> load -> vars($data);
        $this -> load -> view('generic/template');
    }
    function editingExpenditure($id,$expend_cat){
        if(isset($_POST['submit']))
        {
       $category = $this -> input -> post('category');
        if($category == 0){
           $category = $expend_cat;
       }
       $this -> mexpenditure -> edit_expenditure($id,$category);
       redirect('expenditure/viewExpenditure','refresh');
        }
        else
        {
           redirect('expenditure/viewExpenditure','refresh');
        }
    }
    function deleteExpenditure($id){
       $this -> mexpenditure -> delete_expenditure($id);
        redirect('expenditure/viewExpenditure','refresh');
    }
    
   function viewExpenditureCategory()
    {
       $data['header'] = 'ALL CHURCH EXPENDITURE CATEGORIES';
       $data['title'] = 'CIS | expenditures';
       $data['answer'] = $this -> mexpenditure_category ->get_all_expend_category();
       $data['main'] = 'expenditure/expenditure_category_ls';
       $this -> load -> vars($data);
       $this -> load -> view('generic/template');
       
    }
   function ExpenditureCategoryAddFrm()
   {
       $data['header'] = 'ADD EXPENDITURE CATEGORY';
       $data['title'] = 'CIS | expenditures';
       $data['main'] = 'expenditure/expenditure_category_add';
       $this -> load -> vars($data);
       $this -> load -> view('generic/template');
   }
   function expenditureCategoryAdd()
   {
       if(isset($_POST['submit']))
       {
        $this -> mexpenditure_category -> add_expenditure_category();
       redirect('expenditure/viewExpenditureCategory','refresh');
       }
 else {
       redirect('expenditure/viewExpenditureCategory','refresh');    
       }
   }
     function expendCategoryEditFrm($id){
       $data['header'] = 'EDIT EXPENDITURE CATEGORY';
       $data['title'] = 'CIS | expenditures';
       $data['answer'] = $this -> mexpenditure_category -> get_expend_category_by_id($id);
       $data['main'] = 'expenditure/expenditure_category_edit';
       $this -> load -> vars($data);
       $this -> load -> view('generic/template');
        /*$this -> mexpenditure_category -> exped_category_edit($id);
        redirect('expenditure/viewExpenditureCategory','refresh');*/
     }
     function expendCategoryEditing($id){
         if(isset($_POST['submit']))
         {
            $this -> mexpenditure_category -> edit_expend_category($id);
            redirect('expenditure/viewExpenditureCategory','refresh');
         }
         
         else 
             {
               redirect('expenditure/viewExpenditureCategory','refresh');
             
             }
         }
     function expendCategoryDelete($id){
         
                 $this -> mexpenditure_category -> delete_expend_category($id);
                 redirect('expenditure/viewExpenditureCategory','refresh');  
     }
     
     function search()
    { 
        $keyword = $this -> input -> post('search');				
        $data['answer'] = $this -> mexpenditure -> search($keyword);
        $data['list_title'] = 'Search results for <i style="color:black;"><b>\''.$keyword.'\'</b></i>';
        $data['main'] = 'expenditure/expenditure_ls';
        if($this -> input -> is_ajax_request()){
            $this -> load -> view($data['main'],$data);
        }else{
            $this -> load -> view('generic/template',$data);
        }
    }
     
}

?>
