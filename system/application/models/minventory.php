<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of minventory
 *
 * @author simon
 */
class minventory extends CI_Model{
    /*function minventory(){
       parent::CI_Model();
   }*/
    function get_all_inventory(){
       $data = array();
       $Q = $this -> db -> get('inventory');
       if($Q->num_rows()>0){
           foreach($Q->result_array() as $row){
              $answer = $this -> minventory_status -> get_inventory_status_by_id($row['statusid']);
              $answer1 = $this -> mmembers -> get_member_by_id($row['bought_donated']);
              $row['bought_donated'] = strtolower($answer1['fname']." ".substr($answer1['mname'],0,1)." ".$answer1['surname']);
              $row['status'] = strtolower($answer['status']);
              $data[] = $row;
           }
       }
       $Q ->free_result();
       return $data;
   }
   function get_inventory_by_id($id){
        $data = array();
       $this -> db -> where('id',$id);
       $Q = $this -> db -> get('inventory');
       if($Q->num_rows()>0){
          $data = $Q->row_array();
          $status = $this -> minventory_status -> get_inventory_status_by_id($data['statusid']);
          $data['status'] = $status['status'];
          $bought_donated = $this -> mmembers -> get_member_by_id($data['bought_donated']);
          $data['bought_donated_name'] = $bought_donated['fname']." ".$bought_donated['mname']." ".$bought_donated['surname'];
       }
       $Q->free_result();
       return $data;
   }
  function get_invetory_by_dateacqrd($dateacqrd){
      $data = array();
      $this -> db -> where('date_acquired',$dateacqrd);
      $Q = $this -> db -> get('inventory');
        if($Q -> num_rows() > 0){
            foreach($Q -> result_array() as $row){
                $data[] = $row;
            }
        }
        $Q -> free_result();
        return $data;
  } 
  function get_inventory_byStatusid($statusid){
      $data = array();
      $this -> db -> where('statusid',$statusid);
      $Q = $this -> db -> get('inventory');
        if($Q -> num_rows() > 0){
            foreach($Q -> result_array() as $row){
                $data[] = $row;
            }
        }
        $Q -> free_result();
        return $data;
  }
  function add_inventory_item(){
     $values = array(
                     'id' => '',
                      'itemname' => $this -> input -> post('itemname'),
                      'asset_code' => $this -> input -> post('asset_code'),
                      'quantity' => $this -> input -> post('quantity'),
                      'date_acquired' => $this -> input -> post('date_acquired'),
                      'statusid' => $this -> input -> post('status'),
                      'acquisition_mode' => $this -> input -> post('acquisition_mode'),
                      'bought_donated' => $this -> input -> post('bought_donated'),
                      'description' => $this -> input -> post('description'),
                      'monetary_value' => $this -> input -> post('monetary_value')
                    );
     $this -> db -> insert('inventory',$values);
  }
  function edit_inventory($id,$inv_status,$bought){
      $values = array(
                      'itemname' => $this -> input -> post('itemname'),
                      'asset_code' => $this -> input -> post('asset_code'),
                      'quantity' => $this -> input -> post('quantity'),
                      'date_acquired' => $this -> input -> post('date_acquired'),
                      'statusid' =>  $inv_status,
                      'acquisition_mode' => $this -> input -> post('acquisition_mode'),
                      'bought_donated' =>  $bought,
                      'description' => $this -> input -> post('description'),
                      'monetary_value' => $this -> input -> post('monetary_value')
                    );
      $this -> db -> where('id',$id);
      $this -> db -> update('inventory',$values);
  }
  function delete_inventory_asset($id){
      $values = array(
                      'status' => 'Inactive' 
                       );
      $this -> db -> where('id',$id);
      $this -> db -> update('inventory',$values);
  }
  
                //PAGINATION...............
    public function record_count() {
        $this -> db -> select('COUNT(id) AS TOTAL');
        //$this -> db -> where('status','active');
        $Q = $this -> db -> get('inventory');
        if($Q->num_rows()>0)
        {
            $row = $Q->row_array();
            $data = $row['TOTAL'];
        }
            return $data;
    }
    
    function export_inventory()
    {
        // $this -> load -> dbutil();	loadede in the constructor.................
        $Q = $this -> db -> query("SELECT * FROM inventory ");
        return $this -> dbutil -> csv_from_result($Q,",","\n");					   
    }
    
    function get_all_inventory_pdf()
    {
        $data = array();
        $this -> db -> where('id !=',77);	// this is the sample data used as template.....
        //$this -> db -> where('status','active');
        $Q = $this -> db -> get('inventory');
        //echo $this -> db -> last_query();exit;
        if($Q->num_rows()>0){
           foreach($Q->result_array() as $row){
                      
            
			 $data[] = $row;
           }//exit;
       }
       $Q ->free_result();
       return $data;
    }
    
    function search($keyword){
	$data = array();//						bought_donated	description	monetary_value
	$Q = $this -> db -> query(" SELECT * FROM inventory WHERE (itemname LIKE '%$keyword%' 
							  OR asset_code LIKE '%$keyword%' OR date_acquired LIKE '%$keyword%' OR 
								quantity LIKE '%$keyword%' OR acquisition_mode LIKE '%$keyword%' OR description LIKE '%$keyword%')");
			if($Q -> num_rows() > 0){
				foreach($Q -> result_array() as $row){
					//$answer = $this -> mwelcome_group -> get_welcome_grp_by_id($row['welcome_groupno']);
					//$row['welcome_groupno'] = $answer['name'];
					$data[] = $row;
				}
			}
			$Q -> free_result();
			return $data;
   }

  
}
?>