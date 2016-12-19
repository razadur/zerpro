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
//		 echo '<pre>'; print_r($data); die();
		
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
        $this->load->model('admin_panel_model');
        $data = $_POST;
        $data['get_job_details'] = $this->admin_panel_model->get_job_details($_POST['job_id']);
//        echo '<pre>';
//        print_r($data);die;
        $this->load->view('job_list/job_apply_form',$data);


		/*$data['freelancer_id']=$this->input->post('freelancer_id');
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
		}*/
		
		/*print_r($application_status);
		die();*/

	}

	public function job_application()
	{
        $job_id = $data['job_id']=$this->input->post('job_id');
        $data['budget']=$this->input->post('budget');
        $data['work_days']=$this->input->post('work_days');
        $data['applying_massage']=$this->input->post('applying_massage');
        $data['freelancer_id']=$this->input->post('freelancer_id');

        $fileName = $job_id.'_'.$data['freelancer_id'].'_'.date('Ymd');
        $config['upload_path'] = './images/employeer_file/';
        $config['allowed_types'] = 'pdf|gif|jpg|png';
        $config['post_max_size'] = '200M';
        $config['upload_max_filesize'] = '100M';
        $config['file_name'] = $fileName;

        $this->upload->initialize($config);

        $this->upload->do_upload('attached_file');
        $image_des=$this->upload->data();
        $file_name = $image_des['file_name'];
        $data['attachment']= $file_name;

        $this->load->model('admin_panel_model');
        $this->admin_panel_model->save_job_apply($data);

        $this->session->set_flashdata('flasherror', 'Successfully Applied!');
        redirect("index.php/job_list/job_details/".$job_id);
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

            $this->load->model('admin_panel_model');
            $data['onGoing_job_ids'] = $this->admin_panel_model->onGoingJobs($userId);

        $this->load->view('job_list/onGoingJobEmployer',$data);
    }
    public function closeJob(){
        $data['status'] = 0;
        $this->load->model('admin_panel_model');
        $this->admin_panel_model->closeJobProcess($this->input->post('id'),$data);
    }
    public function jobFeedback($jobId = NULL){
        $user_type = $this->session->userdata('user_type');

        $this->load->model('admin_panel_model');
        if($user_type == 'Frelancer'){
            $data['feedback_job_ids'] = $this->admin_panel_model->jobFeedback($jobId,1);
            $this->load->view('job_list/feedbackSendFree',$data);
        }else{
            $data['feedback_job_ids'] = $this->admin_panel_model->jobFeedback($jobId,2);
            $this->load->view('job_list/onGoingJobEmployerFeedback',$data);
        }
    }
    public function feedbackSendEmp(){
        $user_type = $this->session->userdata('user_type');
        if($user_type != 'Frelancer'){
            $data['emp_id'] = $this->session->userdata('userid');
            $data['emp_free']=$this->input->post('ratedValue');
            $data['emp_free_msg']=$this->input->post('rateComment');
        }else{
            $data['free_id'] = $this->session->userdata('userid');
            $data['free_emp']=$this->input->post('ratedValue');
            $data['free_emp_msg']=$this->input->post('rateComment');
        }
        $jobId=$this->input->post('jobId');
        $this->load->model('admin_panel_model');
        $this->admin_panel_model->feedbackSendProcess($data,$jobId);
        if($user_type != 'Frelancer'){ redirect("index.php/job_list/onGoingJob");}
        else{ redirect("index.php/job_list/notification");}
    }
    public function notification(){
        /*echo $user_type = $this->session->userdata('user_type');
        echo $userId = $this->session->userdata('userid');*/
        $this->load->model('admin_panel_model');
        $data['feedback_job_ids'] = $this->admin_panel_model->jobFeedback();
        $this->load->view('job_list/notification',$data);
    }
    public function feedbackSendFree(){
        $this->load->model('admin_panel_model');
        $data['feedback_job_ids'] = $this->admin_panel_model->jobFeedback();
        $this->load->view('job_list/feedbackSendFree',$data);
    }
    public function filteredJob(){
        $this->load->model('admin_panel_model');
        $data['get_job_lists'] = $this->admin_panel_model->filteredJob($_POST);
        $this->load->view('job_list/ajax_joblist',$data);
    }
    public function filteredSpe(){
        $ctg = $_POST['ctg'];
        $this->load->model('admin_panel_model');
        $data['get_spc_lists'] = $this->admin_panel_model->filteredSpe($ctg);
        $this->load->view('job_list/ajax_spe',$data);
    }
    public function awaitingAcceptance(){
        $userId = $this->session->userdata('userid');
        $this->load->model('admin_panel_model');
        if($_POST){
            $token = $this->input->post('acceptance_token');
            $apply_id = $this->input->post('id');
            if($token == 1){$this->admin_panel_model->awaitingAcceptance_accept($apply_id);}
            elseif($token == 0){$this->admin_panel_model->awaitingAcceptance_reject($apply_id);}
        }else{
            $data['awaitingAcceptanceJob'] = $this->admin_panel_model->awaitingAcceptance($userId);
            $this->load->view('job_list/awaitingAcceptance',$data);
        }
    }
    public function perJobPay(){
        $apply_id = $this->uri->segment(3);
        $payAmt= $this->uri->segment(4);
        $monthlyPackage= $this->uri->segment(5);
        $this->load->model('admin_panel_model');
        $this->admin_panel_model->awaitingAcceptance_accept($apply_id);
        $this->admin_panel_model->payAmt($payAmt);

        $userId = $this->session->userdata('userid');
        if($monthlyPackage == 1){
            $data['user_id'] = $userId;
            $data['start_date'] = date('Y-m-d');
            $data['end_date'] = date('Y-m-d', strtotime("+30 days"));
            $this->admin_panel_model->packageInfoAdd($data);
        }
        $data['awaitingAcceptanceJob'] = $this->admin_panel_model->awaitingAcceptance($userId);
        $this->load->view('job_list/awaitingAcceptance',$data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */