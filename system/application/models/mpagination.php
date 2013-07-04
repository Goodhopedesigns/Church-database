<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pagination
 *
 * @author jeremiah
 * 
 */
class mpagination extends CI_Model{
    
    function mpagination(){
    parent:: __construct();
    $this -> load -> library('pagination');
    }
   function initialize($base_url,$total_rows){
       
                $config = array();
	        $config["base_url"] = base_url() .$base_url;
	        $config["total_rows"] = $total_rows;
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
	 
	        return $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       
   }//end initialize
   
  }
    


?>
