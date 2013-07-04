<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mgiving_category
 *
 * @author simon
 */
class mpledge_details extends CI_Model{
     function mpledge_details(){
       parent::__construct();
   }
	function get_all_pledges(){
		$this -> db -> where('status', 'uncleared');
		$Q = $this -> db -> get('pledge_details');
		if($Q->num_rows()>0){
			foreach($Q->result_array() as $row){
			 $answer = $this -> mmembers -> get_member_by_code($row['member_code']);
			 $row['name'] = $answer['fname']." ".strtoupper(substr($answer['mname'],0,1))." ".$answer['surname'];
			 $answer1 = $this -> mgiving_category -> get_giving_category_by_id($row['giving_category']);
			 $row['category'] = $answer1['category'];
			 $data[] = $row;
			}
				$this -> db -> select('SUM(pledged_amount) AS TOTAL_PLEDGES,SUM(paid_amount) AS PAID_PLEDGES');
				$this -> db -> where('status', 'uncleared');
				$Q = $this -> db -> get('pledge_details');
					if($Q->num_rows()>0){
						$totalPledge = $Q->row_array();
						$data['PAID_PLEDGES'] = $totalPledge['PAID_PLEDGES'];
						$data['TOTAL'] = $totalPledge['TOTAL_PLEDGES'] ;
					}
			$Q-> free_result();
			return $data;
		}
	}
	function get_pledge_details_by_id($id){
		$data = array();	
		$this -> db -> where('id',$id);
		$this -> db -> where('status','uncleared');
		$Q = $this -> db -> get('pledge_details'); //echo $this -> db -> last_query();exit;
			if($Q->num_rows() > 0){
				$row = $Q->row_array();
				$member = $this -> mmembers -> get_member_by_code($row['member_code']);
				$row['memberid'] = $member['id'];
				$row['member'] = $member['code_no']." ] ".$member['surname'];
				$category = $this -> mgiving_category -> get_giving_category_by_id($row['giving_category']);
				$row['category'] = $category['category'];
				$data = $row;
			}
			$Q -> free_result();
			return $data;
		}
	function add_pledge(){	
		// with the given id obtain the corresponding code_number......... 
		$id = $this-> input -> post('member');
		$member = $this -> mmembers -> get_member_by_id($id);
		$code_no = $member['code_no'];
		$values = array(
						'id' => '',
						'member_code' => $code_no,
						'giving_category' => $this -> input -> post('category'),
						'pledged_amount' => $this -> input -> post('amount'),
						'date' => $this -> input -> post('date'),
						'status' => 'uncleared'
						);
		$this -> db -> insert('pledge_details',$values);
	}
	
	function edit_pledge($id,$memberid,$giving_cat){
		// with the member id we obtain the code_number...............
		$member = $this -> mmembers -> get_member_by_id($memberid);
		$code_no = $member['code_no'];
		$values = array(
						'member_code' => $code_no,
						'giving_category' => $giving_cat,
						'pledged_amount' => $this -> input -> post('amount'),
						'date' => $this -> input -> post('date'),
						);
			$this -> db -> where('id',$id);
			$this -> db -> update('pledge_details',$values);
	}
	
	function get_pledge_details_by_cat($catid){
		$this -> db -> where('giving_category',$catid);
		$this -> db -> where('status','uncleared');
		$Q = $this -> db -> get('pledge_details');
			if($Q->num_rows()>0){
			foreach($Q->result_array() as $row){
			 $answer = $this -> mmembers -> get_member_by_code($row['member_code']);
			 $row['name'] = $answer['fname']." ".strtoupper(substr($answer['mname'],0,1))." ".$answer['surname'];
			 $data[] = $row;
			}
				$this -> db -> select('SUM(pledged_amount) AS TOTAL_PLEDGES,SUM(paid_amount) AS PAID_PLEDGES');
				$this -> db -> where('giving_category',$catid);
				$this -> db -> where('status', 'uncleared');
				$Q = $this -> db -> get('pledge_details');	
					if($Q->num_rows()>0){
						$totalPledge = $Q->row_array();
						$data['PAID_PLEDGES'] = $totalPledge['PAID_PLEDGES'];
						$data['TOTAL'] = $totalPledge['TOTAL_PLEDGES'] ;
					}
			$Q-> free_result();
			return $data;
		}
	}
	function pledge_clearing($id){
		//$values = array(
						//'paid_amount' => $this -> input -> post('amount')
						//);	
		$this -> db -> select('paid_amount');
		$this -> db -> where('id',$id);
		$Q = $this -> db -> get('pledge_details');
		if($Q-> num_rows() > 0){
			$row = $Q->row_array();
			$paid_amount = $row['paid_amount'];
			
			$paid_amount = $paid_amount + $this -> input -> post('amount');
			$values = array(
							'paid_amount' => $paid_amount
							);
		$this -> db -> where('id',$id);
		$this -> db -> update('pledge_details',$values);					
		}
	}
  }