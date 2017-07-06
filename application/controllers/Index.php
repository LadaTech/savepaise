<?php

//error_reporting(E_ALL);
//ini_set("display_errors", 1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation', 'email');
        $this->load->helper('url', 'form', 'html', 'cookie');
        $this->load->model('login_model');
        $this->load->model('addusers_model');
    }

    public function index() {
        $this->load->view('index');
    }

    public function login() {
        $this->load->view('admin/login');
    }

    public function logout() {
        $this->load->view('admin/logout');
    }

    public function sign_in() {        
            $result = $this->login_model->sign_in();            
            if (!$result) {
                $this->session->set_flashdata('msg', '<font color=red>Invalid username and/or password.</font><br />');
                $this->load->view(base_url() . 'index');
            } else {                 
                if ($_SESSION['usertype'] == 2 || $_SESSION['usertype'] == 1) {                   
                    redirect(base_url() . 'admin/dashboard');                }
                if ($_SESSION['usertype'] == 3 || !empty($_POST['urlValue'])) {
                    redirect(base_url() . 'index');                }
                if (empty($_POST['urlValue'])) {
                    redirect('/');
                }
            }
        }
  

    public function sign_up() {
        if (isset($_POST["sign_up"]) == 'submit' || !empty($_POST)) {
            $udata = array(
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'password' => base64_encode($_POST['password']),
                'pnumber' => $_POST['pnumber'],
                'usertype' => 3,
                'status' => 1,
                //'created_by' => $_SESSION['id'],
                'created_date' => date('Y-m-d H:i:s')
            );
            if ($result = $this->login_model->sign_up($udata)) {
//               $_SESSION['msg'] = '<font color=green>Registred Sucessfully</font><br />';
                $this->session->set_flashdata('msg', '<font color=green>Registred Sucessfully</font><br />');
                redirect(base_url() . 'index');
//               $this->load->view(echo baseurl().'index',$msg);
            } else {
//             $msg = '<font color=red>Registration failed</font><br />';
                $this->session->set_flashdata('msg', '<font color=red>Registration failed</font><br />');
                redirect(base_url() . 'index');
            }
        }
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
            redirect(base_url() . 'index');
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
