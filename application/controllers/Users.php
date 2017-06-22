<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Users Extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->library('form_validation');
//        $this->load->library('Session');
        $this->load->library('session');
        $this->load->helper('url', 'form', 'html');
        $this->load->model('addusers_model');
        $this->load->library('javascript');
    }

    public function index($msg = NULL) {
        $data['msg'] = $msg;
        $this->load->library('form_validation');
        $this->load->view('admin/adduser');
    }

//    To add user from admin panel
    public function adduser($msg = NULL) {
        if (isset($_POST['adduser'])) {
            $this->form_validation->set_rules('firstname', 'First Name', 'required');
            $this->form_validation->set_rules('lastname', 'Last name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('pnumber', 'Phone number', 'required|min_length[10]|max_length[10]');
            $this->form_validation->set_rules('usertype', 'Usertype', 'required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('required', 'Enter %s');
            $this->form_validation->set_message('min_length', 'max_length', 'Enter  10digit %s ');
            $this->form_validation->set_message('valid_email', 'Enter valid %s ');
            if ($this->form_validation->run() == FALSE) {
//             $this->load->view('admin/add_user'); 
                $this->load->view('admin/add_user');
            } else {
                $userdata = array(
                    'firstname' => trim($_POST['firstname']),
                    'lastname' => trim($_POST['lastname']),
                    'email' => trim($_POST['email']),
                    'password' => base64_encode($_POST['password']),
                    'pnumber' => $_POST['pnumber'],
                    'usertype' => $_POST['usertype'],
                    'status' => 1,
//                'created_by' => $_SESSION[''],
                    'created_date' => date('Y-m-d H:i:s')
                );

                if ($this->addusers_model->add_user($userdata)) {
                    $data1['message']="user added successfully";                    
                    $this->load->view("admin/add_user",$data1);
                   
                } else {

                    $data1['message']="error occured while adding";
                    $this->load->view("admin/add_user",$data1);
                 
                }
            }
        }
    }

    public function edituser() {
        if (isset($_POST['edituser'])) {
            $usereditdata = array(
                'id' => $_POST['id'],
                'firstname' => trim($_POST['firstname']),
                'lastname' => trim($_POST['lastname']),
                'email' => trim($_POST['email']),
                'pnumber' => $_POST['pnumber'],
                'usertype' => $_POST['usertype'],
                'updated_date' => date('Y-m-d H:i:s')
            );
            if ($result = $this->addusers_model->update_user($usereditdata)) {
                redirect('admin/view_user');
            } else {
                redirect('admin/add_user');
            }
        }
    }

    public function delete_user() {
        $id = $_GET['uid'];
        $data = $this->addusers_model->delete_user($id);
        redirect('admin/view_user', $data);
    }

//    function for add usertype
    public function addusertype() {
        if (isset($_POST['addusertype'])) {
            $usertypedata = array(
                "user_type" => trim($_POST['utypename']),
                'status' => 1,
//                'created_by' => $_SESSION[''],
                'created_date' => date('Y-m-d H:i:s')
            );
            if ($result = $this->addusers_model->add_usertype($usertypedata)) {
                 $data1['message']="usertype added successfully";//                    
                    $this->load->view("admin/usertype/add_usertype",$data1);
//                redirect('admin/add_usertype');
            } else {
                $data1['message']="error occured while adding";
                    $this->load->view("admin/usertype/add_usertype",$data1);
//                redirect('admin/add_user');
            }
        }
    }

    public function edit_usertype() {
        if (isset($_POST['editusertype'])) {
            $usertypeeditdata = array(
                'id' => $_POST['id'],
                "user_type" => trim($_POST['utypename']),
                'status' => 1,
                'updated_date' => date('Y-m-d H:i:s')
            );
            if ($result = $this->addusers_model->update_usertype($usertypeeditdata)) {
                redirect('admin/view_usertype');
            } else {
                redirect('admin/add_usertype');
            }
        }
    }

    public function delete_usertype() {
        $id = $_GET['uid'];
        $data = $this->addusers_model->delete_usertype($id);
        redirect('admin/view_usertype', $data);
    }

}
