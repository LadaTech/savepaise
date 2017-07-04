<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library( 'form_validation', 'email');
        $this->load->helper('url', 'form', 'html', 'cookie');       
    }

    public function index() {
// Load our view to be displayed        
        $this->load->view('admin/login');
    } 
    public function logout(){
        $this->load->view('admin/logout');
    }
    
    public function sign_in() {       
        $this->load->view('admin/sign_in');
    }  
     public function home() {
// Load our view to be displayed        
        $this->load->view('home');
    }
    
    //To Send  users login page data to database and checking Authentication
    public function process() {
   // Load the model        
        $this->load->model('login_model');
// Validate the user can login
        $result = $this->login_model->validate();
// Now we verify the result
        if (!$result) {
//$this->index();
// If user did not validate, then show them login page again
            $this->session->set_flashdata('errormsg', '<font color=red>Invalid username and/or password.</font><br />');
             redirect(base_url().'index');
//            $msg = '<font color=red>Invalid username and/or password.</font><br />';
//            redirect(base_url().'index',$msg);
//            $this->load->view(base_url(),$msg);
        } else {
// If user did validate, 
// Send them to members area
            if ($_SESSION['utype'] == 2 || $_SESSION['utype'] == 1) {               
                redirect(base_url() . 'admin');
            }
            if ($_SESSION['utype'] == 3 && !empty($_POST['urlValue'])) {
                redirect($_POST['urlValue']);
            }
            if (empty($_POST['urlValue'])) {
                redirect('/');
            }
        }
    }

    
}