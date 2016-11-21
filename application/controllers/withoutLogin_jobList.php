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
}