<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mexpenditure
 *
 * @author simon
 */
class mexpenditure extends CI_Model{
    /*function mexpenditure (){
        parent::CI_Model();
    }*/
    function get_all_expenditures(){
        $data = array();
        $this -> db -> where('status','Active');
        $Q =$this -> db -> get('expenditure');
        if($Q -> num_rows()>0){
            foreach($Q -> result_array() as $row){
            $answer = $this -> mexpenditure_category -> get_expend_category_by_id($row['expenditure_category']);
            $row['category'] = $answer['category'];
            $data[] = $row;
                
            }
        }
        $Q -> free_result();
        return $data;
    }
    function get_expenditure_by_id($id){
        $data = array();
        $this -> db -> where('id',$id);
        $this -> db -> where('status','Active');
        $Q = $this ->db -> get('expenditure');
       // echo $this -> db -> last_query();exit;
         if($Q ->num_rows() > 0){
             foreach ($Q-> result_array() as $row){
              $answer = $this -> mexpenditure_category -> get_expend_category_by_id($row['expenditure_category']);
              $row['category_name'] = $answer['category']; 
             $data = $row;
              
           }
       }
            $Q -> free_result();
            return $data;
         }
    function get_expenditure_by_date($date){
        $data = array();
        $this -> db -> where('status','Active');
         $this -> db -> where('date =',$date);
         $Q = $this -> db -> get('expenditure');
         if($Q -> num_rows() > 0){
             foreach($Q -> result_array() as $row){
                 $data[] = $row;
             }
         }
         $Q -> free_result();
         return $data; 
    }
    function record_expenditure()
        {
           $values = array(
                           'id' => '',
                           'expenditure_category' => $this ->input->post('category'),
                           'date' => $this ->input->post('date'),
                           'amount' => $this ->input->post('amount'),
                           'description' => $this ->input->post('description')
                           );
           $this -> db -> insert('expenditure',$values);
        }
    function edit_expenditure($id,$category){
         $values = array(
                           'expenditure_category' => $category,
                           'date' => $this ->input->post('date'),
                           'amount' => $this ->input->post('amount'),
                           'description' => $this ->input->post('description')
                           );
         $this -> db -> where('id',$id);
         $this -> db -> update('expenditure',$values);
    }
    function delete_expenditure($id){
        $values = array('status' => 'Inactive');
        $this -> db -> where('id',$id);
        $this -> db -> update('expenditure',$values);
    }
    
    function search($keyword)
    {
	$data = array();//
	$Q = $this -> db -> query(" SELECT * FROM expenditure WHERE (date LIKE '%$keyword%' 
                                    OR expenditure_category LIKE '%$keyword%' OR description LIKE '%$keyword%' OR 
                                    date LIKE '%$keyword%' OR amount LIKE '%$keyword%' OR status LIKE '%$keyword%')");
            if($Q -> num_rows() > 0){
                foreach($Q -> result_array() as $row){
                    $category = $this -> mexpenditure_category -> get_expend_category_by_id($row['expenditure_category']);
                    $row['expenditure_category'] = $category['category'];
                    $data[] = $row;
                }
            }
            $Q -> free_result();
            return $data;
   }
    
}

?>
