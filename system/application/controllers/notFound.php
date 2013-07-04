<?php

/**
 * Description of notFound
 * @author Jeremiah Mmasi <jemanyanda02@hotnail.com>
 */
class notFound extends CI_Controller {
    function index(){
        $data['title']= 'NOT FOUND!';
        //$data['main'] = 'errors/not_found';
        //$this -> load -> vars($data);
        $this -> load -> view('errors/not_found');
        
    }
}

?>
