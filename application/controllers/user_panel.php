<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_panel extends MY_Controller{

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
		$user_id = $this->session->userdata('userid');
		$this->load->model('admin_panel_model');
		$data['user_details'] = $this->admin_panel_model->user_details($user_id);
		
		$user_email = $data['user_details']->user_email;
		$data['user_details_info'] = $this->admin_panel_model->user_details_info($user_email);
		$data['uploadedImage'] = $this->admin_panel_model->uploadedImage($user_id);
//        echo '<pre>';
//        print_r($data);die;
		/*if($data['user_details_info'])
		
		{*/
			$data['get_user_type'] = $this->admin_panel_model->get_user_type($user_email);
			/*print($data['get_user_type']);
			die();*/

			if($data['get_user_type'] == 'Frelancer')
			{
//				if($data['user_details_info'])
//				{
//					$this->load->view('frelancer_main',$data);
//				}
//				else
				{
					$this->load->view('frelancer_main_view',$data);
					//$this->load->view('frelancer_main',$data);
				}
					
			}
			elseif($data['get_user_type'] == 'Employeer')
			{
				
//				if($data['user_details_info'])
//				{
//					$this->load->view('employee_main',$data);
//				}
//				else
				{
					$this->load->view('employee_main_view',$data);
					//$this->load->view('frelancer_main',$data);
				}
				//$this->load->view('employee_main',$data);	
			}
			
			
		/*}
		else
		{
			$this->load->view('employee_profile_view',$data);
		}*/
		//die();
		
	   //$data['user_details_info']->user_email;
		
		/*print_r($data['user_details_info']);
		*/
		//die();
		
		//$this->load->view('employee_profile_view',$data);
		
		
	}
	public function update_profile()
	{
		$user_id = $this->session->userdata('userid');
		$this->load->model('admin_panel_model');
		$data['user_details'] = $this->admin_panel_model->user_details($user_id);
		$data['get_all_categories'] = $this->admin_panel_model->get_all_categories();
	    $user_type = $data['user_details']->user_type;
		
		if($user_type == 'Frelancer')
		{
			$user_email = $data['user_details']->user_email;
			$data['user_details_info'] = $this->admin_panel_model->user_details_info($user_email);
		
			if($data['user_details_info'])
		
			{
				$this->load->view('frelancer_edit',$data);
			}
			else
			{
				$this->load->view('frelancer',$data);
			}
		}
		elseif($user_type == 'Employeer')
		{
			$user_email = $data['user_details']->user_email;
			$data['user_details_info'] = $this->admin_panel_model->user_details_info($user_email);
		
			if($data['user_details_info'])
		
			{ //echo '<pre>';print_r($data);die;
				$this->load->view('employee_edit',$data);
			}
			else
			{
				$this->load->view('employee',$data);
			}
		}
		
	}
	
	public function update_user_info()
	{
		if($this->input->post('update'))
		{
            if(!empty($_FILES['user_pic_one']['name'])){
                $config['upload_path'] = './images/users/';
                $config['allowed_types'] = 'mp4|gif|jpg|png';
                $config['post_max_size'] = '200M';
                $config['upload_max_filesize'] = '100M';

               $this->upload->initialize($config);

               $this->upload->do_upload('user_pic_one');
               $image_des=$this->upload->data();
               $file_name = $image_des['file_name'];
               $data['user_pic_one']=$file_name;
            }
		
			$data['user_id']=$this->input->post('user_id');
			$data['user_type']=$this->input->post('user_type');
			$data['user_email']=$this->input->post('user_email');
			$data['name']=$this->input->post('name');
			$data['expeted_salary']=$this->input->post('expeted_salary');
			$data['category']=$this->input->post('category');
			
			
			$user_type = $this->session->userdata('user_type');
			if($user_type == 'frelancer')
			{
				$data['spcialization']=implode(",", $this->input->post('spcialization'));
			}
			else
			{
				//$data['spcialization']=$this->input->post('spcialization');
			}
			
			$data['spcialization']=implode(",", $this->input->post('spcialization'));
			$data['description']=$this->input->post('description');
			$data['facebook_link']=$this->input->post('facebook_link');
			$data['twitter_link']=$this->input->post('twitter_link');
			$data['youtube_link']=$this->input->post('youtube_link');
			$data['google_plus_link']=$this->input->post('google_plus_link');
			$data['phone_no']=$this->input->post('phone_no');
			$data['website']=$this->input->post('website');
			$data['city']=$this->input->post('city');
			$data['alt_email_address']=$this->input->post('alt_email_address');
			$data['country']=$this->input->post('country');
			$data['complete_address']=$this->input->post('complete_address');
			$data['company_name']=$this->input->post('company_name');
			$data['job_position']=$this->input->post('job_position');
			$data['company_type']=$this->input->post('company_type');
			$data['job_details']=$this->input->post('job_details');
			$data['degree_name']=$this->input->post('degree_name');
			$data['year']=$this->input->post('year');
			$data['institue_name']=$this->input->post('institue_name');
			
			//print_r($data);
			//die();
			$user_id = $this->input->post('user_id');
			
			$this->load->model('admin_panel_model');
			
		   $this->admin_panel_model->update_user_info_edit($user_id,$data);
		   
		   $this->session->set_flashdata('flasherror', 'Update Profile successfully!');
		
			redirect("index.php/user_panel");
		}
		else
		{
		
		/*$spcialization = implode(",", $this->input->post('spcialization'));
		
		print_r($spcialization);
		die();*/
		
		
	   $config['upload_path'] = './images/users/';
       $config['allowed_types'] = 'mp4|gif|jpg|png';
	   $config['post_max_size'] = '200M';
	    $config['upload_max_filesize'] = '100M';
      //$config['max_size']	= '49717208';  


       $this->upload->initialize($config);
       
    //   echo '<pre>';
//       print_r($_FILES);
//       exit();
       
       $this->upload->do_upload('user_pic_one');
       $image_des=$this->upload->data();
       $file_name = $image_des['file_name'];
	   $data['user_pic_one']=$file_name;
	   
	   
	   
	   
	  // die();
		
		
		
			$data['user_id']=$this->input->post('user_id');
			$data['user_type']=$this->input->post('user_type');
			$data['user_email']=$this->input->post('user_email');
			$data['name']=$this->input->post('name');
			$data['expeted_salary']=$this->input->post('expeted_salary');
			$data['category']=$this->input->post('category');
			
			$user_type = $this->session->userdata('user_type');
			if($user_type == 'frelancer')
			{
				$data['spcialization']=implode(",", $this->input->post('spcialization'));
			}
			else
			{
				//$data['spcialization']=$this->input->post('spcialization');
			}
			$data['spcialization']=implode(",", $this->input->post('spcialization'));
			$data['description']=$this->input->post('description');
			$data['facebook_link']=$this->input->post('facebook_link');
			$data['twitter_link']=$this->input->post('twitter_link');
			$data['youtube_link']=$this->input->post('youtube_link');
			$data['google_plus_link']=$this->input->post('google_plus_link');
			$data['phone_no']=$this->input->post('phone_no');
			$data['website']=$this->input->post('website');
			$data['city']=$this->input->post('city');
			$data['alt_email_address']=$this->input->post('alt_email_address');
			$data['country']=$this->input->post('country');
			$data['complete_address']=$this->input->post('complete_address');
			$data['company_name']=$this->input->post('company_name');
			$data['job_position']=$this->input->post('job_position');
			$data['company_type']=$this->input->post('company_type');
			$data['job_details']=$this->input->post('job_details');
			$data['degree_name']=$this->input->post('degree_name');
			$data['year']=$this->input->post('year');
			$data['institue_name']=$this->input->post('institue_name');
			
			//print_r($data);
			//die();
			
			$this->load->model('admin_panel_model');
		   $this->admin_panel_model->update_user_info($data);
		   
		   $this->session->set_flashdata('flasherror', 'Update Profile successfully!');
		
			redirect("index.php/user_panel");
			
		}//end of else	
	
	}
	
	public function get_spcialization()
	{
		$category_name = $this->input->get('q');
			$this->load->model('admin_panel_model');
		$data['get_spcializations'] = $this->admin_panel_model->get_spcializations($category_name);
		
		$this->load->view('ajax/get_spcialization',$data);
		//print_r($data['get_spcializations']);
		
		//echo $category_name;
	}
	
	
	
	public function create_job()
	{
		$user_id = $this->session->userdata('userid');
		$this->load->model('admin_panel_model');
		$data['user_details'] = $this->admin_panel_model->user_details($user_id);
		$data['get_all_categories'] = $this->admin_panel_model->get_all_categories();
		/*print_r($data['user_details']);
		die();*/
		
		$this->load->view('create_job',$data);
	}
	
	public function add_new_job()
	{
	
		$config['upload_path'] = './images/employeer_file/';
       $config['allowed_types'] = 'pdf|gif|jpg|png';
	   $config['post_max_size'] = '200M';
	    $config['upload_max_filesize'] = '100M';
      //$config['max_size']	= '49717208';  


       $this->upload->initialize($config);
       
    //   echo '<pre>';
//       print_r($_FILES);
//       exit();
       
       $this->upload->do_upload('attached_file');
       $image_des=$this->upload->data();
       $file_name = $image_des['file_name'];
	   $data['attached_file']=$file_name;
	
			$data['user_id']=$this->input->post('user_id');
			$data['user_type']=$this->input->post('user_type');
			$data['user_email']=$this->input->post('user_email');
			$data['user_name']=$this->input->post('user_name');
			
			
			$data['job_title']=$this->input->post('job_title');
			$data['job_description']=$this->input->post('job_description');
			$data['category']=$this->input->post('category');
			$data['spcialization']=implode(",", $this->input->post('spcialization'));
			$data['description']=$this->input->post('description');
			
			//$data['vacancy_type']=$this->input->post('vacancy_type');
			$data['vacancy_type']=implode(",", $this->input->post('vacancy_type'));
			$data['budget']=$this->input->post('budget');
			$data['experience']=$this->input->post('experience');
			$data['qualification']=$this->input->post('qualification');
			
			/*print_r($data['vacancy_type']);
			die();*/
			
			
			$this->load->model('admin_panel_model');
		   $this->admin_panel_model->save_new_job($data);
		   
		   $this->session->set_flashdata('flasherror', 'Successfully Created!');
		
			redirect("index.php/user_panel/create_job");
			
			
			/*print_r($data);
			die();*/
			
			
	}

    public function update_image(){
       if($this->upload_files($_FILES['upload'])){
           echo "File uploaded.";
       }else{
           echo 'File not uploaded.';
       }
    }

    private function upload_files($files)
    {
        $config = array(
            'upload_path'   => './uploads/',
            'allowed_types' => 'jpg|gif|png'
        );

        $this->load->library('upload', $config);

        $images = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];    if(!empty($_FILES['images[]']['error'])) {continue;}
            $_FILES['images[]']['size']= $files['size'][$key];
            $fileName =  $image;

            $images[] = $fileName;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $this->upload->data();

                $dataImg['user_id']= $this->session->userdata('userid');
                $dataImg['file_name']= $fileName;
                $this->load->model('admin_panel_model');
                $this->admin_panel_model->uploadedImageSave($dataImg);
            } else {
                return false;
            }
        }
        return $images;
    }

    public function delete_image(){
        $data =  $this->input->post('id');
        $this->load->model('admin_panel_model');
        $this->admin_panel_model->deleteImage($data);
        echo 'azad';
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */



