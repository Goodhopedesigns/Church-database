<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of expenditure_category
 *
 * @author simon
 */
class expenditure_category extends CI_Controller{

	function expenditure_category()
	 {
		if(!isset($_SESSION['user'])){ redirect('welcome/index','refresh');}
		parent::__construct();
	 }
    
}

?>
