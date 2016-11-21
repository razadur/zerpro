<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of welcome_model
 *
 * @author common
 */
class Admin_panel_Model extends CI_Model {


	public function save_new_user_registration($data)
    {
        //duplicate email checking
        $this->db->select('*');
        $this->db->from('user_registration_info');
        $this->db->where('user_email',$data['user_email']);
        $query_result=$this->db->get();
        $result=$query_result->num_rows();
        if($result == 0){
            $this->db->insert('user_registration_info',$data);
            $dataUp['user_id'] = $this->db->insert_id();
            $dataUp['user_type'] = $data['user_type'];
            $dataUp['name'] = $data['first_name'].' '.$data['last_name'];
            $dataUp['user_email'] = $data['user_email'];
            $dataUp['phone_no'] = $data['user_tel'];
            $dataUp['phone_no'] = $data['user_tel'];
            $dataUp['complete_address'] = $data['user_address'];
            $dataUp['city'] = $data['user_city'];
            $this->db->insert('user_profile_info',$dataUp);
        }else{
            return 0;
        }
        return 1;
    }
	public function save_message($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('message_history',$data);
       // $this->db->insert('school_class',$data);
    }
	
	
	
	public function save_job_shortlisted($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('shortlist',$data);
       // $this->db->insert('school_class',$data);
    }
	public function save_job_apply($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('job_applications',$data);
       // $this->db->insert('school_class',$data);
    }
	
	
	
	public function save_new_job($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('manage_job',$data);
       // $this->db->insert('school_class',$data);
    }
	
