<?php
/**
 * Created by PhpStorm.
 * User: aZad
 * Date: 11/16/16
 * Time: 11:51 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class withoutLogin_jobList extends CI_Controller {
    public function index(){
        $this->load->model('admin_panel_model');
        $data['get_job_lists'] = $this->admin_panel_model->filteredJob($_POST);
        //print_r($data);
        $this->load->view('job_list/ajax_joblist',$data);
    }
    public function jobList(){
        $category = $this->uri->segment(3);

        $category = str_replace("%20", " ", $category);
        $this->db->select('*');
        $this->db->from('spcialization');
        $this->db->where('category_name',$category);
        $query_result=$this->db->get();
        $results=$query_result->result();
        $i = 1;
        foreach($results as $result){
            $data['Specialty'.$result->id] = $result->id;
            $i++;
        }
        $data['SpecialtyCount']= $i;
        $this->load->model('admin_panel_model');
        $data['get_job_lists'] = $this->admin_panel_model->filteredJob($data);
        //echo '<pre>'; print_r($data);die;
        $this->load->view('job_list/job_list',$data);
    }
    public function frelancer_list(){
        $spcialization = $this->uri->segment(3);

        $spcialization = str_replace("%20", " ", $spcialization);
        $this->load->model('admin_panel_model');
        $data['get_freelancers'] = $this->admin_panel_model->freelancerList($spcialization);
        $this->load->view('frelancer_list', $data);
        /*
        $data['get_job_lists'] = $this->admin_panel_model->filteredJob($data);
        $this->load->view('job_list/job_list',$data);*/
    }
    public function frelancer_public_profile(){
        $user_id = $this->uri->segment(3);

        $this->load->model('admin_panel_model');
        $data['user_details'] = $this->admin_panel_model->user_details($user_id);
        $user_email = $data['user_details']->user_email;
        $data['user_details_info'] = $this->admin_panel_model->user_details_info($user_email);
        $data['uploadedImage'] = $this->admin_panel_model->uploadedImage($user_id);
        $this->load->view('frelancer_publicView', $data);
    }
    public function frelancer_list_filter(){
        $this->load->model('admin_panel_model');
        $data['get_freelancers'] = $this->admin_panel_model->frelancer_list_filter($_POST);
        //die(print_r($data));
        $this->load->view('ajax_frelancer_list',$data);
    }
    public function about(){
        $this->load->view('header');
        $this->load->view('page/about');
        $this->load->view('footer');
    }
    public function faq(){
        $this->load->view('header');
        $this->load->view('page/faq');
        $this->load->view('footer');
    }
    public function contactUs(){
        $this->load->view('header');
        $this->load->view('page/contactUs');
        $this->load->view('footer');
    }
    public function privacyPolicy(){
        $this->load->view('header');
        $this->load->view('page/privacyPolicy');
        $this->load->view('footer');
    }
    public function termCondition(){
        $this->load->view('header');
        $this->load->view('page/termCondition');
        $this->load->view('footer');
    }
    public function sendEmail(){
        //die(print_r($_POST));
        if(isset($_POST)){
            $this->load->library('email');

            $this->email->from($_POST['email'], $_POST['name']);
            $this->email->to('someone@example.com');

            $this->email->subject('Contact Us Mail');
            $this->email->message($_POST['message']);

            $this->email->send();
            $data = 'Thanks for your mail';
        }else{
            $data = '';
        }
        $this->load->view('header');
        $this->load->view('page/contactUs',$data);
        $this->load->view('footer');
    }
}