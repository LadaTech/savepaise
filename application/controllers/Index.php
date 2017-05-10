<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('session', 'form_validation', 'email');
        $this->load->helper('url', 'form', 'html', 'cookie');       
    }

    public function index() {
// Load our view to be displayed        
        $this->load->view('admin/login');
    }    
     public function home() {
// Load our view to be displayed        
        $this->load->view('home');
    }
}