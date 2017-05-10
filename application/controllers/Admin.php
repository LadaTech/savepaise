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
}          

    public function index() {
       
        $this->load->view('admin/index');
    }  
     public function add_user() {
// Load our view to be displayed        
        $this->load->view('admin/add_user');
    }    
    public function view_user() {
// Load our view to be displayed        
        $this->load->view('admin/view_user');
    }
}

?>