<?php

//error_reporting(E_ALL);
//ini_set("display_errors", 1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->library('session', 'form_validation', 'email');
        $this->load->helper('url', 'form', 'html');
        $this->load->library('pagination');
        $this->load->model('addusers_model');
    }

    public function index() {         
        $this->load->view('admin/index');
    }

    public function add_user() {
        $this->load->database();
        $data['utype']=  $this->addusers_model->view_usertype()->result();
//        echo "<pre>";
//        print_r($data);exit;
        $this->load->view('admin/add_user',$data);
    }

    public function view_user() { 
        $this->load->database();
        $data['records'] = $this->addusers_model->view_user()->result(); 
        $data['utype']=  $this->addusers_model->view_usertype()->result();     
        $this->load->view('admin/view_user',$data);
    }
    
    public function add_usertype() {
        $this->load->view('admin/usertype/add_usertype');
    }
     public function view_usertype() {
         $this->load->database();
        $data['utype']=  $this->addusers_model->view_usertype()->result();
        $this->load->view('admin/usertype/view_usertype',$data);
        
    }

}

?>