	public function save_category($data)
	{
		$this->db->insert('category',$data);
	}
	public function save_spcialization($data)
	{
		$this->db->insert('spcialization',$data);
	}
	
	
	public function user_details_info($user_email)
    {
       $this->db->select('*');
        $this->db->from('user_profile_info');
        $this->db->where('user_email',$user_email);
       
		
		$query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
		
		
    }
	public function category_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('category');
	}
	public function spcialization_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('spcialization');
	}
	
	
	public function user_info_delete($user_id)
	{
		$this->db->where('user_id',$user_id);
        $this->db->delete('user_profile_info');
	}
	public function user_delete($user_id)
	{
		$this->db->where('id',$user_id);
        $this->db->delete('user_registration_info');
	}
	
	public function get_category($id)
    {
       $this->db->select('*');
        $this->db->from('category');
        $this->db->where('id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	
	public function get_spcialization($id)
    {
       $this->db->select('*');
        $this->db->from('spcialization');
        $this->db->where('id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	public function get_job_details($job_id)
    {
       $this->db->select('*');
        $this->db->from('manage_job');
        $this->db->where('id',$job_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	
	
	
	/*public function get_job_lists()
    {
      
	   
	   
	   $this->db->select('*');
        $this->db->from('manage_job');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result; 
    }*/
	
	
	public function get_job_short_lists()
    {
       $this->db->select('*');   
		$this->db->from('shortlist');
		$this->db->join('manage_job', 'shortlist.job_id = manage_job.id');
	  
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result; 
    }
	
	
	
	public function get_job_message($freelancer_id)
    {
		 $this->db->select('*');   
		$this->db->from('message_history');
		
		
	   $this->db->where('freelancer_id',$freelancer_id);
	  // $this->db->where('parent_id',0);
	    $this->db->group_by('subject_id');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result; 
	}
	
	
	public function get_job_message_employeer($employeer_id)
    {
		 $this->db->select('*');   
		$this->db->from('message_history');
		
		
	   $this->db->where('emp_id',$employeer_id);
	  // $this->db->where('parent_id',0);
	    $this->db->group_by('subject_id');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result; 
	}
	
	public function get_last_date($subject_id)
    {
		 $this->db->select('max(message_date) as message_date');
        $this->db->from('message_history');
       
	    $this->db->where('subject_id',$subject_id);
	  // $this->db->where('parent_id',0);
	    $this->db->group_by('subject_id');
		 
        return $this->db->get()->row()->message_date;
		
       
        //return $this->db->get()->result()->row('user_type');
		
		
	}
	
	
	public function get_username($user_id)
    {
       $this->db->select('name');
        $this->db->from('user_profile_info');
        $this->db->where('user_id',$user_id);
		 
        return $this->db->get()->row()->name;
        //return $this->db->get()->result()->row('user_type');
		
		
	}
	
	
	
	public function get_email($user_id)
    {
       $this->db->select('user_email');
        $this->db->from('user_profile_info');
        $this->db->where('user_id',$user_id);
		 
        return $this->db->get()->row()->user_email;
        //return $this->db->get()->result()->row('user_type');
		
		
	}
	
	
	public function get_last_subject_id()
    {
       $this->db->select('max(subject_id) as last_subject_id');
        $this->db->from('message_history');
       
		 
        return $this->db->get()->row()->last_subject_id;
        //return $this->db->get()->result()->row('user_type');
		
		
	}
	
	
	public function get_message($subject_id)
    {
       $this->db->select('*');   
		$this->db->from('message_history');
		$this->db->join('manage_job', 'message_history.job_id = manage_job.id');
		
	   $this->db->where('message_history.subject_id',$subject_id);
	   $this->db->order_by("message_history.subject_id");
	   $this->db->order_by("message_history.message_id","Asc");
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result; 
		
		
    }
	
	
	/*public function get_message($freelancer_id)
    {
       $this->db->select('*');   
		$this->db->from('message_history');
		$this->db->join('manage_job', 'message_history.job_id = manage_job.id');
		
	   $this->db->where('freelancer_id',$freelancer_id);
	   $this->db->order_by("message_history.job_id");
	   $this->db->order_by("message_history.message_id","Asc");
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result; 

    }*/

	public function get_job_applicants($job_id)
    {
       $this->db->select('*');   
		$this->db->from('job_applications');
		$this->db->join('user_profile_info', 'job_applications.freelancer_id = user_profile_info.user_id');
	   $this->db->where('job_applications.job_id',$job_id);
	  
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result; 
    }
	
	public function get_job_shortlists($job_id)
    {
       $this->db->select('*');   
		$this->db->from('shortlist');
		$this->db->join('user_profile_info', 'shortlist.freelancer_id = user_profile_info.user_id');
	   $this->db->where('shortlist.job_id',$job_id);
	  
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result; 
    }
	
	
	
	
	public function get_total_applicants($job_id)
    {
       $this->db->select('count(job_id) as total_applicant');
        $this->db->from('job_applications');
        $this->db->where('job_id',$job_id);
		 
        return $this->db->get()->row()->total_applicant;
        //return $this->db->get()->result()->row('user_type');
		
		
	}
	
	
	
	public function already_shortlisted($job_id,$freelancer_id)
    {
       $this->db->select('job_id');
        $this->db->from('shortlist');
        $this->db->where('job_id',$job_id);
		 $this->db->where('freelancer_id',$freelancer_id);
        return $this->db->get()->row()->job_id;
        //return $this->db->get()->result()->row('user_type');
		
		
    }
	
	
	public function already_applied($job_id,$freelancer_id)
    {
       $this->db->select('job_id');
        $this->db->from('job_applications');
        $this->db->where('job_id',$job_id);
		 $this->db->where('freelancer_id',$freelancer_id);
        return $this->db->get()->row()->job_id;
        //return $this->db->get()->result()->row('user_type');
		
		
    }
	
	public function get_job_lists_front($spcialization)
    {
       $this->db->select('manage_job.*,user_profile_info.user_pic_one');   
		$this->db->from('manage_job');
		$this->db->join('user_profile_info', 'manage_job.user_email = user_profile_info.user_email');
	    $this->db->like('manage_job.spcialization',$spcialization);
	  
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result; 
    }
	
	public function get_job_lists()
    {
        $this->db->select('manage_job.*,user_profile_info.user_pic_one');
		$this->db->from('manage_job');
		$this->db->join('user_profile_info', 'manage_job.user_email = user_profile_info.user_email');
	   
	  
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
	
	public function get_employeer_short_lists($user_email)
    {
		/*print_r($user_email);
		die();*/
		
       $this->db->select('manage_job.*,user_profile_info.user_pic_one');   
		$this->db->from('shortlist');
		$this->db->join('manage_job', 'shortlist.job_id = manage_job.id');
		$this->db->join('user_profile_info', 'manage_job.user_email = user_profile_info.user_email');
	   
	  $this->db->where('manage_job.user_email',$user_email);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result; 
    }
	
	public function get_employeer_job_lists($user_email)
    {
		/*print_r($user_email);
		die();*/
		
       $this->db->select('manage_job.*,user_profile_info.user_pic_one');   
		$this->db->from('manage_job');
		$this->db->join('user_profile_info', 'manage_job.user_email = user_profile_info.user_email');
	   
	  $this->db->where('manage_job.user_email',$user_email);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result; 
    }
	
	
	
	
	
	public function employeer_info($user_email)
    {
       $this->db->select('user_pic_one');
        $this->db->from('user_profile_info');
        $this->db->where('user_email',$user_email);
        return $this->db->get()->row()->user_pic_one;
        //return $this->db->get()->result()->row('user_type');
		
		
    }
	
	
	public function get_user_type($user_email)
    {
       $this->db->select('user_type');
        $this->db->from('user_registration_info');
        $this->db->where('user_email',$user_email);
        return $this->db->get()->row()->user_type;
        //return $this->db->get()->result()->row('user_type');
		
		
    }	
	
	
	public function update_total_view($job_id,$data2)
	{
		$this->db->where('id', $job_id);
		$this->db->update('manage_job',$data2);
	}
	
	public function update_user_info_edit($user_id,$data)
	{
		$this->db->where('user_id', $user_id);
		$this->db->update('user_profile_info',$data);
	}
	public function category_update($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('category',$data);
	}
	public function spcialization_update($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('spcialization',$data);
	}
	
	
	public function user_details($user_id)
    {
       $this->db->select('*');
        $this->db->from('user_registration_info');
        $this->db->where('id',$user_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	
	public function get_users($user_type)
    {
       $this->db->select('*');
        $this->db->from('user_profile_info');
        $this->db->where('user_type',$user_type);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result; 
    }
	public function get_spcializations($category_name)
    {
       $this->db->select('*');
        $this->db->from('spcialization');
        $this->db->where('category_name',$category_name);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result; 
    }
	
	public function get_all_categories()
    {
       $this->db->select('*');
        $this->db->from('category');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result; 
    }
	
	public function get_all_spcializations()
    {
       $this->db->select('*');
        $this->db->from('spcialization');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result; 
    }
	
	public function update_user_info($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('user_profile_info',$data);
       // $this->db->insert('school_class',$data);
    }
	
	
	
	


	public function adminLoginCheckInfo($admin_email_address,$admin_password)
    {
       $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('admin_email_address',$admin_email_address);
        $this->db->where('admin_password',md5($admin_password));
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	 
   public function saveClass($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('school_class',$data);
       // $this->db->insert('school_class',$data);
    }
	 public function saveuser_service($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('user_info',$data);
       // $this->db->insert('school_class',$data);
    }
	
	public function saveStudent_per_class($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('student_per_class',$data);
       // $this->db->insert('school_class',$data);
    }
	
	public function savePackage($data)
	{
		$this->db->insert('packages',$data);
	}
	
	public function savePackage_marine($data)
	{
		$this->db->insert('packages_marine',$data);
	}
	
	public function savePanel_of_institute($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('panel_of_institute',$data);
       // $this->db->insert('school_class',$data);
    }
	
	
	 public function saveRecent_event($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('recent_event',$data);
       // $this->db->insert('school_class',$data);
    }
	public function saveSalary_sheet($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('employee_salary',$data);
       // $this->db->insert('school_class',$data);
    }
	
	
	public function saveClassnote($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('class_note',$data);
       // $this->db->insert('school_class',$data);
    }
	public function saveDeposite_account($data)
    {
		 $this->db->insert('doposite_account',$data);
       // $this->db->insert('school_class',$data);
    }
	public function selectDeposite_account()
	{
		$this->db->select('*');
        $this->db->from('doposite_account');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function selectPanel_of_institute()
	{
		$this->db->select('*');
        $this->db->from('panel_of_institute');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function selectStudent_per_class()
	{
		$this->db->select('*');
        $this->db->from('student_per_class');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function selectSetting()
	{
		$this->db->select('*');
        $this->db->from('login');
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
	}
	
	
	
	
	public function selectsheet_date()
	{
		$this->db->select('*');
        $this->db->from('employee_salary');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	
	public function saveExpenses_account($data)
    {
		 $this->db->insert('expense_account',$data);
       // $this->db->insert('school_class',$data);
    }
	public function selectExpenses_account()
	{
		$this->db->select('*');
        $this->db->from('expense_account');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function savejobvacancy($data)
    {
		 $this->db->insert('job_circular',$data);
       // $this->db->insert('school_class',$data);
    }
	
	public function saveEmployee_leave($data)
    {
		 $this->db->insert('employee_leave',$data);
       // $this->db->insert('school_class',$data);
    }
	public function selectEmployee_leave()
	{
		$this->db->select('*');
        $this->db->from('employee_leave');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function annual_program_details($id)
    {
       $this->db->select('*');
        $this->db->from('annaul_program');
        $this->db->where('id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	
	public function notice_details($id)
    {
       $this->db->select('*');
        $this->db->from('notice');
        $this->db->where('id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	public function event_details($id)
    {
       $this->db->select('*');
        $this->db->from('recent_event');
        $this->db->where('id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	public function job_details($id)
    {
       $this->db->select('*');
        $this->db->from('job_circular');
        $this->db->where('id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	
	public function picnic_details($id)
    {
       $this->db->select('*');
        $this->db->from('picnic');
        $this->db->where('id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	
	public function club_details($id)
    {
       $this->db->select('*');
        $this->db->from('club');
        $this->db->where('id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	
	public function play_details($id)
    {
       $this->db->select('*');
        $this->db->from('play');
        $this->db->where('id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	public function selectMess_chairman()
	{
		$this->db->select('*');
        $this->db->from('mess_of_chairman');
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
	}
	public function selectMess_headmaster()
	{
		$this->db->select('*');
        $this->db->from('mess_of_headmaster');
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
	}
	public function selectMess_vice_headmaster()
	{
		$this->db->select('*');
        $this->db->from('mess_of_vice_head');
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
	}
	public function selectHistory_of_school()
    {
       $this->db->select('*');
        $this->db->from('history_of_school');
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	
	public function update_history_of_school($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('history_of_school',$data);
	}
	
	public function updateMess_chairman($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('mess_of_chairman',$data);
	}
	public function updateMess_headmaster($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('mess_of_headmaster',$data);
	}
	public function updateMess_vice_headmasters($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('mess_of_vice_head',$data);
	}
	
	
	public function selectProperty()
    {
       $this->db->select('*');
        $this->db->from('property');
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	
	public function update_property($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('property',$data);
	}
	public function selectContact()
    {
       $this->db->select('*');
        $this->db->from('contact');
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	
	public function update_contact($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('contact',$data);
	}
	
	public function update_setting($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('login',$data);
	}
	
	public function selectTestimonial()
	{
		$this->db->select('*');
        $this->db->from('testimonial');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function selectPresentdate()
	{
		$this->db->select('*');
        $this->db->from('student_present');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function selectClassnote()
	{
		$this->db->select('*');
        $this->db->from('class_note');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function selectRecent_event()
	{
		$this->db->select('*');
        $this->db->from('recent_event');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
		public function saveTestimonial($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('testimonial',$data);
       // $this->db->insert('school_class',$data);
    }
	
	public function saveTeacher($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('teachers',$data);
       // $this->db->insert('school_class',$data);
    }
	
	public function saveSlider($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('slider',$data);
       // $this->db->insert('school_class',$data);
    }
	
	public function saveGallery($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('small_gallery',$data);
       // $this->db->insert('school_class',$data);
    }
	public function saveStaff_Gallery($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('staff_gallery',$data);
       // $this->db->insert('school_class',$data);
    }
	
	public function saveSchool_Gallery($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('school_gallery',$data);
       // $this->db->insert('school_class',$data);
    }
	
	public function saveCommittee($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('committee',$data);
       // $this->db->insert('school_class',$data);
    }
	public function selectPackages()
	{
		$this->db->select('*');
        $this->db->from('packages');
		//$this->db->where('title','Car');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function selectpackages_marine()
	{
		$this->db->select('*');
        $this->db->from('packages_marine');
		//$this->db->where('title','Car');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function selecthull_washPackages()
	{
		$this->db->select('*');
        $this->db->from('packages_marine');
		$this->db->where('title','Hull wash');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function selectde_lime_scalePackages()
	{
		$this->db->select('*');
        $this->db->from('packages_marine');
		$this->db->where('title','De_lime_scale');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function selectteak_renovationPackages()
	{
		$this->db->select('*');
        $this->db->from('packages_marine');
		$this->db->where('title','Teak renovation');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function selectregular_service_washPackages()
	{
		$this->db->select('*');
        $this->db->from('packages_marine');
		$this->db->where('title','Regular service wash');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function selectopen_boatsPackages()
	{
		$this->db->select('*');
        $this->db->from('packages_marine');
		$this->db->where('title','Open boats');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	
	public function selectstartupPackages()
	{
		$this->db->select('*');
        $this->db->from('packages');
		$this->db->where('title','StartUP');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function selectGrowBigPackages()
	{
		$this->db->select('*');
        $this->db->from('packages');
		$this->db->where('title','GrowBig');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function selectGoGeekPackages()
	{
		$this->db->select('*');
        $this->db->from('packages');
		$this->db->where('title','GoGeek');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	
	public function selectGallery()
	{
		$this->db->select('*');
        $this->db->from('small_gallery');
		$this->db->where('title','Car');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function selectUserinfo()
	{
		$this->db->select('*');
        $this->db->from('user_info');
		//$this->db->where('title','Car');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	
	
	public function selectGallery2()
	{
		$this->db->select('*');
        $this->db->from('small_gallery');
		$this->db->where('title','Marine');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	
	public function selectSchool_Gallery()
	{
		$this->db->select('*');
        $this->db->from('school_gallery');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	
	
	public function selectTeacher()
	{
		$this->db->select('*');
        $this->db->from('teachers');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function selectCommittee()
	{
		$this->db->select('*');
        $this->db->from('committee');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function selectClass()
	{
		$this->db->select('*');
        $this->db->from('school_class');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function saveStudent($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('students',$data);
       // $this->db->insert('school_class',$data);
    }
	
	public function saveSubject($data)
	{
		$this->db->insert('subject',$data);
	}
	
	public function selectStudent($stu_class)
	{
		$this->db->select('*');
        $this->db->from('students');
        $this->db->where('stu_class',$stu_class);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	
	public function saveExam($data)
	{
		$this->db->insert('examlist',$data);
	}
	
	public function saveGrade($data)
	{
		$this->db->insert('grademarke',$data);
	}
	
	public function selectExams()
	{
		$this->db->select('*');
        $this->db->from('examlist');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function selectSlider()
	{
		$this->db->select('*');
        $this->db->from('slider');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function selectStaff_Gallery()
	{
		$this->db->select('*');
        $this->db->from('staff_gallery');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function selectSubject()
	{
		$this->db->select('*');
        $this->db->from('subject');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function saveStudentresult($data)
	{
		$this->db->insert('student_all_results',$data);
	}
	
	public function saveBook($data)
	{
		$this->db->insert('library',$data);
	}
	
	public function saveTransport($data)
	{
		$this->db->insert('transport',$data);
	}
	
	public function saveDormitory($data)
	{
		$this->db->insert('dormitory',$data);
	}
    public function saveNotice($data)
	{
		$this->db->insert('notice',$data);
	}
	public function savePast_category($data)
	{
		$this->db->insert('past_cat',$data);
	}
	
	public function savePaststudent($data)
	{
		$this->db->insert('past_student',$data);
	}
	
	
	public function savePastemployee($data)
	{
		$this->db->insert('past_employee',$data);
	}
	public function selectPast_employee()
	{
		$this->db->select('*');
        $this->db->from('past_employee');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function selectPast_student_reg()
	{
		$this->db->select('*');
        $this->db->from('past_student');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function selectPast_category_results()
	{
		$this->db->select('*');
        $this->db->from('past_cat');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function selectNotice_results()
	{
		$this->db->select('*');
        $this->db->from('notice');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function selectDormitory_results()
	{
		$this->db->select('*');
        $this->db->from('dormitory');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function selectTransport_results()
	{
		$this->db->select('*');
        $this->db->from('transport');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function selectLibrary_results()
	{
		$this->db->select('*');
        $this->db->from('library');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function selectExamList()
	{
		$this->db->select('*');
        $this->db->from('examlist');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function selectExam_grade_result()
	{
		$this->db->select('*');
        $this->db->from('grademarke');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function selectStudent_reg()
	{
		$this->db->select('*');
        $this->db->from('students');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function selectClassStudent_reg($class_name)
	{
		$this->db->select('*');
        $this->db->from('students');
        $this->db->where('stu_class',$class_name);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	
	}
	
	//////////////////////////detele part/////
	
	public function student_reg_delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('students');
    }
	public function examlist_delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('examlist');
    }
	public function examgrade_delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('grademarke');
    }
	
	public function employee_leave_delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('employee_leave');
    }
	public function deposite_account_delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('doposite_account');
    }
	public function expenses_account_delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('expense_account');
    }
	
	
	
	
	public function class_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('school_class');
	}
	public function subject_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('subject');
	}
	public function recent_event_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('recent_event');
	}
	
	public function library_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('library');
	}
	
	public function transport_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('transport');
	}
	public function dormetory_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('dormitory');
	}
	
	public function notice_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('notice');
	}
	
	public function past_employee_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('past_employee');
	}
	
	public function past_student_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('past_student');
	}
	
	public function teacher_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('teachers');
	}
	
	public function committee_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('committee');
	}
	
	public function slide_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('slider');
	}
	
	
	public function gallery_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('small_gallery');
	}
	public function package_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('packages');
	}
	
	public function staff_gallery_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('staff_gallery');
	}
	
	public function school_gallery_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('school_gallery');
	}
////////////////////////////////////////////////////////////

	
	
	public function saveAnnaul_program($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('annaul_program',$data);
       // $this->db->insert('school_class',$data);
    }
	
	public function selectAnnaul_program()
	{
		$this->db->select('*');
        $this->db->from('annaul_program');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function annaul_program_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('annaul_program');
	}
	
///////////////////////////////////////////////////////////

	public function savePicnic($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('picnic',$data);
       // $this->db->insert('school_class',$data);
    }
	
	public function selectPicnic()
	{
		$this->db->select('*');
        $this->db->from('picnic');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function picnic_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('picnic');
	}
	
///////////////////////////////////////////////////////////

	public function savePlay($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('play',$data);
       // $this->db->insert('school_class',$data);
    }
	
	public function selectPlay()
	{
		$this->db->select('*');
        $this->db->from('play');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function play_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('play');
	}
	
	public function class_note_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('class_note');
	}
	
///////////////////////////////////////////////////////////

	public function saveClub($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('club',$data);
       // $this->db->insert('school_class',$data);
    }
	
	public function selectClub()
	{
		$this->db->select('*');
        $this->db->from('club');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	
	public function selectJob_vacancy()
	{
		$this->db->select('*');
        $this->db->from('job_circular');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
	}
	public function club_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('club');
	}
	
///////////////////////////////////////////////////////////

	public function saveMess_chairman($data)
    {
		//print_r($data);
		//die();
		 $this->db->insert('mess_of_chairman',$data);
       // $this->db->insert('school_class',$data);
    }
	

	public function mess_chairman_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('mess_of_chairman');
	}
	
	public function job_delete($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('job_circular');
	}
	
///////////////////////////////////////////////////////////
	public function employee_details($id)
    {
       $this->db->select('*');
        $this->db->from('teachers');
        $this->db->where('id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	public function committee_details($id)
    {
       $this->db->select('*');
        $this->db->from('committee');
        $this->db->where('id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	
	public function student_details($id)
    {
       $this->db->select('*');
        $this->db->from('students');
        $this->db->where('id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	
	public function old_student_details($id)
    {
       $this->db->select('*');
        $this->db->from('past_student');
        $this->db->where('id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	
	public function old_employee_details($id)
    {
        $this->db->select('*');
        $this->db->from('past_employee');
        $this->db->where('id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	
	public function search_students($stu_class)
    {
		/*print_r($stu_class);
		die();*/
       $this->db->select('*');
        $this->db->from('students');
        $this->db->where('stu_class',$stu_class);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	public function student_info($id)
    {
		/*print_r($stu_class);
		die();*/
       $this->db->select('*');
        $this->db->from('students');
        $this->db->where('id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	
	public function updateStudentinfo($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('students',$data);
	}
	
	public function teacher_info($id)
    {
		/*print_r($stu_class);
		die();*/
       $this->db->select('*');
        $this->db->from('teachers');
        $this->db->where('id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result; 
    }
	
	public function updateTeacherinfo($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('teachers',$data);
	}

    public function uploadedImageSave($data)
    {
        $this->db->insert('image_upload',$data);
    }

    public function uploadedImage($id){
        $this->db->select('*');
        $this->db->from('image_upload');
        $this->db->where('user_id',$id);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

    public function deleteImage($id){
        $this->db->where('id', $id);
        $this->db->delete('image_upload');
    }
    public function hireProcess($applicantId,$jobId,$data){
        $this->db->where('job_id', $jobId);
        $this->db->where('freelancer_id', $applicantId);
        $this->db->update('job_applications',$data);
    }
    public function onGoingJobs($id){
        $FreEmp = ($this->session->userdata('user_type')) == 'Frelancer' ? 'freelancer_id' : 'manage_job.user_id';
        $this->db->select('manage_job.id,manage_job.user_id,job_title,job_description,manage_job.category,job_applications.budget,`experience`,qualification,vacancy_type,user_profile_info.user_id fl_id,name,manage_job.status');
        $this->db->from('manage_job');
        $this->db->join('job_applications', 'manage_job.id = job_applications.job_id');
        $this->db->join('user_profile_info', 'user_profile_info.user_id = job_applications.freelancer_id');
        $this->db->where($FreEmp,$id);
        $this->db->where('hiring_status',1);
        $this->db->where('status',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    public function closeJobProcess($jobId,$data){
        $this->db->where('id', $jobId);
        $this->db->update('manage_job',$data);
        $feedbackData['job_id'] = $jobId;
        $this->db->insert('job_feedback',$feedbackData);
    }
    public function jobFeedback($id=''){
        $this->db->select('job_feedback.id, job_feedback.job_id, job_title,
                            user_name employer ,emp_free,emp_free_msg,
                            user_profile_info.name AS freelancer,free_emp,free_emp_msg');
        $this->db->from('job_feedback');
        $this->db->join('manage_job', 'manage_job.id = job_feedback.job_id');
        $this->db->join('job_applications', 'manage_job.id = job_applications.job_id');
        $this->db->join('user_profile_info', 'user_profile_info.id = job_applications.freelancer_id');
        if(!empty($id)){
            $this->db->where('manage_job.id',$id);
        }else{
            $this->db->where("free_emp is null or  free_emp = ''");
            $this->db->where("free_emp_msg is null or free_emp = ''");
        }
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    public function feedbackSendProcess($data,$jobId){
        $this->db->where('job_id', $jobId);
        $this->db->update('job_feedback',$data);
    }
    public function filteredJob($data){
        //print_r($data);
        $this->db->select('manage_job.*,user_profile_info.user_pic_one');
        $this->db->from('manage_job');
        $this->db->join('user_profile_info', 'manage_job.user_email = user_profile_info.user_email');
        if(!empty($data['search'])){
            $search = $data['search']; $this->db->where("CONCAT( job_title, job_description) LIKE '%$search%'");
        }
        if(!empty($data['hour'])){
            $hour = $data['hour'];
            $this->db->where("entry_date BETWEEN ADDTIME( NOW(), '-$hour:00:00') AND NOW()");
        }
        if(!empty($data['vacancyType'])){
            $vt = $data['vacancyType']=='f'? 'fr':'lo';
            $this->db->where("LOWER(vacancy_type) LIKE '%$vt%'");
        }
        if($data['SpecialtyCount']>1){
            $count = $data['SpecialtyCount'];
            for($i=1;$i<$count;$i++){
                $var = 'Specialty'.$i;
                if(!empty($data[$var])){
                    $d = $data[$var];
                    $this->db->where("manage_job.spcialization LIKE CONCAT('%',(SELECT spcialization FROM spcialization WHERE id = $d), '%')");
                }
            }
        }
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
}
?>


