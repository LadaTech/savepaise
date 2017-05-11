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
        $this->load->view('admin/add_user');
    }

    public function view_user() {
        $this->load->database();
        $userdata = $this->addusers_model->view_user();
        echo "<pre>";
        print_r($userdata);
        exit;        
        $this->load->view('admin/view_user',$query);
    }

}

?>