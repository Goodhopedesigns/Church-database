<?php  session_start();

//  @Author:stanley Godlove Mtonyole   <  stanleymtonyole@gmail.com>

class userActions extends CI_Controller 
{
    function Useraction()
    {
        parent::Construct();
        //session_start();   session start must be put at the top
        if ( !isset( $_SESSION['user']['userid'] ) )
        {
	  redirect('welcome/index','refresh');
        }		
    }
    
    function index()
    {
        $data['title']='CIS | User Actions';
        $data['main']='users/user_actions';
        $this->load->view('generic/template',$data);
    }
    
    function viewUserActions()
    {
        $data['answer']=$this->musers->getAllUserActions();
        $data['title']='CIS | User Actions';
        $data['main']='users/user_actions';
        $this->load->view('generic/template',$data);
    }
	 
    function userActionBydate()
    {
	//if($this  -> input -> post('date1'))
        if(isset($_POST['submit']))
        {
            $dates = array( 
                        'date1' =>  $_POST['date1'],
                        'date2' =>  $_POST['date2']
                        );
            $data['answer'] = $this -> muserActions -> getActionByDate( $dates['date1'], $dates['date2']);
            $data['title']='User Actions';
            $data['main']='useractions_ls';
            $this->load->vars($data);
            $this->load->view('generic/template');
	 }
         else
         {
             redirect('welcome/index','refresh');
         }
    }
}
	?>