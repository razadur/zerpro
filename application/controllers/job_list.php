<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_list extends MY_Controller {

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
		
		
		$user_type = $this->session->userdata('user_type');
		$user_email = $this->session->userdata('email');
		
		if($user_type == 'Frelancer')
		{
			$data['get_job_lists'] = $this->admin_panel_model->get_job_lists();
		}
		else
		{
			$data['get_job_lists'] = $this->admin_panel_model->get_employeer_job_lists($user_email);
		}
		
		
		
		
		
		/*print_r($data['get_job_lists']);
		
		die();*/
		
		/*print_r($data['user_details_info']);
		die();*//*
		$user_email = $data['get_job_lists']->user_email;
		$data['user_details_info'] = $this->admin_panel_model->user_details_info($user_email);*/
		
		
		
		
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
		 /*echo '<pre>';
		 print_r($data);
		 die();*/
		
		if($this->session->userdata('user_type') == 'Frelancer')
		{
			$this->load->view('job_list/job_details',$data);
		}
		else
		{
			if($this->input->post('shortlist'))
			{
				$data['get_job_shortlists'] = $this->admin_panel_model->get_job_shortlists($job_id);
				$this->load->view('job_list/shortlist_details',$data);
			}
			else
			{
				$data['get_job_shortlists'] = 0;
				$this->load->view('job_list/job_details_employer',$data);
			}
			
		}
	}
	
	
	public function job_shortlisted()
	{
		$data['emp_id']=$this->input->post('emp_id');
		$data['job_id']=$this->input->post('job_id');
		$data['freelancer_id']=$this->input->post('freelancer_id');
		$freelancer_id =$this->input->post('freelancer_id');
		$job_id=$this->input->post('job_id');
		
		
		$this->load->model('admin_panel_model');
		
		$shortlisted_status = $this->admin_panel_model->already_shortlisted($job_id,$freelancer_id);
		
		/*print_r($shortlisted_status);
		
		die();*/
		
		
		if($shortlisted_status)
		{
			 $this->session->set_flashdata('flasherror', 'Already Shortlisted!');
		
		redirect("index.php/job_list/job_details/".$job_id);
		}
		else
		{
		
			$this->admin_panel_model->save_job_shortlisted($data);
			   
			   $this->session->set_flashdata('flasherror', 'Successfully Shortlisted!');
			
			redirect("index.php/job_list/job_details/".$job_id);
		}
		
	}
	
	
	public function message_send()
	{
		$data['emp_id']=$this->input->post('emp_id');
		$data['job_id']=$this->input->post('job_id');
		$data['freelancer_id']=$this->input->post('freelancer_id');
		$data['message']=$this->input->post('message');
		$data['subject']=$this->input->post('subject');
		$data['subject_id']=$this->input->post('subject_id');
		$data['sender_by']=$this->input->post('sender_by');
		$freelancer_id =$this->input->post('freelancer_id');
		$data['parent_id'] =$this->input->post('parent_id');
		$job_id=$this->input->post('job_id');
		$shortlist=$this->input->post('shortlist');
		$user_type = $this->session->userdata('user_type');
		
		
		/*print_r($user_type);
		die();*/
		
		
		$this->load->model('admin_panel_model');
		
		//$shortlisted_status = $this->admin_panel_model->already_shortlisted($job_id,$freelancer_id);
		
		/*print_r($shortlisted_status);
		
		die();*/
		
		
		
		
			$this->admin_panel_model->save_message($data);
			   
			   $this->session->set_flashdata('flasherror', 'Message Successfully Sent!');
			   
			  
			  if($shortlist == 'shortlist')
			  {
			  	redirect("index.php/job_list/job_details_shortlist/".$job_id);
			  }
			  else
			  {
			  	if($user_type=='Frelancer')
				{
					redirect("index.php/job_list/message/");
				}
				else
				{
					redirect("index.php/job_list/job_details/".$job_id);
				}
			  	
			  }
			   
			
			
		
		
	}
	
	
	public function job_details_shortlist()
	{
		
		$job_id = $this->uri->segment(3);
		$this->load->model('admin_panel_model');
		
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
		
		
		
		$data['get_job_shortlists'] = $this->admin_panel_model->get_job_shortlists($job_id);
				$this->load->view('job_list/shortlist_details',$data);
	}
	
	public function message()
	{
		$user_type = $this->session->userdata('user_type');
		if($user_type=='Frelancer')
		{
			$freelancer_id = $this->session->userdata('userid');
			$this->load->model('admin_panel_model');
			
			$data['messages_job_ids'] = $this->admin_panel_model->get_job_message($freelancer_id);
			
			/*print_r($data['messages_job_ids']);
			die();*/
		}
		else
		{
			$employeer_id = $this->session->userdata('userid');
			$this->load->model('admin_panel_model');
			
			$data['messages_job_ids'] = $this->admin_panel_model->get_job_message_employeer($employeer_id);
		}
		
		
		$this->load->view('message',$data);
		/*print_r($data['messages']);
		die();*/
	}
	
	
	
	
	public function job_apply()
	{
		$data['freelancer_id']=$this->input->post('freelancer_id');
		$data['job_id']=$this->input->post('job_id');
		$job_id=$this->input->post('job_id');
		$freelancer_id = $this->session->userdata('userid');
		
		
		
		$this->load->model('admin_panel_model');
		
		$application_status = $this->admin_panel_model->already_applied($job_id,$freelancer_id);
		
		
		if($application_status)
		{
			 $this->session->set_flashdata('flasherror', 'Already Applied!');
		
		redirect("index.php/job_list/job_details/".$job_id);
		}
		else
		{
			 $this->admin_panel_model->save_job_apply($data);
		   
		   $this->session->set_flashdata('flasherror', 'Successfully Applied!');
		
		redirect("index.php/job_list/job_details/".$job_id);
		}
		
		print_r($application_status);
		die();
		
		
		
		  
	
	}
	
	public function shortlist()
	{
	
		$this->load->model('admin_panel_model');
		
		
		$user_type = $this->session->userdata('user_type');
		$user_email = $this->session->userdata('email');
		
		/*if($user_type == 'Frelancer')
		{
			$data['get_job_lists'] = $this->admin_panel_model->get_job_lists();
		}
		else
		{
			$data['get_job_lists'] = $this->admin_panel_model->get_employeer_job_lists($user_email);
		}*/
	
		$this->load->model('admin_panel_model');
		//$data['get_job_lists'] = $this->admin_panel_model->get_job_lists();
		$data['get_job_lists'] = $this->admin_panel_model->get_employeer_short_lists($user_email);
		//$data['get_job_lists'] = $this->admin_panel_model->get_job_short_lists();
		
		
	/*	print_r($data['get_job_short_lists']);
		die();*/
		/*print_r($data['get_job_lists']);
		
		die();*/
		
		/*print_r($data['user_details_info']);
		die();*//*
		$user_email = $data['get_job_lists']->user_email;
		$data['user_details_info'] = $this->admin_panel_model->user_details_info($user_email);*/
		
		
		
		
		$this->load->view('job_list/short_list',$data);
	}
	public function hire(){
        $data['hiring_status'] = 1;
        $this->load->model('admin_panel_model');
        $this->admin_panel_model->hireProcess($this->input->post('applicantId'),$this->input->post('id'),$data);
    }

    //open and hired jobs only
    public function onGoingJob(){
        $user_type = $this->session->userdata('user_type');
        $userId = $this->session->userdata('userid');

        //if($user_type=='Frelancer'){
            $this->load->model('admin_panel_model');
            $data['onGoing_job_ids'] = $this->admin_panel_model->onGoingJobs($userId);
        /*}else{
            $this->load->model('admin_panel_model');

            $data['onGoing_job_ids'] = $this->admin_panel_model->get_job_message_employeer($userId);
        }*/
        //print_r($data);
        //die();

        $this->load->view('onGoingJobEmployer',$data);
        //$this->load->view('message',$data);
        /*print_r($data['messages']);
        die();*/
    }
    public function closeJob(){
        $data['status'] = 0;
        $this->load->model('admin_panel_model');
        $this->admin_panel_model->closeJobProcess($this->input->post('id'),$data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */