<?php 
session_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GivingCategory extends CI_Controller {

	function GivingCategory()
	 {
		if(!isset($_SESSION['user'])){ redirect('welcome/index','refresh');}
		parent::__construct();
	 }

	
	public function index()
		{
			$data['title'] = 'CIS | Giving List';
                        $data['list_title'] = 'Giving category list';
			$data['main'] = 'givings/giving_category_ls';
			$data['answer'] = $this -> mgiving_category -> get_all_giving_category();
			 if($this -> input -> is_ajax_request()){       
                            $this->load->view($data['main'],$data);              
                        }else{
                            $this->load->view('generic/template',$data);
                        }
		}
		
	public function manage()
		{
			
		}

		
	function addingCategory() // adding Category to database.
		{	if(isset($_POST['submit']))
                            {
                                $category = $this -> input -> post('category');
                                $add = $this -> mgiving_category -> giving_category_add();
                                redirect('givingcategory/index','refresh');
                            }
                           else
                           {
                               redirect('givingcategory/index','refresh');
                           }
		}
	function addCategory()  // add category form.
		{
			$data['title'] = "CIS | Add Giving Category";
			$data['main'] = 'givings/giving_category_add';
			$this -> load ->vars($data);
			$this->load->view('generic/template');
		}	
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */