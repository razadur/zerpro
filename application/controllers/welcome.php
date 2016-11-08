<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('admin_panel_model');
		$data['get_all_categories'] = $this->admin_panel_model->get_all_categories();
		$this->load->view('home',$data);
	}
	public function get_spcialization2()
	{
		$category_name = $this->input->get('q');
			$this->load->model('admin_panel_model');
		$data['get_spcializations'] = $this->admin_panel_model->get_spcializations($category_name);
		
		//print_r($data['get_spcializations']);die();
		
		$this->load->view('ajax/get_spcialization2',$data);
		//print_r($data['get_spcializations']);
		
		//echo $category_name;
	}
	
	public function search_job()
	{
		$category=$this->input->post('category');
		$spcialization=$this->input->post('spcialization');
		
		/*print_r($spcialization.$category);
		die();*/
		
		$this->load->model('admin_panel_model');
		
		$data['get_job_lists'] = $this->admin_panel_model->get_job_lists_front($spcialization);
		
		/*print_r($data['get_job_lists']);
		die();*/
		
		$this->load->view('job_list/job_list',$data);
	}
	
	public function job_details()
	{
		$job_id = $this->uri->segment(3);
		
		
		
		
		
		
		/*$data['institue_name']=;
			
			
			$user_id = $this->input->post('user_id');
			
			$this->load->model('admin_panel_model');
			
		   $this->admin_panel_model->update_user_info_edit($user_id,$data);*/
		/*print_r($job_id);
		
		
		
		
		die();*/
		
		//$user_id = $this->session->userdata('userid');
		
			
			$this->load->model('admin_panel_model');
			//$data['user_details'] = $this->admin_panel_model->user_details($user_id);
			$data['get_job_applicants'] = $this->admin_panel_model->get_job_applicants($job_id);
			$data['get_total_applicant'] = $this->admin_panel_model->get_total_applicants($job_id);
			
			
			
			
			
			
			/*print_r($data['get_job_shortlists']);*/
			//die();
			
		  $data['get_job_details'] = $this->admin_panel_model->get_job_details($job_id);
		  
		  $data2['total_view'] = $data['get_job_details']->total_view + 1;
		  
		  
		  //$user_id = $this->input->post('user_id');
			
			$this->load->model('admin_panel_model');
			
		   $this->admin_panel_model->update_total_view($job_id,$data2);
		  
		 /* print_r($data['get_job_details']->total_view);
		  die();*/
		  
		  /*print_r($this->session->userdata('user_type'));
		  die();*/
		  
		  
		  $user_email = $data['get_job_details']->user_email;
		 $data['employeer_info'] = $this->admin_panel_model->employeer_info($user_email);
		 
		/* print_r($data['employeer_info']);
		 die();*/
		
		
			$this->load->view('job_list/job_details',$data);
		
	}
	
	public function frelancer()
	{
		$this->load->view('frelancer_main');
	}
	
	public function employee()
	{
		$this->load->view('employee');
	}
	public function employer_profile()
	{
		$this->load->view('employer_profile');
	}
	public function freelancer_profile()
	{
		$this->load->view('freelancer_profile');
	}
	/*public function job_details()
	{
		$this->load->view('job_details');
	}*/
	public function job_details_employer()
	{
		$this->load->view('job_details_employer');
	}
	public function job_list()
	{
		$this->load->view('job_list');
	}
	public function registration()
	{
		$this->load->view('new_user_registration');
	}
	public function new_user_registration_save()
	{
	
	$user_email =$this->input->post('user_email');
		
		$data['user_type']=$this->input->post('user_type');
		$data['first_name']=$this->input->post('first_name');
		$data['last_name']=$this->input->post('last_name');
		$data['user_email']=$this->input->post('user_email');
		$data['user_city']=$this->input->post('user_city');
		$data['user_tel']=$this->input->post('user_tel');
		$data['user_address']=$this->input->post('user_address');
		$data['user_password']=$this->input->post('user_password');
		
		
		
$msg = "Thank You For Registration!";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail($user_email,"New Registration",$msg);

		
		
		/*print_r($data);
		die();*/
		
		
		$this->load->model('admin_panel_model');
		   $this->admin_panel_model->save_new_user_registration($data);
		   
		   $this->session->set_flashdata('flasherror', 'Your message sent successfully!');
		
		redirect("index.php/welcome/registration");
		//$this->load->view('new_user_registration');
	
	}
	
	public function login()
	{
		$this->load->view('login');
	}
	
	
	public function joblist()
	{
		$this->load->model('admin_panel_model');
		
		
		$user_type = $this->session->userdata('user_type');
		$user_email = $this->session->userdata('email');
		
		
			$data['get_job_lists'] = $this->admin_panel_model->get_job_lists();
		
		
		
		
		
		
		
		/*print_r($data['get_job_lists']);
		
		die();*/
		
		/*print_r($data['user_details_info']);
		die();*//*
		$user_email = $data['get_job_lists']->user_email;
		$data['user_details_info'] = $this->admin_panel_model->user_details_info($user_email);*/
		
		
		
		
		$this->load->view('job_list/job_list',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */