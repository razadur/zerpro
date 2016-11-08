<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_panel extends Admin_Controller{

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
		/*$user_email = $this->session->userdata('admin_userid_email');
		$this->load->model('admin_panel_model');
		$data['user_details_info'] = $this->admin_panel_model->user_details_info($user_email);
		
		print_r($data['user_details_info']);
		die();*/
		
		$this->load->view('admin/dashboard');	
	}
	public function frelancer()
	{
		$user_type = 'frelancer';
		$this->load->model('admin_panel_model');
		$data['get_users'] = $this->admin_panel_model->get_users($user_type);
		
		/*print_r($data['get_users']);
		die();*/
		
		$this->load->view('admin/frelancer',$data);
	}
	
	public function employeer()
	{
		$user_type = 'employeer';
		$this->load->model('admin_panel_model');
		$data['get_users'] = $this->admin_panel_model->get_users($user_type);
		
		
		$this->load->view('admin/employeer',$data);
	}
	
	public function user_delete()
	{
			$user_id = $this->uri->segment(3);
			
			$this->load->model('admin_panel_model');
			 $this->admin_panel_model->user_info_delete($user_id);
		  $this->admin_panel_model->user_delete($user_id);
		  $this->session->set_flashdata('flasherror', 'Successfully Deleted');
		  redirect("admin_panel/frelancer");
	}
	
	
	public function category()
	{
		$this->load->model('admin_panel_model');
		$data['get_all_categories'] = $this->admin_panel_model->get_all_categories();
		
		/*print_r($data['get_all_categories']);
		die();*/
		
		$this->load->view('admin/category',$data);
	}
	
	
	public function save_category()
	{
		$data['category_name']=$this->input->post('category_name');
		
		
		
		$this->load->model('admin_panel_model');
		   $this->admin_panel_model->save_category($data);
		   
		   $this->session->set_flashdata('flasherror', 'Successfully Added!');
		
		redirect("admin_panel/category");
		//$this->load->view('new_user_registration');
	
	}
	
	
	public function category_update_form()
	{
		$id = $this->uri->segment(3);
		$this->load->model('admin_panel_model');
		$data['get_category'] = $this->admin_panel_model->get_category($id);
		
	/*	print_r($data['get_category']);
		die();*/
		
		$this->load->view('admin/category_update_form',$data);
	}
	
	public function category_update()
	{
		$id = $this->input->post('id');
		$data['category_name']=$this->input->post('category_name');
			
			$this->load->model('admin_panel_model');
			
		   $this->admin_panel_model->category_update($id,$data);
		   
		   $this->session->set_flashdata('flasherror', 'successfully Updated!');
		
			redirect("admin_panel/category");
	}
	
	public function category_delete()
	{
			$id = $this->uri->segment(3);
			
			$this->load->model('admin_panel_model');
			 $this->admin_panel_model->category_delete($id);
		 
		  $this->session->set_flashdata('flasherror', 'Successfully Deleted');
		  redirect("admin_panel/category");
	}
	
	public function spcialization()
	{
		$this->load->model('admin_panel_model');
		$data['get_all_spcializations'] = $this->admin_panel_model->get_all_spcializations();
		$data['get_all_categories'] = $this->admin_panel_model->get_all_categories();
		
		/*print_r($data['get_all_spcializations']);
		die();*/
		
		$this->load->view('admin/spcialization',$data);
	}
	
	public function save_spcialization()
	{
		$data['category_name']=$this->input->post('category_name');
		$data['spcialization']=$this->input->post('spcialization');
		
		
		
		$this->load->model('admin_panel_model');
		   $this->admin_panel_model->save_spcialization($data);
		   
		   $this->session->set_flashdata('flasherror', 'Successfully Added!');
		
		redirect("admin_panel/spcialization");
		//$this->load->view('new_user_registration');
	
	}
	
	public function spcialization_update()
	{
		$id = $this->input->post('id');
		$data['category_name']=$this->input->post('category_name');
		$data['spcialization']=$this->input->post('spcialization');
			
			$this->load->model('admin_panel_model');
			
		   $this->admin_panel_model->spcialization_update($id,$data);
		   
		   $this->session->set_flashdata('flasherror', 'successfully Updated!');
		
			redirect("admin_panel/spcialization");
	}
	
	
	public function spcialization_delete()
	{
			$id = $this->uri->segment(3);
			
			$this->load->model('admin_panel_model');
			 $this->admin_panel_model->spcialization_delete($id);
		 
		  $this->session->set_flashdata('flasherror', 'Successfully Deleted');
		  redirect("admin_panel/spcialization");
	}
	
	public function spcialization_update_form()
	{
		$id = $this->uri->segment(3);
		$this->load->model('admin_panel_model');
		$data['get_spcialization'] = $this->admin_panel_model->get_spcialization($id);
		$data['get_all_categories'] = $this->admin_panel_model->get_all_categories();
		
	/*	print_r($data['get_category']);
		die();*/
		
		$this->load->view('admin/spcialization_update_form',$data);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */