<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inventory
 *
 * @author simon
 */
class inventory extends CI_Controller{
	
	function inventory()
	 {      session_start();
		if(!isset($_SESSION['user'])){
                    
                    redirect('welcome/index');                    
                    }
		parent::__construct();
                $this -> load -> library('mpdf');
                $this -> load -> library('pagination');
                $this -> load -> library('javascript');
                $this -> load -> library('session');
	 }

    function index()
    {
        $data['title'] = 'CIS inventory';
        $data['main'] = 'inventories/inventory_ls';
        $data['header'] = 'LIST OF ALL CHURCH ASSETS';
        $data['list_title'] = 'List of all inventories';
        $data['answer'] = $this -> minventory ->get_all_inventory();
        $config = array();
	        $config["base_url"] = base_url() . "inventory/index";
	        $config["total_rows"] = $this->minventory->record_count();
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 3;
                $config['num_tag_open'] = '<div class="btn btn-mini">';
                $config['num_tag_close'] = '</div>';
                $config['prev_tag_open'] = '<div class="btn btn-mini">';
                $config['prev_tag_close'] = '</div>';
                $config['next_tag_open'] = '<div class="btn btn-mini">';
                $config['next_tag_close'] = '</div>';
                $config['cur_tag_open'] = '<div class="btn btn-mini inactive">';
                $config['cur_tag_close'] = '</div>';
	 
	        $this->pagination->initialize($config);
	        $data["links"] = $this->pagination->create_links();
                
        if($this -> input -> is_ajax_request())
        {       
            $this->load->view($data['main'],$data);              
        }
        else
        {
            $this->load->view('generic/template',$data);
        }
    }
    function inventoryTakingFrm(){
       $data['title'] = 'CIS inventory';
       $data['main'] = 'inventories/inventory_taking';
       $data['header'] = 'fill the details of the item to be added';
       $data['answer'] = $this -> mmembers -> get_members_dropdown();
       $data['status'] = $this -> minventory_status -> get_status_dropdown();
       $this -> load -> vars($data);
       $this -> load -> view('generic/template');
    }
    function inventoryTaking(){
       
                $this -> minventory -> add_inventory_item();
                redirect('inventory/index');
       
    }
   function editInventoryFrm($id){
       $data['title'] = 'CIS inventory';
       $data['main'] = 'inventories/inventory_edit';
       $data['header'] = 'EDITING ASSET DETAILS';
       $data['inventory'] = $this ->minventory -> get_inventory_by_id($id);
       $data['answer'] = $this -> mmembers -> get_members_dropdown();
       $data['status'] = $this -> minventory_status -> get_status_dropdown();
       $this -> load -> vars($data);
       $this -> load -> view('generic/template');
   }
   function editingInventory($id,$status,$bought_donated){
       
          $bought = $this -> input -> post('bought_donated');
          $inv_status = $this -> input ->post('status');
           if($bought ==0){
               $bought = $bought_donated;
           }
           if($inv_status == 0){
              $inv_status = $status;
           }
           
            $this->minventory->edit_inventory($id,$inv_status,$bought);
             redirect('inventory/index');
      
   }
  function deleteInventoryAsset($id){
      $this -> minventory -> delete_inventory_asset($id);
      redirect('inventory/index','refresh');
  } 
  
    function export()
    {
        $this -> load -> helper('download');
        $csv = $this -> minventory -> export_inventory();
        $name = "Members_export_list.csv";
        force_download($name,$csv);
        redirect('inventory/index','refresh');
    }
         
    function inventoryListPdf()
    {
        $data['answer'] = $this -> minventory -> get_all_inventory_pdf();
        $data['header'] = "LIST OF ALL CITYHARVEST CHURCH INVENTORIES";
        $data['title'] = 'CIS | members list PDF ';
        //$this -> load -> library('mpdf');	loaded in the constructor.....	
        $html = $this->load->view('inventories/_pdf', $data, TRUE);		
        $this -> mpdf -> WriteHTML($html);
        $this -> mpdf -> Output();
    }
    
    function search(){ 
		$keyword = $this -> input -> post('search');				
		$data['answer'] = $this -> minventory -> search($keyword);
          //      $data['welcome'] = $this -> mwelcome_group -> get_welcome_grp_dropdown();
                $data['list_title'] = 'Search results for <i style="color:black;"><b>\''.$keyword.'\'</b></i>';
                $data['main'] = 'inventories/inventory_ls';
                if($this -> input -> is_ajax_request()){
                    $this -> load -> view($data['main'],$data);
                }else{
                    $this -> load -> view('generic/template',$data);
                }
	 }
  
}

?>
