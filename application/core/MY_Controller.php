<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
  {
	
	function __construct()
	 {
	    parent::__construct(); 
		
			 $_SESSION['start'] = time(); 
            $_SESSION['expire'] = $_SESSION['start'] + (0.5 * 60);
			
			$nowtime = time();
			
			//print_r($_SESSION['expire']); echo '<br/>';
			//print_r($nowtime);
		
			$nowtime = time();
			
			if ($nowtime > $_SESSION['expire']) {
           // print_r('hellow world');
			//header('Location: http://localhost/somefolder/homepage.php');
			}
	       
			if (!$this->session->userdata('userid'))
			{
				redirect('login');
			}
      } 
   
}