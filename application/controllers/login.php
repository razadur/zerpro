<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
	}
	 
	public function index()
	{
		if(isset($_REQUEST['submit']))
		{	 
		
			
			
			$email   = $this->db->escape_str( $this->input->post('user_email'));
			$password  = $this->input->post('user_password');  
			
			/*echo $email;
			die();*/
			
			
			$this->db->select('*');
			$this->db->from('user_registration_info');
			$this->db->where('user_email', $email); 
			$this->db->where('user_password', $password); 
			$this->db->where('status', '1');
			$query = $this->db->get();
			$result = $query->result(); 
			if( $query->num_rows() > 0)
				{
					$result = $query->result();
					$arr_log = array ( 
						'userid'     => $result[0]->id,
						'user_type'     => $result[0]->user_type,
						'email'	     => $email,
						'password'	 => $password,
						//'user_type'  => 2,  
					 );  
					  $_SESSION['start'] = time(); 
            		  $expiretime = $_SESSION['start'] + (30 * 60);
					 
				    $this->session->set_userdata( $arr_log );
					 redirect('index.php/user_panel');  
				} 
				else 
			    {
					$this->session->set_flashdata('flasherror', 'Your username and password don\'t match');
			   }
	     }
	       
		   $this->load->view('login');
		   //$this->load->view('client');
    } 
	public function logout()
	{
		$this->session->sess_destroy();
		///$this->session->unset_userdata('userid');
		redirect( 'index.php/login' );
	}
}
 
